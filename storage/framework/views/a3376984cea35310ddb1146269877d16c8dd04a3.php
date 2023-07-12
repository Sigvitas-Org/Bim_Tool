<div class="card w-100 rounded-0 border-0 comment">
    <div class="card-horizontal">
        <div class="card-body border-0 pl-0 py-1">
            <?php $__empty_1 = true; $__currentLoopData = $leaveTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$leaveType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="card-text f-14 text-dark-grey text-justify">
                    <?php if (isset($component)) { $__componentOriginale53a9d2e6d6c51019138cc2fcd3ba8ac893391c6 = $component; } ?>
<?php $component = App\View\Components\Table::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Table::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'table-bordered my-3 rounded']); ?>
                         <?php $__env->slot('thead', null, []); ?> 
                            <th><?php echo app('translator')->get('modules.leaves.leaveType'); ?></th>
                            <th><?php echo app('translator')->get('modules.leaves.noOfLeaves'); ?></th>
                            <th><?php echo app('translator')->get('modules.leaves.monthLimit'); ?></th>
                            <th class="text-right"><?php echo app('translator')->get('app.total'); ?> <?php echo app('translator')->get('modules.leaves.leavesTaken'); ?></th>
                         <?php $__env->endSlot(); ?>
                        <tr>
                            <td>
                                <?php if (isset($component)) { $__componentOriginal2db42a9094af8c45b35737ea3527d3c0817d84c4 = $component; } ?>
<?php $component = App\View\Components\Status::resolve(['value' => $leaveType->type_name,'style' => 'color:'.$leaveType->color] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Status::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2db42a9094af8c45b35737ea3527d3c0817d84c4)): ?>
<?php $component = $__componentOriginal2db42a9094af8c45b35737ea3527d3c0817d84c4; ?>
<?php unset($__componentOriginal2db42a9094af8c45b35737ea3527d3c0817d84c4); ?>
<?php endif; ?>
                            </td>
                            <td><?php echo e(isset($employeeLeavesQuota[$key]) ? $employeeLeavesQuota[$key]->no_of_leaves : 0); ?>

                            <td><?php echo e(($leaveType->monthly_limit > 0) ? $leaveType->monthly_limit : '--'); ?>

                            </td>
                            <td class="text-right">
                                <?php echo e((isset($leaveType->leavesCount[0])) ? $leaveType->leavesCount[0]->count - ($leaveType->leavesCount[0]->halfday*0.5) : '0'); ?>

                            </td>
                        </tr>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale53a9d2e6d6c51019138cc2fcd3ba8ac893391c6)): ?>
<?php $component = $__componentOriginale53a9d2e6d6c51019138cc2fcd3ba8ac893391c6; ?>
<?php unset($__componentOriginale53a9d2e6d6c51019138cc2fcd3ba8ac893391c6); ?>
<?php endif; ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <?php if (isset($component)) { $__componentOriginaldd4a3acb850ed912fbb4dfa63003ef1bff802c33 = $component; } ?>
<?php $component = App\View\Components\Cards\NoRecord::resolve(['icon' => 'redo','message' => __('messages.noRecordFound')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
    </div>
</div>
<?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/employees/leaves_quota.blade.php ENDPATH**/ ?>