<?php $__env->startSection('content'); ?>
    <div class="container mt-50 height-vh">
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('front.search', [])->html();
} elseif ($_instance->childHasBeenRendered('CNJHMg6')) {
    $componentId = $_instance->getRenderedChildComponentId('CNJHMg6');
    $componentTag = $_instance->getRenderedChildComponentTagName('CNJHMg6');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('CNJHMg6');
} else {
    $response = \Livewire\Livewire::mount('front.search', []);
    $html = $response->html();
    $_instance->logRenderedChild('CNJHMg6', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush("styles"); ?>
    <style>
        form{
            width: 100%;
            height: 60px;
        }

        .input-search{
            width: 92%;
            border-radius: 0 10rem 10rem 0;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .btn-search{
            width: 15%;
            border-radius: 10rem 0 0 10rem;
            cursor: pointer;
            background: #1683c5;

        }

        .btn-search i{
            color: #FFF;
            font-size: 1.3rem;
        }

        .mt-50{
            margin-top: 50px;
        }

        .height-vh{
            min-height: 60vh;
        }

        @media (max-width: 992px) {
            .btn-search{
                width: 20%;
                border-radius: 10rem 0 0 10rem;
                cursor: pointer;
            }
        }

    </style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('front.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/front/pages/search-results.blade.php ENDPATH**/ ?>