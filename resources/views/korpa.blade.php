<!DOCTYPE html>
@include('head')
<body>
    @include('layouts.app')
    @include('layouts.back')
    @include('layouts.cart')


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
                @if (count($cart) == 0)
                    <h1 class="my-5">KORPA JE PRAZNA!</h1>
                @else
                    <ul class="list-group w-100"> 
                        @foreach($cart as $c)
                            <li class="list-group-item list-group-item-info m-1">
                                <p class="w-75" >{{$c->JSP}} - {{$c->Naziv}}</p>
                                <a class="btn btn-primary mx-1" href="{{ $c->JSP }}/izbaci">OBRISI</a>                        
                            </li>
                        @endforeach
                    </ul>
                @endif
        </div>
        <div class="row justify-content-center">
            @if (count($cart) !== 0)
                <p class="col-10 text-center display-4 m-5">Cena: {{$price}}din</p>
                <a class="col-4 btn btn-primary m-3" href="#">ZAVRSI</a>
            @endif
        </div>
        
    </div>
    @include('boots')
</body>
</html>