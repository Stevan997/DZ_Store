@if (isset(Auth::user()->Administrator) and Auth::user()->Administrator == '1')
    <a class="link-2 m-3" href="/adminpanel">DZ Store</a>    
@else
    <a class="link-2 m-3" href="/prodavnica">DZ Store</a>        
@endif