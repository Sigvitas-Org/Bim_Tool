<?php $__env->startPush('datatable-styles'); ?>
    <?php echo $__env->make('sections.datatable_css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopPush(); ?>

<?php
$viewEmployeeTasks = user()->permission('view_employee_tasks');
$viewTickets = user()->permission('view_tickets');
$viewEmployeeProjects = user()->permission('view_employee_projects');
$viewEmployeeTimelogs = user()->permission('view_employee_timelogs');
$manageEmergencyContact = user()->permission('manage_emergency_contact');
$manageRolePermissionSetting = user()->permission('manage_role_permission_setting');
$manageShiftPermission = user()->permission('view_shift_roster');
$viewLeavePermission = user()->permission('view_leave');
$viewDocumentPermission = user()->permission('view_documents');
$viewAppreciationPermission = user()->permission('view_appreciation');
?>

<?php

$showFullProfile = false;

if ($viewPermission == 'all'
    || ($viewPermission == 'added' && $employee->employeeDetail->added_by == user()->id)
    || ($viewPermission == 'owned' && $employee->employeeDetail->user_id == user()->id)
    || ($viewPermission == 'both' && ($employee->employeeDetail->user_id == user()->id || $employee->employeeDetail->added_by == user()->id))
) {
    $showFullProfile = true;
}

?>

<?php $__env->startSection('filter-section'); ?>
    <!-- FILTER START -->
    <!-- PROJECT HEADER START -->

    <div class="d-flex d-lg-block filter-box project-header bg-white">
        <div class="mobile-close-overlay w-100 h-100" id="close-client-overlay"></div>

        <div class="project-menu" id="mob-client-detail">
            <a class="d-none close-it" href="javascript:;" id="close-client-detail">
                <i class="fa fa-times"></i>
            </a>

            <nav class="tabs">
                <ul class="-primary">
                    <li>
                        <?php if (isset($component)) { $__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c = $component; } ?>
<?php $component = App\View\Components\Tab::resolve(['href' => route('employees.show', $employee->id),'text' => __('modules.employees.profile')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tab'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Tab::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'profile']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c)): ?>
<?php $component = $__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c; ?>
<?php unset($__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c); ?>
<?php endif; ?>
                    </li>

                    <?php if($viewEmployeeProjects == 'all' && in_array('projects', user_modules())): ?>
                        <li>
                            <?php if (isset($component)) { $__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c = $component; } ?>
<?php $component = App\View\Components\Tab::resolve(['href' => route('employees.show', $employee->id) . '?tab=projects','text' => __('app.menu.projects'),'ajax' => 'false'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tab'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Tab::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'projects']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c)): ?>
<?php $component = $__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c; ?>
<?php unset($__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c); ?>
<?php endif; ?>
                        </li>
                    <?php endif; ?>

                    <?php if($viewEmployeeTasks == 'all' && in_array('tasks', user_modules())): ?>
                        <li>
                            <?php if (isset($component)) { $__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c = $component; } ?>
<?php $component = App\View\Components\Tab::resolve(['href' => route('employees.show', $employee->id) . '?tab=tasks','text' => __('app.menu.tasks'),'ajax' => 'false'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tab'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Tab::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'tasks']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c)): ?>
<?php $component = $__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c; ?>
<?php unset($__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c); ?>
<?php endif; ?>
                        </li>
                    <?php endif; ?>

                    <?php if(in_array('leaves', user_modules()) && ($viewLeavePermission == 'all' || ($viewLeavePermission == 'owned' || $viewLeavePermission == 'both') && $employee->id == user()->id )): ?>
                        <li>
                            <?php if (isset($component)) { $__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c = $component; } ?>
<?php $component = App\View\Components\Tab::resolve(['href' => route('employees.show', $employee->id) . '?tab=leaves','text' => __('app.menu.leaves'),'ajax' => 'false'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tab'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Tab::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'leaves']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c)): ?>
<?php $component = $__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c; ?>
<?php unset($__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c); ?>
<?php endif; ?>
                        </li>

                    <li>
                        <?php if (isset($component)) { $__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c = $component; } ?>
<?php $component = App\View\Components\Tab::resolve(['href' => route('employees.show', $employee->id) . '?tab=leaves-quota','text' => __('app.menu.leavesQuota')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tab'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Tab::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'leaves-quota']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c)): ?>
<?php $component = $__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c; ?>
<?php unset($__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c); ?>
<?php endif; ?>
                    </li>
                    <?php endif; ?>

                    <?php if($viewEmployeeTimelogs == 'all'): ?>
                        <li>
                            <?php if (isset($component)) { $__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c = $component; } ?>
<?php $component = App\View\Components\Tab::resolve(['href' => route('employees.show', $employee->id) . '?tab=timelogs','text' => __('app.menu.timeLogs'),'ajax' => 'false'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tab'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Tab::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'timelogs']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c)): ?>
<?php $component = $__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c; ?>
<?php unset($__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c); ?>
<?php endif; ?>
                        </li>
                    <?php endif; ?>

                    <?php if($viewDocumentPermission != 'none'): ?>
                        <li>
                            <?php if (isset($component)) { $__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c = $component; } ?>
<?php $component = App\View\Components\Tab::resolve(['href' => route('employees.show', $employee->id) . '?tab=documents','text' => __('app.menu.documents')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tab'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Tab::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'documents']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c)): ?>
<?php $component = $__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c; ?>
<?php unset($__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c); ?>
<?php endif; ?>
                        </li>
                    <?php endif; ?>

                    <?php if($showFullProfile && ($manageEmergencyContact == 'all' || $employee->id == user()->id)): ?>
                        <li>
                            <?php if (isset($component)) { $__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c = $component; } ?>
<?php $component = App\View\Components\Tab::resolve(['href' => route('employees.show', $employee->id) . '?tab=emergency-contacts','text' => __('modules.emergencyContact.emergencyContact')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tab'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Tab::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'emergency-contacts']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c)): ?>
<?php $component = $__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c; ?>
<?php unset($__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c); ?>
<?php endif; ?>
                        </li>
                    <?php endif; ?>

                    <?php if($viewTickets == 'all'): ?>
                        <li>
                            <?php if (isset($component)) { $__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c = $component; } ?>
<?php $component = App\View\Components\Tab::resolve(['href' => route('employees.show', $employee->id) . '?tab=tickets','text' => __('modules.tickets.ticket'),'ajax' => 'false'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tab'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Tab::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'tickets']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c)): ?>
<?php $component = $__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c; ?>
<?php unset($__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c); ?>
<?php endif; ?>
                        </li>
                    <?php endif; ?>

                    <?php if(!in_array('client', user_roles())): ?>
                        <li>
                            <?php if (isset($component)) { $__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c = $component; } ?>
<?php $component = App\View\Components\Tab::resolve(['href' => route('employees.show', $employee->id) . '?tab=appreciation','text' => __('app.menu.appreciation')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tab'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Tab::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'appreciation']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c)): ?>
<?php $component = $__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c; ?>
<?php unset($__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c); ?>
<?php endif; ?>
                        </li>
                    <?php endif; ?>

                    <?php if($manageShiftPermission == 'all'): ?>
                        <li>
                            <?php if (isset($component)) { $__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c = $component; } ?>
<?php $component = App\View\Components\Tab::resolve(['href' => route('employees.show', $employee->id) . '?tab=shifts','text' => __('app.menu.shiftRoster')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tab'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Tab::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'shifts']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c)): ?>
<?php $component = $__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c; ?>
<?php unset($__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c); ?>
<?php endif; ?>
                        </li>
                    <?php endif; ?>

                    <?php if($manageRolePermissionSetting == 'all'): ?>
                        <li>
                            <?php if (isset($component)) { $__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c = $component; } ?>
<?php $component = App\View\Components\Tab::resolve(['href' => route('employees.show', $employee->id) . '?tab=permissions','text' => __('modules.permission.permissions')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tab'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Tab::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'permissions']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c)): ?>
<?php $component = $__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c; ?>
<?php unset($__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c); ?>
<?php endif; ?>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>

        <a class="mb-0 d-block d-lg-none text-dark-grey ml-auto mr-2 border-left-grey" onclick="openClientDetailSidebar()"><i class="fa fa-ellipsis-v "></i></a>
    </div>

    <!-- PROJECT HEADER END -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper pt-0 border-top-0 client-detail-wrapper">
        <?php echo $__env->make($view, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $("body").on("click", ".project-menu .ajax-tab", function(event) {
            event.preventDefault();

            $('.project-menu .p-sub-menu').removeClass('active');
            $(this).addClass('active');

            const requestUrl = this.href;

            $.easyAjax({
                url: requestUrl,
                blockUI: true,
                container: ".content-wrapper",
                historyPush: true,
                success: function(response) {
                    if (response.status == "success") {
                        $('.content-wrapper').html(response.html);
                        init('.content-wrapper');
                    }
                }
            });
        });

    </script>
    <script>
        const activeTab = "<?php echo e($activeTab); ?>";
        $('.project-menu .' + activeTab).addClass('active');

    </script>
    <script>
        /*******************************************************
                 More btn in projects menu Start
        *******************************************************/

        const container = document.querySelector('.tabs');
        const primary = container.querySelector('.-primary');
        const primaryItems = container.querySelectorAll('.-primary > li:not(.-more)');
        container.classList.add('--jsfied'); // insert "more" button and duplicate the list

        primary.insertAdjacentHTML('beforeend', `
        <li class="-more">
            <button type="button" class="px-4 h-100 bg-grey d-none d-lg-flex align-items-center" aria-haspopup="true" aria-expanded="false">
            <?php echo e(__('app.more')); ?> <span>&darr;</span>
            </button>
            <ul class="-secondary" id="hide-project-menues">
            ${primary.innerHTML}
            </ul>
        </li>
        `);
        const secondary = container.querySelector('.-secondary');
        const secondaryItems = secondary.querySelectorAll('li');
        const allItems = container.querySelectorAll('li');
        const moreLi = primary.querySelector('.-more');
        const moreBtn = moreLi.querySelector('button');
        moreBtn.addEventListener('click', e => {
            e.preventDefault();
            container.classList.toggle('--show-secondary');
            moreBtn.setAttribute('aria-expanded', container.classList.contains('--show-secondary'));
        }); // adapt tabs

        const doAdapt = () => {
            // reveal all items for the calculation
            allItems.forEach(item => {
                item.classList.remove('--hidden');
            }); // hide items that won't fit in the Primary

            let stopWidth = moreBtn.offsetWidth;
            let hiddenItems = [];
            const primaryWidth = primary.offsetWidth;
            primaryItems.forEach((item, i) => {
                if (primaryWidth >= stopWidth + item.offsetWidth) {
                    stopWidth += item.offsetWidth;
                } else {
                    item.classList.add('--hidden');
                    hiddenItems.push(i);
                }
            }); // toggle the visibility of More button and items in Secondary

            if (!hiddenItems.length) {
                moreLi.classList.add('--hidden');
                container.classList.remove('--show-secondary');
                moreBtn.setAttribute('aria-expanded', false);
            } else {
                secondaryItems.forEach((item, i) => {
                    if (!hiddenItems.includes(i)) {
                        item.classList.add('--hidden');
                    }
                });
            }
        };

        doAdapt(); // adapt immediately on load

        window.addEventListener('resize', doAdapt); // adapt on window resize
        // hide Secondary on the outside click

        document.addEventListener('click', e => {
            let el = e.target;

            while (el) {
                if (el === secondary || el === moreBtn) {
                    return;
                }

                el = el.parentNode;
            }

            container.classList.remove('--show-secondary');
            moreBtn.setAttribute('aria-expanded', false);
        });
        /*******************************************************
                 More btn in projects menu End
        *******************************************************/
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/employees/show.blade.php ENDPATH**/ ?>