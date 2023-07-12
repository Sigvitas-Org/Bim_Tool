<?php
$managePermission = user()->permission('view_appreciation');
$addAppreciationPermission = user()->permission('add_appreciation');
$editAppreciationPermission = user()->permission('edit_appreciation');
$deleteAppreciationPermission = user()->permission('delete_appreciation');
$showAppreciationPermission = user()->permission('view_appreciation');
?>
<!-- TAB CONTENT START -->
<div class="tab-pane fade show active mt-5" role="tabpanel" aria-labelledby="nav-email-tab">

    <?php if($addAppreciationPermission == 'all'): ?>
        <div class="d-flex justify-content-between action-bar mb-3">
            <?php if (isset($component)) { $__componentOriginal7f662ecf9f97aca611d2405e5e6903e6081fbd17 = $component; } ?>
<?php $component = App\View\Components\Forms\LinkPrimary::resolve(['link' => route('appreciations.create').'?empid='.$employee->id,'icon' => 'plus'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.link-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\LinkPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['data-redirect-url' => ''.e(url()->full()).'','class' => 'mr-3 openRightModal float-left']); ?>
                <?php echo app('translator')->get('app.add'); ?> <?php echo app('translator')->get('modules.appreciations.appreciation'); ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7f662ecf9f97aca611d2405e5e6903e6081fbd17)): ?>
<?php $component = $__componentOriginal7f662ecf9f97aca611d2405e5e6903e6081fbd17; ?>
<?php unset($__componentOriginal7f662ecf9f97aca611d2405e5e6903e6081fbd17); ?>
<?php endif; ?>
        </div>
    <?php endif; ?>

    <?php if (isset($component)) { $__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e = $component; } ?>
<?php $component = App\View\Components\Cards\Data::resolve(['title' => __('modules.appreciations.appreciation')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Data::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

        <div class="table-responsive">
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
                    <th><?php echo app('translator')->get('modules.appreciations.appreciationType'); ?></th>
                    <th><?php echo app('translator')->get('modules.appreciations.awardDate'); ?></th>
                    <th class="text-right"><?php echo app('translator')->get('app.action'); ?></th>
                 <?php $__env->endSlot(); ?>

               <?php $__empty_1 = true; $__currentLoopData = $appreciations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $count => $appreciation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="tableRow<?php echo e($appreciation->id); ?>">
                        <td>
                            <div class="position-relative d-flex">
                                <i class="bi bi-<?php echo e($appreciation->award->awardIcon->icon); ?> f-15 text-white position-absolute appreciation-icon"></i>
                                <i class="bi bi-hexagon-fill fs-40" style="color: <?php echo e($appreciation->award->color_code); ?>; font-size: 40px"></i>
                                <span class="align-self-center ml-2"><?php echo e(mb_ucwords($appreciation->award->title)); ?></span>
                            </div>

                        <td><?php echo e($appreciation->award_date->format($company->date_format)); ?></td>
                        <td class="text-right">
                            <?php if(($showAppreciationPermission == 'all' || ($showAppreciationPermission == 'added' && user()->id == $appreciation->added_by) || ($showAppreciationPermission == 'owned' && user()->id == $appreciation->award_to) || ($showAppreciationPermission == 'both' && ($appreciation->added_by == user()->id || user()->id == $appreciation->award_to)))
                                || ($editAppreciationPermission == 'all' || ($editAppreciationPermission == 'added' && user()->id == $appreciation->added_by) || ($editAppreciationPermission == 'owned' && user()->id == $appreciation->award_to) || ($editAppreciationPermission == 'both' && ($appreciation->added_by == user()->id || user()->id == $appreciation->award_to)))
                                 || ($deleteAppreciationPermission == 'all' || ($deleteAppreciationPermission == 'added' && user()->id == $appreciation->added_by) || ($deleteAppreciationPermission == 'owned' && user()->id == $appreciation->award_to) || ($deleteAppreciationPermission == 'both' && ($appreciation->added_by == user()->id || user()->id == $appreciation->award_to)))): ?>
                                <div class="task_view">
                                <div class="dropdown">
                                    <a class="task_view_more d-flex align-items-center justify-content-center dropdown-toggle" type="link"
                                        id="dropdownMenuLink-<?php echo e($count); ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-boundary="viewport">
                                        <i class="icon-options-vertical icons"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink-<?php echo e($count); ?>" tabindex="0">

                                        <?php if($showAppreciationPermission == 'all' || ($showAppreciationPermission == 'added' && user()->id == $appreciation->added_by) || ($showAppreciationPermission == 'owned' && user()->id == $appreciation->award_to) || ($showAppreciationPermission == 'both' && ($appreciation->added_by == user()->id || user()->id == $appreciation->award_to))): ?>
                                            <a class="dropdown-item openRightModal" href="<?php echo e(route('appreciations.show', $appreciation->id)); ?>">
                                                <i class="fa fa-eye mr-2"></i>
                                                <?php echo app('translator')->get('app.view'); ?>
                                            </a>
                                        <?php endif; ?>

                                        <?php if($editAppreciationPermission == 'all' || ($editAppreciationPermission == 'added' && user()->id == $appreciation->added_by) || ($editAppreciationPermission == 'owned' && user()->id == $appreciation->award_to) || ($editAppreciationPermission == 'both' && ($appreciation->added_by == user()->id || user()->id == $appreciation->award_to))): ?>
                                            <a class="dropdown-item openRightModal" data-redirect-url="<?php echo e(url()->full()); ?>" href="<?php echo e(route('appreciations.edit', $appreciation->id)); ?>">
                                                <i class="fa fa-edit mr-2"></i>
                                                <?php echo app('translator')->get('app.edit'); ?>
                                            </a>
                                        <?php endif; ?>
                                        <?php if($deleteAppreciationPermission == 'all' || ($deleteAppreciationPermission == 'added' && user()->id == $appreciation->added_by) || ($deleteAppreciationPermission == 'owned' && user()->id == $appreciation->award_to) || ($deleteAppreciationPermission == 'both' && ($appreciation->added_by == user()->id || user()->id == $appreciation->award_to))): ?>
                                            <a class="dropdown-item delete-table-row" data-redirect-url="<?php echo e(url()->full()); ?>" href="javascript:;" data-user-id="<?php echo e($appreciation->id); ?>">
                                                <i class="fa fa-trash mr-2"></i>
                                                <?php echo app('translator')->get('app.delete'); ?>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <?php else: ?>
                                -
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
    $('body').on('click', '.delete-table-row', function() {
        var id = $(this).data('user-id');
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
                var url = "<?php echo e(route('appreciations.destroy', ':id')); ?>";
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
                            window.location.reload();
                        }
                    }
                });
            }
        });
    });

</script>
<?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/employees/ajax/appreciations.blade.php ENDPATH**/ ?>