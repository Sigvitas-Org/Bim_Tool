<?php
$addDocumentPermission = user()->permission('add_documents');
$viewDocumentPermission = user()->permission('view_documents');
$deleteDocumentPermission = user()->permission('delete_documents');
$editDocumentPermission = user()->permission('edit_documents');
?>

<style>
    .file-action {
        visibility: hidden;
    }

    .file-card:hover .file-action {
        visibility: visible;
    }

</style>

<!-- TAB CONTENT START -->
<div class="tab-pane fade show active mt-5" role="tabpanel" aria-labelledby="nav-email-tab">
    <?php if (isset($component)) { $__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e = $component; } ?>
<?php $component = App\View\Components\Cards\Data::resolve(['title' => __('app.menu.documents')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Data::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

        <?php if($addDocumentPermission == 'all' || $addDocumentPermission == 'added'): ?>

            <div class="row">
                <div class="col-md-12">
                    <a class="f-15 f-w-500" href="javascript:;" id="add-task-file"><i
                            class="icons icon-plus font-weight-bold mr-1"></i><?php echo app('translator')->get('app.add'); ?>
                        <?php echo app('translator')->get('app.file'); ?></a>
                </div>
            </div>

            <?php if (isset($component)) { $__componentOriginal0777dca6b0ab2eebdcaf6ba884d5b30ab61203a6 = $component; } ?>
<?php $component = App\View\Components\Form::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Form::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'save-taskfile-data-form','class' => 'd-none']); ?>
                <input type="hidden" name="user_id" value="<?php echo e($employee->id); ?>">
                <div class="row">
                    <div class="col-md-12">
                        <?php if (isset($component)) { $__componentOriginal3985d2df1d9ef7c51070d7c0b8f4b0e4589145ab = $component; } ?>
<?php $component = App\View\Components\Forms\Text::resolve(['fieldLabel' => __('modules.projects.fileName'),'fieldName' => 'name','fieldRequired' => 'true','fieldId' => 'file_name'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                    <div class="col-md-12">
                        <?php if (isset($component)) { $__componentOriginaldaadf847fbf915f597d5e97d12ca0ad02b95e908 = $component; } ?>
<?php $component = App\View\Components\Forms\File::resolve(['fieldLabel' => __('modules.projects.uploadFile'),'fieldName' => 'file','fieldRequired' => 'true','fieldId' => 'employee_file','allowedFileExtensions' => 'txt pdf doc xls xlsx docx rtf png jpg jpeg','popover' => __('messages.fileFormat.multipleImageFile')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.file'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\File::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldaadf847fbf915f597d5e97d12ca0ad02b95e908)): ?>
<?php $component = $__componentOriginaldaadf847fbf915f597d5e97d12ca0ad02b95e908; ?>
<?php unset($__componentOriginaldaadf847fbf915f597d5e97d12ca0ad02b95e908); ?>
<?php endif; ?>
                    </div>
                    <div class="col-md-12">
                        <div class="w-100 justify-content-end d-flex mt-2">
                            <?php if (isset($component)) { $__componentOriginaldffecccc219bb81c1548bfa6ec1531014cb3bec8 = $component; } ?>
<?php $component = App\View\Components\Forms\ButtonCancel::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-cancel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonCancel::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'cancel-document','class' => 'border-0 mr-3']); ?><?php echo app('translator')->get('app.cancel'); ?>
                             <?php echo $__env->renderComponent(); ?>
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
<?php $component->withAttributes(['id' => 'submit-document']); ?><?php echo app('translator')->get('app.submit'); ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480)): ?>
<?php $component = $__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480; ?>
<?php unset($__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480); ?>
<?php endif; ?>
                        </div>
                    </div>
                </div>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0777dca6b0ab2eebdcaf6ba884d5b30ab61203a6)): ?>
<?php $component = $__componentOriginal0777dca6b0ab2eebdcaf6ba884d5b30ab61203a6; ?>
<?php unset($__componentOriginal0777dca6b0ab2eebdcaf6ba884d5b30ab61203a6); ?>
<?php endif; ?>
        <?php endif; ?>

        <div class="d-flex flex-wrap mt-3" id="task-file-list">
            <?php
                $totalDocuments = ($user->clientDocuments) ? count($user->clientDocuments) : 0;
                $permission = 0; // assuming we do have permission for all uploaded files
            ?>
            <?php $__empty_1 = true; $__currentLoopData = $employee->documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php if($viewDocumentPermission == 'all'
                || ($viewDocumentPermission == 'added' && $file->added_by == user()->id)
                || ($viewDocumentPermission == 'owned' && ($file->user_id == user()->id && $file->added_by != user()->id))
                || ($viewDocumentPermission == 'both' && ($file->added_by == user()->id || $file->user_id == user()->id))): ?>
                    <?php if (isset($component)) { $__componentOriginalac87ecae6c1a18a2d39c87478d8f3cd5131a5758 = $component; } ?>
<?php $component = App\View\Components\FileCard::resolve(['fileName' => $file->name,'dateAdded' => $file->created_at->diffForHumans()] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('file-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\FileCard::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                        <?php if($file->icon == 'images'): ?>
                            <img src="<?php echo e($file->doc_url); ?>">
                        <?php else: ?>
                            <i class="fa <?php echo e($file->icon); ?> text-lightest"></i>
                        <?php endif; ?>
                         <?php $__env->slot('action', null, []); ?> 
                            <div class="dropdown ml-auto file-action">
                                <button
                                    class="btn btn-lg f-14 p-0 text-lightest text-capitalize rounded  dropdown-toggle"
                                    type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-h"></i>
                                </button>

                                <div class="dropdown-menu dropdown-menu-right border-grey rounded b-shadow-4 p-0"
                                    aria-labelledby="dropdownMenuLink" tabindex="0">
                                    <?php if($viewDocumentPermission == 'all'
                                    || ($viewDocumentPermission == 'added' && $file->added_by == user()->id)
                                    || ($viewDocumentPermission == 'owned' && ($file->user_id == user()->id && $file->added_by != user()->id))
                                    || ($viewDocumentPermission == 'both' && ($file->added_by == user()->id || $file->user_id == user()->id))): ?>

                                        <a class="cursor-pointer d-block text-dark-grey f-13 pt-3 px-3 "
                                            target="_blank" href="<?php echo e($file->doc_url); ?>"><?php echo app('translator')->get('app.view'); ?></a>

                                        <a class="cursor-pointer d-block text-dark-grey f-13 py-3 px-3 "
                                            href="<?php echo e(route('employee-docs.download', md5($file->id))); ?>"><?php echo app('translator')->get('app.download'); ?></a>
                                    <?php endif; ?>

                                    <?php if($editDocumentPermission == 'all'
                                    || ($editDocumentPermission == 'added' && $file->added_by == user()->id)
                                    || ($editDocumentPermission == 'owned' && ($file->user_id == user()->id && $file->added_by != user()->id))
                                    || ($editDocumentPermission == 'both' && ($file->added_by == user()->id || $file->user_id == user()->id))): ?>
                                        <a class="cursor-pointer d-block text-dark-grey pb-3 f-13 px-3 edit-file"
                                            href="javascript:;" data-file-id="<?php echo e($file->id); ?>"><?php echo app('translator')->get('app.edit'); ?></a>
                                    <?php endif; ?>

                                    <?php if($deleteDocumentPermission == 'all'
                                    || ($deleteDocumentPermission == 'added' && $file->added_by == user()->id)
                                    || ($deleteDocumentPermission == 'owned' && ($file->user_id == user()->id && $file->added_by != user()->id))
                                    || ($deleteDocumentPermission == 'both' && ($file->added_by == user()->id || $file->user_id == user()->id))): ?>
                                        <a class="cursor-pointer d-block text-dark-grey f-13 pb-3 px-3 delete-file"
                                            data-row-id="<?php echo e($file->id); ?>"
                                            href="javascript:;"><?php echo app('translator')->get('app.delete'); ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                         <?php $__env->endSlot(); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalac87ecae6c1a18a2d39c87478d8f3cd5131a5758)): ?>
<?php $component = $__componentOriginalac87ecae6c1a18a2d39c87478d8f3cd5131a5758; ?>
<?php unset($__componentOriginalac87ecae6c1a18a2d39c87478d8f3cd5131a5758); ?>
<?php endif; ?>
                <?php else: ?>
                    <?php
                        $permission++;
                    ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="align-items-center d-flex flex-column text-lightest p-20 w-100">
                    <i class="fa fa-file f-21 w-100"></i>

                    <div class="f-15 mt-4">
                        - <?php echo app('translator')->get('messages.noFileUploaded'); ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if(isset($user->clientDocuments) && $totalDocuments > 0 && $totalDocuments == $permission): ?>
                <div class="align-items-center d-flex flex-column text-lightest p-20 w-100">
                    <i class="fa fa-file-excel f-21 w-100"></i>

                    <div class="f-15 mt-4">
                        - <?php echo app('translator')->get('messages.noFileUploaded'); ?> -
                    </div>
                </div>
            <?php endif; ?>
        </div>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e)): ?>
<?php $component = $__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e; ?>
<?php unset($__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e); ?>
<?php endif; ?>
</div>
<!-- TAB CONTENT END -->

<script>
    $('#add-task-file').click(function() {
        $(this).closest('.row').addClass('d-none');
        $('#save-taskfile-data-form').removeClass('d-none');
    });

    $('body').on('click', '.edit-file', function() {
        var fileId = $(this).data('file-id');
        var url = "<?php echo e(route('employee-docs.edit', ':id')); ?>";
        url = url.replace(':id', fileId);

        $(MODAL_DEFAULT + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_DEFAULT, url);
    });

    $('#cancel-document').click(function() {
        $('#save-taskfile-data-form').addClass('d-none');
        $('#add-task-file').closest('.row').removeClass('d-none');
    });

    $('#submit-document').click(function() {
        var url = "<?php echo e(route('employee-docs.store')); ?>";

        $.easyAjax({
            url: url,
            container: '#save-taskfile-data-form',
            type: "POST",
            disableButton: true,
            buttonSelector: "#submit-document",
            file: true,
            data: $('#editSettings').serialize(),
            success: function(response) {
                if (response.status == 'success') {
                    $('#task-file-list').html(response.view);
                    $('#save-taskfile-data-form')[0].reset();
                    $(".dropify-clear").trigger("click");
                    $('.invalid-feedback').addClass('d-none');
                }
            }
        })
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
                var url = "<?php echo e(route('employee-docs.destroy', ':id')); ?>";
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
                            $('#task-file-list').html(response.view);
                        }
                    }
                });
            }
        });
    });
</script>
<?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/employees/ajax/documents.blade.php ENDPATH**/ ?>