<!DOCTYPE html>
<?php echo $__env->make('head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body>
    <?php if(isset(Auth::user()->Administrator) and Auth::user()->Administrator == '1'): ?>
        <div class="w-100 text-center p-5">
            <h2 class="display-3">ODRADJENO!</h2>
    
            <a href="/adminpanel" class="display-4">Nazad na panel</a> 
        </div>
        
    <?php else: ?>
        <div class="w-100 text-center p-5">
            <h2 class="display-3">ODRADJENO!</h2>
    
            <a href="/prodavnica" class="display-4">DZ Store</a> 
        </div>
    <?php endif; ?>
    
    
    <?php echo $__env->make('boots', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\webshop\resources\views/success.blade.php ENDPATH**/ ?>