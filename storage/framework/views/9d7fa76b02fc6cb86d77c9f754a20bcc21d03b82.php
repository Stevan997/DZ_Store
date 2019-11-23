<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<?php echo $__env->make('head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.back', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body>
<div class="container text-right w-75">
    <h2 class="py-4 text-center">IZMENA KORISNIKA</h2>
    <div class="row justify-content-center">
        <form method="POST" action="/adminpanel/korisniciPregled/<?php echo e($k->id); ?>">
            <?php echo csrf_field(); ?> 
            <?php echo method_field('PUT'); ?>
            Username: <input name="name" class="m-2" type="text" value="<?php echo e($k->name); ?>" /><br>
            Ime: <input name="Ime" class="m-2" value="<?php echo e($k->Ime); ?>"><br>
            Prezime: <input name="Prezime" class="m-2" value="<?php echo e($k->Prezime); ?>"><br>
            Adresa: <input name="Adresa" class="m-2" value="<?php echo e($k->Adresa); ?>"/><br>
            Grad: <input name="Grad" class="m-2"  value="<?php echo e($k->Grad); ?>"><br>
            Postanski Broj: <input name="Pos_br" class="m-2" value="<?php echo e($k->Pos_br); ?>"/><br>
            Email: <input name="email" type="email" class="m-2"  value="<?php echo e($k->email); ?>" /><br>
            Broj Telefona: <input name="Br_tel" type="number" class="m-2" value="<?php echo e($k->Br_tel); ?>"><br>
            Datum rodjenja: <input name="Dat_rod" type="text" class="m-2" value="<?php echo e($k->Dat_rod); ?>"><br>            
            Administrator: <select name="Administrator" class="m-2">
                <option value="1" <?php if($k->Administrator == "1"): ?> selected <?php endif; ?> >DA</option>
                <option value="0" <?php if($k->Administrator == "0"): ?> selected <?php endif; ?> >NE</option>  
            </select><br>
            <input type="submit" value="Posalji" class="m-2 btn btn-primary" /><br>
        </form>
    </div>
</div>

<?php echo $__env->make('boots', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html><?php /**PATH C:\xampp\htdocs\webshop\resources\views/formaIzmenaK.blade.php ENDPATH**/ ?>