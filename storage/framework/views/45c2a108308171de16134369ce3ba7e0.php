<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($themeOptions['footer'])): ?>
    <!-- Footer Section Start -->
    <footer class="footer-section nav-folderized">
        <div class="container-fluid-lg">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($themeOptions['footer']['footer_copyright'] ?? false): ?>
                <div class="copyright">
                    <a class="footer-logo" href="<?php echo e(url('/')); ?>" target="_blank">
                        <img src="<?php echo e(asset($themeOptions['general']['footer_logo'] ?? '')); ?>" alt="">
                    </a>
                    <p><?php echo e($themeOptions['footer']['footer_copyright']); ?></p>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <div class="row gy-3 gy-md-4 gy-xl-0">
                <div class="col-xl-3 col-sm-6">
                    <div class="nav d-block">
                        <h3 class="heading-footer">
                            <svg>
                                <use xlink:href="<?php echo e(asset('frontend/images/footer-line.svg#footer-line')); ?>"></use>
                            </svg>
                            
                            <?php echo e(__('frontend::static.footer.links')); ?>

                            <i class="iconsax d-sm-none d-inline-block down-arrow" icon-name="chevron-down"></i>
                        </h3>
                        <ul>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($themeOptions['footer']['useful_link'] ?? false): ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $themeOptions['footer']['useful_link']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <li><a class="nav-link" href="<?php echo e(url($link['slug'])); ?>"><?php echo e($link['name']); ?> </a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <li><a class="nav-link"
                                            href="javascript:void(0)"><?php echo e(__('frontend::static.footer.no_link_found')); ?></a>
                                    </li>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </ul>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6">
                    <div class="nav d-block">
                        <h3 class="heading-footer">
                            <svg>
                               <use xlink:href="<?php echo e(asset('frontend/images/footer-line.svg#footer-line')); ?>"></use>
                            </svg>
                            
                            <?php echo e(__('frontend::static.footer.policy')); ?>

                            <i class="iconsax d-sm-none d-inline-block down-arrow" icon-name="chevron-down"></i>
                        </h3>
                        <ul>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($themeOptions['footer']['pages'] ?? false): ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $themeOptions['footer']['pages']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <li><a class="nav-link" href="<?php echo e(url($page['slug'])); ?>"><?php echo e($page['name']); ?> </a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <li><a class="nav-link"
                                            href="javascript:void(0)"><?php echo e(__('frontend::static.footer.pages_not_found')); ?></a>
                                    </li>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </ul>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6">
                    <div class="nav d-block">
                        <h3 class="heading-footer">
                            <svg>
                               <use xlink:href="<?php echo e(asset('frontend/images/footer-line.svg#footer-line')); ?>"></use>
                            </svg>
                            
                            <?php echo e(__('frontend::static.footer.other')); ?>

                            <i class="iconsax d-sm-none d-inline-block down-arrow" icon-name="chevron-down"></i>
                        </h3>
                        <ul>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($themeOptions['footer']['others'] ?? false): ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $themeOptions['footer']['others']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $other): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($other['slug'] == 'booking' || $other['slug'] == 'wishlist' || $other['slug'] == 'account/profile'): ?>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->check()): ?>
                                            <li><a class="nav-link" href="<?php echo e(url($other['slug'])); ?>"><?php echo e($other['name']); ?>

                                                </a></li>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    <?php else: ?>
                                        <li><a class="nav-link" href="<?php echo e(url($other['slug'])); ?>"><?php echo e($other['name']); ?>

                                            </a></li>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <li><a class="nav-link"
                                            href="javascript:void(0)"><?php echo e(__('frontend::static.footer.others_not_found')); ?></a>
                                    </li>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </ul>
                    </div>
                </div>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($themeOptions['footer']['become_a_provider']['become_a_provider_enable'] ?? false): ?>
                    <div class="col-xl-3 col-sm-6">
                        <div class="nav d-block">
                            <h3 class="heading-footer">
                                <svg>
                                   <use xlink:href="<?php echo e(asset('frontend/images/footer-line.svg#footer-line')); ?>"></use>
                                </svg>
                                
                                <?php echo e(__('frontend::static.footer.become_provider')); ?>

                                
                            </h3>
                            <ul class="d-block">
                                <li><?php echo e($themeOptions['footer']['become_a_provider']['description']); ?></li>
                            </ul>
                            <a href="<?php echo e(url('backend/become-provider')); ?>"
                                class="btn btn-solid"><?php echo e(__('frontend::static.footer.register_now')); ?>

                                <i class="iconsax" icon-name="arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php /**PATH /Users/apple/Downloads/codecanyon-pL2BDeFh-fixit-multi-vendor-on-demand-handyman-home-service-flutter-app-with-admin-complete-solution/fixit_laravel1/resources/views/frontend/layout/footer.blade.php ENDPATH**/ ?>