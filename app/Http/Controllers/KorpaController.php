<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use \App\Repositories\ProizvodiRepository;
use \App\Racun;
use \App\Stavke;

class KorpaController extends Controller
{
    public function index(Request $request){
        $request->session()->push('korpa', $request->id);
        // $request->session()->flash('status', 'Task was successful!');

        return view('success');
    }

    public function prikazi(Request $request){
        $data = $request->session()->all();
        $proizvodi = ProizvodiRepository::pregledProiz();
        $cart = array();
        $price = 0;

        if( !isset($data['korpa']) ){
            return view('korpa', compact('cart'));
        }

        foreach($data['korpa'] as $k){
            foreach($proizvodi as $p){
                if($k == $p->JSP){
                    array_push($cart, $p);
                    $price += $p->Cena;
                }
            }
        }

        return view('korpa', compact('cart', 'price'));
    }

    public function izbaci(Request $request, $jsp){
        $data = $request->session()->all();
        $key = array_search($jsp, $data['korpa']);
        $request->session()->forget("korpa.$key");

        return back();
    }

    public function upisFakture(Request $request){
        try{
            DB::beginTransaction();

                $faktura = $this->racun($request);
                $ukupnaSuma = $this->stavke($request, $faktura);
                // return json_encode(['msg' => $ukupnaSuma]);


                // update fakture ukupnom sumom fakture i brojem narudžbenice
                $faktura->update(['Iznos' => $ukupnaSuma]);
                $request->session()->forget('korpa');

            DB::commit();
                return json_encode(['msg' => 'Vasa narudzbina je uspesna!']);

        } catch (\Exception $e) {
            DB::rollback();
            return json_encode(['msg' => $e]);
        }
    }

    public function racun($request){
        $korisnik = \App\User::find(Auth::user()->id);

        $faktura = new Racun;
        $faktura->ID_Korisnika = $korisnik->id;
        $faktura->Datum = date('d-m-y');
        $faktura->Iznos = 0;
        $faktura->Placanje = $request['placanje'] ?? 'Pouzecem';
        $faktura->Status = 1;
        $faktura->save();

        return $faktura;
    }

    public function stavke($request, $faktura){
        $ukupnaCena = 0;
        $niz = 0;
        $data = $request->session()->all();
        foreach($data['korpa'] as $d){
            $cenaPro = 0;
            $proizvod = ProizvodiRepository::jedanProizvod($d);
            
            $stavke = new Stavke;
            $stavke->ID_Racuna = $faktura->ID;
            $stavke->JSP = $proizvod->JSP;
            $stavke->kolicina = $request['niz'][$niz];
            $cenaPro = $stavke->kolicina * $proizvod->Cena;
            $stavke->Cena = $proizvod->Cena;
            $stavke->save();
            
            $niz++;
            $ukupnaCena += $cenaPro;
        }

        return $ukupnaCena;
    }

}
