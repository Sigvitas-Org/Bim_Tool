<?php $__env->startSection('content'); ?>

    <!-- SETTINGS START -->
    <div class="w-100 d-flex ">

        <?php if (isset($component)) { $__componentOriginalf9dcf9e0132687b6b5d826e52f2f3d6c594b585b = $component; } ?>
<?php $component = App\View\Components\SettingSidebar::resolve(['activeMenu' => $activeSettingMenu] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('setting-sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SettingSidebar::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf9dcf9e0132687b6b5d826e52f2f3d6c594b585b)): ?>
<?php $component = $__componentOriginalf9dcf9e0132687b6b5d826e52f2f3d6c594b585b; ?>
<?php unset($__componentOriginalf9dcf9e0132687b6b5d826e52f2f3d6c594b585b); ?>
<?php endif; ?>

        <?php if (isset($component)) { $__componentOriginalb44089abe45f2c89173e85ef93b9bf2aa54af94e = $component; } ?>
<?php $component = App\View\Components\SettingCard::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('setting-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SettingCard::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
             <?php $__env->slot('header', null, []); ?> 
                <div class="s-b-n-header" id="tabs">
                    <h2 class="mb-0 p-20 f-21 font-weight-normal text-capitalize border-bottom-grey">
                        <?php echo app('translator')->get($pageTitle); ?></h2>
                </div>
             <?php $__env->endSlot(); ?>

            <div class="col-lg-12 col-md-12 ntfcn-tab-content-left w-100 p-4 ">
                <?php if (isset($component)) { $__componentOriginal0777dca6b0ab2eebdcaf6ba884d5b30ab61203a6 = $component; } ?>
<?php $component = App\View\Components\Form::resolve(['method' => 'POST'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Form::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'editSettings','class' => 'ajax-form']); ?>
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <?php if (isset($component)) { $__componentOriginal93d2aebf32a7d2890ca45f165bd8e854f73d1c5a = $component; } ?>
<?php $component = App\View\Components\Forms\ToggleSwitch::resolve(['fieldLabel' => __('modules.logTimeSetting.autoStopTimerAfterOfficeTime'),'fieldName' => 'auto_timer_stop','fieldId' => 'auto_timer_stop','fieldValue' => 'yes','checked' => $logTime->auto_timer_stop == 'yes'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.toggle-switch'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ToggleSwitch::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal93d2aebf32a7d2890ca45f165bd8e854f73d1c5a)): ?>
<?php $component = $__componentOriginal93d2aebf32a7d2890ca45f165bd8e854f73d1c5a; ?>
<?php unset($__componentOriginal93d2aebf32a7d2890ca45f165bd8e854f73d1c5a); ?>
<?php endif; ?>
                        </div>
                        <div class="col-lg-6 mb-2">
                            <?php if (isset($component)) { $__componentOriginal93d2aebf32a7d2890ca45f165bd8e854f73d1c5a = $component; } ?>
<?php $component = App\View\Components\Forms\ToggleSwitch::resolve(['fieldLabel' => __('modules.logTimeSetting.approvalRequired'),'fieldName' => 'approval_required','fieldId' => 'approval_required','fieldValue' => 'true','checked' => $logTime->approval_required] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.toggle-switch'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ToggleSwitch::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal93d2aebf32a7d2890ca45f165bd8e854f73d1c5a)): ?>
<?php $component = $__componentOriginal93d2aebf32a7d2890ca45f165bd8e854f73d1c5a; ?>
<?php unset($__componentOriginal93d2aebf32a7d2890ca45f165bd8e854f73d1c5a); ?>
<?php endif; ?>
                        </div>
                    </div>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0777dca6b0ab2eebdcaf6ba884d5b30ab61203a6)): ?>
<?php $component = $__componentOriginal0777dca6b0ab2eebdcaf6ba884d5b30ab61203a6; ?>
<?php unset($__componentOriginal0777dca6b0ab2eebdcaf6ba884d5b30ab61203a6); ?>
<?php endif; ?>
            </div>

         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb44089abe45f2c89173e85ef93b9bf2aa54af94e)): ?>
<?php $component = $__componentOriginalb44089abe45f2c89173e85ef93b9bf2aa54af94e; ?>
<?php unset($__componentOriginalb44089abe45f2c89173e85ef93b9bf2aa54af94e); ?>
<?php endif; ?>

    </div>
    <!-- SETTINGS END -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $('#auto_timer_stop').click(function() {
            var auto_timer_stop = 'no';
            if ($(this).prop("checked") == true) {
                auto_timer_stop = 'yes';
            }
            $.easyAjax({
                url: "<?php echo e(route('timelog-settings.store')); ?>",
                type: "POST",
                data: {
                    '_token': '<?php echo e(csrf_token()); ?>',
                    'auto_timer_stop': auto_timer_stop
                }
            })
        });

        $('#approval_required').click(function() {
            var approval_required = '0';
            if ($(this).prop("checked") == true) {
                approval_required = '1';
            }
            $.easyAjax({
                url: "<?php echo e(route('timelog-settings.store')); ?>",
                type: "POST",
                data: {
                    '_token': '<?php echo e(csrf_token()); ?>',
                    'approval_required': approval_required
                }
            })
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/log-time-settings/index.blade.php ENDPATH**/ ?>