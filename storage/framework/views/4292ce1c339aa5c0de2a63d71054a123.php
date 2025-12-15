<?php $__env->startSection('content'); ?>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount("front.lesson-content",["lesson" => $lesson])->html();
} elseif ($_instance->childHasBeenRendered('skkE40H')) {
    $componentId = $_instance->getRenderedChildComponentId('skkE40H');
    $componentTag = $_instance->getRenderedChildComponentTagName('skkE40H');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('skkE40H');
} else {
    $response = \Livewire\Livewire::mount("front.lesson-content",["lesson" => $lesson]);
    $html = $response->html();
    $_instance->logRenderedChild('skkE40H', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush("styles"); ?>
    <style>
        .thumbnail_img {
            height: 120px;
            width: 120px;
            border-radius: 50%;
        }
    </style>
<?php $__env->stopPush(); ?>


<?php $__env->startPush("scripts"); ?>
    <script>
        $(function () {
            let lesson_title = $(".lesson-title");
            let title_and_description_of_content = $(".header_title ,.description");

            setTimeout(() => {
                title_and_description_of_content.removeClass("fade-in");
                lesson_title.removeClass("fade-in");
            }, 1000);

            Livewire.hook('message.processed', (message, component) => {
                $(".next-btn,.prev-btn,.next-lesson-btn").click(function () {
                    title_and_description_of_content.addClass("fade-in");
                    title_and_description_of_content.removeClass("fade-in");

                    if($(this).hasClass("next-lesson-btn"))
                    {
                        lesson_title.addClass("fade-in");
                        lesson_title.removeClass("fade-in");
                    }
                });

            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('front.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/front/pages/lesson-content.blade.php ENDPATH**/ ?>