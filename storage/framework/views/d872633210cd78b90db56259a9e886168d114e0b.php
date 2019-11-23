<!DOCTYPE html>
<?php echo $__env->make('head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body>
    <?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('layouts.back', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('layouts.cart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <div class="container">
        <div class="row justify-content-center">
            <form method="post" action="/adminpanel/proizvodiPregled/filter" class="form m-2">
                <span>SORT</span>
                <?php echo csrf_field(); ?>
                <select name="sort" id="sort">
                    <option value="naziv" selected>Naziv</option>
                    <option value="JSP">ID</option>
                </select>
                <select name="way" id="way">
                    <option value="asc" selected>UP</option>
                    <option value="desc">DOWN</option>
                </select>
                <input type="submit" value="SUBMIT" class="btn btn-primary">
            </form>
        </div>
        <div class="row justify-content-center">
                <?php if(count($cart) == 0): ?>
                    <h1 class="my-5">KORPA JE PRAZNA!</h1>
                <?php else: ?>
                    <ul class="list-group w-100"> 
                        <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="list-group-item list-group-item-info m-1">
                                <p class="w-75" ><?php echo e($c->JSP); ?> - <?php echo e($c->Naziv); ?></p>
                                <a class="btn btn-primary mx-1" href="<?php echo e($c->JSP); ?>/izbaci">OBRISI</a>                        
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php endif; ?>
        </div>
        <div class="row justify-content-center">
            <?php if(count($cart) !== 0): ?>
                <p class="col-10 text-center display-4 m-5">Cena: <?php echo e($price); ?>din</p>
                <a class="col-4 btn btn-primary m-3" href="#">ZAVRSI</a>
            <?php endif; ?>
        </div>
        
    </div>
    <?php echo $__env->make('boots', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html><?php /**PATH C:\xampp\htdocs\webshop\resources\views/korpa.blade.php ENDPATH**/ ?>