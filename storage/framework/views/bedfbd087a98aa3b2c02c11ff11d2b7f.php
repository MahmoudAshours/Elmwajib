<div class="d-flex justify-content-between align-items-center">

    <div class="<?php echo e($lesson->parent_id ? 'px-10' :''); ?>">

        <a href="<?php echo e(route('lessons.show' , $lesson)); ?>">
            <div class="text-primary text-hover-success title d-inline"
                 data-clean-title="<?php echo e($lesson->clean_title); ?>"><?php echo e($lesson->title); ?>

            </div>
        </a>

        <?php if($attributes->has('user') && $user?->isLessonPassed($lesson)): ?>
            <i class="fa fa-check-circle text-success ms-3 fs-2"
               data-bs-toggle="tooltip"
               data-bs-placement="right"
               data-original-title="<?php echo e(__('Completed')); ?>"
               title="<?php echo e(__('Completed')); ?>">
            </i>
        <?php endif; ?>
    </div>

    
    <div class="btn-group d-block d-md-none">
        <button type="button" class="btn btn-primary dropdown-toggle fw-bold" data-bs-toggle="dropdown"
                aria-expanded="false">
            <?php echo e(__('Options')); ?>

        </button>
        <ul class="dropdown-menu p-2">

            <li>
                <a href="<?php echo e(route('lessons.show' , $lesson)); ?>"
                   class="fs-5 dropdown-item d-flex gap-2 align-items-center py-5 px-2">
                    <i class="fas fa-window-maximize  custom-icon-font"></i> <?php echo e(__('Content')); ?>

                </a>
            </li>

            <?php if($lesson->questions_count): ?>
                <li>

                    <a href="<?php echo e(route('lessons.quiz' , $lesson)); ?>"
                       class="fs-5 dropdown-item d-flex gap-2 align-items-center py-5 px-2">
                        <i class="fas fa-question  custom-icon-font"></i> <?php echo e(__('Quiz')); ?>

                    </a>
                </li>
            <?php endif; ?>

            <?php if($lesson->has_pdf): ?>
                <li>
                    <a href="<?php echo e(route('lessons.download' , $lesson)); ?>" class="fs-5 gap-2 dropdown-item py-5 px-2">
                        <i class="fas fa-file-pdf  custom-icon-font"></i> <?php echo e(__('Attachment')); ?>

                    </a>
                </li>
            <?php endif; ?>

            <?php if($lesson->learning_islam_url): ?>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li>
                    <a href="<?php echo e($lesson->learning_islam_url); ?>"
                       target="_blank"
                       data-bs-toggle="tooltip"
                       data-bs-html="true"
                       data-bs-placement="top"
                       title="<strong><?php echo e(__('lesson_from_taa')); ?></strong>"
                       class="dropdown-item d-flex justify-content-center align-items-center">
                        <img src="<?php echo e(asset('assets/Taaa-logo.svg')); ?>" alt="Taaa-logo" height="30" width="30"/>
                    </a>
                </li>
            <?php endif; ?>

        </ul>
    </div>

    
    <div class="d-none d-md-flex justify-content-end align-items-center gap-2">

        <a href="<?php echo e(route('lessons.show' , $lesson)); ?>" class="btn btn-sm btn-success fs-4">
            <?php echo e(__('Content')); ?>

        </a>

        <?php if($lesson->questions_count): ?>
            <a href="<?php echo e(route('lessons.quiz' , $lesson)); ?>" class="btn btn-sm btn-icon-white btn-primary fs-4">
                <?php echo e(__('Quiz')); ?>

            </a>
        <?php endif; ?>

        <?php if($lesson->has_pdf): ?>
            <a href="<?php echo e(route('lessons.download' , $lesson)); ?>" class="btn btn-icon-danger btn-sm btn-secondary fs-4">
                <i class="fas fa-file-pdf"></i>
                PDF
            </a>
        <?php endif; ?>

        <?php if($lesson->learning_islam_url): ?>
            <a href="<?php echo e($lesson->learning_islam_url); ?>"
               target="_blank"
               data-bs-toggle="tooltip"
               data-bs-html="true"
               data-bs-placement="top"
               title="<strong><?php echo e(__('lesson_from_taa')); ?></strong>"
               class="mx-2">
                <img src="<?php echo e(asset('assets/Taaa-logo.svg')); ?>" alt="Taaa-logo" height="30" width="30"/>
            </a>
        <?php endif; ?>

    </div>
</div>


<?php $__env->startPush("styles"); ?>
    <style>
        .custom-icon-font {
            font-size: 22px;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php /**PATH /var/www/html/resources/views/components/lesson-action-buttons.blade.php ENDPATH**/ ?>