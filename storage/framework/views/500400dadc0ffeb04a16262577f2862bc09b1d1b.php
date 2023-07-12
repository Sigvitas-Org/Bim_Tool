<!-- SETTINGS START -->
<div class="col-lg-12 col-md-12 ntfcn-tab-content-left w-100 p-4 ">

    <div class="row">

        <div class="col-lg-12">

            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.alert','data' => ['type' => 'secondary','icon' => 'info-circle']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'secondary','icon' => 'info-circle']); ?>
                <?php echo app('translator')->get('modules.twofactor.twoFaInfo'); ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

            <?php if($smtpSetting->mail_driver == 'smtp' && !$smtpSetting->verified): ?>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.alert','data' => ['type' => 'danger']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'danger']); ?>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <i class="fa fa-info-circle"></i> <?php echo app('translator')->get('modules.twofactor.verifySmtp'); ?>
                        </div>

                        <?php if(user()->permission('manage_notification_setting') == 'all'): ?>
                            <div>
                                <?php if (isset($component)) { $__componentOriginal7f662ecf9f97aca611d2405e5e6903e6081fbd17 = $component; } ?>
<?php $component = App\View\Components\Forms\LinkPrimary::resolve(['link' => route('notifications.index')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.link-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\LinkPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                    <?php echo app('translator')->get('app.verify'); ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7f662ecf9f97aca611d2405e5e6903e6081fbd17)): ?>
<?php $component = $__componentOriginal7f662ecf9f97aca611d2405e5e6903e6081fbd17; ?>
<?php unset($__componentOriginal7f662ecf9f97aca611d2405e5e6903e6081fbd17); ?>
<?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            <?php endif; ?>

            <div class="row">

                <div class="col-lg-12 mt-3">
                    <div class="border-grey mt-3 p-4 rounded-top">
                        <div class="row justify-content-center">
                            <div class="col-md-1 d-flex justify-content-center">
                                <i class="fa fa-envelope-open-text f-27 text-lightest"></i>
                            </div>
                            <div class="col-md-11">
                                <h6><?php echo app('translator')->get('modules.twofactor.setupEmail'); ?>
                                    <?php if(($user->two_fa_verify_via == 'email' || $user->two_fa_verify_via == 'both') && $user->two_factor_email_confirmed): ?>
                                        <span class="badge badge-success ml-2"><?php echo app('translator')->get('app.active'); ?></span>
                                    <?php endif; ?>

                                </h6>
                                <p class="mb-4 mt-2 f-14 text-dark-grey"><?php echo app('translator')->get('messages.enable2FAUsingEmail', ['email'
                                    =>
                                    user()->email]); ?></p>
                                <?php if(($smtpSetting->mail_driver == 'smtp' && $smtpSetting->verified) || $smtpSetting->mail_driver == 'mail'): ?>
                                    <?php if(($user->two_fa_verify_via == 'email' || $user->two_fa_verify_via == 'both') && $user->two_factor_email_confirmed): ?>
                                        <?php if (isset($component)) { $__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26 = $component; } ?>
<?php $component = App\View\Components\Forms\ButtonSecondary::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonSecondary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'change-2fa-status','data-method' => 'email','data-status' => 'disable']); ?>
                                            <?php echo app('translator')->get('app.disable'); ?>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26)): ?>
<?php $component = $__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26; ?>
<?php unset($__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26); ?>
<?php endif; ?>
                                    <?php else: ?>
                                        <?php if (isset($component)) { $__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480 = $component; } ?>
<?php $component = App\View\Components\Forms\ButtonPrimary::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'validate-email-2fa']); ?>
                                            <?php echo app('translator')->get('app.enable'); ?>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480)): ?>
<?php $component = $__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480; ?>
<?php unset($__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480); ?>
<?php endif; ?>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="border-grey p-4 border-top-0 rounded-bottom">
                        <div class="row justify-content-center">
                            <div class="col-md-1 d-flex justify-content-center align-self-baseline">
                                <img src="<?php echo e(asset('img/google-authenticator-2.svg')); ?>" width="27" alt="">
                            </div>
                            <div class="col-md-11">
                                <h6><?php echo app('translator')->get('modules.twofactor.setupGoogleAuthenticator'); ?>
                                    <?php if($user->two_fa_verify_via == 'google_authenticator' || $user->two_fa_verify_via == 'both'): ?>
                                        <?php if($user->two_factor_confirmed): ?>
                                            <span class="badge badge-success ml-2"><?php echo app('translator')->get('app.active'); ?></span>
                                        <?php else: ?>
                                            <span
                                                class="badge badge-warning ml-2"><?php echo app('translator')->get('modules.twofactor.validate2FA'); ?>
                                                <?php echo app('translator')->get('app.pending'); ?></span>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </h6>
                                <p class="mb-4 mt-2 f-14 text-dark-grey">
                                    <?php echo app('translator')->get('messages.enable2FAUsingAuthenticator'); ?>
                                </p>

                                <?php if($user->two_factor_secret): ?>
                                    <p class="f-w-500"><?php echo app('translator')->get('modules.twofactor.2faBarcode'); ?></p>
                                    <span class="p-2 border rounded w-100 d-table-cell">
                                        <?php echo $user->twoFactorQrCodeSvg(); ?>

                                    </span>
                                    <div class="my-4 f-12 text-lightest">
                                        <span class="badge badge-primary"><?php echo app('translator')->get('app.note'); ?></span>
                                        <?php echo app('translator')->get('modules.twofactor.2faAppWarning'); ?>
                                    </div>
                                <?php endif; ?>

                                <?php if($user->two_fa_verify_via == 'google_authenticator' || $user->two_fa_verify_via == 'both'): ?>
                                    <?php if($user->two_factor_confirmed): ?>
                                        <?php if (isset($component)) { $__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26 = $component; } ?>
<?php $component = App\View\Components\Forms\ButtonSecondary::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonSecondary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'change-2fa-status','data-method' => 'google_authenticator','data-status' => 'disable']); ?>
                                            <?php echo app('translator')->get('app.disable'); ?>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26)): ?>
<?php $component = $__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26; ?>
<?php unset($__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26); ?>
<?php endif; ?>

                                        <?php if (isset($component)) { $__componentOriginaldffecccc219bb81c1548bfa6ec1531014cb3bec8 = $component; } ?>
<?php $component = App\View\Components\Forms\ButtonCancel::resolve(['link' => route('2fa_codes_download')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-cancel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonCancel::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'ml-3']); ?>
                                            <?php echo app('translator')->get('app.download'); ?> <?php echo app('translator')->get('app.recoveryCode'); ?>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldffecccc219bb81c1548bfa6ec1531014cb3bec8)): ?>
<?php $component = $__componentOriginaldffecccc219bb81c1548bfa6ec1531014cb3bec8; ?>
<?php unset($__componentOriginaldffecccc219bb81c1548bfa6ec1531014cb3bec8); ?>
<?php endif; ?>

                                        <?php if (isset($component)) { $__componentOriginaldffecccc219bb81c1548bfa6ec1531014cb3bec8 = $component; } ?>
<?php $component = App\View\Components\Forms\ButtonCancel::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-cancel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonCancel::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'ml-3','id' => 'regenerate-codes']); ?>
                                            <?php echo app('translator')->get('app.regenerate'); ?> <?php echo app('translator')->get('app.recoveryCode'); ?>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldffecccc219bb81c1548bfa6ec1531014cb3bec8)): ?>
<?php $component = $__componentOriginaldffecccc219bb81c1548bfa6ec1531014cb3bec8; ?>
<?php unset($__componentOriginaldffecccc219bb81c1548bfa6ec1531014cb3bec8); ?>
<?php endif; ?>
                                    <?php else: ?>
                                        <?php if (isset($component)) { $__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480 = $component; } ?>
<?php $component = App\View\Components\Forms\ButtonPrimary::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'validate-2fa']); ?>
                                            <?php echo app('translator')->get('modules.twofactor.validate2FA'); ?>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480)): ?>
<?php $component = $__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480; ?>
<?php unset($__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480); ?>
<?php endif; ?>

                                        <?php if (isset($component)) { $__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26 = $component; } ?>
<?php $component = App\View\Components\Forms\ButtonSecondary::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonSecondary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'change-2fa-status ml-3','data-method' => 'google_authenticator','data-status' => 'disable']); ?>
                                            <?php echo app('translator')->get('app.disable'); ?>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26)): ?>
<?php $component = $__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26; ?>
<?php unset($__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26); ?>
<?php endif; ?>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <?php if (isset($component)) { $__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480 = $component; } ?>
<?php $component = App\View\Components\Forms\ButtonPrimary::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'change-2fa-status','data-method' => 'google_authenticator','data-status' => 'enable']); ?>
                                        <?php echo app('translator')->get('app.enable'); ?>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480)): ?>
<?php $component = $__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480; ?>
<?php unset($__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480); ?>
<?php endif; ?>
                                <?php endif; ?>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- SETTINGS END -->

<script>
    $('#regenerate-codes').click(function() {
        let url = "/user/two-factor-recovery-codes";
        let token = "<?php echo e(csrf_token()); ?>";
        let method = 'POST';

        $.easyAjax({
            url: url,
            type: "POST",
            data: {
                '_token': token,
                '_method': method
            },
            success: function(response) {
                window.location.reload();
            }
        });
    });

    $('.change-2fa-status').click(function() {
        let method = $(this).data('method');
        let status = $(this).data('status');

        let url = "<?php echo e(route('verify_2fa_password')); ?>";
        url = url + '?method=' + method + '&status=' + status;

        $(MODAL_DEFAULT + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_DEFAULT, url);
    });

    $('.validate-2fa').click(function() {
        let url = "<?php echo e(route('two-fa-settings.validate_confirm')); ?>";

        $(MODAL_DEFAULT + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_DEFAULT, url);
    });

    $('.validate-email-2fa').click(function() {
        let url = "<?php echo e(route('two-fa-settings.validate_email_confirm')); ?>";

        $(MODAL_DEFAULT + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_DEFAULT, url);
    });
</script>
<?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/security-settings/ajax/two-factor-authentication.blade.php ENDPATH**/ ?>