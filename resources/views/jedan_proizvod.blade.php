<!DOCTYPE html>
@include('head')
<body>
    @include('layouts.header')


    <div class="mt-2 container">
        <div class="row justify-content-center">
            <div class="card m-3 w-50 h-50">
                <p class="m-1"><span class="d-inline-block w-25">NAZIV</span>{{$proizvod->Naziv}}</p>
                <hr>
                <p class="m-1"><span class="d-inline-block w-25">CENA</span>{{$proizvod->Cena}}</p>
                <hr>
                <p class="m-1"><span class="d-inline-block w-25">OPIS</span>{{$proizvod->Karakteristike}}</p>
                <hr>
                <p class="m-1"><span class="d-inline-block w-25">PROIZVODJAC</span>{{$proizvod->Label}}</p>
                <hr>
                <p class="m-1"><span class="d-inline-block w-25">VRSTA</span>{{$proizvod->Vrsta}}</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <a href="/prodavnica/{{$proizvod->JSP}}/ubaci" class="btn btn-danger text-white">KUPI</a>
        </div>

    </div>
</body>
</html>