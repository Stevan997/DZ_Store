<!DOCTYPE html>
@include('head')
<body>
    @include('layouts.header')
    <div class="container">
        <h1 class="dispay-4 w-100 text-center my-3">PREGLED PROIZVODA</h1>
        <form method="post" action="/adminpanel/proizvodiPregled/filter" class="form-group m-2 row justify-content-center">
            @csrf
            <select name="sort" id="sort" class="form-control col-md-2 m-1">
                <option value="naziv" selected>Naziv</option>
                <option value="JSP">ID</option>
            </select>
            <select name="way" id="way" class="form-control col-md-2 m-1">
                <option value="asc" selected>UP</option>
                <option value="desc">DOWN</option>
            </select>
            <input type="submit" value="SUBMIT" class="btn btn-primary">
        </form>
        <div class="row justify-content-center">
            <ul class="list-group w-100">  
                @foreach($proizvodi as $p)
                    <li class="list-group-item list-group-item-info m-1">
                        <p class="w-75" >{{$p->JSP}} - {{$p->Naziv}}</p>
                        <a class="btn btn-primary mx-1" href="formaPregled/{{ $p->JSP }}/proizvodi">IZMENI</a>
                        <a class="btn btn-primary mx-1" href="proizvodiPregled/obrisi/{{ $p->JSP }}">OBRISI</a>                        
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</body>
</html>