<?php $__env->startSection('content'); ?>
    <div
        class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed py-20"
        style="background-image: url(assets/media/illustrations/development-hd.png)">
        <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
            <div class="w-lg-500px w-100 bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                <?php echo $__env->yieldContent('auth_content'); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/auth/layout.blade.php ENDPATH**/ ?>