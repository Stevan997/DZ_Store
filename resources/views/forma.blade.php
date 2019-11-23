<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('head')

@include('layouts.app')
@include('layouts.back')
<body>
<div class="container text-right w-75">
    <h2 class="py-4 text-center">UNOS PROIZVODA</h2>
    <div class="row justify-content-center">
        <form method="POST" action="/adminpanel">
            @csrf 
            Broj proizvoda: <input type="number" name="JSP" class="m-2"><br>
            Naziv: <input name="Naziv" class="m-2" /><br>
            Grupa: <input name="Grupa" class="m-2"><br>
            Vrsta: <input name="Vrsta" class="m-2"><br>
            Slika: <input name="Slika" class="m-2" /><br>
            Proizvodjac: <input name="Label" class="m-2"><br>
            Karakteristike: <input name="Karakteristike" class="m-2" /><br>
            Cena: <input name="Cena" type="number" class="m-2" /><br>
            Stanje: <input name="Stanje" type="number" class="m-2"><br>
            Mogucnost nabavke: <select name="Nabavka" class="m-2">
                <option value="1">DA</option>
                <option value="0">NE</option>  
            </select><br>
            <input type="submit" value="Posalji" class="m-2 btn btn-primary" /><br>
        </form>
    </div>
</div>

@include('boots')
</body>
</html>
