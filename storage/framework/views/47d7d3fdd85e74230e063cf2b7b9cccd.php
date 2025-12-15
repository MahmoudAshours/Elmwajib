<?php $__env->startSection('content'); ?>
    
    <div class="mb-n10 mb-lg-n20 mt-10 p-20">
        <div class="container">
            <div class="text-center mb-17 w-100 d-flex justify-content-center align-items-center flex-column">

                <h3 class="fs-2hx text-dark mb-5" data-kt-scroll-offset="{default: 100, lg: 150}">
                    <?php echo e(__('About Faz')); ?>

                </h3>
                <div class="fs-1 fw-bold w-50 mt-3 justify-text w-100 lh-lg">
                    <p>مشروع علميٌّ تعليميٌّ في «العلم الواجب» مما لا يسع المسلمَ جهلُه.
                        يسعى إلى بيان مفهومه، وأهميته، ويقدم الدراسات حوله، ويقرب تعليمه عبر متون، وأسئلة، وأنشطة، ومقررات تعليمية تجمع ما بين أسلوب المتن العلمي، والأساليب التعليمية الحديثة، كما يساعد المعتنين به بأهم استراتيجياته، والإرشاد لمبادراته.
                    </p>
                    <p>يشرف على المشروع حالياً مركز فاز للاستشارات، ويتشارك فيه مع ذوي الاهتمام.</p>
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

<?php echo $__env->make('front.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/front/pages/about-faz.blade.php ENDPATH**/ ?>