<!DOCTYPE html>
@include('head')
<body class="overflow-hidden">
    @include('layouts.header')
    @if (count($cart) !== 0)
        <p class="w-100 text-center display-4 m-2">KORPA</p>
    @endif
    <div class="container">
        <div class="row justify-content-center">
                @csrf
                @if (count($cart) == 0)
                    <h1 class="my-5">KORPA JE PRAZNA!</h1>
                @else
                    <ul class="list-group w-100"> 
                        @foreach($cart as $c)
                            <li class="list-group-item list-group-item-info m-1">
                                <p class="w-75" >
                                <span class="jsp">{{$c->JSP}}</span>
                                 - <span class="naziv">{{$c->Naziv}}</span>
                                  - <span class="cena">{{$c->Cena}}</span></p>
                                KOLICINA: <input type="number" name="kolicina" value="1" class="kol mt-1 w-5" />
                                <a class="btn btn-primary mx-1 float-right" href="{{ $c->JSP }}/izbaci">OBRISI</a>                        

                            </li>
                        @endforeach
                    </ul>
                @endif
        </div>
            @if (count($cart) !== 0 and isset(Auth::user()->Administrator))
            <div class="row justify-content-center">
                @csrf
                <p class="price col-4 text-center my-4"> 
                    <label for="placanje">Nacin placanja: </label>
                    <select name="placanje" id="placanje" class="form-control">
                        <option value="pouzecem">Pouzecem</option>
                        <option value="kartica">Kreditna Kartica</option>
                    </select>
                </p>
            </div>
            <div class="row justify-content-center">
                <button class="col-2 btn btn-primary my-3 kupi">ZAVRSI</button>
            </div>

            @endif
        
    </div>
    <script>
    
    document.querySelector('.kupi').onclick = function(){

        let lis = document.querySelectorAll('li.list-group-item-info');
        let niz = [];
        for(let li of lis){
            // let pr = {};
            // pr.jsp = li.querySelector('.jsp').innerHTML;
            // pr.naziv = li.querySelector('.naziv').innerHTML;
            // pr.cena = parseFloat(li.querySelector('.cena').innerHTML);
            // pr.kol = li.querySelector('input').value;
            kol = li.querySelector('input').value;

            niz.push(kol);
        }
        let placanje = document.querySelector('#placanje').value;

        let opcije = {
                method: 'POST', 
                headers: {
                    "X-CSRF-Token": document.querySelector('input[name="_token"]').value,
                    'Content-Type': 'application/json'   //BITNO!!!
                },
                body: JSON.stringify({niz:niz, placanje:placanje})
            } 
        fetch('/prodavnica/upisFakture', opcije)
            .then(resp=>resp.text())
            .then(txt=>console.log(txt));
    }
    
    </script>
</body>
</html>