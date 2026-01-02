<?php use \app\Helpers\Helpers; ?>
<?php use \App\Enums\SymbolPositionEnum; ?>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->check()): ?>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($service)): ?>
    <!-- Book Service Modal -->
    <div class="modal fade book-service" id="bookServiceModal-<?php echo e($service->id); ?>" tabindex="-1" aria-labelledby="bookServiceModalLabel-<?php echo e($service->id); ?>" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form action="<?php echo e(route('frontend.cart.add')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="bookServiceModalLabel-<?php echo e($service->id); ?>"><?php echo e(__('frontend::static.modal.book_your_service')); ?></h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Hidden input to store the service ID -->
                        <input type="hidden" name="service_id" value="<?php echo e($service->id); ?>">

                        <div class="service">
                            <img src="<?php echo e($service->web_img_thumb_url); ?>" alt="service">
                            <div class="book-service-title">
                                <h3><?php echo e($service->title); ?></h3>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Helpers::getDefaultCurrency()->symbol_position === SymbolPositionEnum::LEFT): ?>
                                    <span><?php echo e(Helpers::getDefaultCurrencySymbol()); ?><?php echo e(Helpers::covertDefaultExchangeRate($service->service_rate)); ?></span>
                                <?php else: ?>
                                    <span><?php echo e(Helpers::covertDefaultExchangeRate($service->service_rate)); ?> <?php echo e(Helpers::getDefaultCurrencySymbol()); ?></span>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>                            
                            </div>
                        </div>

                        <!-- Additional Services Section -->
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($service->additionalServices->count() > 0): ?>
                            <div>
                                <h4 class="service-title"><?php echo e(__('frontend::static.modal.select_additional_services')); ?></h4>
                                <div class="select-additional qty">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $service->additionalServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $additionalService): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="form-check">
                                            <input type="checkbox" id="additional-<?php echo e($additionalService->id); ?>" name="additional_services[<?php echo e($index); ?>][id]" value="<?php echo e($additionalService->id); ?>" class="form-check-input">
                                            <label for="additional-<?php echo e($additionalService->id); ?>">
                                                <?php echo e($additionalService->title); ?> - 
                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Helpers::getDefaultCurrency()->symbol_position === SymbolPositionEnum::LEFT): ?>
                                                    <span class="additional-price"  data-base-price="<?php echo e(Helpers::covertDefaultExchangeRate($additionalService->price)); ?>"><?php echo e(Helpers::getDefaultCurrencySymbol()); ?><?php echo e(Helpers::covertDefaultExchangeRate($additionalService->price)); ?></span>
                                                <?php else: ?>
                                                    <span class="additional-price"  data-base-price="<?php echo e(Helpers::covertDefaultExchangeRate($additionalService->price)); ?>"><?php echo e(Helpers::covertDefaultExchangeRate($additionalService->price)); ?> <?php echo e(Helpers::getDefaultCurrencySymbol()); ?></span>
                                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                            </label>
                                            <div class="plus-minus">
                                                <i class="iconsax sub qtyminus" icon-name="minus"></i>
                                                    <input class="additional_services_qty" id="" name="additional_services[<?php echo e($index); ?>][qty]" type="number" value="1" min="1" max="100" readonly>
                                                <i class="iconsax add qtyadd" icon-name="add"></i>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        
                        <!-- Input for required servicemen -->
                        <div>
                            <h4 class="service-title"><?php echo e(__('frontend::static.modal.add_required_person')); ?></h4>
                            <div class="select-servicemen">
                                <p><?php echo e(__('frontend::static.modal.home_many_person')); ?></p>
                                <div class="plus-minus">
                                    <i class="iconsax sub" icon-name="minus" id="minus"></i>
                                        <input id="quantityInput" name="required_servicemen" type="number" value="<?php echo e($service->required_servicemen); ?>" min="<?php echo e($service->required_servicemen); ?>" max="100" readonly>
                                    <i class="iconsax add" icon-name="add" id="add"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Radio buttons for service option selection -->
                        <div>
                            <h4 class="service-title"><?php echo e(__('frontend::static.modal.choose_one_of_below')); ?></h4>
                            <div class="select-option">
                                <div class="form-check">
                                    <input type="radio" id="optionone-<?php echo e($service->id); ?>" name="select_serviceman" value="app_choose" class="form-radio-input" checked>
                                    <label for="optionone-<?php echo e($service->id); ?>"><?php echo e(__('frontend::static.modal.let_app_choose')); ?></label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" id="optiontwo-<?php echo e($service->id); ?>" name="select_serviceman" value="as_per_my_choice" class="form-radio-input">
                                    <label for="optiontwo-<?php echo e($service->id); ?>"><?php echo e(__('frontend::static.modal.select_service_men')); ?></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Submit button for form submission -->
                    <div class="modal-footer pt-0">
                        <button type="submit" class="btn btn-solid spinner-btn"><?php echo e(__('frontend::static.modal.book_now')); ?> <span class="spinner-border spinner-border-sm" style="display: none;"></span></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Book Service Modal -->
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($servicemen)): ?>
<!-- Servicemen list modal for multiple servicemen-->
<div class="modal fade servicemen-list-modal" id="checkservicemenListModal" tabindex="-1"
    aria-labelledby="checkservicemenListModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="checkservicemenListModalLabel"><?php echo e(__('frontend::static.modal.servicemen_list')); ?></h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="input-group search">
                    <input class="form-control form-control-gray" type="text" placeholder="Search here...">
                    <i class="iconsax input-icon" icon-name="search-normal-2"></i>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="servicemen-list custom-scroll">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $servicemen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serviceman): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="servicemen-list-item">
                                <div class="list">
                                    <input type="hidden" class="serivcemanId" data-id="<?php echo e($serviceman?->id); ?>" />
                                    <img src="<?php echo e(Helpers::isFileExistsFromURL($serviceman?->media?->first()?->getUrl(), true)); ?>" alt="feature"
                                        class="img-45">
                                    <div>
                                        <ul>
                                            <li>
                                                <button class="detail"
                                                    data-bs-target="#servicemenDetailModal-<?php echo e($serviceman->id); ?>"
                                                    data-bs-toggle="modal"><?php echo e($serviceman?->name); ?></button>
                                            </li>
                                            <li>
                                                <div class="rate">
                                                    <img src="<?php echo e(asset('frontend/images/svg/star.svg')); ?>" alt="star"
                                                        class="img-fluid star">
                                                    <small><?php echo e($serviceman?->review_ratings ??  __('frontend::static.modal.unrated')); ?></small>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="experience">
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($serviceman?->experience_duration): ?>
                                            <p><?php echo e($serviceman?->experience_duration); ?>

                                                <?php echo e($serviceman?->experience_interval); ?> <?php echo e(__('frontend::static.modal.of_experience')); ?>

                                            </p>
                                            <?php else: ?>
                                            <p>
                                                <?php echo e(__('frontend::static.modal.fresher')); ?>

                                            </p>
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" id="servicemen1" name="servicemen-list"
                                        class="form-check-input">
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="no-data-found">
                                <p><?php echo e(__('frontend::static.modal.servicemen_not_found')); ?></p>
                            </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:void(0)" class="btn btn-solid" id="confirmSelection"><?php echo e(__('frontend::static.modal.save')); ?></a>
            </div>
        </div>
    </div>
</div>
<!-- Servicemen list modal for multiple servicemen-->

<!-- Servicemen detail modal-->
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $servicemen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serviceman): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade servicemen-detail-modal" id="servicemenDetailModal-<?php echo e($serviceman?->id); ?>"
    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel-<?php echo e($serviceman?->id); ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <a href="#">    
                <i class="iconsax" icon-name="chevron-left"></i>
            </a>    
            <h3 class="modal-title" id="checkservicemenDetailModalLabel"><?php echo e(__('frontend::static.modal.serviceman_details')); ?></h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="provider-card">
                    <div class="provider-detail">
                        <div class="provider-content">
                            <div class="profile-bg"></div>
                            <div class="profile">
                                <img src="<?php echo e(Helpers::isFileExistsFromURL($serviceman?->media?->first()?->getUrl(), true)); ?>" alt="girl" class="img">
                                <div class="d-flex align-content-center gap-2 mt-2">
                                    <h3><?php echo e($serviceman?->name); ?></h3>
                                    <div class="rate">
                                        <img src="<?php echo e(asset('frontend/images/svg/star.svg')); ?>" alt="star"
                                            class="img-fluid star">
                                        <small><?php echo e($serviceman?->review_ratings ?? 0.0); ?></small>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <p class="text-light">
                                        <?php echo e($serviceman?->experience_duration); ?>

                                        <?php echo e($serviceman?->experience_interval); ?> <?php echo e(__('frontend::static.modal.of_experience')); ?>

                                    </p>
                                    <div class="location">
                                        <i class="iconsax" icon-name="location"></i>
                                        <h5><?php echo e($serviceman?->primary_address?->state?->name); ?> -
                                            <?php echo e($serviceman?->primary_address?->country?->name); ?>

                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="view br-6 mt-3">
                                <div class="d-flex align-items-center justify-content-between gap-1">
                                    <span><?php echo e(__('frontend::static.modal.services_delivered')); ?></span>
                                    <small class="value"> <?php echo e($serviceman?->served); ?> <?php echo e(__('frontend::static.modal.served')); ?></small>
                                </div>
                            </div>
                            <div class="information">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($serviceman->knownLanguages?->toArray()): ?>
                                <div>
                                    <p class="mt-3 mb-2">Known languages</p>
                                    <?php
                                    $knownLanguages = $serviceman->knownLanguages;
                                    ?>
                                    <div class="d-flex align-content-center gap-3 mt-2">
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $knownLanguages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <button class="btn btn-solid-gray"><?php echo e($language?->key); ?></button>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </div>
                                </div>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($data)): ?>

<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

<?php $__env->startPush('js'); ?>
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($servicemen)): ?>
<script>
    (function($) {
        $(document).ready(function() {

            $('.search input').on('input', function() {
                var searchTerm = $(this).val().toLowerCase();
                $('.servicemen-list-item').each(function() {
                    var servicemanName = $(this).find('button.detail').text().toLowerCase();
                    if (servicemanName.includes(searchTerm)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });


            $(document).on('click', '.servicemen-list-item', function(e) {
                if (!$(e.target).closest('.form-check-input').length && !$(e.target).closest('.detail').length) {
                    const checkbox = $(this).find('input[type="checkbox"]');
                    checkbox.prop('checked', !checkbox.prop('checked'));
                }
            });

            $(document).on('click', '.form-check-input', function(e) {
                e.stopPropagation();
            });

            $(document).on('click', '.detail', function(e) {
                e.stopPropagation();
                const targetModal = $(this).data('bs-target');
                $(targetModal).modal('show');
            });

            $('#confirmSelection').on('click', function() {
                var selectedServicemen = '';
                var servicemenIds = [];
                $('.servicemen-list-item input:checked').each(function() {
                    let item = $(this).closest('.servicemen-list-item');
                    let servicemenId = item.find('.serivcemanId').attr('data-id');
                    servicemenIds.push(servicemenId);
                    selectedServicemen += `
                <div class="servicemen-list-item">
                    <div class="list">
                        <img src="${item.find('img').attr('src')}" alt="feature" class="img-45">
                        <div>
                            <p>Servicemen</p>
                            <ul>
                                <li><h5>${item.find('.detail').text()}</h5></li>
                                <li>
                                    <div class="rate">
                                        <img src="<?php echo e(asset('frontend/images/svg/star.svg')); ?>" alt="star" class="img-fluid star">
                                        <small>${item.find('.rate small').text()}</small>
                                    </div>
                                </li>
                            </ul>
                             <p>${item.find('.experience p').text()}</p>
                        </div>
                    </div>
                </div>`;
                });

                if (selectedServicemen != '') {
                    $('.selected-men').html(selectedServicemen);
                    $('.selectServicemenDiv').hide();
                    $('.selectedServicemenDiv').show();
                    $('#serviceman_id').val(servicemenIds.toString())
                } else {
                    $('.selectedServicemenDiv').hide();
                    $('.selectServicemenDiv').show();
                }

                $('#checkservicemenListModal').modal('hide');

            });
        });
    })(jQuery);
</script>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php $__env->stopPush(); ?><?php /**PATH /Users/apple/Downloads/codecanyon-pL2BDeFh-fixit-multi-vendor-on-demand-handyman-home-service-flutter-app-with-admin-complete-solution/fixit_laravel1/resources/views/frontend/inc/modal.blade.php ENDPATH**/ ?>