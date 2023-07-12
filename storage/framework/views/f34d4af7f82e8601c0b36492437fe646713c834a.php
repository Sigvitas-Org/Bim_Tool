<?php $__empty_1 = true; $__currentLoopData = $chatDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <?php if (isset($component)) { $__componentOriginal2986d4b3273b9fc6c4e1d6edcc647b183de2e30f = $component; } ?>
<?php $component = App\View\Components\Cards\Message::resolve(['message' => $item,'user' => $item->fromUser] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.message'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Message::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2986d4b3273b9fc6c4e1d6edcc647b183de2e30f)): ?>
<?php $component = $__componentOriginal2986d4b3273b9fc6c4e1d6edcc647b183de2e30f; ?>
<?php unset($__componentOriginal2986d4b3273b9fc6c4e1d6edcc647b183de2e30f); ?>
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

<div class="typing invisible my-2 px-4 text-lightest f-12">
    <div class="dot"></div>
    <div class="dot"></div>
    <div class="dot"></div>
    <span class="ml-1"><?php echo app('translator')->get('modules.messages.typing'); ?></span>
</div>
<?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/messages/message_list.blade.php ENDPATH**/ ?>