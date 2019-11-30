<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use \App\Repositories\ProizvodiRepository;
use \App\Racun;
use \App\Stavke;

class ProizvodiController extends Controller
{
    
    public function index(){
        // $proizvodi = \App\Proizvodi::orderBy('JSP', 'asc')->get();
        $proizvodi = ProizvodiRepository::pregledProiz();
        return view('webshop', compact('proizvodi'));
    }

    public function pocetnaStrana(){
        $proizvodi = DB::table('proizvodi')
        ->inRandomOrder()
        ->take(15)
        ->get();

        $slike = DB::table('glavne_fotografije')
        ->where('Aktivna', 1)
        ->get();

        return view('welcome', compact('proizvodi', 'slike'));
    }

    public function sort(Request $request){
        $sort = $request->sort;
        $way = $request->way;
        // $proizvodi = \App\Proizvodi::orderBy($sort, $way)->get();
        $proizvodi = ProizvodiRepository::pregledProiz($sort, $way);

        return view('webshop', compact('proizvodi'));
    }

    public function proizvod($id){
        $proizvod = ProizvodiRepository::jedanProizvod($id);

        return view('jedan_proizvod', compact('proizvod'));
    }

    public function pretraga(Request $request){
        $s = $request->s;
        $proizvodi = DB::table('proizvodi')
        ->where('Naziv', 'like', '%' . $s . '%')
        ->get();

        return view('webshop', compact('proizvodi'));

    }

    public function filterTip($tip){
        $proizvodi = DB::table('proizvodi')
        ->where('Tip', $tip)
        ->get();

        return view('webshop', compact('proizvod'));
    }

    public function filterVrsta($vrsta){
        $proizvodi = DB::table('proizvodi')
        ->where('Vrsta', $vrsta)
        ->get();

        return view('webshop', compact('proizvod'));
    }

    
}
