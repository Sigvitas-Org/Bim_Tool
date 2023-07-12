<?php
$notificationUser = \App\Models\TaskHistory::with('user')
    ->where('task_id', $notification->data['id'])
    ->first();
?>
<?php if($notificationUser): ?>
    <?php if (isset($component)) { $__componentOriginale153604eddcfbd33516a6ef226b976900d113638 = $component; } ?>
<?php $component = App\View\Components\Cards\Notification::resolve(['notification' => $notification,'link' => route('tasks.show', $notification->data['id']),'image' => $notificationUser->user->image_url,'title' => __('email.taskComplete.subject'),'text' => ucfirst($notification->data['heading']),'time' => $notification->created_at] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php endif; ?>
<?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/notifications/client/task_completed_client.blade.php ENDPATH**/ ?>