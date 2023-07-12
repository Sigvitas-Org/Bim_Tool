<div class="col-xl-12 col-lg-12 col-md-12 ntfcn-tab-content-left w-100 p-20">
    <?php echo $__env->make('sections.password-autocomplete-hide', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <input type="hidden" name="payment_method" value="razorpay">
    <div class="row">
        <div class="col-lg-12 mb-3">
            <?php if (isset($component)) { $__componentOriginaldf5bb0e32b087bca724e42ed3cdc51682b267e1e = $component; } ?>
<?php $component = App\View\Components\Forms\Checkbox::resolve(['fieldLabel' => __('modules.payments.razorpayStatus'),'fieldName' => 'razorpay_status','fieldId' => 'razorpay_status','fieldValue' => 'active','checked' => $credentials->razorpay_status == 'active'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Checkbox::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['fieldRequired' => 'true']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldf5bb0e32b087bca724e42ed3cdc51682b267e1e)): ?>
<?php $component = $__componentOriginaldf5bb0e32b087bca724e42ed3cdc51682b267e1e; ?>
<?php unset($__componentOriginaldf5bb0e32b087bca724e42ed3cdc51682b267e1e); ?>
<?php endif; ?>
        </div>
    </div>


    <div class="row <?php if($credentials->razorpay_status == 'inactive'): ?> d-none <?php endif; ?>" id="razorpay_details">

        <div class="col-lg-12">
            <?php if (isset($component)) { $__componentOriginalaa9e2e00dcec6b58db49b9128f7191370bc93381 = $component; } ?>
<?php $component = App\View\Components\Forms\Select::resolve(['fieldId' => 'razorpay_mode','fieldLabel' => __('app.selectEnvironment'),'fieldName' => 'razorpay_mode'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <option value="test"
                        <?php if($credentials->razorpay_mode == 'test'): ?> selected <?php endif; ?>><?php echo app('translator')->get('app.test'); ?></option>
                <option value="live"
                        <?php if($credentials->razorpay_mode == 'live'): ?> selected <?php endif; ?>><?php echo app('translator')->get('app.live'); ?></option>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalaa9e2e00dcec6b58db49b9128f7191370bc93381)): ?>
<?php $component = $__componentOriginalaa9e2e00dcec6b58db49b9128f7191370bc93381; ?>
<?php unset($__componentOriginalaa9e2e00dcec6b58db49b9128f7191370bc93381); ?>
<?php endif; ?>
        </div>

        <div class="col-lg-12">
            <div id="test_razorpay_details" class="row <?php if($credentials->razorpay_mode ==
                'live'): ?> d-none <?php endif; ?>">
                <div class="col-lg-6">
                    <?php if (isset($component)) { $__componentOriginal3985d2df1d9ef7c51070d7c0b8f4b0e4589145ab = $component; } ?>
<?php $component = App\View\Components\Forms\Text::resolve(['fieldLabel' => __('app.test').' '.__('app.razorpayKey'),'fieldName' => 'test_razorpay_key','fieldId' => 'test_razorpay_key','fieldValue' => $credentials->test_razorpay_key,'fieldPlaceholder' => __('placeholders.paymentGateway.testRazorpayKey'),'fieldRequired' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Text::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-0 mr-lg-2 mr-md-2']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3985d2df1d9ef7c51070d7c0b8f4b0e4589145ab)): ?>
<?php $component = $__componentOriginal3985d2df1d9ef7c51070d7c0b8f4b0e4589145ab; ?>
<?php unset($__componentOriginal3985d2df1d9ef7c51070d7c0b8f4b0e4589145ab); ?>
<?php endif; ?>
                </div>
                <div class="col-lg-6">
                    <?php if (isset($component)) { $__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad = $component; } ?>
<?php $component = App\View\Components\Forms\Label::resolve(['fieldId' => 'password','fieldLabel' => __('app.test').' '.__('app.razorpaySecret'),'fieldRequired' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Label::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mt-3']); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad)): ?>
<?php $component = $__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad; ?>
<?php unset($__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal863bfe686851606453ee7ca47b08abfa2e4810a8 = $component; } ?>
<?php $component = App\View\Components\Forms\InputGroup::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.input-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\InputGroup::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

                        <input type="password" name="test_razorpay_secret" id="test_razorpay_secret"
                               class="form-control height-35 f-14"
                               value="<?php echo e($credentials->test_razorpay_secret); ?>">
                         <?php $__env->slot('preappend', null, []); ?> 
                            <button type="button" data-toggle="tooltip"
                                    data-original-title="<?php echo e(__('messages.viewKey')); ?>"
                                    class="btn btn-outline-secondary border-grey height-35 toggle-password"><i
                                    class="fa fa-eye"></i></button>
                         <?php $__env->endSlot(); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal863bfe686851606453ee7ca47b08abfa2e4810a8)): ?>
<?php $component = $__componentOriginal863bfe686851606453ee7ca47b08abfa2e4810a8; ?>
<?php unset($__componentOriginal863bfe686851606453ee7ca47b08abfa2e4810a8); ?>
<?php endif; ?>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div id="live_razorpay_details" class="row <?php if($credentials->razorpay_mode ==
                'test'): ?> d-none <?php endif; ?>">
                <div class="col-lg-6">
                    <?php if (isset($component)) { $__componentOriginal3985d2df1d9ef7c51070d7c0b8f4b0e4589145ab = $component; } ?>
<?php $component = App\View\Components\Forms\Text::resolve(['fieldLabel' => __('app.live').' '.__('app.razorpayKey'),'fieldName' => 'live_razorpay_key','fieldId' => 'live_razorpay_key','fieldValue' => $credentials->live_razorpay_key,'fieldPlaceholder' => __('placeholders.paymentGateway.liveRazorpayKey'),'fieldRequired' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Text::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-0 mr-lg-2 mr-md-2']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3985d2df1d9ef7c51070d7c0b8f4b0e4589145ab)): ?>
<?php $component = $__componentOriginal3985d2df1d9ef7c51070d7c0b8f4b0e4589145ab; ?>
<?php unset($__componentOriginal3985d2df1d9ef7c51070d7c0b8f4b0e4589145ab); ?>
<?php endif; ?>
                </div>
                <div class="col-lg-6">
                    <?php if (isset($component)) { $__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad = $component; } ?>
<?php $component = App\View\Components\Forms\Label::resolve(['fieldId' => 'password','fieldLabel' => __('app.live').' '.__('app.razorpaySecret'),'fieldRequired' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Label::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mt-3']); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad)): ?>
<?php $component = $__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad; ?>
<?php unset($__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal863bfe686851606453ee7ca47b08abfa2e4810a8 = $component; } ?>
<?php $component = App\View\Components\Forms\InputGroup::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.input-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\InputGroup::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                        <input type="password" name="live_razorpay_secret" id="live_razorpay_secret"
                               class="form-control height-35 f-14"
                               value="<?php echo e($credentials->live_razorpay_secret); ?>">
                         <?php $__env->slot('preappend', null, []); ?> 
                            <button type="button" data-toggle="tooltip"
                                    data-original-title="<?php echo e(__('messages.viewKey')); ?>"
                                    class="btn btn-outline-secondary border-grey height-35 toggle-password"><i
                                    class="fa fa-eye"></i></button>
                         <?php $__env->endSlot(); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal863bfe686851606453ee7ca47b08abfa2e4810a8)): ?>
<?php $component = $__componentOriginal863bfe686851606453ee7ca47b08abfa2e4810a8; ?>
<?php unset($__componentOriginal863bfe686851606453ee7ca47b08abfa2e4810a8); ?>
<?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <?php if (isset($component)) { $__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad = $component; } ?>
<?php $component = App\View\Components\Forms\Label::resolve(['fieldId' => '','fieldLabel' => __('app.webhook')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Label::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad)): ?>
<?php $component = $__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad; ?>
<?php unset($__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad); ?>
<?php endif; ?>
            <p class="text-bold"><span id="webhook-link-text"><?php echo e(route('razorpay.webhook',[$company->hash])); ?></span>
                <a href="javascript:;" class="btn-copy btn-secondary f-12 rounded p-1 py-2 ml-1"
                   data-clipboard-target="#webhook-link-text">
                    <i class="fa fa-copy mx-1"></i><?php echo app('translator')->get('app.copy'); ?></a>
            </p>
            <p class="text-primary">(<?php echo app('translator')->get('messages.addRazorpayWebhookUrl'); ?>)</p>
        </div>
    </div>

</div>
<!-- Buttons Start -->
<div class="w-100 border-top-grey">
    <?php if (isset($component)) { $__componentOriginal698fd7a4bca51a1feab5ec62ef3754628de98690 = $component; } ?>
<?php $component = App\View\Components\SettingFormActions::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('setting-form-actions'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SettingFormActions::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
        <div class="d-flex">
            <?php if (isset($component)) { $__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480 = $component; } ?>
<?php $component = App\View\Components\Forms\ButtonPrimary::resolve(['icon' => 'check'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-100 mr-3','id' => 'save_razorpay_data']); ?><?php echo app('translator')->get('app.save'); ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480)): ?>
<?php $component = $__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480; ?>
<?php unset($__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480); ?>
<?php endif; ?>
        </div>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal698fd7a4bca51a1feab5ec62ef3754628de98690)): ?>
<?php $component = $__componentOriginal698fd7a4bca51a1feab5ec62ef3754628de98690; ?>
<?php unset($__componentOriginal698fd7a4bca51a1feab5ec62ef3754628de98690); ?>
<?php endif; ?>
</div>
<!-- Buttons End -->

<script src="<?php echo e(asset('vendor/jquery/clipboard.min.js')); ?>"></script>
<script>
    var clipboard = new ClipboardJS('.btn-copy');

    clipboard.on('success', function (e) {
        Swal.fire({
            icon: 'success',
            text: '<?php echo app('translator')->get("app.webhookUrlCopied"); ?>',
            toast: true,
            position: 'top-end',
            timer: 3000,
            timerProgressBar: true,
            showConfirmButton: false,
            customClass: {
                confirmButton: 'btn btn-primary',
            },
            showClass: {
                popup: 'swal2-noanimation',
                backdrop: 'swal2-noanimation'
            },
        })
    });
</script>
<?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/payment-gateway-settings/ajax/razorpay.blade.php ENDPATH**/ ?>