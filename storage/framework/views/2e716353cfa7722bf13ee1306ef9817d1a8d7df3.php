<!DOCTYPE html>
<?php echo $__env->make('head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body>
    <?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('layouts.back', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('layouts.cart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <div class="container">
        <div class="row justify-content-center">
            <div class="card m-3 w-50 h-50">
                <p class="m-1"><span class="d-inline-block w-25">NAZIV</span><?php echo e($proizvod->Naziv); ?></p>
                <hr>
                <p class="m-1"><span class="d-inline-block w-25">CENA</span><?php echo e($proizvod->Cena); ?></p>
                <hr>
                <p class="m-1"><span class="d-inline-block w-25">OPIS</span><?php echo e($proizvod->Karakteristike); ?></p>
                <hr>
                <p class="m-1"><span class="d-inline-block w-25">PROIZVODJAC</span><?php echo e($proizvod->Label); ?></p>
                <hr>
                <p class="m-1"><span class="d-inline-block w-25">VRSTA</span><?php echo e($proizvod->Vrsta); ?></p>
            </div>
        </div>
        <div class="row justify-content-center">
            <a href="/prodavnica/<?php echo e($proizvod->JSP); ?>/ubaci" class="btn btn-danger text-white">KUPI</a>
        </div>

    </div>
    <?php echo $__env->make('boots', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html><?php /**PATH C:\xampp\htdocs\webshop\resources\views/jedan_proizvod.blade.php ENDPATH**/ ?>