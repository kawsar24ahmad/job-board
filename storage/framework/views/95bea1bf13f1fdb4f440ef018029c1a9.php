

<?php $__env->startSection('content'); ?>

<?php if(session('error')): ?>
    <div class="alert alert-danger">
        <?php echo e(session('error')); ?>

    </div>
<?php endif; ?>
<?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>

<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <p class="card-title mb-4 text-center">Job Posts List</p>
          <div class="table-responsive">
            <table class="table table-striped table-borderless text-center">
              <thead>
                <tr>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Tags</th>
                  <th>Category</th>
                  <th>Location</th>
                  <th>Type</th>
                  <th>Salary</th>
                  <th>Application Link</th>
                  <th>Expire Date</th>
                  <th>Views</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>  
              </thead>
              <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $jobPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jobPost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                  <tr>
                    <td><?php echo e($jobPost->title); ?></td>
                    <td class="font-weight-bold"><?php echo e($jobPost->description); ?></td>
                    <td>
                        <?php $__currentLoopData = json_decode($jobPost->tags); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <span class="badge badge-info"><?php echo e($tag); ?></span>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </td>
                    <td><?php echo e($jobPost->category->name); ?></td>
                    <td><?php echo e($jobPost->location); ?></td>
                    <td><?php echo e($jobPost->job_type); ?></td>
                    <td><?php echo e($jobPost->salary_range); ?></td>
                    <td class="font-weight-medium">
                      <a href="<?php echo e($jobPost->application_link); ?>" target="_blank" class="badge badge-success">Apply</a>
                    </td>
                    <td><?php echo e($jobPost->expire_date->diffForHumans()); ?></td>
                    <td><?php echo e($jobPost->views); ?></td>
                    <td><?php echo e($jobPost->status); ?></td>
                    <td class="d-flex align-items-center gap-3">
                    <form action="<?php echo e(route('job-posts.activate', $jobPost->id)); ?>" method="POST" onsubmit="return confirm('Are you sure you want to activate this job post?')">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <button type="submit" class="btn btn-success btn-sm">Activate</button>
                      </form>
                      <form action="<?php echo e(route('job-posts.deactivate', $jobPost->id)); ?>" method="POST" onsubmit="return confirm('Are you sure you want to deactivate this job post?')">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <button type="submit" class="btn btn-danger btn-sm">Deactivate</button>
                      </form>
                    </td>
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                  <tr>
                    <td colspan="10" class="text-center">No job posts available.</td>
                  </tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.company-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laravelcareerpathCourse\assignments\team-project\test\job-board\resources\views/company/job-posts/index.blade.php ENDPATH**/ ?>