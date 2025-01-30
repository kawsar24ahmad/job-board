<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
  

  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <p class="card-title mb-4 text-center">Category List</p>
          <div class="table-responsive">
            <table class="table table-striped table-borderless text-center">
              <thead>
                <tr><form action="<?php echo e(route('category.create')); ?>" method="get">
    
  
    <button
        type="submit"
        
        class="btn btn-success btn-sm rounded-pill px-3 shadow-sm d-flex align-items-center"
    >
        Add new Category
    </button>
</form></tr>
              </thead>
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Posts Count</th>
                  <th>Created By</th>
                  <th>Action</th>
                  <!-- <th>Action</th> -->
                </tr>  
              </thead>
              <tbody>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($category->id); ?></td>
                    <td class="font-weight-bold"><?php echo e($category->name); ?></td>
                    <td class="font-weight-bold"><?php echo e($category->jobPosts->count()); ?></td>
                    <td class="font-weight-bold"><?php echo e($category->admin->name); ?></td>
                    <td><form action="<?php echo e(route('category.delete', $category->id)); ?>" method="POST" onsubmit="return confirm('Are you sure you want to Delete this category?')">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                      </form></td>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laravelcareerpathCourse\assignments\team-project\test\job-board\resources\views/category/index.blade.php ENDPATH**/ ?>