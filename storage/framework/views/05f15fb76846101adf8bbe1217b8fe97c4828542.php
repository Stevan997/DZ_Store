<!DOCTYPE html>
<?php echo $__env->make('head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body>
    <?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('layouts.back', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('layouts.cart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="container">
        <div class="row justify-content-center">
            <form method="post" action="/prodavnica/filter" class="form m-2">
                <span>SORT</span>
                <?php echo csrf_field(); ?>
                <select name="sort" id="sort">
                    <option value="naziv" selected>Naziv</option>
                    <option value="JSP">ID</option>
                </select>
                <select name="way" id="way">
                    <option value="asc" selected>UP</option>
                    <option value="desc" selected>DOWN</option>
                </select>
                <input type="submit" value="SUBMIT" class="btn btn-primary">
            </form>
        </div>
        <div class="row justify-content-around">   
        <?php $__currentLoopData = $proizvodi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card m-3 col-md-2">
                <span><?php echo e($p->JSP); ?> - <?php echo e($p->Naziv); ?></span>
                <a href="/prodavnica/<?php echo e($p->JSP); ?>">DETALJNIJE</a>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <?php echo $__env->make('boots', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
    
<?php /**PATH C:\xampp\htdocs\webshop\resources\views/webshop.blade.php ENDPATH**/ ?>