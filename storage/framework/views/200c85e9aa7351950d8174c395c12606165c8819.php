<?php
$addDiscussionPermission = user()->permission('add_project_discussions');
$manageCategoryPermission = user()->permission('manage_discussion_category');
?>

<style>
    #discussion-table_wrapper .dt-buttons,
    #discussion-table thead {
        display: none !important;
    }

    #discussion-table tr:hover .message-action {
        visibility: visible;
    }

    .message-action {
        visibility: hidden;
    }

    .card:hover .message-action {
        visibility: visible;
    }

</style>

<!-- ROW START -->
<div class="row pb-5">
    <div class="col-lg-12 col-md-12 mb-4 mb-xl-0 mb-lg-4 mt-3 mt-lg-5 mt-md-5">
        <!-- Add Task Export Buttons Start -->
        <div class="d-flex" id="table-actions">
            <?php if(($addDiscussionPermission == 'all' || $addDiscussionPermission == 'added' || $project->project_admin == user()->id) && !$project->trashed()): ?>
                <?php if (isset($component)) { $__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480 = $component; } ?>
<?php $component = App\View\Components\Forms\ButtonPrimary::resolve(['icon' => 'plus'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-3 float-left','id' => 'add-discussion','data-redirect-url' => ''.e(route('projects.show', $project->id) . '?tab=discussion').'']); ?>
                    <?php echo app('translator')->get('app.new'); ?> <?php echo app('translator')->get('modules.projects.discussion'); ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480)): ?>
<?php $component = $__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480; ?>
<?php unset($__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480); ?>
<?php endif; ?>
            <?php endif; ?>

            <?php if($manageCategoryPermission == 'all'): ?>
                <?php if (isset($component)) { $__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26 = $component; } ?>
<?php $component = App\View\Components\Forms\ButtonSecondary::resolve(['icon' => 'cog'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonSecondary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-3 float-left','id' => 'discussion-category']); ?>
                    <?php echo app('translator')->get('modules.discussions.discussionCategory'); ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26)): ?>
<?php $component = $__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26; ?>
<?php unset($__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26); ?>
<?php endif; ?>
            <?php endif; ?>

        </div>
        <!-- Add Task Export Buttons End -->

        <form action="" id="filter-form">
            <div class="d-flex my-3">
                <!-- STATUS START -->
                <div class="select-box py-2 px-0 mr-3">
                    <?php if (isset($component)) { $__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad = $component; } ?>
<?php $component = App\View\Components\Forms\Label::resolve(['fieldLabel' => __('app.category'),'fieldId' => 'status'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                    <select class="form-control select-picker" name="discussion_category" id="discussion_category"
                        data-live-search="true" data-size="8">
                        <option value=""><?php echo app('translator')->get('app.all'); ?></option>
                        <?php $__currentLoopData = $discussionCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option
                                data-content="<i class='fa fa-circle mr-2' style='color: <?php echo e($item->color); ?>'></i> <?php echo e(mb_ucwords($item->name)); ?>"
                                value="<?php echo e($item->id); ?>"><?php echo e(mb_ucwords($item->name)); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <!-- STATUS END -->
            </div>
        </form>

        <!-- Task Box Start -->
        <div class="d-flex flex-column w-tables rounded mt-3 bg-white">

            <?php echo $dataTable->table(['class' => 'table table-hover border-0 w-100']); ?>


        </div>
        <!-- Task Box End -->
    </div>
</div>

<?php echo $__env->make('sections.datatable_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script>
    $('#discussion-table').on('preXhr.dt', function(e, settings, data) {

        var projectId = "<?php echo e($project->id); ?>";
        var categoryId = $('#discussion_category').val();

        data['project_id'] = projectId;
        data['category_id'] = categoryId;
    });

    const showTable = () => {
        window.LaravelDataTables["discussion-table"].draw(false);
    }

    $('#discussion_category').change(function() {
        showTable();
    });

    $('body').on('click', '.delete-discussion', function() {
        var id = $(this).data('discussion-id');
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
                var url = "<?php echo e(route('discussion.destroy', ':id')); ?>";
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
                            window.LaravelDataTables["discussion-table"].draw(false);
                        }
                    }
                });
            }
        });
    });


    $('body').on('click', '#discussion-category', function() {
        var url = "<?php echo e(route('discussion-category.create')); ?>";

        $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_LG, url);
    });

    $('body').on('click', '#add-discussion', function() {
        let redirectUrl = encodeURIComponent($(this).data("redirect-url"));
        var url = "<?php echo e(route('discussion.create')); ?>?id="+"<?php echo e($project->id); ?>&redirectUrl="+redirectUrl;

        $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_XL, url);
    });

    $('body').on('click', '.edit-category', function() {
        var categoryId = $(this).data('category-id');
        var url = "<?php echo e(route('discussion-category.edit', ':id')); ?>";
        url = url.replace(':id', categoryId);

        $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_LG, url);
    });

    $('body').on('click', '.add-reply', function() {
        var discussionId = $(this).data('discussion-id');
        var url = "<?php echo e(route('discussion-reply.create')); ?>?id=" + discussionId;

        $(MODAL_XL + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_XL, url);
    });

    $('body').on('click', '.edit-reply', function() {
        var id = $(this).data('row-id');
        var url = "<?php echo e(route('discussion-reply.edit', ':id')); ?>";
        url = url.replace(':id', id);

        $(MODAL_XL + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_XL, url);
    });

    $('body').on('click', '.set-best-answer', function() {
        var replyId = $(this).data('row-id');
        var type = 'set';
        var url = "<?php echo e(route('discussion.set_best_answer')); ?>";
        var token = "<?php echo e(csrf_token()); ?>";

        $.easyAjax({
            type: 'POST',
            url: url,
            container: '#right-modal-content',
            blockUI: true,
            data: {
                '_token': token,
                '_method': 'POST',
                'replyId': replyId,
                'type': type
            },
            success: function(response) {
                if (response.status == "success") {
                    $('#right-modal-content').html(response.html);
                }
            }
        });
    });

    $('body').on('click', '.unset-best-answer', function() {
        var replyId = $(this).data('reply-id');
        var type = 'unset';
        var url = "<?php echo e(route('discussion.set_best_answer')); ?>";
        var token = "<?php echo e(csrf_token()); ?>";

        $.easyAjax({
            type: 'POST',
            url: url,
            container: '#right-modal-content',
            blockUI: true,
            data: {
                '_token': token,
                '_method': 'POST',
                'replyId': replyId,
                'type': type
            },
            success: function(response) {
                if (response.status == "success") {
                    $('#right-modal-content').html(response.html);
                }
            }
        });
    });

    $('body').on('click', '.delete-message', function() {
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
                var url = "<?php echo e(route('discussion-reply.destroy', ':id')); ?>";
                url = url.replace(':id', id);

                var token = "<?php echo e(csrf_token()); ?>";

                $.easyAjax({
                    type: 'POST',
                    url: url,
                    container: '#right-modal-content',
                    blockUI: true,
                    data: {
                        '_token': token,
                        '_method': 'DELETE'
                    },
                    success: function(response) {
                        if (response.status == "success") {
                            $('#right-modal-content').html(response.html);
                        }
                    }
                });
            }
        });
    });


    $('.go-best-reply').click(function() {
        var replyId = $(this).data('reply-id');

        $('html, body').animate({
            scrollTop: $("#replyMessageBox_" + replyId).offset().top
        }, 1000);
    });

</script>
<?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/projects/ajax/discussion.blade.php ENDPATH**/ ?>