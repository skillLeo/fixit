<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<?php if ($__env->exists("frontend.layout.seo")) echo $__env->make("frontend.layout.seo", array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<!-- CSRF Token -->
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

<link rel="icon" href="<?php echo e(asset(@$themeOptions['general']['favicon_icon'])  ?? asset('admin/images/faviconIcon.png')); ?>"type="image/x-icon">

<link rel="shortcut icon" href="<?php echo e(asset(@$themeOptions['general']['favicon_icon']) ?? asset('admin/images/faviconIcon.png')); ?>" type="image/x-icon">

<!-- Google font -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap" rel="stylesheet">

<!-- Bootstrap css-->
<link rel="stylesheet" rel="preload" type="text/css" href="<?php echo e(asset('frontend/css/vendors/swiper-bundle.min.css')); ?>">
<link rel="stylesheet" rel="preload" type="text/css" href="<?php echo e(asset('frontend/js/jquery-3.6.0.min.js')); ?>">
<link rel="stylesheet" rel="preload" type="text/css" href="<?php echo e(asset('frontend/js/jquery-ui.min.js')); ?>">

<!-- Bootstrap css-->
<link rel="stylesheet" rel="preload" type="text/css" href="<?php echo e(asset('frontend/css/vendors/bootstrap/bootstrap.css')); ?>">

<!-- ICONSAX css-->
<link rel="stylesheet" rel="preload" type="text/css" href="<?php echo e(asset('frontend/css/vendors/iconsax/iconsax.css')); ?>">

<!-- AOS css-->
<link rel="stylesheet" rel="preload" type="text/css" href="<?php echo e(asset('frontend/css/vendors/aos.css')); ?>">

<!-- Select2 css-->
<link rel="stylesheet" rel="preload" type="text/css" href="<?php echo e(asset('frontend/css/vendors/select2.css')); ?>">

<!-- toastr css-->
<link rel="stylesheet" rel="preload" type="text/css" href="<?php echo e(asset('frontend/css/vendors/toastr.min.css')); ?>">

<!-- Feather icon css-->
<link rel="stylesheet" rel="preload" type="text/css" href="<?php echo e(asset('frontend/css/vendors/feather-icon/feather-icon.css')); ?>">

<!-- Slick slider css-->
<link rel="stylesheet" rel="preload" type="text/css" href="<?php echo e(asset('frontend/css/vendors/slick.css')); ?>">
<script>
    var baseUrl = "<?php echo e(asset('')); ?>";
</script>

<?php echo $__env->yieldPushContent('css'); ?>

<?php echo app('Illuminate\Foundation\Vite')(['public/frontend/scss/style.scss']); ?>
<?php /**PATH /Users/apple/Downloads/codecanyon-pL2BDeFh-fixit-multi-vendor-on-demand-handyman-home-service-flutter-app-with-admin-complete-solution/fixit_laravel1/resources/views/frontend/layout/head.blade.php ENDPATH**/ ?>