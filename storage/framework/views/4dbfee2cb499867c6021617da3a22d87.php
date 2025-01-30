

<?php $__env->startSection('title'); ?>
Job details Page
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

 <!-- Hero Area Start-->
 <div class="slider-area ">
        <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="assets/img/hero/about.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2><?php echo e($jobPost->category->name); ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- Hero Area End -->
        <!-- job post company Start -->
        <div class="job-post-company pt-120 pb-120">
            <div class="container">
                <div class="row justify-content-between">
                    <!-- Left Content -->
                    <div class="col-xl-7 col-lg-8">
                        <!-- job single -->
                        <div class="single-job-items mb-50">
                            <div class="job-items">
                                <div class="company-img company-img-details">
                                    <a href="#"><img src="assets/img/icon/job-list1.png" alt=""></a>
                                </div>
                                <div class="job-tittle">
                                    <a href="#">
                                        <h4><?php echo e($jobPost->title); ?></h4>
                                    </a>
                                    <ul>
                                        <li><?php echo e($jobPost->company->name); ?></li>
                                        <li><i class="fas fa-map-marker-alt"></i><?php echo e($jobPost->location); ?></li>
                                        <li>$<?php echo e($jobPost->salary_range); ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                          <!-- job single End -->
                       
                        <div class="job-post-details">
                            <div class="post-details1 mb-50">
                                <!-- Small Section Tittle -->
                                <div class="small-section-tittle">
                                    <h4>Job Description</h4>
                                </div>
                                <p><?php echo e($jobPost->description); ?></p>
                            </div>
                            
                           
                        </div>

                    </div>
                    <!-- Right Content -->
                    <div class="col-xl-4 col-lg-4">
                        <div class="post-details3  mb-50">
                            <!-- Small Section Tittle -->
                           <div class="small-section-tittle">
                               <h4>Job Overview</h4>
                           </div>
                          <ul>
                              <li>Posted date : <span><?php echo e($jobPost->created_at->format('d-M-Y')); ?></span></li>
                              <li>Location : <span><?php echo e($jobPost->location); ?></span></li>
                              <li>Category : <span><?php echo e($jobPost->category->name); ?></span></li>
                              <li>Vacancy : <span>02</span></li>
                              <li>Job nature : <span><?php echo e($jobPost->job_type); ?></span></li>
                              <li>Salary :  <span>$<?php echo e($jobPost->salary_range); ?></span></li>
                              <li>Application date : <span><?php echo e($jobPost->expire_date->format('d-M-Y')); ?></span></li>
                          </ul>
                         <div class="apply-btn2">
                            <a href="<?php echo e($jobPost->application_link); ?>" class="btn">Apply Now</a>
                         </div>
                       </div>
                        <div class="post-details4  mb-50">
                            <!-- Small Section Tittle -->
                           <div class="small-section-tittle">
                               <h4>Company Information</h4>
                           </div>
                              <span><?php echo e($jobPost->company->name); ?></span>
                              <p><?php echo e($jobPost->company->description); ?></p>
                            <ul>
                                <li>Name: <span><?php echo e($jobPost->company->name); ?></span></li>
                                <li>Web : <span> <?php echo e($jobPost->company->website_link); ?></span></li>
                                <li>Email: <span><?php echo e($jobPost->company->email); ?></span></li>
                            </ul>
                       </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- job post company End -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laravelcareerpathCourse\assignments\team-project\test\job-board\resources\views/job-details.blade.php ENDPATH**/ ?>