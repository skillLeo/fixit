<?php use \app\Helpers\Helpers; ?>

<!-- ICONSAX css-->
<link rel="stylesheet" rel="preload" type="text/css" href="<?php echo e(asset('frontend/css/vendors/iconsax/iconsax.css')); ?>">
<!-- Header Section Start -->
<header>
    <div class="sub-header d-xxl-none">
        <div class="container-fluid-xl">
            <ul class="nav-right">
                <?php
                    $currency = session('currency', Helpers::getDefaultCurrencyCode());
                    $defaultCurrency = Helpers::getCurrencyByCode($currency);
                    $defaultCurrencyImg = $defaultCurrency?->media?->first()?->getUrl();
                    $currencies = Helpers::getActiveCurrencies() ?? [];
                ?>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($currencies) <= 1): ?>
                    <li class="no-dropdown nav-item-right">
                        <a href="<?php echo e(route('set.currency', $defaultCurrency?->code)); ?>" class="currency-btn">
                            <span>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Helpers::isFileExistsFromURL($defaultCurrencyImg)): ?>
                                    <img src="<?php echo e(Helpers::isFileExistsFromURL($defaultCurrencyImg, true)); ?>"
                                        alt="" class="img-fluid">
                                <?php else: ?>
                                    <img src="<?php echo e(asset('admin/images/No-image-found.jpg')); ?>" alt=""
                                        class="img-fluid">
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <?php echo e($defaultCurrency?->code); ?>

                            </span>
                        </a>
                    </li>
                <?php else: ?>
                    <li class="dropdown currency-dropdown nav-item-right">
                        <button id="unitSelected" class="currency-btn">
                            <span>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Helpers::isFileExistsFromURL($defaultCurrencyImg)): ?>
                                    <img src="<?php echo e(Helpers::isFileExistsFromURL($defaultCurrencyImg, true)); ?>"
                                        alt="" class="img-fluid">
                                <?php else: ?>
                                    <img src="<?php echo e(asset('admin/images/No-image-found.jpg')); ?>" alt=""
                                        class="img-fluid">
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <?php echo e($defaultCurrency?->code); ?>

                            </span>
                            <i class="iconsax" icon-name="chevron-down"></i>
                        </button>

                        <ul class="onhover-show-div">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <?php
                                    $currencyImg = $currency?->media?->first()?->getUrl();
                                ?>
                                <li class="currency">
                                    <a href="<?php echo e(route('set.currency', $currency?->code)); ?>">
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Helpers::isFileExistsFromURL($currencyImg)): ?>
                                            <img class="img-fluid"
                                                src="<?php echo e(Helpers::isFileExistsFromURL($currencyImg, true)); ?>"
                                                alt="<?php echo e($currency?->code); ?>" />
                                        <?php else: ?>
                                            <img src="<?php echo e(asset('admin/images/No-image-found.jpg')); ?>" alt=""
                                                class="img-fluid">
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        <?php echo e(@$currency?->code); ?>

                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <li class="currency">
                                    <img src="<?php echo e($defaultCurrency?->media?->first()?->getUrl() ?? asset('admin/images/No-image-found.jpg')); ?>"
                                        alt="<?php echo e($defaultCurrency?->code); ?>"
                                        class="img-fluid"><?php echo e($defaultCurrency?->code); ?>

                                </li>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php
                    $lang = Helpers::getLanguageByLocale(Session::get('locale', Helpers::getDefaultLanguageLocale()));
                    $flag = $lang?->flag;
                ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count(Helpers::getLanguages()) <= 1): ?>
                    <li class="no-dropdown nav-item-right">
                        <a href="<?php echo e(route('lang', ['locale' => @$lang?->locale, 'locale_flag' => @$lang?->flag_path])); ?>"
                            class="language-btn">
                            <span>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Helpers::isFileExistsFromURL($flag)): ?>
                                    <img src="<?php echo e(Helpers::isFileExistsFromURL($flag, true)); ?>"
                                        alt="<?php echo e($lang?->name); ?>" class="img-fluid">
                                <?php else: ?>
                                    <img src="<?php echo e(asset('admin/images/No-image-found.jpg')); ?>" alt=""
                                        class="img-fluid">
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <?php echo e(strtoupper(Session::get('locale', Helpers::getDefaultLanguageLocale()))); ?>

                            </span>
                        </a>
                    </li>
                <?php else: ?>
                    <li class="dropdown language-dropdown nav-item-right">
                        <button id="languageSelected" class="language-btn">
                            <span>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Helpers::isFileExistsFromURL($flag)): ?>
                                    <img src="<?php echo e(Helpers::isFileExistsFromURL($flag, true)); ?>"
                                        alt="<?php echo e($lang?->name); ?>" class="img-fluid">
                                <?php else: ?>
                                    <img src="<?php echo e(asset('admin/images/No-image-found.jpg')); ?>" alt=""
                                        class="img-fluid">
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <?php echo e(strtoupper(Session::get('locale', Helpers::getDefaultLanguageLocale()))); ?>

                            </span>
                            <i class="iconsax" icon-name="chevron-down"></i>
                        </button>
                        <ul class="onhover-show-div">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = Helpers::getLanguages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <?php
                                    $currentLocale = Session::get('locale', Helpers::getDefaultLanguageLocale());
                                ?>
                                <li class="lang">
                                    <a href="<?php echo e(route('lang', ['locale' => @$lang?->locale, 'locale_flag' => @$lang?->flag_path])); ?>"
                                        data-lng="<?php echo e(@$lang?->locale); ?>">
                                        <img class="img-fluid lang-img" alt="<?php echo e($lang?->name); ?>"
                                            src="<?php echo e(@$lang?->flag ?? asset('admin/images/No-image-found.jpg')); ?>" class="<?php echo e($lang->locale === $currentLocale ? 'selected' : ''); ?>">
                                        <?php echo e(@$lang?->name); ?>

                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <li class="lang">
                                    <a href="<?php echo e(route('lang', 'en')); ?>" data-lng="en">
                                        <img src="<?php echo e(asset('admin/images/flags/LR.png')); ?>" alt="en">
                                        En
                                    </a>
                                </li>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </ul>
        </div>
    </div>
    <div class="top-header">
        <div class="container-fluid-xl">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar custom-navbar navbar-expand-xl navbar-light justify-xl-content-start">
                        <div class="logo-content">
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($themeOptions['general']['header_logo'])): ?>
                                    <img src="<?php echo e(asset($themeOptions['general']['header_logo'])); ?>" alt="">
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </a>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Helpers::isZoneExists()): ?>
                                <div class="dropdown location-dropdown d-md-flex">
                                    <button id="add-btn" class="location-btn">
                                        <i class="iconsax" icon-name="location"></i>
                                        <span class="location-part" id="location">
                                            <span class="location-place"></span>
                                        </span>
                                        <i class="iconsax arrow" icon-name="chevron-down"></i>
                                    </button>
                                    <div id="overlay" class="overlay" style="display: none;"></div>
                                    <div id="locationBox" class="onhover-show-div">
                                        <div class="detect-location">
                                            <div class="detect-location-title">
                                                <i class="iconsax location-icon" icon-name="location"></i>
                                                <h4><?php echo e(__('frontend::static.location.title')); ?></h4>
                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count(session('zoneIds', []))): ?>
                                                    <a class="close-btn" id="locationCloseBtn"><i
                                                            class="iconsax location-icon"
                                                            icon-name="close-circle"></i></a>
                                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                            </div>
                                            <div class="location-content">
                                                <button class="btn btn-outline detect-btn" id="useCurrentLocationBtn"
                                                    type="button">
                                                    <i class="iconsax" icon-name="gps"></i>
                                                    <?php echo e(__('frontend::static.location.use_current_location')); ?> <span
                                                        class="spinner-border spinner-border-sm"
                                                        style="display: none;"></span></button>
                                                <span class="or-text"><?php echo e(__('frontend::static.location.or')); ?></span>
                                                <button type="button" data-bs-target="#locationSelected"
                                                    id="selectManuallyBtn" class="btn btn-solid manually-location-btn"
                                                    data-bs-toggle="modal">
                                                    <?php echo e(__('frontend::static.location.select_manually')); ?> </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <div class="navbar-header d-xl-none d-flex">
                                <h4>Menu</h4>
                                <button class="btn-close" type="button"></button>
                            </div>
                            <ul class="navbar-nav mx-auto custom-scroll">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($themeOptions['header']['home'] ?? false): ?>
                                    <li class="nav-item">
                                        <a class="nav-link <?php if(Request::is('/')): ?> active <?php endif; ?>"
                                            href="<?php echo e(url('/')); ?>"><?php echo e(__('frontend::static.header.home')); ?></a>
                                    </li>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($themeOptions['header']['categories'] ?? false): ?>
                                    <li class="nav-item">
                                        <a class="nav-link <?php if(Request::is('category')): ?> active <?php endif; ?>"
                                            href="<?php echo e(route('frontend.category.index')); ?>"><?php echo e(__('frontend::static.header.category')); ?></a>
                                    </li>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($themeOptions['header']['services'] ?? false): ?>
                                    <li class="nav-item">
                                        <a class="nav-link <?php if(Request::is('service')): ?> active <?php endif; ?>"
                                            href="<?php echo e(route('frontend.service.index')); ?>"><?php echo e(__('frontend::static.header.service')); ?></a>
                                    </li>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($themeOptions['header']['service_packages'] ?? false): ?>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <li class="nav-item">
                                    <a class="nav-link <?php if(Request::is('service-package')): ?> active <?php endif; ?>"
                                        href="<?php echo e(route('frontend.service-package.index')); ?>"><?php echo e(__('frontend::static.header.packages')); ?></a>
                                </li>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->check()): ?>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($themeOptions['header']['booking'] ?? false): ?>
                                        <li class="nav-item">
                                            <a class="nav-link <?php if(Request::is('booking')): ?> active <?php endif; ?>"
                                                href="<?php echo e(route('frontend.booking.index')); ?>"><?php echo e(__('frontend::static.header.booking')); ?></a>
                                        </li>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($themeOptions['header']['blogs'] ?? false): ?>
                                    <li class="nav-item">
                                        <a class="nav-link <?php if(Request::is('blog')): ?> active <?php endif; ?>"
                                            href="<?php echo e(route('frontend.blog.index')); ?>"><?php echo e(__('frontend::static.header.blog')); ?></a>
                                    </li>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </ul>
                        </div>
                        <ul class="nav-right">
                            
                            <a href="<?php echo e(route('frontend.cart.index')); ?>" class="icon nav-item-right">
                                <i class="iconsax" icon-name="shopping-cart"></i>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count(session('cartItems') ?? [])): ?>
                                    <span class="badge badge-danger"><?php echo e(count(session('cartItems') ?? [])); ?></span>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </a>

                            <?php
                                $currency = session('currency', Helpers::getDefaultCurrencyCode());
                                $defaultCurrency = Helpers::getCurrencyByCode($currency);
                                $defaultCurrencyImg = $defaultCurrency?->media?->first()?->getUrl();
                                $currencies = Helpers::getActiveCurrencies() ?? [];
                            ?>

                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($currencies) <= 1): ?>
                                <li class="no-dropdown nav-item-right d-xxl-flex d-none">
                                    <a href="<?php echo e(route('set.currency', $defaultCurrency?->code)); ?>"
                                        class="currency-btn">
                                        <span>
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Helpers::isFileExistsFromURL($defaultCurrencyImg)): ?>
                                                <img src="<?php echo e(Helpers::isFileExistsFromURL($defaultCurrencyImg, true)); ?>"
                                                    alt="" class="img-fluid">
                                            <?php else: ?>
                                                <img src="<?php echo e(asset('admin/images/No-image-found.jpg')); ?>"
                                                    alt="" class="img-fluid">
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                            <?php echo e($defaultCurrency?->code); ?>

                                        </span>
                                    </a>
                                </li>
                            <?php else: ?>
                                <li class="dropdown currency-dropdown nav-item-right d-xxl-flex d-none">
                                    <button id="unitSelected" class="currency-btn">
                                        <span>
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Helpers::isFileExistsFromURL($defaultCurrencyImg)): ?>
                                                <img src="<?php echo e(Helpers::isFileExistsFromURL($defaultCurrencyImg, true)); ?>"
                                                    alt="" class="img-fluid">
                                            <?php else: ?>
                                                <img src="<?php echo e(asset('admin/images/No-image-found.jpg')); ?>"
                                                    alt="" class="img-fluid">
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                            <?php echo e($defaultCurrency?->code); ?>

                                        </span>
                                        <i class="iconsax" icon-name="chevron-down"></i>
                                    </button>

                                    <ul class="onhover-show-div">
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <?php
                                                $currencyImg = $currency?->media?->first()?->getUrl();
                                            ?>
                                            <li class="currency">
                                                <a href="<?php echo e(route('set.currency', $currency?->code)); ?>">
                                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Helpers::isFileExistsFromURL($currencyImg)): ?>
                                                        <img class="img-fluid"
                                                            src="<?php echo e(Helpers::isFileExistsFromURL($currencyImg, true)); ?>"
                                                            alt="<?php echo e($currency?->code); ?>" />
                                                    <?php else: ?>
                                                        <img src="<?php echo e(asset('admin/images/No-image-found.jpg')); ?>"
                                                            alt="" class="img-fluid">
                                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                    <?php echo e(@$currency?->code); ?>

                                                </a>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <li class="currency">
                                                <img src="<?php echo e($defaultCurrency?->media?->first()?->getUrl() ?? asset('admin/images/No-image-found.jpg')); ?>"
                                                    alt="<?php echo e($defaultCurrency?->code); ?>"
                                                    class="img-fluid"><?php echo e($defaultCurrency?->code); ?>

                                            </li>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </ul>
                                </li>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                            <?php
                                $lang = Helpers::getLanguageByLocale(
                                    Session::get('locale', Helpers::getDefaultLanguageLocale()),
                                );
                                $flag = $lang?->flag;
                            ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count(Helpers::getLanguages()) <= 1): ?>
                                <li class="no-dropdown nav-item-right d-xxl-flex d-none">
                                    <a href="<?php echo e(route('lang', ['locale' => @$lang?->locale, 'locale_flag' => @$lang?->flag_path])); ?>"
                                        class="language-btn">
                                        <span>
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Helpers::isFileExistsFromURL($flag)): ?>
                                                <img src="<?php echo e(Helpers::isFileExistsFromURL($flag, true)); ?>"
                                                    alt="<?php echo e($lang?->name); ?>" class="img-fluid">
                                            <?php else: ?>
                                                <img src="<?php echo e(asset('admin/images/No-image-found.jpg')); ?>"
                                                    alt="" class="img-fluid">
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                            <?php echo e(strtoupper(Session::get('locale', Helpers::getDefaultLanguageLocale()))); ?>

                                        </span>
                                    </a>
                                </li>
                            <?php else: ?>
                                <li class="dropdown language-dropdown nav-item-right d-xxl-flex d-none">
                                    <button id="languageSelected" class="language-btn">
                                        <span>
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Helpers::isFileExistsFromURL($flag)): ?>
                                                <img src="<?php echo e(Helpers::isFileExistsFromURL($flag, true)); ?>"
                                                    alt="<?php echo e($lang?->name); ?>" class="img-fluid">
                                            <?php else: ?>
                                                <img src="<?php echo e(asset('admin/images/No-image-found.jpg')); ?>"
                                                    alt="" class="img-fluid">
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                            <?php echo e(strtoupper(Session::get('locale', Helpers::getDefaultLanguageLocale()))); ?>

                                        </span>
                                        <i class="iconsax" icon-name="chevron-down"></i>
                                    </button>
                                         <?php
                                            $currentLocale = Session::get('locale', Helpers::getDefaultLanguageLocale());
                                        ?>
                                    <ul class="onhover-show-div">
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = Helpers::getLanguages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <li class="lang">
                                                <a href="<?php echo e(route('lang', ['locale' => @$lang?->locale, 'locale_flag' => @$lang?->flag_path])); ?>"
                                                    data-lng="<?php echo e(@$lang?->locale); ?>" class="<?php echo e($lang->locale === $currentLocale ? 'selected' : ''); ?>">
                                                    <img class="img-fluid lang-img" alt="<?php echo e($lang?->name); ?>"
                                                        src="<?php echo e(@$lang?->flag ?? asset('admin/images/No-image-found.jpg')); ?>">
                                                    <?php echo e(@$lang?->name); ?>

                                                </a>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <li class="lang">
                                                <a href="<?php echo e(route('lang', 'en')); ?>" data-lng="en">
                                                    <img src="<?php echo e(asset('admin/images/flags/LR.png')); ?>"
                                                        alt="en">
                                                    En
                                                </a>
                                            </li>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </ul>
                                </li>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->check()): ?>
                                <li class="dropdown profile-dropdown nav-item-right">
                                    <button id="profileSelected" class="profile-btn">
                                        <span>
                                            <?php
                                                $profileImg = auth()?->user()?->getFirstMediaUrl('image');
                                            ?>
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Helpers::isFileExistsFromURL($profileImg)): ?>
                                                <img src="<?php echo e($profileImg); ?>" alt="" class="img-fluid">
                                            <?php else: ?>
                                                <span
                                                    class="profile-name initial-letter"><?php echo e(substr(auth()->user()?->name, 0, 1)); ?></span>
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                            <span class="profile-text">
                                                <?php echo e(auth()?->user()?->name); ?>

                                            </span>

                                        </span>
                                        <i class="iconsax d-sm-block d-none" icon-name="chevron-down"></i>
                                    </button>
                                    <ul class="onhover-show-div profile-onhover">
                                        <li class="profile">
                                            <a href="<?php echo e(route('frontend.account.profile.index')); ?>">
                                                <i class="iconsax"
                                                    icon-name="user-1-square"></i><?php echo e(__('frontend::static.header.my_account')); ?>

                                            </a>
                                        </li>
                                        <li class="profile">
                                            <a href="javascript:voide(0)" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                <i class="iconsax" icon-name="logout-1"></i><?php echo e(__('frontend::static.header.logout')); ?>

                                            </a>
                                            <form action="<?php echo e(route('frontend.logout')); ?>" method="POST" class="d-none" id="logout-form">
                                                <?php echo csrf_field(); ?>
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            <?php else: ?>
                                <li class="login-btn nav-item-right">
                                    <a href="<?php echo e(url('login')); ?>"
                                        class="btn btn-outline"><?php echo e(__('frontend::static.header.login')); ?>

                                        <?php echo e(__('frontend::static.header.now')); ?></a>
                                </li>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header Section End -->

<!-- location detected modal start -->
<div class="modal fade location-detected-modal" id="locationSelected" data-bs-backdrop="static"
    data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">
                    <?php echo e(__('frontend::static.home_page.your_location')); ?>

                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input class="form-control location-search" type="text" id="locationSearchInput" name="location"
                    placeholder="<?php echo e(__('frontend::static.home_page.search_location')); ?>">
                <!-- Spinner HTML -->
                <div class="position-relative">
                    <div id="locationSpinner" class="location-loader" style="display: none;">
                        <div class="spinner-border"></div>
                    </div>

                    <ul id="location-list" class="location-list"></ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- location detected modal end -->

<!-- Iconsax js -->
<script src="<?php echo e(asset('frontend/js/iconsax/iconsax.js')); ?>"></script>

<?php $__env->startPush('js'); ?>
    <script>
        (function($) {
            $('.currency').on('click', function() {
                let selectedCurrency = $(this).text().trim();
                $.ajax({
                    url: "<?php echo e(url('set-currency')); ?>/" + selectedCurrency,
                    type: "GET",
                    success: function() {
                        $('#unitSelected span').html($(this)
                            .html()); // Update selected currency button
                        location.reload(); // Reload the page to reflect the currency change
                    },
                    error: function(xhr) {
                        console.error("Error setting currency:", xhr.responseText);
                    }
                });
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /Users/apple/Downloads/codecanyon-pL2BDeFh-fixit-multi-vendor-on-demand-handyman-home-service-flutter-app-with-admin-complete-solution/fixit_laravel1/resources/views/frontend/layout/header.blade.php ENDPATH**/ ?>