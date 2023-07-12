<?php if (isset($component)) { $__componentOriginalaa9e2e00dcec6b58db49b9128f7191370bc93381 = $component; } ?>
<?php $component = App\View\Components\Forms\Select::resolve(['fieldId' => 'timer_task_id','fieldName' => 'task_id','fieldLabel' => __('app.task'),'fieldRequired' => $fieldRequired,'search' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <option value="">--</option>
    <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option <?php
            $name = '';
            if (!is_null($item->project_id)) {
                $name .= '<h5 class="f-12 text-darkest-grey">' . ucfirst($item->heading) . '</h5><div class="text-muted f-11">' . $item->project->project_name . '</div>';
            } else {
                $name .= '<span class="text-dark-grey f-11">' . ucfirst($item->heading) . '</span>';
            }
        ?> data-content="<?php echo e($name); ?>" value="<?php echo e($item->id); ?>">
            <?php echo e($item->heading); ?>

        </option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalaa9e2e00dcec6b58db49b9128f7191370bc93381)): ?>
<?php $component = $__componentOriginalaa9e2e00dcec6b58db49b9128f7191370bc93381; ?>
<?php unset($__componentOriginalaa9e2e00dcec6b58db49b9128f7191370bc93381); ?>
<?php endif; ?>
<?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/components/task-selection-dropdown.blade.php ENDPATH**/ ?>