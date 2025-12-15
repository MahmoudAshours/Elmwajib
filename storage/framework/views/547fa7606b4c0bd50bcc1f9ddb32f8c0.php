<div>

    <div class="row">

        <div class="col-md-6">
            <div wire:ignore class="mb-5">
                <select id="select2-dropdown" class="form-select form-select-lg mb-3 form-select-solid fw-bold" direction="rtl" multiple>
                    <?php $__currentLoopData = $topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($topic->id); ?>"><?php echo e($topic->title); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>

        <div class="col-md-6">
            <div class="input-group has-validation mb-20">
                <input type="text" class="form-control form-control-solid  input-search" id="search-form" placeholder="البحث في الدروس" wire:model="query">
                <span class="input-group-text btn-search d-flex justify-content-center align-items-center">
                    <i class="fa fa-search"></i>
                </span>
            </div>
        </div>

    </div>

    <div class="container">
        <div class="row">
            <?php $__empty_1 = true; $__currentLoopData = $lessons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lesson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="col-sm-6 col-lg-4 col-xl-3">
                    <div class="card mb-5">
                        <img src="<?php echo e($lesson->thumbnail_url); ?>" class="card-img-top" style="" height="200" alt="...">
                        <div class="card-body">

                            <div class="card-title d-flex justify-content-between align-items-center">
                                <h5><?php echo e($lesson->title); ?></h5>
                                <?php if($lesson->learning_islam_url): ?>
                                    <a href="<?php echo e($lesson->learning_islam_url); ?>"
                                       target="_blank"
                                       data-bs-toggle="tooltip"
                                       data-bs-html="true"
                                       data-bs-placement="top"
                                       title="<strong><?php echo e(__('lesson_from_taa')); ?></strong>"
                                       class="mx-2">
                                        <img src="<?php echo e(asset('assets/Taaa-logo.svg')); ?>" alt="Taaa-logo" height="30" width="30" />
                                    </a>
                                <?php endif; ?>
                            </div>

                            <hr>

                            <div class="breadcrumb  d-flex align-items-center">
                                <a href="<?php echo e(route('subjects.show' , $lesson->topic->subject->id)); ?>" class="d-flex align-items-center"><?php echo e($lesson->topic->subject->title); ?></a>
                                <i class="fas fa-caret-left mx-2"></i>
                                <span class="d-flex align-items-center"><?php echo e($lesson->topic->title); ?></span>
                                <?php if(isset($lesson->parent->title)): ?>
                                    <i class="fas fa-caret-left mx-2"></i>
                                    <span class="d-flex align-items-center"><?php echo e($lesson->parent->title); ?></span>
                                <?php endif; ?>
                            </div>

                            <hr>

                            <div class="actions d-flex align-items-center gap-3">
                                <a href="<?php echo e(route('lessons.show' , $lesson)); ?>" class="btn btn-sm btn-success fs-4 <?php echo e((!$lesson->questions()->exists() && !$lesson->has_pdf ) ? 'w-100':''); ?>">
                                    <?php echo e(__('Content')); ?>

                                </a>
                                <?php if($lesson->questions()->exists()): ?>
                                    <a href="<?php echo e(route('lessons.quiz' , $lesson)); ?>" class="btn btn-sm btn-primary fs-4">
                                        <?php echo e(__('Quiz')); ?>

                                    </a>
                                <?php endif; ?>
                                <?php if($lesson->has_pdf): ?>
                                    <a href="<?php echo e(route('lessons.download' , $lesson)); ?>" class="d-flex justify-content-center align-items-center btn btn-icon-danger btn-sm btn-secondary fs-4">
                                        <i class="fas fa-file-pdf"></i>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="alert alert-warning  d-flex align-items-center justify-content-center">
                    <span class="h1">لا يوجد دروس لعرضها ... ابحث مرة اخرى</span>
                </div>
            <?php endif; ?>

        </div>
    </div>
</div>

<?php $__env->startPush("styles"); ?>
    <style>
        .card {
            width: 100%;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        }

        hr {
            border: 0;
            height: 1px;
            background: #b5b5b5;
        }

        .form-select-lg {
            border-radius: 100px !important;

        }

        .select2-selection__rendered {
            line-height: 32px !important;
        }

        .select2-container .select2-selection--single {
            height: 32px !important;
        }

        .select2-selection__arrow {
            height: 32px !important;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush("scripts"); ?>
    <script>
        $(function () {

            let mySelect = $('#select2-dropdown');

            mySelect.select2({placeholder: "اختر الموضوع .."});

            mySelect.select2('val', window.livewire.find('<?php echo e($_instance->id); ?>').selectedTopics);

            mySelect.css({
                'font-size': '1.2rem',
            });

            mySelect.on('change', function (e) {
                var data = $('#select2-dropdown').select2("val");
                $('span.select2-selection__choice__display').css({
                    'margin-right': '40px',
                    'font-size': '1.2rem',
                });
                window.livewire.find('<?php echo e($_instance->id); ?>').
                set('selectedTopics', data);
            }).trigger('change');

            Livewire.on('queryUpdated', function () {
                $('#select2-dropdown').select2("val", false);
            });

        });

    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /var/www/html/resources/views/livewire/front/search.blade.php ENDPATH**/ ?>