<?php $__env->startSection('content'); ?>

    <!-- CONTENT WRAPPER START -->
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 text-center mt-4">
                <h2 class="heading-h2"><?php echo app('translator')->get('app.welcome'); ?> <?php echo e(user()->name); ?></h2>
                <p><?php echo app('translator')->get('modules.checklist.checklistInfo'); ?></p>
            </div>

            <div class="col-md-12 mt-4">

                <?php if (isset($component)) { $__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e = $component; } ?>
<?php $component = App\View\Components\Cards\Data::resolve(['title' => 'To Do List'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Data::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

                    <?php if (isset($component)) { $__componentOriginalae1e6122d161f5eef5b964e185739f73aa54251c = $component; } ?>
<?php $component = App\View\Components\Cards\OnboardingItem::resolve(['title' => __('modules.checklist.installation'),'summary' => __('modules.checklist.installationInfo'),'completed' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.onboarding-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\OnboardingItem::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalae1e6122d161f5eef5b964e185739f73aa54251c)): ?>
<?php $component = $__componentOriginalae1e6122d161f5eef5b964e185739f73aa54251c; ?>
<?php unset($__componentOriginalae1e6122d161f5eef5b964e185739f73aa54251c); ?>
<?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginalae1e6122d161f5eef5b964e185739f73aa54251c = $component; } ?>
<?php $component = App\View\Components\Cards\OnboardingItem::resolve(['title' => __('modules.checklist.accountSetup'),'summary' => __('modules.checklist.accountSetupInfo'),'completed' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.onboarding-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\OnboardingItem::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalae1e6122d161f5eef5b964e185739f73aa54251c)): ?>
<?php $component = $__componentOriginalae1e6122d161f5eef5b964e185739f73aa54251c; ?>
<?php unset($__componentOriginalae1e6122d161f5eef5b964e185739f73aa54251c); ?>
<?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginalae1e6122d161f5eef5b964e185739f73aa54251c = $component; } ?>
<?php $component = App\View\Components\Cards\OnboardingItem::resolve(['title' => __('modules.checklist.companyLogo'),'summary' => __('modules.checklist.companyLogoInfo'),'completed' => company()->logo,'link' => route('theme-settings.index')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.onboarding-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\OnboardingItem::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalae1e6122d161f5eef5b964e185739f73aa54251c)): ?>
<?php $component = $__componentOriginalae1e6122d161f5eef5b964e185739f73aa54251c; ?>
<?php unset($__componentOriginalae1e6122d161f5eef5b964e185739f73aa54251c); ?>
<?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginalae1e6122d161f5eef5b964e185739f73aa54251c = $component; } ?>
<?php $component = App\View\Components\Cards\OnboardingItem::resolve(['title' => __('modules.checklist.emailSetup'),'summary' => __('modules.checklist.configureEmailSetting'),'completed' => smtp_setting()->mail_from_email != 'from@email.com','link' => route('notifications.index')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.onboarding-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\OnboardingItem::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalae1e6122d161f5eef5b964e185739f73aa54251c)): ?>
<?php $component = $__componentOriginalae1e6122d161f5eef5b964e185739f73aa54251c; ?>
<?php unset($__componentOriginalae1e6122d161f5eef5b964e185739f73aa54251c); ?>
<?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginalae1e6122d161f5eef5b964e185739f73aa54251c = $component; } ?>
<?php $component = App\View\Components\Cards\OnboardingItem::resolve(['title' => __('modules.checklist.crontSetup'),'summary' => __('modules.checklist.cronSetupInfo'),'completed' => global_setting()->last_cron_run,'link' => route('app-settings.index')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.onboarding-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\OnboardingItem::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalae1e6122d161f5eef5b964e185739f73aa54251c)): ?>
<?php $component = $__componentOriginalae1e6122d161f5eef5b964e185739f73aa54251c; ?>
<?php unset($__componentOriginalae1e6122d161f5eef5b964e185739f73aa54251c); ?>
<?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginalae1e6122d161f5eef5b964e185739f73aa54251c = $component; } ?>
<?php $component = App\View\Components\Cards\OnboardingItem::resolve(['title' => __('modules.checklist.favicon'),'summary' => __('modules.checklist.faviconInfo'),'completed' => global_setting()->favicon,'link' => route('theme-settings.index')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.onboarding-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\OnboardingItem::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalae1e6122d161f5eef5b964e185739f73aa54251c)): ?>
<?php $component = $__componentOriginalae1e6122d161f5eef5b964e185739f73aa54251c; ?>
<?php unset($__componentOriginalae1e6122d161f5eef5b964e185739f73aa54251c); ?>
<?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginalae1e6122d161f5eef5b964e185739f73aa54251c = $component; } ?>
<?php $component = App\View\Components\Cards\OnboardingItem::resolve(['title' => __('modules.checklist.profileImage'),'summary' => __('modules.checklist.profileImageInfo'),'completed' => user()->image,'link' => route('profile-settings.index')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.onboarding-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\OnboardingItem::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalae1e6122d161f5eef5b964e185739f73aa54251c)): ?>
<?php $component = $__componentOriginalae1e6122d161f5eef5b964e185739f73aa54251c; ?>
<?php unset($__componentOriginalae1e6122d161f5eef5b964e185739f73aa54251c); ?>
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
    <!-- CONTENT WRAPPER END -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/dashboard/checklist.blade.php ENDPATH**/ ?>