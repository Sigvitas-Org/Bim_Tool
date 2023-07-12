<?php
$active = false;

if ($user->session) {
    $lastSeen = \Carbon\Carbon::createFromTimestamp($user->session->last_activity)->timezone(company()?company()->timezone:$user->company->timezone);

    $lastSeenDifference = now()->diffInSeconds($lastSeen);
    if ($lastSeenDifference > 0 && $lastSeenDifference <= 90) {
        $active = true;
    }
}
?>

<div class="media align-items-center mw-250">
    <?php if(!is_null($user)): ?>
        <a href="<?php echo e(route('clients.show', [$user->id])); ?>" class="position-relative">
            <?php if($active): ?>
                <span class="text-light-green position-absolute f-8 user-online"
                    title="<?php echo app('translator')->get('modules.client.online'); ?>"><i class="fa fa-circle"></i></span>
            <?php endif; ?>
            <img src="<?php echo e($user->image_url); ?>" class="mr-2 taskEmployeeImg rounded-circle"
                alt="<?php echo e(ucfirst($user->name)); ?>" title="<?php echo e(ucfirst($user->name)); ?>">
        </a>
        <div class="media-body">
            <h5 class="mb-0 f-12"><a href="<?php echo e(route('clients.show', [$user->id])); ?>"
                    class="text-darkest-grey"><?php echo e(mb_ucfirst($user->name)); ?></a>
                <?php if(isset($user->admin_approval) && $user->admin_approval == 0): ?>
                    <i class="bi bi-person-x text-red" data-toggle="tooltip"
                        data-original-title="<?php echo app('translator')->get('modules.dashboard.verificationPending'); ?>"></i>
                <?php elseif(user() && user()->id == $user->id): ?>
                    <span class="badge badge-secondary"><?php echo app('translator')->get('app.itsYou'); ?></span>
                <?php endif; ?>
            </h5>
            <p class="mb-0 f-12 text-dark-grey">
                <?php echo e(!is_null($user->clientDetails) && !is_null($user->clientDetails->company_name) ? mb_ucwords($user->clientDetails->company_name) : ' '); ?>

            </p>
        </div>
    <?php else: ?>
        --
    <?php endif; ?>
</div>
<?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/components/client.blade.php ENDPATH**/ ?>