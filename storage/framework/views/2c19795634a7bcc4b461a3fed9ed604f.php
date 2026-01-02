
<title><?php echo $__env->yieldContent('title', $themeOptions['general']['site_title'] ?? $themeOptions['seo']['meta_title']); ?> - <?php echo e($themeOptions['general']['site_tagline'] ?? null); ?></title>


<meta name="title" content="<?php echo e($themeOptions['seo']['meta_title'] ?? env('APP_NAME')); ?>">
<meta name="description" content="<?php echo $__env->yieldContent('meta_description', $themeOptions['seo']['meta_description']); ?>">
<meta name="keywords" content="<?php echo $__env->yieldContent('keywords', $themeOptions['seo']['meta_tags']); ?>">
<meta name="robots" content="index, follow"> <!-- or change to noindex, nofollow as needed -->


<link rel="canonical" href="<?php echo $__env->yieldContent('canonical_url', url()->current()); ?>">


<meta property="og:title" content="<?php echo $__env->yieldContent('og_title', $themeOptions['seo']['og_title'] ?? $themeOptions['general']['site_title']); ?>">
<meta property="og:description" content="<?php echo $__env->yieldContent('og_description', $themeOptions['seo']['og_description']); ?>">
<meta property="og:image" content="<?php echo $__env->yieldContent('og_image', asset($themeOptions['seo']['og_image'] ?? $themeOptions['general']['header_logo'])); ?>">
<meta property="og:url" content="<?php echo $__env->yieldContent('og_url', url()->current()); ?>">
<meta property="og:type" content="website">


<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?php echo $__env->yieldContent('twitter_title', $themeOptions['seo']['og_title'] ?? $themeOptions['general']['site_title']); ?>">
<meta name="twitter:description" content="<?php echo $__env->yieldContent('twitter_description', $themeOptions['seo']['og_description']); ?>">
<meta name="twitter:image" content="<?php echo $__env->yieldContent('twitter_image', asset($themeOptions['seo']['og_image'] ?? $themeOptions['general']['header_logo'])); ?>">


<meta property="og:site_name" content="<?php echo e($themeOptions['general']['site_title']); ?>">
<meta property="og:locale" content="en_US">


<meta name="viewport" content="width=device-width, initial-scale=1.0">


<link rel="icon" href="<?php echo e(asset(@$themeOptions['general']['favicon_icon'] ?? asset('admin/images/faviconIcon.png'))); ?>" type="image/x-icon">


<meta name="msvalidate.01" content="your-verification-code" /><?php /**PATH /Users/apple/Downloads/codecanyon-pL2BDeFh-fixit-multi-vendor-on-demand-handyman-home-service-flutter-app-with-admin-complete-solution/fixit_laravel1/resources/views/frontend/layout/seo.blade.php ENDPATH**/ ?>