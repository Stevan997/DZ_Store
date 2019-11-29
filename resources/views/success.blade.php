<!DOCTYPE html>
@include('head')
<body>
    @if (isset(Auth::user()->Administrator) and Auth::user()->Administrator == '1')
        <div class="w-100 text-center p-5">
            <h2 class="display-3">ODRADJENO!</h2>
    
            <a href="/adminpanel" class="display-4">Nazad na panel</a> 
        </div>
        
    @else
        <div class="w-100 text-center p-5">
            <h2 class="display-3">ODRADJENO!</h2>
    
            <a href="/prodavnica" class="display-4">DZ Store</a> 
        </div>
    @endif

</body>
</html>
