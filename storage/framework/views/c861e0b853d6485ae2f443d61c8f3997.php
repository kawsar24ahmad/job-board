

<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
          <h3 class="font-weight-bold">Welcome <?php echo e(auth()->guard('admin')->name); ?></h3>
          <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6>
        </div>
        <div class="col-12 col-xl-4">
          <div class="justify-content-end d-flex">
          <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
            <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
              <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
              <a class="dropdown-item" href="#">January - March</a>
              <a class="dropdown-item" href="#">March - June</a>
              <a class="dropdown-item" href="#">June - August</a>
              <a class="dropdown-item" href="#">August - November</a>
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <p class="card-title mb-4 text-center">Company List</p>
          <div class="table-responsive">
            <table class="table table-striped table-borderless text-center">
              <thead>
                <tr>
                  <th>Company Name</th>
                  <th>Email</th>
                  <th>Contract Number</th>
                  <th>Website</th>
                  <th>Description</th>
                  <th>Address</th>
                  <th>Status</th>
                  <th>Approved / Rejected By</th>
                  <th>Action</th>
                </tr>  
              </thead>
              <tbody>
                <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($company->name); ?></td>
                    <td class="font-weight-bold"><?php echo e($company->email); ?></td>
                    <td><?php echo e($company->contact_number); ?></td>
                    <td><?php echo e($company->website_link); ?></td>
                    <td><?php echo e(substr($company->description, 0, 5)); ?></td>
                    <td><?php echo e($company->address); ?></td>
                    <td class="font-weight-medium"><div class="badge badge-success"><?php echo e($company->status); ?></div></td>
                    <td>
                      <?php if($company->approvedBy): ?>
                          <?php echo e($company->approvedBy->name); ?>

                      <?php else: ?>
                          Not approved
                      <?php endif; ?>
                    </td>
                    <td class="d-flex align-items-center gap-3">
<form action="<?php echo e(route('admin.approve', $company->id)); ?>" method="post">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
  
    <button
        type="submit"
        <?php echo e($company->status== "approved" ? "disabled" : ""); ?>

        class="btn btn-success btn-sm rounded-pill px-3 shadow-sm d-flex align-items-center"
    >
        <i class="bi bi-check-lg me-2"></i>
    </button>
</form>

<form action="<?php echo e(route('admin.reject', $company->id)); ?>" method="post">
  <?php echo csrf_field(); ?>
  <?php echo method_field('PUT'); ?>
<button
                        type="submit" 
                        <?php echo e($company->status== "rejected" ? "disabled" : ""); ?>

                        class="btn btn-danger btn-sm rounded-pill px-3 shadow-sm d-flex align-items-center"
                      >
                        <i class="bi bi-x-lg me-2"></i> 
                      </button>
</form>
                      
                    </td>


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

<?php echo $__env->make('layouts.admin-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laravelcareerpathCourse\assignments\team-project\test\job-board\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>