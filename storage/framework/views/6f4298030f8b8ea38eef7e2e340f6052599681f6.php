<?php
$editLeavePermission = user()->permission('edit_leave');
$deleteLeavePermission = user()->permission('delete_leave');
$approveRejectPermission = user()->permission('approve_or_reject_leaves');
?>

<div id="leave-detail-section">
    <div class="row">
        <div class="col-sm-12">
            <div class="card bg-white border-0 b-shadow-4">
                <div class="card-header bg-white  border-bottom-grey text-capitalize justify-content-between p-20">
                    <div class="row">
                        <div class="col-md-10 col-10">
                            <h3 class="heading-h1"><?php echo app('translator')->get('app.menu.leaves'); ?> <?php echo app('translator')->get('app.details'); ?></h3>
                            <div class="f-10 text-lightest"><?php echo app('translator')->get('app.apply'); ?>  <?php echo app('translator')->get('app.date'); ?> - <?php echo e($leave->created_at->timezone(company()->timezone)->format(company()->date_format .' ' . company()->time_format)); ?></div>
                        </div>
                        <div class="col-md-2 col-2 text-right">
                            <div class="dropdown">

                                <?php if($leave->status == 'pending'): ?>
                                    <button
                                        class="btn btn-lg f-14 px-2 py-1 text-dark-grey text-capitalize rounded  dropdown-toggle"
                                        type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-h"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right border-grey rounded b-shadow-4 p-0"
                                        aria-labelledby="dropdownMenuLink" tabindex="0">


                                        <?php if($reportingTo && $leave->user_id != user()->id && !in_array('admin', user_roles())): ?>

                                            <?php if($leave->manager_status_permission == '' && !($reportingPermission == 'cannot-approve')): ?>
                                                <a data-leave-id="<?php echo e($leave->id); ?>" data-leave-action="rejected" data-user-id="<?php echo e($leave->user_id); ?>" data-leave-type-id="<?php echo e($leave->leave_type_id); ?>" class="dropdown-item leave-action-reject" href="javascript:;">
                                                        <i class="fa fa-times mr-2"></i>
                                                        <?php echo app('translator')->get('app.reject'); ?>
                                                </a>
                                            <?php endif; ?>

                                            <?php if($reportingPermission == 'approved' && $leave->manager_status_permission == ''): ?>
                                                <a class="dropdown-item leave-action-approved" data-leave-id="<?php echo e($leave->id); ?>" data-leave-action="approved" data-user-id="<?php echo e($leave->user_id); ?>" data-leave-type-id="<?php echo e($leave->leave_type_id); ?>" href="javascript:;">
                                                    <i class="fa fa-check mr-2"></i>
                                                    <?php echo app('translator')->get('app.approve'); ?>
                                                </a>
                                            <?php elseif($reportingPermission == 'pre-approve' && !$leave->manager_status_permission): ?>
                                                <a data-leave-id="<?php echo e($leave->id); ?>"
                                                     data-leave-action="pre approved" data-user-id="<?php echo e($leave->user_id); ?>" data-leave-type-id="<?php echo e($leave->leave_type_id); ?>" class="dropdown-item leave-action-preapprove" href="javascript:;">
                                                       <i class="fa fa-check mr-2"></i>
                                                       <?php echo app('translator')->get('app.preApprove'); ?>
                                                </a>
                                            <?php endif; ?>
                                        <?php endif; ?>

                                            <?php if($approveRejectPermission == 'all'): ?>
                                                <a class="dropdown-item leave-action-approved" data-leave-id="<?php echo e($leave->id); ?>" data-leave-action="approved" data-user-id="<?php echo e($leave->user_id); ?>" data-leave-type-id="<?php echo e($leave->leave_type_id); ?>" href="javascript:;">
                                                    <i class="fa fa-check mr-2"></i>
                                                    <?php echo app('translator')->get('app.approve'); ?>
                                                </a>
                                                <a data-leave-id="<?php echo e($leave->id); ?>" data-leave-action="rejected" data-user-id="<?php echo e($leave->user_id); ?>" data-leave-type-id="<?php echo e($leave->leave_type_id); ?>" class="dropdown-item leave-action-reject" href="javascript:;">
                                                        <i class="fa fa-times mr-2"></i>
                                                        <?php echo app('translator')->get('app.reject'); ?>
                                                </a>
                                            <?php endif; ?>

                                            <?php if($editLeavePermission == 'all'
                                            || ($editLeavePermission == 'added' && user()->id == $leave->added_by)
                                            || ($editLeavePermission == 'owned' && user()->id == $leave->user_id)
                                            || ($editLeavePermission == 'both' && (user()->id == $leave->user_id || user()->id == $leave->added_by))): ?>
                                                <a class="dropdown-item openRightModal"
                                                data-redirect-url="<?php echo e(url()->previous()); ?>"
                                                href="<?php echo e(route('leaves.edit', $leave->id)); ?>"><i class="fa fa-edit mr-2"></i> <?php echo app('translator')->get('app.edit'); ?></a>
                                            <?php endif; ?>

                                            <?php if($deleteLeavePermission == 'all'
                                            || ($deleteLeavePermission == 'added' && user()->id == $leave->added_by)
                                            || ($deleteLeavePermission == 'owned' && user()->id == $leave->user_id)
                                            || ($deleteLeavePermission == 'both' && (user()->id == $leave->user_id || user()->id == $leave->added_by))): ?>
                                                <a class="dropdown-item delete-leave"><i class="fa fa-trash mr-2"></i> <?php echo app('translator')->get('app.delete'); ?></a>
                                            <?php endif; ?>

                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <?php
                        $leaveType = '<span class="badge badge-success" style="background-color:' . $leave->type->color . '">' . $leave->type->type_name . '</span>';

                        if ($leave->status == 'approved') {
                            $class = 'text-light-green';
                            $status = __('app.approved');
                        } elseif ($leave->status == 'pending') {
                            $class = 'text-yellow';
                            $status = __('app.pending');
                        } else {
                            $class = 'text-red';
                            $status = __('app.rejected');
                        }
                        $paidStatus = '<i class="fa fa-circle mr-1 ' . $class . ' f-10"></i> ' . $status;

                        $reject_reason = !is_null($leave->reject_reason) ? $leave->reject_reason : '--';

                        $approve_reason = !is_null($leave->approve_reason) ? $leave->approve_reason : '--';

                    ?>

                    <div class="col-12 px-0 pb-3 d-lg-flex d-md-flex d-block">
                        <p class="mb-0 text-lightest f-14 w-30 d-inline-block text-capitalize">
                            <?php echo app('translator')->get('modules.leaves.applicantName'); ?></p>
                        <p class="mb-0 text-dark-grey f-14">
                            <?php if (isset($component)) { $__componentOriginal1c46ebe885e3c4421e9977d656c777b9bed6c39a = $component; } ?>
<?php $component = App\View\Components\Employee::resolve(['user' => $leave->user] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                        </p>
                    </div>

                    <?php if (isset($component)) { $__componentOriginal53e40184b23a5cf55bed20787d7874d502fc5bb8 = $component; } ?>
<?php $component = App\View\Components\Cards\DataRow::resolve(['label' => __('modules.leaves.leaveDate'),'value' => $leave->leave_date->format(company()->date_format),'html' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data-row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\DataRow::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal53e40184b23a5cf55bed20787d7874d502fc5bb8)): ?>
<?php $component = $__componentOriginal53e40184b23a5cf55bed20787d7874d502fc5bb8; ?>
<?php unset($__componentOriginal53e40184b23a5cf55bed20787d7874d502fc5bb8); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal53e40184b23a5cf55bed20787d7874d502fc5bb8 = $component; } ?>
<?php $component = App\View\Components\Cards\DataRow::resolve(['label' => __('modules.leaves.leaveType'),'value' => $leaveType,'html' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data-row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\DataRow::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal53e40184b23a5cf55bed20787d7874d502fc5bb8)): ?>
<?php $component = $__componentOriginal53e40184b23a5cf55bed20787d7874d502fc5bb8; ?>
<?php unset($__componentOriginal53e40184b23a5cf55bed20787d7874d502fc5bb8); ?>
<?php endif; ?>

                    <?php if($leave->duration == 'half day'): ?>

                        <div class="col-12 px-0 pb-3 d-lg-flex d-md-flex d-block">
                            <p class="mb-0 text-lightest f-14 w-30 d-inline-block text-capitalize">
                                <?php echo app('translator')->get('app.duration'); ?></p>
                            <p class="mb-0 text-dark-grey f-14">
                                <?php echo app('translator')->get('modules.leaves.halfDay'); ?>

                                <?php if(!is_null($leave->half_day_type)): ?>
                                    <span class='badge badge-secondary ml-1'><?php echo e(($leave->half_day_type == 'first_half') ? __('modules.leaves.firstHalf') : __('modules.leaves.secondHalf')); ?> </span>
                                <?php endif; ?>

                            </p>
                        </div>

                    <?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginal53e40184b23a5cf55bed20787d7874d502fc5bb8 = $component; } ?>
<?php $component = App\View\Components\Cards\DataRow::resolve(['label' => __('modules.leaves.reason'),'value' => $leave->reason,'html' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data-row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\DataRow::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal53e40184b23a5cf55bed20787d7874d502fc5bb8)): ?>
<?php $component = $__componentOriginal53e40184b23a5cf55bed20787d7874d502fc5bb8; ?>
<?php unset($__componentOriginal53e40184b23a5cf55bed20787d7874d502fc5bb8); ?>
<?php endif; ?>

                    <?php if(!is_null($leave->manager_status_permission)): ?>
                    <?php if (isset($component)) { $__componentOriginal53e40184b23a5cf55bed20787d7874d502fc5bb8 = $component; } ?>
<?php $component = App\View\Components\Cards\DataRow::resolve(['label' => __('modules.leaves.statusReport'),'value' => ucfirst($leave->manager_status_permission),'html' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data-row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\DataRow::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal53e40184b23a5cf55bed20787d7874d502fc5bb8)): ?>
<?php $component = $__componentOriginal53e40184b23a5cf55bed20787d7874d502fc5bb8; ?>
<?php unset($__componentOriginal53e40184b23a5cf55bed20787d7874d502fc5bb8); ?>
<?php endif; ?>
                    <?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginal53e40184b23a5cf55bed20787d7874d502fc5bb8 = $component; } ?>
<?php $component = App\View\Components\Cards\DataRow::resolve(['label' => __('app.status'),'value' => $paidStatus,'html' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data-row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\DataRow::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal53e40184b23a5cf55bed20787d7874d502fc5bb8)): ?>
<?php $component = $__componentOriginal53e40184b23a5cf55bed20787d7874d502fc5bb8; ?>
<?php unset($__componentOriginal53e40184b23a5cf55bed20787d7874d502fc5bb8); ?>
<?php endif; ?>

                    <?php if(!is_null($leave->approved_by)): ?>
                        <div class="col-12 px-0 pb-3 d-lg-flex d-md-flex d-block">
                            <p class="mb-0 text-lightest f-14 w-30 d-inline-block text-capitalize">
                                <?php echo app('translator')->get('modules.leaves.approvedBy'); ?></p>
                            <p class="mb-0 text-dark-grey f-14">
                                <?php if (isset($component)) { $__componentOriginal1c46ebe885e3c4421e9977d656c777b9bed6c39a = $component; } ?>
<?php $component = App\View\Components\Employee::resolve(['user' => $leave->approvedBy] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                            </p>
                        </div>
                    <?php endif; ?>

                    <?php if(!is_null($leave->approved_at)): ?>
                        <?php if (isset($component)) { $__componentOriginal53e40184b23a5cf55bed20787d7874d502fc5bb8 = $component; } ?>
<?php $component = App\View\Components\Cards\DataRow::resolve(['label' => __('modules.leaves.approvedAt'),'value' => $leave->approved_at->timezone(company()->timezone)->format(company()->date_format .' ' . company()->time_format)] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data-row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\DataRow::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal53e40184b23a5cf55bed20787d7874d502fc5bb8)): ?>
<?php $component = $__componentOriginal53e40184b23a5cf55bed20787d7874d502fc5bb8; ?>
<?php unset($__componentOriginal53e40184b23a5cf55bed20787d7874d502fc5bb8); ?>
<?php endif; ?>
                    <?php endif; ?>

                    <?php if($leave->status == 'rejected'): ?>
                        <?php if (isset($component)) { $__componentOriginal53e40184b23a5cf55bed20787d7874d502fc5bb8 = $component; } ?>
<?php $component = App\View\Components\Cards\DataRow::resolve(['label' => __('messages.reasonForLeaveRejection'),'value' => $reject_reason,'html' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data-row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\DataRow::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal53e40184b23a5cf55bed20787d7874d502fc5bb8)): ?>
<?php $component = $__componentOriginal53e40184b23a5cf55bed20787d7874d502fc5bb8; ?>
<?php unset($__componentOriginal53e40184b23a5cf55bed20787d7874d502fc5bb8); ?>
<?php endif; ?>
                    <?php endif; ?>

                    <?php if($leave->status == 'approved'): ?>
                        <?php if (isset($component)) { $__componentOriginal53e40184b23a5cf55bed20787d7874d502fc5bb8 = $component; } ?>
<?php $component = App\View\Components\Cards\DataRow::resolve(['label' => __('messages.reasonForLeaveApproval'),'value' => $approve_reason,'html' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data-row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\DataRow::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal53e40184b23a5cf55bed20787d7874d502fc5bb8)): ?>
<?php $component = $__componentOriginal53e40184b23a5cf55bed20787d7874d502fc5bb8; ?>
<?php unset($__componentOriginal53e40184b23a5cf55bed20787d7874d502fc5bb8); ?>
<?php endif; ?>
                    <?php endif; ?>

                    <div class="col-12 px-0 pb-3 d-lg-flex d-md-flex d-block">
                        <p class="mb-0 text-lightest f-14 w-30 d-inline-block text-capitalize">
                            <?php echo app('translator')->get('app.file'); ?></p>
                        <p class="mb-0 text-dark-grey f-14">
                            <div div class="d-flex flex-wrap mt-3" id="leave-file-list">
                                <?php $__empty_1 = true; $__currentLoopData = $leave->files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <?php if (isset($component)) { $__componentOriginalac87ecae6c1a18a2d39c87478d8f3cd5131a5758 = $component; } ?>
<?php $component = App\View\Components\FileCard::resolve(['fileName' => $file->filename,'dateAdded' => $file->created_at->diffForHumans()] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('file-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\FileCard::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                        <?php if($file->icon == 'images'): ?>
                                            <img src="<?php echo e($file->file_url); ?>">
                                        <?php else: ?>
                                            <i class="fa <?php echo e($file->icon); ?> text-lightest"></i>
                                        <?php endif; ?>
                                             <?php $__env->slot('action', null, []); ?> 
                                                <div class="dropdown ml-auto file-action">
                                                    <button class="btn btn-lg f-14 p-0 text-lightest text-capitalize rounded  dropdown-toggle"
                                                        type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-h"></i>
                                                    </button>

                                                    <div class="dropdown-menu dropdown-menu-right border-grey rounded b-shadow-4 p-0"
                                                        aria-labelledby="dropdownMenuLink" tabindex="0">
                                                            <?php if($file->icon = 'images'): ?>
                                                                <a class="cursor-pointer d-block text-dark-grey f-13 pt-3 px-3 " target="_blank"
                                                                    href="<?php echo e($file->file_url); ?>"><?php echo app('translator')->get('app.view'); ?></a>
                                                            <?php endif; ?>
                                                            <a class="cursor-pointer d-block text-dark-grey f-13 py-3 px-3 "
                                                                href="<?php echo e(route('leave-files.download', md5($file->id))); ?>"><?php echo app('translator')->get('app.download'); ?></a>

                                                            <a class="cursor-pointer d-block text-dark-grey f-13 pb-3 px-3 delete-file"
                                                                data-row-id="<?php echo e($file->id); ?>" href="javascript:;"><?php echo app('translator')->get('app.delete'); ?></a>
                                                    </div>
                                                </div>
                                             <?php $__env->endSlot(); ?>

                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalac87ecae6c1a18a2d39c87478d8f3cd5131a5758)): ?>
<?php $component = $__componentOriginalac87ecae6c1a18a2d39c87478d8f3cd5131a5758; ?>
<?php unset($__componentOriginalac87ecae6c1a18a2d39c87478d8f3cd5131a5758); ?>
<?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <?php if (isset($component)) { $__componentOriginaldd4a3acb850ed912fbb4dfa63003ef1bff802c33 = $component; } ?>
<?php $component = App\View\Components\Cards\NoRecord::resolve(['message' => __('messages.noFileUploaded'),'icon' => 'file'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('body').on('click', '.delete-leave', function() {
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
                var url = "<?php echo e(route('leaves.destroy', $leave->id)); ?>";

                var token = "<?php echo e(csrf_token()); ?>";

                $.easyAjax({
                    type: 'POST',
                    url: url,
                    data: {
                        '_token': token,
                        '_method': 'DELETE'
                    },
                    success: function(response) {
                        if (response.status == "success") {
                            window.location.href = response.redirectUrl;
                        }
                    }
                });
            }
        });
    });

    $('body').on('click', '.leave-action-approved', function() {
        let action = $(this).data('leave-action');
        let leaveId = $(this).data('leave-id');
        let searchQuery = "?leave_action=" + action + "&leave_id=" + leaveId;
        let url = "<?php echo e(route('leaves.show_approved_modal')); ?>" + searchQuery;

        $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_LG, url);
    });

    $('body').on('click', '.leave-action-reject', function() {
        let action = $(this).data('leave-action');
        let leaveId = $(this).data('leave-id');
        let searchQuery = "?leave_action=" + action + "&leave_id=" + leaveId;
        let url = "<?php echo e(route('leaves.show_reject_modal')); ?>" + searchQuery;

        $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_LG, url);
    });

        $('body').on('click', '.leave-action-preapprove', function() {
        var action = $(this).data('leave-action');
        var leaveId = $(this).data('leave-id');
        var url = "<?php echo e(route('leaves.pre_approve_leave')); ?>";

        Swal.fire({
            title: "<?php echo app('translator')->get('messages.sweetAlertTitle'); ?>",
            text: "<?php echo app('translator')->get('messages.changeLeaveStatusConfirmation'); ?>",
            icon: 'warning',
            showCancelButton: true,
            focusConfirm: false,
            confirmButtonText: "<?php echo app('translator')->get('messages.confirm'); ?>",
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
                    blockUI: true,
                    data: {
                        'action': action,
                        'leaveId': leaveId,
                        '_token': '<?php echo e(csrf_token()); ?>'
                    },
                    success: function(response) {
                        if (response.status == 'success') {
                            window.location.reload();
                        }
                    }
                });
            }
        });
    });

    $('body').on('click', '.delete-file', function() {
        var id = $(this).data('row-id');
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
                var url = "<?php echo e(route('leave-files.destroy', ':id')); ?>";
                url = url.replace(':id', id);

                var token = "<?php echo e(csrf_token()); ?>";

                $.easyAjax({
                    type: 'POST',
                    url: url,
                    data: {
                        '_token': token,
                        '_method': 'DELETE'
                    },
                    success: function(response) {
                        if (response.status == "success") {
                            $('#leave-file-list').html(response.view);
                        }
                    }
                });
            }
        });
    });
</script>
<?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/leaves/ajax/show.blade.php ENDPATH**/ ?>