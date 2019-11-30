<!DOCTYPE html>
@include('head')
<body>
    @include('layouts.header')

    <div class="container">
                @include('meni')
        <div class="row justify-content-around">
                @include('carousel')
        </div>
        <form method="post" action="/prodavnica/filter" class="form-group m-2 row justify-content-center">
            @csrf
            <select name="sort" id="sort" class="form-control col-md-2 m-1">
                <option value="naziv" selected>Naziv</option>
                <option value="JSP">ID</option>
            </select>
            <select name="way" id="way" class="form-control col-md-2 m-1">
                <option value="asc" selected>UP</option>
                <option value="desc" selected>DOWN</option>
            </select>
            <input type="submit" value="SUBMIT" class="btn btn-primary">
        </form>
        <div class="row justify-content-around">   
        @foreach($proizvodi as $p)
            <div class="card m-3 col-md-2">
                <span>{{$p->JSP}} - {{$p->Naziv}}</span>
                <a href="/prodavnica/{{ $p->JSP }}">DETALJNIJE</a>
            </div>
        @endforeach
        </div>
    </div>
</body>
</html>
    

