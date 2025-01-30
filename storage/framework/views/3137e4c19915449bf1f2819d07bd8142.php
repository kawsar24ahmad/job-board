

<?php $__env->startSection('title', 'Register Page'); ?>

<?php $__env->startSection('content'); ?>
<section class="h-100 bg-dark">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-6">
                <div class="card shadow-lg border-0 rounded-3">
                    <div class="card-body p-5 text-center">
                        <h3 class="mb-4 text-uppercase text-primary">Registration Form</h3>
                        <p class="text-muted mb-4">Choose how you want to register:</p>
                        <div class="d-grid gap-3">
                            <a href="<?php echo e(route('company.register')); ?>" class="btn btn-outline-primary btn-lg">Register as a Company</a>
                            
                        </div>
                        <div class="d-grid gap-3 pt-3">
                        <a href="<?php echo e(route('user.register')); ?>" class="btn btn-outline-secondary btn-lg">Register as a User</a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laravelcareerpathCourse\assignments\team-project\test\job-board\resources\views/register.blade.php ENDPATH**/ ?>