<?php $__env->startComponent('mail::message'); ?>
# <?php echo app('translator')->get('email.leave.applied'); ?>

<?php $__env->startComponent('mail::text', ['text' => $content]); ?>

<?php echo $__env->renderComponent(); ?>


<?php echo app('translator')->get('email.regards'); ?>,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/mail/leaves/multiple.blade.php ENDPATH**/ ?>