<?php
$addProjectMemberPermission = user()->permission('add_project_members');
$viewProjectMemberPermission = user()->permission('view_project_members');
$editProjectMemberPermission = user()->permission('edit_project_members');
$deleteProjectMemberPermission = user()->permission('delete_project_members');
$viewProjectHourlyRatePermission = user()->permission('view_project_hourly_rates');
?>

<!-- ROW START -->
<div class="row py-5">
    <div class="col-lg-12 col-md-12 mb-4 mb-xl-0 mb-lg-4">
        <?php if(($addProjectMemberPermission == 'all' || $addProjectMemberPermission == 'added' || $project->project_admin == user()->id) && !$project->trashed()): ?>
            <?php if (isset($component)) { $__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480 = $component; } ?>
<?php $component = App\View\Components\Forms\ButtonPrimary::resolve(['icon' => 'plus'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'add-project-member','class' => 'type-btn mb-3']); ?>
                <?php echo app('translator')->get('modules.projects.addMemberTitle'); ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480)): ?>
<?php $component = $__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480; ?>
<?php unset($__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480); ?>
<?php endif; ?>
        <?php endif; ?>

        <?php if($viewProjectMemberPermission == 'all'): ?>
            <?php if (isset($component)) { $__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e = $component; } ?>
<?php $component = App\View\Components\Cards\Data::resolve(['title' => __('modules.projects.members'),'otherClasses' => 'border-0 p-0 d-flex justify-content-between align-items-center table-responsive-sm'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Data::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <?php if (isset($component)) { $__componentOriginale53a9d2e6d6c51019138cc2fcd3ba8ac893391c6 = $component; } ?>
<?php $component = App\View\Components\Table::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Table::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'border-0 pb-3 admin-dash-table table-hover']); ?>

                     <?php $__env->slot('thead', null, []); ?> 
                        <th class="pl-20">#</th>
                        <th><?php echo app('translator')->get('app.name'); ?></th>
                        <?php if($viewProjectHourlyRatePermission == 'all'): ?>
                            <th><?php echo app('translator')->get('modules.employees.hourlyRate'); ?></th>
                        <?php endif; ?>
                        <th><?php echo app('translator')->get('app.role'); ?> <i class="fa fa-question-circle" data-toggle="popover" data-placement="top" data-content="<?php echo app('translator')->get('modules.projects.projectAdminInfo'); ?>" data-html="true" data-trigger="hover"></i></th>
                        <th class="text-right pr-20"><?php echo app('translator')->get('app.action'); ?></th>
                     <?php $__env->endSlot(); ?>

                    <?php $__empty_1 = true; $__currentLoopData = $project->members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr id="row-<?php echo e($member->id); ?>">
                            <td class="pl-20"><?php echo e($key + 1); ?></td>
                            <td>
                                <?php if (isset($component)) { $__componentOriginal1c46ebe885e3c4421e9977d656c777b9bed6c39a = $component; } ?>
<?php $component = App\View\Components\Employee::resolve(['user' => $member->user] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('employee'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Employee::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1c46ebe885e3c4421e9977d656c777b9bed6c39a)): ?>
<?php $component = $__componentOriginal1c46ebe885e3c4421e9977d656c777b9bed6c39a; ?>
<?php unset($__componentOriginal1c46ebe885e3c4421e9977d656c777b9bed6c39a); ?>
<?php endif; ?>
                            </td>
                            <?php if($viewProjectHourlyRatePermission == 'all'): ?>
                                <td>
                                    <?php if($editProjectMemberPermission == 'all'): ?>
                                        <input type="number" min="0" step=".01"
                                            class="height-35 f-14 p-2 border rounded change-hourly-rate form-control"
                                            value="<?php echo e($member->hourly_rate); ?>" data-row-id="<?php echo e($member->id); ?>">
                                    <?php else: ?>
                                        <?php echo e($member->hourly_rate); ?>

                                    <?php endif; ?>
                                </td>
                            <?php endif; ?>
                            <td>
                                <?php if($editProjectMemberPermission == 'all'): ?>
                                    <?php if (isset($component)) { $__componentOriginald8738d15765d6b35d603018b407a63f14ee18785 = $component; } ?>
<?php $component = App\View\Components\Forms\Radio::resolve(['fieldId' => 'project_admin_'.e($member->user->id).'','fieldLabel' => __('app.projectAdmin'),'fieldName' => 'project_admin','fieldValue' => ''.e($member->user->id).'','checked' => ($member->user->id == $project->project_admin) ? 'checked' : ''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.radio'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Radio::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'assign_role','data-user-id' => ''.e($member->user->id).'']); ?>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald8738d15765d6b35d603018b407a63f14ee18785)): ?>
<?php $component = $__componentOriginald8738d15765d6b35d603018b407a63f14ee18785; ?>
<?php unset($__componentOriginald8738d15765d6b35d603018b407a63f14ee18785); ?>
<?php endif; ?>
                                <?php elseif($member->user->id == $project->project_admin): ?>
                                    <?php echo app('translator')->get('app.projectAdmin'); ?>
                                <?php else: ?>
                                    --
                                <?php endif; ?>

                            </td>
                            <td class="text-right pr-20">
                                <?php if($member->user->id == $project->project_admin
                                && $editProjectMemberPermission == 'all'): ?>
                                    <?php if (isset($component)) { $__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26 = $component; } ?>
<?php $component = App\View\Components\Forms\ButtonSecondary::resolve(['icon' => 'times'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonSecondary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['data-row-id' => ''.e($member->id).'','class' => 'remove-admin']); ?>
                                        <?php echo app('translator')->get('app.remove'); ?> <?php echo app('translator')->get('app.projectAdmin'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26)): ?>
<?php $component = $__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26; ?>
<?php unset($__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26); ?>
<?php endif; ?>
                                <?php endif; ?>

                                <?php if($deleteProjectMemberPermission == 'all'): ?>
                                    <?php if (isset($component)) { $__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26 = $component; } ?>
<?php $component = App\View\Components\Forms\ButtonSecondary::resolve(['icon' => 'trash'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonSecondary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['data-row-id' => ''.e($member->id).'','class' => 'delete-row']); ?>
                                        <?php echo app('translator')->get('app.delete'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26)): ?>
<?php $component = $__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26; ?>
<?php unset($__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26); ?>
<?php endif; ?>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="5">
                                <?php if (isset($component)) { $__componentOriginaldd4a3acb850ed912fbb4dfa63003ef1bff802c33 = $component; } ?>
<?php $component = App\View\Components\Cards\NoRecord::resolve(['icon' => 'user','message' => __('messages.noMemberAddedToProject')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                            </td>
                        </tr>
                    <?php endif; ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale53a9d2e6d6c51019138cc2fcd3ba8ac893391c6)): ?>
<?php $component = $__componentOriginale53a9d2e6d6c51019138cc2fcd3ba8ac893391c6; ?>
<?php unset($__componentOriginale53a9d2e6d6c51019138cc2fcd3ba8ac893391c6); ?>
<?php endif; ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e)): ?>
<?php $component = $__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e; ?>
<?php unset($__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e); ?>
<?php endif; ?>
        <?php endif; ?>
    </div>

</div>
<!-- ROW END -->

<script>

    $(document).ready(function () {
        setTimeout(function () {
            $('[data-toggle="popover"]').popover();
        }, 500);
    });

    $('#add-project-member').click(function() {
        const url = "<?php echo e(route('project-members.create')); ?>" + "?id=<?php echo e($project->id); ?>";
        $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_LG, url);

    });

    $('.delete-row').click(function() {

        var id = $(this).data('row-id');
        var url = "<?php echo e(route('project-members.destroy', ':id')); ?>";
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
                        '_token': token,
                        '_method': 'DELETE'
                    },
                    success: function(response) {
                        if (response.status == "success") {
                            $('#row-' + id).fadeOut();
                        }
                    }
                });
            }
        });

    });


    $('.change-hourly-rate').blur(function() {
        let id = $(this).data('row-id');
        let value = $(this).val();

        var url = "<?php echo e(route('project-members.update', ':id')); ?>";
        url = url.replace(':id', id);

        var token = "<?php echo e(csrf_token()); ?>";

        $.easyAjax({
            url: url,
            container: '#row-' + id,
            type: "POST",
            blockUI: true,
            data: {
                'hourly_rate': value,
                '_token': token,
                '_method': 'PUT'
            }
        });
    });


    $('body').on('click', '.assign_role', function() {
        var userId = $(this).data('user-id');
        var projectId = '<?php echo e($project->id); ?>';
        var token = "<?php echo e(csrf_token()); ?>";

        $.easyAjax({
            url: "<?php echo e(route('projects.assign_project_admin')); ?>",
            type: "POST",
            data: {
                userId: userId,
                projectId: projectId,
                _token: token
            },
            blockUI: true,
            container: '.admin-dash-table',
            success: function(response) {
                if (response.status == "success") {
                    window.location.reload();
                }
            }
        });
    });

    $('body').on('click', '.remove-admin', function() {
        var userId = null;
        var projectId = '<?php echo e($project->id); ?>';
        var token = "<?php echo e(csrf_token()); ?>";

        $.easyAjax({
            url: "<?php echo e(route('projects.assign_project_admin')); ?>",
            type: "POST",
            data: {
                userId: userId,
                projectId: projectId,
                _token: token
            },
            success: function(response) {
                if (response.status == "success") {
                    window.location.reload();
                }
            }
        });

    });
</script>
<?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/projects/ajax/members.blade.php ENDPATH**/ ?>