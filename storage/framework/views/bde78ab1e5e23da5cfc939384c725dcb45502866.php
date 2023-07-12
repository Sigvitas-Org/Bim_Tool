<?php $__env->startPush('datatable-styles'); ?>
    <?php echo $__env->make('sections.datatable_css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopPush(); ?>

<?php
$viewClientDoc = user()->permission('view_client_document');
$viewTicket = user()->permission('view_tickets');
$viewClientNote = user()->permission('view_client_note');
$viewClientContact = user()->permission('view_client_contacts');
?>

<?php $__env->startSection('filter-section'); ?>
    <!-- FILTER START -->
    <!-- PROJECT HEADER STARTmplete -->
    <div class="d-flex filter-box project-header bg-white">

        <div class="mobile-close-overlay w-100 h-100" id="close-client-overlay"></div>
        <div class="project-menu d-lg-flex" id="mob-client-detail">

            <a class="d-none close-it" href="javascript:;" id="close-client-detail">
                <i class="fa fa-times"></i>
            </a>

            <?php if (isset($component)) { $__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c = $component; } ?>
<?php $component = App\View\Components\Tab::resolve(['href' => route('clients.show', $client->id),'text' => __('modules.employees.profile')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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

            <?php if(in_array('projects', user_modules())): ?>
                <?php if (isset($component)) { $__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c = $component; } ?>
<?php $component = App\View\Components\Tab::resolve(['href' => route('clients.show', $client->id).'?tab=projects','ajax' => 'false','text' => __('app.menu.projects')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
            <?php endif; ?>

            <?php if(in_array('invoices', user_modules())): ?>
                <?php if (isset($component)) { $__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c = $component; } ?>
<?php $component = App\View\Components\Tab::resolve(['href' => route('clients.show', $client->id).'?tab=invoices','ajax' => 'false','text' => __('app.menu.invoices')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tab'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Tab::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'invoices']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c)): ?>
<?php $component = $__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c; ?>
<?php unset($__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c); ?>
<?php endif; ?>
            <?php endif; ?>

            <?php if(in_array('estimates', user_modules())): ?>
                <?php if (isset($component)) { $__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c = $component; } ?>
<?php $component = App\View\Components\Tab::resolve(['href' => route('clients.show', $client->id).'?tab=estimates','ajax' => 'false','text' => __('app.menu.estimates')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tab'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Tab::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'estimates']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c)): ?>
<?php $component = $__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c; ?>
<?php unset($__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c); ?>
<?php endif; ?>
            <?php endif; ?>

            <?php if (isset($component)) { $__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c = $component; } ?>
<?php $component = App\View\Components\Tab::resolve(['href' => route('clients.show', $client->id).'?tab=creditnotes','ajax' => 'false','text' => __('app.menu.credit-note')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tab'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Tab::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'creditnotes']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c)): ?>
<?php $component = $__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c; ?>
<?php unset($__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c); ?>
<?php endif; ?>

            <?php if(in_array('payments', user_modules())): ?>
                <?php if (isset($component)) { $__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c = $component; } ?>
<?php $component = App\View\Components\Tab::resolve(['href' => route('clients.show', $client->id).'?tab=payments','ajax' => 'false','text' => __('app.menu.payments')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tab'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Tab::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'payments']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c)): ?>
<?php $component = $__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c; ?>
<?php unset($__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c); ?>
<?php endif; ?>
            <?php endif; ?>

            <?php if($viewClientContact == 'all' || $viewClientContact == 'added'): ?>
                <?php if (isset($component)) { $__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c = $component; } ?>
<?php $component = App\View\Components\Tab::resolve(['href' => route('clients.show', $client->id).'?tab=contacts','ajax' => 'false','text' => __('app.menu.contacts')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tab'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Tab::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'contacts']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c)): ?>
<?php $component = $__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c; ?>
<?php unset($__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c); ?>
<?php endif; ?>
            <?php endif; ?>
            <?php if($viewClientDoc == 'all' || ($viewClientDoc == 'added' && $client->clientDetails->added_by == user()->id) || ($viewClientDoc == 'owned' && $client->clientDetails->user_id == user()->id) || ($viewClientDoc == 'both' && ($client->clientDetails->added_by == user()->id || $client->clientDetails->user_id == user()->id))): ?>
                <?php if (isset($component)) { $__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c = $component; } ?>
<?php $component = App\View\Components\Tab::resolve(['href' => route('clients.show', $client->id).'?tab=documents','ajax' => 'false','text' => __('app.menu.documents')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
            <?php endif; ?>

            <?php if($viewClientNote != 'none'): ?>
                <?php if (isset($component)) { $__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c = $component; } ?>
<?php $component = App\View\Components\Tab::resolve(['href' => route('clients.show', $client->id).'?tab=notes','ajax' => 'false','text' => 'Notes'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tab'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Tab::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'notes']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c)): ?>
<?php $component = $__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c; ?>
<?php unset($__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c); ?>
<?php endif; ?>
            <?php endif; ?>

            <?php if($viewTicket == 'all' || $viewTicket == 'added'): ?>
                <?php if (isset($component)) { $__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c = $component; } ?>
<?php $component = App\View\Components\Tab::resolve(['href' => route('clients.show', $client->id).'?tab=tickets','ajax' => 'false','text' => __('app.menu.tickets')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
            <?php endif; ?>

            <?php if($gdpr->enable_gdpr): ?>
                <?php if (isset($component)) { $__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c = $component; } ?>
<?php $component = App\View\Components\Tab::resolve(['href' => route('clients.show', $client->id).'?tab=gdpr','ajax' => 'false','text' => __('app.menu.gdpr')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tab'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Tab::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'gdpr']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c)): ?>
<?php $component = $__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c; ?>
<?php unset($__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c); ?>
<?php endif; ?>
            <?php endif; ?>

        </div>

        <a class="mb-0 d-block d-lg-none text-dark-grey ml-auto mr-2 border-left-grey"
            onclick="openClientDetailSidebar()"><i class="fa fa-ellipsis-v "></i></a>

    </div>
    <!-- FILTER END -->
    <!-- PROJECT HEADER END -->

<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<script src="<?php echo e(asset('vendor/jquery/Chart.min.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <div class="content-wrapper border-top-0 client-detail-wrapper">
        <?php echo $__env->make($view, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $("body").on("click", ".ajax-tab", function(event) {
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/clients/show.blade.php ENDPATH**/ ?>