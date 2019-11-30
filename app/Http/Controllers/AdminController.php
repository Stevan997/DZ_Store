<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use \App\Repositories\ProizvodiRepository;
use \App\Racun;
use \App\Stavke;
use \App\Slike;

class AdminController extends Controller
{
    public function podaci(Request $request){
        \App\Proizvodi::create([
            'JSP' => $request->JSP, 
            'Naziv' => $request->Naziv, 
            'Grupa' => $request->Grupa, 
            'Vrsta' => $request->Vrsta, 
            'Slika' => $request->Slika, 
            'Label' => $request->Label, 
            'Karakteristike' => $request->Karakteristike, 
            'Cena' => $request->Cena, 
            'Stanje' => $request->Stanje, 
            'Mog_nab' => $request->Nabavka,  
        ]);
        
        return redirect()->to('/adminpanel/success');
        
    }

    public function povratak(){
        return view('success');
    }

    public function pregledProiz(){
        //$proizvodi = \App\Proizvodi::orderBy('JSP', 'asc')->get();
        $proizvodi = ProizvodiRepository::pregledProiz();
        return view('poizvodiPregled', compact('proizvodi'));
    }

    public function sortProizvoda(Request $request){
        $sort= $request->sort;
        $way=$request->way;
        // $proizvodi = \App\Proizvodi::orderBy($sort, $way)->get();
        $proizvodi = ProizvodiRepository::pregledProiz($sort, $way);

        return view('poizvodiPregled', compact('proizvodi'));
    }

    public function formaIzmena($jsp, $tip){
        if($tip == 'proizvodi'){
            $p = ProizvodiRepository::jedanProizvod($jsp);
            return view('formaIzmena', compact('p'));
        }
        if($tip == 'korisnici'){
            $k = \App\User::find($jsp);
            return view('formaIzmenaK', compact('k'));

        }
    }

    public function izmenaProizvoda($jsp, Request $request){
        $proizvodi = \App\Proizvodi::find($jsp);
        $proizvodi->Naziv = $request->Naziv;
        $proizvodi->Grupa = $request->Grupa;
        $proizvodi->Vrsta = $request->Vrsta;
        $proizvodi->Slika = $request->Slika;
        $proizvodi->Label = $request->Label;
        $proizvodi->Karakteristike = $request->Karakteristike;
        $proizvodi->Cena = $request->Cena;
        $proizvodi->Stanje = $request->Stanje;
        $proizvodi->Mog_nab = $request->Nabavka;

        $proizvodi->save();
        return redirect()->to('/adminpanel/success');

    }

    public function brisanjeProizvoda($jsp){
        $proizvod = \App\Proizvodi::find($jsp);
        $proizvod->delete();

        return redirect()->to('/adminpanel/success');        
    }

    public function pregledKori(){
        $korisnici = \App\User::orderBy('id', 'asc')->get();

        return view('korisniciPregled', compact('korisnici'));
    }

    public function admini(){
        $korisnici = \App\User::orderBy('id', 'asc')->where('Administrator', 1)->get();

        return view('korisniciPregled', compact('korisnici'));
    }

    public function useri(){
        $korisnici = \App\User::orderBy('id', 'asc')->where('Administrator', 0)->get();

        return view('korisniciPregled', compact('korisnici'));
    }

    public function sortKorisnika(Request $request){
        $sort= $request->sort;
        $way=$request->way;
        $korisnici = \App\User::orderBy($sort, $way)->get();

        return view('korisniciPregled', compact('korisnici'));
    }

    public function adminKorisnik($id){
        $korisnik = \App\User::find($id);
        if($korisnik->Administrator == '0')
            $korisnik->Administrator = '1';
        else
            $korisnik->Administrator = '0';

        $korisnik->save();
        return redirect()->to('/adminpanel/success');
    }

    public function izmenaKorisnika($id, Request $request){
        $korisnik = \App\User::find($id);
        $korisnik->name = $request->name;
        $korisnik->Ime = $request->Ime;
        $korisnik->Prezime = $request->Prezime;
        $korisnik->Adresa = $request->Adresa;
        $korisnik->Grad = $request->Grad;
        $korisnik->Pos_br = $request->Pos_br;
        $korisnik->Br_tel = $request->Br_tel;
        $korisnik->Dat_rod = $request->Dat_rod;
        $korisnik->Administrator = $request->Administrator;

        $korisnik->save();
        return redirect()->to('/adminpanel/success');
    }

    public function obrisiKorisnika($id){
        $korisnik = \App\User::find($id);
        $korisnik->delete();

        return redirect()->to('/adminpanel/success');  
    }


    public function narudzbine(){
        $fakture = DB::table('racun')
        ->join('users', 'users.id', 'racun.ID_korisnika')
        ->get();

        return $fakture;
    }

    public function stavkeNarudzbine(){
        $stavke = DB::table('stavke_racuna')
        ->join('racun', 'racun.ID', 'stavke_racuna.ID_racuna')
        ->join('proizvodi', 'proizvodi.JSP', 'stavke_racuna.JSP')
        ->get();

        return $stavke;
    }

    public function pregledNarudzbina(){
        $fakture = $this->narudzbine();
        $stavke = $this->stavkeNarudzbine();


        return view('narudzbineAdmin', compact('fakture', 'stavke'));
    }

    public function izvrsene(){
        $fakture = DB::table('racun')
        ->join('users', 'users.id', 'racun.ID_korisnika')
        ->where('status', 2)
        ->get();

        $stavke = $this->stavkeNarudzbine();



        return view('narudzbineAdmin', compact('fakture', 'stavke'));
    }

    public function obustavljene(){
        $fakture = DB::table('racun')
        ->join('users', 'users.id', 'racun.ID_korisnika')
        ->where('status', 0)
        ->get();

        $stavke = $this->stavkeNarudzbine();

        return view('narudzbineAdmin', compact('fakture', 'stavke'));
    }

    public function narudzbineKorisnik(){
        $fakture = DB::table('racun')
        ->join('users', 'users.id', 'racun.ID_korisnika')
        ->where('racun.ID_korisnika', Auth::user()->id)
        ->get();

        $stavke = $this->stavkeNarudzbine();


        return view('narudzbineAdmin', compact('fakture', 'stavke'));
    }

    public function narudzbinaIzvrseno($id){
        $faktura = \App\Racun::find($id);
        // if($faktura->Status == 1)
            $faktura->Status = 2;

        $faktura->save();

        return redirect()->to('/adminpanel/success');        

    }

    public function narudzbinaObustavi($id){
        $faktura = \App\Racun::find($id);
        // if($faktura->Status == 1)
            $faktura->Status = 0;

        $faktura->save();
        return redirect()->to('/adminpanel/success');        

    }

    public function slike(){
        $slike = DB::table('glavne_fotografije')->get();

        return view('slike', compact('slike'));
    }

    public function aktivna($id){
        $slike = \App\Slike::find($id);


        if($slike->Aktivna == 0)
            $slike->Aktivna = 1;
        else
            $slike->Aktivna = 0;

        $slike->save();

        return view('success');
    }

    public function uploadSlike(Request $request){
        $path = public_path().'/images';
        if ( $request->hasFile('slika')) {
            $image = move_uploaded_file($_FILES["slika"]["tmp_name"], $path . '/' . $_FILES['slika']['name']);
            // dd($image);

            $slika = new Slike;
            $slika->Slika = '/images/' . $_FILES['slika']['name'];
            // $slika->Slika = $path.'/'.$_FILES['slika']['name'];
            $slika->Aktivna = 1;

            $slika->save();
        }

        return view('success');
        
    }

}
