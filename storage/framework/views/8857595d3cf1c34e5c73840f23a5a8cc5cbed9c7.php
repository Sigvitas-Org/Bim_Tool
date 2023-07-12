<div class="d-flex justify-content-between mb-2">
    <div>
        <h6><?php echo e($title); ?></h6>
        <p class="text-lightest"><?php echo e($summary); ?></p>
    </div>
    <div class="align-self-center">
        <?php if($completed): ?>
            <i class="f-27 bi bi-check2-circle text-primary"></i>
        <?php else: ?>
            <?php if (isset($component)) { $__componentOriginal77b52663ad0feda08af3ca57637c39cf69585cbe = $component; } ?>
<?php $component = App\View\Components\Forms\LinkSecondary::resolve(['link' => $link,'icon' => 'arrow-right'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.link-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\LinkSecondary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['data-redirect-url' => ''.e(url()->full()).'']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal77b52663ad0feda08af3ca57637c39cf69585cbe)): ?>
<?php $component = $__componentOriginal77b52663ad0feda08af3ca57637c39cf69585cbe; ?>
<?php unset($__componentOriginal77b52663ad0feda08af3ca57637c39cf69585cbe); ?>
<?php endif; ?>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/components/cards/onboarding-item.blade.php ENDPATH**/ ?>