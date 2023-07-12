<?php $__env->startComponent('mail::message'); ?>
# <?php echo app('translator')->get('modules.tasks.newTask'); ?>

<?php echo app('translator')->get('email.newTask.subject'); ?>

<h5><?php echo app('translator')->get('app.task'); ?> <?php echo app('translator')->get('app.details'); ?></h5>

<?php $__env->startComponent('mail::text', ['text' => $content]); ?>

<?php echo $__env->renderComponent(); ?>


<?php echo app('translator')->get('email.regards'); ?>,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/mail/task/task-created-client-notification.blade.php ENDPATH**/ ?>