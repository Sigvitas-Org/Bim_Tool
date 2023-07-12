<?php $__empty_1 = true; $__currentLoopData = $user->unreadNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <?php if($key < 6): ?>
        <?php if(view()->exists('notifications.'.$userType.'.'.\Illuminate\Support\Str::snake(class_basename($notification->type)))): ?>
            <?php echo $__env->make('notifications.'.$userType.'.'.\Illuminate\Support\Str::snake(class_basename($notification->type)), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        <?php $__currentLoopData = $worksuitePlugins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(View::exists(strtolower($item).'::notifications.'.\Illuminate\Support\Str::snake(class_basename($notification->type)))): ?>
                <?php echo $__env->make(strtolower($item).'::notifications.'.\Illuminate\Support\Str::snake(class_basename($notification->type)), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <div class="card border-0 bg-additional-grey">
        <a class=" f-14 text-dark px-3" href="javascript:;">
            <div class="card-horizontal align-items-center">
                <div class="card-body border-0 pl-0 pr-0 py-2">
                    <?php if (isset($component)) { $__componentOriginaldd4a3acb850ed912fbb4dfa63003ef1bff802c33 = $component; } ?>
<?php $component = App\View\Components\Cards\NoRecord::resolve(['icon' => 'bell-slash','message' => __('messages.noNotification')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.no-record'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\NoRecord::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldd4a3acb850ed912fbb4dfa63003ef1bff802c33)): ?>
<?php $component = $__componentOriginaldd4a3acb850ed912fbb4dfa63003ef1bff802c33; ?>
<?php unset($__componentOriginaldd4a3acb850ed912fbb4dfa63003ef1bff802c33); ?>
<?php endif; ?>
                </div>
            </div>
        </a>
    </div>

<?php endif; ?>
<?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/notifications/user_notifications.blade.php ENDPATH**/ ?>