

<?php $__env->startSection('auth_name'); ?>
<?php echo e(auth()->guard('company')->user()->name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('logout'); ?>
<a class="dropdown-item" href="<?php echo e(route('company.logout')); ?>">
    <i class="ti-power-off text-primary"></i>
    Logout
</a>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laravelcareerpathCourse\assignments\team-project\test\job-board\resources\views/company/dashboard.blade.php ENDPATH**/ ?>