<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Repositories\ProizvodiRepository;

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
}
