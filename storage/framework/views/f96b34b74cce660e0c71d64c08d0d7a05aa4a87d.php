<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('vendor/css/dropzone.min.css')); ?>">
    <style>
        .dropzone .dz-preview .dz-error-message {
            top: 150px !important;
        }

    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <!-- SETTINGS START -->
    <div class="w-100 d-flex ">

        <?php if (isset($component)) { $__componentOriginalf9dcf9e0132687b6b5d826e52f2f3d6c594b585b = $component; } ?>
<?php $component = App\View\Components\SettingSidebar::resolve(['activeMenu' => $activeSettingMenu] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('setting-sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SettingSidebar::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf9dcf9e0132687b6b5d826e52f2f3d6c594b585b)): ?>
<?php $component = $__componentOriginalf9dcf9e0132687b6b5d826e52f2f3d6c594b585b; ?>
<?php unset($__componentOriginalf9dcf9e0132687b6b5d826e52f2f3d6c594b585b); ?>
<?php endif; ?>

        <?php if (isset($component)) { $__componentOriginalb44089abe45f2c89173e85ef93b9bf2aa54af94e = $component; } ?>
<?php $component = App\View\Components\SettingCard::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('setting-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SettingCard::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
             <?php $__env->slot('header', null, []); ?> 
                <div class="s-b-n-header" id="tabs">
                    <h2 class="mb-0 p-20 f-21 font-weight-normal text-capitalize border-bottom-grey">
                        <?php echo app('translator')->get($pageTitle); ?></h2>
                </div>
             <?php $__env->endSlot(); ?>

            <div class="col-lg-12 col-md-12 ntfcn-tab-content-left w-100 p-4 ">
                <h4 class="f-21 font-weight-normal text-capitalize ">
                    <?php echo app('translator')->get('modules.moduleSettings.step1'); ?></h4>
                <div class="row">
                    <div class="col-sm-12">
                        <?php if (isset($component)) { $__componentOriginal97f972d3036ec98e45782eab9a9572b3af7fcdb9 = $component; } ?>
<?php $component = App\View\Components\Forms\FileMultiple::resolve(['fieldLabel' =>  __('messages.downloadFilefromCodecanyon') ,'fieldName' => 'file','fieldId' => 'file-upload-dropzone'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.file-multiple'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\FileMultiple::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-0 mr-lg-2 mr-md-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal97f972d3036ec98e45782eab9a9572b3af7fcdb9)): ?>
<?php $component = $__componentOriginal97f972d3036ec98e45782eab9a9572b3af7fcdb9; ?>
<?php unset($__componentOriginal97f972d3036ec98e45782eab9a9572b3af7fcdb9); ?>
<?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="col-md-12 " id="install-process"></div>

            <div class="col-lg-12 col-md-12 ntfcn-tab-content-left w-100 p-4 ">
                <h4 class="f-21 font-weight-normal text-capitalize">
                    <?php echo app('translator')->get('modules.moduleSettings.step2'); ?></h4>

                <p><?php echo app('translator')->get('modules.update.moduleFile'); ?></p>
            </div>
            <div class="col-md-12 mb-3">
                <ul class="list-group" id="files-list">
                    <?php $__currentLoopData = \Illuminate\Support\Facades\File::files($updateFilePath); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $filename): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(\Illuminate\Support\Facades\File::basename($filename) != 'modules_statuses.json' && strpos(\Illuminate\Support\Facades\File::basename($filename), 'auto') === false): ?>
                            <li class="list-group-item" id="file-<?php echo e($key + 1); ?>">
                                <div class="row">
                                    <div class="col-lg-6 py-1">
                                        <b><?php echo e(\Illuminate\Support\Facades\File::basename($filename)); ?></b>
                                    </div>

                                    <div class="col-lg-4 py-1 text-center f-12">
                                        <?php echo app('translator')->get('app.upload'); ?> <?php echo app('translator')->get('app.date'); ?>:
                                        <?php echo e(\Carbon\Carbon::parse(\Illuminate\Support\Facades\File::lastModified($filename))->timezone(global_setting()->timezone)->format('jS M, Y g:i A')); ?>

                                    </div>

                                    <div class="col-lg-2 text-lg-right py-1">
                                        <button type="button"
                                                class="btn btn-primary p-1 f-13 btn-sm mr-2 install-files"
                                                data-file-no="<?php echo e($key + 1); ?>"
                                                data-file-path="<?php echo e($filename); ?>"><?php echo app('translator')->get('modules.update.install'); ?> <i
                                                class="fa fa-download"></i>
                                        </button>

                                        <button type="button"
                                                class="btn btn-light f-13 btn-sm delete-files"
                                                data-file-no="<?php echo e($key + 1); ?>" data-toggle="tooltip"
                                                data-original-title="<?php echo app('translator')->get('app.delete'); ?>"
                                                data-file-path="<?php echo e($filename); ?>">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>

             <?php $__env->slot('action', null, []); ?> 
                <!-- Buttons Start -->
                <div class="w-100 border-top-grey">
                    <?php if (isset($component)) { $__componentOriginal698fd7a4bca51a1feab5ec62ef3754628de98690 = $component; } ?>
<?php $component = App\View\Components\SettingFormActions::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('setting-form-actions'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SettingFormActions::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                        <?php if (isset($component)) { $__componentOriginaldffecccc219bb81c1548bfa6ec1531014cb3bec8 = $component; } ?>
<?php $component = App\View\Components\Forms\ButtonCancel::resolve(['link' => route('custom-modules.index').'?tab=custom'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-cancel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonCancel::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'border-0']); ?>
                            <?php echo app('translator')->get('app.back'); ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldffecccc219bb81c1548bfa6ec1531014cb3bec8)): ?>
<?php $component = $__componentOriginaldffecccc219bb81c1548bfa6ec1531014cb3bec8; ?>
<?php unset($__componentOriginaldffecccc219bb81c1548bfa6ec1531014cb3bec8); ?>
<?php endif; ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal698fd7a4bca51a1feab5ec62ef3754628de98690)): ?>
<?php $component = $__componentOriginal698fd7a4bca51a1feab5ec62ef3754628de98690; ?>
<?php unset($__componentOriginal698fd7a4bca51a1feab5ec62ef3754628de98690); ?>
<?php endif; ?>
                    <div class="d-block d-lg-none d-md-none p-4">
                        <?php if (isset($component)) { $__componentOriginaldffecccc219bb81c1548bfa6ec1531014cb3bec8 = $component; } ?>
<?php $component = App\View\Components\Forms\ButtonCancel::resolve(['link' => route('custom-modules.index').'?tab=custom'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-cancel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonCancel::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-100 mt-3']); ?>
                            <?php echo app('translator')->get('app.cancel'); ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldffecccc219bb81c1548bfa6ec1531014cb3bec8)): ?>
<?php $component = $__componentOriginaldffecccc219bb81c1548bfa6ec1531014cb3bec8; ?>
<?php unset($__componentOriginaldffecccc219bb81c1548bfa6ec1531014cb3bec8); ?>
<?php endif; ?>
                    </div>
                </div>
                <!-- Buttons End -->
             <?php $__env->endSlot(); ?>

         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb44089abe45f2c89173e85ef93b9bf2aa54af94e)): ?>
<?php $component = $__componentOriginalb44089abe45f2c89173e85ef93b9bf2aa54af94e; ?>
<?php unset($__componentOriginalb44089abe45f2c89173e85ef93b9bf2aa54af94e); ?>
<?php endif; ?>

    </div>
    <!-- SETTINGS END -->

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('vendor/jquery/dropzone.min.js')); ?>"></script>
    <script>
        Dropzone.autoDiscover = false;
        $(document).ready(function () {
            const uploadFile = "<?php echo e(route('update-settings.store')); ?>?_token=<?php echo e(csrf_token()); ?>";
            const myDrop = new Dropzone("#file-upload-dropzone", {
                url: uploadFile,
                acceptedFiles: 'application/zip, application/x-zip-compressed, application/x-compressed, multipart/x-zip',
                addRemoveLinks: true
            });
            myDrop.on("complete", function (file) {
                if (myDrop.getRejectedFiles().length == 0) {
                    window.location.reload();
                }
            });
        });

        $('.install-files').click(function () {

            $('#install-process').html('<div class="alert alert-primary"><?php echo app('translator')->get("messages.installingUpdateMessage"); ?></div>');

            let filePath = $(this).data('file-path');
            $.easyAjax({
                type: 'POST',
                url: "<?php echo e(route('custom-modules.store')); ?>",
                blockUI: true,
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    filePath: filePath
                },
                success: function (response) {
                    $('#install-process').html('');

                    if (response.status === 'success') {
                        $('#install-process').html('<div class="alert alert-success">Your will be logged out soon. Login and visit <b>Custom modules main page</b> again page to activate it</div>');

                        setTimeout(function () {
                            window.location.reload();
                        }, 3000);
                    }

                    if (response.status === 'fail') {
                        $('#install-process').html(`<div class="alert alert-danger">${response.message}</div>`);
                    }
                }
            });
        });

        $('.delete-files').click(function () {
            let filePath = $(this).data('file-path');
            let fileNumber = $(this).data('file-no');

            Swal.fire({
                title: "<?php echo app('translator')->get('messages.sweetAlertTitle'); ?>",
                text: "<?php echo app('translator')->get('messages.removeFileText'); ?>",
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
                        url: "<?php echo e(route('update-settings.deleteFile')); ?>",
                        blockUI: true,
                        data: {
                            "_token": "<?php echo e(csrf_token()); ?>",
                            filePath: filePath
                        },
                        success: function (response) {
                            $('#file-' + fileNumber).remove();
                        }
                    });
                }
            });


        });

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/custom-modules/install.blade.php ENDPATH**/ ?>