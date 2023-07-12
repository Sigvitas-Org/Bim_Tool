<?php $__env->startPush('datatable-styles'); ?>
    <?php echo $__env->make('sections.datatable_css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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

        <!-- CATEGORY START -->
        <div class="select-box d-flex py-2 pr-2 border-right-grey border-right-grey-sm-0">
            <p class="mb-0 pr-3 f-14 text-dark-grey d-flex align-items-center">
                <?php echo app('translator')->get('modules.productCategory.productCategory'); ?></p>
            <div class="select-status d-flex">
                <select class="form-control select-picker" name="category_id" id="category_id">
                    <option value="all"><?php echo app('translator')->get('app.all'); ?></option>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->id); ?>"><?php echo e(mb_ucwords($category->category_name)); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
        <!-- CATEGORY END -->

        <!-- SUBCATEGORY START -->
        <div class="select-box d-flex py-2 px-lg-2 px-md-2 px-0 border-right-grey border-right-grey-sm-0">
            <p class="mb-0 pr-3 f-14 text-dark-grey d-flex align-items-center">
                <?php echo app('translator')->get('modules.productCategory.productSubCategory'); ?></p>
            <div class="select-status">
                <select class="form-control select-picker" name="sub_category" id="sub_category">
                    <option selected value="all"><?php echo app('translator')->get('app.all'); ?></option>
                </select>
            </div>
        </div>
        <!-- SUBCATEGORY END -->

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
$addProductPermission = user()->permission('add_product');
$addOrderPermission = user()->permission('add_order');
?>

<?php $__env->startSection('content'); ?>
    <!-- CONTENT WRAPPER START -->
    <div class="content-wrapper">
        <!-- Add Task Export Buttons Start -->

        <div class="d-flex justify-content-between action-bar">
            <div id="table-actions" class="flex-grow-1 align-items-center">
                <?php if($addProductPermission == 'all' || $addProductPermission == 'added'): ?>
                    <?php if (isset($component)) { $__componentOriginal7f662ecf9f97aca611d2405e5e6903e6081fbd17 = $component; } ?>
<?php $component = App\View\Components\Forms\LinkPrimary::resolve(['link' => route('products.create'),'icon' => 'plus'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.link-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\LinkPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-3 openRightModal float-left']); ?>
                        <?php echo app('translator')->get('app.add'); ?>
                        <?php echo app('translator')->get('app.product'); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7f662ecf9f97aca611d2405e5e6903e6081fbd17)): ?>
<?php $component = $__componentOriginal7f662ecf9f97aca611d2405e5e6903e6081fbd17; ?>
<?php unset($__componentOriginal7f662ecf9f97aca611d2405e5e6903e6081fbd17); ?>
<?php endif; ?>
                <?php endif; ?>
            </div>

            <?php if(in_array('client', user_roles()) && $addOrderPermission == 'all'): ?>
                <div class="btn-group" role="group">
                    <?php if (isset($component)) { $__componentOriginal7f662ecf9f97aca611d2405e5e6903e6081fbd17 = $component; } ?>
<?php $component = App\View\Components\Forms\LinkPrimary::resolve(['link' => route('products.cart'),'icon' => 'shopping-bag'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.link-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\LinkPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                        <?php echo app('translator')->get('app.cart'); ?> <span
                            class="badge badge-light ml-2 productCounter"><?php echo e(sizeof($productDetails)); ?></span>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7f662ecf9f97aca611d2405e5e6903e6081fbd17)): ?>
<?php $component = $__componentOriginal7f662ecf9f97aca611d2405e5e6903e6081fbd17; ?>
<?php unset($__componentOriginal7f662ecf9f97aca611d2405e5e6903e6081fbd17); ?>
<?php endif; ?>
                </div>
            <?php endif; ?>


            <?php if(!in_array('client', user_roles())): ?>
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
                            
                            <option value="change-purchase"><?php echo app('translator')->get('app.purchaseAllow'); ?></option>

                            <option value="delete"><?php echo app('translator')->get('app.delete'); ?></option>
                        </select>
                    </div>
                    <div class="select-status mr-3 d-none quick-action-field" id="change-status-action">
                        <select name="status" class="form-control select-picker">
                            <option value="1"><?php echo app('translator')->get('app.allowed'); ?></option>
                            <option value="0"><?php echo app('translator')->get('app.notAllowed'); ?></option>
                        </select>
                    </div>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal95e73aded82dd7c8c0f260f95142b37107c1ffe8)): ?>
<?php $component = $__componentOriginal95e73aded82dd7c8c0f260f95142b37107c1ffe8; ?>
<?php unset($__componentOriginal95e73aded82dd7c8c0f260f95142b37107c1ffe8); ?>
<?php endif; ?>
            <?php endif; ?>
        </div>

        <!-- Add Task Export Buttons End -->
        <!-- Task Box Start -->
        <div class="d-flex flex-column w-tables rounded mt-3 bg-white">

            <?php echo $dataTable->table(['class' => 'table table-hover border-0 w-100']); ?>


        </div>
        <!-- Task Box End -->
    </div>
    <!-- CONTENT WRAPPER END -->

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <?php echo $__env->make('sections.datatable_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script>
        var subCategories = <?php echo json_encode($subCategories, 15, 512) ?>;

        $('#category_id').change(function(e) {
            // get projects of selected users
            var opts = '';

            var subCategory = subCategories.filter(function(item) {
                return item.category_id == e.target.value
            });

            subCategory.forEach(project => {
                opts += `<option value='${project.id}'>${project.category_name}</option>`
            })

            $('#sub_category').html('<option value="all"><?php echo app('translator')->get("app.all"); ?></option>' + opts)
            $("#sub_category").selectpicker("refresh");
        });

        $('#products-table').on('preXhr.dt', function(e, settings, data) {
            var categoryID = $('#category_id').val();
            var subCategoryID = $('#sub_category').val();
            var searchText = $('#search-text-field').val();

            data['category_id'] = categoryID;
            data['sub_category_id'] = subCategoryID;
            data['searchText'] = searchText;
        });
        const showTable = () => {
            window.LaravelDataTables["products-table"].draw(false);
        }

        $('#category_id, #sub_category').on('change keyup', function() {
            if ($('#category_id').val() != "") {
                $('#reset-filters').removeClass('d-none');
                showTable();
            } else if ($('#sub_category').val() != "") {
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

            $('#category_id').val('all');
            $('.select-picker').val('all');

            $('#sub_category').html('<option value="all"><?php echo app('translator')->get("app.all"); ?></option>');

            $('.select-picker').selectpicker("refresh");
            $('#reset-filters').addClass('d-none');

            showTable();
        });

        $('#quick-action-type').change(function() {
            const actionValue = $(this).val();
            if (actionValue != '') {
                $('#quick-action-apply').removeAttr('disabled');

                if (actionValue == 'change-purchase') {
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
            var rowdIds = $("#products-table input:checkbox:checked").map(function() {
                return $(this).val();
            }).get();

            var url = "<?php echo e(route('products.apply_quick_action')); ?>?row_ids=" + rowdIds;

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

        $('body').on('click', '.productView', function() {
            let id = $(this).data('product-id');

            var url = "<?php echo e(route('products.show', ':id')); ?>";
            url = url.replace(':id', id);

            $(MODAL_DEFAULT + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_DEFAULT, url);
        });

        $('body').on('click', '.delete-table-row', function() {
            var id = $(this).data('product-id');
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
                    var url = "<?php echo e(route('products.destroy', ':id')); ?>";
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

        $('body').on('click', '.add-product', function() {
            let cartItems = [];
            var productId = $(this).data('product-id');
            let url = "<?php echo e(route('products.add_cart_item')); ?>";

            $.easyAjax({
                url: url,
                container: '.content-wrapper',
                type: "POST",
                data: {
                    'productID': productId,
                    '_token': "<?php echo e(csrf_token()); ?>"
                },
                success: function(response) {
                    cartItems = response.productItems;
                    $('.productCounter').html(cartItems.length);
                }
            })

        });

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/products/index.blade.php ENDPATH**/ ?>