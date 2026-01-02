<?php use \App\Helpers\Helpers; ?>
<?php use \App\Models\Setting; ?>
<?php use \App\Enums\AdvertisementTypeEnum; ?>
<?php use \App\Enums\SymbolPositionEnum; ?>

<?php
    // Normalize Home Page config to array + provide defaults
    $homePageRaw = Helpers::getCurrentHomePage();
    $homePageArr = is_array($homePageRaw) ? $homePageRaw : (json_decode((string) $homePageRaw, true) ?: []);

    $homePageDefaults = [
        'home_banner' => [
            'title' => '',
            'animate_text' => '',
            'description' => '',
            'search_enable' => false,
            'status' => false,
            'service_ids' => [],
        ],
        'categories_icon_list' => ['status' => false, 'title' => '', 'category_ids' => []],
        'value_banners' => ['status' => false, 'title' => '', 'banners' => []],
        'service_list_1' => ['status' => false, 'title' => '', 'service_ids' => []],
        'download' => ['status' => false, 'title' => '', 'description' => '', 'image_url' => '', 'points' => []],
        'special_offers_section' => ['service_section_title' => '', 'banner_section_title' => ''],
        'providers_list' => ['status' => false, 'title' => '', 'provider_ids' => []],
        'service_packages_list' => ['status' => false, 'title' => '', 'service_packages_ids' => []],
        'blogs_list' => ['status' => false, 'blog_ids' => []],
        'custom_job' => ['status' => false, 'title' => '', 'button_text' => '', 'image_url' => ''],
        'become_a_provider' => [
            'status' => false, 'title' => '', 'description' => '', 'button_text' => '',
            'image_url' => '', 'float_image_1_url' => '', 'float_image_2_url' => '', 'points' => [],
        ],
        'testimonial' => ['status' => false, 'title' => ''],
        'news_letter' => ['status' => false, 'title' => '', 'sub_title' => '', 'button_text' => '', 'bg_image_url' => ''],
    ];

    $homePage = array_replace_recursive($homePageDefaults, $homePageArr);

    // Settings safe
    $settingsRaw = Setting::query()->value('values'); // safer than pluck()->first()
    $settings = is_array($settingsRaw) ? $settingsRaw : (json_decode((string) $settingsRaw, true) ?: []);
    $settings = array_replace_recursive(['service_request' => ['status' => false]], $settings);

    $homePageAdvertiseBanners = Helpers::getHomePageAdvertiseBanners() ?? [];
    $advertiseServices = Helpers::getHomePageAdvertiseServices() ?? [];
?>



<?php $__env->startSection('title', $themeOptions['general']['site_title']); ?>

<?php $__env->startSection('content'); ?>
    <?php use \App\Enums\ServiceTypeEnum; ?>
    <?php use \App\Enums\FrontEnum; ?>
    <!-- Home Banner Section Start -->
    <section class="home-section pt-0 overflow-hidden">
        <div class="home-icon">
            <svg class="image-1 lozad">
                <use xlink:href="<?php echo e(asset('frontend/images/dot.svg#dots')); ?>"></use>
            </svg>
            <img src="<?php echo e(asset('frontend/images/Dots.png')); ?>" class="image-2 lozad" alt="">
            <img src="<?php echo e(asset('frontend/images/gif/arrow-gif.gif')); ?>" class="image-3 lozad" alt="">
        </div>
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="home-contain">
                        <h1><?php echo e($homePage['home_banner']['title']); ?>

                            <span class="home-animation">
                                <?php echo e($homePage['home_banner']['animate_text']); ?>

                                <img class="shape lozad" src="<?php echo e(asset('frontend/images/heading-bg.png')); ?>" alt="shape">
                            </span>
                        </h1>
                        <p>
                            <?php echo e($homePage['home_banner']['description']); ?>

                        </p>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($homePage['home_banner']['search_enable']): ?>
                            <div class="home-form-group">
                                <div class="input-group">
                                    <div class="position-relative w-100">
                                        <input id="searchInput" class="form-control" type="text" name="service"
                                            placeholder="<?php echo e(__('frontend::static.home_page.search_service')); ?>"
                                            autocomplete="off">
                                        <i class="iconsax" icon-name="search-normal-2"></i>
                                    </div>
                                    <button id="findServiceBtn" type="button" class="btn btn-solid w-auto">
                                        <i data-feather="search" class="d-sm-none"></i>
                                        <span
                                            class="d-sm-block d-none"><?php echo e(__('frontend::static.home_page.find_service')); ?></span>
                                    </button>
                                </div>
                                <div id="searchResults" class="autocomplete-results" style="display: none;"></div>
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Swiper -->
        <div class="home-slider ratio_asos_1">
            <?php
                $services = Helpers::getServices($homePage['home_banner']['service_ids'] ?? [])->where('status', 1);
            ?>
            <div class="swiper service-slider">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($homePage['home_banner']['status']): ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($services)): ?>
                        <div class="swiper-wrapper">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <!-- Slide Start -->
                                <div class="swiper-slide">
                                    <div class="service-card">
                                        <div class="img-box">
                                            <a href="<?php echo e(route('frontend.service.details', ['slug' => $service?->slug])); ?>">
                                                <img class="img-fluid bg-img lozad"
                                                    src="<?php echo e($service?->web_img_thumb_url); ?>" alt="service" />
                                                <div class="service-content" title="<?php echo e($service?->title); ?>">
                                                    <span><?php echo e($service?->title); ?></span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Slide End -->
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    </section>
    <!-- Home Banner Section End -->

    <!-- Category Section Start -->
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($homePage['categories_icon_list']['status']): ?>
        <section class="category-section">
            <div class="container-fluid-lg">
                <div class="title">
                    <h2><?php echo e($homePage['categories_icon_list']['title']); ?></h2>
                    <a class="view-all" href="<?php echo e(route('frontend.category.index')); ?>" rel="noopener noreferrer">
                        <?php echo e(__('frontend::static.home_page.browse_all_categories')); ?>

                        <i class="iconsax" icon-name="arrow-right"></i>
                    </a>
                </div>
                <?php
                    $categories = Helpers::getCategories($homePage['categories_icon_list']['category_ids'] ?? []);
                ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($categories)): ?>
                    <div class="swiper nav-tabs nav category-slider custom-nav-tabs" id="myTab">
                        <div class="swiper-wrapper">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="swiper-slide nav-item" id="nav-item">
                                    <?php
                                        $locale = app()->getLocale();
                                        $mediaItems = $category
                                            ->getMedia('image')
                                            ->filter(function ($media) use ($locale) {
                                                return $media->getCustomProperty('language') === $locale;
                                            });
                                        $imageUrl =
                                            $mediaItems->count() > 0
                                                ? $mediaItems->first()->getUrl()
                                                : FrontEnum::getPlaceholderImageUrl();
                                    ?>
                                    <button class="nav-link <?php echo e($loop->first ? 'active' : ''); ?>"
                                        id="<?php echo e($category?->slug); ?>-tab" data-bs-toggle="tab"
                                        data-bs-target="#<?php echo e($category?->slug); ?>" type="button" role="tab">
                                        <div class="img-box">
                                            <img src="<?php echo e(Helpers::isFileExistsFromURL($imageUrl, true)); ?>"
                                                alt="<?php echo e($category?->title); ?>" class="img-fluid lozad">
                                        </div>
                                        <span><?php echo e($category?->title); ?></span>
                                        <small><?php echo e(count($category->services?->whereNull('parent_id')?->where('status', true))); ?>

                                            <?php echo e(__('frontend::static.home_page.services')); ?></small>
                                    </button>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                    <ul class="nav nav-tabs custom-nav-tabs custom-scroll" id="myTab">
                        
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="tab-pane fade <?php echo e($loop?->first ? 'show active' : ''); ?>" id="<?php echo e($category->slug); ?>"
                                role="tabpanel">
                                <div class="row row-cols-2 row-cols-sm-3 ratio_94 row-cols-md-4 row-cols-xl-5 g-sm-4 g-3">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $category->services?->whereNull('parent_id')?->where('status', true)->where('is_custom_offer', false); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $services): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <div class="col">
                                            <a href="<?php echo e(route('frontend.service.details', ['slug' => $services?->slug])); ?>"
                                                class="category-img"><img src="<?php echo e($services?->web_img_thumb_url); ?>"
                                                    alt="<?php echo e($services?->title); ?>" class="bg-img lozad"></a>
                                            <a href="<?php echo e(route('frontend.service.details', ['slug' => $services?->slug])); ?>"
                                                class="category-img"><span title="<?php echo e($services?->title); ?>"
                                                    class="category-span"><?php echo e($services?->title); ?></span></a>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <div class="no-data-found">
                                            <p><?php echo e(__('frontend::static.home_page.services_not_found')); ?></p>
                                        </div>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                <?php else: ?>
                    <div class="no-data-found">
                        <p><?php echo e(__('frontend::static.home_page.categories_not_found')); ?></p>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <!-- Category Section End -->

    <!-- Value Banner Section Start -->
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($homePage['value_banners']['banners'])): ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($homePage['value_banners']['status']): ?>
            <!-- Value Banner Section Start -->
            <section class="offer-section section-b-space">
                <div class="container-fluid-lg">
                    <div class="title">
                        <h2><?php echo e($homePage['value_banners']['title']); ?></h2>
                    </div>
                    <div class="offer-content">
                        <div class="swiper offer-slider">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($homePage['value_banners']['banners'])): ?>
                                <div class="swiper-wrapper">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $homePage['value_banners']['banners']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <div class="swiper-slide">
                                            <div class="position-relative">
                                                <div class="sale-tag">
                                                    <span><?php echo e($banner['sale_tag']); ?></span>
                                                </div>
                                                <div class="offer-img">
                                                    <img src="<?php echo e(asset($banner['image_url'] ?? 'frontend/images/img-not-found.jpg')); ?>"
                                                        alt="<?php echo e($homePage['value_banners']['title']); ?>" class="img-fluid lozad">
                                                </div>
                                                <div class="offer-detail">
                                                    <h3><?php echo e($banner['title']); ?></h3>
                                                    <p><?php echo e($banner['description']); ?></p>
                                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($banner['redirect_type'] == 'service-page'): ?>
                                                        <a href="<?php echo e(route('frontend.service.index')); ?>"
                                                            class="btn btn-outline"><?php echo e($banner['button_text']); ?></a>
                                                    <?php elseif($banner['redirect_type'] == 'service-package-page'): ?>
                                                        <a href="<?php echo e(route('frontend.service-package.index')); ?>"
                                                            class="btn btn-outline"><?php echo e($banner['button_text']); ?></a>
                                                    <?php elseif($banner['redirect_type'] == 'category-page'): ?>
                                                        <a href="<?php echo e(route('frontend.category.index')); ?>"
                                                            class="btn btn-outline"><?php echo e($banner['button_text']); ?></a>
                                                    <?php elseif($banner['redirect_type'] == 'service'): ?>
                                                        <?php
                                                            $service = Helpers::getServiceById($banner['redirect_id']);
                                                        ?>

                                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($service && $service->slug): ?>
                                                            <a href="<?php echo e(route('frontend.service.details', ['slug' => $service->slug])); ?>"
                                                                class="btn btn-outline"><?php echo e($banner['button_text']); ?></a>
                                                        <?php else: ?>
                                                            <a href="<?php echo e(route('frontend.service.index')); ?>"
                                                                class="btn btn-outline"><?php echo e($banner['button_text']); ?></a>
                                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                    <?php elseif($banner['redirect_type'] == 'package'): ?>
                                                        <?php
                                                            $servicePackage = Helpers::getServicePackageById(
                                                                $banner['redirect_id'],
                                                            );

                                                        ?>
                                                        <a href="<?php echo e(route('frontend.service-package.details', ['slug' => $servicePackage?->slug])); ?>"
                                                            class="btn btn-outline"><?php echo e($banner['button_text']); ?></a>
                                                    <?php elseif($banner['redirect_type'] == 'external_url'): ?>
                                                        <a href="<?php echo e($banner['button_url']); ?>"
                                                            class="btn btn-outline"><?php echo e($banner['button_text']); ?></a>
                                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <div class="no-data-found">
                                            <p><?php echo e(__('frontend::static.home_page.banners_not_found')); ?></p>
                                        </div>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <!-- Value Banner Section End -->

    <!-- Service Section Start -->
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($homePage['service_list_1']['status']): ?>
        <section class="service-list-section section-bg section-b-space">
            <div class="container-fluid-lg">
                <div class="title">
                    <h2><?php echo e($homePage['service_list_1']['title']); ?></h2>
                </div>
                <div class="service-list-content">
                    <?php
                        $services = Helpers::getServices($homePage['service_list_1']['service_ids'] ?? [])
                            ?->paginate($themeOptions['pagination']['service_per_page'])
                            ->where('status', 1);
                    ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($services ?? [])): ?>
                        <div class="feature-slider">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div>
                                    <div>
                                        <div class="card">
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($service->discount): ?>
                                                <div class="discount-tag"><?php echo e($service->discount); ?>%</div>
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                            <div class="overflow-hidden b-r-5">
                                                <a href="<?php echo e(route('frontend.service.details', $service?->slug)); ?>"
                                                    class="card-img">
                                                    <img src="<?php echo e($service?->web_img_thumb_url); ?>"
                                                        alt="<?php echo e($service?->title); ?>" class="img-fluid lozad">
                                                </a>
                                            </div>
                                            <div class="card-body">
                                                <div class="service-title">
                                                    <h4>
                                                        <a title="<?php echo e($service?->title); ?>" href="<?php echo e(route('frontend.service.details', $service?->slug)); ?>"><?php echo e($service?->title); ?></a>
                                                    </h4>
                                                    <!---->
                                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($service->price || $service->service_rate): ?>
                                                        <div class="d-flex align-items-center gap-1">
                                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($service?->discount) && $service?->discount > 0): ?>
                                                                <span>
                                                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Helpers::getDefaultCurrency()->symbol_position === SymbolPositionEnum::LEFT): ?>
                                                                        <del><?php echo e(Helpers::getDefaultCurrencySymbol()); ?><?php echo e(Helpers::covertDefaultExchangeRate($service->price)); ?></del>
                                                                    <?php else: ?>
                                                                        <del><?php echo e(Helpers::covertDefaultExchangeRate($service->price)); ?>

                                                                            <?php echo e(Helpers::getDefaultCurrencySymbol()); ?></del>
                                                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                                </span>
                                                                <small>
                                                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Helpers::getDefaultCurrency()->symbol_position === SymbolPositionEnum::LEFT): ?>
                                                                        <?php echo e(Helpers::getDefaultCurrencySymbol()); ?><?php echo e(Helpers::covertDefaultExchangeRate($service->service_rate)); ?>

                                                                    <?php else: ?>
                                                                        <?php echo e(Helpers::covertDefaultExchangeRate($service->service_rate)); ?>

                                                                        <?php echo e(Helpers::getDefaultCurrencySymbol()); ?>

                                                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                                </small>
                                                            <?php else: ?>
                                                                <small>
                                                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Helpers::getDefaultCurrency()->symbol_position === SymbolPositionEnum::LEFT): ?>
                                                                        <?php echo e(Helpers::getDefaultCurrencySymbol()); ?><?php echo e(Helpers::covertDefaultExchangeRate($service->price)); ?>

                                                                    <?php else: ?>
                                                                        <?php echo e(Helpers::covertDefaultExchangeRate($service->price)); ?>

                                                                        <?php echo e(Helpers::getDefaultCurrencySymbol()); ?>

                                                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                                </small>
                                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                        </div>
                                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                </div>
                                                <div class="service-detail mt-1">
                                                    <div
                                                        class="d-flex align-items-center justify-content-between gap-2 flex-wrap">
                                                        <ul>
                                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($service?->duration): ?>
                                                                <li class="time">
                                                                    <i class="iconsax" icon-name="clock"></i>
                                                                    <span><?php echo e($service?->duration); ?><?php echo e($service?->duration_unit === 'hours' ? 'h' : 'm'); ?></span>
                                                                </li>
                                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                            <li class="w-auto service-person">
                                                                <img src="<?php echo e(asset('frontend/images/svg/services-person.svg')); ?>"
                                                                    alt="">
                                                                <span><?php echo e($service->required_servicemen); ?></span>
                                                            </li>
                                                        </ul>
                                                        <h6 class="service-type mt-2"><span>
                                                                <?php echo e(Helpers::formatServiceType($service?->type)); ?></span>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer border-top-0">
                                                <div class="footer-detail">
                                                    <img src="<?php echo e(Helpers::isFileExistsFromURL($service?->user?->media?->first()?->getURL(), true)); ?>"
                                                        alt="feature" class="img-fluid lozad">
                                                    <div>
                                                        <a href="<?php echo e(route('frontend.provider.details', ['slug' => $service?->user?->slug])); ?>">
                                                            <p title="<?php echo e($service?->user?->name); ?>"><?php echo e($service?->user?->name); ?></p>
                                                        </a>
                                                        <div class="rate">
                                                            <img data-src="<?php echo e(asset('frontend/images/svg/star.svg')); ?>" alt="star" class="img-fluid star lozad">
                                                            <small><?php echo e($service?->user?->review_ratings ?? 'Unrated'); ?></small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                    data-bs-custom-class="book-now-tooltip"
                                                    data-bs-title="<?php echo e(__('frontend::static.home_page.book_now')); ?>"
                                                    type="button" class="btn book-now-btn btn-solid w-auto"
                                                    id="bookNowButton" data-bs-toggle="modal"
                                                    data-bs-target="#bookServiceModal-<?php echo e($service->id); ?>"
                                                    data-login-url="<?php echo e(route('frontend.login')); ?>"
                                                    data-check-login-url="<?php echo e(route('frontend.check.login')); ?>"
                                                    data-service-id="<?php echo e($service->id); ?>">
                                                    <span><?php echo e(__('frontend::static.home_page.book_now')); ?></span>
                                                    <span class="spinner-border spinner-border-sm"
                                                        style="display: none;"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    <?php else: ?>
                        <div class="w-100 m-0">
                            <div class="no-data-found">
                                <p><?php echo e(__('frontend::static.home_page.services_not_found')); ?></p>
                            </div>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        </section>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php if ($__env->exists('frontend.inc.modal', ['service' => $service])) echo $__env->make('frontend.inc.modal', ['service' => $service], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <!-- Service Section End -->

    <!-- Application Section Start -->
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($homePage['download']['status']): ?>
        <section class="application-section section-b-space overflow-hidden">
            <div class="container-fluid-lg">
                <div class="section-wrap">
                    <svg class="image-1">
                        <use xlink:href="<?php echo e(asset('frontend/images/dots.svg#dots')); ?>"></use>
                    </svg>
                    
                    <img src="<?php echo e(asset('frontend/images/Dots.png')); ?>" class="image-2 lozad" alt="">
                    <div class="row g-5">
                        <div class="col-xl-7 col-lg-6">
                            <div class="image-grp">
                                <img src="<?php echo e(asset('frontend/images/vector.png')); ?>" class="vector-1 lozad"
                                    alt="app store">
                                <img src="<?php echo e(asset($homePage['download']['image_url'])); ?>" class="app-gif lozad"
                                    alt="app store">
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-6">
                            <div class="title">
                                <h2><?php echo e($homePage['download']['title']); ?></h2>
                            </div>
                            <div class="content-detail">
                                <p>
                                    <?php echo e($homePage['download']['description']); ?>

                                </p>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($homePage['download']['points'])): ?>
                                    <ul class="item-lists">
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $homePage['download']['points']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $point): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="item-list"><?php echo e($point); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </ul>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($themeOptions['general'])): ?>
                                <div class="app-install">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($themeOptions['general']['app_store_url'])): ?>
                                        <a href="<?php echo e($themeOptions['general']['app_store_url']); ?>" target="_blank"
                                            rel="noopener noreferrer">
                                            <img src="<?php echo e(asset('frontend/images/app-store.png')); ?>" alt="app store"
                                                class="lozad">
                                        </a>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($themeOptions['general']['google_play_store_url'])): ?>
                                        <a href="<?php echo e($themeOptions['general']['google_play_store_url']); ?>" target="_blank"
                                            rel="noopener noreferrer">
                                            <img src="<?php echo e(asset('frontend/images/google-play.png')); ?>" alt="google play"
                                                class="lozad">
                                        </a>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <!-- Application Section End -->

    <!-- Spcial Offer In Service Section Start -->
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($advertiseServices)): ?>
        <section class="service-list-section section-bg section-b-space">
            <div class="container-fluid-lg">
                <div class="title">
                    <h2><?php echo e($homePage['special_offers_section']['service_section_title'] ? $homePage['special_offers_section']['service_section_title'] : __('Today special offers')); ?>

                    </h2>
                </div>
                <div class="service-list-content ratio3_2">
                    <div class="feature-slider">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $advertiseServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $advertisement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $advertisement->services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div>
                                    <div class="card">
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($service->discount): ?>
                                            <div class="discount-tag"><?php echo e($service->discount); ?>%</div>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        <div class="overflow-hidden b-r-5">
                                            <a href="<?php echo e(route('frontend.service.details', $service?->slug)); ?>" class="card-img">
                                                <span class="ribbon">Trending</span>
                                                <img src="<?php echo e($service?->web_img_thumb_url); ?>" alt="<?php echo e($service?->title); ?>" class="img-fluid lozad">
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <div class="service-title">
                                                <h4>
                                                    <a title="<?php echo e($service?->title); ?>" href="<?php echo e(route('frontend.service.details', $service?->slug)); ?>"><?php echo e($service?->title); ?></a>
                                                </h4>
                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($service->price || $service->service_rate): ?>
                                                    <div class="d-flex align-items-center gap-1">
                                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($service?->discount) && $service?->discount > 0): ?>
                                                            <span>
                                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Helpers::getDefaultCurrency()->symbol_position === SymbolPositionEnum::LEFT): ?>
                                                                    <del><?php echo e(Helpers::getDefaultCurrencySymbol()); ?><?php echo e(Helpers::covertDefaultExchangeRate($service->price)); ?></del>
                                                                <?php else: ?>
                                                                    <del><?php echo e(Helpers::covertDefaultExchangeRate($service->price)); ?>

                                                                        <?php echo e(Helpers::getDefaultCurrencySymbol()); ?></del>
                                                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                            </span>
                                                            <small>
                                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Helpers::getDefaultCurrency()->symbol_position === SymbolPositionEnum::LEFT): ?>
                                                                    <?php echo e(Helpers::getDefaultCurrencySymbol()); ?><?php echo e(Helpers::covertDefaultExchangeRate($service->service_rate)); ?>

                                                                <?php else: ?>
                                                                    <?php echo e(Helpers::covertDefaultExchangeRate($service->service_rate)); ?>

                                                                    <?php echo e(Helpers::getDefaultCurrencySymbol()); ?>

                                                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                            </small>
                                                        <?php else: ?>
                                                            <small>
                                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Helpers::getDefaultCurrency()->symbol_position === SymbolPositionEnum::LEFT): ?>
                                                                    <?php echo e(Helpers::getDefaultCurrencySymbol()); ?><?php echo e(Helpers::covertDefaultExchangeRate($service->price)); ?>

                                                                <?php else: ?>
                                                                    <?php echo e(Helpers::covertDefaultExchangeRate($service->price)); ?>

                                                                    <?php echo e(Helpers::getDefaultCurrencySymbol()); ?>

                                                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                            </small>
                                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                    </div>
                                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                            </div>
                                            <div class="service-detail mt-1">
                                                <div
                                                    class="d-flex align-items-center justify-content-between gap-2 flex-wrap">
                                                    <ul>
                                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($service?->duration): ?>
                                                            <li class="time">
                                                                <i class="iconsax" icon-name="clock"></i>
                                                                <span><?php echo e($service?->duration); ?><?php echo e($service?->duration_unit === 'hours' ? 'h' : 'm'); ?></span>
                                                            </li>
                                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                        <li class="w-auto service-person">
                                                            <img src="<?php echo e(asset('frontend/images/svg/services-person.svg')); ?>"
                                                                alt="">
                                                            <span><?php echo e($service->required_servicemen); ?></span>
                                                        </li>
                                                    </ul>
                                                    <h6 class="service-type mt-2">
                                                        <span><?php echo e(Helpers::formatServiceType($service?->type)); ?></span>
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer border-top-0">
                                            <div class="footer-detail">
                                                <img src="<?php echo e(Helpers::isFileExistsFromURL($service?->user?->media?->first()?->getURL(), true)); ?>"
                                                    alt="feature" class="img-fluid lozad">
                                                <div>
                                                    <a href="<?php echo e(route('frontend.provider.details', ['slug' => $service?->user?->slug])); ?>">
                                                        <p title=" <?php echo e($service?->user?->name); ?> ">
                                                            <?php echo e($service?->user?->name); ?></p>
                                                    </a>
                                                    <div class="rate">
                                                        <img data-src="<?php echo e(asset('frontend/images/svg/star.svg')); ?>"
                                                            alt="star" class="img-fluid star lozad">
                                                        <small><?php echo e($service?->user?->review_ratings ?? 'Unrated'); ?></small>
                                                    </div>
                                                </div>
                                            </div>

                                            <button data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="book-now-tooltip" data-bs-title="<?php echo e(__('frontend::static.home_page.book_now')); ?>" type="button" class="btn book-now-btn btn-solid w-auto" id="bookNowButton" data-bs-toggle="modal" data-bs-target="#bookServiceModal-<?php echo e($service->id); ?>" data-login-url="<?php echo e(route('frontend.login')); ?>" data-check-login-url="<?php echo e(route('frontend.check.login')); ?>" data-service-id="<?php echo e($service->id); ?>">
                                                <span><?php echo e(__('frontend::static.home_page.book_now')); ?></span>
                                                <span class="spinner-border spinner-border-sm" style="display: none;"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <?php if ($__env->exists('frontend.inc.modal', ['service' => $service])) echo $__env->make('frontend.inc.modal', ['service' => $service], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <!-- Spacial Offer In Service Section End -->

    <!-- Provider Section Start -->
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($homePage['providers_list']['status']): ?>
        <section class="expert-section section-b-space">
            <div class="container-fluid-lg">
                <div class="title dark-title">
                    <h2><?php echo e($homePage['providers_list']['title'] ?? __('frontend::static.home_page.expert_provider_by_rating')); ?></h2>
                    <a class="view-all" href="<?php echo e(route('frontend.provider.index')); ?>" rel="noopener noreferrer"><?php echo e(__('frontend::static.home_page.view_all')); ?>

                        <i class="iconsax" icon-name="arrow-right"></i>
                    </a>
                </div>
                <div class="expert-content">
                    <div class="row g-lg-5 g-sm-4 g-3">
                        <?php
                            $providers = Helpers::getTopProvidersByRatings($homePage['providers_list']['provider_ids'] ?? []);
                        ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $providers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $provider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <div class="card dark-card">
                                    <div class="dark-card-img">
                                        <img src="<?php echo e(Helpers::isFileExistsFromURL($provider?->media?->first()?->getUrl(), true)); ?>" alt="<?php echo e($provider?->name); ?>" class="img-fluid profile-pic lozad">
                                    </div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <a href="<?php echo e(route('frontend.provider.details', $provider->slug)); ?>">
                                                <h4><?php echo e($provider?->name); ?></h4>
                                            </a>
                                            <div class="rate">
                                                <img src="<?php echo e(Helpers::isFileExistsFromURL(asset('frontend/images/svg/star.svg'), true)); ?>" alt="star" class="img-fluid star lozad">
                                                <small><?php echo e($provider?->review_ratings); ?></small>
                                            </div>
                                        </div>
                                        <div class="location">
                                            <i class="iconsax" icon-name="location"></i>
                                            <h5><?php echo e($provider?->primary_address?->state?->name); ?> - <?php echo e($provider?->primary_address?->country?->name); ?></h5>
                                        </div>
                                        <div class="card-detail">
                                            <p><?php echo e($provider?->primary_address?->address); ?>,<?php echo e($provider?->primary_address?->postal_code); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="no-data-found">
                                <p><?php echo e(__('frontend::static.home_page.providers_not_found')); ?></p>
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <!-- Provider Section End -->

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($homePageAdvertiseBanners)): ?>
        <!-- Today Special Offers Section Start -->
        <section class="offer-section">
            <div class="container-fluid-lg">
                <div class="title">
                    <h2><?php echo e($homePage['special_offers_section']['banner_section_title'] ? $homePage['special_offers_section']['banner_section_title'] : __('Today special offers')); ?>

                    </h2>
                </div>

                <div class="offer-banner-slider">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $homePageAdvertiseBanners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($banner->banner_type === AdvertisementTypeEnum::IMAGE): ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $banner->media; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e(route('frontend.provider.details', $banner?->provider?->slug)); ?>">
                                    <div>
                                        <div class="offer-banner">
                                            <img class="img-fluid banner-img" src="<?php echo e($media?->getUrl()); ?>" />
                                        </div>
                                    </div>
                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($banner->banner_type === AdvertisementTypeEnum::VIDEO): ?>
                            <iframe width="560" height="315" src="<?php echo e($banner->video_link); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        </section>
        <!-- Today Special Offers Section End -->
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <!-- Service Package Section Start -->
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($homePage['service_packages_list']['status']): ?>
        <section class="service-package-section">
            <div class="container-fluid-lg">
                <div class="title">
                    <h2><?php echo e($homePage['service_packages_list']['title']); ?></h2>
                    <!-- service-package -->
                    <a class="view-all" href="<?php echo e(route('frontend.service-package.index')); ?>" rel="noopener noreferrer"><?php echo e(__('frontend::static.home_page.view_all')); ?>

                        <i class="iconsax" icon-name="arrow-right"></i>
                    </a>
                </div>
                <div class="service-package-content">
                    <div class="row g-sm-4 g-3">
                        <?php
                            $servicePackages = Helpers::getServicePackagesByIds($homePage['service_packages_list']['service_packages_ids'] ?? []);
                        ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $servicePackages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $servicePackage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <?php
                                $salePrice = Helpers::getServicePackageSalePrice($servicePackage?->id);
                            ?>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <a href="<?php echo e(route('frontend.service-package.details', $servicePackage['slug'])); ?>"
                                    class="service-bg-<?php echo e($servicePackage?->bg_color ?? 'primary'); ?> service-bg d-block">
                                    <img src="<?php echo e(asset('frontend/images/svg/2.svg')); ?>"
                                        alt="<?php echo e($servicePackage?->name); ?>" class="img-fluid service-1 lozad">
                                    <div class="service-detail">
                                        <div class="service-icon">
                                            <?php
                                                $locale = app()->getLocale();
                                                $mediaItems = $servicePackage
                                                    ->getMedia('image')
                                                    ->filter(function ($media) use ($locale) {
                                                        return $media->getCustomProperty('language') === $locale;
                                                    });
                                                $imageUrl =
                                                    $mediaItems->count() > 0
                                                        ? $mediaItems->first()->getUrl()
                                                        : FrontEnum::getPlaceholderImageUrl();
                                            ?>
                                            <img src="<?php echo e(Helpers::isFileExistsFromURL($imageUrl, true)); ?>"
                                                alt="<?php echo e($servicePackage?->services?->first()?->categories?->first()?->name); ?>"
                                                class="img-fluid lozad">
                                        </div>
                                        <h3><?php echo e($servicePackage?->title); ?></h3>
                                        <div class="price">
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Helpers::getDefaultCurrency()->symbol_position === SymbolPositionEnum::LEFT): ?>
                                                <span class="text-white">
                                                    <?php echo e(Helpers::getDefaultCurrencySymbol()); ?><?php echo e(Helpers::covertDefaultExchangeRate($salePrice)); ?>

                                                </span>
                                            <?php else: ?>
                                                <span class="text-white">
                                                    <?php echo e(Helpers::covertDefaultExchangeRate($salePrice)); ?>

                                                    <?php echo e(Helpers::getDefaultCurrencySymbol()); ?>

                                                </span>
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                            <span>
                                                <i class="iconsax" icon-name="arrow-right"></i>
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="no-data-found">
                                <div class="col-12">
                                    <p><?php echo e(__('frontend::static.home_page.service_package_not_found')); ?></p>
                                </div>
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <!-- Service Package Section End -->

    <!-- Blog Section Start -->
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(
        $homePage['blogs_list']['status'] &&
            isset($homePage['blogs_list']['blog_ids']) &&
            !is_null($homePage['blogs_list']['blog_ids'])): ?>
        <section class="blog-section section-b-space">
            <div class="container-fluid-lg">
                <div class="title">
                    <h2><?php echo e(__('frontend::static.home_page.latest_blog')); ?></h2>
                    <a class="view-all" href="<?php echo e(route('frontend.blog.index')); ?>"
                        rel="noopener noreferrer"><?php echo e(__('frontend::static.home_page.view_all')); ?>

                        <i class="iconsax" icon-name="arrow-right"></i>
                    </a>
                </div>
                <div class="blog-content ratio2_1">
                    <div class="row row-cols-xl-3 row-cols-md-2 row-cols-sm-2 row-cols-1 g-sm-4 g-3 custom-row-col">
                        <?php
                            if (isset($homePage['blogs_list']['blog_ids'])) {
                                $blogs = Helpers::getBlogsByIds($homePage['blogs_list']['blog_ids'])->where(
                                    'status',
                                    1,
                                );
                            } else {
                                $blogs = [];
                            }
                        ?>

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="col">
                                <div class="blog-main">

                                    <div class="card">
                                        <div class="overflow-hidden b-r-5">
                                            <a href="<?php echo e(route('frontend.blog.details', $blog?->slug)); ?>"
                                                class="card-img">
                                                <img src="<?php echo e($blog?->web_img_thumb_url); ?>" alt="<?php echo e($blog?->title); ?>"
                                                    class="img-fluid lozad">
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <h4>
                                                <a href="<?php echo e(route('frontend.blog.details', $blog?->slug)); ?>"
                                                    title="<?php echo e($blog?->title); ?>"><?php echo e($blog?->title); ?>

                                                </a>
                                            </h4>
                                            <ul class="blog-detail">
                                                <li><?php echo e($blog?->created_at); ?></li>
                                            </ul>
                                            <div class="blog-footer">
                                                <div>
                                                    <i class="iconsax" icon-name="message-dots"></i>
                                                    <span><?php echo e($blog?->comments_count); ?></span>
                                                </div>
                                                <span>
                                                    - <?php echo e($blog?->created_by?->name); ?>

                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="col-12">
                                <div class="no-data-found">
                                    <p><?php echo e(__('frontend::static.home_page.blog_not_found')); ?></p>
                                </div>
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>

            </div>
        </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <!-- Blog Section End -->

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($settings['service_request']['status'] && $homePage['custom_job']['status']): ?>
        <!-- Job Request Section Start -->
        <section class="pt-0 section-b-space">
            <div class="container-fluid-lg">
                <div class="job-request-section">
                    <div class="job-details">
                        <img src="<?php echo e(asset($homePage['custom_job']['image_url'] ?? 'frontend/images/job-request-img.png')); ?>"
                            class="job-img img-fluid lozad" alt="">
                        <div class="job-request-content">
                            <h3><?php echo e($homePage['custom_job']['title'] ?? 'Unable to find your service? you can post what need, so don\'t worry.'); ?>

                            </h3>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->check()): ?>
                                <button type="button" class="btn btn-solid w-auto" data-bs-toggle="modal"
                                    data-bs-target="#jobRequestModal"><?php echo e($homePage['custom_job']['button_text'] ?? '+ Post New Job Request'); ?></button>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->guest()): ?>
                                <a href="<?php echo e(url('login')); ?>"
                                    class="btn btn-solid w-auto"><?php echo e($homePage['custom_job']['button_text'] ?? '+ Post New Job Request'); ?></a>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>
                </div>
        </section>
        <!-- Job Request Section End -->
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <!-- Become a provider section start -->
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($homePage['become_a_provider']['status']): ?>
        <!-- Home Service Provider Section Start -->
        <section class="service-provider-section section-b-space">
            <div class="container-fluid-lg">
                <div class="section-wrap">
                    <img src="<?php echo e(asset('frontend/images/Dots-1.png')); ?>" class="image-1 lozad" alt="">
                    <img src="<?php echo e(asset('frontend/images/Dots.png')); ?>" class="image-2 lozad" alt="">
                    <div class="row g-lg-5 g-3">
                        <div class="col-xl-5 col-lg-6">
                            <div class="title">
                                <h2><?php echo e($homePage['become_a_provider']['title']); ?></h2>
                            </div>
                            <div class="content-detail">
                                <p>
                                    <?php echo e($homePage['become_a_provider']['description']); ?>

                                </p>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($homePage['become_a_provider']['points'])): ?>
                                    <ul class="item-lists">
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $homePage['become_a_provider']['points']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $point): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <li class="item-list"> <i class="iconsax" icon-name="arrow-right"></i>
                                                <?php echo e($point); ?>

                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </ul>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                            <a href="<?php echo e(route('become-provider.index')); ?>"
                                class="btn btn-solid"><?php echo e($homePage['become_a_provider']['button_text']); ?>

                                <i class="iconsax" icon-name="arrow-circle-right"></i>
                            </a>
                        </div>
                        <div class="col-xl-7 col-lg-6">
                            <div class="image-grp">
                                <img src="<?php echo e(asset($homePage['become_a_provider']['image_url'])); ?>"
                                    class="girl-img lozad" alt="app store">
                                <img src="<?php echo e(asset($homePage['become_a_provider']['float_image_1_url'])); ?>"
                                    class="chart-img lozad" alt="app store">
                                <img src="<?php echo e(asset($homePage['become_a_provider']['float_image_2_url'])); ?>"
                                    class="group-img lozad" alt="app store">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Home Service Provider Section End -->
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <!-- Become a provider section end -->

    <!-- About Us Section Start -->
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($homePage['testimonial']['status']): ?>
        <section class="about-us-section">
            <div class="container-fluid-lg">
                <div class="title-1">
                    <h2><?php echo e($homePage['testimonial']['title']); ?></h2>
                </div>
                <div class="about-us-content content-t-space">
                    
                    <svg class="image-1 lozad" data-loaded="true">
                        <use xlink:href="<?php echo e(asset('frontend/images/dot.svg#dots')); ?>"></use>
                    </svg>
                    <div class="swiper about-us-slider">
                        <div class="swiper-wrapper">
                            <?php
                                $testimonials = Helpers::getTestimonials();
                            ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="swiper-slide">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-title">
                                                <img src="<?php echo e(Helpers::isFileExistsFromURL($testimonial?->media?->first()?->original_url, true)); ?>"
                                                    alt="feature" class="img-fluid lozad">
                                                <img src="<?php echo e(asset('frontend/images/svg/quote.svg')); ?>" alt="quote"
                                                    class="img-fluid quote lozad">
                                                

                                                <svg class="quote-active lozad">
                                                    <use
                                                        xlink:href="<?php echo e(asset('frontend/images/svg/quote-active.svg#quote-active')); ?>">
                                                    </use>
                                                </svg>
                                                <div>
                                                    <h3><?php echo e($testimonial?->name); ?></h3>
                                                    <div class="rate">
                                                        <img src="<?php echo e(asset('frontend/images/svg/star.svg')); ?>"
                                                            alt="star" class="img-fluid star">
                                                        <small><?php echo e($testimonial?->rating); ?></small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-detail">
                                                <p><?php echo e($testimonial?->description); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <div class="no-data-found">
                                    <p><?php echo e(__('frontend::static.home_page.testimonials_not_found')); ?>

                                    </p>
                                </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <!-- About Us Section End -->

    <!-- Newsletter Section Start -->
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($homePage['news_letter']['status']): ?>
        <section class="newsletter-section section-b-space">
            <div class="container-fluid-lg">
                <div class="newsletter-content">
                    
                    <div class="row g-sm-5 g-3">
                        <div class="newsletter-icons col-lg-5 col-4 text-center">
                            <img src="<?php echo e(asset('frontend/images/dots-white.png')); ?>" class="newsletter-1 lozad"
                                alt="">
                            <img src="<?php echo e(asset('frontend/images/dots-1-white.png')); ?>" class="newsletter-2 lozad"
                                alt="">
                            <img src="<?php echo e(asset('frontend/images/dots-white.png')); ?>" class="newsletter-3 lozad"
                                alt="">
                            <img src="<?php echo e(asset($homePage['news_letter']['bg_image_url'] ?? 'frontend/images/man.png')); ?>"
                                class="img-fluid man-image lozad" alt="">
                        </div>
                        <div class="col-lg-7 col-md-8 col-12">
                            <div class="newsletter-detail">
                                <h2><?php echo e($homePage['news_letter']['title']); ?></h2>
                                <p><?php echo e($homePage['news_letter']['sub_title']); ?></p>
                                <form action="<?php echo e(route('frontend.subscribe')); ?>" method="POST">
                                    <div class="form-group">
                                        <input class="form-control" type="email" required="" name="newsletter"
                                            placeholder="<?php echo e(__('frontend::static.home_page.enter_your_email')); ?>">
                                        <button type="submit"
                                            class="btn btn-dark-solid"><?php echo e($homePage['news_letter']['button_text']); ?></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <!-- Newsletter Section End -->

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($settings['service_request']['status'] && $homePage['custom_job']['status']): ?>
        <!-- job request modal Section start -->
        <div class="modal fade job-request-modal" id="jobRequestModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Custom job Request</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form action="<?php echo e(route('frontend.custom-job.store')); ?>" method="POST" class="job-request-form" id="customJobForm" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title" class="form-check-label"><?php echo e(__('frontend::static.home_page.title')); ?></label>
                                        <div class="position-relative">
                                            <i class="iconsax" icon-name="subtitles"></i>
                                            <input type="text" class="form-control form-control-white" name="title" id="title" placeholder="<?php echo e(__('frontend::static.home_page.enter_title')); ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="payment" class="form-check-label"><?php echo e(__('frontend::static.home_page.images')); ?></label>
                                        <div class="position-relative">
                                            <i class="iconsax" icon-name="import-2"></i>
                                            <input type="file" class="form-control form-control-white" name="images[]" multiple id="images[]" placeholder="Click to upload">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="duration" class="form-check-label"><?php echo e(__('frontend::static.home_page.duration')); ?></label>
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="w-100 position-relative">
                                                <i class="iconsax" icon-name="hourglass"></i>
                                                <input type="number" class="form-control form-control-white" name="duration" id="duration" placeholder="<?php echo e(__('frontend::static.home_page.enter_duration')); ?>" time-input>
                                            </div>
                                            <select class="form-select form-select-sm w-auto" name="duration_unit">
                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = ['hours' => 'Hours', 'minutes' => 'Minutes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($key); ?>" <?php echo e(old('duration_unit') === $key ? 'selected' : ''); ?>>
    <?php echo e($option); ?>

</option>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="servicemen"
                                            class="form-check-label"><?php echo e(__('frontend::static.home_page.required_servicemen')); ?></label>
                                        <div class="position-relative">
                                            <i class="iconsax" icon-name="tag-user"></i>
                                            <input type="number" class="form-control form-control-white" name="required_servicemen" min="1" id="required_servicemen" placeholder="<?php echo e(__('frontend::static.home_page.enter_required_serviceman')); ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title"
                                            class="form-check-label"><?php echo e(__('frontend::static.home_page.price')); ?></label>
                                        <div class="position-relative">
                                            <i class="iconsax" icon-name="dollar-circle"></i>
                                            <input type="number" class="form-control form-control-white" id="price" name="price" placeholder="<?php echo e(__('frontend::static.home_page.enter_price')); ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-12" for="category_ids"><?php echo e(__('frontend::static.home_page.categories')); ?></label>
                                        <div class="col-12 error-div">
                                            <select class="form-control select-2 form-select-sm w-100" id="category_ids" name="category_ids[]" multiple data-placeholder="<?php echo e(__('static.service.select_categories')); ?>">
                                                <option></option>
                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $serviceCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($key); ?>"
                                                        <?php if(isset($default_categories) && in_array($key, $default_categories)): ?> selected
                                                        <?php elseif(old('category_ids') && in_array($key, old('category_ids'))): ?> selected <?php endif; ?>>
                                                        <?php echo e($value); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="servicemen" class="form-check-label"><?php echo e(__('frontend::static.home_page.description')); ?></label>
                                        <div class="position-relative">
                                            <i class="iconsax" icon-name="clipboard-text-1"></i>
                                            <textarea rows="3" maxlength="100" class="form-control form-control-white" id="description" name="description" placeholder="<?php echo e(__('frontend::static.home_page.enter_description')); ?>"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer p-0">
                            <button type="submit" class="btn btn-solid mt-4 mx-auto"><?php echo e(__('frontend::static.home_page.post')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- job request modal Section End -->
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
        $(".select-2").select2();
        var categorySlider = new Swiper(".category-slider", {
            slidesPerView: 9,
            spaceBetween: 24,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                0: {
                    slidesPerView: 2,
                    spaceBetween: 15,
                },
                370: {
                    slidesPerView: 3,
                    spaceBetween: 15,
                },
                590: {
                    slidesPerView: 4,
                    spaceBetween: 15,
                },
                790: {
                    slidesPerView: 5,
                    spaceBetween: 15,
                },
                950: {
                    slidesPerView: 6,
                    //   spaceBetween: 40,
                },
                1160: {
                    slidesPerView: 7,
                    //   spaceBetween: 40,
                },
                1380: {
                    slidesPerView: 8,
                    //   spaceBetween: 40,
                },
                1600: {
                    slidesPerView: 9,
                },
            },
        });
        (function($) {
            "use strict";
            // $(document).ready(function() {

            // });
            // Ensure DOM is fully loaded before executing
            $(document).ready(function() {




                // Debounce function
                const debounce = (func, delay) => {
                    let timeout;
                    return function(...args) {
                        clearTimeout(timeout);
                        timeout = setTimeout(() => func.apply(this, args), delay);
                    };
                };

                // Function to fetch services
                const fetchServices = debounce(function(query) {
                    $.get('<?php echo e(route('frontend.service.search')); ?>', {
                            term: query
                        },
                        function(data) {
                            const resultsContainer = $('#searchResults');
                            resultsContainer.empty(); // Clear previous results

                            if (data.length) {
                                const fragment = document.createDocumentFragment();
                                data.forEach(service => {
                                    const div = document.createElement('div');
                                    div.className = 'autocomplete-item';
                                    div.setAttribute('data-slug', service.slug);
                                    div.innerHTML =
                                        `<img src="${service.image}" alt="${service.title}" class="service-image"><h5>${service.title}</h5>`;
                                    fragment.appendChild(div);
                                });
                                resultsContainer.append(fragment).show();
                            } else {
                                // Show "no results" message
                                const noResultDiv = document.createElement('div');
                                noResultDiv.className = 'autocomplete-item no-result';
                                noResultDiv.innerHTML = `<h5>No result found</h5>`;
                                resultsContainer.append(noResultDiv).show();
                            }
                        });
                }, 300);

                // Search input event listener
                $('#searchInput').on('keyup', function() {
                    const query = $(this).val();
                    if (query.length > 1) fetchServices(query); // Call debounced fetch function
                    else $('#searchResults').hide(); // Hide results if no query
                });

                // Hide search results when clicking outside the input or results container
                $(document).on('click', function(e) {
                    if (!$(e.target).closest('#searchInput, #searchResults').length) {
                        $('#searchResults').hide(); // Hide results if clicking outside
                    }
                });

                // Redirect to the service page when an autocomplete item is clicked
                $(document).on('click', '.autocomplete-item', function() {
                    window.location.href = baseUrl + 'service/' + $(this).data('slug');
                });

                // Handle the "Find Service" button click event
                $('#findServiceBtn').on('click', function() {
                    let searchTerm = $('#searchInput').val().trim();
                    if (searchTerm) {
                        window.location.href = '<?php echo e(route('frontend.service.index')); ?>?search=' +
                            encodeURIComponent(searchTerm);
                    }
                });
            }); // End of $(document).ready()

            $('#customJobForm').validate({
                ignore: [],
                rules: {
                    title: {
                        required: true
                    },
                    'images[]': {
                        required: true,
                        extension: "jpg|jpeg|png|gif|webp"
                    },
                    duration: {
                        required: true
                    },
                    required_servicemen: {
                        required: true
                    },
                    price: {
                        required: true,
                    },
                    'category_ids[]': {
                        required: true
                    },
                },
            });
        })(jQuery);
    </script>
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.layout.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/apple/Downloads/codecanyon-pL2BDeFh-fixit-multi-vendor-on-demand-handyman-home-service-flutter-app-with-admin-complete-solution/fixit_laravel1/resources/views/frontend/home/index.blade.php ENDPATH**/ ?>