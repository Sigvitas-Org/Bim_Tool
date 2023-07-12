 <?php $__env->slot('buttons', null, []); ?> 
    <div class="row">
        <div class="col-md-12 mb-2">
            <?php if (isset($component)) { $__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480 = $component; } ?>
<?php $component = App\View\Components\Forms\ButtonPrimary::resolve(['icon' => 'plus'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'add-status','class' => 'addStatus mb-2']); ?> <?php echo app('translator')->get('modules.statusFields.addstatus'); ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480)): ?>
<?php $component = $__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480; ?>
<?php unset($__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480); ?>
<?php endif; ?>

        </div>
    </div>
 <?php $__env->endSlot(); ?>

<div class="col-lg-12 col-md-12 ntfcn-tab-content-left w-100 p-4">

    <div class="table-responsive">
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
                <th>#</th>
                <th><?php echo app('translator')->get('app.name'); ?></th>
                <th style="width: 30%;"><?php echo app('translator')->get('modules.statusFields.defaultStatus'); ?></th>
                <th class="text-right"><?php echo app('translator')->get('app.action'); ?></th>
             <?php $__env->endSlot(); ?>

            <?php $__empty_1 = true; $__currentLoopData = $projectStatusSetting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr id="status-<?php echo e($status->id); ?>">
                    <td>
                        <?php echo e($key + 1); ?>

                    </td>
                    <td><i class="fa fa-circle mr-1 f-15"
                           style="color:<?php echo e($status->color); ?>"></i> <?php echo e(ucfirst($status->status_name)); ?>

                    </td>
                    <?php if($status->status == 'active'): ?>
                        <td>
                            <?php if (isset($component)) { $__componentOriginald8738d15765d6b35d603018b407a63f14ee18785 = $component; } ?>
<?php $component = App\View\Components\Forms\Radio::resolve(['fieldId' => 'status_'.e($status->id).'','fieldLabel' => __('app.default'),'fieldName' => 'default_status','fieldValue' => ''.e($status->id).'','checked' => ($status->default_status == 1) ? 'checked' : ''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.radio'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Radio::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'default_status','data-status-id' => ''.e($status->id).'']); ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald8738d15765d6b35d603018b407a63f14ee18785)): ?>
<?php $component = $__componentOriginald8738d15765d6b35d603018b407a63f14ee18785; ?>
<?php unset($__componentOriginald8738d15765d6b35d603018b407a63f14ee18785); ?>
<?php endif; ?>
                        </td>
                    <?php else: ?>
                        <td><?php echo app('translator')->get('modules.statusFields.change'); ?></td>
                    <?php endif; ?>
                    <td class="text-right">
                        <div class="task_view">
                            <a href="javascript:;" data-status-id="<?php echo e($status->id); ?>"
                               class="editProjectStatus task_view_more d-flex align-items-center justify-content-center">
                                <i class="fa fa-edit icons mr-1"></i> <?php echo app('translator')->get('app.edit'); ?>
                            </a>
                        </div>
                        <?php if($status->default_status == 0): ?>
                            <div class="task_view mt-1 mt-lg-0 mt-md-0 ml-1">
                                <a href="javascript:;" data-status-id="<?php echo e($status->id); ?>"
                                   class="delete-project-status task_view_more d-flex align-items-center justify-content-center">
                                    <i class="fa fa-trash icons mr-1"></i> <?php echo app('translator')->get('app.delete'); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="4">
                        <?php if (isset($component)) { $__componentOriginaldd4a3acb850ed912fbb4dfa63003ef1bff802c33 = $component; } ?>
<?php $component = App\View\Components\Cards\NoRecord::resolve(['icon' => 'map-marker-alt','message' => __('messages.noRecordFound')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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

<script>
    $('.change-project-setting').change(function () {
        var id = this.id;

        if ($(this).is(':checked'))
            var status = 'active';
        else
            var status = 'inactive';

        var url = "<?php echo e(route('project-settings.changeStatus', ':id')); ?>";
        url = url.replace(':id', id);
        $.easyAjax({
            url: url,
            type: "POST",
            blockUI: true,
            data: {'id': id, 'status': status, '_method': 'PUT', '_token': '<?php echo e(csrf_token()); ?>'},
            success: function (response) {
                if (response.status == "success") {
                    window.location.reload();
                }
            }
        })
    });

    $('body').on('click', '.default_status', function () {
        var statusID = $(this).data('status-id');
        var token = "<?php echo e(csrf_token()); ?>";

        $.easyAjax({
            url: "<?php echo e(route('project-settings.setDefault', ':id')); ?>",
            type: "POST",
            data: {
                id: statusID,
                _token: token
            },
            blockUI: true,
            success: function (response) {
                if (response.status == "success") {
                    window.location.reload();
                }
            }
        });
    });

    $('#add-status').click(function () {
        var url = "<?php echo e(route('project-settings.create')); ?>";
        $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_LG, url);
    });

    $('.editProjectStatus').click(function () {

        var id = $(this).data('status-id');

        var url = "<?php echo e(route('project-settings.edit', ':id')); ?>";
        url = url.replace(':id', id);

        $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_LG, url);
    });

    $('body').on('click', '.delete-project-status', function () {

        var id = $(this).data('status-id');

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

                var url = "<?php echo e(route('project-settings.destroy', ':id')); ?>";
                url = url.replace(':id', id);

                var token = "<?php echo e(csrf_token()); ?>";

                $.easyAjax({
                    type: 'POST',
                    url: url,
                    blockUI: true,
                    data: {
                        '_token': token,
                        '_method': 'DELETE'
                    },
                    success: function (response) {
                        if (response.status == "success") {
                            $('#status-' + id).fadeOut();
                        }
                    }
                });
            }
        });
    });

</script>
<?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/project-settings/ajax/status.blade.php ENDPATH**/ ?>