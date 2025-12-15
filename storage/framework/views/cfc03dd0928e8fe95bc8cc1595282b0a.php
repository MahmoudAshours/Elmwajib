<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#13263c">
    <?php echo SEO::generate(); ?>



    
    <link
        href="https://fonts.googleapis.com/css2?family=Scheherazade+New:wght@400;700&family=Tajawal:wght@400;700&display=swap"
        rel="stylesheet">

    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@500;600;700;800;900&family=Lemonada:wght@300;400;500;600;700&family=Noto+Kufi+Arabic:wght@300;400;500;600;700;800;900&family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">


    
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>

    
    <link href="/css/font.css?v=1.0" rel="stylesheet">
    <link href="<?php echo e(mix('css/app.css')); ?>" rel="stylesheet" type="text/css">
    <style>
        .btn {
            font-size: 1.5rem;
        }

        .head-4 {
            display: flex;
            width: 100%;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 10px;
        }

        .head-4:after {
            content: '';
            border-top: 1px solid #d6d6d6;
            margin: 0 20px 0 20px;
            flex: 1 0 20px;
        }

        .head-4-title {
            display: flex;
            width: 100%;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 10px;
            font-size: 28px;
            font-family: 'kfgqpc_ksa_regularbold';
        }

        .head-4-title:after {
            content: '';
            border-top: 1px solid #d6d6d6;
            margin: 0 20px 0 20px;
            flex: 1 0 20px;
        }

        .fw-bolder {
            font-weight: 500;
        }

        .fs-6 {
            font-size: 1.5rem !important;
        }

        .fs-5 {
            font-size: 1.6rem !important;
        }

        /*.drawer-overlay {*/
        /*    z-index: -1 !important;*/
        /*}*/
        .landing-header {
            z-index: 9999 !important;
        }

        td{
            font-size: 1.4rem !important;
        }
    </style>
    <link href="<?php echo e(asset('template/assets/plugins/global/plugins.bundle.css')); ?>" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css">

    <style>
        @font-face {
            font-family: JannaRegular;
            src: url('/fonts/fonts_jana/Janna LT Regular.ttf');
        }

        @font-face {
            font-family: JannaBold;
            src: url('/fonts/fonts_jana/Janna LT Bold.ttf');
        }

        *:not(i) {
            font-family: "JannaRegular", serif;
        }
    </style>


    <?php echo \Livewire\Livewire::styles(); ?>

    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<?php /**PATH /var/www/html/resources/views/includes/head.blade.php ENDPATH**/ ?>