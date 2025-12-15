<div>
    <div class="container py-20">
        <div class="row">
            <div class="col-12 my-10 text-center">
                <?php if($lesson->thumbnail()->exists()): ?>
                    <div class="thumbnail-container mb-10">
                        <img class="thumbnail_img" src="<?php echo e($lesson->thumbnail_url); ?>" alt="...">
                    </div>
                <?php endif; ?>

                <div class="display-6 fade-in lesson-title ">
                    <?php echo e($lesson->title); ?>

                </div>
                <h3 class="mt-5 text-primary"><?php echo e(__('Content')); ?></h3>
            </div>
            <div class="col-12">
                <div id="lessonContent" class="shadow h-100 min-h-500px d-flex flex-column justify-content-between">
                    <div class="fs-1 p-8">
                        <div class="d-flex justify-content-between align-items-center">
                            <h1 class="fade-in header_title"><?php echo e($lesson_data[$lesson_data_current_key]['content_title']); ?></h1>
                            <?php if(auth()->guard()->check()): ?>
                                <?php if($is_completed_topic): ?>
                                    <a class="btn btn-primary fade-in" href="<?php echo e(route('topics.certificate.download', $lesson->topic_id)); ?>">
                                        <i class="fas fa-certificate ms-2"></i>
                                        <?php echo e(__('Download Certificate')); ?>

                                    </a>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                        <hr>
                        <div class="fade-in description">
                            <?php echo $lesson_data[$lesson_data_current_key]['content_description']; ?>

                        </div>
                    </div>
                    <div class="d-flex gap-10 justify-content-center align-items-center mt-10 pb-10">
                        <?php if($show_prev_content_btn): ?>
                            <button class="btn btn-success prev-btn" type="button" wire:click="$set('lesson_data_current_key', <?php echo e($lesson_data_current_key - 1); ?>)">
                                <i class="fas fa-arrow-right me-1"></i>
                                <?php echo e(__('Previous')); ?>

                            </button>
                        <?php endif; ?>


                        <?php if($show_next_content_btn): ?>
                            <button class="btn btn-success fade-in next-btn" wire:click="$set('lesson_data_current_key', <?php echo e($lesson_data_current_key + 1); ?>)">
                                <?php echo e(__('Next')); ?>

                                <i class="fas fa-arrow-left ms-2" style="user-select: none;pointer-events: none"></i>
                            </button>
                        <?php endif; ?>

                        <?php if($show_next_lesson_btn): ?>
                            <a href="<?php echo e(route('lessons.content',['lesson' => $lesson , 'next' => true])); ?>" class="btn btn-success fade-in next-lesson-btn ">
                                <?php echo e(__('Next Lesson')); ?>

                                <i class="fas fa-arrow-left ms-2" style="user-select: none;pointer-events: none"></i>
                            </a>
                        <?php endif; ?>

                        <?php if($show_start_quiz_btn): ?>
                            <a class="btn btn-success" id="next-button" href="<?php echo e(route('lessons.quiz' , ['lesson' => $lesson , 'completed' => true])); ?>">
                                <?php echo e(__('Start Lesson Quiz')); ?>

                            </a>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php $__env->startPush("styles"); ?>
    <style>
        .fade-in {
            animation: fadeIn ease 2s;
            -webkit-animation: fadeIn ease 2s;
            -moz-animation: fadeIn ease 2s;
            -o-animation: fadeIn ease 2s;
            -ms-animation: fadeIn ease 2s;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        @-moz-keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        @-webkit-keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        @-o-keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        @-ms-keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }
    </style>
<?php $__env->stopPush(); ?>
<?php /**PATH /var/www/html/resources/views/livewire/front/lesson-content.blade.php ENDPATH**/ ?>