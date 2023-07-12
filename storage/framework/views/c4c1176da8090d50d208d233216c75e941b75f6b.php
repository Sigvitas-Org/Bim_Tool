<?php
$addTaskCategoryPermission = user()->permission('add_task_category');
$viewTaskCategoryPermission = user()->permission('view_task_category');
$addEmployeePermission = user()->permission('add_employees');
$addTaskFilePermission = user()->permission('add_task_files');
$addTaskPermission = user()->permission('add_tasks');
$viewMilestonePermission = user()->permission('view_project_milestones');
$checked = request()->has('duplicate_task') ? ($projectId = $task->project_id) : ($projectId = '');
?>

<link rel="stylesheet" href="<?php echo e(asset('vendor/css/dropzone.min.css')); ?>">

<div class="row">
    <div class="col-sm-12">
        <?php if (isset($component)) { $__componentOriginal0777dca6b0ab2eebdcaf6ba884d5b30ab61203a6 = $component; } ?>
<?php $component = App\View\Components\Form::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Form::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'save-task-data-form']); ?>
            <div class="add-client bg-white rounded">
                <h4 class="mb-0 p-20 f-21 font-weight-normal text-capitalize border-bottom-grey">
                    <?php echo app('translator')->get('modules.tasks.taskInfo'); ?></h4>
                <div class="row p-20">

                    <div class="col-lg-6 col-md-6">
                        <?php if (isset($component)) { $__componentOriginal3985d2df1d9ef7c51070d7c0b8f4b0e4589145ab = $component; } ?>
<?php $component = App\View\Components\Forms\Text::resolve(['fieldLabel' => __('app.title'),'fieldName' => 'heading','fieldRequired' => 'true','fieldId' => 'heading','fieldPlaceholder' => __('placeholders.task'),'fieldValue' => $task ? $task->heading : ''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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

                    <div class="col-md-6 col-lg-6">
                        <?php if (isset($component)) { $__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad = $component; } ?>
<?php $component = App\View\Components\Forms\Label::resolve(['fieldId' => 'category_id','fieldLabel' => __('modules.tasks.taskCategory')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Label::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'my-3']); ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad)): ?>
<?php $component = $__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad; ?>
<?php unset($__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal863bfe686851606453ee7ca47b08abfa2e4810a8 = $component; } ?>
<?php $component = App\View\Components\Forms\InputGroup::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.input-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\InputGroup::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                            <select class="form-control select-picker" name="category_id" id="task_category_id"
                                data-live-search="true" data-size="8">
                                <option value="">--</option>
                                <?php if($viewTaskCategoryPermission == 'all' || $viewTaskCategoryPermission == 'added'): ?>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php if(!is_null($task) && $task->task_category_id == $category->id): ?> selected <?php endif; ?> value="<?php echo e($category->id); ?>"><?php echo e(mb_ucwords($category->category_name)); ?>

                                        </option>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </select>

                            <?php if($addTaskCategoryPermission == 'all' || $addTaskCategoryPermission == 'added'): ?>
                                 <?php $__env->slot('append', null, []); ?> 
                                    <button id="create_task_category" type="button"
                                        class="btn btn-outline-secondary border-grey"
                                        data-toggle="tooltip" data-original-title="<?php echo e(__('modules.taskCategory.addTaskCategory')); ?>"><?php echo app('translator')->get('app.add'); ?></button>
                                 <?php $__env->endSlot(); ?>
                            <?php endif; ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal863bfe686851606453ee7ca47b08abfa2e4810a8)): ?>
<?php $component = $__componentOriginal863bfe686851606453ee7ca47b08abfa2e4810a8; ?>
<?php unset($__componentOriginal863bfe686851606453ee7ca47b08abfa2e4810a8); ?>
<?php endif; ?>
                    </div>

                    <div class="col-md-12 col-lg-6">
                        <?php if(isset($project) && !is_null($project)): ?>
                            <input type="hidden" name="project_id" id="project_id" value="<?php echo e($project->id); ?>">
                            <input type="hidden" name="task_project_id" value="<?php echo e($project->id); ?>">
                            <?php if (isset($component)) { $__componentOriginal3985d2df1d9ef7c51070d7c0b8f4b0e4589145ab = $component; } ?>
<?php $component = App\View\Components\Forms\Text::resolve(['fieldLabel' => __('app.project'),'fieldName' => 'projectName','fieldId' => 'projectName','fieldValue' => $project->project_name,'fieldReadOnly' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                        <?php else: ?>
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
                                    <option <?php if((isset($project) && $project->id == $data->id) || ( !is_null($task) && $data->id == $task->project_id)): ?> selected <?php endif; ?> value="<?php echo e($data->id); ?>">
                                        <?php echo e(mb_ucwords($data->project_name)); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalaa9e2e00dcec6b58db49b9128f7191370bc93381)): ?>
<?php $component = $__componentOriginalaa9e2e00dcec6b58db49b9128f7191370bc93381; ?>
<?php unset($__componentOriginalaa9e2e00dcec6b58db49b9128f7191370bc93381); ?>
<?php endif; ?>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-6 col-lg-6 pt-5" id='clientDetails'></div>


                    <div class="col-md-5 col-lg-3">
                        <?php if (isset($component)) { $__componentOriginal375ba69c4c90abc0fec300a948e1f40a31222641 = $component; } ?>
<?php $component = App\View\Components\Forms\Datepicker::resolve(['fieldId' => 'task_start_date','fieldRequired' => 'true','fieldLabel' => __('modules.projects.startDate'),'fieldName' => 'start_date','fieldValue' => (($task) ? $task->start_date->format(company()->date_format) : \Carbon\Carbon::now(company()->timezone)->format(company()->date_format)),'fieldPlaceholder' => __('placeholders.date')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.datepicker'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Datepicker::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal375ba69c4c90abc0fec300a948e1f40a31222641)): ?>
<?php $component = $__componentOriginal375ba69c4c90abc0fec300a948e1f40a31222641; ?>
<?php unset($__componentOriginal375ba69c4c90abc0fec300a948e1f40a31222641); ?>
<?php endif; ?>
                    </div>

                    <div class="col-md-5 col-lg-3 dueDateBox"  <?php if($task && is_null($task->due_date)): ?> style="display: none" <?php endif; ?>>
                        <?php if (isset($component)) { $__componentOriginal375ba69c4c90abc0fec300a948e1f40a31222641 = $component; } ?>
<?php $component = App\View\Components\Forms\Datepicker::resolve(['fieldId' => 'due_date','fieldRequired' => 'true','fieldLabel' => __('app.dueDate'),'fieldName' => 'due_date','fieldPlaceholder' => __('placeholders.date'),'fieldValue' => (($task && $task->due_date) ? $task->due_date->format(company()->date_format) : \Carbon\Carbon::now(company()->timezone)->format(company()->date_format))] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.datepicker'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Datepicker::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal375ba69c4c90abc0fec300a948e1f40a31222641)): ?>
<?php $component = $__componentOriginal375ba69c4c90abc0fec300a948e1f40a31222641; ?>
<?php unset($__componentOriginal375ba69c4c90abc0fec300a948e1f40a31222641); ?>
<?php endif; ?>
                    </div>
                    <div class="col-md-2 col-lg-2 pt-5">
                        <?php if (isset($component)) { $__componentOriginaldf5bb0e32b087bca724e42ed3cdc51682b267e1e = $component; } ?>
<?php $component = App\View\Components\Forms\Checkbox::resolve(['checked' => $task ? is_null($task->due_date) : '','fieldLabel' => __('app.withoutDueDate'),'fieldName' => 'without_duedate','fieldId' => 'without_duedate','fieldValue' => 'yes'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Checkbox::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-0 mr-lg-2 mr-md-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldf5bb0e32b087bca724e42ed3cdc51682b267e1e)): ?>
<?php $component = $__componentOriginaldf5bb0e32b087bca724e42ed3cdc51682b267e1e; ?>
<?php unset($__componentOriginaldf5bb0e32b087bca724e42ed3cdc51682b267e1e); ?>
<?php endif; ?>
                    </div>

                    <div class="col-md-12 col-lg-12">
                    </div>

                    <div class="col-md-12 col-lg-8">
                        <div class="form-group my-3">
                            <?php if (isset($component)) { $__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad = $component; } ?>
<?php $component = App\View\Components\Forms\Label::resolve(['fieldId' => 'selectAssignee','fieldLabel' => __('modules.tasks.assignTo')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                            <?php if (isset($component)) { $__componentOriginal863bfe686851606453ee7ca47b08abfa2e4810a8 = $component; } ?>
<?php $component = App\View\Components\Forms\InputGroup::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.input-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\InputGroup::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                <select class="form-control multiple-users" multiple name="user_id[]"
                                    id="selectAssignee" data-live-search="true" data-size="8">
                                    <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if (isset($component)) { $__componentOriginal3a9f7815236e62d576ffe72a6df948b4e8598398 = $component; } ?>
<?php $component = App\View\Components\UserOption::resolve(['user' => $item,'pill' => true,'selected' => (isset($defaultAssignee) && $defaultAssignee == $item->id) || (!is_null($task) && isset($projectMember) && in_array($item->id, $projectMember))] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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

                                 <?php $__env->slot('preappend', null, []); ?> 
                                    <button id="assign-self" type="button"
                                        class="btn btn-outline-secondary border-grey" data-toggle="tooltip"
                                        data-original-title="<?php echo app('translator')->get('modules.tasks.assignMe'); ?>">
                                        <img src="<?php echo e(user()->image_url); ?>" width="23"
                                            class="img-fluid rounded-circle">
                                    </button>
                                 <?php $__env->endSlot(); ?>

                                <?php if($addEmployeePermission == 'all' || $addEmployeePermission == 'added'): ?>
                                     <?php $__env->slot('append', null, []); ?> 
                                        <button id="add-employee" type="button"
                                            class="btn btn-outline-secondary border-grey"
                                            data-toggle="tooltip" data-original-title="<?php echo e(__('modules.employees.addNewEmployee')); ?>"><?php echo app('translator')->get('app.add'); ?></button>
                                     <?php $__env->endSlot(); ?>
                                <?php endif; ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal863bfe686851606453ee7ca47b08abfa2e4810a8)): ?>
<?php $component = $__componentOriginal863bfe686851606453ee7ca47b08abfa2e4810a8; ?>
<?php unset($__componentOriginal863bfe686851606453ee7ca47b08abfa2e4810a8); ?>
<?php endif; ?>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <?php if (isset($component)) { $__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad = $component; } ?>
<?php $component = App\View\Components\Forms\Label::resolve(['fieldId' => 'description','fieldLabel' => __('app.description')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                            <div id="description"><?php echo $task ? $task->description : ''; ?></div>
                            <textarea name="description" id="description-text" class="d-none"></textarea>
                        </div>
                    </div>

                </div>

                <h4 class="mb-0 p-20 f-21 font-weight-normal text-capitalize border-top-grey other-details-button">
                    <a href="javascript:;" class="text-dark toggle-other-details"><i class="fa fa-chevron-down"></i>
                        <?php echo app('translator')->get('modules.client.clientOtherDetails'); ?></a>
                </h4>

                <div class="row p-20 d-none" id="other-details">

                    <div class="col-sm-12">
                        <div class="row">

                            <div class="col-md-12 col-lg-4">
                                <div class="form-group my-3">
                                    <?php if (isset($component)) { $__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad = $component; } ?>
<?php $component = App\View\Components\Forms\Label::resolve(['fieldId' => 'task_labels','fieldLabel' => __('app.label')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                                    <?php if (isset($component)) { $__componentOriginal863bfe686851606453ee7ca47b08abfa2e4810a8 = $component; } ?>
<?php $component = App\View\Components\Forms\InputGroup::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.input-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\InputGroup::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                        <select class="select-picker form-control" multiple name="task_labels[]"
                                            id="task_labels" data-live-search="true" data-size="8">
                                            <?php $__currentLoopData = $taskLabels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option
                                                    data-content="<span class='badge badge-secondary' style='background-color: <?php echo e($label->label_color); ?>'><?php echo e($label->label_name); ?></span>"
                                                    value="<?php echo e($label->id); ?>" <?php if($task && isset($selectedLabel) && in_array($label->id, $selectedLabel)): ?> selected <?php endif; ?>><?php echo e($label->label_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>

                                        <?php if(user()->permission('task_labels') == 'all'): ?>
                                             <?php $__env->slot('append', null, []); ?> 
                                                <button id="createTaskLabel" type="button"
                                                    class="btn btn-outline-secondary border-grey"
                                                    data-toggle="tooltip" data-original-title="<?php echo e(__('modules.taskLabel.addLabel')); ?>"><?php echo app('translator')->get('app.add'); ?></button>
                                             <?php $__env->endSlot(); ?>
                                        <?php endif; ?>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal863bfe686851606453ee7ca47b08abfa2e4810a8)): ?>
<?php $component = $__componentOriginal863bfe686851606453ee7ca47b08abfa2e4810a8; ?>
<?php unset($__componentOriginal863bfe686851606453ee7ca47b08abfa2e4810a8); ?>
<?php endif; ?>
                                </div>
                            </div>

                            <div class="col-md-12 col-lg-4">
                                <?php if (isset($component)) { $__componentOriginalaa9e2e00dcec6b58db49b9128f7191370bc93381 = $component; } ?>
<?php $component = App\View\Components\Forms\Select::resolve(['fieldName' => 'milestone_id','fieldId' => 'milestone-id','fieldLabel' => __('modules.projects.milestones')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                    <option value="">--</option>
                                    <?php if($project): ?>
                                        <?php if(in_array($viewMilestonePermission,['all','owned','added']) || user()->id == $project->client_id): ?>
                                            <?php $__currentLoopData = $milestones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($item->id); ?>"
                                                        <?php if(!is_null($task) && $item->id == $task->milestone_id): ?> selected <?php endif; ?>><?php echo e($item->milestone_title); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalaa9e2e00dcec6b58db49b9128f7191370bc93381)): ?>
<?php $component = $__componentOriginalaa9e2e00dcec6b58db49b9128f7191370bc93381; ?>
<?php unset($__componentOriginalaa9e2e00dcec6b58db49b9128f7191370bc93381); ?>
<?php endif; ?>
                            </div>

                            <?php if(user()->permission('change_status') == 'all'): ?>
                                <div class="col-lg-3 col-md-6">
                                    <?php if (isset($component)) { $__componentOriginalaa9e2e00dcec6b58db49b9128f7191370bc93381 = $component; } ?>
<?php $component = App\View\Components\Forms\Select::resolve(['fieldId' => 'board_column_id','fieldLabel' => __('app.status'),'fieldName' => 'board_column_id','search' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                        <?php $__currentLoopData = $taskboardColumns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php if($columnId == $item->id || ( !is_null($task) && $task->board_column_id == $item->id)): ?> selected <?php elseif(company()->default_task_status == $item->id): ?> selected <?php endif; ?> value="<?php echo e($item->id); ?>">
                                                <?php echo e($item->slug == 'completed' || $item->slug == 'incomplete' ? __('app.' . $item->slug) : $item->column_name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalaa9e2e00dcec6b58db49b9128f7191370bc93381)): ?>
<?php $component = $__componentOriginalaa9e2e00dcec6b58db49b9128f7191370bc93381; ?>
<?php unset($__componentOriginalaa9e2e00dcec6b58db49b9128f7191370bc93381); ?>
<?php endif; ?>
                                </div>
                            <?php endif; ?>

                            <div class="col-lg-3 col-md-6">
                                <?php if (isset($component)) { $__componentOriginalaa9e2e00dcec6b58db49b9128f7191370bc93381 = $component; } ?>
<?php $component = App\View\Components\Forms\Select::resolve(['fieldId' => 'priority','fieldLabel' => __('modules.tasks.priority'),'fieldName' => 'priority'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                    <option <?php if(!is_null($task) && $task->priority == 'high'): ?> selected <?php endif; ?> value="high"><?php echo app('translator')->get('modules.tasks.high'); ?></option>
                                    <option <?php if(!is_null($task) && $task->priority == 'medium'): ?> selected <?php endif; ?> value="medium" <?php if(is_null($task)): ?> selected <?php endif; ?>><?php echo app('translator')->get('modules.tasks.medium'); ?></option>
                                    <option <?php if(!is_null($task) && $task->priority == 'low'): ?> selected <?php endif; ?> value="low"><?php echo app('translator')->get('modules.tasks.low'); ?></option>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalaa9e2e00dcec6b58db49b9128f7191370bc93381)): ?>
<?php $component = $__componentOriginalaa9e2e00dcec6b58db49b9128f7191370bc93381; ?>
<?php unset($__componentOriginalaa9e2e00dcec6b58db49b9128f7191370bc93381); ?>
<?php endif; ?>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-6 col-lg-3">
                        <div class="form-group">
                            <div class="d-flex mt-5">
                                <?php if (isset($component)) { $__componentOriginaldf5bb0e32b087bca724e42ed3cdc51682b267e1e = $component; } ?>
<?php $component = App\View\Components\Forms\Checkbox::resolve(['fieldLabel' => __('modules.tasks.makePrivate'),'fieldName' => 'is_private','fieldId' => 'is_private','popover' => __('modules.tasks.privateInfo'),'checked' => $task ? $task->is_private : ''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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

                    <div class="col-md-6 col-lg-3">
                        <div class="form-group">
                            <div class="d-flex mt-5">
                                <?php if (isset($component)) { $__componentOriginaldf5bb0e32b087bca724e42ed3cdc51682b267e1e = $component; } ?>
<?php $component = App\View\Components\Forms\Checkbox::resolve(['fieldLabel' => __('modules.tasks.billable'),'checked' => $task ? $task->billable : '','fieldName' => 'billable','fieldId' => 'billable','popover' => __('modules.tasks.billableInfo')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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

                    <div class="col-md-6 col-lg-3">
                        <div class="form-group">
                            <div class="d-flex mt-5">
                                <?php if (isset($component)) { $__componentOriginaldf5bb0e32b087bca724e42ed3cdc51682b267e1e = $component; } ?>
<?php $component = App\View\Components\Forms\Checkbox::resolve(['fieldLabel' => __('modules.tasks.setTimeEstimate'),'fieldName' => 'set_time_estimate','fieldId' => 'set_time_estimate','checked' => ($task ? $task->estimate_hours > 0 || $task->estimate_minutes > 0 : '')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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

                    <div class="col-md-6 col-lg-3 d-none" id="set-time-estimate-fields">
                        <div class="form-group mt-5">
                            <input type="number" min="0" class="w-25 border rounded p-2 height-35 f-14"
                                name="estimate_hours" value="<?php echo e($task ? $task->estimate_hours : '0'); ?>">
                            <?php echo app('translator')->get('app.hrs'); ?>
                            &nbsp;&nbsp;
                            <input type="number" min="0" name="estimate_minutes"
                            value="<?php echo e($task ? $task->estimate_minutes : '0'); ?>" class="w-25 height-35 f-14 border rounded p-2">
                            <?php echo app('translator')->get('app.mins'); ?>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group my-3">
                            <div class="d-flex">
                                <?php if (isset($component)) { $__componentOriginaldf5bb0e32b087bca724e42ed3cdc51682b267e1e = $component; } ?>
<?php $component = App\View\Components\Forms\Checkbox::resolve(['fieldLabel' => __('modules.events.repeat'),'fieldName' => 'repeat','fieldId' => 'repeat-task','checked' => $task ? $task->repeat : ''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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

                        <div class="form-group my-3 <?php echo e(!is_null($task) && $task->repeat ? '' : 'd-none'); ?>" id="repeat-fields">
                            <div class="row">
                                <div class="col-md-6 mt-3">
                                    <?php if (isset($component)) { $__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad = $component; } ?>
<?php $component = App\View\Components\Forms\Label::resolve(['fieldId' => 'repeatEvery','fieldRequired' => 'true','fieldLabel' => __('modules.events.repeatEvery')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                                    <?php if (isset($component)) { $__componentOriginal863bfe686851606453ee7ca47b08abfa2e4810a8 = $component; } ?>
<?php $component = App\View\Components\Forms\InputGroup::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.input-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\InputGroup::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                        <input type="number" min="1" name="repeat_count"
                                            class="form-control f-14" value="<?php echo e($task ? $task->repeat_count : '1'); ?>">

                                         <?php $__env->slot('append', null, []); ?> 
                                            <select name="repeat_type" class="select-picker form-control">
                                                <option value="day" <?php if(!is_null($task) && $task->repeat_type == 'day'): ?> selected <?php endif; ?>><?php echo app('translator')->get('app.day'); ?></option>
                                                <option value="week" <?php if(!is_null($task) && $task->repeat_type == 'week'): ?> selected <?php endif; ?>><?php echo app('translator')->get('app.week'); ?></option>
                                                <option value="month" <?php if(!is_null($task) && $task->repeat_type == 'month'): ?> selected <?php endif; ?>><?php echo app('translator')->get('app.month'); ?></option>
                                                <option value="year" <?php if(!is_null($task) && $task->repeat_type == 'year'): ?> selected <?php endif; ?>><?php echo app('translator')->get('app.year'); ?></option>
                                            </select>
                                         <?php $__env->endSlot(); ?>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal863bfe686851606453ee7ca47b08abfa2e4810a8)): ?>
<?php $component = $__componentOriginal863bfe686851606453ee7ca47b08abfa2e4810a8; ?>
<?php unset($__componentOriginal863bfe686851606453ee7ca47b08abfa2e4810a8); ?>
<?php endif; ?>
                                </div>
                                <div class="col-md-6">
                                    <?php if (isset($component)) { $__componentOriginal9cc635f9ffa1f2f42c8f27975e194fec79eaad2c = $component; } ?>
<?php $component = App\View\Components\Forms\Number::resolve(['fieldLabel' => __('modules.events.cycles'),'fieldName' => 'repeat_cycles','fieldRequired' => 'true','fieldValue' => $task ? $task->repeat_cycles : '1','minValue' => '1','fieldId' => 'repeat_cycles','fieldPlaceholder' => __('modules.tasks.cyclesToolTip'),'popover' => __('modules.tasks.cyclesToolTip')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.number'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Number::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9cc635f9ffa1f2f42c8f27975e194fec79eaad2c)): ?>
<?php $component = $__componentOriginal9cc635f9ffa1f2f42c8f27975e194fec79eaad2c; ?>
<?php unset($__componentOriginal9cc635f9ffa1f2f42c8f27975e194fec79eaad2c); ?>
<?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php if(is_null($task)): ?>
                    <div class="col-md-6">
                        <div class="form-group my-3">
                            <div class="d-flex">
                                <?php if (isset($component)) { $__componentOriginaldf5bb0e32b087bca724e42ed3cdc51682b267e1e = $component; } ?>
<?php $component = App\View\Components\Forms\Checkbox::resolve(['fieldLabel' => __('modules.tasks.dependent'),'fieldName' => 'dependent','fieldId' => 'dependent-task'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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

                        <div class="d-none" id="dependent-fields">
                            <?php if (isset($component)) { $__componentOriginalaa9e2e00dcec6b58db49b9128f7191370bc93381 = $component; } ?>
<?php $component = App\View\Components\Forms\Select::resolve(['fieldId' => 'dependent_task_id','fieldLabel' => __('modules.tasks.dependentTask'),'fieldName' => 'dependent_task_id','search' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                <option value="">--</option>
                                <?php $__currentLoopData = $allTasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->heading); ?> (<?php echo app('translator')->get('app.dueDate'); ?>:
                                        <?php if(!is_null($item->due_date)): ?> <?php echo e($item->due_date->format(company()->date_format)); ?> <?php else: ?> - <?php endif; ?> )
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
                    <?php endif; ?>

                    <?php if($addTaskFilePermission == 'all' || $addTaskFilePermission == 'added'): ?>
                        <div class="col-lg-12">
                            <?php if (isset($component)) { $__componentOriginal97f972d3036ec98e45782eab9a9572b3af7fcdb9 = $component; } ?>
<?php $component = App\View\Components\Forms\FileMultiple::resolve(['fieldLabel' => __('app.add') . ' ' .__('app.file'),'fieldName' => 'file','fieldId' => 'task-file-upload-dropzone'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.file-multiple'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\FileMultiple::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-0 mr-lg-2 mr-md-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal97f972d3036ec98e45782eab9a9572b3af7fcdb9)): ?>
<?php $component = $__componentOriginal97f972d3036ec98e45782eab9a9572b3af7fcdb9; ?>
<?php unset($__componentOriginal97f972d3036ec98e45782eab9a9572b3af7fcdb9); ?>
<?php endif; ?>
                            <input type="hidden" name="image_url" id="image_url">
                        </div>
                        <input type="hidden" name="taskID" id="taskID">
                        <input type="hidden" name="addedFiles" id="addedFiles">
                    <?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginal862ccabe24b67fc8444492fe81a4111be42270d7 = $component; } ?>
<?php $component = App\View\Components\Forms\CustomField::resolve(['fields' => $fields] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.custom-field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\CustomField::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'col-sm-12']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal862ccabe24b67fc8444492fe81a4111be42270d7)): ?>
<?php $component = $__componentOriginal862ccabe24b67fc8444492fe81a4111be42270d7; ?>
<?php unset($__componentOriginal862ccabe24b67fc8444492fe81a4111be42270d7); ?>
<?php endif; ?>

                </div>



                <?php if (isset($component)) { $__componentOriginalfc2695d0fb2b25f1a4057d7bc43eb62e95aaec66 = $component; } ?>
<?php $component = App\View\Components\FormActions::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form-actions'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\FormActions::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    <?php if (isset($component)) { $__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480 = $component; } ?>
<?php $component = App\View\Components\Forms\ButtonPrimary::resolve(['icon' => 'check'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-3','id' => 'save-task-form']); ?><?php echo app('translator')->get('app.save'); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480)): ?>
<?php $component = $__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480; ?>
<?php unset($__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26 = $component; } ?>
<?php $component = App\View\Components\Forms\ButtonSecondary::resolve(['icon' => 'check-double'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonSecondary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-3 d-none d-md-block','id' => 'save-more-task-form']); ?><?php echo app('translator')->get('app.saveAddMore'); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26)): ?>
<?php $component = $__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26; ?>
<?php unset($__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginaldffecccc219bb81c1548bfa6ec1531014cb3bec8 = $component; } ?>
<?php $component = App\View\Components\Forms\ButtonCancel::resolve(['link' => route('tasks.index')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-cancel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonCancel::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'border-0']); ?><?php echo app('translator')->get('app.cancel'); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldffecccc219bb81c1548bfa6ec1531014cb3bec8)): ?>
<?php $component = $__componentOriginaldffecccc219bb81c1548bfa6ec1531014cb3bec8; ?>
<?php unset($__componentOriginaldffecccc219bb81c1548bfa6ec1531014cb3bec8); ?>
<?php endif; ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfc2695d0fb2b25f1a4057d7bc43eb62e95aaec66)): ?>
<?php $component = $__componentOriginalfc2695d0fb2b25f1a4057d7bc43eb62e95aaec66; ?>
<?php unset($__componentOriginalfc2695d0fb2b25f1a4057d7bc43eb62e95aaec66); ?>
<?php endif; ?>

            </div>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0777dca6b0ab2eebdcaf6ba884d5b30ab61203a6)): ?>
<?php $component = $__componentOriginal0777dca6b0ab2eebdcaf6ba884d5b30ab61203a6; ?>
<?php unset($__componentOriginal0777dca6b0ab2eebdcaf6ba884d5b30ab61203a6); ?>
<?php endif; ?>

    </div>
</div>


<script src="<?php echo e(asset('vendor/jquery/dropzone.min.js')); ?>"></script>
<script>

    $(document).ready(function() {

        let projectId = '<?php echo e($projectId); ?>';

        var add_task_files = "<?php echo e($addTaskFilePermission); ?>";

        <?php if(isset($project) && !is_null($project)): ?>
            $('#project_id').attr("readonly", true);
        <?php endif; ?>

        <?php if($projectId == ''): ?>
            projectId = document.getElementById('project_id').value;
        <?php endif; ?>

        (projectId != 'all' && projectId != '') ? projectClient(projectId) : '';

        $(document).on('change', '#project_id', function () {

            ($(this).val() != '') ? $('#clientDetails').show() : $('#clientDetails').hide();

            let id = $(this).val();

            if (id === '') {
                return '';
            }

            projectClient(id);

        });

        function projectClient(id) {

            let url = "<?php echo e(route('tasks.clientDetail')); ?>";

            $.easyAjax({
                url: url,
                type: "GET",
                data: {
                    id: id,
                },
                success: function (response) {
                    $('#clientDetails').html(response.data);
                }
            });
        }

        if ($('.custom-date-picker').length > 0) {
            datepicker('.custom-date-picker', {
                position: 'bl',
                ...datepickerConfig
            });
        }

        if (add_task_files == "all" || add_task_files == "added") {

            Dropzone.autoDiscover = false;
            //Dropzone class
            taskDropzone = new Dropzone("div#task-file-upload-dropzone", {
                dictDefaultMessage: "<?php echo e(__('app.dragDrop')); ?>",
                url: "<?php echo e(route('task-files.store')); ?>",
                headers: {
                    'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                },
                paramName: "file",
                maxFilesize: DROPZONE_MAX_FILESIZE,
                maxFiles: 10,
                autoProcessQueue: false,
                uploadMultiple: true,
                addRemoveLinks: true,
                parallelUploads: 10,
                acceptedFiles: DROPZONE_FILE_ALLOW,
                init: function () {
                    taskDropzone = this;
                }
            });
            taskDropzone.on('sending', function (file, xhr, formData) {
                var ids = $('#taskID').val();
                formData.append('task_id', ids);
                $.easyBlockUI();
            });
            taskDropzone.on('uploadprogress', function () {
                $.easyBlockUI();
            });
            taskDropzone.on('completemultiple', function () {
                window.location.href = localStorage.getItem("redirect_task");
            });
        }


        $("#selectAssignee").selectpicker({
            actionsBox: true,
            selectAllText: "<?php echo e(__('modules.permission.selectAll')); ?>",
            deselectAllText: "<?php echo e(__('modules.permission.deselectAll')); ?>",
            multipleSeparator: " ",
            selectedTextFormat: "count > 8",
            countSelectedText: function(selected, total) {
                return selected + " <?php echo e(__('app.membersSelected')); ?> ";
            }
        });

        quillImageLoad('#description');


        const dp1 = datepicker('#task_start_date', {
            position: 'bl',
            onSelect: (instance, date) => {
                if (typeof dp2.dateSelected !== 'undefined' && dp2.dateSelected.getTime() < date.getTime()) {
                    dp2.setDate(date, true)
                }
                if (typeof dp2.dateSelected === 'undefined') {
                    dp2.setDate(date, true)
                }
                dp2.setMin(date);
            },
            ...datepickerConfig
        });

        const dp2 = datepicker('#due_date', {
            position: 'bl',
            onSelect: (instance, date) => {
                dp1.setMax(date);
            },
            ...datepickerConfig
        });

        $('#save-task-data-form').on('change', '#project_id', function () {
            let id = $(this).val();
            if (id === '') {
                id = 0;
            }
            let url = "<?php echo e(route('milestones.by_project', ':id')); ?>";
            url = url.replace(':id', id);

            $.easyAjax({
                url: url,
                container: '#save-task-data-form',
                type: "GET",
                blockUI: true,
                success: function (response) {
                    if (response.status == 'success') {
                        $('#milestone-id').html(response.data);
                        $('#milestone-id').selectpicker('refresh');
                    }
                }
            });
        });

        $('#save-task-data-form').on('change', '#project_id', function () {
            let id = $(this).val();
            if (id === '') {
                id = 0;
            }
            let url = "<?php echo e(route('projects.members', ':id')); ?>";
            url = url.replace(':id', id);
            $.easyAjax({
                url: url,
                type: "GET",
                container: '#save-task-data-form',
                blockUI: true,
                redirect: true,
                success: function (data) {
                    $('#selectAssignee').html(data.data);
                    $('.projectId').text(data.unique_id+'-');
                    $('#selectAssignee').selectpicker('refresh');
                }
            })
        });

        $('#save-task-data-form').on('change', '#project_id', function () {
            let id = $(this).val();
            if (id === '') {
                id = 0;
            }
            let url = "<?php echo e(route('projects.labels', ':id')); ?>";
            url = url.replace(':id', id);
            $.easyAjax({
                url: url,
                type: "GET",
                container: '#save-task-data-form',
                blockUI: true,
                redirect: true,
                success: function (data) {
                    $('#task_labels').html(data.data);
                    $('#task_labels').selectpicker('refresh');
                }
            })
        });

        $('#save-more-task-form').click(function () {
            let note = document.getElementById('description').children[0].innerHTML;
            document.getElementById('description-text').value = note;

            const url = "<?php echo e(route('tasks.store')); ?>?taskId=<?php echo e($task ? $task->id : ''); ?>";
            var data = $('#save-task-data-form').serialize() + '&add_more=true';

            saveTask(data, url, "#save-more-task-form");

        });

        $('#save-task-form').click(function () {
            let note = document.getElementById('description').children[0].innerHTML;
            document.getElementById('description-text').value = note;

            const url = "<?php echo e(route('tasks.store')); ?>?taskId=<?php echo e($task ? $task->id : ''); ?>";
            var data = $('#save-task-data-form').serialize();

            saveTask(data, url, "#save-task-form");

        });

        function saveTask(data, url, buttonSelector) {
            $.easyAjax({
                url: url,
                container: '#save-task-data-form',
                type: "POST",
                disableButton: true,
                blockUI: true,
                buttonSelector: buttonSelector,
                data: data,
                success: function (response) {
                    if (response.status === 'success') {

                        if (typeof taskDropzone !== 'undefined' && taskDropzone.getQueuedFiles().length > 0) {
                            taskID = response.taskID;
                            $('#taskID').val(response.taskID);
                            (response.add_more == true) ? localStorage.setItem("redirect_task", window.location.href) : localStorage.setItem("redirect_task", response.redirectUrl);
                            taskDropzone.processQueue();
                        }
                        else if (response.add_more == true) {

                            var right_modal_content = $.trim($(RIGHT_MODAL_CONTENT).html());

                            if(right_modal_content.length) {

                                $(RIGHT_MODAL_CONTENT).html(response.html.html);
                                $('#add_more').val(false);
                            }
                            else {

                                $('.content-wrapper').html(response.html.html);
                                init('.content-wrapper');
                                $('#add_more').val(false);
                            }


                        }
                        else {
                            window.location.href = response.redirectUrl;
                        }

                        if (typeof showTable !== 'undefined' && typeof showTable === 'function') {
                            showTable();
                        }
                    }
                }
            });
        }

        $('#assign-self').click(function () {
            $('#selectAssignee').val('<?php echo e($user->id); ?>');
            $('#selectAssignee').selectpicker('refresh');
        });

        $('#without_duedate').click(function () {
            $('.dueDateBox').toggle();
        });

        $('#create_task_category').click(function () {
            const url = "<?php echo e(route('taskCategory.create')); ?>";
            $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_LG, url);
        });

        $('#department-setting').click(function () {
            const url = "<?php echo e(route('departments.create')); ?>";
            $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_LG, url);
        });

        $('#client_view_task').change(function () {
            $('#clientNotification').toggleClass('d-none');
        });

        $('#set_time_estimate').change(function () {
            $('#set-time-estimate-fields').toggleClass('d-none');
        });

        <?php if(!is_null($task) && ($task->estimate_hours > 0 || $task->estimate_minutes > 0)): ?>
            $('#set-time-estimate-fields').toggleClass('d-none');
        <?php endif; ?>

        $('#repeat-task').change(function () {
            $('#repeat-fields').toggleClass('d-none');
        });

        $('#dependent-task').change(function () {
            $('#dependent-fields').toggleClass('d-none');
        });

        $('.toggle-other-details').click(function () {
            $(this).find('svg').toggleClass('fa-chevron-down fa-chevron-up');
            $('#other-details').toggleClass('d-none');
        });

        <?php if(!is_null($task)): ?>
            $('#other-details').toggleClass('d-none');
        <?php endif; ?>

        $('#createTaskLabel').click(function () {
            var projectId = $('#project_id').val();
            const url = "<?php echo e(route('task-label.create')); ?>?task_id=<?php echo e($task ? $task->id : ''); ?>&project_id=" + projectId;
            $(MODAL_XL + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_XL, url);
        });

        $('#add-project').click(function () {
            $(MODAL_XL).modal('show');

            const url = "<?php echo e(route('projects.create')); ?>";

            $.easyAjax({
                url: url,
                blockUI: true,
                container: MODAL_XL,
                success: function (response) {
                    if (response.status == "success") {
                        $(MODAL_XL + ' .modal-body').html(response.html);
                        $(MODAL_XL + ' .modal-title').html(response.title);
                        init(MODAL_XL);
                    }
                }
            });
        });

        $('#add-employee').click(function () {
            $(MODAL_XL).modal('show');

            const url = "<?php echo e(route('employees.create')); ?>";

            $.easyAjax({
                url: url,
                blockUI: true,
                container: MODAL_XL,
                success: function (response) {
                    if (response.status == "success") {
                        $(MODAL_XL + ' .modal-body').html(response.html);
                        $(MODAL_XL + ' .modal-title').html(response.title);
                        init(MODAL_XL);
                    }
                }
            });
        });

        init(RIGHT_MODAL);
    });

    function checkboxChange(parentClass, id) {
        let checkedData = '';
        $('.' + parentClass).find("input[type= 'checkbox']:checked").each(function () {
            checkedData = (checkedData !== '') ? checkedData + ', ' + $(this).val() : $(this).val();
        });
        $('#' + id).val(checkedData);
    }
</script>
<?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/tasks/ajax/create.blade.php ENDPATH**/ ?>