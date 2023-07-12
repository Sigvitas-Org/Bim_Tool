<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e($globalSetting->favicon_url); ?>">
    <link rel="manifest" href="<?php echo e($globalSetting->favicon_url); ?>">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo e($globalSetting->favicon_url); ?>">
    <meta name="theme-color" content="#ffffff">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo e(asset('vendor/css/all.min.css')); ?>">

    <!-- Template CSS -->
    <link href="<?php echo e(asset('vendor/froiden-helper/helper.css')); ?>" rel="stylesheet">
    <link type="text/css" rel="stylesheet" media="all" href="<?php echo e(asset('css/main.css')); ?>">

    <title><?php echo e($globalSetting->global_app_name); ?></title>


    <?php echo $__env->yieldPushContent('styles'); ?>
    <script src="<?php echo e(asset('vendor/jquery/jquery.min.js')); ?>"></script>

    <style>
        .login_header {
           background-color: <?php echo e($globalSetting->logo_background_color); ?> !important;
        }

    </style>

    <?php if($globalSetting->login_background_url): ?>
        <style>
            .login_section {
                background: url("<?php echo e($globalSetting->login_background_url); ?>") center center/cover no-repeat !important;
            }

        </style>
    <?php endif; ?>

    <?php if(file_exists(public_path().'/css/login-custom.css')): ?>
        <link href="<?php echo e(asset('css/login-custom.css')); ?>" rel="stylesheet">
    <?php endif; ?>

    <?php if($globalSetting->sidebar_logo_style == 'full'): ?>
    <style>
        .login_header img {
            max-width: unset;
        }
    </style>
    <?php endif; ?>

</head>

<body class="<?php echo e($globalSetting->auth_theme == 'dark' ? 'dark-theme' : ''); ?>">

    <header class="sticky-top d-flex justify-content-center align-items-center login_header bg-white px-4">
        <img class="mr-2 rounded" src="<?php echo e($globalSetting->logo_url); ?>" alt="Logo" />
        <?php if($globalSetting->sidebar_logo_style != 'full'): ?>
            <h3 class="mb-0 pl-1 <?php echo e($globalSetting->auth_theme == 'dark' ? 'text-light' : ''); ?>"><?php echo e($globalSetting->global_app_name); ?></h3>
        <?php endif; ?>
    </header>

    <?php echo e($slot); ?>



    <!-- Global Required Javascript -->
    <script src="<?php echo e(asset('vendor/bootstrap/javascript/bootstrap-native.js')); ?>"></script>

    <!-- Font Awesome -->
    <script src="<?php echo e(asset('vendor/jquery/all.min.js')); ?>"></script>

    <!-- Template JS -->
    <script src="<?php echo e(asset('js/main.js')); ?>"></script>
    <script>
        const MODAL_DEFAULT = '#myModalDefault';
        const MODAL_LG = '#myModal';
        const MODAL_XL = '#myModalXl';
        const MODAL_HEADING = '#modelHeading';
        const RIGHT_MODAL = '#task-detail-1';
        const RIGHT_MODAL_CONTENT = '#right-modal-content';
        const RIGHT_MODAL_TITLE = '#right-modal-title';

        const dropifyMessages = {
            default: "<?php echo app('translator')->get('app.dragDrop'); ?>",
            replace: "<?php echo app('translator')->get('app.dragDropReplace'); ?>",
            remove: "<?php echo app('translator')->get('app.remove'); ?>",
            error: "<?php echo app('translator')->get('messages.errorOccured'); ?>",
        };
    </script>

    <?php echo e($scripts); ?>


</body>

</html>
<?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/components/auth.blade.php ENDPATH**/ ?>