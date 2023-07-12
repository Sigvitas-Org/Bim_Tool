<style>
    .suggest-colors a {
        border-radius: 4px;
        width: 30px;
        height: 30px;
        display: inline-block;
        margin-right: 10px;
        margin-bottom: 10px;
        text-decoration: none;
    }

</style>
<div class="modal-header">
    <h5 class="modal-title" id="modelHeading"><?php echo app('translator')->get('app.menu.taskLabel'); ?></h5>
    <button type="button"  class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">×</span></button>
</div>
<div class="modal-body">
    <?php if (isset($component)) { $__componentOriginale53a9d2e6d6c51019138cc2fcd3ba8ac893391c6 = $component; } ?>
<?php $component = App\View\Components\Table::resolve(['headType' => 'thead-light'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Table::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'table-bordered']); ?>
         <?php $__env->slot('thead', null, []); ?> 
            <th>#</th>
            <th><?php echo app('translator')->get('app.labelName'); ?></th>
            <th><?php echo app('translator')->get('app.description'); ?></th>
            <th><?php echo app('translator')->get('app.project'); ?></th>
            <th class="text-right"><?php echo app('translator')->get('app.action'); ?></th>
         <?php $__env->endSlot(); ?>

        <?php $__empty_1 = true; $__currentLoopData = $taskLabels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr id="label-<?php echo e($item->id); ?>">
                <td><?php echo e($key + 1); ?></td>
                <td data-row-id="<?php echo e($item->id); ?>" data-column="label_name" contenteditable="true">
                    <?php echo e(mb_ucwords($item->label_name)); ?>

                </td>
                <td data-row-id="<?php echo e($item->id); ?>" data-column="description" contenteditable="true"><?php echo e($item->description); ?>

                </td>
                <td data-row-id="<?php echo e($item->id); ?>" data-column="project">
                    <select class="form-control select-picker change-project" name="project" id="project_id"
                    data-live-search="true" data-size="8" data-label-id="<?php echo e($item->id); ?>">
                        <option value="">--</option>
                        <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option <?php if($project->id == $item->project_id): ?> selected <?php endif; ?> value="<?php echo e($project->id); ?>">
                                <?php echo e(mb_ucwords($project->project_name)); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </td>
                <td class="text-right">
                    <?php if(user()->permission('task_labels') == 'all'): ?>
                        <?php if (isset($component)) { $__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26 = $component; } ?>
<?php $component = App\View\Components\Forms\ButtonSecondary::resolve(['icon' => 'trash'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonSecondary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['data-label-id' => ''.e($item->id).'','class' => 'delete-label']); ?>
                            <?php echo app('translator')->get('app.delete'); ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26)): ?>
<?php $component = $__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26; ?>
<?php unset($__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26); ?>
<?php endif; ?>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <?php if (isset($component)) { $__componentOriginal5ed7b327672191bf848045ea30a08d86da076f8b = $component; } ?>
<?php $component = App\View\Components\Cards\NoRecordFoundList::resolve(['colspan' => '5'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.no-record-found-list'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\NoRecordFoundList::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5ed7b327672191bf848045ea30a08d86da076f8b)): ?>
<?php $component = $__componentOriginal5ed7b327672191bf848045ea30a08d86da076f8b; ?>
<?php unset($__componentOriginal5ed7b327672191bf848045ea30a08d86da076f8b); ?>
<?php endif; ?>
        <?php endif; ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale53a9d2e6d6c51019138cc2fcd3ba8ac893391c6)): ?>
<?php $component = $__componentOriginale53a9d2e6d6c51019138cc2fcd3ba8ac893391c6; ?>
<?php unset($__componentOriginale53a9d2e6d6c51019138cc2fcd3ba8ac893391c6); ?>
<?php endif; ?>

    <?php if (isset($component)) { $__componentOriginal0777dca6b0ab2eebdcaf6ba884d5b30ab61203a6 = $component; } ?>
<?php $component = App\View\Components\Form::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Form::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'createTaskLabelForm']); ?>
        <div class="row border-top-grey ">
            <div class="col-md-6">
                <?php if (isset($component)) { $__componentOriginal3985d2df1d9ef7c51070d7c0b8f4b0e4589145ab = $component; } ?>
<?php $component = App\View\Components\Forms\Text::resolve(['fieldId' => 'label_name','fieldLabel' => __('app.label') .' '. __('app.name'),'fieldName' => 'label_name','fieldRequired' => 'true','fieldPlaceholder' => __('placeholders.label')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Text::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3985d2df1d9ef7c51070d7c0b8f4b0e4589145ab)): ?>
<?php $component = $__componentOriginal3985d2df1d9ef7c51070d7c0b8f4b0e4589145ab; ?>
<?php unset($__componentOriginal3985d2df1d9ef7c51070d7c0b8f4b0e4589145ab); ?>
<?php endif; ?>
            </div>
            <div class="col-md-6">
                <?php if (isset($component)) { $__componentOriginal3985d2df1d9ef7c51070d7c0b8f4b0e4589145ab = $component; } ?>
<?php $component = App\View\Components\Forms\Text::resolve(['fieldId' => 'label_color','fieldLabel' => __('modules.sticky.colors'),'fieldName' => 'color','fieldRequired' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Text::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3985d2df1d9ef7c51070d7c0b8f4b0e4589145ab)): ?>
<?php $component = $__componentOriginal3985d2df1d9ef7c51070d7c0b8f4b0e4589145ab; ?>
<?php unset($__componentOriginal3985d2df1d9ef7c51070d7c0b8f4b0e4589145ab); ?>
<?php endif; ?>
            </div>
            <div class="col-md-6">
                <?php if (isset($component)) { $__componentOriginalaa9e2e00dcec6b58db49b9128f7191370bc93381 = $component; } ?>
<?php $component = App\View\Components\Forms\Select::resolve(['fieldId' => 'project_id','fieldLabel' => __('app.project'),'fieldName' => 'project_id','search' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    <option value="">--</option>
                    <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php if($project->id == $projectId): ?> selected <?php endif; ?> value="<?php echo e($project->id); ?>"><?php echo e($project->project_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalaa9e2e00dcec6b58db49b9128f7191370bc93381)): ?>
<?php $component = $__componentOriginalaa9e2e00dcec6b58db49b9128f7191370bc93381; ?>
<?php unset($__componentOriginalaa9e2e00dcec6b58db49b9128f7191370bc93381); ?>
<?php endif; ?>
                <input type="hidden" name="parent_project_id" value="<?php echo e($projectId); ?>">
            </div>
            <div class="col-sm-12 col-md-12">
                <?php if (isset($component)) { $__componentOriginal582987c8de0d25188b5e8e44b2a5588ebcdc0b11 = $component; } ?>
<?php $component = App\View\Components\Forms\Textarea::resolve(['fieldLabel' => __('app.description'),'fieldName' => 'description','fieldId' => 'description'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Textarea::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal582987c8de0d25188b5e8e44b2a5588ebcdc0b11)): ?>
<?php $component = $__componentOriginal582987c8de0d25188b5e8e44b2a5588ebcdc0b11; ?>
<?php unset($__componentOriginal582987c8de0d25188b5e8e44b2a5588ebcdc0b11); ?>
<?php endif; ?>
            </div>
            <div class="col-md-12">
                <div class="suggest-colors">
                    <a style="background-color: #0033CC" data-color="#0033CC" href="javascript:;">&nbsp;
                    </a><a style="background-color: #428BCA" data-color="#428BCA" href="javascript:;">&nbsp;
                    </a><a style="background-color: #CC0033" data-color="#CC0033" href="javascript:;">&nbsp;
                    </a><a style="background-color: #44AD8E" data-color="#44AD8E" href="javascript:;">&nbsp;
                    </a><a style="background-color: #A8D695" data-color="#A8D695" href="javascript:;">&nbsp;
                    </a><a style="background-color: #5CB85C" data-color="#5CB85C" href="javascript:;">&nbsp;
                    </a><a style="background-color: #69D100" data-color="#69D100" href="javascript:;">&nbsp;
                    </a><a style="background-color: #004E00" data-color="#004E00" href="javascript:;">&nbsp;
                    </a><a style="background-color: #34495E" data-color="#34495E" href="javascript:;">&nbsp;
                    </a><a style="background-color: #7F8C8D" data-color="#7F8C8D" href="javascript:;">&nbsp;
                    </a><a style="background-color: #A295D6" data-color="#A295D6" href="javascript:;">&nbsp;
                    </a><a style="background-color: #5843AD" data-color="#5843AD" href="javascript:;">&nbsp;
                    </a><a style="background-color: #8E44AD" data-color="#8E44AD" href="javascript:;">&nbsp;
                    </a><a style="background-color: #FFECDB" data-color="#FFECDB" href="javascript:;">&nbsp;
                    </a><a style="background-color: #AD4363" data-color="#AD4363" href="javascript:;">&nbsp;
                    </a><a style="background-color: #D10069" data-color="#D10069" href="javascript:;">&nbsp;
                    </a><a style="background-color: #FF0000" data-color="#FF0000" href="javascript:;">&nbsp;
                    </a><a style="background-color: #D9534F" data-color="#D9534F" href="javascript:;">&nbsp;
                    </a><a style="background-color: #D1D100" data-color="#D1D100" href="javascript:;">&nbsp;
                    </a><a style="background-color: #F0AD4E" data-color="#F0AD4E" href="javascript:;">&nbsp;
                    </a><a style="background-color: #AD8D43" data-color="#AD8D43" href="javascript:;">&nbsp;
                    </a>
                </div>
            </div>
            <input type="hidden" name="task_id" id="task_id" value="<?php echo e($taskId); ?>">
        </div>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0777dca6b0ab2eebdcaf6ba884d5b30ab61203a6)): ?>
<?php $component = $__componentOriginal0777dca6b0ab2eebdcaf6ba884d5b30ab61203a6; ?>
<?php unset($__componentOriginal0777dca6b0ab2eebdcaf6ba884d5b30ab61203a6); ?>
<?php endif; ?>
</div>
<div class="modal-footer">
    <?php if (isset($component)) { $__componentOriginaldffecccc219bb81c1548bfa6ec1531014cb3bec8 = $component; } ?>
<?php $component = App\View\Components\Forms\ButtonCancel::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-cancel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonCancel::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['data-dismiss' => 'modal','class' => 'border-0 mr-3']); ?><?php echo app('translator')->get('app.cancel'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldffecccc219bb81c1548bfa6ec1531014cb3bec8)): ?>
<?php $component = $__componentOriginaldffecccc219bb81c1548bfa6ec1531014cb3bec8; ?>
<?php unset($__componentOriginaldffecccc219bb81c1548bfa6ec1531014cb3bec8); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480 = $component; } ?>
<?php $component = App\View\Components\Forms\ButtonPrimary::resolve(['icon' => 'check'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'save-label']); ?><?php echo app('translator')->get('app.save'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480)): ?>
<?php $component = $__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480; ?>
<?php unset($__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480); ?>
<?php endif; ?>
</div>

<script>
    $('.suggest-colors a').click(function() {
        var color = $(this).data('color');
        $('#label_color').val(color);
        $('.asColorPicker-trigger span').css('background', color);
    });

    $(".select-picker").selectpicker();


    $('.delete-label').click(function() {
        var taskId = $('#task_id').val();
        var id = $(this).data('label-id');
        var url = "<?php echo e(route('task-label.destroy', ':id')); ?>";
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
                        'taskId': taskId,
                        '_token': token,
                        '_method': 'DELETE'
                    },
                    success: function(response) {
                        if (response.status == 'success') {
                            $('#label-'+id).remove();
                            $('#task_labels').html(response.data);
                            $('#task_labels').selectpicker('refresh');
                        }
                    }
                });
            }
        });

    });

    $('#save-label').click(function() {
        var url = "<?php echo e(route('task-label.store')); ?>";
        $.easyAjax({
            url: url,
            container: '#createTaskLabelForm',
            type: "POST",
            data: $('#createTaskLabelForm').serialize(),
            success: function(response) {
                if (response.status == 'success') {
                    $('#task_labels').html(response.data);
                    $('#task_labels').selectpicker('refresh');
                    $(MODAL_XL).modal('hide');
                }
            }
        })
    });

    $('[contenteditable=true]').focus(function() {
        $(this).data("initialText", $(this).html());
        let rowId = $(this).data('row-id');
    }).blur(function() {
        if ($(this).data("initialText") !== $(this).html()) {
            let id = $(this).data('row-id');
            let tableId = $(this).parent().attr('id');
            var url = "<?php echo e(route('task-label.update', ':id')); ?>";
            url = url.replace(':id', id);
            var token = "<?php echo e(csrf_token()); ?>";

            $('#'+tableId).each(function() {
                let labelName =  $(this).find("td:nth-child(2)").html();
                let description =  $(this).find("td:nth-child(3)").html();

                $.easyAjax({
                    url: url,
                    container: '#row-' + id,
                    type: "POST",
                    data: {
                        'label_name': labelName,
                        'description': description,
                        '_token': token,
                        '_method': 'PUT'
                    },
                    blockUI: true,
                    success: function(response) {
                        if (response.status == 'success') {
                            $('#task_labels').html(response.data);
                            $('#task_labels').selectpicker('refresh');

                        }
                    }
                })

            });

        }
    });

    $.fn.projectLabel = function(projectId){
        let id = projectId;

        if (id === '') {
            id = 0;
        }
        let url = "<?php echo e(route('projects.labels', ':id')); ?>";
        url = url.replace(':id', id);
        $.easyAjax({
            url: url,
            type: "GET",
            container: '#save-task-data-form',
            blockUI: true,
            redirect: true,
            success: function (data) {
                $('#task_labels').html(data.data);
                $('#task_labels').selectpicker('refresh');
            }
        })
    }

    $('#example').on('change keyup', '#project_id',function() {
        var id = $(this).data('label-id');
        var url = "<?php echo e(route('task-label.update', ':id')); ?>";
            url = url.replace(':id', id);
        var token = "<?php echo e(csrf_token()); ?>";
        var projectId = $(this).val();
        var taskId = $('#task_id').val();
        var labelId = $('#label_id').val();

        if (projectId === '') {
            projectId = 0;
        }

        if (id != "") {
            $.easyAjax({
                url: url,
                container: '#row-' + id,
                type: "POST",
                data: {
                    'task_id': taskId,
                    'label_id': id,
                    'project_id': projectId,
                    '_token': token,
                    '_method': 'PUT'
                },
                blockUI: true,
                success: function(response) {
                    if (response.status == 'success') {
                        $('#task_labels').html(response.data);
                        $('#task_labels').selectpicker('refresh');
                        $.fn.projectLabel(projectId);
                    }
                }
            })
        }

    });

</script>
<?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/tasks/create_label.blade.php ENDPATH**/ ?>