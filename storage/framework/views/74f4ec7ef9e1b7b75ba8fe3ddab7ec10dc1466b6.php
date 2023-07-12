<?php if(!$modal): ?>
    
    <?php if($globalSetting->hide_cron_message == 0 || now()->diffInHours($globalSetting->last_cron_run) > 48): ?>
        <?php echo $__env->make('app-settings.cron-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php else: ?>
    

    <?php if(now()->diffInHours($globalSetting->last_cron_run) > 48): ?>
        <?php if(in_array('admin', user_roles()) || in_array('superadmin', user_roles())): ?>
            <div class="col-md-12 cursor-pointer">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.alert','data' => ['type' => 'danger','icon' => 'exclamation-circle','dataToggle' => 'modal','dataTarget' => '#cronJobModal']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'danger','icon' => 'exclamation-circle','data-toggle' => 'modal','data-target' => '#cronJobModal']); ?>
                    <?php echo app('translator')->get('messages.cronIsNotRunning'); ?>.
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            </div>
            <div id="cronJobModal" class="modal fade overflow-auto" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog d-flex justify-content-center align-items-center modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modelHeading">CRON JOB SETTING</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">×</span></button>
                        </div>
                        <div class="modal-body">
                            <?php echo $__env->make('app-settings.cron-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
<?php $component->withAttributes(['data-dismiss' => 'modal','class' => 'border-0 mr-3']); ?><?php echo app('translator')->get('app.cancel'); ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldffecccc219bb81c1548bfa6ec1531014cb3bec8)): ?>
<?php $component = $__componentOriginaldffecccc219bb81c1548bfa6ec1531014cb3bec8; ?>
<?php unset($__componentOriginaldffecccc219bb81c1548bfa6ec1531014cb3bec8); ?>
<?php endif; ?>
                        </div>

                    </div>
                </div>
            </div>
        <?php endif; ?>

    <?php endif; ?>
<?php endif; ?>



<?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/components/cron-message.blade.php ENDPATH**/ ?>