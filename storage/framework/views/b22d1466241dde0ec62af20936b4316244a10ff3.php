<script src="<?php echo e(asset('vendor/jquery/frappe-charts.min.iife.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/jquery/Chart.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/jquery/gauge.js')); ?>"></script>

<?php
$editProjectPermission = user()->permission('edit_projects');
$addPaymentPermission = user()->permission('add_payments');
$projectBudgetPermission = user()->permission('view_project_budget');
$memberIds = $project->members->pluck('user_id')->toArray();
?>

<div class="d-lg-flex">
    <div class="project-left w-100 py-0 py-lg-5 py-md-0 ">
        <div class="d-flex align-content-center flex-lg-row-reverse mb-4">
            <?php if(!$project->trashed()): ?>
                <div class="ml-lg-3 ml-md-0 ml-0 mr-3 mr-lg-0 mr-md-3">
                    <?php if($editProjectPermission == 'all' || ($editProjectPermission == 'added' && $project->added_by == user()->id) || ($project->project_admin == user()->id)): ?>
                        <select class="form-control select-picker change-status height-35">
                            <?php $__currentLoopData = $projectStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option
                                data-content="<i class='fa fa-circle mr-1 f-15' style='color:<?php echo e($status->color); ?>'></i><?php echo e(ucfirst($status->status_name)); ?>"
                                <?php if($project->status == $status->status_name): ?>
                                selected <?php endif; ?>
                                value="<?php echo e($status->status_name); ?>"> <?php echo e($status->status_name); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    <?php else: ?>
                        <?php $__currentLoopData = $projectStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($project->status == $status->status_name): ?>
                                <div class="bg-white p-2 border rounded">
                                    <i class='fa fa-circle mr-2' style="color:<?php echo e($status->color); ?>"></i><?php echo e($status->status_name); ?>

                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>

                <div class="ml-lg-3 ml-md-0 ml-0 mr-3 mr-lg-0 mr-md-3">
                    <div class="dropdown">
                        <button
                            class="btn btn-lg bg-white border height-35 f-15 px-2 py-1 text-dark-grey text-capitalize rounded  dropdown-toggle"
                            type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo app('translator')->get('app.action'); ?> <i class="icon-options-vertical icons"></i>
                        </button>

                        <div class="dropdown-menu dropdown-menu-right border-grey rounded b-shadow-4 p-0"
                            aria-labelledby="dropdownMenuLink" tabindex="0">

                            <?php if($editProjectPermission == 'all'
                                || ($project->project_admin == user()->id)
                                || ($editProjectPermission == 'added' && user()->id == $project->added_by)
                                || ($editProjectPermission == 'owned' && user()->id == $project->client_id && in_array('client', user_roles()))
                                || ($editProjectPermission == 'owned' && in_array(user()->id, $memberIds) && in_array('employee', user_roles()))
                                || ($editProjectPermission == 'both' && (user()->id == $project->client_id || user()->id == $project->added_by))
                                || ($editProjectPermission == 'both' && in_array(user()->id, $memberIds) && in_array('employee', user_roles()))): ?>
                                <a class="dropdown-item openRightModal"
                                    href="<?php echo e(route('projects.edit', $project->id)); ?>"><?php echo app('translator')->get('app.edit'); ?>
                                    <?php echo app('translator')->get('app.project'); ?>
                                </a>

                                <a class="dropdown-item"
                                    href="<?php echo e(route('front.gantt', $project->hash)); ?>" target="_blank">
                                    <?php echo app('translator')->get('modules.projects.viewPublicGanttChart'); ?>
                                </a>

                                <a class="dropdown-item"
                                    href="<?php echo e(route('front.taskboard', $project->hash)); ?>" target="_blank">
                                    <?php echo app('translator')->get('app.public'); ?> <?php echo app('translator')->get('modules.tasks.taskBoard'); ?>
                                </a>
                                <hr class="my-1">
                            <?php endif; ?>

                            <?php $projectPin = $project->pinned() ?>

                            <?php if($projectPin): ?>
                                <a class="dropdown-item" href="javascript:;" id="pinnedItem"
                                    data-pinned="pinned"><?php echo app('translator')->get('app.unpin'); ?>
                                    <?php echo app('translator')->get('app.project'); ?></a>
                            <?php else: ?>
                                <a class="dropdown-item" href="javascript:;" id="pinnedItem"
                                    data-pinned="unpinned"><?php echo app('translator')->get('app.pin'); ?>
                                    <?php echo app('translator')->get('app.project'); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <?php if($projectPin): ?>
                    <div class="align-self-center">
                        <span class='badge badge-success'><i class='fa fa-thumbtack'></i> <?php echo app('translator')->get('app.pinned'); ?></span>
                    </div>
                <?php endif; ?>
            <?php elseif($editProjectPermission == 'all'
            || ($project->project_admin == user()->id)
            || ($editProjectPermission == 'added' && user()->id == $project->added_by)
            || ($editProjectPermission == 'owned' && user()->id == $project->client_id && in_array('client', user_roles()))
            || ($editProjectPermission == 'owned' && in_array(user()->id, $memberIds) && in_array('employee', user_roles()))
            || ($editProjectPermission == 'both' && (user()->id == $project->client_id || user()->id == $project->added_by))
            || ($editProjectPermission == 'both' && in_array(user()->id, $memberIds) && in_array('employee', user_roles()))): ?>
                <div class="ml-3">
                    <?php if (isset($component)) { $__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480 = $component; } ?>
<?php $component = App\View\Components\Forms\ButtonPrimary::resolve(['icon' => 'undo'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'restore-project']); ?><?php echo app('translator')->get('app.unarchive'); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480)): ?>
<?php $component = $__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480; ?>
<?php unset($__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480); ?>
<?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
        <!-- PROJECT PROGRESS AND CLIENT START -->
        <div class="row">
            <!-- PROJECT PROGRESS START -->
            <div class="col-md-6 mb-4">
                <?php if (isset($component)) { $__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e = $component; } ?>
<?php $component = App\View\Components\Cards\Data::resolve(['title' => __('modules.projects.projectProgress'),'otherClasses' => 'd-flex d-xl-flex d-lg-block d-md-flex  justify-content-between align-items-center'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Data::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

                    <?php if (isset($component)) { $__componentOriginalc6f8f9f8a0dfc69244634039f8603596a47af558 = $component; } ?>
<?php $component = App\View\Components\GaugeChart::resolve(['width' => '100','value' => $project->completion_percent] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('gauge-chart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\GaugeChart::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'progressGauge']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc6f8f9f8a0dfc69244634039f8603596a47af558)): ?>
<?php $component = $__componentOriginalc6f8f9f8a0dfc69244634039f8603596a47af558; ?>
<?php unset($__componentOriginalc6f8f9f8a0dfc69244634039f8603596a47af558); ?>
<?php endif; ?>

                    <!-- PROGRESS START DATE START -->
                    <div class="p-start-date mb-xl-0 mb-lg-3">
                        <h5 class="text-lightest f-14 font-weight-normal"><?php echo app('translator')->get('app.startDate'); ?></h5>
                        <p class="f-15 mb-0"><?php echo e($project->start_date->format(company()->date_format)); ?></p>
                    </div>
                    <!-- PROGRESS START DATE END -->
                    <!-- PROGRESS END DATE START -->
                    <div class="p-end-date">
                        <h5 class="text-lightest f-14 font-weight-normal"><?php echo app('translator')->get('modules.projects.deadline'); ?></h5>
                        <p class="f-15 mb-0">
                            <?php echo e(!is_null($project->deadline) ? $project->deadline->format(company()->date_format) : '--'); ?>

                        </p>
                    </div>
                    <!-- PROGRESS END DATE END -->

                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e)): ?>
<?php $component = $__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e; ?>
<?php unset($__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e); ?>
<?php endif; ?>
            </div>
            <!-- PROJECT PROGRESS END -->
            <!-- CLIENT START -->
            <div class="col-md-6 mb-4">
                <?php if(!is_null($project->client)): ?>
                    <?php if (isset($component)) { $__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e = $component; } ?>
<?php $component = App\View\Components\Cards\Data::resolve(['title' => __('app.client'),'otherClasses' => 'd-block d-xl-flex d-lg-block d-md-flex  justify-content-between align-items-center'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Data::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

                        <div class="p-client-detail">
                            <div class="card border-0 ">
                                <div class="card-horizontal">

                                    <div class="card-img m-0">
                                        <img class="" src=" <?php echo e($project->client->image_url); ?>"
                                            alt="<?php echo e($project->client->name); ?>">
                                    </div>
                                    <div class="card-body border-0 p-0 ml-4 ml-xl-4 ml-lg-3 ml-md-3">
                                        <h4 class="card-title f-15 font-weight-normal mb-0 text-capitalize">
                                            <a href="<?php echo e(route('clients.show', $project->client_id)); ?>"
                                                class="text-dark"><?php echo e($project->client->name); ?></a>
                                        </h4>
                                        <p class="card-text f-14 text-lightest mb-0">
                                            <?php echo e($project->client->clientDetails->company_name); ?>

                                        </p>
                                        <?php if($project->client->country_id): ?>
                                            <span
                                                class="card-text f-12 text-lightest text-capitalize d-flex align-items-center">
                                                <span
                                                    class='flag-icon flag-icon-<?php echo e(strtolower($project->client->country->iso)); ?> mr-2'></span>
                                                <?php echo e($project->client->country->nicename); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <?php if( (in_array('admin', user_roles()) && $messageSetting->allow_client_admin == 'yes') ||
                        (in_array('employee', user_roles()) && $messageSetting->allow_client_employee == 'yes') ): ?>
                        <div class="p-client-msg mt-4 mt-xl-0 mt-lg-4 mt-md-0">
                            <button type="button" class="btn-secondary rounded f-15" id="new-chat"
                                data-client-id="<?php echo e($project->client->id); ?>"> <i class="fab fa-whatsapp mr-1"></i>
                                <?php echo app('translator')->get('app.message'); ?></button>
                        </div>
                <?php endif; ?>


                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e)): ?>
<?php $component = $__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e; ?>
<?php unset($__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e); ?>
<?php endif; ?>
            <?php else: ?>
                <?php if (isset($component)) { $__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e = $component; } ?>
<?php $component = App\View\Components\Cards\Data::resolve(['otherClasses' => 'd-flex d-xl-flex d-lg-block d-md-flex  justify-content-between align-items-center'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Data::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    <?php if (isset($component)) { $__componentOriginaldd4a3acb850ed912fbb4dfa63003ef1bff802c33 = $component; } ?>
<?php $component = App\View\Components\Cards\NoRecord::resolve(['icon' => 'user','message' => __('messages.noClientAddedToProject')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e)): ?>
<?php $component = $__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e; ?>
<?php unset($__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e); ?>
<?php endif; ?>
                <?php endif; ?>

            </div>
            <!-- CLIENT END -->
        </div>
        <!-- PROJECT PROGRESS AND CLIENT END -->

        <!-- TASK STATUS AND BUDGET START -->
        <div class="row mb-4">
            <!-- TASK STATUS START -->
            <div class="col-lg-6 col-md-12">
                <?php if (isset($component)) { $__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e = $component; } ?>
<?php $component = App\View\Components\Cards\Data::resolve(['title' => __('app.menu.tasks'),'padding' => 'false'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Data::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    <?php if (isset($component)) { $__componentOriginal4092e086ee856e52c87e0ceff9be7ed5cf6c57d8 = $component; } ?>
<?php $component = App\View\Components\PieChart::resolve(['labels' => $taskChart['labels'],'values' => $taskChart['values'],'colors' => $taskChart['colors']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('pie-chart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\PieChart::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'task-chart','height' => '220','width' => '250']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4092e086ee856e52c87e0ceff9be7ed5cf6c57d8)): ?>
<?php $component = $__componentOriginal4092e086ee856e52c87e0ceff9be7ed5cf6c57d8; ?>
<?php unset($__componentOriginal4092e086ee856e52c87e0ceff9be7ed5cf6c57d8); ?>
<?php endif; ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e)): ?>
<?php $component = $__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e; ?>
<?php unset($__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e); ?>
<?php endif; ?>
            </div>
            <!-- TASK STATUS END -->
            <!-- BUDGET VS SPENT START -->
            <div class="col-lg-6 col-md-12">
                <div class="row mb-4">
                    <div class="col-sm-12">
                        <h4 class="f-18 f-w-500 mb-4"><?php echo app('translator')->get('app.statistics'); ?></h4>
                    </div>
                    <?php if($projectBudgetPermission == 'all'): ?>
                        <div class="col">
                            <?php if (isset($component)) { $__componentOriginal3372d3ef031d7cb240e013bd2685bbb8031ec38a = $component; } ?>
<?php $component = App\View\Components\Cards\Widget::resolve(['title' => __('modules.projects.projectBudget'),'value' => ((!is_null($project->project_budget) && $project->currency) ? currency_formatter($project->project_budget, $project->currency->currency_symbol) : '0'),'icon' => 'coins'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.widget'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Widget::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3372d3ef031d7cb240e013bd2685bbb8031ec38a)): ?>
<?php $component = $__componentOriginal3372d3ef031d7cb240e013bd2685bbb8031ec38a; ?>
<?php unset($__componentOriginal3372d3ef031d7cb240e013bd2685bbb8031ec38a); ?>
<?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <?php if($viewPaymentPermission == 'all'): ?>
                        <div class="col">
                            <?php if (isset($component)) { $__componentOriginal3372d3ef031d7cb240e013bd2685bbb8031ec38a = $component; } ?>
<?php $component = App\View\Components\Cards\Widget::resolve(['title' => __('app.earnings'),'value' => (!is_null($project->currency) ? currency_formatter($earnings, $project->currency->currency_symbol) : currency_formatter($earnings)),'icon' => 'coins'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.widget'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Widget::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3372d3ef031d7cb240e013bd2685bbb8031ec38a)): ?>
<?php $component = $__componentOriginal3372d3ef031d7cb240e013bd2685bbb8031ec38a; ?>
<?php unset($__componentOriginal3372d3ef031d7cb240e013bd2685bbb8031ec38a); ?>
<?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="row">
                    <?php if($viewProjectTimelogPermission == 'all'): ?>
                        <div class="col">
                            <?php if (isset($component)) { $__componentOriginal3372d3ef031d7cb240e013bd2685bbb8031ec38a = $component; } ?>
<?php $component = App\View\Components\Cards\Widget::resolve(['title' => __('modules.projects.hoursLogged'),'value' => $hoursLogged,'icon' => 'clock'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.widget'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Widget::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3372d3ef031d7cb240e013bd2685bbb8031ec38a)): ?>
<?php $component = $__componentOriginal3372d3ef031d7cb240e013bd2685bbb8031ec38a; ?>
<?php unset($__componentOriginal3372d3ef031d7cb240e013bd2685bbb8031ec38a); ?>
<?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <?php if($viewExpensePermission == 'all'): ?>
                        <div class="col">
                            <?php if (isset($component)) { $__componentOriginal3372d3ef031d7cb240e013bd2685bbb8031ec38a = $component; } ?>
<?php $component = App\View\Components\Cards\Widget::resolve(['title' => __('modules.projects.expenses_total'),'value' => (!is_null($project->currency) ? currency_formatter($expenses, $project->currency->currency_symbol) : currency_formatter($expenses)),'icon' => 'coins'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.widget'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Widget::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3372d3ef031d7cb240e013bd2685bbb8031ec38a)): ?>
<?php $component = $__componentOriginal3372d3ef031d7cb240e013bd2685bbb8031ec38a; ?>
<?php unset($__componentOriginal3372d3ef031d7cb240e013bd2685bbb8031ec38a); ?>
<?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <!-- BUDGET VS SPENT END -->
        </div>
        <!-- TASK STATUS AND BUDGET END -->

        <!-- TASK STATUS AND BUDGET START -->
        <div class="row mb-4">
            <!-- BUDGET VS SPENT START -->
            <div class="col-md-12">
                <?php if (isset($component)) { $__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e = $component; } ?>
<?php $component = App\View\Components\Cards\Data::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Data::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    <div class="row <?php echo e($projectBudgetPermission == 'all' ? 'row-cols-lg-2' : ''); ?>">
                        <?php if($viewProjectTimelogPermission == 'all'): ?>
                            <div class="col">
                                <h4 class="f-18 f-w-500 mb-0"><?php echo app('translator')->get('modules.projects.hoursLogged'); ?></h4>
                                <?php if (isset($component)) { $__componentOriginald715ec1bc6c2f9665973a30148b6c47dca4e2819 = $component; } ?>
<?php $component = App\View\Components\StackedChart::resolve(['chartData' => $hoursBudgetChart] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('stacked-chart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\StackedChart::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'task-chart2','height' => '250']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald715ec1bc6c2f9665973a30148b6c47dca4e2819)): ?>
<?php $component = $__componentOriginald715ec1bc6c2f9665973a30148b6c47dca4e2819; ?>
<?php unset($__componentOriginald715ec1bc6c2f9665973a30148b6c47dca4e2819); ?>
<?php endif; ?>
                            </div>                            
                        <?php endif; ?>
                        <?php if($projectBudgetPermission == 'all'): ?>
                            <div class="col">
                                <h4 class="f-18 f-w-500 mb-0"><?php echo app('translator')->get('modules.projects.projectBudget'); ?></h4>
                                <?php if (isset($component)) { $__componentOriginald715ec1bc6c2f9665973a30148b6c47dca4e2819 = $component; } ?>
<?php $component = App\View\Components\StackedChart::resolve(['chartData' => $amountBudgetChart] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('stacked-chart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\StackedChart::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'task-chart3','height' => '250']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald715ec1bc6c2f9665973a30148b6c47dca4e2819)): ?>
<?php $component = $__componentOriginald715ec1bc6c2f9665973a30148b6c47dca4e2819; ?>
<?php unset($__componentOriginald715ec1bc6c2f9665973a30148b6c47dca4e2819); ?>
<?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e)): ?>
<?php $component = $__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e; ?>
<?php unset($__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e); ?>
<?php endif; ?>
            </div>
            <!-- BUDGET VS SPENT END -->
        </div>
        <!-- TASK STATUS AND BUDGET END -->

        <!-- PROJECT DETAILS START -->
        <div class="row">
            <div class="col-md-12 mb-4">
                <?php if (isset($component)) { $__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e = $component; } ?>
<?php $component = App\View\Components\Cards\Data::resolve(['title' => __('app.project') . ' ' . __('app.details'),'otherClasses' => 'd-flex justify-content-between align-items-center'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Data::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    <?php if(is_null($project->project_summary)): ?>
                        <?php if (isset($component)) { $__componentOriginaldd4a3acb850ed912fbb4dfa63003ef1bff802c33 = $component; } ?>
<?php $component = App\View\Components\Cards\NoRecord::resolve(['icon' => 'align-left','message' => __('messages.projectDetailsNotAdded')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                    <?php else: ?>
                        <div class="text-dark-grey mb-0 ql-editor p-0"><?php echo $project->project_summary; ?></div>
                    <?php endif; ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e)): ?>
<?php $component = $__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e; ?>
<?php unset($__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e); ?>
<?php endif; ?>
            </div>
        </div>
        <!-- PROJECT DETAILS END -->

        
        <?php if(isset($fields) && count($fields) > 0): ?>
            <div class="row mt-4">
                <!-- TASK STATUS START -->
                <div class="col-md-12">
                    <?php if (isset($component)) { $__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e = $component; } ?>
<?php $component = App\View\Components\Cards\Data::resolve(['title' => __('modules.client.clientOtherDetails')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Data::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                        <?php if (isset($component)) { $__componentOriginal3c960abe02ba5e6e89cacf00e5c55b3f476974bf = $component; } ?>
<?php $component = App\View\Components\Forms\CustomFieldShow::resolve(['fields' => $fields,'model' => $project] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e)): ?>
<?php $component = $__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e; ?>
<?php unset($__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e); ?>
<?php endif; ?>
                </div>
            </div>
        <?php endif; ?>

    </div>

    <!-- PROJECT RIGHT START -->
    <div class="project-right pt-0 pb-4 p-lg-0">
        <div class="bg-white">
            <!-- ACTIVITY HEADING START -->
            <div class="p-activity-heading d-flex align-items-center justify-content-between b-shadow-4 p-20">
                <p class="mb-0 f-18 f-w-500"><?php echo app('translator')->get('modules.employees.activity'); ?></p>

            </div>
            <!-- ACTIVITY HEADING END -->
            <!-- ACTIVITY DETAIL START -->
            <div class="p-activity-detail cal-info b-shadow-4" data-menu-vertical="1" data-menu-scroll="1"
                data-menu-dropdown-timeout="500" id="projectActivityDetail">

                <?php $__empty_1 = true; $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="card border-0 b-shadow-4 p-20 rounded-0">
                        <div class="card-horizontal">
                            <div class="card-header m-0 p-0 bg-white rounded">
                                <?php if (isset($component)) { $__componentOriginale3ee05d3639a92367e88bc9c1b458d9425919439 = $component; } ?>
<?php $component = App\View\Components\DateBadge::resolve(['month' => $activity->created_at->timezone(company()->timezone)->format('M'),'date' => $activity->created_at->timezone(company()->timezone)->format('d')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('date-badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\DateBadge::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale3ee05d3639a92367e88bc9c1b458d9425919439)): ?>
<?php $component = $__componentOriginale3ee05d3639a92367e88bc9c1b458d9425919439; ?>
<?php unset($__componentOriginale3ee05d3639a92367e88bc9c1b458d9425919439); ?>
<?php endif; ?>
                            </div>
                            <div class="card-body border-0 p-0 ml-3">
                                <h4 class="card-title f-14 font-weight-normal text-capitalize"><?php echo __($activity->activity); ?>

                                </h4>
                                <p class="card-text f-12 text-dark-grey">
                                    <?php echo e($activity->created_at->timezone(company()->timezone)->format(company()->time_format)); ?>

                                </p>
                            </div>
                        </div>
                    </div><!-- card end -->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="card border-0 b-shadow-4 p-20 rounded-0">
                        <div class="card-horizontal">

                            <div class="card-body border-0 p-0 ml-3">
                                <h4 class="card-title f-14 font-weight-normal">
                                    <?php echo app('translator')->get('messages.noActivityByThisUser'); ?></h4>
                                <p class="card-text f-12 text-dark-grey"></p>
                            </div>
                        </div>
                    </div><!-- card end -->
                <?php endif; ?>

            </div>
            <!-- ACTIVITY DETAIL END -->
        </div>
    </div>
    <!-- PROJECT RIGHT END -->
</div>

<script>
    $(document).ready(function() {
        $('.change-status').change(function() {
            var status = $(this).val();
            var url = "<?php echo e(route('projects.update_status', $project->id)); ?>";
            var token = '<?php echo e(csrf_token()); ?>'

            $.easyAjax({
                url: url,
                type: "POST",
                container: '.content-wrapper',
                blockUI: true,
                data: {
                    status: status,
                    _token: token
                }
            });
        });

        $('body').on('click', '#pinnedItem', function() {
            var type = $('#pinnedItem').attr('data-pinned');
            var id = '<?php echo e($project->id); ?>';
            var pinType = 'project';

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
                        var url = "<?php echo e(route('projects.destroy_pin', ':id')); ?>";
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
                        var url = "<?php echo e(route('projects.store_pin')); ?>?type=" + pinType;

                        var token = "<?php echo e(csrf_token()); ?>";
                        $.easyAjax({
                            type: 'POST',
                            url: url,
                            data: {
                                '_token': token,
                                'project_id': id
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

        $('body').on('click', '.restore-project', function() {
            Swal.fire({
                title: "<?php echo app('translator')->get('messages.sweetAlertTitle'); ?>",
                text: "<?php echo app('translator')->get('messages.unArchiveMessage'); ?>",
                icon: 'warning',
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText: "<?php echo app('translator')->get('messages.confirmRevert'); ?>",
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
                    var url = "<?php echo e(route('projects.archive_restore', $project->id)); ?>";

                    var token = "<?php echo e(csrf_token()); ?>";

                    $.easyAjax({
                        type: 'POST',
                        url: url,
                        data: {
                            '_token': token
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

        $('body').on('click', '#new-chat', function() {
            let clientId = $(this).data('client-id');
            const url = "<?php echo e(route('messages.create')); ?>?clientId=" + clientId;
            $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_LG, url);
        });

    });
</script>
<?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/projects/ajax/overview.blade.php ENDPATH**/ ?>