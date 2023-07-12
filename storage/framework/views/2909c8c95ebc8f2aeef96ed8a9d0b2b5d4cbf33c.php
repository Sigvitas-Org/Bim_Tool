<?php $__env->startPush('styles'); ?>
    <?php if((!is_null($viewEventPermission) && $viewEventPermission != 'none')
        || (!is_null($viewHolidayPermission) && $viewHolidayPermission != 'none')
        || (!is_null($viewTaskPermission) && $viewTaskPermission != 'none')
        || (!is_null($viewTicketsPermission) && $viewTicketsPermission != 'none')
        || (!is_null($viewLeavePermission) && $viewLeavePermission != 'none')
        ): ?>
        <link rel="stylesheet" href="<?php echo e(asset('vendor/full-calendar/main.min.css')); ?>">
    <?php endif; ?>
    <style>
        .h-200 {
            max-height: 340px;
            overflow-y: auto;
        }

        .dashboard-settings {
            width: 600px;
        }

        @media (max-width: 768px) {
            .dashboard-settings {
                width: 300px;
            }
        }

        .fc-list-event-graphic{
            display: none;
        }

        .fc .fc-list-event:hover td{
            background-color: #fff !important;
            color:#000 !important;
        }
        .left-3{
            margin-right: -22px;
        }
        .clockin-right{
            margin-right: -10px;
        }

        .week-pagination li {
            margin-right: 5px;
            z-index: 1;
        }
        .week-pagination li a {
            border-radius: 50%;
            padding: 2px 6px !important;
            font-size: 11px !important;
        }

        .week-pagination li.page-item:first-child .page-link {
            border-top-left-radius: 50%;
            border-bottom-left-radius: 50%;
        }

        .week-pagination li.page-item:last-child .page-link {
            border-top-right-radius: 50%;
            border-bottom-right-radius: 50%;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <!-- CONTENT WRAPPER START -->
    <div class="px-4 py-2 border-top-0 emp-dashboard">
        <!-- WELOCOME START -->
        <?php if(!is_null($checkTodayLeave)): ?>
            <div class="row pt-4">
                <div class="col-md-12">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.alert','data' => ['type' => 'info','icon' => 'info-circle']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'info','icon' => 'info-circle']); ?>
                        <a href="<?php echo e(route('leaves.show', $checkTodayLeave->id)); ?>" class="openRightModal text-dark-grey">
                            <u><?php echo app('translator')->get('messages.youAreOnLeave'); ?></u>
                        </a>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                </div>
            </div>
        <?php elseif(!is_null($checkTodayHoliday)): ?>
            <div class="row pt-4">
                <div class="col-md-12">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.alert','data' => ['type' => 'info','icon' => 'info-circle']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'info','icon' => 'info-circle']); ?>
                        <a href="<?php echo e(route('holidays.show', $checkTodayHoliday->id)); ?>" class="openRightModal text-dark-grey">
                            <u><?php echo app('translator')->get('messages.holidayToday'); ?></u>
                        </a>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                </div>
            </div>
        <?php endif; ?>


        <?php if(in_array('admin', user_roles())): ?>
            <div class="row">
                <?php echo $__env->make('dashboard.update-message-dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                
                <?php echo $__env->make('dashboard.update-gateway-credentials', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php if (isset($component)) { $__componentOriginalfdb1c63d872b5888756899da3f1608907c585540 = $component; } ?>
<?php $component = App\View\Components\CronMessage::resolve(['modal' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cron-message'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\CronMessage::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfdb1c63d872b5888756899da3f1608907c585540)): ?>
<?php $component = $__componentOriginalfdb1c63d872b5888756899da3f1608907c585540; ?>
<?php unset($__componentOriginalfdb1c63d872b5888756899da3f1608907c585540); ?>
<?php endif; ?>
            </div>
        <?php endif; ?>

        <div class="d-lg-flex d-md-flex d-block py-4">

            <!-- WELOCOME NAME START -->
            <div>
                <h3 class="heading-h3 mb-0 f-21 text-capitalize font-weight-bold"><?php echo app('translator')->get('app.welcome'); ?> <?php echo e($user->name); ?></h3>
            </div>
            <!-- WELOCOME NAME END -->

            <!-- CLOCK IN CLOCK OUT START -->
            <div
                class="ml-auto d-flex clock-in-out mb-3 mb-lg-0 mb-md-0 m mt-4 mt-lg-0 mt-md-0 justify-content-between">
                <p
                    class="mb-0 text-lg-right text-md-right f-18 font-weight-bold text-dark-grey d-grid align-items-center">
                    <input type="hidden" id="current-latitude" name="current_latitude">
                    <input type="hidden" id="current-longitude" name="current_longitude">

                    <span id="dashboard-clock"><?php echo now()->timezone(company()->timezone)->format(company()->time_format) . '</span><span class="f-10 font-weight-normal">' . now()->timezone(company()->timezone)->format('l') . '</span>'; ?>


                    <?php if(!is_null($currentClockIn)): ?>
                        <span class="f-11 font-weight-normal text-lightest">
                            <?php echo app('translator')->get('app.clockInAt'); ?> -
                            <?php echo e($currentClockIn->clock_in_time->timezone(company()->timezone)->format(company()->time_format)); ?>

                        </span>
                    <?php endif; ?>
                </p>

                <?php if(in_array('attendance', user_modules()) && $cannotLogin == false): ?>
                    <?php if(is_null($currentClockIn) && is_null($checkTodayLeave) && is_null($checkTodayHoliday)): ?>
                        <button type="button" class="btn-primary rounded f-15 ml-4" id="clock-in"><i
                        class="icons icon-login mr-2"></i><?php echo app('translator')->get('modules.attendance.clock_in'); ?></button>
                    <?php endif; ?>
                <?php endif; ?>

                <?php if(!is_null($currentClockIn) && is_null($currentClockIn->clock_out_time)): ?>
                    <button type="button" class="btn-danger rounded f-15 ml-4" id="clock-out"><i
                            class="icons icon-login mr-2"></i><?php echo app('translator')->get('modules.attendance.clock_out'); ?></button>
                <?php endif; ?>

                <?php if(in_array('admin', user_roles())): ?>
                    <div class="private-dash-settings d-flex align-self-center">
                        <?php if (isset($component)) { $__componentOriginal0777dca6b0ab2eebdcaf6ba884d5b30ab61203a6 = $component; } ?>
<?php $component = App\View\Components\Form::resolve(['method' => 'POST'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Form::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'privateDashboardWidgetForm']); ?>
                            <div class="dropdown keep-open">
                                <a class="d-flex align-items-center justify-content-center dropdown-toggle px-4 text-dark left-3"
                                    type="link" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"

                                    aria-expanded="false">
                                    <i class="fa fa-cog" title="<?php echo e(__('modules.dashboard.dashboardWidgets')); ?> <?php echo e(__('app.settings')); ?>" data-toggle="tooltip"></i>
                                </a>
                                <!-- Dropdown - User Information -->
                                <ul class="dropdown-menu dropdown-menu-right dashboard-settings p-20"
                                    aria-labelledby="dropdownMenuLink" tabindex="0">
                                    <li class="border-bottom mb-3">
                                        <h4 class="heading-h3"><?php echo app('translator')->get('modules.dashboard.dashboardWidgets'); ?></h4>
                                    </li>
                                    <?php $__currentLoopData = $widgets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $widget): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $wname = \Illuminate\Support\Str::camel($widget->widget_name);
                                        ?>
                                        <li class="mb-2 float-left w-50">
                                            <div class="checkbox checkbox-info ">
                                                <input id="<?php echo e($widget->widget_name); ?>" name="<?php echo e($widget->widget_name); ?>"
                                                    value="true" <?php if($widget->status): ?> checked <?php endif; ?> type="checkbox">
                                                <label for="<?php echo e($widget->widget_name); ?>"><?php echo app('translator')->get('modules.dashboard.' .
                                                    $wname); ?></label>
                                            </div>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(count($widgets) % 2 != 0): ?>
                                        <li class="mb-2 float-left w-50 height-35"></li>
                                    <?php endif; ?>
                                    <li class="float-none w-100">
                                        <?php if (isset($component)) { $__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480 = $component; } ?>
<?php $component = App\View\Components\Forms\ButtonPrimary::resolve(['icon' => 'check'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'save-dashboard-widget']); ?><?php echo app('translator')->get('app.save'); ?>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480)): ?>
<?php $component = $__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480; ?>
<?php unset($__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480); ?>
<?php endif; ?>
                                    </li>
                                </ul>
                            </div>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0777dca6b0ab2eebdcaf6ba884d5b30ab61203a6)): ?>
<?php $component = $__componentOriginal0777dca6b0ab2eebdcaf6ba884d5b30ab61203a6; ?>
<?php unset($__componentOriginal0777dca6b0ab2eebdcaf6ba884d5b30ab61203a6); ?>
<?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
            <!-- CLOCK IN CLOCK OUT END -->
        </div>
        <!-- WELOCOME END -->
         <!-- EMPLOYEE DASHBOARD DETAIL START -->
         <div class="row emp-dash-detail">
            <!-- EMP DASHBOARD INFO NOTICES START -->
            <?php if(count(array_intersect(['profile', 'shift_schedule', 'birthday', 'notices'], $activeWidgets)) > 0): ?>
                <div class="col-xl-5 col-lg-12 col-md-12 e-d-info-notices">
                    <div class="row">
                        <?php if(in_array('profile', $activeWidgets)): ?>
                        <!-- EMP DASHBOARD INFO START -->
                        <div class="col-md-12">
                            <div class="card border-0 b-shadow-4 mb-3 e-d-info">
                                <div class="card-horizontal align-items-center">
                                    <div class="card-img">
                                        <img class="" src=" <?php echo e($user->image_url); ?>" alt="Card image">
                                    </div>
                                    <div class="card-body border-0 pl-0">
                                        <h4 class="card-title f-18 f-w-500 mb-0"><?php echo e(mb_ucfirst($user->name)); ?></h4>
                                        <p class="f-14 font-weight-normal text-dark-grey mb-2">
                                            <?php echo e($user->employeeDetails->designation->name ?? '--'); ?></p>
                                        <p class="card-text f-12 text-lightest"> <?php echo app('translator')->get('app.employeeId'); ?> :
                                            <?php echo e(mb_strtoupper($user->employeeDetails->employee_id)); ?></p>
                                    </div>
                                </div>

                                <div class="card-footer bg-white border-top-grey py-3">
                                    <div class="d-flex flex-wrap justify-content-between">
                                        <span>
                                            <label class="f-12 text-dark-grey mb-12 text-capitalize" for="usr">
                                                <?php echo app('translator')->get('app.open'); ?> <?php echo app('translator')->get('app.menu.tasks'); ?> </label>
                                            <p class="mb-0 f-18 f-w-500">
                                                <a href="<?php echo e(route('tasks.index') . '?assignee=me'); ?>"
                                                    class="text-dark">
                                                    <?php echo e($inProcessTasks); ?>

                                                </a>
                                            </p>
                                        </span>
                                        <span>
                                            <label class="f-12 text-dark-grey mb-12 text-capitalize" for="usr">
                                                <?php echo app('translator')->get('app.menu.projects'); ?> </label>
                                            <p class="mb-0 f-18 f-w-500">
                                                <a href="<?php echo e(route('projects.index') . '?assignee=me&status=all'); ?>"
                                                    class="text-dark"><?php echo e($totalProjects); ?></a>
                                            </p>
                                        </span>

                                        <?php if(isset($totalOpenTickets)): ?>
                                            <span>
                                                <label class="f-12 text-dark-grey mb-12 text-capitalize" for="usr">
                                                    <?php echo app('translator')->get('modules.dashboard.totalOpenTickets'); ?> </label>
                                                <p class="mb-0 f-18 f-w-500">
                                                    <a href="<?php echo e(route('tickets.index') . '?agent=me&status=open'); ?>"
                                                        class="text-dark"><?php echo e($totalOpenTickets); ?></a>
                                                </p>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- EMP DASHBOARD INFO END -->
                        <?php endif; ?>

                        <?php if(!is_null($myActiveTimer)): ?>
                            <div class="col-sm-12" id="myActiveTimerSection">
                                <?php if (isset($component)) { $__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e = $component; } ?>
<?php $component = App\View\Components\Cards\Data::resolve(['title' => __('modules.timeLogs.myActiveTimer')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Data::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mb-3']); ?>
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
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center f-12 text-dark-grey">
                                                    <span><i class="fa fa-clock"></i>
                                                        <?php echo app('translator')->get('modules.timeLogs.startTime'); ?></span>
                                                    <?php echo e($myActiveTimer->start_time->timezone(company()->timezone)->format(company()->time_format)); ?>

                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center f-12 text-dark-grey">
                                                    <span><i class="fa fa-briefcase"></i> <?php echo app('translator')->get('app.task'); ?></span>
                                                    <a href="<?php echo e(route('tasks.show', $myActiveTimer->task->id)); ?>"
                                                        class="text-dark-grey openRightModal"><?php echo e($myActiveTimer->task->heading); ?></a>
                                                </li>
                                                <?php $__currentLoopData = $myActiveTimer->breaks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li
                                                        class="list-group-item d-flex justify-content-between align-items-center f-12 text-dark-grey">
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
                                                            <span><i class="fa fa-mug-hot"></i>
                                                                <?php echo app('translator')->get('modules.timeLogs.break'); ?>
                                                                (<?php echo e($timeLog); ?>)
                                                            </span>
                                                            <?php echo e($item->start_time->timezone(company()->timezone)->format(company()->time_format) . ' - ' . $item->end_time->timezone(company()->timezone)->format(company()->time_format)); ?>

                                                        <?php else: ?>
                                                            <span><i class="fa fa-mug-hot"></i>
                                                                <?php echo app('translator')->get('modules.timeLogs.break'); ?></span>
                                                            <?php echo e($item->start_time->timezone(company()->timezone)->format(company()->time_format)); ?>

                                                        <?php endif; ?>
                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>

                                        </div>
                                        <div class="col-sm-12 pt-3 text-right">
                                            <?php if($editTimelogPermission == 'all' || ($editTimelogPermission == 'added' && $myActiveTimer->added_by == user()->id) || ($editTimelogPermission == 'owned' && (($myActiveTimer->project && $myActiveTimer->project->client_id == user()->id) || $myActiveTimer->user_id == user()->id)) || ($editTimelogPermission == 'both' && (($myActiveTimer->project && $myActiveTimer->project->client_id == user()->id) || $myActiveTimer->user_id == user()->id || $myActiveTimer->added_by == user()->id))): ?>
                                                <?php if(is_null($myActiveTimer->activeBreak)): ?>
                                                    <?php if (isset($component)) { $__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26 = $component; } ?>
<?php $component = App\View\Components\Forms\ButtonSecondary::resolve(['icon' => 'pause-circle'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonSecondary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['data-time-id' => ''.e($myActiveTimer->id).'','id' => 'pause-timer-btn']); ?>
                                                        <?php echo app('translator')->get('modules.timeLogs.pauseTimer'); ?> <?php echo $__env->renderComponent(); ?>
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
<?php $component->withAttributes(['class' => 'ml-3 stop-active-timer','data-time-id' => ''.e($myActiveTimer->id).'']); ?>
                                                        <?php echo app('translator')->get('modules.timeLogs.stopTimer'); ?> <?php echo $__env->renderComponent(); ?>
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
<?php $component->withAttributes(['id' => 'resume-timer-btn','data-time-id' => ''.e($myActiveTimer->activeBreak->id).'']); ?>
                                                        <?php echo app('translator')->get('modules.timeLogs.resumeTimer'); ?> <?php echo $__env->renderComponent(); ?>
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
                        <?php endif; ?>

                        <?php if(in_array('attendance', user_modules()) && in_array('shift_schedule', $activeWidgets)): ?>
                            <div class="col-sm-12">
                                <?php if (isset($component)) { $__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e = $component; } ?>
<?php $component = App\View\Components\Cards\Data::resolve(['title' => __('modules.attendance.shiftSchedule'),'padding' => 'false','otherClasses' => 'h-200'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Data::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mb-3']); ?>
                                     <?php $__env->slot('action', null, []); ?> 
                                        <?php if (isset($component)) { $__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480 = $component; } ?>
<?php $component = App\View\Components\Forms\ButtonPrimary::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'view-shifts']); ?><?php echo app('translator')->get('modules.attendance.shift'); ?>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480)): ?>
<?php $component = $__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480; ?>
<?php unset($__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480); ?>
<?php endif; ?>
                                     <?php $__env->endSlot(); ?>

                                    <?php if (isset($component)) { $__componentOriginale53a9d2e6d6c51019138cc2fcd3ba8ac893391c6 = $component; } ?>
<?php $component = App\View\Components\Table::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Table::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                        <?php $__currentLoopData = $currentWeekDates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $weekDate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(isset($weekShifts[$key])): ?>
                                                <tr>
                                                    <td class="pl-20">
                                                        <?php echo e($weekDate->format(company()->date_format)); ?>

                                                    </td>
                                                    <td><?php echo e($weekDate->format('l')); ?></td>
                                                    <td>
                                                        <?php if(isset($weekShifts[$key]->shift)): ?>
                                                            <span class="badge badge-success"
                                                                style="background-color:<?php echo e($weekShifts[$key]->shift->color); ?>"><?php echo e($weekShifts[$key]->shift->shift_name); ?>

                                                            </span>

                                                            <?php if(!is_null($weekShifts[$key]->remarks) && $weekShifts[$key]->remarks != ''): ?>
                                                            <i class="fa fa-info-circle text-dark-grey" data-toggle="popover" data-placement="top" data-content="<?php echo e($weekShifts[$key]->remarks); ?>" data-html="true" data-trigger="hover"></i>
                                                        <?php endif; ?>
                                                        <?php else: ?>
                                                            <?php echo $weekShifts[$key]; ?>

                                                        <?php endif; ?>
                                                    </td>
                                                        <td class="pr-20 text-right">
                                                            <?php if(isset($weekShifts[$key]->shift)): ?>
                                                                <?php if(attendance_setting()->allow_shift_change && !$weekDate->isPast()): ?>
                                                                    <?php if(!is_null($weekShifts[$key]->requestChange) && $weekShifts[$key]->requestChange->status == 'waiting'): ?>
                                                                        <div class="task_view">
                                                                            <a href="javascript:;"
                                                                                data-shift-schedule-id="<?php echo e($weekShifts[$key]->id); ?>"
                                                                                class="taskView border-right-0 request-shift-change f-11"><?php echo app('translator')->get('modules.attendance.requestPending'); ?></a>
                                                                        </div>
                                                                    <?php else: ?>
                                                                        <div class="task_view">
                                                                            <a href="javascript:;"
                                                                                data-shift-schedule-id="<?php echo e($weekShifts[$key]->id); ?>"
                                                                                class="taskView border-right-0 request-shift-change f-11"><?php echo app('translator')->get('modules.attendance.requestChange'); ?></a>
                                                                        </div>
                                                                    <?php endif; ?>
                                                                <?php else: ?>
                                                                --
                                                                <?php endif; ?>
                                                            <?php else: ?>
                                                                --
                                                            <?php endif; ?>

                                                        </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                            </div>
                        <?php endif; ?>

                        <?php if(in_array('birthday', $activeWidgets)): ?>
                        <!-- EMP DASHBOARD BIRTHDAY START -->
                        <div class="col-sm-12">
                            <?php if (isset($component)) { $__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e = $component; } ?>
<?php $component = App\View\Components\Cards\Data::resolve(['title' => __('modules.dashboard.birthday'),'padding' => 'false','otherClasses' => 'h-200'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Data::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'e-d-info mb-3']); ?>
                                <?php if (isset($component)) { $__componentOriginale53a9d2e6d6c51019138cc2fcd3ba8ac893391c6 = $component; } ?>
<?php $component = App\View\Components\Table::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Table::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                    <?php $__empty_1 = true; $__currentLoopData = $upcomingBirthdays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $upcomingBirthday): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td class="pl-20">
                                                <?php if (isset($component)) { $__componentOriginal1c46ebe885e3c4421e9977d656c777b9bed6c39a = $component; } ?>
<?php $component = App\View\Components\Employee::resolve(['user' => $upcomingBirthday->user] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                                            <td>
                                                <span class="badge badge-secondary p-2">
                                                    <i class="fa fa-birthday-cake"></i>
                                                    <?php echo e($upcomingBirthday->date_of_birth->format('d')); ?>

                                                    <?php echo e($upcomingBirthday->date_of_birth->format('M')); ?>

                                                </span>
                                            </td>
                                            <td class="pr-20" align="right">
                                                <?php
                                                    $currentYear = now()->year;
                                                    $dateBirth = $upcomingBirthday->date_of_birth->format($currentYear . '-m-d');
                                                    $dateBirth = \Carbon\Carbon::parse($dateBirth);

                                                    $currentDay = \Carbon\Carbon::parse(now(company()->timezone)->toDateTimeString())->startOfDay()->setTimezone('UTC');
                                                    $diffInDays = $dateBirth->copy()->diffForHumans($currentDay);
                                                ?>

                                                <?php if($dateBirth->setTimezone(company()->timezone)->isToday()): ?>
                                                    <span class="badge badge-light p-2"><?php echo app('translator')->get('app.today'); ?></span>
                                                <?php else: ?>
                                                    <span class="badge badge-light p-2"><?php echo e($diffInDays); ?></span>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="3" class="shadow-none">
                                                <?php if (isset($component)) { $__componentOriginaldd4a3acb850ed912fbb4dfa63003ef1bff802c33 = $component; } ?>
<?php $component = App\View\Components\Cards\NoRecord::resolve(['icon' => 'birthday-cake','message' => __('messages.noRecordFound')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                        </div>
                        <!-- EMP DASHBOARD BIRTHDAY END -->
                        <?php endif; ?>
                        <?php if(in_array('appreciation', $activeWidgets)): ?>
                        <!-- EMP DASHBOARD APPRECIATION START -->
                        <div class="col-sm-12">
                            <?php if (isset($component)) { $__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e = $component; } ?>
<?php $component = App\View\Components\Cards\Data::resolve(['title' => __('app.employee').' '.__('modules.dashboard.appreciation'),'padding' => 'false','otherClasses' => 'h-200'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Data::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'e-d-info mb-3']); ?>
                                <?php if (isset($component)) { $__componentOriginale53a9d2e6d6c51019138cc2fcd3ba8ac893391c6 = $component; } ?>
<?php $component = App\View\Components\Table::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Table::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'appreciation-table']); ?>
                                    <?php $__empty_1 = true; $__currentLoopData = $appreciations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appreciation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td>
                                                <?php if (isset($component)) { $__componentOriginal1c46ebe885e3c4421e9977d656c777b9bed6c39a = $component; } ?>
<?php $component = App\View\Components\Employee::resolve(['user' => $appreciation->awardTo] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                                            <td class="text-right pr-20">
                                                <div class="position-relative d-flex justify-content-between" data-toggle="tooltip" data-original-title="">
                                                    <?php if(isset($appreciation->award->awardIcon->icon)): ?>
                                                        <i class="bi bi-<?php echo e($appreciation->award->awardIcon->icon); ?> f-15 text-white position-absolute appreciation-icon"></i>
                                                        <i class="bi bi-hexagon-fill fs-40" style="color: <?php echo e($appreciation->award->color_code); ?>"></i>
                                                    <?php endif; ?>
                                                    <?php if(isset($appreciation->award)): ?>
                                                        <div class="ml-1 f-12">
                                                            <span class="font-weight-bold"><?php echo e(mb_ucwords($appreciation->award->title)); ?></span><br>
                                                            <?php echo e($appreciation->award_date->format($company->date_format)); ?>

                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="3" class="shadow-none">
                                                <?php if (isset($component)) { $__componentOriginaldd4a3acb850ed912fbb4dfa63003ef1bff802c33 = $component; } ?>
<?php $component = App\View\Components\Cards\NoRecord::resolve(['icon' => 'award','message' => __('messages.noRecordFound')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                        </div>
                        <!-- EMP DASHBOARD APPRECIATION END -->
                        <?php endif; ?>

                        <?php if(in_array('leave', $activeWidgets)): ?>
                        <!-- EMP DASHBOARD BIRTHDAY START -->
                        <div class="col-sm-12">
                            <?php if (isset($component)) { $__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e = $component; } ?>
<?php $component = App\View\Components\Cards\Data::resolve(['title' => __('modules.dashboard.leave'),'padding' => 'false','otherClasses' => 'h-200'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Data::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'e-d-info mb-3']); ?>
                                <?php if (isset($component)) { $__componentOriginale53a9d2e6d6c51019138cc2fcd3ba8ac893391c6 = $component; } ?>
<?php $component = App\View\Components\Table::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Table::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                    <?php $__empty_1 = true; $__currentLoopData = $leave; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $totalLeave): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td class="pl-20">
                                                <?php if (isset($component)) { $__componentOriginal1c46ebe885e3c4421e9977d656c777b9bed6c39a = $component; } ?>
<?php $component = App\View\Components\Employee::resolve(['user' => $totalLeave->user] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                                            <td class="pr-20">
                                                <?php if($totalLeave->duration == 'single' || $totalLeave->duration == 'multiple'): ?>
                                                    <span class="badge badge-secondary p-2"><?php echo app('translator')->get('modules.dashboard.fullDay'); ?></span>
                                                <?php else: ?>
                                                    <?php if($totalLeave->duration == 'half day' && $totalLeave->half_day_type == 'first_half'): ?>
                                                        <span class="badge badge-secondary p-2"><?php echo app('translator')->get('modules.leaves.firstHalf'); ?></span>
                                                    <?php else: ?>
                                                        <span class="badge badge-secondary p-2"><?php echo app('translator')->get('modules.leaves.secondHalf'); ?></span>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </td>
                                            <td class="pr-20" align="right">
                                                <span class="badge badge-success p-2" style="background-color:<?php echo e($totalLeave->type->color); ?>"><?php echo e(ucfirst($totalLeave->type->type_name)); ?></span>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="3" class="shadow-none">
                                                <?php if (isset($component)) { $__componentOriginaldd4a3acb850ed912fbb4dfa63003ef1bff802c33 = $component; } ?>
<?php $component = App\View\Components\Cards\NoRecord::resolve(['icon' => 'plane-departure','message' => __('messages.noRecordFound')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                        </div>
                        <!-- EMP DASHBOARD BIRTHDAY END -->
                        <?php endif; ?>

                        <?php if(in_array('work_from_home', $activeWidgets)): ?>
                        <!-- ON WORK FROM HOME START -->
                        <div class="col-sm-12">
                            <?php if (isset($component)) { $__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e = $component; } ?>
<?php $component = App\View\Components\Cards\Data::resolve(['title' => __('modules.dashboard.workFromHome'),'padding' => 'false'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Data::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'e-d-info mb-3']); ?>
                                <div class="row pr-20 ml-2">
                                    <?php $__empty_1 = true; $__currentLoopData = $workFromHome; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $totalworkFromHome): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <div class="col-md-6 mb-2">
                                        <?php if (isset($component)) { $__componentOriginal1c46ebe885e3c4421e9977d656c777b9bed6c39a = $component; } ?>
<?php $component = App\View\Components\Employee::resolve(['user' => $totalworkFromHome->user] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <p colspan="3" class="shadow-none">
                                        <?php if (isset($component)) { $__componentOriginaldd4a3acb850ed912fbb4dfa63003ef1bff802c33 = $component; } ?>
<?php $component = App\View\Components\Cards\NoRecord::resolve(['icon' => 'home','message' => __('messages.noRecordFound')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                                    </p>
                                    <?php endif; ?>

                                </div>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e)): ?>
<?php $component = $__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e; ?>
<?php unset($__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e); ?>
<?php endif; ?>
                        </div>
                        <!-- ON WORK FROM HOME  END -->
                        <?php endif; ?>

                        <?php if(in_array('work_anniversary', $activeWidgets)): ?>
                            <!-- EMP DASHBOARD ANNIVERSARY START -->
                            <div class="col-sm-12">
                                <?php if (isset($component)) { $__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e = $component; } ?>
<?php $component = App\View\Components\Cards\Data::resolve(['title' => __('modules.employees.joineeAndWorkAnniversary'),'padding' => 'false','otherClasses' => 'h-200'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Data::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'e-d-info']); ?>
                                    <?php if (isset($component)) { $__componentOriginale53a9d2e6d6c51019138cc2fcd3ba8ac893391c6 = $component; } ?>
<?php $component = App\View\Components\Table::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Table::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                        <?php $__empty_1 = true; $__currentLoopData = $upcomingAnniversaries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $upcomingAnniversary): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <tr>
                                                <td class="pl-20">
                                                    <?php if (isset($component)) { $__componentOriginal1c46ebe885e3c4421e9977d656c777b9bed6c39a = $component; } ?>
<?php $component = App\View\Components\Employee::resolve(['user' => $upcomingAnniversary->user] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                                                <td class="pr-20" align="right">
                                                    <?php
                                                        // calculate total worked days
                                                        $currentDay = \Carbon\Carbon::parse(now(company()->timezone)->toDateTimeString())->startOfDay()->setTimezone('UTC');
                                                        $joiningDay = $upcomingAnniversary->joining_date;
                                                        $totalWorkDays = $joiningDay->copy()->diff($currentDay);
                                                    ?>
                                                    <?php if($joiningDay->setTimezone(company()->timezone)->isToday()): ?>
                                                        <span class="badge badge-secondary p-2"><?php echo app('translator')->get('modules.dashboard.joinedToday'); ?></span>
                                                    <?php else: ?>
                                                        <span class="badge badge-secondary p-2"><?php echo e($totalWorkDays->format(__('app.completed'). ' ' . ' %y '.__('app.year'))); ?></span>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <tr>
                                                <td colspan="3" class="shadow-none">
                                                    <?php if (isset($component)) { $__componentOriginaldd4a3acb850ed912fbb4dfa63003ef1bff802c33 = $component; } ?>
<?php $component = App\View\Components\Cards\NoRecord::resolve(['icon' => 'birthday-cake','message' => __('messages.noRecordFound')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                            </div>
                            <!-- EMP DASHBOARD ANNIVERSARY END -->
                        <?php endif; ?>

                    </div>
                </div>
            <?php endif; ?>
            <!-- EMP DASHBOARD INFO NOTICES END -->
            <!-- EMP DASHBOARD TASKS PROJECTS EVENTS START -->
            <div class="col-xl-7 col-lg-12 col-md-12 e-d-tasks-projects-events">
                <!-- EMP DASHBOARD TASKS PROJECTS START -->
                <div class="row mb-3 mt-xl-0 mt-lg-4 mt-md-4 mt-4">
                    <?php if(in_array('tasks', $activeWidgets)): ?>
                        <div class="col-md-6">
                            <div
                                class="bg-white p-20 rounded b-shadow-4 d-flex justify-content-between align-items-center mb-4 mb-md-0 mb-lg-0">
                                <div class="d-block text-capitalize">
                                    <h5 class="f-15 f-w-500 mb-20 text-darkest-grey"><?php echo app('translator')->get('app.menu.tasks'); ?></h5>
                                    <div class="d-flex">
                                        <a href="<?php echo e(route('tasks.index') . '?assignee=me'); ?>">
                                            <p class="mb-0 f-21 font-weight-bold text-blue d-grid mr-5">
                                                <?php echo e($inProcessTasks); ?><span class="f-12 font-weight-normal text-lightest">
                                                    <?php echo app('translator')->get('app.pending'); ?> </span>
                                            </p>
                                        </a>
                                        <a href="<?php echo e(route('tasks.index') . '?assignee=me&overdue=yes'); ?>">
                                            <p class="mb-0 f-21 font-weight-bold text-red d-grid"><?php echo e($dueTasks); ?><span
                                                    class="f-12 font-weight-normal text-lightest"><?php echo app('translator')->get('app.overdue'); ?></span>
                                            </p>
                                        </a>
                                    </div>
                                </div>
                                <div class="d-block">
                                    <i class="fa fa-list text-lightest f-27"></i>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if(in_array('projects', $activeWidgets)): ?>
                        <div class="col-md-6">
                            <div
                                class="bg-white p-20 rounded b-shadow-4 d-flex justify-content-between align-items-center mt-3 mt-lg-0 mt-md-0">
                                <div class="d-block text-capitalize">
                                    <h5 class="f-15 f-w-500 mb-20 text-darkest-grey"> <?php echo app('translator')->get('app.menu.projects'); ?> </h5>
                                    <div class="d-flex">
                                        <a href="<?php echo e(route('projects.index') . '?assignee=me&status=in progress'); ?>">
                                            <p class="mb-0 f-21 font-weight-bold text-blue d-grid mr-5">
                                                <?php echo e($totalProjects); ?><span
                                                    class="f-12 font-weight-normal text-lightest"><?php echo app('translator')->get('app.inProgress'); ?></span>
                                            </p>
                                        </a>

                                        <a href="<?php echo e(route('projects.index') . '?assignee=me&status=overdue'); ?>">
                                            <p class="mb-0 f-21 font-weight-bold text-red d-grid">
                                                <?php echo e($dueProjects); ?><span
                                                    class="f-12 font-weight-normal text-lightest"><?php echo app('translator')->get('app.overdue'); ?></span>
                                            </p>
                                        </a>
                                    </div>
                                </div>
                                <div class="d-block">
                                    <i class="fa fa-layer-group text-lightest f-27"></i>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if(in_array('lead', $activeWidgets) && $leadAgent): ?>
                            <div class="col-md-6 mt-3">
                                <div
                                    class="bg-white p-20 rounded b-shadow-4 d-flex justify-content-between align-items-center mt-3 mt-lg-0 mt-md-0">
                                    <div class="d-block text-capitalize">
                                        <h5 class="f-15 f-w-500 mb-20 text-darkest-grey"> <?php echo app('translator')->get('app.menu.lead'); ?> </h5>
                                        <div class="d-flex">
                                            <a href="<?php echo e(route('leads.index') . '?assignee=me&type=lead'); ?>">
                                                <p class="mb-0 f-21 font-weight-bold text-blue d-grid mr-5">
                                                    <?php echo e($totalLead); ?><span
                                                        class="f-12 font-weight-normal text-lightest"><?php echo app('translator')->get('app.total'); ?> <?php echo app('translator')->get('app.menu.leads'); ?></span>
                                                </p>
                                            </a>

                                            <a href="<?php echo e(route('leads.index') . '?assignee=me&type=client'); ?>">
                                                <p class="mb-0 f-21 font-weight-bold text-success d-grid">
                                                    <?php echo e($convertedLead); ?><span
                                                        class="f-12 font-weight-normal text-lightest"><?php echo app('translator')->get('modules.lead.convertedLead'); ?></span>
                                                </p>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="d-block">
                                        <i class="bi bi-person text-lightest f-27"></i>
                                    </div>
                                </div>
                            </div>
                    <?php endif; ?>
                    <?php if(in_array('week_timelog', $activeWidgets)): ?>
                        <div class="col">
                            <div
                                class="bg-white p-20 rounded b-shadow-4 d-flex justify-content-between align-items-center mt-3">
                                <div class="d-block text-capitalize w-100">
                                    <h5 class="f-15 f-w-500 mb-20 text-darkest-grey"><?php echo app('translator')->get('modules.dashboard.weekTimelog'); ?> <span class="badge badge-secondary ml-1 f-10"><?php echo e(minute_to_hour($weekWiseTimelogs - $weekWiseTimelogBreak) . ' ' . __('modules.timeLogs.thisWeek')); ?></span></h5>

                                    <div id="weekly-timelogs">
                                        <nav class="mb-3">
                                            <ul class="pagination pagination-sm week-pagination">
                                                <?php $__currentLoopData = $weekPeriod->toArray(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li
                                                    class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                                        'page-item',
                                                        'week-timelog-day',
                                                        'active' => (now(company()->timezone)->toDateString() == $date->toDateString()),
                                                    ]) ?>"
                                                    data-toggle="tooltip" data-original-title="<?php echo e($date->format(company()->date_format)); ?>" data-date="<?php echo e($date->toDateString()); ?>">
                                                        <a class="page-link" href="javascript:;"><?php echo e($date->isoFormat('dd')); ?></a>
                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </nav>
                                        <div class="progress" style="height: 7px;">
                                            <?php
                                                $totalDayMinutes = $dateWiseTimelogs->sum('total_minutes');
                                                $totalDayBreakMinutes = $dateWiseTimelogBreak->sum('total_minutes');
                                                $totalDayMinutesPercent = ($totalDayMinutes > 0) ? floatval((floatval($totalDayMinutes - $totalDayBreakMinutes)/$totalDayMinutes) * 100) : 0;
                                            ?>
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: <?php echo e($totalDayMinutesPercent); ?>%" aria-valuenow="<?php echo e($totalDayMinutesPercent); ?>" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-original-title="<?php echo e(minute_to_hour($totalDayMinutes - $totalDayBreakMinutes)); ?>"></div>

                                            <div class="progress-bar bg-secondary" role="progressbar" style="width: <?php echo e((100 - $totalDayMinutesPercent)); ?>%" aria-valuenow="<?php echo e($totalDayMinutesPercent); ?>" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-original-title="<?php echo e(minute_to_hour($totalDayBreakMinutes)); ?>"></div>
                                        </div>

                                        <div class="d-flex justify-content-between mt-1 text-dark-grey f-12">
                                            <small><?php echo app('translator')->get('app.duration'); ?>: <?php echo e(minute_to_hour($dateWiseTimelogs->sum('total_minutes') - $dateWiseTimelogBreak->sum('total_minutes'))); ?></small>
                                            <small><?php echo app('translator')->get('modules.timeLogs.break'); ?>: <?php echo e(minute_to_hour($dateWiseTimelogBreak->sum('total_minutes'))); ?></small>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <!-- EMP DASHBOARD TASKS PROJECTS END -->

                <?php if(in_array('my_task', $activeWidgets)): ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card border-0 b-shadow-4 mb-3 e-d-info">
                            <?php if (isset($component)) { $__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e = $component; } ?>
<?php $component = App\View\Components\Cards\Data::resolve(['title' => __('modules.tasks.myTask'),'padding' => 'false','otherClasses' => 'h-200'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php $component->withAttributes([]); ?>
                                     <?php $__env->slot('thead', null, []); ?> 
                                        <th><?php echo app('translator')->get('app.task'); ?>#</th>
                                        <th><?php echo app('translator')->get('app.task'); ?></th>
                                        <th><?php echo app('translator')->get('app.status'); ?></th>
                                        <th class="text-right pr-20"><?php echo app('translator')->get('app.dueDate'); ?></th>
                                     <?php $__env->endSlot(); ?>

                                    <?php $__empty_1 = true; $__currentLoopData = $pendingTasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td class="pl-20">
                                                <a
                                                    href="<?php echo e(route('tasks.show', [$task->id])); ?>"
                                                    class="openRightModal f-12 mb-1 text-darkest-grey">#<?php echo e($task->task_short_code); ?></a>

                                            </td>
                                            <td>
                                                <div class="media align-items-center">
                                                    <div class="media-body">
                                                        <h5 class="f-12 mb-1 text-darkest-grey"><a
                                                                href="<?php echo e(route('tasks.show', [$task->id])); ?>"
                                                                class="openRightModal"><?php echo e(ucfirst($task->heading)); ?></a>
                                                        </h5>
                                                        <p class="mb-0">
                                                            <?php $__currentLoopData = $task->labels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <span class="badge badge-secondary mr-1"
                                                                    style="background-color: <?php echo e($label->label_color); ?>"><?php echo e($label->label_name); ?></span>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="pr-20">
                                                <i class="fa fa-circle mr-1 text-yellow"
                                                    style="color: <?php echo e($task->boardColumn->label_color); ?>"></i>
                                                <?php echo e($task->boardColumn->column_name); ?>

                                            </td>
                                            <td class="pr-20" align="right">
                                                <?php if(is_null($task->due_date)): ?>
                                                    --
                                                <?php elseif($task->due_date->endOfDay()->isPast()): ?>
                                                    <span
                                                        class="text-danger"><?php echo e($task->due_date->format(company()->date_format)); ?></span>
                                                <?php elseif($task->due_date->setTimezone(company()->timezone)->isToday()): ?>
                                                    <span class="text-success"><?php echo e(__('app.today')); ?></span>
                                                <?php else: ?>
                                                    <span><?php echo e($task->due_date->format(company()->date_format)); ?></span>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="4" class="shadow-none">
                                                <?php if (isset($component)) { $__componentOriginaldd4a3acb850ed912fbb4dfa63003ef1bff802c33 = $component; } ?>
<?php $component = App\View\Components\Cards\NoRecord::resolve(['icon' => 'tasks','message' => __('messages.noRecordFound')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <!-- EMP DASHBOARD EVENTS START -->
                <?php if(in_array('my_calender', $activeWidgets)): ?>
                    <div class="row">
                        <div class="col-md-12">
                            <?php if (isset($component)) { $__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e = $component; } ?>
<?php $component = App\View\Components\Cards\Data::resolve(['title' => __('app.menu.myCalendar')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Data::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                <div id="calendar"></div>
                                 <?php $__env->slot('action', null, []); ?> 
                                    <div class="dropdown ml-auto calendar-action">
                                        <button id="event-btn" class="btn btn-lg f-14 p-0 text-lightest text-capitalize rounded  dropdown-toggle cal-event" type="button"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-h"></i>
                                        </button>

                                            <div id="cal-drop" class="dropdown-menu dropdown-menu-right border-grey rounded b-shadow-4 p-2">
                                                <?php if(in_array('tasks', user_modules())): ?>
                                                <div class="custom-control custom-checkbox cal-filter">
                                                    <input type="checkbox" value="task"
                                                        class="form-check-input filter-check" name="calendar[]"
                                                        id="customCheck1" <?php if(in_array('task',$event_filter)): ?> checked <?php endif; ?>>
                                                    <label
                                                        class="form-check-label form_custom_label text-dark-grey pl-2 mr-3 justify-content-start cursor-pointer checkmark-20 pt-2 text-wrap"
                                                        for="customCheck1"><?php echo app('translator')->get('app.menu.tasks'); ?></label>
                                                </div>
                                                <?php endif; ?>
                                                <?php if(in_array('events', user_modules())): ?>
                                                <div class="custom-control custom-checkbox cal-filter">
                                                    <input type="checkbox" value="events"
                                                        class="form-check-input filter-check" name="calendar[]"
                                                        id="customCheck2" <?php if(in_array('events',$event_filter)): ?> checked <?php endif; ?>>
                                                    <label
                                                        class="form-check-label form_custom_label text-dark-grey pl-2 mr-3 justify-content-start cursor-pointer checkmark-20 pt-2 text-wrap"
                                                        for="customCheck2"><?php echo app('translator')->get('app.menu.Events'); ?></label>
                                                </div>
                                                <?php endif; ?>
                                                <?php if(in_array('holidays', user_modules())): ?>
                                                <div class="custom-control custom-checkbox cal-filter">
                                                    <input type="checkbox" value="holiday"
                                                        class="form-check-input filter-check" name="calendar[]"
                                                        id="customCheck3" <?php if(in_array('holiday',$event_filter)): ?> checked <?php endif; ?>>
                                                    <label
                                                        class="form-check-label form_custom_label text-dark-grey pl-2 mr-3 justify-content-start cursor-pointer checkmark-20 pt-2 text-wrap"
                                                        for="customCheck3"><?php echo app('translator')->get('app.menu.holiday'); ?></label>
                                                </div>
                                                <?php endif; ?>
                                                <?php if(in_array('tickets', user_modules())): ?>
                                                <div class="custom-control custom-checkbox cal-filter">
                                                    <input type="checkbox" value="tickets"
                                                        class="form-check-input filter-check" name="calendar[]"
                                                        id="customCheck4" <?php if(in_array('tickets',$event_filter)): ?> checked <?php endif; ?>>
                                                    <label
                                                        class="form-check-label form_custom_label text-dark-grey pl-2 mr-3 justify-content-start cursor-pointer checkmark-20 pt-2 text-wrap"
                                                        for="customCheck4"><?php echo app('translator')->get('app.menu.tickets'); ?></label>
                                                </div>
                                                <?php endif; ?>
                                                <?php if(in_array('leaves', user_modules())): ?>
                                                <div class="custom-control custom-checkbox cal-filter">
                                                    <input type="checkbox" value="leaves"
                                                        class="form-check-input filter-check" name="calendar[]"
                                                        id="customCheck5" <?php if(in_array('leaves',$event_filter)): ?> checked <?php endif; ?>>
                                                    <label
                                                        class="form-check-label form_custom_label text-dark-grey pl-2 mr-3 justify-content-start cursor-pointer checkmark-20 pt-2 text-wrap"
                                                        for="customCheck5"><?php echo app('translator')->get('app.menu.leaves'); ?></label>
                                                </div>
                                                <?php endif; ?>
                                            </div>
                                    </div>
                                 <?php $__env->endSlot(); ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e)): ?>
<?php $component = $__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e; ?>
<?php unset($__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e); ?>
<?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
                <!-- EMP DASHBOARD EVENTS END -->


                <?php if(in_array('notices', $activeWidgets)): ?>
                    <?php if(isset($notices)): ?>
                        <div class="row">
                            <!-- EMP DASHBOARD NOTICE START -->
                            <div class="col-md-12">
                                <div class="my-3 b-shadow-4 rounded bg-white pb-2">
                                    <!-- NOTICE HEADING START -->
                                    <div class="d-flex align-items-center b-shadow-4 p-20">
                                        <p class="mb-0 f-18 f-w-500"> <?php echo app('translator')->get('app.menu.notices'); ?> </p>
                                    </div>
                                    <!-- NOTICE HEADING END -->
                                    <!-- NOTICE DETAIL START -->
                                    <div class="b-shadow-4 cal-info scroll ps" data-menu-vertical="1" data-menu-scroll="1"
                                        data-menu-dropdown-timeout="500" id="empDashNotice" style="overflow: hidden;">


                                        <?php $__currentLoopData = $notices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="card border-0 b-shadow-4 p-20 rounded-0">
                                                <div class="card-horizontal">
                                                    <div class="card-header m-0 p-0 bg-white rounded">
                                                        <?php if (isset($component)) { $__componentOriginale3ee05d3639a92367e88bc9c1b458d9425919439 = $component; } ?>
<?php $component = App\View\Components\DateBadge::resolve(['month' => $notice->created_at->format('M'),'date' => $notice->created_at
                                                            ->timezone(company()->timezone)
                                                            ->format('d')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                                                        <h4 class="card-title f-14 font-weight-normal text-capitalize mb-0">
                                                            <a href="<?php echo e(route('notices.show', $notice->id)); ?>"
                                                                class="openRightModal text-darkest-grey"><?php echo e($notice->heading); ?></a>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div><!-- card end -->
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                        <div class="ps__rail-x" style="left: 0px; top: 0px;">
                                            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                        </div>
                                        <div class="ps__rail-y" style="top: 0px; left: 0px;">
                                            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                                        </div>
                                    </div>
                                    <!-- NOTICE DETAIL END -->
                                </div>
                            </div>
                            <!-- EMP DASHBOARD NOTICE END -->
                        </div>
                    <?php endif; ?>
                <?php endif; ?>


            </div>
            <!-- EMP DASHBOARD TASKS PROJECTS EVENTS END -->
        </div>
        <!-- EMPLOYEE DASHBOARD DETAIL END -->

    </div>
    <!-- CONTENT WRAPPER END -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <?php if((!is_null($viewEventPermission) && $viewEventPermission != 'none')
        || (!is_null($viewHolidayPermission) && $viewHolidayPermission != 'none')
        || (!is_null($viewTaskPermission) && $viewTaskPermission != 'none')
        || (!is_null($viewTicketsPermission) && $viewTicketsPermission != 'none')
        || (!is_null($viewLeavePermission) && $viewLeavePermission != 'none')
        ): ?>
        <script src="<?php echo e(asset('vendor/full-calendar/main.min.js')); ?>"></script>
        <script src="<?php echo e(asset('vendor/full-calendar/locales-all.min.js')); ?>"></script>
        <script>
            var initialLocaleCode = '<?php echo e(user()->locale); ?>';
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                locale: initialLocaleCode,
                timeZone: '<?php echo e(company()->timezone); ?>',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                },
                navLinks: true, // can click day/week names to navigate views
                selectable: false,
                initialView: 'listWeek',
                selectMirror: true,
                select: function(arg) {
                    addEventModal(arg.start, arg.end, arg.allDay);
                    calendar.unselect()
                },
                eventClick: function(arg) {
                    getEventDetail(arg.event.id,arg.event.extendedProps.event_type);
                },
                editable: false,
                dayMaxEvents: true, // allow "more" link when too many events
                events: {
                    url: "<?php echo e(route('dashboard.private_calendar')); ?>",
                },
                eventDidMount: function(info) {
                        $(info.el).css('background-color', info.event.extendedProps.bg_color);
                        $(info.el).css('color', info.event.extendedProps.color);
                        $(info.el).find('td.fc-list-event-title').prepend('<i class="fa '+info.event.extendedProps.icon+'"></i>&nbsp;&nbsp;');
                        // tooltip for leaves
                        if(info.event.extendedProps.event_type == 'leave'){
                            $(info.el).find('td.fc-list-event-title > a').css('cursor','default'); // list view cursor for leave
                            $(info.el).css('cursor','default')
                            $(info.el).tooltip({
                                title: info.event.extendedProps.name,
                                container: 'body',
                                delay: { "show": 50, "hide": 50 }
                            });
                    }
                },
                eventTimeFormat: { // like '14:30:00'
                    hour: company.time_format == 'H:i' ? '2-digit' : 'numeric',
                    minute: '2-digit',
                    meridiem: company.time_format == 'H:i' ? false : true
                }
            });

            if (calendarEl != null) {
                calendar.render();
            }

            // Task Detail show in sidebar
            var getEventDetail = function(id,type) {
                if(type == 'ticket')
                {
                    var url = "<?php echo e(route('tickets.show', ':id')); ?>";
                        url = url.replace(':id', id);
                        window.location = url;
                        return true;
                }

                if(type == 'leave')
                {
                    return true;
                }

                openTaskDetail();

                switch (type) {
                    case 'task':
                        var url = "<?php echo e(route('tasks.show', ':id')); ?>";
                        break;
                    case 'event':
                        var url = "<?php echo e(route('events.show', ':id')); ?>";
                        break;
                    case 'holiday':
                        var url = "<?php echo e(route('holidays.show', ':id')); ?>";
                        break;
                    case 'leave':
                        var url = "<?php echo e(route('leaves.show', ':id')); ?>";
                        break;
                    default:
                        return 0;
                        break;
                }

                url = url.replace(':id', id);

                $.easyAjax({
                    url: url,
                    blockUI: true,
                    container: RIGHT_MODAL,
                    historyPush: true,
                    success: function(response) {
                        if (response.status == "success") {
                            $(RIGHT_MODAL_CONTENT).html(response.html);
                            $(RIGHT_MODAL_TITLE).html(response.title);
                        }
                    },
                    error: function(request, status, error) {
                        if (request.status == 403) {
                            $(RIGHT_MODAL_CONTENT).html(
                                '<div class="align-content-between d-flex justify-content-center mt-105 f-21">403 | Permission Denied</div>'
                            );
                        } else if (request.status == 404) {
                            $(RIGHT_MODAL_CONTENT).html(
                                '<div class="align-content-between d-flex justify-content-center mt-105 f-21">404 | Not Found</div>'
                            );
                        } else if (request.status == 500) {
                            $(RIGHT_MODAL_CONTENT).html(
                                '<div class="align-content-between d-flex justify-content-center mt-105 f-21">500 | Something Went Wrong</div>'
                            );
                        }
                    }
                });

            };

            // calendar filter
            var hideDropdown = false;

            $('#event-btn').click(function(){
                if(hideDropdown == true)
                {
                    $('#cal-drop').hide();
                    hideDropdown = false;
                }
                else
                {
                    $('#cal-drop').toggle();
                    hideDropdown = true;
                }
            });


            $(document).mouseup(e => {

                const $menu = $('.calendar-action');

                if (!$menu.is(e.target) && $menu.has(e.target).length === 0)
                {
                    hideDropdown = false;
                    $('#cal-drop').hide();
                }
            });


            $('.cal-filter').on('click', function() {

                var filter = [];

                $('.filter-check:checked').each(function() {
                    filter.push($(this).val());
                });

                if(filter.length < 1){
                    filter.push('None');
                }

                calendar.removeAllEventSources();
                calendar.addEventSource({
                    url: "<?php echo e(route('dashboard.private_calendar')); ?>",
                    extraParams: {
                        filter: filter
                    }
                });

                filter = null;
            });
        </script>
    <?php endif; ?>

    <script>
        window.setInterval(function () {
            let date = new Date();
            $('#dashboard-clock').html(moment.tz(date, "<?php echo e(company()->timezone); ?>").format(MOMENTJS_TIME_FORMAT))
        }, 1000);

        $('#save-dashboard-widget').click(function() {
            $.easyAjax({
                url: "<?php echo e(route('dashboard.widget', 'private-dashboard')); ?>",
                container: '#privateDashboardWidgetForm',
                blockUI: true,
                type: "POST",
                redirect: true,
                data: $('#privateDashboardWidgetForm').serialize(),
                success: function() {
                    window.location.reload();
                }
            })
        });

        $('#clock-in').click(function() {
            const url = "<?php echo e(route('attendances.clock_in_modal')); ?>";
            $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_LG, url);
        });

        $('.request-shift-change').click(function() {
            var id = $(this).data('shift-schedule-id');
            var url = "<?php echo e(route('shifts-change.edit', ':id')); ?>";
            url = url.replace(':id', id);

            $(MODAL_DEFAULT + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_DEFAULT, url);
        });

        $('#view-shifts').click(function() {
            const url = "<?php echo e(route('employee-shifts.index')); ?>";
            $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_LG, url);
        });

        <?php if(!is_null($currentClockIn)): ?>
            $('#clock-out').click(function() {

                var token = "<?php echo e(csrf_token()); ?>";
                var currentLatitude = document.getElementById("current-latitude").value;
                var currentLongitude = document.getElementById("current-longitude").value;

                $.easyAjax({
                    url: "<?php echo e(route('attendances.update_clock_in')); ?>",
                    type: "GET",
                    data: {
                        currentLatitude: currentLatitude,
                        currentLongitude: currentLongitude,
                        _token: token,
                        id: '<?php echo e($currentClockIn->id); ?>'
                    },
                    success: function(response) {
                        if (response.status == 'success') {
                            window.location.reload();
                        }
                    }
                });
            });
        <?php endif; ?>

        $('.keep-open .dropdown-menu').on({
            "click": function(e) {
                e.stopPropagation();
            }
        });

        $('#weekly-timelogs').on('click', '.week-timelog-day', function() {
            var date = $(this).data('date');

            $.easyAjax({
                url: "<?php echo e(route('dashboard.week_timelog')); ?>",
                container: '#weekly-timelogs',
                blockUI: true,
                type: "POST",
                redirect: true,
                data: {
                    'date': date,
                    '_token': "<?php echo e(csrf_token()); ?>"
                },
                success: function(response) {
                    $('#weekly-timelogs').html(response.html)
                }
            })
        });

    </script>

    <?php if(attendance_setting()->radius_check == 'yes' || attendance_setting()->save_current_location): ?>
    <script>
        const currentLatitude = document.getElementById("current-latitude");
        const currentLongitude = document.getElementById("current-longitude");
        const x = document.getElementById("current-latitude");

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            }
        }

        function showPosition(position) {
            currentLatitude.value = position.coords.latitude;
            currentLongitude.value = position.coords.longitude;
        }
        getLocation();

    </script>

    <?php endif; ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/dashboard/employee/index.blade.php ENDPATH**/ ?>