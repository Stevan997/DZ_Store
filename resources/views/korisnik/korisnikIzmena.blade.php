<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('head')

@include('layouts.app')
@include('layouts.back')
<body>
<div class="container text-right w-75">
    <h2 class="py-4 text-center">IZMENA PODATAKA</h2>
    <div class="row justify-content-center">
        <form method="POST" action="/adminpanel/korisniciPregled/{{Auth::user()->id}}">
            @csrf 
            @method('PUT')
            Username: <input name="name" class="m-2" type="text" value="{{Auth::user()->name}}" /><br>
            Ime: <input name="Ime" class="m-2" value="{{Auth::user()->Ime}}"><br>
            Prezime: <input name="Prezime" class="m-2" value="{{Auth::user()->Prezime}}"><br>
            Adresa: <input name="Adresa" class="m-2" value="{{Auth::user()->Adresa}}"/><br>
            Grad: <input name="Grad" class="m-2"  value="{{Auth::user()->Grad}}"><br>
            Postanski Broj: <input name="Pos_br" class="m-2" value="{{Auth::user()->Pos_br}}"/><br>
            Email: <input name="email" type="email" class="m-2"  value="{{Auth::user()->email}}" /><br>
            Broj Telefona: <input name="Br_tel" type="number" class="m-2" value="{{Auth::user()->Br_tel}}"><br>
            Datum rodjenja: <input name="Dat_rod" type="text" class="m-2" value="{{Auth::user()->Dat_rod}}"><br>            
            <input type="submit" value="Posalji" class="m-2 btn btn-primary" /><br>
        </form>
    </div>
</div>

@include('boots')
</body>
</html>