<?php $__env->startPush('datatable-styles'); ?>
    <?php echo $__env->make('sections.datatable_css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopPush(); ?>

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
        <div class="select-box d-flex py-2  pr-2 border-right-grey border-right-grey-sm-0">
            <p class="mb-0 pr-3 f-14 text-dark-grey d-flex align-items-center"><?php echo app('translator')->get('app.clientName'); ?></p>
            <div class="select-status">
                <select class="form-control select-picker" name="client_id" id="client_id" data-live-search="true"
                    data-size="8">
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

        <div class="select-box d-flex py-2 <?php echo e(!in_array('client', user_roles()) ? 'px-lg-2 px-md-2 px-0' : ''); ?>  border-right-grey border-right-grey-sm-0 pr-2 pl-2">
            <p class="mb-0 pr-3 f-14 text-dark-grey d-flex align-items-center"><?php echo app('translator')->get('app.status'); ?></p>
            <div class="select-status">
                <select class="form-control select-picker" name="status" id="status" data-live-search="true" data-size="8">
                    <option <?php echo e(request('status') == 'all' ? 'selected' : ''); ?> value="all"><?php echo app('translator')->get('app.all'); ?></option>
                    <option <?php echo e(request('status') == 'overdue' ? 'selected' : ''); ?> value="overdue"><?php echo app('translator')->get('app.overdue'); ?>
                    </option>
                    <?php $__currentLoopData = $projectStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($status->status_name); ?>"><?php echo e(ucfirst($status->status_name)); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
        <div class="select-box d-flex py-2 <?php echo e(!in_array('client', user_roles()) ? 'px-lg-2 px-md-2 px-0' : ''); ?>  border-right-grey border-right-grey-sm-0 pr-2 pl-2">
            <p class="mb-0 pr-3 f-14 text-dark-grey d-flex align-items-center"><?php echo app('translator')->get('app.progress'); ?></p>
            <div class="select-status mw-120">
                <?php if (isset($component)) { $__componentOriginal863bfe686851606453ee7ca47b08abfa2e4810a8 = $component; } ?>
<?php $component = App\View\Components\Forms\InputGroup::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.input-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\InputGroup::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    <select class="select-picker form-control" multiple name="progress[]" id="progress" data-live-search="true" data-size="8">
                        <option value="0-20" selected>0% - 20%</option>
                        <option value="21-40" selected>21% - 40%</option>
                        <option value="41-60" selected>41% - 60%</option>
                        <option value="61-80" selected>61% - 80%</option>
                        <option value="81-99" selected>81% - 99%</option>
                        <option value="100-100">100%</option>
                    </select>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal863bfe686851606453ee7ca47b08abfa2e4810a8)): ?>
<?php $component = $__componentOriginal863bfe686851606453ee7ca47b08abfa2e4810a8; ?>
<?php unset($__componentOriginal863bfe686851606453ee7ca47b08abfa2e4810a8); ?>
<?php endif; ?>
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
<?php $component->withAttributes(['class' => 'btn-xs d-none','id' => 'reset-filters']); ?>
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
                <label class="f-14 text-dark-grey mb-12 text-capitalize"
                    for="usr"><?php echo app('translator')->get('modules.projects.projectCategory'); ?></label>
                <div class="select-filter mb-4">
                    <div class="select-others">
                        <select class="form-control select-picker" name="category_id" id="category_id"
                            data-live-search="true" data-container="body" data-size="8">
                            <option selected value="all"><?php echo app('translator')->get('app.all'); ?></option>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->id); ?>"><?php echo e($category->category_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            </div>


            <?php if(!in_array('client', user_roles())): ?>
                <div class="more-filter-items">
                    <label class="f-14 text-dark-grey mb-12 text-capitalize" for="usr"><?php echo app('translator')->get('app.projectMember'); ?></label>
                    <div class="select-filter mb-4">
                        <div class="select-others">
                            <select class="form-control select-picker" name="employee_id" id="employee_id"
                                data-live-search="true" data-container="body" data-size="8">
                                <?php if($allEmployees->count() > 1): ?>
                                    <option value="all"><?php echo app('translator')->get('app.all'); ?></option>
                                <?php endif; ?>
                                <?php $__currentLoopData = $allEmployees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                            </select>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <div class="more-filter-items">
                <label class="f-14 text-dark-grey mb-12 text-capitalize" for="usr"><?php echo app('translator')->get('app.department'); ?></label>
                <div class="select-filter mb-4">
                    <div class="select-others">
                        <select class="form-control select-picker" name="team_id" id="team_id" data-live-search="true"
                            data-container="body" data-size="8">
                            <option value="all"><?php echo app('translator')->get('app.all'); ?></option>
                            <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($department->id); ?>"><?php echo e($department->team_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="more-filter-items">
                <label class="f-14 text-dark-grey mb-12 text-capitalize" for="usr"><?php echo app('translator')->get('app.pinned'); ?></label>
                <div class="select-filter mb-4">
                    <div class="select-others">
                        <select class="form-control select-picker" name="pinned" id="pinned" data-container="body"
                            data-size="8">
                            <option value="all"><?php echo app('translator')->get('app.all'); ?></option>
                            <option value="pinned"><?php echo app('translator')->get('app.pinned'); ?></option>
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

<?php
$addProjectPermission = user()->permission('add_projects');
$manageProjectTemplatePermission = user()->permission('manage_project_template');
?>

<?php $__env->startSection('content'); ?>
    <!-- CONTENT WRAPPER START -->
    <div class="content-wrapper">
        <!-- Add Task Export Buttons Start -->
        <div class="d-block d-lg-flex d-md-flex justify-content-between action-bar">
            <div id="table-actions" class="flex-grow-1 align-items-center mb-2 mb-lg-0 mb-md-0">
                <?php if($addProjectPermission == 'all' || $addProjectPermission == 'added' || $addProjectPermission == 'both'): ?>
                    <?php if (isset($component)) { $__componentOriginal7f662ecf9f97aca611d2405e5e6903e6081fbd17 = $component; } ?>
<?php $component = App\View\Components\Forms\LinkPrimary::resolve(['link' => route('projects.create'),'icon' => 'plus'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.link-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\LinkPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-3 openRightModal float-left mb-2 mb-lg-0 mb-md-0']); ?>
                        <?php echo app('translator')->get('app.add'); ?>
                        <?php echo app('translator')->get('app.project'); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7f662ecf9f97aca611d2405e5e6903e6081fbd17)): ?>
<?php $component = $__componentOriginal7f662ecf9f97aca611d2405e5e6903e6081fbd17; ?>
<?php unset($__componentOriginal7f662ecf9f97aca611d2405e5e6903e6081fbd17); ?>
<?php endif; ?>
                <?php endif; ?>
                <?php if($manageProjectTemplatePermission == 'all' || $manageProjectTemplatePermission == 'added'): ?>
                    <?php if (isset($component)) { $__componentOriginal77b52663ad0feda08af3ca57637c39cf69585cbe = $component; } ?>
<?php $component = App\View\Components\Forms\LinkSecondary::resolve(['link' => route('project-template.index'),'icon' => 'layer-group'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.link-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\LinkSecondary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-3 mb-2 mb-lg-0 mb-md-0 float-left']); ?>
                        <?php echo app('translator')->get('app.menu.projectTemplate'); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal77b52663ad0feda08af3ca57637c39cf69585cbe)): ?>
<?php $component = $__componentOriginal77b52663ad0feda08af3ca57637c39cf69585cbe; ?>
<?php unset($__componentOriginal77b52663ad0feda08af3ca57637c39cf69585cbe); ?>
<?php endif; ?>
                <?php endif; ?>


                <?php if($addProjectPermission == 'all' || $addProjectPermission == 'added' || $addProjectPermission == 'both'): ?>
                    <?php if (isset($component)) { $__componentOriginal77b52663ad0feda08af3ca57637c39cf69585cbe = $component; } ?>
<?php $component = App\View\Components\Forms\LinkSecondary::resolve(['link' => route('projects.import'),'icon' => 'file-upload'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.link-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\LinkSecondary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-3 float-left mb-2 mb-lg-0 mb-md-0']); ?>
                        <?php echo app('translator')->get('app.importExcel'); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal77b52663ad0feda08af3ca57637c39cf69585cbe)): ?>
<?php $component = $__componentOriginal77b52663ad0feda08af3ca57637c39cf69585cbe; ?>
<?php unset($__componentOriginal77b52663ad0feda08af3ca57637c39cf69585cbe); ?>
<?php endif; ?>
                <?php endif; ?>

            </div>

            <?php if(!in_array('client', user_roles())): ?>
                <?php if (isset($component)) { $__componentOriginal95e73aded82dd7c8c0f260f95142b37107c1ffe8 = $component; } ?>
<?php $component = App\View\Components\Datatable\Actions::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('datatable.actions'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Datatable\Actions::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    <div class="select-status mr-3 pl-3">
                        <select name="action_type" class="form-control select-picker" id="quick-action-type" disabled>
                            <option value=""><?php echo app('translator')->get('app.selectAction'); ?></option>
                            <option value="change-status"><?php echo app('translator')->get('modules.tasks.changeStatus'); ?></option>
                            <option value="archive"><?php echo app('translator')->get('app.archive'); ?></option>
                            <option value="delete"><?php echo app('translator')->get('app.delete'); ?></option>
                        </select>
                    </div>
                    <div class="select-status mr-3 d-none quick-action-field" id="change-status-action">
                        <select name="status" class="form-control select-picker">
                            <option value="not started"><?php echo app('translator')->get('app.notStarted'); ?></option>
                            <option value="in progress"><?php echo app('translator')->get('app.inProgress'); ?></option>
                            <option value="on hold"><?php echo app('translator')->get('app.onHold'); ?></option>
                            <option value="canceled"><?php echo app('translator')->get('app.canceled'); ?></option>
                            <option value="finished"><?php echo app('translator')->get('app.finished'); ?></option>
                        </select>
                    </div>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal95e73aded82dd7c8c0f260f95142b37107c1ffe8)): ?>
<?php $component = $__componentOriginal95e73aded82dd7c8c0f260f95142b37107c1ffe8; ?>
<?php unset($__componentOriginal95e73aded82dd7c8c0f260f95142b37107c1ffe8); ?>
<?php endif; ?>
            <?php endif; ?>


            <div class="btn-group ml-0 ml-lg-3 ml-md-3" role="group">
                <a href="<?php echo e(route('projects.index')); ?>" class="btn btn-secondary f-14 btn-active projects" data-toggle="tooltip"
                    data-original-title="<?php echo app('translator')->get('app.menu.projects'); ?>"><i class="side-icon bi bi-list-ul"></i></a>

                <a href="<?php echo e(route('projects.archive')); ?>" class="btn btn-secondary f-14" data-toggle="tooltip"
                    data-original-title="<?php echo app('translator')->get('app.archive'); ?>"><i class="side-icon bi bi-archive"></i></a>

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
        var deadLineStartDate = '';
        var deadLineEndDate = '';
        $(".select-picker").selectpicker();

        $('#projects-table').on('preXhr.dt', function(e, settings, data) {
            var status = $('#status').val();
            var clientID = $('#client_id').val();
            var categoryID = $('#category_id').val();
            var teamID = $('#team_id').val();
            var employee_id = $('#employee_id').val();
            var pinned = $('#pinned').val();
            var searchText = $('#search-text-field').val();
            var progress = $('#progress').val();

            <?php if(request('deadLineStartDate') && request('deadLineEndDate')): ?>
                deadLineStartDate = '<?php echo e(request("deadLineStartDate")); ?>';
                deadLineEndDate = '<?php echo e(request("deadLineEndDate")); ?>'
            <?php endif; ?>

            data['status'] = status;
            data['progress'] = progress;
            data['client_id'] = clientID;
            data['pinned'] = pinned;
            data['category_id'] = categoryID;
            data['team_id'] = teamID;
            data['employee_id'] = employee_id;
            data['deadLineStartDate'] = deadLineStartDate;
            data['deadLineEndDate'] = deadLineEndDate;
            data['searchText'] = searchText;
            <?php if(!is_null(request('start')) && !is_null(request('end'))): ?>
                data['startDate'] = '<?php echo e(request('start')); ?>';
                data['endDate'] = '<?php echo e(request('end')); ?>';
            <?php endif; ?>
        });

        const showTable = () => {
            window.LaravelDataTables["projects-table"].draw(false);
        }

        $('#client_id, #status, #employee_id, #team_id, #category_id, #pinned, #progress').on('change keyup',
            function() {
                if ($('#status').val() != "not finished") {
                    $('#reset-filters').removeClass('d-none');
                    showTable();
                } else if ($('#employee_id').val() != "all") {
                    $('#reset-filters').removeClass('d-none');
                    showTable();
                } else if ($('#team_id').val() != "all") {
                    $('#reset-filters').removeClass('d-none');
                    showTable();
                } else if ($('#category_id').val() != "all") {
                    $('#reset-filters').removeClass('d-none');
                    showTable();
                } else if ($('#client_id').val() != "all") {
                    $('#reset-filters').removeClass('d-none');
                    showTable();
                } else if ($('#pinned').val() != "all") {
                    $('#reset-filters').removeClass('d-none');
                    showTable();
                } else if ($('#progress').val() != "all") {
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
            $('.projects').removeClass('btn-active');
            if ($(this).hasClass('btn-active')) {
                $('#pinned').val('all');
            } else {
                $('#pinned').val('pinned');
            }

            $('#pinned').selectpicker('refresh');
            $(this).toggleClass('btn-active')
            $('#reset-filters').removeClass('d-none');
            showTable();
        });

        $('#reset-filters,#reset-filters-2').click(function() {
            $('#filter-form')[0].reset();
            $('.filter-box .select-picker').selectpicker("refresh");
            $('#reset-filters').addClass('d-none');
            showTable();
        });

        $('#projects-table').on('change', '.change-status', function() {
            var url = "<?php echo e(route('projects.change_status')); ?>";
            var token = "<?php echo e(csrf_token()); ?>";
            var id = $(this).data('project-id');
            var status = $(this).val();

            if (id != "" && status != "") {
                $.easyAjax({
                    url: url,
                    type: "POST",
                    container: '.content-wrapper',
                    blockUI: true,
                    data: {
                        '_token': token,
                        projectId: id,
                        statusId: status,
                        sortBy: 'id'
                    },
                    success: function(data) {
                        window.LaravelDataTables["projects-table"].draw(false);
                    }
                });

            }
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
                    var url = "<?php echo e(route('projects.destroy', ':id')); ?>";
                    url = url.replace(':id', id);

                    var token = "<?php echo e(csrf_token()); ?>";

                    $.easyAjax({
                        type: 'POST',
                        url: url,
                        container: '.content-wrapper',
                        blockUI: true,
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

        $('body').on('click', '.archive', function() {
            var id = $(this).data('user-id');
            Swal.fire({
                title: "<?php echo app('translator')->get('messages.sweetAlertTitle'); ?>",
                text: "<?php echo app('translator')->get('messages.archiveMessage'); ?>",
                icon: 'warning',
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText: "<?php echo app('translator')->get('messages.confirmArchive'); ?>",
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
                    var url = "<?php echo e(route('projects.archive_delete', ':id')); ?>";
                    url = url.replace(':id', id);

                    var token = "<?php echo e(csrf_token()); ?>";

                    $.easyAjax({
                        type: 'POST',
                        url: url,
                        container: '.content-wrapper',
                        blockUI: true,
                        data: {
                            '_token': token,
                        },
                        success: function(response) {
                            if (response.status == "success") {
                                window.LaravelDataTables["projects-table"].draw(false);
                            }
                        }
                    });
                }
            });
        });

        const applyQuickAction = () => {
            var rowdIds = $("#projects-table input:checkbox:checked").map(function() {
                return $(this).val();
            }).get();

            var url = "<?php echo e(route('projects.apply_quick_action')); ?>?row_ids=" + rowdIds;

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
                        $('#quick-action-apply').attr('disabled', 'disabled');
                        $('#change-status-action').addClass('d-none');
                        $('#quick-action-form').addClass('d-none');
                    }
                }
            })
        };

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/projects/index.blade.php ENDPATH**/ ?>