<?php if(isset(Auth::user()->Administrator) and Auth::user()->Administrator == '1'): ?>
    <a class="link-2 m-3" href="/adminpanel">DZ Store</a>    
<?php else: ?>
    <a class="link-2 m-3" href="/prodavnica">DZ Store</a>        
<?php endif; ?><?php /**PATH C:\xampp\htdocs\webshop\resources\views/layouts/back.blade.php ENDPATH**/ ?>