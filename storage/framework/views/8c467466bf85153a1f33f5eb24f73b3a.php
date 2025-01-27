<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('job-posts.create')); ?>">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Create a job post</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('job-posts.index')); ?>">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Manage All Job Posts</span>
            </a>
          </li>


          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse"  aria-expanded="false" aria-controls="auth">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">User Pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
              </ul>
            </div>
          </li>


        </ul>
      </nav>
      <!-- partial --><?php /**PATH F:\laravelcareerpathCourse\assignments\team-project\test\job-board\resources\views/layouts/partials/company-sidebar.blade.php ENDPATH**/ ?>