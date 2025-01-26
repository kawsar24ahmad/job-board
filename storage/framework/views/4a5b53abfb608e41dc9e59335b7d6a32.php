<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="admin/vendors/feather/feather.css">
  <link rel="stylesheet" href="admin/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="admin/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" type="text/css" href="admin/js/select.dataTables.min.css">
  <link rel="stylesheet" href="admin/css/vertical-layout-light/style.css">
  <link rel="shortcut icon" href="admin/images/favicon.png" />
  <style>
    .form-container {
      max-width: 400px;
      background: white;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-light">
<section class="h-100">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card card-registration my-4">
          <div class="row g-0">

                <div class="card-body p-md-5 text-black">
                    <h3 class="mb-5 text-uppercase">Company registration form</h3>

                    <form action="<?php echo e(route('company.register')); ?>" method="post">
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

                            <label class="form-label" for="form3Example1m">Company Name</label>
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
                        </div>

                        <div class="row">
                        <div class="col-md-6 mb-4">
                            <div data-mdb-input-init class="form-outline">
                            <input type="text" name="contact_number" id="form3Example1m1" class="form-control form-control-lg" />
<?php $__errorArgs = ['contact_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
    <p class="text-danger"><?php echo e($message); ?></p>
<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <label class="form-label" for="form3Example1m1">Contact Number</label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div data-mdb-input-init class="form-outline">
                            <input type="text" name="website_link" id="form3Example1n1" class="form-control form-control-lg" />
<?php $__errorArgs = ['website_link'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
    <p class="text-danger"><?php echo e($message); ?></p>
<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <label class="form-label" for="form3Example1n1">Website Link</label>
                            </div>
                        </div>
                        </div>

                        <div data-mdb-input-init class="form-outline mb-4">
                        <input type="text" name="address" id="form3Example8" class="form-control form-control-lg" />
<?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
    <p class="text-danger"><?php echo e($message); ?></p>
<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <label class="form-label" for="form3Example8">Address</label>
                        </div>


                        <div class="d-flex justify-content-end pt-3">
                        <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-light btn-lg">Reset all</button>
                        <button  type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-warning btn-lg ms-2">Submit form</button>
                        </div>
                    </form>

                </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  <!-- Bootstrap JS (optional) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH F:\laravelcareerpathCourse\assignments\team-project\test\job-board\resources\views/company/register.blade.php ENDPATH**/ ?>