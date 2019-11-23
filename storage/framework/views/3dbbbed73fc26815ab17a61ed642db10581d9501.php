<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<?php echo $__env->make('head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.back', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body>
<div class="container text-right w-75">
    <h2 class="py-4 text-center">UNOS PROIZVODA</h2>
    <div class="row justify-content-center">
        <form method="POST" action="/adminpanel">
            <?php echo csrf_field(); ?> 
            Broj proizvoda: <input type="number" name="JSP" class="m-2"><br>
            Naziv: <input name="Naziv" class="m-2" /><br>
            Grupa: <input name="Grupa" class="m-2"><br>
            Vrsta: <input name="Vrsta" class="m-2"><br>
            Slika: <input name="Slika" class="m-2" /><br>
            Proizvodjac: <input name="Label" class="m-2"><br>
            Karakteristike: <input name="Karakteristike" class="m-2" /><br>
            Cena: <input name="Cena" type="number" class="m-2" /><br>
            Stanje: <input name="Stanje" type="number" class="m-2"><br>
            Mogucnost nabavke: <select name="Nabavka" class="m-2">
                <option value="1">DA</option>
                <option value="0">NE</option>  
            </select><br>
            <input type="submit" value="Posalji" class="m-2 btn btn-primary" /><br>
        </form>
    </div>
</div>

<?php echo $__env->make('boots', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\webshop\resources\views/forma.blade.php ENDPATH**/ ?>