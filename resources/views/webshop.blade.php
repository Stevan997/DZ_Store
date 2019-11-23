<!DOCTYPE html>
@include('head')
<body>
    @include('layouts.app')
    @include('layouts.back')
    @include('layouts.cart')

    <div class="container">
        <div class="row justify-content-center">
            <form method="post" action="/prodavnica/filter" class="form m-2">
                <span>SORT</span>
                @csrf
                <select name="sort" id="sort">
                    <option value="naziv" selected>Naziv</option>
                    <option value="JSP">ID</option>
                </select>
                <select name="way" id="way">
                    <option value="asc" selected>UP</option>
                    <option value="desc" selected>DOWN</option>
                </select>
                <input type="submit" value="SUBMIT" class="btn btn-primary">
            </form>
        </div>
        <div class="row justify-content-around">   
        @foreach($proizvodi as $p)
            <div class="card m-3 col-md-2">
                <span>{{$p->JSP}} - {{$p->Naziv}}</span>
                <a href="/prodavnica/{{ $p->JSP }}">DETALJNIJE</a>
            </div>
        @endforeach
        </div>
    </div>
    @include('boots')
</body>
</html>
    
