<?php $__env->startSection('content'); ?>

    <!-- SETTINGS START -->
    <div class="w-100 d-flex ">

        <?php if (isset($component)) { $__componentOriginalf9dcf9e0132687b6b5d826e52f2f3d6c594b585b = $component; } ?>
<?php $component = App\View\Components\SettingSidebar::resolve(['activeMenu' => $activeSettingMenu] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('setting-sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SettingSidebar::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf9dcf9e0132687b6b5d826e52f2f3d6c594b585b)): ?>
<?php $component = $__componentOriginalf9dcf9e0132687b6b5d826e52f2f3d6c594b585b; ?>
<?php unset($__componentOriginalf9dcf9e0132687b6b5d826e52f2f3d6c594b585b); ?>
<?php endif; ?>

        <?php if (isset($component)) { $__componentOriginalb44089abe45f2c89173e85ef93b9bf2aa54af94e = $component; } ?>
<?php $component = App\View\Components\SettingCard::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('setting-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SettingCard::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

             <?php $__env->slot('header', null, []); ?> 
                <div class="s-b-n-header" id="tabs">
                    <h2 class="mb-0 p-20 f-21 font-weight-normal text-capitalize border-bottom-grey">
                        <?php echo app('translator')->get($pageTitle); ?></h2>
                </div>
             <?php $__env->endSlot(); ?>

            <div class="col-lg-12 col-md-12 ntfcn-tab-content-left w-100 p-4 ">

                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.alert','data' => ['type' => 'secondary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'secondary']); ?>
                    <ul>
                        <li class="py-2"> &bull; <b><?php echo app('translator')->get('app.storageSetting.local'); ?></b> <?php echo app('translator')->get('app.storageSetting.localStorageNote'); ?></li>
                        <li> &bull; <?php echo app('translator')->get('app.storageSetting.storageSuggestion'); ?></li>
                    </ul>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>


                <div class="row">

                        <div class="col-lg-12">
                            <?php if (isset($component)) { $__componentOriginalaa9e2e00dcec6b58db49b9128f7191370bc93381 = $component; } ?>
<?php $component = App\View\Components\Forms\Select::resolve(['fieldId' => 'storage','fieldLabel' => __('app.storageSetting.selectStorage'),'fieldName' => 'storage'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                <option value="local"
                                        <?php if(isset($localCredentials) && $localCredentials->status == 'enabled'): ?> selected <?php endif; ?>><?php echo app('translator')->get('app.storageSetting.local'); ?></option>
                                <option value="aws_s3"
                                        <?php if(isset($awsCredentials) && $awsCredentials->status == 'enabled'): ?> selected <?php endif; ?>><?php echo app('translator')->get('app.storageSetting.aws'); ?></option>
                                <option value="digitalocean"
                                        <?php if(isset($digitalOceanCredentials) && $digitalOceanCredentials->status == 'enabled'): ?> selected <?php endif; ?>>
                                    DigitalOcean Spaces
                                </option>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalaa9e2e00dcec6b58db49b9128f7191370bc93381)): ?>
<?php $component = $__componentOriginalaa9e2e00dcec6b58db49b9128f7191370bc93381; ?>
<?php unset($__componentOriginalaa9e2e00dcec6b58db49b9128f7191370bc93381); ?>
<?php endif; ?>

                        </div>

                        <?php echo $__env->make('storage-settings.aws_s3', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('storage-settings.digitalocean', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    </div>
            </div>

             <?php $__env->slot('action', null, []); ?> 
                <!-- Buttons Start -->
                <div class="w-100 border-top-grey">

                    <?php if (isset($component)) { $__componentOriginal698fd7a4bca51a1feab5ec62ef3754628de98690 = $component; } ?>
<?php $component = App\View\Components\SettingFormActions::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('setting-form-actions'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SettingFormActions::class))->getConstructor()): ?>
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
<?php $component->withAttributes(['id' => 'save-form','class' => 'mr-3']); ?><?php echo app('translator')->get('app.save'); ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480)): ?>
<?php $component = $__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480; ?>
<?php unset($__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480); ?>
<?php endif; ?>

                        <?php if (isset($component)) { $__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26 = $component; } ?>
<?php $component = App\View\Components\Forms\ButtonSecondary::resolve(['icon' => 'location-arrow'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonSecondary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'test-aws','class' => 'aws-form mr-3']); ?>
                            <?php echo app('translator')->get('app.storageSetting.testAws'); ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26)): ?>
<?php $component = $__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26; ?>
<?php unset($__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26); ?>
<?php endif; ?>

                        <?php if (isset($component)) { $__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26 = $component; } ?>
<?php $component = App\View\Components\Forms\ButtonSecondary::resolve(['icon' => 'location-arrow'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonSecondary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'test-aws','class' => 'digitalocean-form mr-3']); ?>
                            <?php echo app('translator')->get('app.storageSetting.testDigitalocean'); ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26)): ?>
<?php $component = $__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26; ?>
<?php unset($__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26); ?>
<?php endif; ?>

                        <?php if($localFilesCount>0): ?>
                            <?php if (isset($component)) { $__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26 = $component; } ?>
<?php $component = App\View\Components\Forms\ButtonSecondary::resolve(['icon' => 'location-arrow'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonSecondary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'local-to-aws','class' => 'aws-form']); ?>
                                <?php echo app('translator')->get('app.moveAws'); ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26)): ?>
<?php $component = $__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26; ?>
<?php unset($__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26); ?>
<?php endif; ?>
                        <?php endif; ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal698fd7a4bca51a1feab5ec62ef3754628de98690)): ?>
<?php $component = $__componentOriginal698fd7a4bca51a1feab5ec62ef3754628de98690; ?>
<?php unset($__componentOriginal698fd7a4bca51a1feab5ec62ef3754628de98690); ?>
<?php endif; ?>

                </div>
                <!-- Buttons End -->
             <?php $__env->endSlot(); ?>

         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb44089abe45f2c89173e85ef93b9bf2aa54af94e)): ?>
<?php $component = $__componentOriginalb44089abe45f2c89173e85ef93b9bf2aa54af94e; ?>
<?php unset($__componentOriginalb44089abe45f2c89173e85ef93b9bf2aa54af94e); ?>
<?php endif; ?>

    </div>
    <!-- SETTINGS END -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>

        let CHANGE_DETECTED = false;
        $('.field').each(function () {
            let elem = $(this);
            CHANGE_DETECTED = false

            // Look for changes in the value
            elem.bind("change keyup paste", function (event) {
                CHANGE_DETECTED = true;
            });
        });
        $(function () {
            const type = $('#storage').val();
            toggleAwsLocal(type);
        });

        function toggleAwsLocal(type) {
            if (type === 'aws_s3') {
                $('.aws-form').css('display', 'block');
                $('.digitalocean-form').css('display', 'none');
            } else if (type === 'digitalocean') {
                $('.digitalocean-form').css('display', 'block');
                $('.aws-form').css('display', 'none');
            } else if (type === 'local') {
                $('.aws-form,.digitalocean-form').css('display', 'none');
            }
        }

        $('#storage').on('change', function (event) {
            event.preventDefault();
            const type = $(this).val();
            if (type === 'aws_s3') {
                CHANGE_DETECTED = true;
            }
            toggleAwsLocal(type);
        });

        $('body').on('click', '#test-aws', function () {
            // Save the AWS credentials when changed detected for test button click
            if (CHANGE_DETECTED) {
                submitForm();
            }
            let url = "<?php echo e(route('storage-settings.aws_test_modal',':type')); ?>";
            url = url.replace(':type', $('#storage').val());
            $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_LG, url);
        });


        $('#save-form').click(function () {
            submitForm();
        });

        function submitForm() {
            CHANGE_DETECTED = false;
            const data = ($('#editSettings').serialize()).replace("_method=PUT", "_method=POST");
            $.easyAjax({
                url: "<?php echo e(route('storage-settings.store')); ?>",
                container: '#editSettings',
                type: "POST",
                disableButton: true,
                blockUI: true,
                buttonSelector: "#save-form",
                data: data,
            })
        }

        $('body').on('click', '#local-to-aws', function () {
            if (CHANGE_DETECTED) {
                submitForm();
            }
            const url = "<?php echo e(route('storage-settings.aws_local_to_aws_modal')); ?>";

            $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_LG, url);
        });

        init()
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/storage-settings/index.blade.php ENDPATH**/ ?>