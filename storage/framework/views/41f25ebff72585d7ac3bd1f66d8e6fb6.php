<?php $__env->startPush('styles'); ?>
    <style>
        .symbol-home {
            width: 100% !important;
        }

        .symbol-home img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }

        .card .card-header {
            padding: 1.25rem 1.25rem 0 1.25rem !important;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>

    
    <?php echo $__env->make('front.includes.hero', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    
    <div class="">

        <div class="">
            <div class="container">
                <div class="text-center my-10" id="achievements" data-kt-scroll-offset="{default: 100, lg: 150}">
                    <h3 class="fs-2hx text-dark fw-bolder mb-5">
                        <?php echo e(__('Subjects')); ?>

                    </h3>
                </div>

                <div class="row gy-10 py-20">
                    <?php $__empty_1 = true; $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="col-12 col-md-3 text-center g-10">
                            <a href="<?php echo e(route('subjects.show' , $subject)); ?>" class="text-dark">
                                <div class="card shadow-sm h-300px w-100">
                                    <div
                                        class="card-header border-bottom-0 on-hover-d-none justify-content-center pt-5">
                                        <div class="symbol symbol-home">
                                            <img
                                                src="<?php echo e($subject->thumbnail_url); ?>"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div
                                            class="d-flex flex-column align-items-center justify-content-center gap-5 h-100">
                                            <a href="<?php echo e(route('subjects.show' , $subject)); ?>"
                                               class="fs-1 text-dark fw-bold text-hover-primary on-hover-text-white">
                                                <?php echo e($subject->title); ?>

                                            </a>



                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="col-12 text-center text-white fs-4">
                            <?php echo e(__('There is no subjects')); ?>

                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>


    </div>

    
    <div class="py-10 mb-lg-20 mb-10">
        <div class="container py-10">
            <div class="text-center mb-12">
                <h3 class="fs-2hx mb-5" id="team" data-kt-scroll-offset="{default: 100, lg: 150}">
                    <?php echo e(__('Sponsors')); ?>

                </h3>
            </div>
            <div class="row mt-20">
                <div class="col-12">
                    <?php if (isset($component)) { $__componentOriginal69e02abf35620e7388443fc7f431c180 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal69e02abf35620e7388443fc7f431c180 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.sponsors-slider','data' => ['sponsors' => $sponsors]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('sponsors-slider'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['sponsors' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($sponsors)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal69e02abf35620e7388443fc7f431c180)): ?>
<?php $attributes = $__attributesOriginal69e02abf35620e7388443fc7f431c180; ?>
<?php unset($__attributesOriginal69e02abf35620e7388443fc7f431c180); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal69e02abf35620e7388443fc7f431c180)): ?>
<?php $component = $__componentOriginal69e02abf35620e7388443fc7f431c180; ?>
<?php unset($__componentOriginal69e02abf35620e7388443fc7f431c180); ?>
<?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <?php if (isset($component)) { $__componentOriginal623480b0c481f141c342d051714d833a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal623480b0c481f141c342d051714d833a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.not-logged-in','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('not-logged-in'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal623480b0c481f141c342d051714d833a)): ?>
<?php $attributes = $__attributesOriginal623480b0c481f141c342d051714d833a; ?>
<?php unset($__attributesOriginal623480b0c481f141c342d051714d833a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal623480b0c481f141c342d051714d833a)): ?>
<?php $component = $__componentOriginal623480b0c481f141c342d051714d833a; ?>
<?php unset($__componentOriginal623480b0c481f141c342d051714d833a); ?>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/home.blade.php ENDPATH**/ ?>