<!DOCTYPE html>
    <?php echo $__env->make('head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <body>
        <?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="flex-center position-ref full-height">
            

            <div class="content">
                <?php $__env->startSection('content'); ?>


                <?php echo $__env->yieldSection(); ?>

            </div>
        </div>

        <?php echo $__env->make('boots', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </body>
</html>

<?php /**PATH C:\xampp\htdocs\webshop\resources\views/welcome.blade.php ENDPATH**/ ?>