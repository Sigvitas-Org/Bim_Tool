<div class="table-responsive p-20">
    <?php if (isset($component)) { $__componentOriginale53a9d2e6d6c51019138cc2fcd3ba8ac893391c6 = $component; } ?>
<?php $component = App\View\Components\Table::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Table::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'table-bordered']); ?>
         <?php $__env->slot('thead', null, []); ?> 
            <th><?php echo app('translator')->get('app.name'); ?></th>
            <th class="text-right"><?php echo app('translator')->get('app.action'); ?></th>
         <?php $__env->endSlot(); ?>

        <?php $__empty_1 = true; $__currentLoopData = $channels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $channel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr class="row<?php echo e($channel->id); ?>">
                <td><?php echo e(mb_ucwords($channel->channel_name)); ?></td>
                <td class="text-right">
                    <div class="task_view">
                        <a class="task_view_more d-flex align-items-center justify-content-center edit-channel" href="javascript:;" data-channel-id="<?php echo e($channel->id); ?>" >
                            <i class="fa fa-edit icons mr-2"></i>  <?php echo app('translator')->get('app.edit'); ?>
                        </a>
                    </div>
                    <div class="task_view">
                        <a class="delete-category task_view_more d-flex align-items-center justify-content-center delete-channel" href="javascript:;" data-channel-id="<?php echo e($channel->id); ?>"  >
                            <i class="fa fa-trash icons mr-2"></i> <?php echo app('translator')->get('app.delete'); ?>
                        </a>
                    </div>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="3">
                    <?php if (isset($component)) { $__componentOriginaldd4a3acb850ed912fbb4dfa63003ef1bff802c33 = $component; } ?>
<?php $component = App\View\Components\Cards\NoRecord::resolve(['icon' => 'list','message' => __('messages.noTicketChannelAdded')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                </td>
            </tr>
        <?php endif; ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale53a9d2e6d6c51019138cc2fcd3ba8ac893391c6)): ?>
<?php $component = $__componentOriginale53a9d2e6d6c51019138cc2fcd3ba8ac893391c6; ?>
<?php unset($__componentOriginale53a9d2e6d6c51019138cc2fcd3ba8ac893391c6); ?>
<?php endif; ?>
</div>
<?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/ticket-settings/ajax/channel.blade.php ENDPATH**/ ?>