<!DOCTYPE html>
@include('head')
<body>
    @include('layouts.header')
    <div class="container my-3">
        <h1 class="dispay-4 w-100 text-center">NARUDZBINE</h1>
        <div class="row justify-content-center">
            <a href="/adminpanel/narudzbinePregled" class="btn btn-light w-25">Sve</a>
            <a href="/adminpanel/narudzbinePregled/izvrsene" class="btn btn-light w-25">Izvrsene</a>
            <a href="/adminpanel/narudzbinePregled/obustavljene" class="btn btn-light w-25">Obustavljene</a>
        </div>
        <div class="row justify-content-center">
            <ul class="list-group w-100"> 
                {{-- {{ json_encode($fakture) }} {{json_encode($stavke)}} --}}
                @foreach($fakture as $f)
                    <li class="list-group-item list-group-item-info @if($f->Status == 0) bg-danger text-white @endif @if($f->Status == 2) bg-success text-white @endif m-1"> 
                    <p>{{$f->Ime}} {{$f->Prezime}} - {{$f->Adresa}} - {{$f->Grad}} - {{$f->Pos_br}} - {{$f->email}}  - {{$f->Br_tel}} - {{$f->Iznos}}din - {{$f->Placanje}}</p>
                        <p>
                                @foreach ($stavke as $s)
                                    @if($f->ID == $s->ID_Racuna)

                                        <span class="border border-dark rounded p-2">{{ $s->Naziv}}  kol:{{$s->kolicina}}  cena:{{$s->Cena}}din</span>
                                    @endif
                                    
                                @endforeach
                        </p>
                        <a class="btn btn-primary mr-1" href="/adminpanel/narudzbinePregled/{{$f->ID}}/obustavi">OBUSTAVI</a>
                        @if (isset(Auth::user()->Administrator) and Auth::user()->Administrator == 1)
                            <a class="btn btn-primary mr-1" href="/adminpanel/narudzbinePregled/{{$f->ID}}/izvrseno">IZVRSENO</a>
                        @endif
                        
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</body>
</html>