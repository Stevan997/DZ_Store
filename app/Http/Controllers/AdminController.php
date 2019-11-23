<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Repositories\ProizvodiRepository;
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

}
