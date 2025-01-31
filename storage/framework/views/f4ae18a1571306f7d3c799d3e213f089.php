<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Pricing Plans</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJzYbYQ6i7SSZaZmItiMXsA1EL2j0rUstX2fFl7+g9mF2KHZ5fFJtE6yAUR6w" crossorigin="anonymous">
  
  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Arial', sans-serif;
    }

    .pricing-card {
      border-radius: 15px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
      background: #fff;
      margin-bottom: 20px;
    }
    .pricing-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
    }

    .pricing-header {
      border-radius: 15px 15px 0 0;
      padding: 30px;
      color: #fff;
      text-align: center;
    }
    .pricing-header.free {
      background: linear-gradient(135deg, #6c757d, #adb5bd);
    }
    .pricing-header.premium {
      background: linear-gradient(135deg, #fbc531, #f39c12);
    }

    .pricing-header h4 {
      font-size: 1.5rem;
      font-weight: bold;
    }

    .pricing-header .h5 {
      font-size: 2.5rem;
      font-weight: bold;
      margin: 10px 0;
    }

    .pricing-header .small {
      font-size: 0.9rem;
      opacity: 0.8;
    }

    .list-group-item {
      border: none;
      padding: 15px 20px;
      font-size: 1rem;
      text-align: center;
    }

    .card-footer {
      border: none;
      background: transparent;
      padding: 20px;
    }

    .card-footer .btn {
      border-radius: 50px;
      font-weight: bold;
      padding: 12px 30px;
      font-size: 1rem;
      transition: all 0.3s ease;
    }

    .card-footer .btn-outline-primary {
      border-color: #007bff;
      color: #007bff;
    }

    .card-footer .btn-outline-primary:hover {
      background-color: #007bff;
      color: #fff;
    }

    .card-footer .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
    }

    .card-footer .btn-primary:hover {
      background-color: #0056b3;
      border-color: #0056b3;
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
    }

    .row {
      display: flex;
      justify-content: center;
    }

    .col-xl-6, .col-lg-6, .col-md-12, .col-sm-12 {
      padding: 15px;
    }
  </style>
</head>
<body>
  <div class="container py-5">
    <div class="row">
      <!-- Free Plan (Left) -->
      <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-4">
        <div class="card pricing-card">
          <div class="pricing-header free">
            <h4 class="card-title mb-0">Free</h4>
            <div class="h5">Free</div>
            <div class="small">For Starter Users</div>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Create Only 3 Job Posts</li>
          </ul>
          <div class="card-footer text-center">
            <a href="<?php echo e(route('company.register')); ?>" class="btn btn-outline-primary w-100">Select Plan</a>
          </div>
        </div>
      </div>

      <!-- Premium Plan (Right) -->
      <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-4">
        <div class="card pricing-card">
          <div class="pricing-header premium">
            <h4 class="card-title mb-0">Premium</h4>
            <div class="h5">$329.00</div>
            <div class="small">Best Value</div>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Create Unlimited Job Posts</li>
          </ul>
          <div class="card-footer text-center">
            <a href="<?php echo e(route('checkout')); ?>" class="btn btn-primary w-100">Select Plan</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS and Popper.js -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybGd1o0Lt35x8hJOV03d1hDOzKZSkFpcI0y5VowYOY2tB6C8M1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0p5NNq0kVbMd3j+8fiPfZnFtnCOc3BFXHTjzYOJ9K+n5OqG4" crossorigin="anonymous"></script>
</body>
</html><?php /**PATH F:\laravelcareerpathCourse\assignments\team-project\test\job-board\resources\views/company/pricing-plan.blade.php ENDPATH**/ ?>