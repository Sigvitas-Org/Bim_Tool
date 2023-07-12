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
        <!-- DATE START -->
        <div class="select-box d-flex pr-2 border-right-grey border-right-grey-sm-0">
            <p class="mb-0 pr-3 f-14 text-dark-grey d-flex align-items-center"><?php echo app('translator')->get('app.date'); ?></p>
            <div class="select-status d-flex">
                <input type="text" class="position-relative text-dark form-control border-0 p-2 text-left f-14 f-w-500"
                    id="datatableRange" placeholder="<?php echo app('translator')->get('placeholders.dateRange'); ?>">
            </div>
        </div>
        <!-- DATE END -->

        <!-- STATUS START -->
        <div class="select-box d-flex py-2 px-lg-2 px-md-2 px-0 border-right-grey border-right-grey-sm-0">
            <p class="mb-0 pr-3 f-14 text-dark-grey d-flex align-items-center"><?php echo app('translator')->get('app.status'); ?></p>
            <div class="select-status">
                <select class="form-control select-picker" name="status" id="ticket-status">
                    <option <?php echo e(request('status') == 'all' ? 'selected' : ''); ?> value="all"><?php echo app('translator')->get('app.all'); ?></option>
                    <option <?php echo e((request('status') == 'open' || request('status') == '' ) ? 'selected' : ''); ?> value="open">
                        <?php echo app('translator')->get('modules.tickets.totalOpenTickets'); ?></option>
                    <option <?php echo e(request('status') == 'pending' ? 'selected' : ''); ?> value="pending">
                        <?php echo app('translator')->get('modules.tickets.totalPendingTickets'); ?></option>
                    <option <?php echo e(request('status') == 'resolved' ? 'selected' : ''); ?> value="resolved">
                        <?php echo app('translator')->get('modules.tickets.totalResolvedTickets'); ?></option>
                    <option <?php echo e(request('status') == 'closed' ? 'selected' : ''); ?> value="closed">
                        <?php echo app('translator')->get('modules.tickets.totalClosedTickets'); ?></option>
                </select>
            </div>
        </div>
        <!-- STATUS END -->

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
            <!-- AGENT START -->
            <?php if(!in_array('client', user_roles())): ?>
                <div class="more-filter-items">
                    <label class="f-14 text-dark-grey mb-12 text-capitalize"
                        for="usr"><?php echo app('translator')->get('modules.tickets.agent'); ?></label>
                    <div class="select-filter mb-4">
                        <div class="select-others">
                            <select class="form-control select-picker" name="agent_id" id="agent_id" data-live-search="true"
                                data-container="body" data-size="8">
                                <option value="all"><?php echo app('translator')->get('app.all'); ?></option>
                                <?php if($groups): ?>
                                    <?php if($viewPermission == 'all'): ?>
                                        <option value="all"><?php echo app('translator')->get('app.all'); ?></option>
                                    <?php endif; ?>

                                    <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <optgroup label="<?php echo e(mb_ucwords($group->group_name)); ?>">
                                            <?php $__currentLoopData = $group->enabledAgents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if (isset($component)) { $__componentOriginal3a9f7815236e62d576ffe72a6df948b4e8598398 = $component; } ?>
<?php $component = App\View\Components\UserOption::resolve(['user' => $agent->user,'selected' => (request('agent') == $agent->user->id) || (request('agent') == 'me' && $agent->user->id == user()->id)] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                                        </optgroup>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <!-- AGENT END -->


            <div class="more-filter-items">
                <label class="f-14 text-dark-grey mb-12 text-capitalize" for="usr"><?php echo app('translator')->get('modules.tasks.priority'); ?></label>
                <div class="select-filter mb-4">
                    <div class="select-others">
                        <select class="form-control select-picker" name="priority" id="priority" data-live-search="true"
                            data-container="body" data-size="8">
                            <option value="all"><?php echo app('translator')->get('app.all'); ?></option>
                            <option value="low"><?php echo app('translator')->get('modules.tasks.low'); ?></option>
                            <option value="medium"><?php echo app('translator')->get('modules.tasks.medium'); ?></option>
                            <option value="high"><?php echo app('translator')->get('modules.tasks.high'); ?></option>
                            <option value="urgent"><?php echo app('translator')->get('modules.tickets.urgent'); ?></option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="more-filter-items">
                <label class="f-14 text-dark-grey mb-12 text-capitalize"
                    for="usr"><?php echo app('translator')->get('modules.tickets.channelName'); ?></label>
                <div class="select-filter mb-4">
                    <div class="select-others">
                        <select class="form-control select-picker" id="channel_id" data-container="body">
                            <option value="all"><?php echo app('translator')->get('app.all'); ?></option>
                            <?php $__currentLoopData = $channels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $channel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($channel->id); ?>"><?php echo e(mb_ucwords($channel->channel_name)); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="more-filter-items">
                <label class="f-14 text-dark-grey mb-12 text-capitalize" for="usr"><?php echo app('translator')->get('modules.invoices.type'); ?></label>
                <div class="select-filter mb-4">
                    <div class="select-others">
                        <select class="form-control select-picker" id="type_id" data-live-search="true" data-size="8"
                            data-container="body">
                            <option value="all"><?php echo app('translator')->get('app.all'); ?></option>
                            <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($type->id); ?>"><?php echo e(mb_ucwords($type->type)); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="more-filter-items">
                <label class="f-14 text-dark-grey mb-12 text-capitalize" for="usr"><?php echo app('translator')->get('modules.tickets.tags'); ?></label>
                <div class="select-filter mb-4">
                    <div class="select-others">
                        <select class="form-control select-picker" id="tag_id" data-live-search="true" data-size="8"
                            data-container="body">
                            <option value="all"><?php echo app('translator')->get('app.all'); ?></option>
                            <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($tag->id); ?>"><?php echo e(mb_ucwords($tag->tag_name)); ?></option>
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

<?php
$addTicketPermission = user()->permission('add_tickets');
?>

<?php $__env->startSection('content'); ?>
    <!-- CONTENT WRAPPER START -->
    <div class="content-wrapper">
        <div class="row row-cols-lg-5 my-3">

            <div class="col mb-4">
                <a href="javascript:;" data-status="all" class="widget-filter-status">
                    <?php if (isset($component)) { $__componentOriginal3372d3ef031d7cb240e013bd2685bbb8031ec38a = $component; } ?>
<?php $component = App\View\Components\Cards\Widget::resolve(['title' => __('modules.tickets.totalTickets'),'value' => '0','icon' => 'ticket-alt','widgetId' => 'totalTickets'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                </a>
            </div>

            <div class="col mb-4">
                <a href="javascript:;" data-status="closed" class="widget-filter-status">
                    <?php if (isset($component)) { $__componentOriginal3372d3ef031d7cb240e013bd2685bbb8031ec38a = $component; } ?>
<?php $component = App\View\Components\Cards\Widget::resolve(['title' => __('modules.tickets.totalClosedTickets'),'value' => '0','icon' => 'ticket-alt','widgetId' => 'closedTickets'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                </a>
            </div>

            <div class="col mb-4">
                <a href="javascript:;" data-status="open" class="widget-filter-status">
                    <?php if (isset($component)) { $__componentOriginal3372d3ef031d7cb240e013bd2685bbb8031ec38a = $component; } ?>
<?php $component = App\View\Components\Cards\Widget::resolve(['title' => __('modules.tickets.totalOpenTickets'),'value' => '0','icon' => 'ticket-alt','widgetId' => 'openTickets'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                </a>
            </div>

            <div class="col mb-4">
                <a href="javascript:;" data-status="pending" class="widget-filter-status">
                    <?php if (isset($component)) { $__componentOriginal3372d3ef031d7cb240e013bd2685bbb8031ec38a = $component; } ?>
<?php $component = App\View\Components\Cards\Widget::resolve(['title' => __('modules.tickets.totalPendingTickets'),'value' => '0','icon' => 'ticket-alt','widgetId' => 'pendingTickets'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                </a>
            </div>

            <div class="col">
                <a href="javascript:;" data-status="resolved" class="widget-filter-status">
                    <?php if (isset($component)) { $__componentOriginal3372d3ef031d7cb240e013bd2685bbb8031ec38a = $component; } ?>
<?php $component = App\View\Components\Cards\Widget::resolve(['title' => __('modules.tickets.totalResolvedTickets'),'value' => '0','icon' => 'ticket-alt','widgetId' => 'resolvedTickets'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                </a>
            </div>

        </div>

        <!-- Add Task Export Buttons Start -->
        <div class="d-flex justify-content-between action-bar">
            <div id="table-actions" class="flex-grow-1 align-items-center mt-3">
                <?php if($addTicketPermission == 'all' || $addTicketPermission == 'added'): ?>
                    <?php if (isset($component)) { $__componentOriginal7f662ecf9f97aca611d2405e5e6903e6081fbd17 = $component; } ?>
<?php $component = App\View\Components\Forms\LinkPrimary::resolve(['link' => route('tickets.create'),'icon' => 'plus'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.link-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\LinkPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-3 openRightModal float-left']); ?>
                        <?php echo app('translator')->get('modules.tickets.addTicket'); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7f662ecf9f97aca611d2405e5e6903e6081fbd17)): ?>
<?php $component = $__componentOriginal7f662ecf9f97aca611d2405e5e6903e6081fbd17; ?>
<?php unset($__componentOriginal7f662ecf9f97aca611d2405e5e6903e6081fbd17); ?>
<?php endif; ?>
                <?php endif; ?>

                <?php if(in_array('admin', user_roles())): ?>
                    <?php if (isset($component)) { $__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26 = $component; } ?>
<?php $component = App\View\Components\Forms\ButtonSecondary::resolve(['icon' => 'pencil-alt'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonSecondary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-3 float-left','id' => 'add-ticket']); ?>
                        <?php echo app('translator')->get('modules.ticketForm'); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26)): ?>
<?php $component = $__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26; ?>
<?php unset($__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26); ?>
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
                            <option value="delete"><?php echo app('translator')->get('app.delete'); ?></option>
                        </select>
                    </div>
                    <div class="select-status mr-3 d-none quick-action-field" id="change-status-action">
                        <select name="status" class="form-control select-picker">
                            <option value="open"><?php echo app('translator')->get('app.open'); ?></option>
                            <option value="pending"><?php echo app('translator')->get('app.pending'); ?></option>
                            <option value="resolved"><?php echo app('translator')->get('app.resolved'); ?></option>
                            <option value="closed"><?php echo app('translator')->get('app.closed'); ?></option>
                        </select>
                    </div>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal95e73aded82dd7c8c0f260f95142b37107c1ffe8)): ?>
<?php $component = $__componentOriginal95e73aded82dd7c8c0f260f95142b37107c1ffe8; ?>
<?php unset($__componentOriginal95e73aded82dd7c8c0f260f95142b37107c1ffe8); ?>
<?php endif; ?>
            <?php endif; ?>

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

        var ticketFilterStatus = "<?php echo e(request('dashboard-ticket-status')); ?>";

        $('#ticket-table').on('preXhr.dt', function(e, settings, data) {

            var dateRangePicker = $('#datatableRange').data('daterangepicker');
            var startDate = $('#datatableRange').val();

            if (startDate == '') {
                startDate = null;
                endDate = null;
            } else {
                startDate = dateRangePicker.startDate.format('<?php echo e(company()->moment_date_format); ?>');
                endDate = dateRangePicker.endDate.format('<?php echo e(company()->moment_date_format); ?>');
            }

            <?php if(request('startDate') != '' && request('endDate') != ''): ?>
                startDate = '<?php echo e(request('startDate')); ?>';
                endDate = '<?php echo e(request('endDate')); ?>';
            <?php endif; ?>

            var agentId = $('#agent_id').val();
            if (agentId == "") {
                agentId = 0;
            }

            var status = $('#ticket-status').val();
            if (status == "") {
                status = 0;
            }

            var priority = $('#priority').val();
            if (priority == "") {
                priority = 0;
            }

            var channelId = $('#channel_id').val();
            if (channelId == "") {
                channelId = 0;
            }

            var typeId = $('#type_id').val();
            if (typeId == "") {
                typeId = 0;
            }

            var tagId = $('#tag_id').val();
            if (tagId == "") {
                tagId = 0;
            }
            var searchText = $('#search-text-field').val();

            data['startDate'] = startDate;
            data['endDate'] = endDate;
            data['agentId'] = agentId;
            data['priority'] = priority;
            data['channelId'] = channelId;
            data['typeId'] = typeId;
            data['tagId'] = tagId;
            data['ticketStatus'] = status;
            data['searchText'] = searchText;
            if (ticketFilterStatus != '') {
                data['ticketFilterStatus'] = ticketFilterStatus;
            }


        });
        const showTable = () => {
            window.LaravelDataTables["ticket-table"].draw(false);
            refreshCount();
        }

        $('#agent_id, #ticket-status, #priority, #channel_id, #type_id, #tag_id')
            .on('change keyup',
                function() {
                    if ($('#ticket-status').val() != "not finished") {
                        $('#reset-filters').removeClass('d-none');
                        showTable();
                    } else if ($('#agent_id').val() != "all") {
                        $('#reset-filters').removeClass('d-none');
                        showTable();
                    } else if ($('#priority').val() != "all") {
                        $('#reset-filters').removeClass('d-none');
                        showTable();
                    } else if ($('#channel_id').val() != "all") {
                        $('#reset-filters').removeClass('d-none');
                        showTable();
                    } else if ($('#type_id').val() != "all") {
                        $('#reset-filters').removeClass('d-none');
                        showTable();
                    } else if ($('#tag_id').val() != "all") {
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

        $('.widget-filter-status').click(function() {
            var status = $(this).data('status');
            $('#ticket-status').val(status);
            $('#ticket-status').selectpicker('refresh');
            ticketFilterStatus = '';
            showTable();
        });

        $('#reset-filters,#reset-filters-2').click(function() {
            $('#filter-form')[0].reset();
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
            var id = $(this).data('ticket-id');
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
                    var url = "<?php echo e(route('tickets.destroy', ':id')); ?>";
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

        $('#ticket-table').on('change', '.change-status', function() {
            var url = "<?php echo e(route('tickets.change-status')); ?>";
            var token = "<?php echo e(csrf_token()); ?>";
            var id = $(this).data('ticket-id');
            var status = $(this).val();

            if (id != "" && status != "") {
                $.easyAjax({
                    url: url,
                    type: "POST",
                    container: '.content-wrapper',
                    blockUI: true,
                    data: {
                        '_token': token,
                        ticketId: id,
                        status: status,
                    },
                    success: function(data) {
                        if(data.status == 'success') {
                            refreshCount();
                        }
                        window.LaravelDataTables["ticket-table"].draw(false);
                    }
                });

            }
        });

        const applyQuickAction = () => {
            var rowdIds = $("#ticket-table input:checkbox:checked").map(function() {
                return $(this).val();
            }).get();

            var url = "<?php echo e(route('tickets.apply_quick_action')); ?>?row_ids=" + rowdIds;

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

        function refreshCount() {
            var dateRangePicker = $('#datatableRange').data('daterangepicker');
            var startDate = $('#datatableRange').val();

            if (startDate == '') {
                startDate = null;
                endDate = null;
            } else {
                startDate = dateRangePicker.startDate.format('<?php echo e(company()->moment_date_format); ?>');
                endDate = dateRangePicker.endDate.format('<?php echo e(company()->moment_date_format); ?>');
            }

            // <?php if(!is_null(request('status')) && !is_null(request('startDate')) && !is_null(request('endDate'))): ?>
            //     startDate = '<?php echo e(request('startDate')); ?>';
            //     endDate = '<?php echo e(request('endDate')); ?>';
            // <?php endif; ?>

            if (endDate == '') {
                endDate = null;
            }
            var agentId = $('#agent_id').val();
            if (agentId == "") {
                agentId = 0;
            }

            var status = $('#ticket-status').val();
            if (status == "") {
                status = 0;
            }


            var priority = $('#priority').val();
            if (priority == "") {
                priority = 0;
            }

            var channelId = $('#channel_id').val();
            if (channelId == "") {
                channelId = 0;
            }

            var typeId = $('#type_id').val();
            if (typeId == "") {
                typeId = 0;
            }

            var url = "<?php echo e(route('tickets.refresh_count')); ?>";
            $.easyAjax({
                type: 'POST',
                url: url,
                data: {
                    'startDate': startDate,
                    'endDate': endDate,
                    'agentId': agentId,
                    'ticketStatus': status,
                    'priority': priority,
                    'channelId': channelId,
                    'typeId': typeId,
                    '_token': '<?php echo e(csrf_token()); ?>'
                },
                success: function(response) {
                    $('#totalTickets').html(response.totalTickets);
                    $('#closedTickets').html(response.closedTickets);
                    $('#openTickets').html(response.openTickets);
                    $('#pendingTickets').html(response.pendingTickets);
                    $('#resolvedTickets').html(response.resolvedTickets);
                }
            });
        }

        $('body').on('click', '#add-ticket', function() {
            window.location.href = "<?php echo e(route('ticket-form.index')); ?>";
        });

        $( document ).ready(function() {
            <?php if(!is_null(request('startDate')) && !is_null(request('endDate'))): ?>
            $('#datatableRange').val('<?php echo e(request('startDate')); ?>' +
            ' <?php echo app('translator')->get("app.to"); ?> ' + '<?php echo e(request('endDate')); ?>');
            $('#datatableRange').data('daterangepicker').setStartDate("<?php echo e(request('startDate')); ?>");
            $('#datatableRange').data('daterangepicker').setEndDate("<?php echo e(request('endDate')); ?>");
                refreshCount();
            <?php else: ?>
            refreshCount();
            <?php endif; ?>
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/tickets/index.blade.php ENDPATH**/ ?>