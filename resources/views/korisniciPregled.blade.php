<!DOCTYPE html>
@include('head')
<body>
    @include('layouts.header')
    <div class="container">
        <h1 class="dispay-4 w-100 text-center my-3">PREGLED KORISNIKA</h1>
        <form method="post" action="/adminpanel/korisniciPregled/filter" class="form-group m-2 row justify-content-center">
            @csrf
            <select name="sort" id="sort" class="form-control col-md-2 m-1">
                <option value="name" selected>Naziv</option>
                <option value="id">ID</option>
            </select>
            <select name="way" id="way" class="form-control col-md-2 m-1">
                <option value="asc" selected>UP</option>
                <option value="desc" selected>DOWN</option>
            </select>
            <input type="submit" value="SUBMIT" class="btn btn-primary col-md-2 m-1">
        </form>
        <div class="row justify-content-center">
            <a href="/adminpanel/korisniciPregled/admini" class="btn btn-light w-25">ADMIN</a>
            <a href="/adminpanel/korisniciPregled/useri" class="btn btn-light w-25">USER</a>
        </div>
        <div class="row justify-content-center">
            <ul class="list-group w-100">  
                @foreach($korisnici as $k)
                    <li class="list-group-item list-group-item-info m-1">
                        <p class="w-75" >@if($k->Administrator == "1") {{"ADMIN"}} @else {{"USER"}} @endif - {{$k->name}} - {{$k->Adresa}} - {{$k->Grad}}</p>
                        <a class="btn btn-primary" href="formaPregled/{{ $k->id }}/korisnici">IZMENI</a>
                        <a class="btn btn-primary mx-1" href="korisniciPregled/obrisi/{{ $k->id }}">OBRISI</a>
                        <a class="btn btn-primary mr-1" href="korisniciPregled/admin/{{ $k->id }}">ADMIN</a>                        
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</body>
</html>