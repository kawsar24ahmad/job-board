<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Company Registration</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="admin/vendors/feather/feather.css">
  <link rel="stylesheet" href="admin/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="admin/vendors/css/vendor.bundle.base.css">
  <style>
    .form-container {
      max-width: 600px;
      margin: auto;
      background: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .form-label {
      font-weight: 500;
    }
    .btn-custom {
      background-color: #ffc107;
      color: #000;
    }
    .btn-custom:hover {
      background-color: #e0a800;
      color: #fff;
    }
  </style>
</head>
<body class="bg-light d-flex align-items-center justify-content-center vh-100">

  <div class="form-container">
    <h3 class="mb-4 text-center text-uppercase">Registration Form</h3>
    <form action="{{ route('/pay') }}" method="post">
      @csrf
      <div class="mb-3">
        <label for="name" class="form-label">Company Name</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Enter company name" />
        @error('name')
          <p class="text-danger">{{ $message }}</p>
        @enderror
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="Enter email address" />
        @error('email')
          <p class="text-danger">{{ $message }}</p>
        @enderror
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Enter password" />
        @error('password')
          <p class="text-danger">{{ $message }}</p>
        @enderror
      </div>
      <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" id="description" class="form-control" rows="3" placeholder="Enter company description"></textarea>
        @error('description')
          <p class="text-danger">{{ $message }}</p>
        @enderror
      </div>
      <div class="mb-3">
        <label for="contact_number" class="form-label">Contact Number</label>
        <input type="text" name="contact_number" id="contact_number" class="form-control" placeholder="Enter contact number" />
        @error('contact_number')
          <p class="text-danger">{{ $message }}</p>
        @enderror
      </div>
      <div class="mb-3">
        <label for="website_link" class="form-label">Website Link</label>
        <input type="url" name="website_link" id="website_link" class="form-control" placeholder="Enter website link" />
        @error('website_link')
          <p class="text-danger">{{ $message }}</p>
        @enderror
      </div>
      <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <input type="text" name="address" id="address" class="form-control" placeholder="Enter address" />
        @error('address')
          <p class="text-danger">{{ $message }}</p>
        @enderror
      </div>
      <input type="number" hidden name="amount" id="" value="5">
      <div class="d-flex justify-content-between">
        <button type="reset" class="btn btn-light">Reset</button>
        <button type="submit" class="btn btn-custom">Submit</button>
      </div>
    </form>
  </div>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
