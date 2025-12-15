<div class="mb-0">

    <div class="landing-curve landing-dark-color">
        <svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z"
                fill="currentColor"></path>
        </svg>
    </div>

    <div class="landing-dark-bg pt-20">
        <?php if(\Request::route()->getName() !== 'home'): ?>
            <div class="text-center mb-4">
                <img src="<?php echo e(asset('assets/book-title.svg')); ?>" class="w-lg-600px w-md-400px w-300px" alt="">
            </div>
        <?php endif; ?>
        <div class="container">
            <div class="d-flex flex-column flex-md-row flex-stack py-7 py-lg-10">
                <div class="d-flex align-items-center flex-column flex-md-row order-2 order-md-1">
                    <a href="<?php echo e(route('home')); ?>">
                        <img alt="Logo" src="<?php echo e(config('logo.default')); ?>"
                             class="h-70px my-10 my-md-0" style="filter:brightness(0) invert(1);"/>
                    </a>
                    <span class="mx-5 fs-6 fw-bold text-gray-600 pt-1" href="#"> جميع الحقوق محفوظة © 2022 .</span>
                </div>

                <ul class="menu menu-gray-600 menu-hover-primary fw-bold fs-6 fs-md-5 order-1 mb-5 mb-md-0">
                    <li class="menu-item">
                        <a href="<?php echo e(route('about_book')); ?>" class="menu-link px-2"><?php echo e(__('About Book')); ?></a>
                    </li>
                    <li class="menu-item mx-5">
                        <a href="<?php echo e(route('subjects.index')); ?>" class="menu-link px-2"><?php echo e(__('Subjects')); ?></a>
                    </li>
                    <li class="menu-item">
                        <a href="<?php echo e(route('download')); ?>" class="menu-link px-2"><?php echo e(__('Download Book')); ?></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>


<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
    <span class="svg-icon">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
             height="24px" viewBox="0 0 24 24" version="1.1">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <polygon points="0 0 24 0 24 24 0 24"/>
                <rect fill="#000000" opacity="0.5" x="11" y="10" width="2" height="10" rx="1"/>
                <path
                    d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z"
                    fill="#000000" fill-rule="nonzero"/>
            </g>
        </svg>
    </span>
</div>

<?php echo $__env->yieldPushContent('footer'); ?>
<?php /**PATH /var/www/html/resources/views/front/includes/footer.blade.php ENDPATH**/ ?>