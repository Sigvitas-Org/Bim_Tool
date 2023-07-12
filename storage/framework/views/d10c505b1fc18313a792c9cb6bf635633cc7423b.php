<?php
$addAttendancePermission = user()->permission('add_attendance');
$editAttendancePermission = user()->permission('edit_attendance');
$deleteAttendancePermission = user()->permission('delete_attendance');
?>

<div class="modal-header">
    <h5 class="modal-title" id="modelHeading"><?php echo app('translator')->get('app.menu.attendance'); ?> <?php echo app('translator')->get('app.details'); ?></h5>
    <button type="button"  class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">×</span></button>
</div>
<div class="modal-body bg-grey">
    <div class="row">
        <div class="col-md-12 mb-4">
            <?php if (isset($component)) { $__componentOriginal7da2790dd3f701b9ade189ac1c8c4e086fe274b9 = $component; } ?>
<?php $component = App\View\Components\Cards\User::resolve(['image' => $attendance->user->image_url] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.user'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\User::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <div class="row">
                    <div class="col-12">
                        <h4 class="card-title f-15 f-w-500 text-darkest-grey mb-0">
                            <a href="<?php echo e(route('employees.show', [$attendance->user->id])); ?>"
                                class="text-darkest-grey"><?php echo e(ucfirst($attendance->user->name)); ?></a>

                            <?php if(isset($attendance->user->country)): ?>
                                <?php if (isset($component)) { $__componentOriginalc4c20dd2fe1428f9761a659ac135efa4625c0924 = $component; } ?>
<?php $component = App\View\Components\Flag::resolve(['country' => $attendance->user->country] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('flag'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Flag::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc4c20dd2fe1428f9761a659ac135efa4625c0924)): ?>
<?php $component = $__componentOriginalc4c20dd2fe1428f9761a659ac135efa4625c0924; ?>
<?php unset($__componentOriginalc4c20dd2fe1428f9761a659ac135efa4625c0924); ?>
<?php endif; ?>
                            <?php endif; ?>
                        </h4>
                        <p class="mb-0 f-13 text-dark-grey">
                            <?php echo e((!is_null($attendance->user->employeeDetail) && !is_null($attendance->user->employeeDetail->designation)) ? mb_ucwords($attendance->user->employeeDetail->designation->name) : ' '); ?>

                        </p>
                    </div>
                </div>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7da2790dd3f701b9ade189ac1c8c4e086fe274b9)): ?>
<?php $component = $__componentOriginal7da2790dd3f701b9ade189ac1c8c4e086fe274b9; ?>
<?php unset($__componentOriginal7da2790dd3f701b9ade189ac1c8c4e086fe274b9); ?>
<?php endif; ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?php if (isset($component)) { $__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e = $component; } ?>
<?php $component = App\View\Components\Cards\Data::resolve(['title' => __('app.date').' - '.$attendanceDate->format(company()->date_format)] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Data::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <div class="punch-status">
                    <div class="border rounded p-3 mb-3 bg-light">
                        <h6 class="f-13"><?php echo app('translator')->get('modules.attendance.clock_in'); ?></h6>
                        <p class="mb-0"><?php echo e($startTime->format(company()->time_format)); ?></p>
                    </div>
                    <div class="punch-info">
                        <div class="punch-hours f-13">
                            <span><?php echo e($totalTime); ?></span>
                        </div>
                    </div>
                    <div class="border rounded p-3 bg-light">
                        <h6 class="f-13"><?php echo app('translator')->get('modules.attendance.clock_out'); ?></h6>
                        <p class="mb-0"><?php echo e($endTime != '' ? $endTime->format(company()->time_format) : ''); ?>

                            <?php if(isset($notClockedOut)): ?>
                                (<?php echo app('translator')->get('modules.attendance.notClockOut'); ?>)
                            <?php endif; ?>
                        </p>
                    </div>
                    <input type="hidden" id="date" value="<?php echo e($attendanceDate); ?>">

                </div>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e)): ?>
<?php $component = $__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e; ?>
<?php unset($__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e); ?>
<?php endif; ?>
        </div>
        <div class="col-md-6">
            <?php if (isset($component)) { $__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e = $component; } ?>
<?php $component = App\View\Components\Cards\Data::resolve(['title' => __('modules.employees.activity')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Data::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <div class="recent-activity">

                    <?php $__currentLoopData = $attendanceActivity->reverse(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <div class="row res-activity-box" id="timelogBox<?php echo e($item->aId); ?>">
                            <ul class="res-activity-list col-md-9">
                                <li>
                                    <p class="mb-0"><?php echo app('translator')->get('modules.attendance.clock_in'); ?>
                                        <?php if(!is_null($item->employee_shift_id)): ?>
                                            <span class="badge badge-info ml-2" style="background-color: <?php echo e($attendanceSettings->color); ?>"><?php echo e($attendanceSettings->shift_name); ?></span>
                                        <?php endif; ?></p>
                                    <p class="res-activity-time">
                                        <i class="fa fa-clock"></i>
                                        <?php echo e($item->clock_in_time->timezone(company()->timezone)->format(company()->date_format . ' ' . company()->time_format)); ?>


                                        <?php if($item->work_from_type != ''): ?>
                                            <?php if($item->work_from_type == 'other'): ?>
                                                <i class="fa fa-map-marker-alt ml-2"></i>
                                                <?php echo e($item->location); ?> <?php echo e($item->working_from != '' ? '(' . $item->working_from . ')' : ''); ?>

                                            <?php else: ?>
                                                <i class="fa fa-map-marker-alt ml-2"></i>
                                                <?php echo e($item->location); ?> (<?php echo e(ucfirst($item->work_from_type)); ?>)
                                            <?php endif; ?>
                                        <?php endif; ?>

                                        <?php if($item->late == 'yes'): ?>
                                            <i class="fa fa-exclamation-triangle ml-2"></i>
                                            <?php echo app('translator')->get('modules.attendance.late'); ?>
                                        <?php endif; ?>

                                        <?php if($item->half_day == 'yes'): ?>
                                            <i class="fa fa-sign-out-alt ml-2"></i>
                                            <?php echo app('translator')->get('modules.attendance.halfDay'); ?>
                                        <?php endif; ?>

                                        <?php if($item->latitude != '' && $item->longitude != ''): ?>
                                        <a href="https://www.google.com/maps/<?php echo e('@'.$item->latitude); ?>,<?php echo e($item->longitude); ?>,17z" target="_blank">
                                            <i class="fa fa-map-marked-alt ml-2"></i> <?php echo app('translator')->get('modules.attendance.showOnMap'); ?></a>
                                        <?php endif; ?>
                                    </p>
                                </li>
                                <li>
                                    <p class="mb-0"><?php echo app('translator')->get('modules.attendance.clock_out'); ?></p>
                                    <p class="res-activity-time">
                                        <i class="fa fa-clock"></i>
                                        <?php if(!is_null($item->clock_out_time)): ?>
                                            <?php echo e($item->clock_out_time->timezone(company()->timezone)->format(company()->date_format . ' ' . company()->time_format)); ?>

                                        <?php else: ?>
                                            <?php echo app('translator')->get('modules.attendance.notClockOut'); ?>
                                        <?php endif; ?>
                                    </p>
                                </li>
                            </ul>

                            <div class="col-md-3 text-right">
                                <div class="dropdown ml-auto comment-action">
                                    <?php if($editAttendancePermission == 'all'
                                        || ($addAttendancePermission == 'all')
                                        || ($editAttendancePermission == 'added' && $item->added_by == user()->id)
                                        || ($editAttendancePermission == 'owned' && $attendance->user->id == user()->id)
                                        || ($editAttendancePermission == 'both' && ($item->added_by == user()->id || $attendance->user->id == user()->id))
                                        || $deleteAttendancePermission == 'all'
                                        || ($deleteAttendancePermission == 'added' && $item->added_by == user()->id)
                                        || ($deleteAttendancePermission == 'owned' && $attendance->user->id == user()->id)
                                        || ($deleteAttendancePermission == 'both' && ($item->added_by == user()->id || $attendance->user->id == user()->id))
                                    ): ?>
                                    <button
                                        class="btn btn-lg f-14 py-0 text-lightest text-capitalize rounded  dropdown-toggle"
                                        type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-h"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right border-grey rounded b-shadow-4 p-0 mr-2"
                                        aria-labelledby="dropdownMenuLink" tabindex="0">
                                        <?php if($addAttendancePermission == 'all' && $maxClockIn): ?>
                                            <a class="dropdown-item d-block text-dark-grey f-13 py-1 px-3"
                                                href="javascript:;" onclick="addAttendance(<?php echo e($item->user_id); ?>)"
                                                data-attendance-id="<?php echo e($item->user_id); ?>"><?php echo app('translator')->get('app.add'); ?></a>
                                        <?php endif; ?>
                                        <?php if($editAttendancePermission == 'all'
                                            || ($editAttendancePermission == 'added' && $item->added_by == user()->id)
                                            || ($editAttendancePermission == 'owned' && $attendance->user->id == user()->id)
                                            || ($editAttendancePermission == 'both' && ($item->added_by == user()->id || $attendance->user->id == user()->id))
                                            ): ?>
                                            <a class="dropdown-item d-block text-dark-grey f-13 py-1 px-3"
                                                href="javascript:;" onclick="editAttendance(<?php echo e($item->aId); ?>)"
                                                data-attendance-id="<?php echo e($item->aId); ?>"><?php echo app('translator')->get('app.edit'); ?></a>
                                        <?php endif; ?>

                                        <?php if($deleteAttendancePermission == 'all'
                                            || ($deleteAttendancePermission == 'added' && $item->added_by == user()->id)
                                            || ($deleteAttendancePermission == 'owned' && $attendance->user->id == user()->id)
                                            || ($deleteAttendancePermission == 'both' && ($item->added_by == user()->id || $attendance->user->id == user()->id))
                                            ): ?>
                                            <a class="cursor-pointer dropdown-item d-block text-dark-grey f-13 pb-1 px-3"
                                                onclick="deleteAttendance(<?php echo e($item->aId); ?>)"
                                                data-attendance-id="<?php echo e($item->aId); ?>"
                                                href="javascript:;"><?php echo app('translator')->get('app.delete'); ?></a>
                                        <?php endif; ?>
                                    </div>
                                    <?php endif; ?>
                                </div>

                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e)): ?>
<?php $component = $__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e; ?>
<?php unset($__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e); ?>
<?php endif; ?>
        </div>
    </div>

</div>
<script>
    function deleteAttendance(id) {
        var url = "<?php echo e(route('attendances.destroy', ':id')); ?>";
        url = url.replace(':id', id);
        var token = "<?php echo e(csrf_token()); ?>";

        Swal.fire({
            title: "<?php echo app('translator')->get('messages.sweetAlertTitle'); ?>",
            text: "<?php echo app('translator')->get('messages.recoverRecord'); ?>",
            icon: 'warning',
            showCancelButton: true,
            focusConfirm: false,
            confirmButtonText: "<?php echo app('translator')->get('messages.confirmDelete'); ?>",
            cancelButtonText: "<?php echo app('translator')->get('app.cancel'); ?>",
            customClass: {
                confirmButton: 'btn btn-primary mr-3',
                cancelButton: 'btn btn-secondary'
            },
            showClass: {
                popup: 'swal2-noanimation',
                backdrop: 'swal2-noanimation'
            },
            buttonsStyling: false
        }).then((result) => {
            if (result.isConfirmed) {
                $.easyAjax({
                    type: 'POST',
                    url: url,
                    data: {
                        '_token': token,
                        '_method': 'DELETE'
                    },
                    success: function(response) {
                        if (response.status == "success") {
                            showTable();
                            $(MODAL_XL).modal('hide');
                        }
                    }
                });
            }
        });

    }

</script>
<?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/attendances/ajax/show.blade.php ENDPATH**/ ?>