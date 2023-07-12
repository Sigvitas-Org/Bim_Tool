<?php
$editTimelogPermission = user()->permission('edit_timelogs');
$addTaskPermission = user()->permission('add_tasks');
?>
<div class="modal-header">
    <h5 class="modal-title" id="modelHeading"><?php echo app('translator')->get('modules.projects.activeTimers'); ?></h5>
    <button type="button"  class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">×</span></button>
</div>
<div class="modal-body py-0">
    <div class="row">
        <?php if(!is_null($myActiveTimer)): ?>
            <div class="col-lg-4 col-md-5 bg-additional-grey py-3" id="myActiveTimer">
                <h4 class="heading-h4"><?php echo app('translator')->get('modules.timeLogs.myActiveTimer'); ?></h4>
                <?php if (isset($component)) { $__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e = $component; } ?>
<?php $component = App\View\Components\Cards\Data::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Data::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    <div class="row">
                        <div class="col-sm-12">
                            <?php echo e($myActiveTimer->start_time->timezone(company()->timezone)->format('M d, Y' . ' - ' . company()->time_format)); ?>

                            <p class="text-primary my-2">
                                <?php
                                    $endTime = now();
                                    $totalHours = $endTime->diff($myActiveTimer->start_time)->format('%d') * 24 + $endTime->diff($myActiveTimer->start_time)->format('%H');
                                    $totalMinutes = $totalHours * 60 + $endTime->diff($myActiveTimer->start_time)->format('%i');

                                    $totalMinutes = $totalMinutes - $myActiveTimer->breaks->sum('total_minutes');

                                    $timeLog = intdiv($totalMinutes, 60) . ' ' . __('app.hrs') . ' ';

                                    if ($totalMinutes % 60 > 0) {
                                        $timeLog .= $totalMinutes % 60 . ' ' . __('app.mins');
                                    }
                                ?>

                                <strong><?php echo app('translator')->get('modules.timeLogs.totalHours'); ?>:</strong> <?php echo e($timeLog); ?>

                            </p>

                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center f-12 text-dark-grey">
                                    <span><i class="fa fa-clock"></i> <?php echo app('translator')->get('modules.timeLogs.startTime'); ?></span>
                                    <?php echo e($myActiveTimer->start_time->timezone(company()->timezone)->format(company()->time_format)); ?>

                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center f-12 text-dark-grey">
                                    <span><i class="fa fa-briefcase"></i> <?php echo app('translator')->get('app.task'); ?></span>
                                    <?php echo e($myActiveTimer->task->heading); ?>

                                </li>
                                <?php $__currentLoopData = $myActiveTimer->breaks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="list-group-item d-flex justify-content-between align-items-center f-12 text-dark-grey">
                                        <?php if(!is_null($item->end_time)): ?>
                                            <?php
                                                $endTime = $item->end_time;
                                                $totalHours = $endTime->diff($item->start_time)->format('%d') * 24 + $endTime->diff($item->start_time)->format('%H');
                                                $totalMinutes = $totalHours * 60 + $endTime->diff($item->start_time)->format('%i');

                                                $timeLog = intdiv($totalMinutes, 60) . ' ' . __('app.hrs') . ' ';

                                                if ($totalMinutes % 60 > 0) {
                                                    $timeLog .= $totalMinutes % 60 . ' ' . __('app.mins');
                                                }
                                            ?>
                                            <span><i class="fa fa-mug-hot"></i> <?php echo app('translator')->get('modules.timeLogs.break'); ?> (<?php echo e($timeLog); ?>)</span>
                                            <?php echo e($item->start_time->timezone(company()->timezone)->format(company()->time_format) . ' - ' . $item->end_time->timezone(company()->timezone)->format(company()->time_format)); ?>


                                        <?php else: ?>
                                            <span><i class="fa fa-mug-hot"></i> <?php echo app('translator')->get('modules.timeLogs.break'); ?></span>
                                            <?php echo e($item->start_time->timezone(company()->timezone)->format(company()->time_format)); ?>

                                        <?php endif; ?>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>

                        </div>
                        <div class="col-sm-12 pt-3 text-right">
                            <?php if(
                                    $editTimelogPermission == 'all'
                                    || ($editTimelogPermission == 'added' && $myActiveTimer->added_by == user()->id)
                                    || ($editTimelogPermission == 'owned'
                                        && (($myActiveTimer->project && $myActiveTimer->project->client_id == user()->id) || $myActiveTimer->user_id == user()->id)
                                        )
                                    || ($editTimelogPermission == 'both' && (($myActiveTimer->project && $myActiveTimer->project->client_id == user()->id) || $myActiveTimer->user_id == user()->id || $myActiveTimer->added_by == user()->id))
                                ): ?>

                                <?php if(is_null($myActiveTimer->activeBreak)): ?>
                                    <?php if (isset($component)) { $__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26 = $component; } ?>
<?php $component = App\View\Components\Forms\ButtonSecondary::resolve(['icon' => 'pause-circle'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonSecondary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['data-time-id' => ''.e($myActiveTimer->id).'','id' => 'pause-timer-btn']); ?><?php echo app('translator')->get('modules.timeLogs.pauseTimer'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26)): ?>
<?php $component = $__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26; ?>
<?php unset($__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26); ?>
<?php endif; ?>
                                    <?php if (isset($component)) { $__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480 = $component; } ?>
<?php $component = App\View\Components\Forms\ButtonPrimary::resolve(['icon' => 'stop-circle'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'ml-3 stop-active-timer','data-time-id' => ''.e($myActiveTimer->id).'']); ?><?php echo app('translator')->get('modules.timeLogs.stopTimer'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480)): ?>
<?php $component = $__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480; ?>
<?php unset($__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480); ?>
<?php endif; ?>
                                <?php else: ?>
                                    <?php if (isset($component)) { $__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480 = $component; } ?>
<?php $component = App\View\Components\Forms\ButtonPrimary::resolve(['icon' => 'play-circle'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'resume-timer-btn','data-time-id' => ''.e($myActiveTimer->activeBreak->id).'']); ?><?php echo app('translator')->get('modules.timeLogs.resumeTimer'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480)): ?>
<?php $component = $__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480; ?>
<?php unset($__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480); ?>
<?php endif; ?>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e)): ?>
<?php $component = $__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e; ?>
<?php unset($__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e); ?>
<?php endif; ?>
            </div>
        <?php else: ?>
            <div class="col-lg-4 bg-additional-grey py-3">
                <?php if (isset($component)) { $__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e = $component; } ?>
<?php $component = App\View\Components\Cards\Data::resolve(['title' => __('modules.timeLogs.startTimer')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Data::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    <?php if (isset($component)) { $__componentOriginal0777dca6b0ab2eebdcaf6ba884d5b30ab61203a6 = $component; } ?>
<?php $component = App\View\Components\Form::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Form::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'startTimerForm']); ?>
                        <input type="hidden" name="user_id[]" value="<?php echo e(user()->id); ?>">
                        <div class="row">
                            <div class="col">
                                <?php if (isset($component)) { $__componentOriginalaa9e2e00dcec6b58db49b9128f7191370bc93381 = $component; } ?>
<?php $component = App\View\Components\Forms\Select::resolve(['fieldId' => 'project_id','fieldName' => 'project_id','fieldLabel' => __('app.project'),'search' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                    <option value="">--</option>
                                    <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($data->id); ?>">
                                            <?php echo e(mb_ucwords($data->project_name)); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalaa9e2e00dcec6b58db49b9128f7191370bc93381)): ?>
<?php $component = $__componentOriginalaa9e2e00dcec6b58db49b9128f7191370bc93381; ?>
<?php unset($__componentOriginalaa9e2e00dcec6b58db49b9128f7191370bc93381); ?>
<?php endif; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col" id="task_div">
                                <?php if (isset($component)) { $__componentOriginald41bdafd33339594df064e86fa6ed4d5b7854f82 = $component; } ?>
<?php $component = App\View\Components\TaskSelectionDropdown::resolve(['tasks' => $tasks] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('task-selection-dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\TaskSelectionDropdown::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald41bdafd33339594df064e86fa6ed4d5b7854f82)): ?>
<?php $component = $__componentOriginald41bdafd33339594df064e86fa6ed4d5b7854f82; ?>
<?php unset($__componentOriginald41bdafd33339594df064e86fa6ed4d5b7854f82); ?>
<?php endif; ?>
                            </div>
                        </div>

                        <div class="row">
                            <?php if($addTaskPermission == 'all' || $addTaskPermission == 'added'): ?>

                                <div class="col">
                                    <div class="form-group">
                                        <div class="d-flex mt-3">
                                            <?php if (isset($component)) { $__componentOriginaldf5bb0e32b087bca724e42ed3cdc51682b267e1e = $component; } ?>
<?php $component = App\View\Components\Forms\Checkbox::resolve(['fieldLabel' => __('app.create') . ' ' . __('modules.tasks.newTask'),'fieldName' => 'create_task','fieldId' => 'create_task'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Checkbox::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldf5bb0e32b087bca724e42ed3cdc51682b267e1e)): ?>
<?php $component = $__componentOriginaldf5bb0e32b087bca724e42ed3cdc51682b267e1e; ?>
<?php unset($__componentOriginaldf5bb0e32b087bca724e42ed3cdc51682b267e1e); ?>
<?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <div class="col-12">
                                <?php if (isset($component)) { $__componentOriginal3985d2df1d9ef7c51070d7c0b8f4b0e4589145ab = $component; } ?>
<?php $component = App\View\Components\Forms\Text::resolve(['fieldId' => 'memo','fieldName' => 'memo','fieldLabel' => __('modules.timeLogs.memo'),'fieldRequired' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Text::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3985d2df1d9ef7c51070d7c0b8f4b0e4589145ab)): ?>
<?php $component = $__componentOriginal3985d2df1d9ef7c51070d7c0b8f4b0e4589145ab; ?>
<?php unset($__componentOriginal3985d2df1d9ef7c51070d7c0b8f4b0e4589145ab); ?>
<?php endif; ?>
                            </div>
                            <div class="col-12 text-right">
                                <?php if (isset($component)) { $__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480 = $component; } ?>
<?php $component = App\View\Components\Forms\ButtonPrimary::resolve(['icon' => 'play'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'start-timer-btn']); ?><?php echo app('translator')->get('modules.timeLogs.startTimer'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480)): ?>
<?php $component = $__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480; ?>
<?php unset($__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480); ?>
<?php endif; ?>
                            </div>
                        </div>

                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0777dca6b0ab2eebdcaf6ba884d5b30ab61203a6)): ?>
<?php $component = $__componentOriginal0777dca6b0ab2eebdcaf6ba884d5b30ab61203a6; ?>
<?php unset($__componentOriginal0777dca6b0ab2eebdcaf6ba884d5b30ab61203a6); ?>
<?php endif; ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e)): ?>
<?php $component = $__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e; ?>
<?php unset($__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e); ?>
<?php endif; ?>
            </div>
        <?php endif; ?>

        <div class="my-3 col-lg-8 col-md-7">
            <div class="table-responsive">
                <?php if (isset($component)) { $__componentOriginale53a9d2e6d6c51019138cc2fcd3ba8ac893391c6 = $component; } ?>
<?php $component = App\View\Components\Table::resolve(['headType' => 'thead-light'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Table::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'table-bordered table-hover']); ?>
                     <?php $__env->slot('thead', null, []); ?> 
                        <th>#</th>
                        <th><?php echo app('translator')->get('app.task'); ?></th>
                        <th><?php echo app('translator')->get('app.employee'); ?></th>
                        <th class="w-180"><?php echo app('translator')->get('modules.timeLogs.startTime'); ?></th>
                        <th class="text-right w-150"><?php echo app('translator')->get('app.action'); ?></th>
                     <?php $__env->endSlot(); ?>

                    <?php $__empty_1 = true; $__currentLoopData = $activeTimers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr id="timer-<?php echo e($item->id); ?>">
                            <td><?php echo e($key + 1); ?></td>
                            <td>
                                <a href="<?php echo e(route('tasks.show', $item->task_id)); ?>" class="text-darkest-grey">
                                    <?php echo e($item->task->heading); ?>

                                </a>
                                <?php if($item->task->project_id): ?>
                                    <p class="text-lightest mb-0"><?php echo e($item->task->project->project_name); ?></p>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if (isset($component)) { $__componentOriginale1ecb3918c4f62d7b4c0a0cccb7162d7fb59f03c = $component; } ?>
<?php $component = App\View\Components\EmployeeImage::resolve(['user' => $item->user] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('employee-image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\EmployeeImage::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale1ecb3918c4f62d7b4c0a0cccb7162d7fb59f03c)): ?>
<?php $component = $__componentOriginale1ecb3918c4f62d7b4c0a0cccb7162d7fb59f03c; ?>
<?php unset($__componentOriginale1ecb3918c4f62d7b4c0a0cccb7162d7fb59f03c); ?>
<?php endif; ?>
                            </td>
                            <td>
                                <?php echo e($item->start_time->timezone(company()->timezone)->format(company()->date_format . ' ' . company()->time_format)); ?>

                                <div class="mt-1 f-12">
                                    <?php if(is_null($item->activeBreak)): ?>
                                        <?php
                                            $endTime = now();
                                            $totalHours = $endTime->diff($item->start_time)->format('%d') * 24 + $endTime->diff($item->start_time)->format('%H');
                                            $totalMinutes = $totalHours * 60 + $endTime->diff($item->start_time)->format('%i');

                                            $totalMinutes = $totalMinutes - $item->breaks->sum('total_minutes');

                                            $timeLog = intdiv($totalMinutes, 60) . ' ' . __('app.hrs') . ' ';

                                            if ($totalMinutes % 60 > 0) {
                                                $timeLog .= $totalMinutes % 60 . ' ' . __('app.mins');
                                            }
                                        ?>

                                        <span class="badge badge-secondary">
                                            <i data-toggle="tooltip" data-original-title="<?php echo app('translator')->get('app.active'); ?>"
                                            class="fa fa-hourglass-start"></i> <?php echo e($timeLog); ?>

                                        </span>
                                    <?php else: ?>
                                        <span class="badge badge-primary" data-toggle="tooltip" data-original-title="<?php echo e($item->activeBreak->start_time->timezone(company()->timezone)->format(company()->date_format . ' ' . company()->time_format)); ?>">
                                            <i class="fa fa-pause-circle"></i> <?php echo app('translator')->get('modules.timeLogs.paused'); ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </td>
                            <td class="text-right">
                                <?php if(
                                    $editTimelogPermission == 'all'
                                    || ($editTimelogPermission == 'added' && $item->added_by == user()->id)
                                    || ($editTimelogPermission == 'owned'
                                        && (($item->project && $item->project->client_id == user()->id) || $item->user_id == user()->id)
                                        )
                                    || ($editTimelogPermission == 'both' && (($item->project && $item->project->client_id == user()->id) || $item->user_id == user()->id || $item->added_by == user()->id))
                                ): ?>
                                <?php if (isset($component)) { $__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26 = $component; } ?>
<?php $component = App\View\Components\Forms\ButtonSecondary::resolve(['icon' => 'stop-circle'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonSecondary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'stop-active-timer','data-time-id' => ''.e($item->id).'']); ?><?php echo app('translator')->get('app.stop'); ?> <?php echo $__env->renderComponent(); ?>
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
<?php $component = App\View\Components\Cards\NoRecord::resolve(['icon' => 'clock','message' => __('messages.noRecordFound')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
            </div>
        </div>

    </div>
</div>
<div class="modal-footer">
    <?php if (isset($component)) { $__componentOriginaldffecccc219bb81c1548bfa6ec1531014cb3bec8 = $component; } ?>
<?php $component = App\View\Components\Forms\ButtonCancel::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-cancel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonCancel::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['data-dismiss' => 'modal','class' => 'border-0']); ?><?php echo app('translator')->get('app.cancel'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldffecccc219bb81c1548bfa6ec1531014cb3bec8)): ?>
<?php $component = $__componentOriginaldffecccc219bb81c1548bfa6ec1531014cb3bec8; ?>
<?php unset($__componentOriginaldffecccc219bb81c1548bfa6ec1531014cb3bec8); ?>
<?php endif; ?>
</div>

<script>

    $(function(){

        $('#start-timer-btn').click(function() {
            var url = "<?php echo e(route('timelogs.start_timer')); ?>";
            $.easyAjax({
                url: url,
                container: '#startTimerForm',
                type: "POST",
                blockUI: true,
                disableButton: true,
                buttonSelector: "#start-timer-btn",
                data: $('#startTimerForm').serialize(),
                success: function(response) {
                    if (response.status == 'success') {
                        window.location.reload();
                    }
                }
            })
        });

        $("input[name=create_task]").click(function() {
            $('#task_div').toggleClass('d-none');
        });

    });

    $('#startTimerForm').on('change', '#project_id', function () {
        let id = $(this).val();
        if (id === '') {
            id = 0;
        }
        let url = "<?php echo e(route('projects.pendingTasks', ':id')); ?>";
        url = url.replace(':id', id);

        $.easyAjax({
            url: url,
            container: '#startTimerForm',
            type: "GET",
            blockUI: true,
            success: function (response) {
                if (response.status == 'success') {
                    $('#timer_task_id').html(response.data);
                    $('#timer_task_id').selectpicker('refresh');
                }
            }
        });
    });

    init(MODAL_XL);

</script>
<?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/timelogs/ajax/active_timer.blade.php ENDPATH**/ ?>