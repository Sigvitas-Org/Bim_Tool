<?php
    $deleteKnowledgebasePermission = user()->permission('delete_knowledgebase');
    $editKnowledgebasePermission = user()->permission('edit_knowledgebase');
    $addknowledgebasePermission = user()->permission('add_knowledgebase');
?>

<?php $__env->startSection('content'); ?>
    <!-- SETTINGS START -->
    <div class="w-100 d-flex ">

        <!-- SETTINGS SIDEBAR START -->
        <div class="mobile-close-overlay w-100 h-100" id="close-settings-overlay"></div>
        <div class="settings-sidebar bg-white py-3" id="mob-settings-sidebar">
            <a class="d-block d-lg-none close-it" id="close-settings"><i class="fa fa-times"></i></a>

            <!-- SETTINGS SEARCH START -->
            <form class="border-bottom-grey px-4 pb-3 d-flex">
                <div class="input-group rounded py-1 border-grey">
                    <div class="input-group-prepend">
                        <span class="input-group-text border-0 bg-white">
                            <i class="fa fa-search f-12 text-lightest"></i>
                        </span>
                    </div>
                    <input type="text" id="search-setting-menu" class="form-control border-0 f-14 pl-0"
                           placeholder="<?php echo app('translator')->get('app.search'); ?>">
                </div>
            </form>
            <!-- SETTINGS SEARCH END -->

            <!-- SETTINGS MENU START -->
            <ul class="settings-menu" id="settingsMenu">

                <?php if (isset($component)) { $__componentOriginalcd728ade001f05c9f58f8d190a481136e39bd167 = $component; } ?>
<?php $component = App\View\Components\SettingMenuItem::resolve(['active' => $activeMenu,'menu' => 'all_category','href' => route('knowledgebase.index'),'text' => __('app.all')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('setting-menu-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SettingMenuItem::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcd728ade001f05c9f58f8d190a481136e39bd167)): ?>
<?php $component = $__componentOriginalcd728ade001f05c9f58f8d190a481136e39bd167; ?>
<?php unset($__componentOriginalcd728ade001f05c9f58f8d190a481136e39bd167); ?>
<?php endif; ?>

                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if (isset($component)) { $__componentOriginalcd728ade001f05c9f58f8d190a481136e39bd167 = $component; } ?>
<?php $component = App\View\Components\SettingMenuItem::resolve(['active' => $activeMenu,'menu' => strtolower(str_replace(' ', '_', $item->name)),'href' => route('knowledgebase.index') . '?id=' . $item->id,'text' => $item->name] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('setting-menu-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SettingMenuItem::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('category-'.$item->id)]); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcd728ade001f05c9f58f8d190a481136e39bd167)): ?>
<?php $component = $__componentOriginalcd728ade001f05c9f58f8d190a481136e39bd167; ?>
<?php unset($__componentOriginalcd728ade001f05c9f58f8d190a481136e39bd167); ?>
<?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </ul>
            <!-- SETTINGS MENU END -->

        </div>
        <!-- SETTINGS SIDEBAR END -->

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
                <form action="" id="filter-form">
                    <div class="d-flex justify-conten mb-2">

                        <?php if($addknowledgebasePermission == 'all'): ?>
                            <div class="form-group flex-grow-1">
                                <?php if (isset($component)) { $__componentOriginal7f662ecf9f97aca611d2405e5e6903e6081fbd17 = $component; } ?>
<?php $component = App\View\Components\Forms\LinkPrimary::resolve(['link' => route('knowledgebase.create') . '?category=' . request('id'),'icon' => 'plus'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.link-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\LinkPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mb-2 openRightModal']); ?>
                                    <?php echo app('translator')->get('modules.knowledgeBase.addknowledgebase'); ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7f662ecf9f97aca611d2405e5e6903e6081fbd17)): ?>
<?php $component = $__componentOriginal7f662ecf9f97aca611d2405e5e6903e6081fbd17; ?>
<?php unset($__componentOriginal7f662ecf9f97aca611d2405e5e6903e6081fbd17); ?>
<?php endif; ?>

                                <?php if (isset($component)) { $__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26 = $component; } ?>
<?php $component = App\View\Components\Forms\ButtonSecondary::resolve(['icon' => 'plus'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonSecondary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'addCategory','class' => 'mr-3 mb-2 mb-lg-0']); ?>
                                    <?php echo app('translator')->get('modules.module.addknowledgebaseCategory'); ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26)): ?>
<?php $component = $__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26; ?>
<?php unset($__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26); ?>
<?php endif; ?>


                            </div>
                        <?php endif; ?>

                        <div class="form-group">
                            <div class="input-group bg-grey rounded border">
                                <div class="input-group-prepend">
                                    <span class="input-group-text border-0">
                                        <i class="fa fa-search f-13 text-dark-grey"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control height-35 f-14 p-1 border-additional-grey"
                                       id="search-text-field" placeholder="<?php echo app('translator')->get('app.startTyping'); ?>">
                            </div>
                        </div>
                        <?php if (isset($component)) { $__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26 = $component; } ?>
<?php $component = App\View\Components\Forms\ButtonSecondary::resolve(['icon' => 'times-circle'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonSecondary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'btn-xs d-none height-35 ml-2','id' => 'reset-filters']); ?>
                            <?php echo app('translator')->get('app.clearFilters'); ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26)): ?>
<?php $component = $__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26; ?>
<?php unset($__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26); ?>
<?php endif; ?>


                    </div>
                </form>
             <?php $__env->endSlot(); ?>

             <?php $__env->slot('header', null, []); ?> 
                <div class="s-b-n-header" id="tabs">
                    <h2 class="mb-0 p-20 f-21 font-weight-normal text-capitalize border-bottom-grey">
                        <?php echo app('translator')->get($pageTitle); ?></h2>
                </div>
             <?php $__env->endSlot(); ?>

            <div class="col-lg-12 col-md-12 ntfcn-tab-content-left w-100 p-4 ">
                <div class="table-responsive" id="know_data">
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
                            <th><?php echo app('translator')->get('modules.knowledgeBase.knowledgeHeading'); ?></th>
                            <th><?php echo app('translator')->get('modules.knowledgeBase.knowledgeCategory'); ?></th>
                            <th><?php echo app('translator')->get('app.to'); ?></th>
                            <th class="text-right"><?php echo app('translator')->get('app.action'); ?></th>
                         <?php $__env->endSlot(); ?>

                        <?php $__empty_1 = true; $__currentLoopData = $knowledgebases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($key + 1); ?></td>
                                <td>
                                    <a href="<?php echo e(route('knowledgebase.show', $item->id)); ?>"
                                       class="openRightModal text-darkest-grey d-block"><?php echo e($item->heading); ?></a>
                                </td>
                                <td><?php echo e(ucfirst($item->knowledgebasecategory->name)); ?></td>
                                <td><?php echo e(ucfirst($item->to)); ?></td>
                                <td class="text-right">
                                    <?php if($editKnowledgebasePermission == 'all' || ($editKnowledgebasePermission == 'added' && $item->added_by == user()->id)): ?>
                                        <div class="task_view">
                                            <a href="<?php echo e(route('knowledgebase.edit', $item->id)); ?>"
                                               class="task_view_more d-flex align-items-center justify-content-center openRightModal">
                                                <i class="fa fa-edit icons mr-2"></i> <?php echo app('translator')->get('app.edit'); ?>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($deleteKnowledgebasePermission == 'all' || ($deleteKnowledgebasePermission == 'added' && $item->added_by == user()->id)): ?>
                                        <div class="task_view ml-2">
                                            <a href="javascript:;" data-article-id="<?php echo e($item->id); ?>"
                                               class="task_view_more d-flex align-items-center justify-content-center delete-article">
                                                <i class="fa fa-trash icons mr-2"></i> <?php echo app('translator')->get('app.delete'); ?>
                                            </a>
                                        </div>
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
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
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
                </div>
            </div>
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
    <script>
        $('#search-text-field').on('change keyup', function () {
            if ($('#search-text-field').val() != "") {
                $('#reset-filters').removeClass('d-none');
            } else {
                $('#reset-filters').addClass('d-none');
            }
        });

        $('#reset-filters').click(function () {
            $('#filter-form')[0].reset();
            $('.select-picker').val('all');

            $('.select-picker').selectpicker("refresh");
            $('#reset-filters').addClass('d-none');

            showSearchData();
        });

        $('#quick-action-type').change(function () {
            const actionValue = $(this).val();
            if (actionValue != '') {
                $('#quick-action-apply').removeAttr('disabled');
            } else {
                $('#quick-action-apply').attr('disabled', true);
            }
        });

        function showSearchData() {
            const srch = $('#search-text-field').val();
            let url = "<?php echo e(route('knowledgebase.searchQuery', ':query')); ?>";
            url = url.replace(':query', srch);

            const token = "<?php echo e(csrf_token()); ?>";
            const categoryId = "<?php echo e(request()->id); ?>";

            $.easyAjax({
                type: 'GET',
                url: url,
                data: {
                    '_token': token,
                    'categoryId': categoryId
                },
                success: function (response) {
                    if (response.status == "success") {
                        $("#know_data").html(response.html);
                    }
                }
            });
        }

        $('#search-text-field').on('change keyup', function () {
            showSearchData();
        });


        $("#search-setting-menu").on("keyup", function () {
            var value = this.value.toLowerCase().trim();
            $("#settingsMenu li").show().filter(function () {
                return $(this).text().toLowerCase().trim().indexOf(value) == -1;
            }).hide();
        });

        $('body').on('click', '.delete-article', function () {
            var articleId = $(this).data('article-id');

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
                    var url = "<?php echo e(route('knowledgebase.destroy', ':id')); ?>";
                    url = url.replace(':id', articleId)

                    var token = "<?php echo e(csrf_token()); ?>";

                    $.easyAjax({
                        type: 'POST',
                        url: url,
                        data: {
                            '_token': token,
                            '_method': 'DELETE'
                        },
                        success: function (response) {
                            if (response.status === "success") {
                                window.location.reload();
                            }
                        }
                    });
                }
            });
        });

        $('#reset-filters').click(function () {
            $('#filter-form')[0].reset();
            $('.select-picker').val('all');

            $('.select-picker').selectpicker("refresh");
            $('#reset-filters').addClass('d-none');

            showSearchData();
        });

        $('#addCategory').click(function () {
            const url = "<?php echo e(route('knowledgebasecategory.create')); ?>";
            $(`${MODAL_LG} ${MODAL_HEADING}`).html('...');
            $.ajaxModal(MODAL_LG, url);
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/knowledge-base/index.blade.php ENDPATH**/ ?>