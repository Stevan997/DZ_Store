<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Repositories\ProizvodiRepository;

class ProizvodiController extends Controller
{
    public function index(){
        // $proizvodi = \App\Proizvodi::orderBy('JSP', 'asc')->get();
        $proizvodi = ProizvodiRepository::pregledProiz();
        return view('webshop', compact('proizvodi'));
    }

    public function sort(Request $request){
        $sort= $request->sort;
        $way=$request->way;
        // $proizvodi = \App\Proizvodi::orderBy($sort, $way)->get();
        $proizvodi = ProizvodiRepository::pregledProiz($sort, $way);

        return view('webshop', compact('proizvodi'));
    }

    public function proizvod($id){
        $proizvod = ProizvodiRepository::jedanProizvod($id);

        return view('jedan_proizvod', compact('proizvod'));
    }

    
}
