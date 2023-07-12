<div class='media align-items-center mw-250'>
    <div class='position-relative'><img src='<?php echo e($user->image_url); ?>' class='mr-2 taskEmployeeImg rounded-circle'>
    </div>
    <div class='media-body'>
        <h5 class='mb-0 f-13'><?php echo e(ucfirst($user->name)); ?></h5>
        <p class='my-0 f-11 text-dark-grey'><?php echo e($user->email); ?></p>
        <p class='my-0 f-11 text-dark-grey'>
            <?php echo e(!is_null($user->clientDetails) ? mb_ucwords($user->clientDetails->company_name) : ' '); ?></p>
    </div>
</div>
<?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/components/client-search-option.blade.php ENDPATH**/ ?>