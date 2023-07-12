<div <?php echo e($attributes->merge(['class' => 'form-group my-3'])); ?>>
    <?php if (isset($component)) { $__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad = $component; } ?>
<?php $component = App\View\Components\Forms\Label::resolve(['fieldId' => $fieldId,'fieldLabel' => $fieldLabel,'fieldRequired' => $fieldRequired,'popover' => $popover] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Label::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad)): ?>
<?php $component = $__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad; ?>
<?php unset($__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad); ?>
<?php endif; ?>

    <div class="custom-control custom-switch">
        <input type="checkbox" name="<?php echo e($fieldName); ?>" <?php echo e($checked ? 'checked' : ''); ?> class="custom-control-input"
            id="<?php echo e($fieldId); ?>">
        <label class="custom-control-label cursor-pointer f-14" for="<?php echo e($fieldId); ?>"></label>
    </div>

    <?php if($fieldHelp): ?>
        <small id="<?php echo e($fieldId); ?>Help" class="form-text text-muted"><?php echo $fieldHelp; ?></small>
    <?php endif; ?>
</div>
<?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/components/forms/toggle-switch.blade.php ENDPATH**/ ?>