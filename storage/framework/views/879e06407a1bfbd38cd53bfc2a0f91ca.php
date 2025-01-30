<header>
        <!-- Header Start -->
       <div class="header-area header-transparrent">
           <div class="headder-top header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-2">
                            <!-- Logo -->
                            <div class="logo">
                                <a href="<?php echo e(route('home')); ?>"><img src="assets/img/logo/logo.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <div class="menu-wrapper">
                                <!-- Main-menu -->
                                <div class="main-menu">
                                    <nav class="d-none d-lg-block">
                                        <ul id="navigation">
                                            <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
                                            <li><a href="<?php echo e(route('job-listing')); ?>">Find a Jobs </a></li>
                                            <li><a href="about.html">About</a></li>
                                            <li><a href="#">Page</a>
                                                <ul class="submenu">
                                                    <li><a href="blog.html">Blog</a></li>
                                                    <li><a href="single-blog.html">Blog Details</a></li>
                                                    <li><a href="elements.html">Elements</a></li>
                                                    <li><a href="job_details.html">job Details</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="contact.html">Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                                <!-- Header-btn -->
                                <?php if(auth()->guard()->guest()): ?>
    <div class="header-btn d-none d-lg-block f-right">
        <a href="<?php echo e(route('register')); ?>" class="btn btn-primary head-btn1">Register</a>
        <a href="<?php echo e(route('login')); ?>" class="btn btn-outline-primary head-btn2">Login</a>
    </div>
<?php endif; ?>

<?php if(auth()->guard()->check()): ?>
<?php if(auth()->user()->role == 'user'): ?>

<?php endif; ?>
    <div class="header-btn d-none d-lg-block f-right">
        <div class="dropdown d-inline">
            <button class="btn btn-primary dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <?php echo e(auth()->user()->name); ?>

            </button>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li>
                    <form action="<?php echo e(route('user.logout')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="dropdown-item text-danger">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
<?php endif; ?>

                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
           </div>
       </div>
        <!-- Header End -->
    </header>
<?php /**PATH F:\laravelcareerpathCourse\assignments\team-project\test\job-board\resources\views/layouts/partials/header.blade.php ENDPATH**/ ?>