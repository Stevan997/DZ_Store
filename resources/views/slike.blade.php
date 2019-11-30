<!DOCTYPE html>
@include('head')
<body>
    @include('layouts.header')
    <div class="container">
        <h1 class="dispay-4 w-100 text-center my-3">SLIKE</h1>
        <div class="row justify-content-center">
            <form class="form-group text-center" action="/adminpanel/slike/upload" method="post" enctype="multipart/form-data">
                <label>Izaberite sliku:</label>
                <input required type="file" name="slika" id="file" class="form-control-file m-1 p-2 border border-primary rounded" >
                <input type="submit" value="Upload" name="submit" class="btn btn-primary m-1">
                @csrf
            </form>
        </div>
        <div class="row justify-content-center">
            <ul class="list-group w-100">  
                @if(count($slike) == 0)
                    <p class="w-100 display-4 text-center">NEMA SLIKA!</p>
                @endif
                @foreach($slike as $s)
                    <li class="list-group-item list-group-item-info m-1">
                        <img src="{{$s->Slika}}" alt="" class="w-10">
                        <span class="ml-5">{{$s->ID}} - @if($s->Aktivna == 0) Nije Aktivna @else Aktivna @endif</span>
                        <a class="btn btn-primary float-right" href="/adminpanel/slike/aktivna/{{ $s->ID }}">AKTIVNA</a>                      
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    
</body>
</html>