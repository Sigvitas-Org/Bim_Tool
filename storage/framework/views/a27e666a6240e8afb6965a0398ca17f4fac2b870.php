<?php $__env->startPush('datatable-styles'); ?>
    <?php echo $__env->make('sections.datatable_css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopPush(); ?>


<?php
$addTaskPermission = user()->permission('add_tasks');
$viewUnassignedTasksPermission = user()->permission('view_unassigned_tasks');
?>


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
        <div class="select-box d-flex pr-2 border-right-grey border-right-grey-sm-0">
            <p class="mb-0 pr-3 f-14 text-dark-grey d-flex align-items-center"><?php echo app('translator')->get('app.date'); ?></p>
            <div class="select-status d-flex">
                <input type="text" class="position-relative text-dark form-control border-0 p-2 text-left f-14 f-w-500"
                    id="datatableRange" placeholder="<?php echo app('translator')->get('placeholders.dateRange'); ?>">
            </div>
        </div>
        <!-- DATE END -->

        <div class="select-box d-flex py-2 px-lg-2 px-md-2 px-0 border-right-grey border-right-grey-sm-0">
            <p class="mb-0 pr-3 f-14 text-dark-grey d-flex align-items-center"><?php echo app('translator')->get('app.status'); ?></p>
            <div class="select-status">
                <select class="form-control select-picker" name="status" id="status" data-live-search="true" data-size="8">
                    <option value="not finished"><?php echo app('translator')->get('modules.tasks.hideCompletedTask'); ?></option>
                    <option <?php echo e(request('status') == 'all' ? 'selected' : ''); ?> value="all"><?php echo app('translator')->get('app.all'); ?></option>
                    <?php $__currentLoopData = $taskBoardStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($status->id); ?>"><?php echo e($status->slug == 'completed' || $status->slug == 'incomplete' ? __('app.' . $status->slug) : mb_ucwords($status->column_name)); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>

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
<?php $component->withAttributes(['class' => 'btn-xs '.e(request('overdue') != 'yes' ? 'd-none' : '').'','id' => 'reset-filters']); ?>
                <?php echo app('translator')->get('app.clearFilters'); ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26)): ?>
<?php $component = $__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26; ?>
<?php unset($__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26); ?>
<?php endif; ?>
        </div>
        <!-- RESET END -->

        <!-- MORE FILTERS START -->
        <?php if (isset($component)) { $__componentOriginal4df579af8bcda72442777a245e1b7bfbf5044457 = $component; } ?>
<?php $component = App\View\Components\Filters\MoreFilterBox::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filters.more-filter-box'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Filters\MoreFilterBox::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
            <div class="more-filter-items">
                <label class="f-14 text-dark-grey mb-12 text-capitalize" for="usr"><?php echo app('translator')->get('app.dateFilterOn'); ?></label>
                <div class="select-filter mb-4">
                    <select class="form-control select-picker" name="date_filter_on" id="date_filter_on">
                        <option value="start_date"><?php echo app('translator')->get('app.startDate'); ?></option>
                        <option value="due_date"><?php echo app('translator')->get('app.dueDate'); ?></option>
                        <option value="completed_on"><?php echo app('translator')->get('app.date'); ?> <?php echo app('translator')->get('app.completed'); ?></option>
                    </select>
                </div>
            </div>
            <div class="more-filter-items">
                <label class="f-14 text-dark-grey mb-12 text-capitalize" for="usr"><?php echo app('translator')->get('modules.tickets.type'); ?></label>
                <div class="select-filter mb-4">
                    <select class="form-control select-picker" name="pinned" id="pinned" data-container="body">
                        <option value="all"><?php echo app('translator')->get('app.all'); ?></option>
                        <option value="pinned"><?php echo app('translator')->get('app.pinned'); ?></option>
                        <option value="private"><?php echo app('translator')->get('app.private'); ?></option>
                    </select>
                </div>
            </div>
            <div class="more-filter-items">
                <label class="f-14 text-dark-grey mb-12 text-capitalize" for="usr"><?php echo app('translator')->get('app.project'); ?></label>
                <div class="select-filter mb-4">
                    <div class="select-others">
                        <select class="form-control select-picker" name="project_id" id="project_id" data-live-search="true"
                            data-container="body" data-size="8">
                            <option value="all"><?php echo app('translator')->get('app.all'); ?></option>
                            <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($project->id); ?>"><?php echo e(mb_ucwords($project->project_name)); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="more-filter-items">
                <label class="f-14 text-dark-grey mb-12 text-capitalize" for="usr"><?php echo app('translator')->get('app.client'); ?></label>
                <div class="select-filter mb-4">
                    <div class="select-others">
                        <select class="form-control select-picker" id="clientID" data-live-search="true"
                            data-container="body" data-size="8">
                            <?php if(!in_array('client', user_roles())): ?>
                                <option value="all"><?php echo app('translator')->get('app.all'); ?></option>
                            <?php endif; ?>
                            <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if (isset($component)) { $__componentOriginal3a9f7815236e62d576ffe72a6df948b4e8598398 = $component; } ?>
<?php $component = App\View\Components\UserOption::resolve(['user' => $client] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('user-option'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\UserOption::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3a9f7815236e62d576ffe72a6df948b4e8598398)): ?>
<?php $component = $__componentOriginal3a9f7815236e62d576ffe72a6df948b4e8598398; ?>
<?php unset($__componentOriginal3a9f7815236e62d576ffe72a6df948b4e8598398); ?>
<?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="more-filter-items">
                <label class="f-14 text-dark-grey mb-12 text-capitalize" for="usr"><?php echo app('translator')->get('modules.tasks.assignTo'); ?></label>
                <div class="select-filter mb-4">
                    <div class="select-others">
                        <select class="form-control select-picker" id="assignedTo" data-live-search="true"
                            data-container="body" data-size="8">
                            <option value="all"><?php echo app('translator')->get('app.all'); ?></option>
                            <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if (isset($component)) { $__componentOriginal3a9f7815236e62d576ffe72a6df948b4e8598398 = $component; } ?>
<?php $component = App\View\Components\UserOption::resolve(['user' => $employee,'selected' => request('assignee') == 'me' && $employee->id == user()->id] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('user-option'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\UserOption::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3a9f7815236e62d576ffe72a6df948b4e8598398)): ?>
<?php $component = $__componentOriginal3a9f7815236e62d576ffe72a6df948b4e8598398; ?>
<?php unset($__componentOriginal3a9f7815236e62d576ffe72a6df948b4e8598398); ?>
<?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php if($viewUnassignedTasksPermission == 'all'): ?>
                                <option value="unassigned"><?php echo app('translator')->get('modules.tasks.unassigned'); ?></option>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="more-filter-items">
                <label class="f-14 text-dark-grey mb-12 text-capitalize" for="usr"><?php echo app('translator')->get('modules.tasks.assignBy'); ?></label>
                <div class="select-filter mb-4">
                    <div class="select-others">
                        <select class="form-control select-picker" id="assignedBY" data-live-search="true"
                            data-container="body" data-size="8">
                            <option value="all"><?php echo app('translator')->get('app.all'); ?></option>
                            <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if (isset($component)) { $__componentOriginal3a9f7815236e62d576ffe72a6df948b4e8598398 = $component; } ?>
<?php $component = App\View\Components\UserOption::resolve(['user' => $employee] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('user-option'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\UserOption::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3a9f7815236e62d576ffe72a6df948b4e8598398)): ?>
<?php $component = $__componentOriginal3a9f7815236e62d576ffe72a6df948b4e8598398; ?>
<?php unset($__componentOriginal3a9f7815236e62d576ffe72a6df948b4e8598398); ?>
<?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="more-filter-items">
                <label class="f-14 text-dark-grey mb-12 text-capitalize" for="usr"><?php echo app('translator')->get('app.label'); ?></label>
                <div class="select-filter mb-4">
                    <div class="select-others">
                        <select class="form-control select-picker" id="label" data-live-search="true" data-container="body"
                            data-size="8">
                            <option value="all"><?php echo app('translator')->get('app.all'); ?></option>
                            <?php $__currentLoopData = $taskLabels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option
                                    data-content="<span class='badge b-all' style='background:<?php echo e($label->label_color); ?>;'><?php echo e($label->label_name); ?></span> "
                                    value="<?php echo e($label->id); ?>"><?php echo e($label->label_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="more-filter-items">
                <label class="f-14 text-dark-grey mb-12 text-capitalize"
                    for="usr"><?php echo app('translator')->get('modules.taskCategory.taskCategory'); ?></label>
                <div class="select-filter mb-4">
                    <div class="select-others">
                        <select class="form-control select-picker" id="category_id" data-live-search="true"
                            data-container="body" data-size="8">
                            <option value="all"><?php echo app('translator')->get('app.all'); ?></option>
                            <?php $__currentLoopData = $taskCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categ): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($categ->id); ?>"><?php echo e(mb_ucwords($categ->category_name)); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="more-filter-items">
                <label class="f-14 text-dark-grey mb-12 text-capitalize" for="usr"><?php echo app('translator')->get('app.billableTask'); ?></label>
                <div class="select-filter mb-4">
                    <div class="select-others">
                        <select class="form-control select-picker" id="billable_task" data-live-search="true"
                            data-container="body" data-size="8">
                            <option value="all"><?php echo app('translator')->get('app.all'); ?></option>
                            <option value="1"><?php echo app('translator')->get('app.yes'); ?></option>
                            <option value="0"><?php echo app('translator')->get('app.no'); ?></option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="more-filter-items">
                <label class="f-14 text-dark-grey mb-12 text-capitalize" for="usr"><?php echo app('translator')->get('modules.projects.milestones'); ?></label>
                <div class="select-filter mb-4">
                    <div class="select-others">
                        <select class="form-control select-picker" id="milestone_id" data-live-search="true"
                            data-container="body" data-size="8">
                            <option value="all"><?php echo app('translator')->get('app.all'); ?></option>
                            <?php $__currentLoopData = $milestones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $milestone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($milestone->id); ?>"><?php echo e($milestone->milestone_title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            </div>

         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4df579af8bcda72442777a245e1b7bfbf5044457)): ?>
<?php $component = $__componentOriginal4df579af8bcda72442777a245e1b7bfbf5044457; ?>
<?php unset($__componentOriginal4df579af8bcda72442777a245e1b7bfbf5044457); ?>
<?php endif; ?>
        <!-- MORE FILTERS END -->
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8063c234a2d1e8800396f6cffced963918807943)): ?>
<?php $component = $__componentOriginal8063c234a2d1e8800396f6cffced963918807943; ?>
<?php unset($__componentOriginal8063c234a2d1e8800396f6cffced963918807943); ?>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- CONTENT WRAPPER START -->
    <div class="content-wrapper">
        <!-- Add Task Export Buttons Start -->
        <div class="d-block d-lg-flex d-md-flex justify-content-between action-bar">
            <div id="table-actions" class="flex-grow-1 align-items-center">
                <?php if($addTaskPermission == 'all' || $addTaskPermission == 'added'): ?>
                    <?php if (isset($component)) { $__componentOriginal7f662ecf9f97aca611d2405e5e6903e6081fbd17 = $component; } ?>
<?php $component = App\View\Components\Forms\LinkPrimary::resolve(['link' => route('tasks.create'),'icon' => 'plus'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.link-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\LinkPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-3 openRightModal float-left']); ?>
                        <?php echo app('translator')->get('app.add'); ?>
                        <?php echo app('translator')->get('app.task'); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7f662ecf9f97aca611d2405e5e6903e6081fbd17)): ?>
<?php $component = $__componentOriginal7f662ecf9f97aca611d2405e5e6903e6081fbd17; ?>
<?php unset($__componentOriginal7f662ecf9f97aca611d2405e5e6903e6081fbd17); ?>
<?php endif; ?>
                <?php endif; ?>

                <?php if(!in_array('client', user_roles())): ?>
                    <?php if (isset($component)) { $__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26 = $component; } ?>
<?php $component = App\View\Components\Forms\ButtonSecondary::resolve(['icon' => 'user'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonSecondary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'filter-my-task','class' => 'mr-3 float-left']); ?>
                        <?php echo app('translator')->get('modules.tasks.myTask'); ?>
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
                <div class="select-status mr-3 pl-lg-3">
                    <select name="action_type" class="form-control select-picker" id="quick-action-type" disabled>
                        <option value=""><?php echo app('translator')->get('app.selectAction'); ?></option>
                        <option value="change-status"><?php echo app('translator')->get('modules.tasks.changeStatus'); ?></option>
                        <option value="delete"><?php echo app('translator')->get('app.delete'); ?></option>
                    </select>
                </div>
                <div class="select-status mr-3 d-none quick-action-field" id="change-status-action">
                    <select name="status" class="form-control select-picker">
                        <?php $__currentLoopData = $taskBoardStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($status->id); ?>"><?php echo e($status->slug == 'completed' || $status->slug == 'incomplete' ? __('app.' . $status->slug) : mb_ucwords($status->column_name)); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal95e73aded82dd7c8c0f260f95142b37107c1ffe8)): ?>
<?php $component = $__componentOriginal95e73aded82dd7c8c0f260f95142b37107c1ffe8; ?>
<?php unset($__componentOriginal95e73aded82dd7c8c0f260f95142b37107c1ffe8); ?>
<?php endif; ?>

            <div class="btn-group mt-3 mt-lg-0 mt-md-0 ml-lg-3" role="group">
                <a href="<?php echo e(route('tasks.index')); ?>" class="btn btn-secondary f-14 btn-active task" data-toggle="tooltip"
                    data-original-title="<?php echo app('translator')->get('app.menu.tasks'); ?>"><i class="side-icon bi bi-list-ul"></i></a>

                <a href="<?php echo e(route('taskboards.index')); ?>" class="btn btn-secondary f-14" data-toggle="tooltip"
                    data-original-title="<?php echo app('translator')->get('modules.tasks.taskBoard'); ?>"><i class="side-icon bi bi-kanban"></i></a>

                <a href="<?php echo e(route('task-calendar.index')); ?>" class="btn btn-secondary f-14" data-toggle="tooltip"
                    data-original-title="<?php echo app('translator')->get('app.menu.calendar'); ?>"><i class="side-icon bi bi-calendar"></i></a>

                <a href="javascript:;" class="btn btn-secondary f-14 show-pinned" data-toggle="tooltip"
                    data-original-title="<?php echo app('translator')->get('app.pinned'); ?>"><i class="side-icon bi bi-pin-angle"></i></a>
            </div>
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
        $('#allTasks-table').on('preXhr.dt', function(e, settings, data) {

            var dateRangePicker = $('#datatableRange').data('daterangepicker');
            var startDate = $('#datatableRange').val();

            if (startDate == '') {
                startDate = null;
                endDate = null;
            } else {
                startDate = dateRangePicker.startDate.format('<?php echo e(company()->moment_date_format); ?>');
                endDate = dateRangePicker.endDate.format('<?php echo e(company()->moment_date_format); ?>');
            }

            var projectID = $('#project_id').val();
            if (!projectID) {
                projectID = 0;
            }


            var clientID = $('#clientID').val();
            var assignedBY = $('#assignedBY').val();
            var assignedTo = $('#assignedTo').val();
            var status = $('#status').val();
            var label = $('#label').val();
            var category_id = $('#category_id').val();
            var billable = $('#billable_task').val();
            var pinned = $('#pinned').val();
            var date_filter_on = $('#date_filter_on').val();
            var searchText = $('#search-text-field').val();
            var milestone_id = $('#milestone_id').val();

            data['clientID'] = clientID;
            data['assignedBY'] = assignedBY;
            data['assignedTo'] = assignedTo;
            data['status'] = status;
            data['status'] = status;
            data['label'] = label;
            data['category_id'] = category_id;
            data['billable'] = billable;
            data['projectId'] = projectID;
            data['pinned'] = pinned;
            data['date_filter_on'] = date_filter_on;
            data['startDate'] = startDate;
            data['endDate'] = endDate;
            data['searchText'] = searchText;
            data['milestone_id'] = milestone_id;
        });
        const showTable = () => {
            window.LaravelDataTables["allTasks-table"].draw(false);
        }

        $('#milestone_id, #billable_task, #status, #clientID, #category_id, #assignedBY, #assignedTo, #label, #project_id, #pinned, #date_filter_on')
            .on('change keyup',
                function() {
                    if ($('#status').val() != "not finished") {
                        $('#reset-filters').removeClass('d-none');
                        showTable();
                    } else if ($('#project_id').val() != "all") {
                        $('#reset-filters').removeClass('d-none');
                        showTable();
                    } else if ($('#clientID').val() != "all") {
                        $('#reset-filters').removeClass('d-none');
                        showTable();
                    } else if ($('#category_id').val() != "all") {
                        $('#reset-filters').removeClass('d-none');
                        showTable();
                    } else if ($('#assignedBY').val() != "all") {
                        $('#reset-filters').removeClass('d-none');
                        showTable();
                    } else if ($('#assignedTo').val() != "all") {
                        $('#reset-filters').removeClass('d-none');
                        showTable();
                    } else if ($('#label').val() != "all") {
                        $('#reset-filters').removeClass('d-none');
                        showTable();
                    } else if ($('#billable_task').val() != "all") {
                        $('#reset-filters').removeClass('d-none');
                        showTable();
                    }else if ($('#milestone_id').val() != "all") {
                        $('#reset-filters').removeClass('d-none');
                        showTable();
                    } else if ($('#pinned').val() != "all") {
                        $('#reset-filters').removeClass('d-none');
                        showTable();
                    }  else if ($('#date_filter_on').val() != "start_date") {
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

        $('.show-pinned').click(function() {
            $('.task').removeClass('btn-active');

            if ($(this).hasClass('btn-active')) {
                $('#pinned').val('all');
            } else {
                $('#pinned').val('pinned');
            }

            $('#pinned').selectpicker('refresh');
            $(this).toggleClass('btn-active');
            $('#reset-filters').removeClass('d-none');
            showTable();
        });

        $('#reset-filters,#reset-filters-2').click(function() {
            $('#filter-form')[0].reset();

            $('.filter-box #status').val('not finished');
            $('.filter-box #date_filter_on').val('start_date');
            $('.filter-box #assignedTo').val('all');
            $('.filter-box .select-picker').selectpicker("refresh");
            $('#reset-filters').addClass('d-none');
            showTable();
        });

        $('#quick-action-type').change(function() {
            const actionValue = $(this).val();
            if (actionValue != '') {
                $('#quick-action-apply').removeAttr('disabled');

                if (actionValue == 'change-status') {
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
                    var url = "<?php echo e(route('tasks.destroy', ':id')); ?>";
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
            var rowdIds = $("#allTasks-table input:checkbox:checked").map(function() {
                return $(this).val();
            }).get();

            var url = "<?php echo e(route('tasks.apply_quick_action')); ?>?row_ids=" + rowdIds;

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

        $('#allTasks-table').on('change', '.change-status', function() {
            var url = "<?php echo e(route('tasks.change_status')); ?>";
            var token = "<?php echo e(csrf_token()); ?>";
            var id = $(this).data('task-id');
            var status = $(this).val();

            if (id != "" && status != "") {
                $.easyAjax({
                    url: url,
                    type: "POST",
                    container: '.content-wrapper',
                    blockUI: true,
                    data: {
                        '_token': token,
                        taskId: id,
                        status: status,
                        sortBy: 'id'
                    },
                    success: function(data) {
                        window.LaravelDataTables["allTasks-table"].draw(false);
                    }
                });

            }
        });

        $('#filter-my-task').click(function () {
            $('.filter-box #assignedTo').val('<?php echo e(user()->id); ?>');
            $('.filter-box .select-picker').selectpicker("refresh");
            $('#reset-filters').removeClass('d-none');
            showTable();
        });

        $('#allTasks-table').on('click', '.start-timer', function() {
            var url = "<?php echo e(route('timelogs.start_timer')); ?>";
            var user_id = "<?php echo e(user()->id); ?>";
            var token = "<?php echo e(csrf_token()); ?>";
            var task_id = $(this).data('task-id');
            var memo = "<?php echo e(__('app.task')); ?>#" + $(this).data('task-id');

            $.easyAjax({
                url: url,
                container: '#allTasks-table',
                type: "POST",
                blockUI: true,
                data: {
                    task_id: task_id,
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

        $('#allTasks-table').on('click', '.stop-timer', function() {
            var id = $(this).data('time-id');
            var url = "<?php echo e(route('timelogs.stop_timer', ':id')); ?>";
            url = url.replace(':id', id);
            var token = '<?php echo e(csrf_token()); ?>';
            $.easyAjax({
                url: url,
                blockUI: true,
                container: '#allTasks-table',
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

        $('#allTasks-table').on('click', '.resume-timer', function() {
            var id = $(this).data('time-id');
            var url = "<?php echo e(route('timelogs.resume_timer', ':id')); ?>";
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
                success: function(response) {
                    if (response.status == 'success') {
                        showTable();
                    }
                }
            })
        });

        $('#allTasks-table').on('click', '.pause-timer', function() {
            var id = $(this).data('time-id');
            var url = "<?php echo e(route('timelogs.pause_timer', ':id')); ?>";
            url = url.replace(':id', id);
            var token = '<?php echo e(csrf_token()); ?>';
            $.easyAjax({
                url: url,
                blockUI: true,
                type: "POST",
                disableButton: true,
                buttonSelector: "#pause-timer-btn",
                data: {
                    timeId: id,
                    _token: token
                },
                success: function(response) {
                    if (response.status == 'success') {
                    showTable();
                    }
                }
            })
        });


    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/tasks/index.blade.php ENDPATH**/ ?>