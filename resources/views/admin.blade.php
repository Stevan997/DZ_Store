<!DOCTYPE html>
@include('head')
<body>
@include('layouts.app')
<div class="container text-center w-75">

    <h2 class='text-center py-4'>ADMIN PANEL</h2>
    <a class="fm text-center w-100 p-3" href="/adminpanel/forma">FORMA ZA UNOS PROIZVODA</a><br>
    <a class="fm text-center w-100 p-3" href="#">FORMA ZA UNOS KORISNIKA</a><br>
    <a class="fm text-center w-100 p-3" href="/adminpanel/korisniciPregled">PREGLED KORISNIKA</a><br>
    <a class="fm text-center w-100 p-3" href="/adminpanel/proizvodiPregled">PREGLED PROIZVODA</a><br>
</div>
@include('boots')
</body>
</html>