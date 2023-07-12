<?php
$addAttendancePermission = user()->permission('add_attendance');
$iteration = 0;
?>
<div class="table-responsive">

    <?php if (isset($component)) { $__componentOriginale53a9d2e6d6c51019138cc2fcd3ba8ac893391c6 = $component; } ?>
<?php $component = App\View\Components\Table::resolve(['headType' => 'thead-light'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Table::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'table-bordered mt-3']); ?>
         <?php $__env->slot('thead', null, []); ?> 
            <th class="px-2"><?php echo app('translator')->get('app.employee'); ?></th>
            <?php for($i = 1; $i <= $daysInMonth; $i++): ?>
                <th class="px-2"><?php echo e($i); ?></th>
            <?php endfor; ?>
            <th class="text-right px-2"><?php echo app('translator')->get('app.total'); ?></th>
         <?php $__env->endSlot(); ?>

        <?php $__currentLoopData = $employeeAttendence; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $attendance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $totalPresent = 0;
                $userId = explode('#', $key);
                $userId = $userId[0];
            ?>
            <tr>
                <td class="w-25 px-2"> <?php echo end($attendance); ?> </td>
                <?php $__currentLoopData = $attendance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key2 => $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($key2 + 1 <= count($attendance)): ?>
                        <?php
                            $attendanceDate = \Carbon\Carbon::parse($year.'-'.$month.'-'.$key2);
                        ?>
                        <td class="px-2">
                            <?php if($day == 'Leave'): ?>
                                <span data-toggle="tooltip" data-original-title="<?php echo app('translator')->get('modules.attendance.leave'); ?>"><i
                                        class="fa fa-plane-departure text-warning"></i></span>
                            <?php elseif($day == 'Half Day'): ?>
                                <?php if($attendanceDate->isFuture()): ?>
                                    <span data-toggle="tooltip" data-original-title="<?php echo app('translator')->get('modules.attendance.halfDay'); ?>"><i
                                        class="fa fa-star-half-alt text-warning"></i></span>                        
                                <?php else: ?>
                                    <a href="javascript:;" <?php if($addAttendancePermission == 'all'): ?> class="edit-attendance" <?php endif; ?> data-user-id="<?php echo e($userId); ?>"
                                            data-attendance-date="<?php echo e($key2); ?>">
                                        <span data-toggle="tooltip" data-original-title="<?php echo app('translator')->get('modules.attendance.halfDay'); ?>"><i
                                                class="fa fa-star-half-alt text-warning"></i></span>
                                    </a>
                                <?php endif; ?>
                            <?php elseif($day == 'Absent'): ?>
                                <a href="javascript:;" <?php if($addAttendancePermission == 'all'): ?> class="edit-attendance" <?php endif; ?> data-user-id="<?php echo e($userId); ?>"
                                    data-attendance-date="<?php echo e($key2); ?>"><i
                                        class="fa fa-times text-lightest"></i></a>
                            <?php elseif($day == 'Holiday'): ?>
                                <a href="javascript:;" data-toggle="tooltip"
                                    data-original-title="<?php echo e($holidayOccasions[$key2]); ?>"
                                    data-user-id="<?php echo e($userId); ?>" data-attendance-date="<?php echo e($key2); ?>"><i
                                        class="fa fa-star text-warning"></i></a>
                            <?php else: ?>
                                <?php if($day != '-'): ?>
                                    <?php
                                        $totalPresent = $totalPresent + 1;
                                    ?>
                                <?php endif; ?>

                                <?php echo $day; ?>

                            <?php endif; ?>
                        </td>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <td class="text-dark f-w-500 text-right attendance-total px-2 w-100">
                    <?php echo e(array_key_exists($iteration, $total) ? $total[$iteration] : '0'); ?>

                </td>
            </tr>

            <?php
                $iteration++;
            ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale53a9d2e6d6c51019138cc2fcd3ba8ac893391c6)): ?>
<?php $component = $__componentOriginale53a9d2e6d6c51019138cc2fcd3ba8ac893391c6; ?>
<?php unset($__componentOriginale53a9d2e6d6c51019138cc2fcd3ba8ac893391c6); ?>
<?php endif; ?>
</div>
<?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/attendances/ajax/hour_summary_data.blade.php ENDPATH**/ ?>