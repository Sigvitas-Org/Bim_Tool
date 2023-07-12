<?php if(isset($fields)): ?>
    <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(in_array($field->type, ['text', 'password', 'number'])): ?>
            <?php if (isset($component)) { $__componentOriginal53e40184b23a5cf55bed20787d7874d502fc5bb8 = $component; } ?>
<?php $component = App\View\Components\Cards\DataRow::resolve(['label' => $field->label,'value' => $model->custom_fields_data['field_'.$field->id] ?? '--'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data-row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\DataRow::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal53e40184b23a5cf55bed20787d7874d502fc5bb8)): ?>
<?php $component = $__componentOriginal53e40184b23a5cf55bed20787d7874d502fc5bb8; ?>
<?php unset($__componentOriginal53e40184b23a5cf55bed20787d7874d502fc5bb8); ?>
<?php endif; ?>

        <?php elseif($field->type == 'textarea'): ?>
            <?php if (isset($component)) { $__componentOriginal53e40184b23a5cf55bed20787d7874d502fc5bb8 = $component; } ?>
<?php $component = App\View\Components\Cards\DataRow::resolve(['label' => $field->label,'html' => 'true','value' => $model->custom_fields_data['field_'.$field->id] ?? '--'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data-row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\DataRow::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal53e40184b23a5cf55bed20787d7874d502fc5bb8)): ?>
<?php $component = $__componentOriginal53e40184b23a5cf55bed20787d7874d502fc5bb8; ?>
<?php unset($__componentOriginal53e40184b23a5cf55bed20787d7874d502fc5bb8); ?>
<?php endif; ?>

        <?php elseif($field->type == 'radio'): ?>
            <?php if (isset($component)) { $__componentOriginal53e40184b23a5cf55bed20787d7874d502fc5bb8 = $component; } ?>
<?php $component = App\View\Components\Cards\DataRow::resolve(['label' => $field->label,'value' => (!is_null($model->custom_fields_data['field_' . $field->id]) ? $model->custom_fields_data['field_' . $field->id] : '--')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data-row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\DataRow::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal53e40184b23a5cf55bed20787d7874d502fc5bb8)): ?>
<?php $component = $__componentOriginal53e40184b23a5cf55bed20787d7874d502fc5bb8; ?>
<?php unset($__componentOriginal53e40184b23a5cf55bed20787d7874d502fc5bb8); ?>
<?php endif; ?>

        <?php elseif($field->type == 'checkbox'): ?>
            <?php if (isset($component)) { $__componentOriginal53e40184b23a5cf55bed20787d7874d502fc5bb8 = $component; } ?>
<?php $component = App\View\Components\Cards\DataRow::resolve(['label' => $field->label,'value' => (!is_null($model->custom_fields_data['field_' . $field->id]) ? $model->custom_fields_data['field_' . $field->id] : '--')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data-row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\DataRow::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal53e40184b23a5cf55bed20787d7874d502fc5bb8)): ?>
<?php $component = $__componentOriginal53e40184b23a5cf55bed20787d7874d502fc5bb8; ?>
<?php unset($__componentOriginal53e40184b23a5cf55bed20787d7874d502fc5bb8); ?>
<?php endif; ?>

        <?php elseif($field->type == 'select'): ?>
            <?php if (isset($component)) { $__componentOriginal53e40184b23a5cf55bed20787d7874d502fc5bb8 = $component; } ?>
<?php $component = App\View\Components\Cards\DataRow::resolve(['label' => $field->label,'value' => (!is_null($model->custom_fields_data['field_' . $field->id]) && $model->custom_fields_data['field_' . $field->id] != '' ? $field->values[$model->custom_fields_data['field_' . $field->id]] : '--')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data-row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\DataRow::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal53e40184b23a5cf55bed20787d7874d502fc5bb8)): ?>
<?php $component = $__componentOriginal53e40184b23a5cf55bed20787d7874d502fc5bb8; ?>
<?php unset($__componentOriginal53e40184b23a5cf55bed20787d7874d502fc5bb8); ?>
<?php endif; ?>

        <?php elseif($field->type == 'date'): ?>
            <?php if (isset($component)) { $__componentOriginal53e40184b23a5cf55bed20787d7874d502fc5bb8 = $component; } ?>
<?php $component = App\View\Components\Cards\DataRow::resolve(['label' => $field->label,'value' => (!is_null($model->custom_fields_data['field_' . $field->id]) && $model->custom_fields_data['field_' . $field->id] != '' ? \Carbon\Carbon::parse($model->custom_fields_data['field_' . $field->id])->format(company()->date_format) : '--')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data-row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\DataRow::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal53e40184b23a5cf55bed20787d7874d502fc5bb8)): ?>
<?php $component = $__componentOriginal53e40184b23a5cf55bed20787d7874d502fc5bb8; ?>
<?php unset($__componentOriginal53e40184b23a5cf55bed20787d7874d502fc5bb8); ?>
<?php endif; ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/components/forms/custom-field-show.blade.php ENDPATH**/ ?>