<?php $__env->startPush('datatable-styles'); ?>
    <?php echo $__env->make('sections.datatable_css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <style>
        .filter-box {
            z-index: 2;
        }

    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('filter-section'); ?>
    <?php if (isset($component)) { $__componentOriginal8063c234a2d1e8800396f6cffced963918807943 = $component; } ?>
<?php $component = App\View\Components\Filters\FilterBox::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filters.filter-box'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Filters\FilterBox::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
        <!-- DATE START -->
        <div class="select-box d-flex py-2 px-lg-2 px-md-2 px-0 border-right-grey border-right-grey-sm-0">
            <p class="mb-0 pr-3 f-14 text-dark-grey d-flex align-items-center"><?php echo app('translator')->get('app.month'); ?></p>
            <div class="select-month">
                <select class="form-control select-picker" name="month" id="month" data-live-search="true" data-size="8">
                    <?php $__currentLoopData = $months; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $month): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php if($currentMonth == $loop->iteration): ?> selected <?php endif; ?> value="<?php echo e($loop->iteration); ?>"><?php echo e(ucfirst($month)); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
        <!-- MONTH END -->

        <!-- YEAR START -->
        <div class="select-box d-flex py-2 px-lg-2 px-md-2 px-0 border-right-grey border-right-grey-sm-0">
            <p class="mb-0 pr-3 f-14 text-dark-grey d-flex align-items-center"><?php echo app('translator')->get('app.year'); ?></p>
            <div class="select-year">
                <select class="form-control select-picker" name="year" id="year" data-live-search="true" data-size="8">
                    <?php $__currentLoopData = $years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php if($year == $currentYear): ?> selected <?php endif; ?>
                            value="<?php echo e($year); ?>"><?php echo e($year); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
        <!-- YEAR END -->

        <!-- SEARCH BY TASK START -->
        <div class="task-search d-flex  py-1 px-lg-3 px-0 border-right-grey align-items-center">
            <form class="w-100 mr-1 mr-lg-0 mr-md-1 ml-md-1 ml-0 ml-lg-0">
                <div class="input-group bg-grey rounded">
                    <div class="input-group-prepend">
                        <span class="input-group-text border-0 bg-additional-grey">
                            <i class="fa fa-search f-13 text-dark-grey"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control f-14 p-1 border-additional-grey" id="search-text-field"
                        placeholder="<?php echo app('translator')->get('app.startTyping'); ?>">
                </div>
            </form>
        </div>
        <!-- SEARCH BY TASK END -->

        <!-- RESET START -->
        <div class="select-box d-flex py-1 px-lg-2 px-md-2 px-0">
            <?php if (isset($component)) { $__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26 = $component; } ?>
<?php $component = App\View\Components\Forms\ButtonSecondary::resolve(['icon' => 'times-circle'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonSecondary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'btn-xs d-none','id' => 'reset-filters']); ?>
                <?php echo app('translator')->get('app.clearFilters'); ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26)): ?>
<?php $component = $__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26; ?>
<?php unset($__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26); ?>
<?php endif; ?>
        </div>
        <!-- RESET END -->
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8063c234a2d1e8800396f6cffced963918807943)): ?>
<?php $component = $__componentOriginal8063c234a2d1e8800396f6cffced963918807943; ?>
<?php unset($__componentOriginal8063c234a2d1e8800396f6cffced963918807943); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php
$addPermission = user()->permission('add_holiday');
?>

<?php $__env->startSection('content'); ?>
    <!-- CONTENT WRAPPER START -->
    <div class="content-wrapper">
        <!-- Add Task Export Buttons Start -->
        <div class="d-block d-lg-flex d-md-flex action-bar justify-content-between ">
            <div id="table-actions" class="flex-grow-1 align-items-center">
                <?php if($addPermission == 'all' || $addPermission == 'added'): ?>
                    <?php if (isset($component)) { $__componentOriginal7f662ecf9f97aca611d2405e5e6903e6081fbd17 = $component; } ?>
<?php $component = App\View\Components\Forms\LinkPrimary::resolve(['link' => route('holidays.create'),'icon' => 'plus'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.link-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\LinkPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-3 openRightModal float-left mb-2 mb-lg-0 mb-md-0']); ?>
                        <?php echo app('translator')->get('modules.holiday.addNewHoliday'); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7f662ecf9f97aca611d2405e5e6903e6081fbd17)): ?>
<?php $component = $__componentOriginal7f662ecf9f97aca611d2405e5e6903e6081fbd17; ?>
<?php unset($__componentOriginal7f662ecf9f97aca611d2405e5e6903e6081fbd17); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26 = $component; } ?>
<?php $component = App\View\Components\Forms\ButtonSecondary::resolve(['icon' => 'check'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonSecondary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-3 float-left mb-2 mb-lg-0 mb-md-0','id' => 'mark-holiday']); ?>
                        <?php echo app('translator')->get('modules.holiday.markSunday'); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26)): ?>
<?php $component = $__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26; ?>
<?php unset($__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26); ?>
<?php endif; ?>
                <?php endif; ?>
            </div>


            <?php if (isset($component)) { $__componentOriginal95e73aded82dd7c8c0f260f95142b37107c1ffe8 = $component; } ?>
<?php $component = App\View\Components\Datatable\Actions::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('datatable.actions'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Datatable\Actions::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <div class="select-status mr-3 pl-3">
                    <select name="action_type" class="form-control select-picker" id="quick-action-type" disabled>
                        <option value=""><?php echo app('translator')->get('app.selectAction'); ?></option>
                        <option value="delete"><?php echo app('translator')->get('app.delete'); ?></option>
                    </select>
                </div>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal95e73aded82dd7c8c0f260f95142b37107c1ffe8)): ?>
<?php $component = $__componentOriginal95e73aded82dd7c8c0f260f95142b37107c1ffe8; ?>
<?php unset($__componentOriginal95e73aded82dd7c8c0f260f95142b37107c1ffe8); ?>
<?php endif; ?>

            <div class="btn-group ml-3" role="group" aria-label="Basic example">
                <a href="<?php echo e(route('holidays.index')); ?>" class="btn btn-secondary f-14 btn-active" data-toggle="tooltip"
                    data-original-title="<?php echo app('translator')->get('modules.leaves.tableView'); ?>"><i class="side-icon bi bi-list-ul"></i></a>

                <a href="<?php echo e(route('holidays.calendar')); ?>" class="btn btn-secondary f-14" data-toggle="tooltip"
                    data-original-title="<?php echo app('translator')->get('app.menu.calendar'); ?>"><i class="side-icon bi bi-calendar"></i></a>
            </div>
        </div>

        <!-- holiday table Box Start -->
        <div class="d-flex flex-column w-tables rounded mt-3 bg-white">

            <?php echo $dataTable->table(['class' => 'table table-hover border-0 w-100']); ?>


        </div>
        <!-- leave table End -->

    </div>
    <!-- CONTENT WRAPPER END -->

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

    <?php echo $__env->make('sections.datatable_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script>
        $('#holiday-table').on('preXhr.dt', function(e, settings, data) {
            var month = $('#month').val();
            var year = $('#year').val();
            var searchText = $('#search-text-field').val();

            data['month'] = month;
            data['year'] = year;
            data['searchText'] = searchText;
        });

        const showTable = () => {
            window.LaravelDataTables["holiday-table"].draw(false);
        }

        $('#month, #year').on('change keyup',
            function() {
                if ($('#month').val() != "") {
                    $('#reset-filters').removeClass('d-none');
                    showTable();
                } else if ($('#year').val() != "") {
                    $('#reset-filters').removeClass('d-none');
                    showTable();
                } else {
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

        $('#reset-filters').click(function() {
            $('#filter-form')[0].reset();
            $('#month').val('<?php echo e($currentMonth); ?>');
            $('#year').val('<?php echo e($currentYear); ?>');
            $('.filter-box .select-picker').selectpicker("refresh");
            $('#reset-filters').addClass('d-none');
            showTable();
        });

        $('#quick-action-type').change(function() {
            const actionValue = $(this).val();

            if (actionValue != '') {
                $('#quick-action-apply').removeAttr('disabled');
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

        $('body').on('click', '.delete-table-row', function() {
            var id = $(this).data('holiday-id');
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
                    var url = "<?php echo e(route('holidays.destroy', ':id')); ?>";
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

        const applyQuickAction = () => {
            var rowdIds = $("#holiday-table input:checkbox:checked").map(function() {
                return $(this).val();
            }).get();

            var url = "<?php echo e(route('holidays.apply_quick_action')); ?>?row_ids=" + rowdIds;

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
                        $('#quick-action-form').addClass('d-none');
                    }
                }
            })
        };

        $('body').on('click', '.show-holiday', function() {
            var holidayId = $(this).data('holiday-id');

            var url = '<?php echo e(route('holidays.show', ':id')); ?>';
            url = url.replace(':id', holidayId);

            $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_LG, url);
        });

        $('body').on('click', '#mark-holiday', function() {
            var url = "<?php echo e(route('holidays.mark_holiday')); ?>?year" + $('#year').val();

            $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_LG, url);
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/holiday/index.blade.php ENDPATH**/ ?>