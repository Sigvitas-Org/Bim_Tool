<?php if (isset($component)) { $__componentOriginale153604eddcfbd33516a6ef226b976900d113638 = $component; } ?>
<?php $component = App\View\Components\Cards\Notification::resolve(['notification' => $notification,'link' => 'javascript:;','image' => company()->logo_url,'title' => __('app.welcome') . ' ' . __('app.to') . ' ' . $companyName . ' !','time' => $notification->created_at] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.notification'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Notification::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale153604eddcfbd33516a6ef226b976900d113638)): ?>
<?php $component = $__componentOriginale153604eddcfbd33516a6ef226b976900d113638; ?>
<?php unset($__componentOriginale153604eddcfbd33516a6ef226b976900d113638); ?>
<?php endif; ?>
<?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/notifications/all/new_user.blade.php ENDPATH**/ ?>