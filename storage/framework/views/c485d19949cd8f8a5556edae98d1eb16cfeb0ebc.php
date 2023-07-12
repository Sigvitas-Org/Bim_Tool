<?php
    $allModules = Module::all();
    $activeModules = [];
    foreach ($allModules as $module) {
        $activeModules[] = config(strtolower($module) . '.envato_item_id');
    }
?>

<?php if(!empty(($plugins = \Froiden\Envato\Functions\EnvatoUpdate::plugins())) && count($activeModules) !==
count($plugins)): ?>

    <div class="col-sm-12 mt-5">
        <h4><?php echo e(mb_ucwords(config('froiden_envato.envato_product_name'))); ?> Official Modules</h4>
        <div class="row">

            <?php $__currentLoopData = $plugins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <?php if(!in_array($item['envato_id'], $activeModules)): ?>
                    <div class="col-sm-12 border rounded p-3 mt-4">
                        <div class="row">
                            <div class="col-xs-2 col-lg-1">
                                <a href="<?php echo e($item['product_link']); ?>" target="_blank">
                                    <img src="<?php echo e($item['product_thumbnail']); ?>" class="img-responsive" alt="">
                                </a>
                            </div>
                            <div class="col-xs-8 col-lg-5">
                                <a href="<?php echo e($item['product_link']); ?>" target="_blank"
                                   class="f-w-500 f-14 text-darkest-grey"><?php echo e($item['product_name']); ?>

                                </a>

                                <p class="f-12 text-muted">
                                    <?php echo e($item['summary']); ?>

                                </p>
                            </div>
                            <div class="col-xs-2 col-lg-6 text-right pt-4">
                                <?php if (isset($component)) { $__componentOriginal7f662ecf9f97aca611d2405e5e6903e6081fbd17 = $component; } ?>
<?php $component = App\View\Components\Forms\LinkPrimary::resolve(['link' => $item['product_link'],'icon' => 'arrow-right'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.link-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\LinkPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['target' => '_blank']); ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7f662ecf9f97aca611d2405e5e6903e6081fbd17)): ?>
<?php $component = $__componentOriginal7f662ecf9f97aca611d2405e5e6903e6081fbd17; ?>
<?php unset($__componentOriginal7f662ecf9f97aca611d2405e5e6903e6081fbd17); ?>
<?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>


            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>

    </div>
<?php endif; ?>
<?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/vendor/froiden-envato/update/plugins.blade.php ENDPATH**/ ?>