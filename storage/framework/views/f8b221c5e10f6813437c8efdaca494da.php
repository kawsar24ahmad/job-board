

<?php $__env->startSection('title'); ?>
Register Page
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<section class="h-100 bg-dark">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card card-registration my-4">
          <div class="row g-0">

                <div class="card-body p-md-5 text-black">
                    <h3 class="mb-5 text-uppercase">User registration form</h3>

                    <form action="<?php echo e(route('user.register')); ?>" method="post">
                        <?php echo csrf_field(); ?>


                        <div class="row">
                        <div class="col-md-6 mb-4">
                            <div data-mdb-input-init class="form-outline">
                            <input type="text" name="name" id="form3Example1m" class="form-control form-control-lg" />

<?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
    <p class="text-danger"><?php echo e($message); ?></p>
<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                            <label class="form-label" for="form3Example1m"> Name</label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div data-mdb-input-init class="form-outline">
                            <input type="email" name="email" id="form3Example1n" class="form-control form-control-lg" />
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-danger"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <label class="form-label" for="form3Example1n">Email</label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div data-mdb-input-init class="form-outline">
                            <input type="password" name="password" id="form3Example1n" class="form-control form-control-lg" />
                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-danger"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <label class="form-label" for="form3Example1n">Password</label>
                            </div>
                        </div>
                        
                        </div>

                     
                      

                        <div class="d-flex justify-content-end pt-3">
                     
                        <button  type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-warning btn-lg ms-2">Register</button>
                        </div>
                    </form>

                </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laravelcareerpathCourse\assignments\team-project\test\job-board\resources\views/user/register.blade.php ENDPATH**/ ?>