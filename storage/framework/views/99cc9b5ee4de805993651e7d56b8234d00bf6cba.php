<?php if (isset($component)) { $__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad = $component; } ?>
<?php $component = App\View\Components\Forms\Label::resolve(['fieldId' => $fieldId,'fieldLabel' => $fieldLabel,'fieldRequired' => $fieldRequired,'popover' => $popover] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Label::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mt-3']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad)): ?>
<?php $component = $__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad; ?>
<?php unset($__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad); ?>
<?php endif; ?>
<div <?php echo e($attributes->merge(['class' => 'form-group mb-0'])); ?>>

    <select name="<?php echo e($fieldName); ?>" id="<?php echo e($fieldId); ?>" <?php if($multiple): ?> multiple <?php endif; ?> <?php if($search): ?>
        data-live-search="true"
        <?php endif; ?>

        class="form-control select-picker" data-size="8"
        <?php if($alignRight): ?> data-dropdown-align-right="true" <?php endif; ?>
        >
        <?php echo $slot; ?>

    </select>

</div>
<?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/components/forms/select.blade.php ENDPATH**/ ?>