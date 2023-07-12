<?php if (isset($component)) { $__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e = $component; } ?>
<?php $component = App\View\Components\Cards\Data::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Data::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="row">
        <?php $__currentLoopData = $modulesData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-3 col-md-4 col-6">
                <div class="form-group mb-4">
                    <?php if (isset($component)) { $__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad = $component; } ?>
<?php $component = App\View\Components\Forms\Label::resolve(['fieldId' => 'module-'.$setting->id,'fieldLabel' => __('modules.module.'.$setting->module_name)] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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

                    <div class="custom-control custom-switch">
                        <input type="checkbox"
                               <?php if($setting->status == 'active'): ?> checked <?php endif; ?>
                               <?php if($setting->module_name == 'settings'): ?> <?php endif; ?>
                               class="cursor-pointer custom-control-input change-module-setting"
                               id="module-<?php echo e($setting->id); ?>"
                               data-setting-id="<?php echo e($setting->id); ?>"
                               data-module-name="<?php echo e($setting->module_name); ?>"
                        >
                        <label class="custom-control-label cursor-pointer" for="module-<?php echo e($setting->id); ?>"></label>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e)): ?>
<?php $component = $__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e; ?>
<?php unset($__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e); ?>
<?php endif; ?>
<?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/module-settings/ajax/modules.blade.php ENDPATH**/ ?>