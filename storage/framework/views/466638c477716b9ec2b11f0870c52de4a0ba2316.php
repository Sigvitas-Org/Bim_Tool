<?php $__empty_1 = true; $__currentLoopData = $dateWiseData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $dateData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <?php
        $currentDate = \Carbon\Carbon::parse($key);
    ?>
    <?php if(isset($dateData['attendance']) && ($dateData['attendance'] == true) && $dateData['leave'] != true): ?>

        <tr>
            <td>
                <div class="media-body">
                    <h5 class="mb-0 f-13"><?php echo e($currentDate->format(company()->date_format)); ?>

                    </h5>
                    <p class="mb-0 f-13 text-dark-grey">
                        <label class="badge badge-secondary"><?php echo e($currentDate->format('l')); ?></label>
                    </p>
                </div>
            </td>
            <td>
                <span class="badge badge-success"><?php echo app('translator')->get('modules.attendance.present'); ?></span>
            </td>
            <td colspan="2">
                <?php if (isset($component)) { $__componentOriginale53a9d2e6d6c51019138cc2fcd3ba8ac893391c6 = $component; } ?>
<?php $component = App\View\Components\Table::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Table::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mb-0 rounded table table-bordered table-hover']); ?>
                    <?php $__currentLoopData = $dateData['attendance']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attendance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td width="50%">
                                <?php echo e($attendance->clock_in_time->timezone(company()->timezone)->format(company()->time_format)); ?>

                                <?php if($attendance->late == 'yes'): ?>
                                    <span class="text-dark-grey"><i class="fa fa-exclamation-triangle ml-2"></i>
                                    <?php echo app('translator')->get('modules.attendance.late'); ?></span>
                                <?php endif; ?>

                                <?php if($attendance->half_day == 'yes'): ?>
                                    <span class="text-dark-grey"><i class="fa fa-sign-out-alt ml-2"></i>
                                    <?php echo app('translator')->get('modules.attendance.halfDay'); ?></span>
                                <?php endif; ?>

                                <?php if($attendance->work_from_type != ''): ?>
                                    <?php if($attendance->work_from_type == 'other'): ?>
                                        <i class="fa fa-map-marker-alt ml-2"></i>
                                        <?php echo e($attendance->location); ?> (<?php echo e($attendance->working_from); ?>)
                                    <?php else: ?>
                                        <i class="fa fa-map-marker-alt ml-2"></i>
                                        <?php echo e($attendance->location); ?> (<?php echo e($attendance->work_from_type); ?>)
                                    <?php endif; ?>
                                <?php endif; ?>
                            </td>
                            <td width="50%">
                                <?php if(!is_null($attendance->clock_out_time)): ?>
                                    <?php echo e($attendance->clock_out_time->timezone(company()->timezone)->format(company()->time_format)); ?>

                                <?php else: ?> - <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale53a9d2e6d6c51019138cc2fcd3ba8ac893391c6)): ?>
<?php $component = $__componentOriginale53a9d2e6d6c51019138cc2fcd3ba8ac893391c6; ?>
<?php unset($__componentOriginale53a9d2e6d6c51019138cc2fcd3ba8ac893391c6); ?>
<?php endif; ?>
            </td>
            <td>
                <?php echo e($attendance->totalTime($attendance->clock_in_time, $attendance->clock_in_time, $attendance->user_id)); ?>

            </td>
            <td class="text-right pb-2 pr-20">
                <?php if (isset($component)) { $__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26 = $component; } ?>
<?php $component = App\View\Components\Forms\ButtonSecondary::resolve(['icon' => 'search'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonSecondary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'view-attendance','data-attendance-id' => ''.e($attendance->aId).'']); ?>
                    <?php echo app('translator')->get('app.details'); ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26)): ?>
<?php $component = $__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26; ?>
<?php unset($__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26); ?>
<?php endif; ?>
            </td>

        </tr>
    <?php else: ?>
        
        <tr>
            <td>
                <div class="media-body">
                    <h5 class="mb-0 f-13"><?php echo e($currentDate->format(company()->date_format)); ?>

                    </h5>
                    <p class="mb-0 f-13 text-dark-grey">
                        <span class="badge badge-secondary"><?php echo e($currentDate->format('l')); ?></span>
                    </p>
                </div>
            </td>
            <td>
                <?php if(!$dateData['holiday'] && !$dateData['leave']): ?>
                    <label class="badge badge-danger"><?php echo app('translator')->get('modules.attendance.absent'); ?></label>
                <?php elseif($dateData['leave']): ?>
                    <?php if($dateData['leave']['duration'] == 'half day'): ?>
                        <label class="badge badge-primary"><?php echo app('translator')->get('modules.attendance.leave'); ?></label><br><br>
                        <label class="badge badge-warning"><?php echo app('translator')->get('modules.attendance.halfDay'); ?></label>
                    <?php else: ?>
                        <label class="badge badge-primary"><?php echo app('translator')->get('modules.attendance.leave'); ?></label>
                    <?php endif; ?>
                <?php else: ?>
                    <label class="badge badge-secondary"><?php echo app('translator')->get('modules.attendance.holiday'); ?></label>
                <?php endif; ?>
            </td>
            <td colspan="2">
                <table width="100%">
                    <tr>
                        <td width="50%">-
                        </td>
                        <td width="50%">-
                        </td>
                    </tr>
                </table>
            </td>
            <td>-</td>
            <td class="text-right pb-2 pr-20">-</td>
        </tr>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <tr>
        <td colspan="6">
            <?php if (isset($component)) { $__componentOriginaldd4a3acb850ed912fbb4dfa63003ef1bff802c33 = $component; } ?>
<?php $component = App\View\Components\Cards\NoRecord::resolve(['icon' => 'calendar','message' => __('messages.noRecordFound')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/attendances/ajax/user_attendance.blade.php ENDPATH**/ ?>