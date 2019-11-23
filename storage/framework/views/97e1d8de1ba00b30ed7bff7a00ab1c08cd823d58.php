<!DOCTYPE html>
<?php echo $__env->make('head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body>
    <?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('layouts.back', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
            <ul class="list-group w-100">  
                <?php $__currentLoopData = $proizvodi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="list-group-item list-group-item-info m-1">
                        <p class="w-75" ><?php echo e($p->JSP); ?> - <?php echo e($p->Naziv); ?></p>
                        <a class="btn btn-primary mx-1" href="formaPregled/<?php echo e($p->JSP); ?>/proizvodi">IZMENI</a>
                        <a class="btn btn-primary mx-1" href="proizvodiPregled/obrisi/<?php echo e($p->JSP); ?>">OBRISI</a>                        
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>
    <?php echo $__env->make('boots', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html><?php /**PATH C:\xampp\htdocs\webshop\resources\views/poizvodiPregled.blade.php ENDPATH**/ ?>