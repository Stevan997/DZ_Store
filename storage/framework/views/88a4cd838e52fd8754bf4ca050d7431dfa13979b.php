<!DOCTYPE html>
<?php echo $__env->make('head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="container text-center w-75">

    <h2 class='text-center py-4'>ADMIN PANEL</h2>
    <a class="fm text-center w-100 p-3" href="/adminpanel/forma">FORMA ZA UNOS PROIZVODA</a><br>
    <a class="fm text-center w-100 p-3" href="#">FORMA ZA UNOS KORISNIKA</a><br>
    <a class="fm text-center w-100 p-3" href="/adminpanel/korisniciPregled">PREGLED KORISNIKA</a><br>
    <a class="fm text-center w-100 p-3" href="/adminpanel/proizvodiPregled">PREGLED PROIZVODA</a><br>
</div>
<?php echo $__env->make('boots', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html><?php /**PATH C:\xampp\htdocs\webshop\resources\views/admin.blade.php ENDPATH**/ ?>