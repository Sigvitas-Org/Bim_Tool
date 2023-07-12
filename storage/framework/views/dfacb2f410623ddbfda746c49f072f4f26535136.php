<?php
$editTaskPermission = user()->permission('edit_tasks');
$sendReminderPermission = user()->permission('send_reminder');
$changeStatusPermission = user()->permission('change_status');
?>

<div id="task-detail-section">

    <h3 class="heading-h1 mb-3"><?php echo e(ucfirst($task->heading)); ?></h3>
    <div class="row">
        <div class="col-sm-9">
            <div class="card bg-white border-0 b-shadow-4">
                <div class="card-header bg-white  border-bottom-grey text-capitalize justify-content-between p-20">
                    <div class="row">
                        <div class="col-lg-8 col-10">
                            <?php if($changeStatusPermission == 'all'
                            || ($changeStatusPermission == 'added' && $task->added_by == user()->id)
                            || ($changeStatusPermission == 'owned' && in_array(user()->id, $taskUsers))
                            || ($changeStatusPermission == 'both' && (in_array(user()->id, $taskUsers) || $task->added_by == user()->id))
                            || ($task->project && $task->project->project_admin == user()->id)
                            ): ?>
                                <?php if($task->boardColumn->slug != 'completed'): ?>
                                    <?php if (isset($component)) { $__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480 = $component; } ?>
<?php $component = App\View\Components\Forms\ButtonPrimary::resolve(['icon' => 'check'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['data-status' => 'completed','class' => 'change-task-status mr-2 mb-2 mb-lg-0 mb-md-0']); ?>
                                        <?php echo app('translator')->get('modules.tasks.markComplete'); ?>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480)): ?>
<?php $component = $__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480; ?>
<?php unset($__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480); ?>
<?php endif; ?>
                                <?php else: ?>
                                    <?php if (isset($component)) { $__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26 = $component; } ?>
<?php $component = App\View\Components\Forms\ButtonSecondary::resolve(['icon' => 'times'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonSecondary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['data-status' => 'incomplete','class' => 'change-task-status mr-3']); ?>
                                        <?php echo app('translator')->get('modules.tasks.markIncomplete'); ?>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26)): ?>
<?php $component = $__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26; ?>
<?php unset($__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26); ?>
<?php endif; ?>
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php if($task->boardColumn->slug != 'completed' && !is_null($task->is_task_user)): ?>
                                <?php if(is_null($task->userActiveTimer)): ?>
                                    <?php if (isset($component)) { $__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26 = $component; } ?>
<?php $component = App\View\Components\Forms\ButtonSecondary::resolve(['icon' => 'play'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonSecondary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'start-task-timer']); ?>
                                        <?php echo app('translator')->get('modules.timeLogs.startTimer'); ?>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26)): ?>
<?php $component = $__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26; ?>
<?php unset($__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26); ?>
<?php endif; ?>
                                <?php elseif(!is_null($task->userActiveTimer)): ?>

                                    <span class="border p-2 rounded mr-2 bg-light"><i class="fa fa-clock mr-1"></i><span id="active-task-timer"><?php echo e($task->userActiveTimer->timer); ?></span></span>

                                    <?php if(is_null($task->userActiveTimer->activeBreak)): ?>
                                        <?php if (isset($component)) { $__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26 = $component; } ?>
<?php $component = App\View\Components\Forms\ButtonSecondary::resolve(['icon' => 'pause-circle'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonSecondary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['data-time-id' => ''.e($task->userActiveTimer->id).'','id' => 'pause-timer-btn','class' => 'mr-2']); ?><?php echo app('translator')->get('modules.timeLogs.pauseTimer'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26)): ?>
<?php $component = $__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26; ?>
<?php unset($__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26); ?>
<?php endif; ?>

                                        <?php if (isset($component)) { $__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26 = $component; } ?>
<?php $component = App\View\Components\Forms\ButtonSecondary::resolve(['icon' => 'stop-circle'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonSecondary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['data-time-id' => ''.e($task->userActiveTimer->id).'','id' => 'stop-task-timer']); ?>
                                            <?php echo app('translator')->get('modules.timeLogs.stopTimer'); ?>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26)): ?>
<?php $component = $__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26; ?>
<?php unset($__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26); ?>
<?php endif; ?>
                                    <?php else: ?>
                                        <?php if (isset($component)) { $__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26 = $component; } ?>
<?php $component = App\View\Components\Forms\ButtonSecondary::resolve(['icon' => 'play-circle'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonSecondary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'resume-timer-btn','data-time-id' => ''.e($task->userActiveTimer->activeBreak->id).'']); ?><?php echo app('translator')->get('modules.timeLogs.resumeTimer'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26)): ?>
<?php $component = $__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26; ?>
<?php unset($__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26); ?>
<?php endif; ?>
                                    <?php endif; ?>

                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-4 col-2 text-right">
                            <div class="dropdown">
                                <button
                                    class="btn btn-lg f-14 px-2 py-1 text-dark-grey text-capitalize rounded  dropdown-toggle"
                                    type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-h"></i>
                                </button>

                                <div class="dropdown-menu dropdown-menu-right border-grey rounded b-shadow-4 p-0"
                                    aria-labelledby="dropdownMenuLink" tabindex="0">

                                    <?php if($sendReminderPermission == 'all' && $task->boardColumn->slug != 'completed'): ?>
                                        <a class="dropdown-item" id="reminderButton"
                                            href="javascript:;"><?php echo app('translator')->get('modules.tasks.reminder'); ?></a>
                                    <?php endif; ?>

                                    <?php if($editTaskPermission == 'all' || ($editTaskPermission == 'added' && $task->added_by == user()->id) || ($task->project && $task->project->project_admin == user()->id)): ?>
                                        <a class="dropdown-item openRightModal"
                                            href="<?php echo e(route('tasks.edit', $task->id)); ?>"><?php echo app('translator')->get('app.edit'); ?>
                                            <?php echo app('translator')->get('app.task'); ?></a>

                                        <hr class="my-1">
                                    <?php endif; ?>

                                    <?php $pin = $task->pinned() ?>

                                    <?php if($pin): ?>
                                        <a class="dropdown-item" href="javascript:;" id="pinnedItem"
                                            data-pinned="pinned"><?php echo app('translator')->get('app.unpin'); ?>
                                            <?php echo app('translator')->get('app.task'); ?></a>
                                    <?php else: ?>
                                        <a class="dropdown-item" href="javascript:;" id="pinnedItem"
                                            data-pinned="unpinned"><?php echo app('translator')->get('app.pin'); ?>
                                            <?php echo app('translator')->get('app.task'); ?></a>
                                    <?php endif; ?>

                                    <?php if(($taskSettings->copy_task_link == 'yes' && in_array('client', user_roles())) || in_array('admin', user_roles()) || in_array('employee', user_roles())): ?>
                                        <a class="dropdown-item btn-copy" href="javascript:;"
                                        data-clipboard-text="<?php echo e(route('front.task_detail', $task->hash)); ?>"><?php echo app('translator')->get('modules.tasks.copyTaskLink'); ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <?php if(($taskSettings->project == 'yes' && in_array('client', user_roles())) || in_array('admin', user_roles()) || in_array('employee', user_roles())): ?>
                        <div class="col-12 px-0 pb-3 d-block d-lg-flex d-md-flex">
                            <p class="mb-0 text-lightest f-14 w-30 d-inline-block text-capitalize"><?php echo app('translator')->get('app.project'); ?></p>
                            <p class="mb-0 text-dark-grey f-14 w-70">
                                <?php if($task->project_id): ?>
                                    <?php if($task->project->status == 'in progress'): ?>
                                        <i class="fa fa-circle mr-1 text-blue f-10"></i>
                                    <?php elseif($task->project->status == 'on hold'): ?>
                                        <i class="fa fa-circle mr-1 text-yellow f-10"></i>
                                    <?php elseif($task->project->status == 'not started'): ?>
                                        <i class="fa fa-circle mr-1 text-yellow f-10"></i>
                                    <?php elseif($task->project->status == 'canceled'): ?>
                                        <i class="fa fa-circle mr-1 text-red f-10"></i>
                                    <?php elseif($task->project->status == 'finished'): ?>
                                        <i class="fa fa-circle mr-1 text-dark-green f-10"></i>
                                    <?php endif; ?>
                                    <a href="<?php echo e(route('projects.show', $task->project_id)); ?>" class="text-dark-grey">
                                        <?php echo e($task->project->project_name); ?></a>
                                <?php else: ?>
                                    --
                                <?php endif; ?>
                            </p>

                        </div>
                    <?php endif; ?>

                    <?php if(($taskSettings->priority == 'yes' && in_array('client', user_roles())) || in_array('admin', user_roles()) || in_array('employee', user_roles()) ): ?>
                        <div class="col-12 px-0 pb-3 d-block d-lg-flex d-md-flex">
                            <p class="mb-0 text-lightest f-14 w-30 d-inline-block text-capitalize">
                                <?php echo app('translator')->get('modules.tasks.priority'); ?></p>
                                <p class="mb-0 text-dark-grey f-14 w-70">
                                    <?php if($task->priority == 'high'): ?>
                                    <i class="fa fa-circle mr-1 text-red f-10"></i>
                                    <?php elseif($task->priority == 'medium'): ?>
                                    <i class="fa fa-circle mr-1 text-yellow f-10"></i>
                                    <?php else: ?>
                                    <i class="fa fa-circle mr-1 text-dark-green f-10"></i>
                                    <?php endif; ?>
                                    <?php echo app('translator')->get('app.'.$task->priority); ?>
                                </p>
                        </div>
                    <?php endif; ?>

                    <?php if(($taskSettings->assigned_to == 'yes' && in_array('client', user_roles())) || in_array('admin', user_roles()) || in_array('employee', user_roles())): ?>
                        <div class="col-12 px-0 pb-3 d-block d-lg-flex d-md-flex">
                            <p class="mb-0 text-lightest f-14 w-30 d-inline-block text-capitalize">
                                <?php echo app('translator')->get('modules.tasks.assignTo'); ?></p>
                                <?php if(count($task->users) > 0): ?>
                                    <?php if(count($task->users) > 1): ?>
                                        <?php $__currentLoopData = $task->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="taskEmployeeImg rounded-circle mr-1">
                                                <a href="<?php echo e(route('employees.show', $item->id)); ?>">
                                                    <img data-toggle="tooltip" data-original-title="<?php echo e(mb_ucwords($item->name)); ?>"
                                                        src="<?php echo e($item->image_url); ?>">
                                                </a>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <?php $__currentLoopData = $task->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if (isset($component)) { $__componentOriginal1c46ebe885e3c4421e9977d656c777b9bed6c39a = $component; } ?>
<?php $component = App\View\Components\Employee::resolve(['user' => $item] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                <?php else: ?>
                                --
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <div class="col-12 px-0 pb-3 d-block d-lg-flex d-md-flex">
                        <p class="mb-0 text-lightest f-14 w-30 d-inline-block text-capitalize"><?php echo app('translator')->get('modules.taskShortCode'); ?></p>
                        <p class="mb-0 text-dark-grey f-14 w-70">
                           <?php echo e(($task->task_short_code) ? $task->task_short_code : '--'); ?>

                        </p>
                    </div>

                    <?php if(($taskSettings->assigned_by == 'yes' && in_array('client', user_roles())) || in_array('admin', user_roles()) || in_array('employee', user_roles())): ?>
                        <?php if($task->created_by): ?>
                            <div class="col-12 px-0 pb-3 d-block d-lg-flex d-md-flex">
                                <p class="mb-0 text-lightest f-14 w-30 d-inline-block text-capitalize">
                                    <?php echo app('translator')->get('modules.tasks.assignBy'); ?></p>
                                
                                <?php if (isset($component)) { $__componentOriginal1c46ebe885e3c4421e9977d656c777b9bed6c39a = $component; } ?>
<?php $component = App\View\Components\Employee::resolve(['user' => $task->createBy] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                                
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if(($taskSettings->label == 'yes' && in_array('client', user_roles())) || in_array('admin', user_roles()) || in_array('employee', user_roles())): ?>
                        <div class="col-12 px-0 pb-3 d-block d-lg-flex d-md-flex">
                            <p class="mb-0 text-lightest f-14 w-30 d-inline-block text-capitalize">
                                <?php echo app('translator')->get('app.label'); ?></p>
                            <p class="mb-0 text-dark-grey f-14 w-70">
                                <?php $__empty_1 = true; $__currentLoopData = $task->labels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <span class='badge badge-secondary'
                                        style='background-color: <?php echo e($label->label_color); ?>'><?php echo e($label->label_name); ?> </span>
                                        <?php if($label->description): ?>
                                            <i class="fa fa-question-circle" data-toggle="popover" data-placement="top" data-content="<?php echo e($label->description); ?>" data-html="true" data-trigger="hover"></i>
                                        <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    --
                                <?php endif; ?>
                            </p>
                        </div>
                    <?php endif; ?>

                    <?php if(in_array('gitlab', user_modules()) && isset($gitlabIssue)): ?>
                        <div class="col-12 px-0 pb-3 d-block d-lg-flex d-md-flex">
                            <p class="mb-0 text-lightest f-14 w-30 d-inline-block text-capitalize">
                                GitLab</p>
                            <div class="mb-0 w-70">
                                <div class='card border'>
                                    <div class="card-body bg-white d-flex justify-content-between p-2 align-items-center rounded">
                                        <h4 class="f-13 f-w-500 mb-0">
                                            <img src="<?php echo e(asset('img/gitlab-icon-rgb.png')); ?>" class="height-35">
                                            <a href="<?php echo e($gitlabIssue['web_url']); ?>" class="text-darkest-grey f-w-500" target="_blank">#<?php echo e($gitlabIssue['iid']); ?> <?php echo e($gitlabIssue['title']); ?> <i class="fa fa-external-link-alt"></i></a>
                                        </h4>
                                        <div>
                                            <span class="badge badge-<?php echo e($gitlabIssue['state'] == 'opened' ? 'danger' : 'success'); ?>"><?php echo e($gitlabIssue['state']); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                        <?php if(($taskSettings->task_category == 'yes' && in_array('client', user_roles())) || in_array('admin', user_roles()) || in_array('employee', user_roles())): ?>
                            <?php if (isset($component)) { $__componentOriginal53e40184b23a5cf55bed20787d7874d502fc5bb8 = $component; } ?>
<?php $component = App\View\Components\Cards\DataRow::resolve(['label' => __('modules.tasks.taskCategory'),'value' => $task->category->category_name ?? '--','html' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data-row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\DataRow::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal53e40184b23a5cf55bed20787d7874d502fc5bb8)): ?>
<?php $component = $__componentOriginal53e40184b23a5cf55bed20787d7874d502fc5bb8; ?>
<?php unset($__componentOriginal53e40184b23a5cf55bed20787d7874d502fc5bb8); ?>
<?php endif; ?>
                        <?php endif; ?>

                        <?php if(($taskSettings->description == 'yes' && in_array('client', user_roles())) || in_array('admin', user_roles()) || in_array('employee', user_roles())): ?>
                            <?php if (isset($component)) { $__componentOriginal53e40184b23a5cf55bed20787d7874d502fc5bb8 = $component; } ?>
<?php $component = App\View\Components\Cards\DataRow::resolve(['label' => __('app.description'),'value' => !empty($task->description) ? $task->description : '--','html' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data-row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\DataRow::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal53e40184b23a5cf55bed20787d7874d502fc5bb8)): ?>
<?php $component = $__componentOriginal53e40184b23a5cf55bed20787d7874d502fc5bb8; ?>
<?php unset($__componentOriginal53e40184b23a5cf55bed20787d7874d502fc5bb8); ?>
<?php endif; ?>
                        <?php endif; ?>

                        
                        <?php if(($taskSettings->custom_fields == 'yes' && in_array('client', user_roles())) || in_array('admin', user_roles()) || in_array('employee', user_roles())): ?>
                            <?php if (isset($component)) { $__componentOriginal3c960abe02ba5e6e89cacf00e5c55b3f476974bf = $component; } ?>
<?php $component = App\View\Components\Forms\CustomFieldShow::resolve(['fields' => $fields,'model' => $task] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.custom-field-show'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\CustomFieldShow::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3c960abe02ba5e6e89cacf00e5c55b3f476974bf)): ?>
<?php $component = $__componentOriginal3c960abe02ba5e6e89cacf00e5c55b3f476974bf; ?>
<?php unset($__componentOriginal3c960abe02ba5e6e89cacf00e5c55b3f476974bf); ?>
<?php endif; ?>
                        <?php endif; ?>

                </div>
            </div>

            <?php if((($taskSettings->files == 'yes' || $taskSettings->sub_task == 'yes' || $taskSettings->comments == 'yes'|| $taskSettings->time_logs == 'yes'|| $taskSettings->notes == 'yes' || $taskSettings->history == 'yes') && in_array('client', user_roles())) || in_array('admin', user_roles()) || in_array('employee', user_roles())): ?>
                <!-- TASK TABS START -->
                <div class="bg-additional-grey rounded my-3">

                    <div class="s-b-inner s-b-notifications bg-white b-shadow-4 rounded">

                        <?php if (isset($component)) { $__componentOriginal7774b3091057df8dc14c6c8607188cfe96878d1a = $component; } ?>
<?php $component = App\View\Components\TabSection::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tab-section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\TabSection::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'task-tabs']); ?>

                            <?php if(($taskSettings->files == 'yes' && in_array('client', user_roles())) || in_array('admin', user_roles()) || in_array('employee', user_roles())): ?>
                                <?php if (isset($component)) { $__componentOriginal76a2bdd750f582a1a35562213ffa0702c052f464 = $component; } ?>
<?php $component = App\View\Components\TabItem::resolve(['active' => (request('view') === 'file' || !request('view')),'link' => route('tasks.show', $task->id).'?view=file'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tab-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\TabItem::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'ajax-tab']); ?><?php echo app('translator')->get('app.file'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal76a2bdd750f582a1a35562213ffa0702c052f464)): ?>
<?php $component = $__componentOriginal76a2bdd750f582a1a35562213ffa0702c052f464; ?>
<?php unset($__componentOriginal76a2bdd750f582a1a35562213ffa0702c052f464); ?>
<?php endif; ?>
                            <?php endif; ?>

                            <?php if(($taskSettings->sub_task == 'yes' && in_array('client', user_roles())) || in_array('admin', user_roles()) || in_array('employee', user_roles())): ?>
                                <?php if (isset($component)) { $__componentOriginal76a2bdd750f582a1a35562213ffa0702c052f464 = $component; } ?>
<?php $component = App\View\Components\TabItem::resolve(['active' => (request('view') === 'sub_task'),'link' => route('tasks.show', $task->id).'?view=sub_task'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tab-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\TabItem::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'ajax-tab']); ?>
                                <?php echo app('translator')->get('modules.tasks.subTask'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal76a2bdd750f582a1a35562213ffa0702c052f464)): ?>
<?php $component = $__componentOriginal76a2bdd750f582a1a35562213ffa0702c052f464; ?>
<?php unset($__componentOriginal76a2bdd750f582a1a35562213ffa0702c052f464); ?>
<?php endif; ?>
                            <?php endif; ?>

                            <?php if(($taskSettings->comments == 'yes' && in_array('client', user_roles())) || in_array('admin', user_roles()) || in_array('employee', user_roles())): ?>
                                <?php if($viewTaskCommentPermission != 'none'): ?>
                                    <?php if (isset($component)) { $__componentOriginal76a2bdd750f582a1a35562213ffa0702c052f464 = $component; } ?>
<?php $component = App\View\Components\TabItem::resolve(['active' => (request('view') === 'comments'),'link' => route('tasks.show', $task->id).'?view=comments'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tab-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\TabItem::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'ajax-tab']); ?>
                                        <?php echo app('translator')->get('modules.tasks.comment'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal76a2bdd750f582a1a35562213ffa0702c052f464)): ?>
<?php $component = $__componentOriginal76a2bdd750f582a1a35562213ffa0702c052f464; ?>
<?php unset($__componentOriginal76a2bdd750f582a1a35562213ffa0702c052f464); ?>
<?php endif; ?>
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php if(($taskSettings->time_logs == 'yes' && in_array('client', user_roles())) || in_array('admin', user_roles()) || in_array('employee', user_roles())): ?>
                                <?php if (isset($component)) { $__componentOriginal76a2bdd750f582a1a35562213ffa0702c052f464 = $component; } ?>
<?php $component = App\View\Components\TabItem::resolve(['active' => (request('view') === 'time_logs'),'link' => route('tasks.show', $task->id).'?view=time_logs'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tab-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\TabItem::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'ajax-tab']); ?>
                                    <?php echo app('translator')->get('app.menu.timeLogs'); ?>
                                    <?php if($task->active_timer_all_count > 0): ?>
                                        <i class="fa fa-clock text-primary f-12 ml-1"></i>
                                    <?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal76a2bdd750f582a1a35562213ffa0702c052f464)): ?>
<?php $component = $__componentOriginal76a2bdd750f582a1a35562213ffa0702c052f464; ?>
<?php unset($__componentOriginal76a2bdd750f582a1a35562213ffa0702c052f464); ?>
<?php endif; ?>
                            <?php endif; ?>

                            <?php if(($taskSettings->notes == 'yes' && in_array('client', user_roles())) || in_array('admin', user_roles()) || in_array('employee', user_roles())): ?>
                                <?php if($viewTaskNotePermission != 'none'): ?>
                                    <?php if (isset($component)) { $__componentOriginal76a2bdd750f582a1a35562213ffa0702c052f464 = $component; } ?>
<?php $component = App\View\Components\TabItem::resolve(['active' => (request('view') === 'notes'),'link' => route('tasks.show', $task->id).'?view=notes'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tab-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\TabItem::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'ajax-tab']); ?><?php echo app('translator')->get('app.notes'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal76a2bdd750f582a1a35562213ffa0702c052f464)): ?>
<?php $component = $__componentOriginal76a2bdd750f582a1a35562213ffa0702c052f464; ?>
<?php unset($__componentOriginal76a2bdd750f582a1a35562213ffa0702c052f464); ?>
<?php endif; ?>
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php if(($taskSettings->history == 'yes' && in_array('client', user_roles())) || in_array('admin', user_roles()) || in_array('employee', user_roles())): ?>
                                <?php if (isset($component)) { $__componentOriginal76a2bdd750f582a1a35562213ffa0702c052f464 = $component; } ?>
<?php $component = App\View\Components\TabItem::resolve(['active' => (request('view') === 'history'),'link' => route('tasks.show', $task->id).'?view=history'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tab-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\TabItem::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'ajax-tab']); ?><?php echo app('translator')->get('modules.tasks.history'); ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal76a2bdd750f582a1a35562213ffa0702c052f464)): ?>
<?php $component = $__componentOriginal76a2bdd750f582a1a35562213ffa0702c052f464; ?>
<?php unset($__componentOriginal76a2bdd750f582a1a35562213ffa0702c052f464); ?>
<?php endif; ?>
                            <?php endif; ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7774b3091057df8dc14c6c8607188cfe96878d1a)): ?>
<?php $component = $__componentOriginal7774b3091057df8dc14c6c8607188cfe96878d1a; ?>
<?php unset($__componentOriginal7774b3091057df8dc14c6c8607188cfe96878d1a); ?>
<?php endif; ?>


                        <div class="s-b-n-content">
                            <div class="tab-content" id="nav-tabContent">
                                <?php echo $__env->make($tab, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- TASK TABS END -->
            <?php endif; ?>



        </div>

        <div class="col-sm-3">
            <?php if (isset($component)) { $__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e = $component; } ?>
<?php $component = App\View\Components\Cards\Data::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Data::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <?php if(($taskSettings->status == 'yes' && in_array('client', user_roles())) || in_array('admin', user_roles()) || in_array('employee', user_roles())): ?>
                    <p class="f-w-500"><i class="fa fa-circle mr-1 text-yellow"
                            style="color: <?php echo e($task->boardColumn->label_color); ?>"></i><?php echo e($task->boardColumn->column_name); ?>

                    </p>
                <?php endif; ?>

                <?php if(($taskSettings->make_private == 'yes' && in_array('client', user_roles())) || in_array('admin', user_roles()) || in_array('employee', user_roles())): ?>
                    <?php if($task->is_private || $pin): ?>
                        <div class="col-12 px-0 pb-3 d-flex">
                            <?php if($task->is_private): ?>
                                <span class='badge badge-secondary'><i class='fa fa-lock'></i>
                                    <?php echo app('translator')->get('app.private'); ?></span>&nbsp;
                            <?php endif; ?>

                            <?php if($pin): ?>
                                <span class='badge badge-success'><i class='fa fa-thumbtack'></i> <?php echo app('translator')->get('app.pinned'); ?></span>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>

                <?php if(($taskSettings->start_date == 'yes' && in_array('client', user_roles())) || in_array('admin', user_roles()) || in_array('employee', user_roles())): ?>
                    <div class="col-12 px-0 pb-3 d-lg-flex d-block">
                        <p class="mb-0 text-lightest w-50 f-14 text-capitalize"><?php echo e(__('app.startDate')); ?>

                        </p>
                        <p class="mb-0 text-dark-grey w-50 f-14">
                            <?php if(!is_null($task->start_date)): ?>
                                <?php echo e($task->start_date->format(company()->date_format)); ?>

                            <?php else: ?>
                                --
                            <?php endif; ?>
                        </p>
                    </div>
                <?php endif; ?>

                <?php if(($taskSettings->due_date == 'yes' && in_array('client', user_roles())) || in_array('admin', user_roles()) || in_array('employee', user_roles())): ?>
                    <div class="col-12 px-0 pb-3 d-lg-flex d-block">
                        <p class="mb-0 text-lightest w-50 f-14 text-capitalize"><?php echo e(__('app.dueDate')); ?>

                        </p>
                        <p class="mb-0 text-dark-grey w-50 f-14">
                            <?php if(!is_null($task->due_date)): ?>
                                <?php echo e($task->due_date->format(company()->date_format)); ?>

                            <?php else: ?>
                                --
                            <?php endif; ?>
                        </p>
                    </div>
                <?php endif; ?>

                <?php if(($taskSettings->time_estimate == 'yes' && in_array('client', user_roles())) || in_array('admin', user_roles()) || in_array('employee', user_roles())): ?>
                    <?php if($task->estimate_hours > 0 || $task->estimate_minutes > 0): ?>
                        <div class="col-12 px-0 pb-3 d-lg-flex d-block">
                            <p class="mb-0 text-lightest w-50 f-14 text-capitalize">
                                <?php echo e(__('modules.tasks.setTimeEstimate')); ?>

                            </p>
                            <p class="mb-0 text-dark-grey w-50 f-14"><?php echo e($task->estimate_hours); ?> <?php echo app('translator')->get('app.hrs'); ?> <?php echo e($task->estimate_minutes); ?> <?php echo app('translator')->get('app.mins'); ?></p>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>

                <?php
                    $totalMinutes = $task->timeLogged->sum('total_minutes') - $breakMinutes;
                    $timeLog = intdiv($totalMinutes, 60) . ' ' . __('app.hrs') . ' ';

                    if ($totalMinutes % 60 > 0) {
                        $timeLog .= $totalMinutes % 60 . ' ' . __('app.mins');
                    }
                ?>

                <?php if(($taskSettings->hours_logged == 'yes' && in_array('client', user_roles())) || in_array('admin', user_roles()) || in_array('employee', user_roles())): ?>
                    <div class="col-12 px-0 pb-3 d-lg-flex d-block">
                        <p class="mb-0 text-lightest w-50 f-14 text-capitalize">
                            <?php echo e(__('modules.employees.hoursLogged')); ?>

                        </p>
                        <p class="mb-0 text-dark-grey w-50 f-14"><?php echo e($timeLog); ?></p>
                    </div>
                <?php endif; ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e)): ?>
<?php $component = $__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e; ?>
<?php unset($__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e); ?>
<?php endif; ?>

        </div>

    </div>

    <script src="<?php echo e(asset('vendor/jquery/clipboard.min.js')); ?>"></script>
    <script>
        var clipboard = new ClipboardJS('.btn-copy');

        clipboard.on('success', function(e) {
            Swal.fire({
                icon: 'success',
                text: '<?php echo app('translator')->get("app.copied"); ?>',
                toast: true,
                position: 'top-end',
                timer: 3000,
                timerProgressBar: true,
                showConfirmButton: false,
                customClass: {
                    confirmButton: 'btn btn-primary',
                },
                showClass: {
                    popup: 'swal2-noanimation',
                    backdrop: 'swal2-noanimation'
                },
            })
        });
    </script>

    <script>
        $(document).ready(function() {

            var $worked = $("#active-task-timer");

            function updateTimer() {
                var myTime = $worked.html();
                var ss = myTime.split(":");

                var hours = ss[0];
                var mins = ss[1];
                var secs = ss[2];
                secs = parseInt(secs) + 1;

                if (secs > 59) {
                    secs = '00';
                    mins = parseInt(mins) + 1;
                }

                if (mins > 59) {
                    secs = '00';
                    mins = '00';
                    hours = parseInt(hours) + 1;
                }

                if (hours.toString().length < 2) {
                    hours = '0' + hours;
                }
                if (mins.toString().length < 2) {
                    mins = '0' + mins;
                }
                if (secs.toString().length < 2) {
                    secs = '0' + secs;
                }
                var ts = hours + ':' + mins + ':' + secs;

                $worked.html(ts);
                setTimeout(updateTimer, 1000);
            }
            if ($('#stop-task-timer').length) {
                setTimeout(updateTimer, 1000);
            }

            //    change task status
            $('body').on('click', '.change-task-status', function() {
                var status = $(this).data('status');

                var id = '<?php echo e($task->id); ?>';

                if (status == 'completed') {
                    var checkUrl = "<?php echo e(route('tasks.check_task', ':id')); ?>";
                    checkUrl = checkUrl.replace(':id', id);
                    var token = "<?php echo e(csrf_token()); ?>";

                    $.easyAjax({
                        url: checkUrl,
                        type: "POST",
                        blockUI: true,
                        container: '#task-detail-section',
                        data: {
                            '_token': token
                        },
                        success: function(data) {
                            if (data.taskCount > 0) {
                                Swal.fire({
                                    title: "<?php echo app('translator')->get('messages.sweetAlertTitle'); ?>",
                                    text: "<?php echo app('translator')->get('messages.markCompleteTask'); ?>",
                                    icon: 'warning',
                                    showCancelButton: true,
                                    focusConfirm: false,
                                    confirmButtonText: "<?php echo app('translator')->get('messages.completeIt'); ?>",
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
                                        updateTask(id, status);
                                    }
                                });

                            } else {
                                updateTask(id, status)
                            }

                        }
                    });
                } else {
                    updateTask(id, status)
                }


            });

            $('body').on('click', '#pinnedItem', function() {
                var type = $('#pinnedItem').attr('data-pinned');
                var id = '<?php echo e($task->id); ?>';
                var pinType = 'task';

                var dataPin = type.trim(type);
                if (dataPin == 'pinned') {
                    Swal.fire({
                        title: "<?php echo app('translator')->get('messages.sweetAlertTitle'); ?>",
                        icon: 'warning',
                        showCancelButton: true,
                        focusConfirm: false,
                        confirmButtonText: "<?php echo app('translator')->get('messages.confirmUnpin'); ?>",
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
                            var url = "<?php echo e(route('tasks.destroy_pin', ':id')); ?>";
                            url = url.replace(':id', id);

                            var token = "<?php echo e(csrf_token()); ?>";
                            $.easyAjax({
                                type: 'POST',
                                url: url,
                                data: {
                                    '_token': token,
                                    'type': pinType
                                },
                                success: function(response) {
                                    if (response.status == "success") {
                                        window.location.reload();
                                    }
                                }
                            })
                        }
                    });

                } else {
                    Swal.fire({
                        title: "<?php echo app('translator')->get('messages.sweetAlertTitle'); ?>",
                        icon: 'warning',
                        showCancelButton: true,
                        focusConfirm: false,
                        confirmButtonText: "<?php echo app('translator')->get('messages.confirmPin'); ?>",
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
                            var url = "<?php echo e(route('tasks.store_pin')); ?>?type=" + pinType;

                            var token = "<?php echo e(csrf_token()); ?>";
                            $.easyAjax({
                                type: 'POST',
                                url: url,
                                data: {
                                    '_token': token,
                                    'task_id': id
                                },
                                success: function(response) {
                                    if (response.status == "success") {
                                        window.location.reload();
                                    }
                                }
                            });
                        }
                    });
                }
            });

            $(".ajax-tab").click(function(event) {
                event.preventDefault();

                $('.task-tabs .ajax-tab').removeClass('active');
                $(this).addClass('active');

                const requestUrl = this.href;

                $.easyAjax({
                    url: requestUrl,
                    blockUI: true,
                    container: "#nav-tabContent",
                    historyPush: ($(RIGHT_MODAL).hasClass('in') ? false : true),
                    data: {
                        'json': true
                    },
                    success: function(response) {
                        if (response.status == "success") {
                            $('#nav-tabContent').html(response.html);
                        }
                    }
                });
            });

            // Update Task
            function updateTask(id, status) {
                var url = "<?php echo e(route('tasks.change_status')); ?>";
                var token = "<?php echo e(csrf_token()); ?>";
                $.easyAjax({
                    url: url,
                    type: "POST",
                    async: false,
                    data: {
                        '_token': token,
                        taskId: id,
                        status: status,
                        sortBy: 'id'
                    },
                    success: function(data) {
                        window.location.reload();
                    }
                })
            }


            $('body').on('click', '.delete-comment', function() {
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
                        var url = "<?php echo e(route('taskComment.destroy', ':id')); ?>";
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
                                    $('#comment-list').html(response.view);
                                }
                            }
                        });
                    }
                });
            });

            $('body').on('click', '.edit-comment', function() {
                var id = $(this).data('row-id');
                var url = "<?php echo e(route('taskComment.edit', ':id')); ?>";
                url = url.replace(':id', id);
                $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
                $.ajaxModal(MODAL_LG, url);
            });

            $('body').on('click', '.delete-subtask', function() {
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
                        var url = "<?php echo e(route('sub-tasks.destroy', ':id')); ?>";
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
                                    $('#sub-task-list').html(response.view);
                                }
                            }
                        });
                    }
                });
            });

            $('body').on('click', '.edit-subtask', function() {
                var id = $(this).data('row-id');
                var url = "<?php echo e(route('sub-tasks.edit', ':id')); ?>";
                url = url.replace(':id', id);
                $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
                $.ajaxModal(MODAL_LG, url);
            });

            $('body').on('change', '.task-check', function() {
                if ($(this).is(':checked')) {
                    var status = 'complete';
                } else {
                    var status = 'incomplete';
                }

                var id = $(this).data('sub-task-id');
                var url = "<?php echo e(route('sub_tasks.change_status')); ?>";
                var token = "<?php echo e(csrf_token()); ?>";

                $.easyAjax({
                    url: url,
                    type: "POST",
                    data: {
                        '_token': token,
                        subTaskId: id,
                        status: status
                    },
                    success: function(response) {
                        if (response.status == "success") {

                            $('#sub-task-list').html(response.view);

                        }
                    }
                })
            });


            $('body').on('click', '.delete-file', function() {
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
                        var url = "<?php echo e(route('task-files.destroy', ':id')); ?>";
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
                                    $('#task-file-list').html(response.view);
                                }
                            }
                        });
                    }
                });
            });

            $('body').on('click', '.delete-note', function() {
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
                        var url = "<?php echo e(route('task-note.destroy', ':id')); ?>";
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
                                    $('#note-list').html(response.view);
                                }
                            }
                        });
                    }
                });
            });

            $('body').on('click', '.edit-note', function() {
                var id = $(this).data('row-id');
                var url = "<?php echo e(route('task-note.edit', ':id')); ?>";
                url = url.replace(':id', id);
                $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
                $.ajaxModal(MODAL_LG, url);
            });

            $('#start-task-timer').click(function() {
                var task_id = "<?php echo e($task->id); ?>";
                var project_id = "<?php echo e($task->project_id); ?>";
                var user_id = "<?php echo e(user()->id); ?>";
                var memo = "<?php echo e($task->heading); ?>";
                var token = "<?php echo e(csrf_token()); ?>";

                $.easyAjax({
                    url: "<?php echo e(route('timelogs.start_timer')); ?>",
                    blockUI: true,
                    type: "POST",
                    data: {
                        task_id: task_id,
                        project_id: project_id,
                        memo: memo,
                        '_token': token,
                        user_id: user_id
                    },
                    success: function(response) {
                        if (response.status == 'success') {
                            window.location.reload();
                        }
                    }
                })
            });

            $('#stop-task-timer').click(function() {
                var id = $(this).data('time-id');
                var url = "<?php echo e(route('timelogs.stop_timer', ':id')); ?>";
                url = url.replace(':id', id);
                var token = '<?php echo e(csrf_token()); ?>';
                $.easyAjax({
                    url: url,
                    blockUI: true,
                    type: "POST",
                    data: {
                        timeId: id,
                        _token: token
                    },
                    success: function(data) {
                        window.location.reload();
                    }
                })
            });

            $('body').on('click', '#reminderButton', function() {
                Swal.fire({
                    title: "<?php echo app('translator')->get('messages.sweetAlertTitle'); ?>",
                    text: "<?php echo app('translator')->get('messages.sendReminder'); ?>",
                    icon: 'warning',
                    showCancelButton: true,
                    focusConfirm: false,
                    confirmButtonText: "<?php echo app('translator')->get('messages.confirmSend'); ?>",
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
                        var url = "<?php echo e(route('tasks.reminder')); ?>";
                        var token = "<?php echo e(csrf_token()); ?>";

                        $.easyAjax({
                            type: 'POST',
                            blockUI: true,
                            url: url,
                            data: {
                                'id': "<?php echo e($task->id); ?>",
                                '_token': token
                            }
                        });
                    }
                });
            });



            init(RIGHT_MODAL);
        });
    </script>
</div>
<?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/tasks/ajax/show.blade.php ENDPATH**/ ?>