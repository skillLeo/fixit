<?php use \app\Helpers\Helpers; ?>

<?php

$lang = Helpers::getLanguageByLocale(Session::get('locale', 'en'));
$themeOptions = Helpers::getThemeOptions();

?>
<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>"  dir="<?php echo e(($lang->is_rtl) ? 'rtl' : 'ltr'); ?>" <?php if(isset($themeOptions['general']['theme_color'])): ?> style=" --primary-color:<?php echo e($themeOptions['general']['theme_color']); ?>; <?php if(isset($themeOptions['general']['font_color'])): ?> --font-color:<?php echo e($themeOptions['general']['font_color']); ?>; <?php endif; ?>" <?php endif; ?>>

<head>
    <?php echo $__env->make("frontend.layout.head", array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</head>

<body class="notLoaded">
    <!-- Loader Section Start -->
    <div class="page-loader" id="loader">
        <div class="page-loader-wrapper">
            <img src="<?php echo e(asset('frontend/images/gif/loader.gif')); ?>" alt="loader">
        </div>
    </div>
    <!-- Loader Section End -->

    <?php echo $__env->make("frontend.layout.header", array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php if (! empty(trim($__env->yieldContent('breadcrumb')))): ?>
    <!-- Home Section Start -->
    <section class="breadcrumb-section ratio_18">
        <img src="<?php echo e(asset('frontend/images/bg.jpg')); ?>" alt="bg" class="bg-img">
        <div class="container-fluid-lg">
            <div class="breadcrumb-contain">
                <div>
                    <h2><span><?php echo $__env->yieldContent('title'); ?></span></h2>
                    <p><?php echo e($themeOptions['general']['breadcrumb_description']); ?></p>
                    <?php echo $__env->yieldContent('breadcrumb'); ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Home Section End -->
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <?php echo $__env->yieldContent('content'); ?>

    <?php echo $__env->make("frontend.layout.footer", array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php echo $__env->make("frontend.layout.script", array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make("frontend.inc.alerts", array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</body>
</html>
<?php /**PATH /Users/apple/Downloads/codecanyon-pL2BDeFh-fixit-multi-vendor-on-demand-handyman-home-service-flutter-app-with-admin-complete-solution/fixit_laravel1/resources/views/frontend/layout/master.blade.php ENDPATH**/ ?>