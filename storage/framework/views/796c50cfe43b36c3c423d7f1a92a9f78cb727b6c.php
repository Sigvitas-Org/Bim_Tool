<div <?php echo e($attributes->merge(['class' => 'card bg-white border-0 b-shadow-4'])); ?>>
    <?php if($title): ?>
        <?php if (isset($component)) { $__componentOriginald10a505e416c683e61b5c72f4b0018c3d39b6739 = $component; } ?>
<?php $component = App\View\Components\Cards\CardHeader::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.card-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\CardHeader::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
            <?php echo $title; ?>


             <?php $__env->slot('action', null, []); ?> 
                <?php echo $action; ?>

             <?php $__env->endSlot(); ?>

         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald10a505e416c683e61b5c72f4b0018c3d39b6739)): ?>
<?php $component = $__componentOriginald10a505e416c683e61b5c72f4b0018c3d39b6739; ?>
<?php unset($__componentOriginald10a505e416c683e61b5c72f4b0018c3d39b6739); ?>
<?php endif; ?>
    <?php endif; ?>

    <?php if($padding === 'false'): ?>
        <div class="card-body p-0 <?php echo e($otherClasses); ?>">
            <?php echo e($slot); ?>

        </div>
    <?php else: ?>
        <div class="card-body <?php echo e($otherClasses); ?>">
            <?php echo e($slot); ?>

        </div>
    <?php endif; ?>
</div>
<?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/components/cards/data.blade.php ENDPATH**/ ?>