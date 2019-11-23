<!DOCTYPE html>
@include('head')
<body>
    @include('layouts.app')
    @include('layouts.back')
    <div class="container">
        <div class="row justify-content-center">
            <form method="post" action="/adminpanel/korisniciPregled/filter" class="form m-2">
                <span>SORT</span>
                @csrf
                <select name="sort" id="sort">
                    <option value="name" selected>Naziv</option>
                    <option value="id">ID</option>
                </select>
                <select name="way" id="way">
                    <option value="asc" selected>UP</option>
                    <option value="desc" selected>DOWN</option>
                </select>
                <input type="submit" value="SUBMIT" class="btn btn-primary">
            </form>
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
    @include('boots')
</body>
</html>