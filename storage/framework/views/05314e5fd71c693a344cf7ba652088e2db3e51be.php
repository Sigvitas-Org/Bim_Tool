<!-- TAB CONTENT START -->
<div class="tab-pane fade show active" role="tabpanel" aria-labelledby="nav-email-tab">

    <div class="d-flex flex-wrap p-20" id="task-file-list">

        <?php if (isset($component)) { $__componentOriginale53a9d2e6d6c51019138cc2fcd3ba8ac893391c6 = $component; } ?>
<?php $component = App\View\Components\Table::resolve(['headType' => 'thead-light'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Table::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
             <?php $__env->slot('thead', null, []); ?> 
                <th><?php echo app('translator')->get('app.employee'); ?></th>
                <th><?php echo app('translator')->get('modules.timeLogs.startTime'); ?></th>
                <th><?php echo app('translator')->get('modules.timeLogs.endTime'); ?></th>
                <th><?php echo app('translator')->get('modules.timeLogs.memo'); ?></th>
                <th class="text-right"><?php echo app('translator')->get('modules.employees.hoursLogged'); ?></th>
             <?php $__env->endSlot(); ?>

            <?php $__empty_1 = true; $__currentLoopData = $task->approvedTimeLogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td>
                        <?php if (isset($component)) { $__componentOriginale1ecb3918c4f62d7b4c0a0cccb7162d7fb59f03c = $component; } ?>
<?php $component = App\View\Components\EmployeeImage::resolve(['user' => $item->user] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('employee-image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\EmployeeImage::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale1ecb3918c4f62d7b4c0a0cccb7162d7fb59f03c)): ?>
<?php $component = $__componentOriginale1ecb3918c4f62d7b4c0a0cccb7162d7fb59f03c; ?>
<?php unset($__componentOriginale1ecb3918c4f62d7b4c0a0cccb7162d7fb59f03c); ?>
<?php endif; ?>
                    </td>
                    <td>
                        <?php echo e($item->start_time->timezone(company()->timezone)->format(company()->date_format . ' ' . company()->time_format)); ?>

                    </td>
                    <td>
                        <?php if(!is_null($item->end_time)): ?>
                            <?php echo e($item->end_time->timezone(company()->timezone)->format(company()->date_format . ' ' . company()->time_format)); ?>

                        <?php elseif(!is_null($item->activeBreak)): ?>
                            <span class='badge badge-secondary'><?php echo e(__('modules.timeLogs.paused')); ?></span>
                        <?php else: ?>
                            <span class='badge badge-primary'><?php echo e(__('app.active')); ?></span>
                        <?php endif; ?>
                    </td>
                    <td><?php echo e($item->memo); ?></td>
                    <td class="text-right">
                        <?php echo e($item->hours); ?>

                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="5">
                        <?php if (isset($component)) { $__componentOriginaldd4a3acb850ed912fbb4dfa63003ef1bff802c33 = $component; } ?>
<?php $component = App\View\Components\Cards\NoRecord::resolve(['message' => __('messages.noRecordFound'),'icon' => 'clock'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
</div>
<!-- TAB CONTENT END -->
<?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/tasks/ajax/timelogs.blade.php ENDPATH**/ ?>