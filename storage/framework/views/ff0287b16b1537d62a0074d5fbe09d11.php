<?php $__env->startSection('auth_content'); ?>
    <form class="form w-100" action="<?php echo e(route('authenticate')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div class="text-center mb-10">
            <h1 class="text-dark mb-3"><?php echo e(__('Login')); ?></h1>
        </div>

        <?php if(Session::has('success-rest-password')): ?>
            <p class="alert alert-success fs-4"><?php echo e(Session::get('success-rest-password')); ?></p>
        <?php endif; ?>

        
        <div class="fv-row mb-10">
            <label class="form-label fs-6 fw-bolder text-dark"><?php echo e(__('Email')); ?></label>
            <input class="form-control form-control-lg form-control-solid" type="text" name="email"
                   value="<?php echo e(old('email')); ?>"/>
            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="text-danger">
                <?php echo e($message); ?>

            </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        
        <div class="fv-row mb-10">
            <div class="d-flex flex-stack mb-2">
                <label class="form-label fw-bolder text-dark fs-6 mb-0"><?php echo e(__('Password')); ?></label>
                <a href="<?php echo e(route("password.request")); ?>" class="link-primary fs-6 fw-bolder"><?php echo e(__('Forgot Password ?')); ?></a>
            </div>
            <input class="form-control form-control-lg form-control-solid" type="password" name="password"/>

            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="text-danger">
                <?php echo e($message); ?>

            </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        
        <div class="text-center">
            <button type="submit" class="btn btn-lg btn-primary w-100 mb-5">
                <span class="indicator-label"><?php echo e(__('Login')); ?></span>
            </button>
        </div>

        
        <div class="mt-5">
            <span class="fs-6"><?php echo e(__('You don\'t have account ?')); ?></span>
            <a href="<?php echo e(route('register')); ?>" class="link-success fs-6 fw-bolder ms-1"><?php echo e(__('Register Now')); ?></a>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('auth.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/auth/login.blade.php ENDPATH**/ ?>