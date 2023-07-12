<?php $__env->startPush('styles'); ?>

    <?php echo $__env->make('sections.datatable_css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <style>
        .value-list li {
            list-style: disc;
        }
    </style>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <!-- SETTINGS START -->
    <div class="w-100 d-flex">

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
<?php $component->withAttributes(['id' => 'add-field','class' => 'mb-2']); ?> <?php echo app('translator')->get('modules.customFields.addField'); ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480)): ?>
<?php $component = $__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480; ?>
<?php unset($__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480); ?>
<?php endif; ?>
                    </div>
                </div>
             <?php $__env->endSlot(); ?>

             <?php $__env->slot('header', null, []); ?> 
                <div class="s-b-n-header" id="tabs">
                    <h2 class="mb-0 p-20 f-21 font-weight-normal text-capitalize border-bottom-grey">
                        <?php echo app('translator')->get($pageTitle); ?></h2>
                </div>
             <?php $__env->endSlot(); ?>

            <!-- LEAVE SETTING START -->
            <div class="col-lg-12 col-md-12 ntfcn-tab-content-left">
                <?php if (isset($component)) { $__componentOriginale53a9d2e6d6c51019138cc2fcd3ba8ac893391c6 = $component; } ?>
<?php $component = App\View\Components\Table::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Table::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'table w-100 table-sm-responsive']); ?>
                     <?php $__env->slot('thead', null, []); ?> 
                        <th>#</th>
                        <th><?php echo app('translator')->get('app.module'); ?></th>
                        <th><?php echo app('translator')->get('modules.customFields.label'); ?></th>
                        <th><?php echo app('translator')->get('app.name'); ?></th>
                        <th><?php echo app('translator')->get('modules.invoices.type'); ?></th>
                        <th><?php echo app('translator')->get('app.value'); ?></th>
                        <th><?php echo app('translator')->get('app.required'); ?></th>
                        <th class="text-right"><?php echo app('translator')->get('app.action'); ?></th>
                     <?php $__env->endSlot(); ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale53a9d2e6d6c51019138cc2fcd3ba8ac893391c6)): ?>
<?php $component = $__componentOriginale53a9d2e6d6c51019138cc2fcd3ba8ac893391c6; ?>
<?php unset($__componentOriginale53a9d2e6d6c51019138cc2fcd3ba8ac893391c6); ?>
<?php endif; ?>
            </div>
            <!-- LEAVE SETTING END -->

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

    <script src="<?php echo e(asset('vendor/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/datatables/dataTables.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/datatables/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/datatables/buttons.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/datatables/buttons.server-side.js')); ?>"></script>

    <script>

        $(function () {

            const table = $('#example').dataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: '<?php echo route('custom-fields.index'); ?>',
                order: [[0, "desc"]],
                deferRender: true,
                language: {
                    "url": "<?php echo e(__("app.datatable")); ?>"
                },
                "fnDrawCallback": function (oSettings) {
                    $("body").tooltip({
                        selector: '[data-toggle="tooltip"]'
                    });
                },
                columns: [
                    {data: 'id', name: 'id', orderable: true, searchable: false, visible: false},
                    {data: 'module', name: 'custom_field_groups.name', orderable: true, searchable: true},
                    {data: 'label', name: 'label', orderable: true, searchable: true},
                    {data: 'name', name: 'name', orderable: true, searchable: true},
                    {data: 'type', name: 'type', orderable: true, searchable: true},
                    {data: 'values', name: 'values', orderable: true, searchable: true},
                    {data: 'required', name: 'required', orderable: true, searchable: true},
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        width: "25%",
                        className: "text-right"
                    }
                ]
            });

            $('body').on('click', '.sa-params', function () {
                const id = $(this).data('user-id');

                Swal.fire({
                    title: "<?php echo app('translator')->get('messages.sweetAlertTitle'); ?>",
                    text: "<?php echo app('translator')->get('messages.deleteField'); ?>",
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

                        let url = "<?php echo e(route('custom-fields.destroy',':id')); ?>";
                        url = url.replace(':id', id);

                        const token = "<?php echo e(csrf_token()); ?>";

                        $.easyAjax({
                            type: 'POST',
                            url: url,
                            blockUI: true,
                            data: {'_token': token, '_method': 'DELETE'},
                            success: function (response) {
                                if (response.status == "success") {
                                    $.unblockUI();
                                    table._fnDraw();
                                }
                            }
                        });
                    }
                });
            });

        });

        $('body').on('click', '#add-field', function () {
            const url = "<?php echo e(route('custom-fields.create')); ?>";
            $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_LG, url);
        });

        $('body').on('click', '.edit-custom-field', function () {
            const id = $(this).data('user-id');
            let url = "<?php echo e(route('custom-fields.edit',':id')); ?>";
            url = url.replace(':id', id);
            $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_LG, url);
        });

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/custom-fields/index.blade.php ENDPATH**/ ?>