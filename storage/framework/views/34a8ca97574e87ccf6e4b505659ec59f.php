<div class="container py-20">
    <div class="row justify-content-center">
        <div class="col-12 my-10 text-center">
            <div class="display-6">
                <?php echo e($lesson->title); ?>

            </div>
            <h3 class="mt-5 text-success"><?php echo e($showResult ? __('Quiz Result'):__('Quiz')); ?></h3>
            <?php if(!$showResult): ?>
                <span>(<?php echo e($lesson->questions_count); ?>) <?php echo e(__('Question')); ?></span>
            <?php endif; ?>
        </div>
        <div class="col-12 col-lg-8">
            <?php if(!$showResult): ?>
                <div id="lessonQuestions" class="carousel slide shadow h-100 min-h-500px d-flex flex-column justify-content-between" data-bs-interval="false">
                    <div class="carousel-inner p-8">
                        <?php $__currentLoopData = $lesson->questions->shuffle(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="carousel-item <?php echo e($loop->first ? 'active' : ''); ?>">
                                <div class="d-flex justify-content-center align-items-center">
                                    <div class="symbol symbol-circle symbol-50px mb-5">
                                        <div class="symbol-label fs-2 fw-bold bg-danger text-inverse-danger"><?php echo e($loop->iteration); ?></div>
                                    </div>
                                </div>
                                <div class="text-start fs-1 mb-10 fw-bolder">
                                    <?php echo $question->title; ?>

                                </div>

                                <?php $__currentLoopData = $question->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="form-check mb-5 d-flex align-items-center">
                                        <span>
                                            <input class="form-check-input"
                                                   type="radio"
                                                   name="answers.<?php echo e($question->id); ?>"
                                                   wire:model.defer="answers.<?php echo e($question->id); ?>"
                                                   id="option-<?php echo e($loop->iteration); ?>"
                                                   value="<?php echo e($option); ?>">
                                        </span>
                                        <label class="form-check-label fs-3 ms-3 option-custom-font" for="option-<?php echo e($loop->iteration); ?>">
                                            <?php echo e($option); ?>

                                        </label>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <div class="d-flex gap-10 justify-content-center align-items-center mt-10 pb-10">

                        <button class="btn btn-success d-none" type="button" id="previous-button" data-bs-target="#lessonQuestions" data-bs-slide="prev">
                            <i class="fas fa-arrow-right me-1"></i>
                            <?php echo e(__('Previous')); ?>

                        </button>

                        <button class="btn btn-danger <?php if($questionsCount > 1): ?> d-none <?php endif; ?>" type="button" wire:click="submit" id="submit-quiz">
                            <?php echo e(__('Show Result')); ?>

                            <div class="spinner-border spinner-border-sm ms-2" role="status" wire:loading wire:target="submit">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </button>
                        <button type="button" class="btn btn-success <?php if($questionsCount === 1): ?> d-none <?php endif; ?>" id="next-button" data-bs-target="#lessonQuestions" data-bs-slide="next">
                            <?php echo e(__('Next')); ?>

                            <i class="fas fa-arrow-left ms-2"></i>
                        </button>

                    </div>
                </div>
            <?php else: ?>
                <div class="card shadow">
                    <div class="card-body">
                        <p class="text-center"><?php echo e(__('Your Result is')); ?> :</p>
                        <div class="mt-5 display-4 text-center">
                            <span id="score">0</span> / <span id="questions-count"></span>
                        </div>
                        <div class="my-5 text-center">
                            <i class="fas display-1" id="result-icon"></i>
                        </div>
                        <div id="result" class="text-center mt-4 fs-4 "></div>
                        <div class="mt-20 d-flex flex-column align-items-center">
                            <?php $__currentLoopData = $lesson->questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $questionAnswered = array_key_exists($question->id , $answers); ?>
                                <div class="w-100">
                                    <div class="text-start mb-5 d-flex align-items-center">
                                        <div class="symbol symbol-circle symbol-30px">
                                            <div class="symbol-label fs-3 fw-bold bg-dark text-inverse-dark"><?php echo e($loop->iteration); ?></div>
                                        </div>
                                        <span class="ms-3 fs-1 question-title fw-bolder">
                                            <?php echo $question->title; ?>


                                            <?php if(!$questionAnswered): ?>
                                                <i class="fas fa-exclamation-triangle text-warning fs-3 ms-2"
                                                   data-bs-toggle="tooltip"
                                                   data-bs-placement="top"
                                                   title="<?php echo e(__('You not answer this question !')); ?>"></i>
                                            <?php endif; ?>
                                        </span>

                                    </div>
                                    <?php $__currentLoopData = $question->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <div class="form-check mb-5 d-flex align-items-center">
                                            <span>
                                                <input class="form-check-input"
                                                       type="radio"
                                                       readonly
                                                       disabled <?php echo e($questionAnswered && $this->sanetizeText($answers[$question->id]) === $this->sanetizeText($option) ? 'checked' : ''); ?>>
                                            </span>
                                            <label class="form-check-label fs-3 ms-3 text-wrap">
                                                <?php echo e($option); ?>


                                                <span class="ms-3 d-inline-flex align-items-center">
                                                    <?php if($questionAnswered && $this->sanetizeText($answers[$question->id]) == $this->sanetizeText($question->correct_answer) && $this->sanetizeText($option) == $this->sanetizeText($question->correct_answer)): ?>
                                                        <i class="fas fa-check-circle text-success fs-3"></i>
                                                        <span class="ms-2 text-success"><?php echo e(__('Correct Answer_2')); ?></span>
                                                    <?php elseif($questionAnswered && $this->sanetizeText($answers[$question->id]) == $this->sanetizeText($option)): ?>
                                                        <i class="fas fa-times-circle text-danger fs-3"></i>
                                                        <span class="ms-2 text-danger"><?php echo e(__('Incorrect Answer')); ?></span>
                                                    <?php elseif($this->sanetizeText($option) == $this->sanetizeText($question->correct_answer)): ?>
                                                        <i class="fas fa-check-circle text-success fs-3"></i>
                                                        <span class="ms-2 text-success"><?php echo e(__('Correct Answer')); ?></span>
                                                    <?php endif; ?>
                                                </span>
                                            </label>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    <?php if(!$loop->last): ?>
                                        <hr class="my-10">
                                    <?php endif; ?>

                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="mt-10 d-flex justify-content-center align-items-center gap-5">
                            <a class="btn btn-secondary" onClick="location.href=location.href">
                                <?php echo e(__('Retry Quiz')); ?>

                                <i class="fas fa-retweet ms-2"></i>
                            </a>

                            <?php if($next_lesson = $lesson->next()): ?>
                                <a class="btn btn-primary" href="<?php echo e(route('lessons.content', $next_lesson )); ?>">
                                    <?php echo e(__('Next Lesson')); ?>

                                    <i class="fas fa-arrow-left ms-2"></i>
                                </a>
                            <?php endif; ?>

                            <?php if($completedTopic): ?>
                                <a class="btn btn-success" wire:click="downloadCertificate">

                                    <i class="fas fa-certificate ms-2"></i>

                                    <?php echo e(__('Download Certificate')); ?>


                                    <div class="spinner-border spinner-border-sm ms-2" role="status" wire:loading wire:target="downloadCertificate">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>

                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php $__env->startPush("styles"); ?>
    <style>
        .option-custom-font {
            font-family: Cairo, serif;
        }
    </style>
<?php $__env->stopPush(); ?>


<?php $__env->startPush('scripts'); ?>
    <script>
        let lessonCarousel = $('#lessonQuestions');

        lessonCarousel.bind('slid.bs.carousel', function () {
            if ($('.carousel-item').first().hasClass('active')) {
                $('#previous-button').addClass('d-none');
            } else {
                $('#previous-button').removeClass('d-none');
            }

            if ($('.carousel-item').last().hasClass('active')) {
                $('#submit-quiz').removeClass('d-none');
                $('#next-button').addClass('d-none');
            } else {
                $('#submit-quiz').addClass('d-none');
                $('#next-button').removeClass('d-none');
            }
        });

        Livewire.on('quizCompleted', data => {
            $('#score').text(data.score);
            if (data.result) {
                $('#result').addClass('text-success').text('<?php echo e(__('You pass the quiz')); ?>');
                $('#result-icon').addClass('fa-check-circle text-success');
            } else {
                $('#result').addClass('text-danger').text('<?php echo e(__('Unfortunately, you didn\'t pass the exam')); ?>');
                $('#result-icon').addClass('fa-times-circle text-danger');
            }
            $('#questions-count').html(data.questions_count);
        });

        Livewire.on('certificateDownloaded', data => {
            $('#score').text(data.score);
            if (data.result) {
                $('#result').addClass('text-success').text('<?php echo e(__('You pass the quiz')); ?>');
                $('#result-icon').addClass('fa-check-circle text-success');
            } else {
                $('#result').addClass('text-danger').text('<?php echo e(__('Unfortunately, you didn\'t pass the exam')); ?>');
                $('#result-icon').addClass('fa-times-circle text-danger');
            }
            $('#questions-count').html(data.questions_count);
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /var/www/html/resources/views/livewire/front/lesson-quiz.blade.php ENDPATH**/ ?>