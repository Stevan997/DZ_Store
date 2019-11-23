<?php if(auth()->guard()->guest()): ?>
    <a class="link m-2" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
    <?php if(Route::has('register')): ?>
        <a class="link m-2" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
    <?php endif; ?>
<?php else: ?>

    <a class="link m-2 mr-5" href="<?php echo e(route('logout')); ?>"
        onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
        <?php echo e(__('Logout')); ?>

    </a>

    <form class="link m-2 mr-5" id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
        <?php echo csrf_field(); ?>
    </form>


    <div class="dropdown link m-2">
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
            <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
        </button>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="/korisnik/promenaPodataka">Promena Podataka</a>
          <a class="dropdown-item" href="/korisnik/promenaLozinke">Promena Lozinke</a>
          <a class="dropdown-item" href="/korisnik/verifikovanje">Verifikovanje</a>

          <?php if( Auth::user()->Administrator == '0'): ?>
          <a class="dropdown-item" href="/korisnik/narudzbine">Narudzbine</a>
          <?php endif; ?>
        </div>
    </div>

    
<?php endif; ?>


<?php /**PATH C:\xampp\htdocs\webshop\resources\views/layouts/app.blade.php ENDPATH**/ ?>