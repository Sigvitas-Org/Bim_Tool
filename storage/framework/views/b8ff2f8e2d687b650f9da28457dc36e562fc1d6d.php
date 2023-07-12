<!-- TAB CONTENT START -->
<div class="tab-pane fade show active" role="tabpanel" aria-labelledby="nav-email-tab">

    <div class="d-flex flex-wrap p-20">
        <?php $__empty_1 = true; $__currentLoopData = $task->history; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activ): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="card file-card w-100 rounded-0 border-0 comment">
                <div class="card-horizontal">
                    <div class="card-img my-1 ml-0">
                        <img src="<?php echo e($activ->user->image_url); ?>" alt="<?php echo e(mb_ucwords($activ->user->name)); ?>">
                    </div>
                    <div class="card-body border-0 pl-0 py-1 mb-2">
                        <div class="d-flex flex-grow-1">
                            <h4 class="card-title f-12 font-weight-normal text-dark mr-3 mb-1">
                                <?php echo e(__('modules.tasks.' . $activ->details)); ?> <a
                                    href="<?php echo e(route('employees.show', $activ->user_id)); ?>"
                                    class="text-darkest-grey"><?php echo e(mb_ucwords($activ->user->name)); ?></a>
                            </h4>
                        </div>
                        <div class="card-text f-11 text-lightest text-justify">
                            <?php if(!is_null($activ->sub_task_id)): ?>
                                <span class="text-primary"><?php echo e($activ->subTask->title); ?></span>
                            <?php elseif(!is_null($activ->board_column_id)): ?>
                                <span class="badge badge-primary" style="background-color: <?php echo e($activ->boardColumn->label_color); ?>"><?php echo e($activ->boardColumn->column_name); ?></span>
                            <?php endif; ?>

                            <span class="f-11 text-lightest">
                                <?php echo e($activ->created_at->timezone(company()->timezone)->format(company()->date_format) . ' ' . $activ->created_at->timezone(company()->timezone)->format(company()->time_format)); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <?php if (isset($component)) { $__componentOriginaldd4a3acb850ed912fbb4dfa63003ef1bff802c33 = $component; } ?>
<?php $component = App\View\Components\Cards\NoRecord::resolve(['icon' => 'history','message' => __('messages.noRecordFound')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/tasks/ajax/history.blade.php ENDPATH**/ ?>