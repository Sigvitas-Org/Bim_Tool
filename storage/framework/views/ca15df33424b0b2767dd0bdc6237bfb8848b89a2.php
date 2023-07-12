<?php
$addTaskFilePermission = user()->permission('add_task_files');
$viewTaskFilePermission = user()->permission('view_task_files');
$deleteTaskFilePermission = user()->permission('delete_task_files');
?>

<link rel="stylesheet" href="<?php echo e(asset('vendor/css/dropzone.min.css')); ?>">
<style>
    .file-action {
        visibility: hidden;
    }

    .file-card:hover .file-action {
        visibility: visible;
    }

</style>

<!-- TAB CONTENT START -->
<div class="tab-pane fade show active" role="tabpanel" aria-labelledby="nav-email-tab">
    <?php if($addTaskFilePermission == 'all'
    || ($addTaskFilePermission == 'added' && $task->added_by == user()->id)
    || ($addTaskFilePermission == 'owned' && in_array(user()->id, $taskUsers))
    || ($addTaskFilePermission == 'both' && (in_array(user()->id, $taskUsers) || $task->added_by == user()->id))
    ): ?>
        <div class="p-20">

            <div class="row">
                <div class="col-md-12">
                    <a class="f-15 f-w-500" href="javascript:;" id="add-task-file"><i
                            class="icons icon-plus font-weight-bold mr-1"></i><?php echo app('translator')->get('modules.projects.uploadFile'); ?></a>
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
                <input type="hidden" name="task_id" value="<?php echo e($task->id); ?>">
                <div class="row">
                    <div class="col-md-12">
                        <?php if (isset($component)) { $__componentOriginal97f972d3036ec98e45782eab9a9572b3af7fcdb9 = $component; } ?>
<?php $component = App\View\Components\Forms\FileMultiple::resolve(['fieldLabel' => '','fieldName' => 'file[]','fieldId' => 'task-file-upload-dropzone'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.file-multiple'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\FileMultiple::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal97f972d3036ec98e45782eab9a9572b3af7fcdb9)): ?>
<?php $component = $__componentOriginal97f972d3036ec98e45782eab9a9572b3af7fcdb9; ?>
<?php unset($__componentOriginal97f972d3036ec98e45782eab9a9572b3af7fcdb9); ?>
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
<?php $component->withAttributes(['id' => 'cancel-taskfile','class' => 'border-0']); ?><?php echo app('translator')->get('app.cancel'); ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldffecccc219bb81c1548bfa6ec1531014cb3bec8)): ?>
<?php $component = $__componentOriginaldffecccc219bb81c1548bfa6ec1531014cb3bec8; ?>
<?php unset($__componentOriginaldffecccc219bb81c1548bfa6ec1531014cb3bec8); ?>
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
        </div>
    <?php endif; ?>

    <div class="d-flex flex-wrap p-20" id="task-file-list">
        <?php $__empty_1 = true; $__currentLoopData = $task->files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
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

                <?php if($viewTaskFilePermission == 'all' || ($viewTaskFilePermission == 'added' && $file->added_by == user()->id)): ?>
                     <?php $__env->slot('action', null, []); ?> 
                        <div class="dropdown ml-auto file-action">
                            <button class="btn btn-lg f-14 p-0 text-lightest text-capitalize rounded  dropdown-toggle"
                                type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ellipsis-h"></i>
                            </button>

                            <div class="dropdown-menu dropdown-menu-right border-grey rounded b-shadow-4 p-0"
                                aria-labelledby="dropdownMenuLink" tabindex="0">
                                <?php if($viewTaskFilePermission == 'all' || ($viewTaskFilePermission == 'added' && $file->added_by == user()->id)): ?>
                                    <?php if($file->icon = 'images'): ?>
                                        <a class="cursor-pointer d-block text-dark-grey f-13 pt-3 px-3 " target="_blank"
                                            href="<?php echo e($file->file_url); ?>"><?php echo app('translator')->get('app.view'); ?></a>
                                    <?php endif; ?>
                                    <a class="cursor-pointer d-block text-dark-grey f-13 py-3 px-3 "
                                        href="<?php echo e(route('task_files.download', md5($file->id))); ?>"><?php echo app('translator')->get('app.download'); ?></a>
                                <?php endif; ?>

                                <?php if($deleteTaskFilePermission == 'all' || ($deleteTaskFilePermission == 'added' && $file->added_by == user()->id)): ?>
                                    <a class="cursor-pointer d-block text-dark-grey f-13 pb-3 px-3 delete-file"
                                        data-row-id="<?php echo e($file->id); ?>" href="javascript:;"><?php echo app('translator')->get('app.delete'); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                     <?php $__env->endSlot(); ?>
                <?php endif; ?>

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

</div>
<!-- TAB CONTENT END -->

<script src="<?php echo e(asset('vendor/jquery/dropzone.min.js')); ?>"></script>
<script>
    $(document).ready(function() {
        var add_task_files = "<?php echo e($addTaskFilePermission); ?>";
        if (add_task_files == "all" || add_task_files == "added") {

            Dropzone.autoDiscover = false;
            taskDropzone = new Dropzone("div#task-file-upload-dropzone", {
                dictDefaultMessage: "<?php echo e(__('app.dragDrop')); ?>",
                url: "<?php echo e(route('task-files.store')); ?>",
                headers: {
                    'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                },
                paramName: "file",
                maxFilesize: DROPZONE_MAX_FILESIZE,
                maxFiles: 10,
                uploadMultiple: true,
                addRemoveLinks: true,
                parallelUploads: 10,
                acceptedFiles: DROPZONE_FILE_ALLOW,
                init: function() {
                    taskDropzone = this;
                }
            });
            taskDropzone.on('sending', function(file, xhr, formData) {
                var ids = "<?php echo e($task->id); ?>";
                formData.append('task_id', ids);
                $.easyBlockUI();
            });
            taskDropzone.on('uploadprogress', function() {
                $.easyBlockUI();
            });
            taskDropzone.on('completemultiple', function(file) {
                var taskView = JSON.parse(file[0].xhr.response).view;
                taskDropzone.removeAllFiles();
                $.easyUnblockUI();
                $('#task-file-list').html(taskView);
            });
        }

        $('#add-task-file').click(function() {
            $(this).closest('.row').addClass('d-none');
            $('#save-taskfile-data-form').removeClass('d-none');
        });

        $('#cancel-taskfile').click(function() {
            $('#save-taskfile-data-form').addClass('d-none');
            $('#add-task-file').closest('.row').removeClass('d-none');
            return false;
        });
    });
</script>
<?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/tasks/ajax/files.blade.php ENDPATH**/ ?>