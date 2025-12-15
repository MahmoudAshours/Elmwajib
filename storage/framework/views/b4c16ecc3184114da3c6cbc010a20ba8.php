<?php $__env->startSection('content'); ?>
    <div class="container py-20">
        <div class="row g-8 g-xl-10 mb-6 mb-xl-9">

            <div class="input-group d-flex mb-20 mb-5">
                <input type="text" id="query" class="form-control form-control-solid  input-search"
                       placeholder="البحث في الدروس">
                <button class="input-group-text btn-search d-flex justify-content-center align-items-center">
                    <i class="fa fa-search"></i>
                </button>
            </div>

            <div id="lessons-list">
                <?php $__empty_1 = true; $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <h1 class="display-5 my-3 head-4 subject"><?php echo e($subject->title); ?></h1>
                    <?php $__currentLoopData = $subject->topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <ul class="list-group">
                            <li class="list-group-item p-5 active head-4 topic"
                                style="font-size: 1.6rem;"><?php echo e($topic->title); ?>


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
                                    <li class="list-group-item py-5 lesson" style="font-size: 1.5rem;">
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
                                    <li class="list-group-item p-5 lesson" style="font-size: 1.5rem;">
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
                                            <div class="text-black parent"><?php echo e($lesson->title); ?></div>
                                        <?php endif; ?>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-12 my-10 text-center">
                        <p><?php echo e(__('There is no data')); ?></p>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush("styles"); ?>
    <style>

        .input-search {
            width: 92%;
            border-radius: 0 10rem 10rem 0;
        }

        .input-search, select {
            height: 50px !important;
        }

        .btn-search {
            width: 8%;
            border-radius: 10rem 0 0 10rem;
            background: #1683c5;
        }

        .btn-search i {
            color: #FFF;
            font-size: 1.5rem;
        }

        .form-select-lg {
            border-radius: 100px !important;
        }

        @media (max-width: 767px) {
            .btn-search {
                width: 20%;
                border-radius: 10rem 0 0 10rem;
                cursor: pointer;
            }
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush("scripts"); ?>
    <script>

        $('#query').on('input', e => {

            let query, lessons_container, lesson_li, clean_title, i;

            query = e.target.value.replace(/[\u064B-\u0653]/g, "");

            $('.parent').parent().removeClass('lesson');

            lessons_container = document.getElementById("lessons-list");
            lesson_li = lessons_container.getElementsByClassName("lesson");


            for (i = 0; i < lesson_li.length; i++) {

                clean_title = lesson_li[i].getElementsByClassName('title')[0].dataset.cleanTitle;

                if (clean_title.indexOf(query) > -1) {
                    $('.topic,.subject').removeClass('d-none');
                    $('.parent').closest('li').removeClass('d-none');

                    lesson_li[i].closest('li').style.display = "";
                } else {
                    $('.topic,.subject').addClass('d-none');
                    $('.parent').closest('li').addClass('d-none');

                    lesson_li[i].closest('li').style.display = "none";
                }
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('front.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/front/pages/subjects.blade.php ENDPATH**/ ?>