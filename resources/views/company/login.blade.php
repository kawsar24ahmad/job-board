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
  <div class="form-container">
    <h1 class="text-center mb-4">Company Login Form</h1>
    <form class="forms-sample" action="{{route('company.login')}}" method="post">
    @csrf
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
@error('email')
    <p class="text-danger">{{ $message}}</p>
@enderror
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
@error('password')
    <p class="text-danger">{{ $message}}</p>
@enderror
      </div>
      <!-- <div class="mb-3">
        <label for="exampleInputConfirmPassword1" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" id="exampleInputConfirmPassword1" placeholder="Password">
      </div> -->
      <!-- <div class="form-check mb-3">
        <input type="checkbox" class="form-check-input" id="rememberMe">
        <label class="form-check-label" for="rememberMe">Remember me</label>
      </div> -->
      <button type="submit" class="btn btn-primary w-100 mb-2">Submit</button>
      <!-- <button type="button" class="btn btn-light w-100">Cancel</button> -->
    </form>
  </div>
  <!-- Bootstrap JS (optional) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
