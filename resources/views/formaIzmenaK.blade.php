<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('head')

@include('layouts.header')
<body>
<div class="container text-right w-75">
    <h2 class="py-4 text-center">IZMENA KORISNIKA</h2>
    <div class="row justify-content-center">
        <form method="POST" action="/adminpanel/korisniciPregled/{{$k->id}}">
            @csrf 
            @method('PUT')
            Username: <input name="name" class="m-2" type="text" value="{{$k->name}}" required /><br>
            Ime: <input name="Ime" class="m-2" value="{{$k->Ime}}" required /><br>
            Prezime: <input name="Prezime" class="m-2" value="{{$k->Prezime}}" required /><br>
            Adresa: <input name="Adresa" class="m-2" value="{{$k->Adresa}}" required /><br>
            Grad: <input name="Grad" class="m-2"  value="{{$k->Grad}}" required /><br>
            Postanski Broj: <input name="Pos_br" class="m-2" value="{{$k->Pos_br}}" required /><br>
            Email: <input name="email" type="email" class="m-2"  value="{{$k->email}}" required /><br>
            Broj Telefona: <input name="Br_tel" type="number" class="m-2" value="{{$k->Br_tel}}" required /><br>
            Datum rodjenja: <input name="Dat_rod" type="text" class="m-2" value="{{$k->Dat_rod}}" required /><br>            
            Administrator: <select name="Administrator" class="m-2">
                <option value="1" @if($k->Administrator == "1") selected @endif >DA</option>
                <option value="0" @if($k->Administrator == "0") selected @endif >NE</option>  
            </select><br>
            <input type="submit" value="Posalji" class="m-2 btn btn-primary" /><br>
        </form>
    </div>
</div>
</body>
</html>