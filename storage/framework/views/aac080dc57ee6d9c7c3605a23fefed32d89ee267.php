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
            <th><?php echo app('translator')->get('modules.tickets.group'); ?></th>
            <th><?php echo app('translator')->get('app.status'); ?></th>
            <th class="text-right"><?php echo app('translator')->get('app.action'); ?></th>
         <?php $__env->endSlot(); ?>

        <?php $__empty_1 = true; $__currentLoopData = $agents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr class="row<?php echo e($agent->id); ?>">
                <td>
                    <?php if (isset($component)) { $__componentOriginal1c46ebe885e3c4421e9977d656c777b9bed6c39a = $component; } ?>
<?php $component = App\View\Components\Employee::resolve(['user' => $agent->user] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('employee'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Employee::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1c46ebe885e3c4421e9977d656c777b9bed6c39a)): ?>
<?php $component = $__componentOriginal1c46ebe885e3c4421e9977d656c777b9bed6c39a; ?>
<?php unset($__componentOriginal1c46ebe885e3c4421e9977d656c777b9bed6c39a); ?>
<?php endif; ?>
                </td>
                <td>
                    <select class="change-agent-group form-control select-picker" data-agent-id="<?php echo e($agent->id); ?>">
                        <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option <?php if($group->id == $agent->group_id): ?> selected <?php endif; ?> value="<?php echo e($group->id); ?>"><?php echo e($group->group_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </td>
                <td>
                    <select class="change-agent-status form-control select-picker" data-agent-id="<?php echo e($agent->id); ?>">
                        <option <?php if($agent->status == 'enabled'): ?> selected <?php endif; ?>><?php echo app('translator')->get('app.enabled'); ?></option>
                        <option <?php if($agent->status == 'disabled'): ?> selected <?php endif; ?>><?php echo app('translator')->get('app.disabled'); ?></option>
                    </select>
                </td>
                <td class="text-right">
                    <div class="task_view">
                        <a href="javascript:;" data-agent-id="<?php echo e($agent->id); ?>"
                            class="delete-agents task_view_more d-flex align-items-center justify-content-center dropdown-toggle">
                            <i class="fa fa-trash icons mr-2"></i> <?php echo app('translator')->get('app.delete'); ?>
                        </a>
                    </div>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="4">
                    <?php if (isset($component)) { $__componentOriginaldd4a3acb850ed912fbb4dfa63003ef1bff802c33 = $component; } ?>
<?php $component = App\View\Components\Cards\NoRecord::resolve(['icon' => 'user','message' => __('messages.noAgentAdded')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/ticket-settings/ajax/agent.blade.php ENDPATH**/ ?>