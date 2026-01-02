
<?php use \app\Helpers\Helpers; ?>
<?php use \App\Enums\FavouriteListEnum; ?>
<?php use \App\Enums\BookingEnumSlug; ?>
<?php use \App\Enums\FrontEnum; ?>
<?php use \App\Enums\SymbolPositionEnum; ?>
<?php use \App\Models\Booking; ?>
<?php
    $locale =  app()->getLocale();
    $mediaItems = $service?->getMedia('image')?->filter(function ($media) use ($locale) {
        return $media->getCustomProperty('language') === $locale;
    });
    $imageUrl = $mediaItems?->count() > 0  ? $mediaItems?->first()?->getUrl() : FrontEnum::getPlaceholderImageUrl();
?>


<?php $__env->startSection('title', $service?->title); ?>
<?php $__env->startSection('meta_description', $service?->meta_description ?? $service?->description); ?>
<?php $__env->startSection('og_title', $service?->meta_title ?? $service?->title); ?>
<?php $__env->startSection('og_description', $service?->meta_description ?? $service?->description); ?>
<?php $__env->startSection('og_image', $imageUrl); ?>
<?php $__env->startSection('twitter_title', $service?->meta_title ?? $service?->title); ?>
<?php $__env->startSection('twitter_description', $service?->meta_description ?? $service?->description); ?>
<?php $__env->startSection('twitter_image', $imageUrl); ?>

<?php $__env->startSection('breadcrumb'); ?>
<nav class="breadcrumb breadcrumb-icon">
    <a class="breadcrumb-item" href="<?php echo e(url('/')); ?>"><?php echo e(__('frontend::static.services.home')); ?></a>
    <a class="breadcrumb-item" href="<?php echo e(route('frontend.service.index')); ?>"><?php echo e(__('frontend::static.services.services')); ?></a>
    <span class="breadcrumb-item active"><?php echo e($service?->title); ?></span>
</nav>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<!-- Service List Section Start -->
<section class="service-list-section">
    <div class="container-fluid-lg">
        <div class="row service-list-content g-sm-4 g-3">
            <div class="col-xxl-8 col-lg-7">
                <div class="swiper service-detail-slider">
                    <div class="swiper-wrapper">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $service->web_img_galleries_url; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $imageUrl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="swiper-slide ratio_45">
                            <div class="position-relative">
                                <div class="service-img">
                                    <?php
                                        $consumerId = auth()->id();
                                        $favouriteServiceId = \App\Models\FavouriteList::where('consumer_id', $consumerId)->pluck('service_id')->toArray();
                                    ?>
                                        <img src="<?php echo e($imageUrl); ?>" alt="offer" class="bg-img">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->check()): ?>
                                    <div class="like-icon b-top" id="favouriteDiv" data-service-id="<?php echo e($service?->id); ?>">
                                        <img class="img-fluid icon outline-icon " src="<?php echo e(asset('frontend/images/svg/heart-outline.svg')); ?>" alt="whishlist">
                                        <img class="img-fluid icon fill-icon" src="<?php echo e(asset('frontend/images/svg/heart-fill.svg')); ?>" alt="wishlisted">
                                    </div>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                    <div class="swiper-button-next5"></div>
                    <div class="swiper-button-prev5"></div>
                    <div class="swiper-pagination"></div>
                </div>
                <div class="detail-content service-details-content">
                    <div class="title">
                        <h3><?php echo e($service->title); ?></h3>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($service->discount): ?>
                            <span class="badge danger-light-badge">
                                <?php echo e($service->discount); ?>% <?php echo e(__('frontend::static.services.discount')); ?>

                            </span>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                    <p>
                        <?php echo e($service->description); ?>

                    </p>
                    <div>
                        <?php echo $service->content; ?>

                    </div>
                </div>
            </div>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->check()): ?>
            <?php if ($__env->exists('frontend.inc.modal',['service' => $service])) echo $__env->make('frontend.inc.modal',['service' => $service], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <div class="col-xxl-4 col-lg-5">
                <div class="sticky">
                    <div class="amount">
                        <div class="amount-header">
                            <span><?php echo e(__('frontend::static.services.amount')); ?> :</span>
                            <small class="value">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Helpers::getDefaultCurrency()->symbol_position === SymbolPositionEnum::LEFT): ?>
                                    <?php echo e(Helpers::getDefaultCurrencySymbol()); ?><?php echo e(Helpers::covertDefaultExchangeRate($service->price)); ?>

                                <?php else: ?>
                                    <?php echo e(Helpers::covertDefaultExchangeRate($service->price)); ?> <?php echo e(Helpers::getDefaultCurrencySymbol()); ?>

                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </small>
                        </div>
                        <div class="amount-detail">
                            <ul>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($service?->duration): ?>
                                <li>
                                    <i class="iconsax" icon-name="clock"></i>
                                    <?php echo e(__('frontend::static.services.around')); ?> <?php echo e($service?->duration); ?> <?php echo e($service?->duration_unit); ?>

                                </li>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <li>
                                    <i class="iconsax" icon-name="user-1-tag"></i>
                                    <?php echo e(__('frontend::static.services.min')); ?> <?php echo e($service?->required_servicemen); ?> <?php echo e(__('frontend::static.services.servicemen_required_for')); ?>

                                </li>
                                <li>
                                    <i class="iconsax" icon-name="text"></i>
                                    <?php echo e(__('frontend::static.bookings.service_type')); ?> :  <?php echo e(Helpers::formatServiceType($service?->type)); ?>

                                </li>
                            </ul>
                        </div>
                    </div>
                    <button type="button" class="btn book-now-btn btn-solid mt-sm-4 mt-3" data-bs-toggle="modal" data-bs-toggle="modal" 
                            data-bs-target="#bookServiceModal-<?php echo e($service->id); ?>"
                            data-login-url="<?php echo e(route('frontend.login')); ?>"
                            data-check-login-url="<?php echo e(route('frontend.check.login')); ?>"
                            data-service-id="<?php echo e($service->id); ?>">
                    <?php echo e(__('frontend::static.services.book_now')); ?><span class="spinner-border spinner-border-sm" style="display: none;"></span>
                    </button>

                    <div class="provider-detail mt-sm-4 mt-3">
                        <label class="mb-sm-3 mb-2"><?php echo e(__('frontend::static.services.provider_details')); ?></label>
                        <div class="provider-content">
                            <div class="profile-bg"></div>
                            <div class="profile">
                                <a href="<?php echo e(route('frontend.provider.details', ['slug' => $service?->user?->slug])); ?>"> 
                                    <img src="<?php echo e($service?->user?->media?->first()?->original_url ?? asset('frontend/images/user.png')); ?>" alt="<?php echo e($service?->user->name); ?>" class="img">
                                </a>
                                <a href="<?php echo e(route('frontend.provider.details', ['slug' => $service?->user?->slug])); ?>"> 
                                <h3 class="mt-sm-2 mt-1"><?php echo e($service?->user->name); ?></h3>
                                </a>
                            </div>
                            <div class="profile-detail">
                                <ul>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($service?->user->known_languages && count($service?->user->known_languages)): ?>
                                    <li>
                                        <label for="language"><?php echo e(__('frontend::static.services.known_language')); ?></label>
                                        <span><?php echo e(implode($service?->user->known_languages)); ?></span>
                                    </li>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </ul>
                            </div>
                            <div class="success-light-badge badge">
                                <span><?php echo e($service?->user->served); ?> <?php echo e(__('frontend::static.services.service_delivered')); ?></span>
                            </div>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($service?->user?->experience_duration): ?>
                            <div class="danger-light-badge badge mb-0">
                                <span><?php echo e($service?->user?->experience_duration); ?> <?php echo e($service?->user?->experience_interval); ?> <?php echo e(__('frontend::static.services.of_experience')); ?></span>
                            </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 content-b-space">
                <div class="title">
                    <h2><?php echo e(__('frontend::static.services.featured_services')); ?></h2>
                    <a class="view-all" href="<?php echo e(route('frontend.service.index')); ?>">
                    <?php echo e(__('frontend::static.services.view_all')); ?>

                        <i class="iconsax" icon-name="arrow-right"></i>
                    </a>
                </div>
                <div class="row g-sm-4 g-3">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $recentService; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="card">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($service->discount): ?>
                            <div class="discount-tag"><?php echo e($service->discount); ?>%</div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->check()): ?>
                            <div class="like-icon" id="favouriteDiv" data-service-id="<?php echo e($service?->id); ?>">
                                <img class="img-fluid icon outline-icon" src="<?php echo e(asset('frontend/images/svg/heart-outline.svg')); ?>"
                                    alt="whishlist">
                                <img class="img-fluid icon fill-icon" src="<?php echo e(asset('frontend/images/svg/heart-fill.svg')); ?>" alt="wishlisted">
                            </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <div class="overflow-hidden b-r-5">
                                <a href="<?php echo e(route('frontend.service.details', $service?->slug)); ?>" class="card-img">
                                    <img src="<?php echo e($service?->web_img_thumb_url); ?>" alt="<?php echo e($service?->title); ?>" class="img-fluid">
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="service-title">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($service?->title): ?>
                                    <h4><a href="<?php echo e(route('frontend.service.details', $service?->slug)); ?>"><?php echo e($service?->title); ?></a>
                                    </h4>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($service->price || $service->service_rate): ?>
                                    <div class="d-flex align-items-center gap-1">
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($service?->discount) && $service?->discount > 0): ?>
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Helpers::getDefaultCurrency()->symbol_position === SymbolPositionEnum::LEFT): ?>
                                                <del><?php echo e(Helpers::getDefaultCurrencySymbol()); ?><?php echo e(Helpers::covertDefaultExchangeRate($service->price)); ?></del>
                                                <small><?php echo e(Helpers::getDefaultCurrencySymbol()); ?><?php echo e(Helpers::covertDefaultExchangeRate($service->service_rate)); ?></small>
                                            <?php else: ?>
                                                <del><?php echo e(Helpers::covertDefaultExchangeRate($service->price)); ?> <?php echo e(Helpers::getDefaultCurrencySymbol()); ?></del>
                                                <small><?php echo e(Helpers::covertDefaultExchangeRate($service->service_rate)); ?> <?php echo e(Helpers::getDefaultCurrencySymbol()); ?></small>
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        <?php else: ?>
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Helpers::getDefaultCurrency()->symbol_position === SymbolPositionEnum::LEFT): ?>
                                                <small><?php echo e(Helpers::getDefaultCurrencySymbol()); ?><?php echo e(Helpers::covertDefaultExchangeRate($service->price)); ?></small>
                                            <?php else: ?>
                                                <small><?php echo e(Helpers::covertDefaultExchangeRate($service->price)); ?> <?php echo e(Helpers::getDefaultCurrencySymbol()); ?></small>
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </div>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>
                                <div class="service-detail mt-1">
                                    <div class="d-flex align-items-center justify-content-between gap-2 flex-wrap">
                                        <ul>
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($service?->duration): ?>
                                                <li class="time">
                                                    <i class="iconsax" icon-name="clock"></i>
                                                    <span><?php echo e($service?->duration); ?><?php echo e($service?->duration_unit === 'hours' ? 'h' : 'm'); ?></span>
                                                </li>
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                            <li class="w-auto service-person">
                                                <img src="<?php echo e(asset('frontend/images/svg/services-person.svg')); ?>" alt="">
                                                <span><?php echo e($service?->required_servicemen); ?></span>
                                            </li>
                                        </ul>
                                        <h6 class="service-type mt-2"><span><?php echo e(Helpers::formatServiceType($service?->type)); ?></span>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer border-top-0">
                                <div class="footer-detail">
                                    <img src="<?php echo e($service?->user?->media?->first()?->getURL()); ?>" alt="feature" class="img-fluid">
                                    <div>
                                        <p><?php echo e($service?->user?->name); ?></p>
                                        <div class="rate">
                                            <img src="<?php echo e(asset('frontend/images/svg/star.svg')); ?>" alt="star" class="img-fluid star">
                                            <small><?php echo e($service?->user?->review_ratings ?? 'Unrated'); ?></small>
                                        </div>
                                    </div>
                                </div>

                                <button type="button" class="btn book-now-btn btn-solid w-auto" id="bookNowButton"
                                        data-bs-toggle="modal" 
                                        data-bs-target="#bookServiceModal-<?php echo e($service->id); ?>"
                                        data-login-url="<?php echo e(route('frontend.login')); ?>"
                                        data-check-login-url="<?php echo e(route('frontend.check.login')); ?>"
                                        data-service-id="<?php echo e($service->id); ?>">
                                    <?php echo e(__('frontend::static.services.book_now')); ?>

                                    <span class="spinner-border spinner-border-sm" style="display: none;"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Service List Section End -->
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $recentService; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
<?php if ($__env->exists('frontend.inc.modal',['service' => $service])) echo $__env->make('frontend.inc.modal',['service' => $service], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
<script>
    "use strict";
    $(function() {
        $(document).on('click', '.qtyadd', function () {            
            let parent = $(this).closest('.form-check');
            let input = parent.find('.additional_services_qty');
            let priceSpan = parent.find('.additional-price');
            let basePrice = parseFloat(priceSpan.data('base-price'));
            let val = +input.val();
            
            updatePrice(priceSpan, basePrice, val);
        });

        $(document).on('click', '.qtyminus', function () {
            let parent = $(this).closest('.form-check');
            let input = parent.find('.additional_services_qty');
            let priceSpan = parent.find('.additional-price');
            let basePrice = parseFloat(priceSpan.data('base-price'));
            let val = +input.val();

            updatePrice(priceSpan, basePrice, val);
        });

        // Function to update total price inside span
        function updatePrice(priceSpan, basePrice, qty) {
            let currency = "<?php echo e(Helpers::getDefaultCurrencySymbol()); ?>";
            let position = "<?php echo e(Helpers::getDefaultCurrency()->symbol_position->value); ?>";
            let total = (basePrice * qty).toFixed(2);
            
            if (position === "left") {
                priceSpan.text(currency + total);
            } else {
                priceSpan.text(total + " " + currency);
            }
        }

    });
</script>
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->check()): ?>
<script src="<?php echo e(asset('frontend/js/custom-wishlist.js')); ?>"></script>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('frontend.layout.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/apple/Downloads/codecanyon-pL2BDeFh-fixit-multi-vendor-on-demand-handyman-home-service-flutter-app-with-admin-complete-solution/fixit_laravel1/resources/views/frontend/service/details.blade.php ENDPATH**/ ?>