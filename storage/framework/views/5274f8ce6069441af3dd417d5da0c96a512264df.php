<?php
    $viewTaskFilePermission = user()->permission('view_task_files');
    $deleteTaskFilePermission = user()->permission('delete_task_files');
?>

<?php $__empty_1 = true; $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
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
<?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/tasks/files/show.blade.php ENDPATH**/ ?>