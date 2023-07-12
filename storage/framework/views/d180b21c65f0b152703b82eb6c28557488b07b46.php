<?php
$addTaskPermission = ($project->project_admin == user()->id) ? 'all' : user()->permission('add_tasks');
$viewUnassignedTasksPermission = ($project->project_admin == user()->id) ? 'all' : user()->permission('view_unassigned_tasks');
$projectArchived = $project->trashed();
?>

<!-- ROW START -->
<div class="row py-5">
    <div class="col-lg-12 col-md-12 mb-4 mb-xl-0 mb-lg-4">
        <!-- Add Task Export Buttons Start -->
        <?php if($projectArchived): ?>
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.alert','data' => ['type' => 'info','icon' => 'info-circle']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'info','icon' => 'info-circle']); ?><?php echo app('translator')->get('messages.archivedTaskNotWork'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        <?php endif; ?>

        <div class="d-flex" id="table-actions">
            <?php if(($addTaskPermission == 'all' || $addTaskPermission == 'added' || $project->project_admin == user()->id) && !$projectArchived): ?>
                <?php if (isset($component)) { $__componentOriginal7f662ecf9f97aca611d2405e5e6903e6081fbd17 = $component; } ?>
<?php $component = App\View\Components\Forms\LinkPrimary::resolve(['link' => route('tasks.create').'?task_project_id='.$project->id,'icon' => 'plus'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.link-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\LinkPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-3 openRightModal','data-redirect-url' => ''.e(url()->full()).'']); ?>
                    <?php echo app('translator')->get('app.add'); ?>
                    <?php echo app('translator')->get('app.task'); ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7f662ecf9f97aca611d2405e5e6903e6081fbd17)): ?>
<?php $component = $__componentOriginal7f662ecf9f97aca611d2405e5e6903e6081fbd17; ?>
<?php unset($__componentOriginal7f662ecf9f97aca611d2405e5e6903e6081fbd17); ?>
<?php endif; ?>
            <?php endif; ?>
        </div>
        <!-- Add Task Export Buttons End -->


        <div class="d-flex justify-content-between">
            <form action="" class="flex-grow-1 " id="filter-form">
                <div class="d-flex mt-3">
                    <!-- STATUS START -->
                    <div class="select-box py-2 px-0 mr-3">
                        <?php if (isset($component)) { $__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad = $component; } ?>
<?php $component = App\View\Components\Forms\Label::resolve(['fieldLabel' => __('app.status'),'fieldId' => 'status'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Label::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad)): ?>
<?php $component = $__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad; ?>
<?php unset($__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad); ?>
<?php endif; ?>
                        <select class="form-control select-picker" name="status" id="status">
                            <option value="not finished"><?php echo app('translator')->get('modules.tasks.hideCompletedTask'); ?></option>
                            <option value="all"><?php echo app('translator')->get('app.all'); ?></option>
                            <?php $__currentLoopData = $taskBoardStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($status->id); ?>"><?php echo e($status->slug == 'completed' || $status->slug == 'incomplete' ? __('app.' . $status->slug) : mb_ucwords($status->column_name)); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <!-- STATUS END -->

                    <!-- STATUS START -->
                    <div class="select-box py-2 px-0 mr-3">
                        <?php if (isset($component)) { $__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad = $component; } ?>
<?php $component = App\View\Components\Forms\Label::resolve(['fieldLabel' => __('modules.tasks.assignTo'),'fieldId' => 'assignedTo'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Label::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad)): ?>
<?php $component = $__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad; ?>
<?php unset($__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad); ?>
<?php endif; ?>
                        <select class="form-control select-picker" id="assignedTo" data-live-search="true"
                        data-container="body" data-size="8">
                            <option value="all"><?php echo app('translator')->get('app.all'); ?></option>
                            <?php $__currentLoopData = $project->projectMembers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if (isset($component)) { $__componentOriginal3a9f7815236e62d576ffe72a6df948b4e8598398 = $component; } ?>
<?php $component = App\View\Components\UserOption::resolve(['user' => $employee] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('user-option'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\UserOption::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3a9f7815236e62d576ffe72a6df948b4e8598398)): ?>
<?php $component = $__componentOriginal3a9f7815236e62d576ffe72a6df948b4e8598398; ?>
<?php unset($__componentOriginal3a9f7815236e62d576ffe72a6df948b4e8598398); ?>
<?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php if($viewUnassignedTasksPermission == 'all'): ?>
                                <option value="unassigned"><?php echo app('translator')->get('modules.tasks.unassigned'); ?></option>
                            <?php endif; ?>
                        </select>
                    </div>
                    <!-- STATUS END -->

                    <!-- STATUS START -->
                    <div class="select-box py-2 px-0 mr-3">
                        <?php if (isset($component)) { $__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad = $component; } ?>
<?php $component = App\View\Components\Forms\Label::resolve(['fieldLabel' => __('modules.projects.milestones'),'fieldId' => 'milestone_id'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Label::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad)): ?>
<?php $component = $__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad; ?>
<?php unset($__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad); ?>
<?php endif; ?>
                        <select class="form-control select-picker" id="milestone_id" data-live-search="true" data-container="body" data-size="8">
                            <option value="all"><?php echo app('translator')->get('app.all'); ?></option>
                            <?php $__currentLoopData = $project->milestones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $milestone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($milestone->id); ?>"><?php echo e($milestone->milestone_title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <!-- STATUS END -->


                    <!-- SEARCH BY TASK START -->
                    <div class="select-box py-2 px-lg-2 px-md-2 px-0 mr-3">
                        <?php if (isset($component)) { $__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad = $component; } ?>
<?php $component = App\View\Components\Forms\Label::resolve(['fieldId' => 'status'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Label::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad)): ?>
<?php $component = $__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad; ?>
<?php unset($__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad); ?>
<?php endif; ?>
                        <div class="input-group bg-grey rounded">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-additional-grey">
                                    <i class="fa fa-search f-13 text-dark-grey"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control f-14 p-1 height-35 border" id="search-text-field"
                                placeholder="<?php echo app('translator')->get('app.startTyping'); ?>">
                        </div>
                    </div>
                    <!-- SEARCH BY TASK END -->

                    <!-- RESET START -->
                    <div class="select-box d-flex py-2 px-lg-2 px-md-2 px-0 mt-4">
                        <?php if (isset($component)) { $__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26 = $component; } ?>
<?php $component = App\View\Components\Forms\ButtonSecondary::resolve(['icon' => 'times-circle'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonSecondary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'btn-xs d-none height-35 mt-2','id' => 'reset-filters']); ?>
                            <?php echo app('translator')->get('app.clearFilters'); ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26)): ?>
<?php $component = $__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26; ?>
<?php unset($__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26); ?>
<?php endif; ?>
                    </div>
                    <!-- RESET END -->
                </div>
            </form>

            <?php if (isset($component)) { $__componentOriginal95e73aded82dd7c8c0f260f95142b37107c1ffe8 = $component; } ?>
<?php $component = App\View\Components\Datatable\Actions::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('datatable.actions'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Datatable\Actions::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mt-5']); ?>
                <div class="select-status mr-3 pl-3">
                    <select name="action_type" class="form-control select-picker" id="quick-action-type" disabled>
                        <option value=""><?php echo app('translator')->get('app.selectAction'); ?></option>
                        <option value="change-status"><?php echo app('translator')->get('modules.tasks.changeStatus'); ?></option>
                        <option value="delete"><?php echo app('translator')->get('app.delete'); ?></option>
                    </select>
                </div>
                <div class="select-status mr-3 d-none quick-action-field" id="change-status-action">
                    <select name="status" class="form-control select-picker">
                        <?php $__currentLoopData = $taskBoardStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($status->id); ?>"><?php echo e($status->slug == 'completed' || $status->slug == 'incomplete' ? __('app.' . $status->slug) : mb_ucwords($status->column_name)); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal95e73aded82dd7c8c0f260f95142b37107c1ffe8)): ?>
<?php $component = $__componentOriginal95e73aded82dd7c8c0f260f95142b37107c1ffe8; ?>
<?php unset($__componentOriginal95e73aded82dd7c8c0f260f95142b37107c1ffe8); ?>
<?php endif; ?>
        </div>


        <!-- Task Box Start -->
        <div class="d-flex flex-column w-tables rounded mt-3 bg-white">

            <?php echo $dataTable->table(['class' => 'table table-hover border-0 w-100']); ?>


        </div>
        <!-- Task Box End -->

    </div>

</div>
<!-- ROW END -->
<?php echo $__env->make('sections.datatable_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script>
    $('#allTasks-table').on('preXhr.dt', function(e, settings, data) {

        var projectID = "<?php echo e($project->id); ?>";
        var status = $('#status').val();
        var searchText = $('#search-text-field').val();
        var assignedTo = $('#assignedTo').val();
        var trashedData = "<?php echo e($project->trashed() == 1 ? 'true' : 'false'); ?>";
        var milestone_id = $('#milestone_id').val();
        data['projectId'] = projectID;
        data['status'] = status;
        data['assignedTo'] = assignedTo;
        data['searchText'] = searchText;
        data['trashedData'] = trashedData;
        data['milestone_id'] = milestone_id;
        data['project_admin'] = "<?php echo e(($project->project_admin == user()->id) ? 1 : 0); ?>";
    });
    const showTable = () => {
        window.LaravelDataTables["allTasks-table"].draw(false);
    }

    $('#status, #assignedTo, #milestone_id')
        .on('change keyup',
            function() {
                if ($('#status').val() != "not finished") {
                    $('#reset-filters').removeClass('d-none');
                    showTable();
                } else if ($('#assignedTo').val() != "all") {
                    $('#reset-filters').removeClass('d-none');
                    showTable();
                } else if ($('#milestone_id').val() != "all") {
                    $('#reset-filters').removeClass('d-none');
                    showTable();
                }else {
                    $('#reset-filters').addClass('d-none');
                    showTable();
                }
            });

    $('#search-text-field').on('keyup', function() {
        if ($('#search-text-field').val() != "") {
            $('#reset-filters').removeClass('d-none');
            showTable();
        }
    });

    $('#reset-filters,#reset-filters-2').click(function() {
        $('#filter-form')[0].reset();
        $('#filter-form #status').val('not finished');
        $('#filter-form .select-picker').selectpicker("refresh");
        $('#reset-filters').addClass('d-none');
        showTable();
    });

    $('body').on('click', '.delete-table-row', function() {
        var id = $(this).data('user-id');
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
                var url = "<?php echo e(route('tasks.destroy', ':id')); ?>";
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
                            showTable();
                        }
                    }
                });
            }
        });
    });

    $('#allTasks-table').on('change', '.change-status', function() {
        var url = "<?php echo e(route('tasks.change_status')); ?>";
        var token = "<?php echo e(csrf_token()); ?>";
        var id = $(this).data('task-id');
        var status = $(this).val();

        if (id != "" && status != "") {
            $.easyAjax({
                url: url,
                type: "POST",
                data: {
                    '_token': token,
                    taskId: id,
                    status: status,
                    sortBy: 'id'
                },
                success: function(data) {
                    window.LaravelDataTables["allTasks-table"].draw(false);
                }
            });

        }
    });


    $('#quick-action-type').change(function() {
        const actionValue = $(this).val();
        if (actionValue != '') {
            $('#quick-action-apply').removeAttr('disabled');

            if (actionValue == 'change-status') {
                $('.quick-action-field').addClass('d-none');
                $('#change-status-action').removeClass('d-none');
            } else {
                $('.quick-action-field').addClass('d-none');
            }
        } else {
            $('#quick-action-apply').attr('disabled', true);
            $('.quick-action-field').addClass('d-none');
        }
    });

    $('#quick-action-apply').click(function() {
        const actionValue = $('#quick-action-type').val();
        if (actionValue == 'delete') {
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
                    applyQuickAction();
                }
            });

        } else {
            applyQuickAction();
        }
    });

    const applyQuickAction = () => {
        var rowdIds = $("#allTasks-table input:checkbox:checked").map(function() {
            return $(this).val();
        }).get();

        var url = "<?php echo e(route('tasks.apply_quick_action')); ?>?row_ids=" + rowdIds;

        $.easyAjax({
            url: url,
            container: '#quick-action-form',
            type: "POST",
            disableButton: true,
            buttonSelector: "#quick-action-apply",
            data: $('#quick-action-form').serialize(),
            success: function(response) {
                if (response.status == 'success') {
                    showTable();
                    resetActionButtons();
                    deSelectAll();
                }
            }
        })
    };
</script>
<?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/projects/ajax/tasks.blade.php ENDPATH**/ ?>