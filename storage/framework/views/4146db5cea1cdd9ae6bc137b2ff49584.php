<?php $__env->startSection('content'); ?>
    <div class="container py-20">
        <div class="row g-8 g-xl-10 mb-6 mb-xl-9">
            <div class="col-12 my-10 text-center">
                <div class="display-4 "><?php echo e($subject->title); ?></div>
            </div>
            <?php $__currentLoopData = $subject->topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <ul class="list-group">
                    <li class="list-group-item p-5 active head-4" style="font-size: 1.6rem;"><?php echo e($topic->title); ?>

                        <?php if($user && $user->isCompletedTopic($topic)): ?>
                            <i class="fa fa-check-circle text-white ms-3 fs-2"
                               data-bs-toggle="tooltip"
                               data-bs-placement="right"
                               data-original-title="<?php echo e(__('Completed')); ?>"
                               title="<?php echo e(__('Completed')); ?>">
                            </i>
                        <?php endif; ?>
                    </li>
                    <?php $__currentLoopData = $topic->lessons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lesson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($lesson->parent_id): ?>
                            <li class="list-group-item py-5" style="font-size: 1.5rem;">
                                <?php if (isset($component)) { $__componentOriginal0d3ad875c794cc792952d7cb64b191d0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0d3ad875c794cc792952d7cb64b191d0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.lesson-action-buttons','data' => ['lesson' => $lesson,'user' => $user]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('lesson-action-buttons'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['lesson' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($lesson),'user' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($user)]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0d3ad875c794cc792952d7cb64b191d0)): ?>
<?php $attributes = $__attributesOriginal0d3ad875c794cc792952d7cb64b191d0; ?>
<?php unset($__attributesOriginal0d3ad875c794cc792952d7cb64b191d0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0d3ad875c794cc792952d7cb64b191d0)): ?>
<?php $component = $__componentOriginal0d3ad875c794cc792952d7cb64b191d0; ?>
<?php unset($__componentOriginal0d3ad875c794cc792952d7cb64b191d0); ?>
<?php endif; ?>
                            </li>
                        <?php else: ?>
                            <li class="list-group-item p-5" style="font-size: 1.5rem;">
                                <?php if($lesson->summary): ?>
                                    <?php if (isset($component)) { $__componentOriginal0d3ad875c794cc792952d7cb64b191d0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0d3ad875c794cc792952d7cb64b191d0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.lesson-action-buttons','data' => ['lesson' => $lesson,'user' => $user]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('lesson-action-buttons'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['lesson' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($lesson),'user' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($user)]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0d3ad875c794cc792952d7cb64b191d0)): ?>
<?php $attributes = $__attributesOriginal0d3ad875c794cc792952d7cb64b191d0; ?>
<?php unset($__attributesOriginal0d3ad875c794cc792952d7cb64b191d0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0d3ad875c794cc792952d7cb64b191d0)): ?>
<?php $component = $__componentOriginal0d3ad875c794cc792952d7cb64b191d0; ?>
<?php unset($__componentOriginal0d3ad875c794cc792952d7cb64b191d0); ?>
<?php endif; ?>
                                <?php else: ?>
                                    <div class="text-black"><?php echo e($lesson->title); ?></div>
                                <?php endif; ?>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/front/pages/subject.blade.php ENDPATH**/ ?>