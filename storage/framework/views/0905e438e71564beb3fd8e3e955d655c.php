<?php if(auth()->guard()->guest()): ?>
    <div class="mt-20 mb-n20 position-relative z-index-2">

        <div class="container">
            <div class="d-flex flex-stack flex-wrap flex-md-nowrap card-rounded shadow p-8 p-lg-12 mb-n5 mb-lg-n13"
                 style="background: linear-gradient(90deg, #20AA3E 0%, #03A588 100%);">

                <div class="my-2 me-5">

                    <div class="fs-1 fs-lg-2qx fw-bolder text-white mb-2">
                        قم بتسجيل الدخول لتحصل على المزيد من المزايا !
                    </div>

                    <div class="fs-6 fs-lg-5 text-white fw-bold opacity-75">
                        عندما تقوم بتسجيل الدخول سيتم تسجيل جميع معلوماتك ونتائج الاختبارات والأبواب التي درستها
                    </div>
                </div>

                <a href="<?php echo e(route('login')); ?>"
                   class="btn btn-lg btn-outline border-2 btn-outline-white flex-shrink-0 my-2">
                    <?php echo e(__('Login')); ?>

                </a>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH /var/www/html/resources/views/components/not-logged-in.blade.php ENDPATH**/ ?>