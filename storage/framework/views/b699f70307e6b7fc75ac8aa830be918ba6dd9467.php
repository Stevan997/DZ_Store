<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<?php echo $__env->make('head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.back', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body>
<div class="container text-right w-75">
    <h2 class="py-4 text-center">IZMENA PROIZVODA</h2>
    <div class="row justify-content-center">
        <form method="POST" action="/adminpanel/proizvodiPregled/<?php echo e($p->JSP); ?>">
            <?php echo csrf_field(); ?> 
            <?php echo method_field('PUT'); ?>
            Broj proizvoda: <input type="number" value="<?php echo e($p->JSP); ?>" name="JSP" class="m-2"><br>
            Naziv: <input name="Naziv" class="m-2" value="<?php echo e($p->Naziv); ?>" /><br>
            Grupa: <input name="Grupa" class="m-2" value="<?php echo e($p->Grupa); ?>"><br>
            Vrsta: <input name="Vrsta" class="m-2" value="<?php echo e($p->Vrsta); ?>"><br>
            Slika: <input name="Slika" class="m-2" value="<?php echo e($p->Slika); ?>"/><br>
            Proizvodjac: <input name="Label" class="m-2"  value="<?php echo e($p->Label); ?>"><br>
            Karakteristike: <input name="Karakteristike" class="m-2" value="<?php echo e($p->Karakteristike); ?>"/><br>
            Cena: <input name="Cena" type="number" class="m-2"  value="<?php echo e($p->Cena); ?>" /><br>
            Stanje: <input name="Stanje" type="number" class="m-2" value="<?php echo e($p->Stanje); ?>"><br>
            Mogucnost nabavke: <select name="Nabavka" class="m-2">
                <option value="1" <?php if($p->Mog_nab == "1"): ?> selected <?php endif; ?>>DA</option>
                <option value="0" <?php if($p->Mog_nab == "0"): ?> selected <?php endif; ?>>NE</option>  
            </select><br>
            <input type="submit" value="Posalji" class="m-2 btn btn-primary" /><br>
        </form>
    </div>
</div>

<?php echo $__env->make('boots', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html><?php /**PATH C:\xampp\htdocs\webshop\resources\views/formaIzmena.blade.php ENDPATH**/ ?>