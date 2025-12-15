<!doctype html>
<html lang="ar" dir="rtl">
<?php echo $__env->make('includes.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body id="kt_body" data-bs-spy="scroll" data-bs-target="#kt_landing_menu" data-bs-offset="200"
      class="bg-white position-relative">

<div class="d-flex flex-column flex-root">
    <div class="mb-0" id="home" style="border-bottom: 1px solid white;">

        <div class="bgi-no-repeat bgi-size-contain bgi-position-x-center bgi-position-y-bottom landing-dark-bg"
             style="background-image: url(<?php echo e(asset('template/assets/media/svg/illustrations/landing.svg')); ?>);padding: 8px 0;">
            
            <?php echo $__env->make('front.includes.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>

    
    <?php echo $__env->yieldContent('content'); ?>


    
    <?php echo $__env->make('front.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</div>

<?php echo $__env->make('includes.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php /**PATH /var/www/html/resources/views/front/layout.blade.php ENDPATH**/ ?>