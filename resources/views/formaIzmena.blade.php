<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('head')

@include('layouts.app')
@include('layouts.back')
<body>
<div class="container text-right w-75">
    <h2 class="py-4 text-center">IZMENA PROIZVODA</h2>
    <div class="row justify-content-center">
        <form method="POST" action="/adminpanel/proizvodiPregled/{{$p->JSP}}">
            @csrf 
            @method('PUT')
            Broj proizvoda: <input type="number" value="{{$p->JSP}}" name="JSP" class="m-2"><br>
            Naziv: <input name="Naziv" class="m-2" value="{{$p->Naziv}}" /><br>
            Grupa: <input name="Grupa" class="m-2" value="{{$p->Grupa}}"><br>
            Vrsta: <input name="Vrsta" class="m-2" value="{{$p->Vrsta}}"><br>
            Slika: <input name="Slika" class="m-2" value="{{$p->Slika}}"/><br>
            Proizvodjac: <input name="Label" class="m-2"  value="{{$p->Label}}"><br>
            Karakteristike: <input name="Karakteristike" class="m-2" value="{{$p->Karakteristike}}"/><br>
            Cena: <input name="Cena" type="number" class="m-2"  value="{{$p->Cena}}" /><br>
            Stanje: <input name="Stanje" type="number" class="m-2" value="{{$p->Stanje}}"><br>
            Mogucnost nabavke: <select name="Nabavka" class="m-2">
                <option value="1" @if($p->Mog_nab == "1") selected @endif>DA</option>
                <option value="0" @if($p->Mog_nab == "0") selected @endif>NE</option>  
            </select><br>
            <input type="submit" value="Posalji" class="m-2 btn btn-primary" /><br>
        </form>
    </div>
</div>

@include('boots')
</body>
</html>