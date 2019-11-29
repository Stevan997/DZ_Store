<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('head')

@include('layouts.header')
<body>
<div class="mt-1 container text-right w-75">
    <h2 class="py-4 text-center">UNOS PROIZVODA</h2>
    <div class="row justify-content-center">
        <form method="POST" action="/adminpanel">
            @csrf 
            Broj proizvoda: <input type="number" name="JSP" class="m-2" required /><br>
            Naziv: <input name="Naziv" class="m-2" required /><br>
            Grupa: <input name="Grupa" class="m-2" required /><br>
            Vrsta: <input name="Vrsta" class="m-2" required /><br>
            Slika: <input name="Slika" class="m-2" required /><br>
            Proizvodjac: <input name="Label" class="m-2" required /><br>
            Karakteristike: <input name="Karakteristike" class="m-2" required /><br>
            Cena: <input name="Cena" type="number" class="m-2" required /><br>
            Stanje: <input name="Stanje" type="number" class="m-2" required /><br>
            Mogucnost nabavke: <select name="Nabavka" class="m-2">
                <option value="1">DA</option>
                <option value="0">NE</option>  
            </select><br>
            <input type="submit" value="Posalji" class="m-2 btn btn-primary" /><br>
        </form>
    </div>
</div>
</body>
</html>
