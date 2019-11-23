<!DOCTYPE html>
@include('head')
<body>
    @include('layouts.app')
    @include('layouts.back')
    <div class="container">
        <div class="row justify-content-center">
            <form method="post" action="/adminpanel/proizvodiPregled/filter" class="form m-2">
                <span>SORT</span>
                @csrf
                <select name="sort" id="sort">
                    <option value="naziv" selected>Naziv</option>
                    <option value="JSP">ID</option>
                </select>
                <select name="way" id="way">
                    <option value="asc" selected>UP</option>
                    <option value="desc">DOWN</option>
                </select>
                <input type="submit" value="SUBMIT" class="btn btn-primary">
            </form>
        </div>
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
    @include('boots')
</body>
</html>