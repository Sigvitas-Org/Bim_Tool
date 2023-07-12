<div class="col-md-12 p-0">
    <?php $__empty_1 = true; $__currentLoopData = $userLists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <?php if (isset($component)) { $__componentOriginaled9192e1378aee378b9b39f574a095f8a312ddbd = $component; } ?>
<?php $component = App\View\Components\Cards\MessageUser::resolve(['message' => $item] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.message-user'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\MessageUser::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaled9192e1378aee378b9b39f574a095f8a312ddbd)): ?>
<?php $component = $__componentOriginaled9192e1378aee378b9b39f574a095f8a312ddbd; ?>
<?php unset($__componentOriginaled9192e1378aee378b9b39f574a095f8a312ddbd); ?>
<?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <?php if (isset($component)) { $__componentOriginaldd4a3acb850ed912fbb4dfa63003ef1bff802c33 = $component; } ?>
<?php $component = App\View\Components\Cards\NoRecord::resolve(['icon' => 'comment-alt','message' => __('messages.noConversation')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
    <?php endif; ?>
</div>
<?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/messages/user_list.blade.php ENDPATH**/ ?>