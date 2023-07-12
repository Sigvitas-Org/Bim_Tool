<?php $__env->startComponent('mail::message'); ?>
# <?php echo app('translator')->get('app.project'); ?>

<?php echo app('translator')->get('email.newProject.subject'); ?>

<h5><?php echo app('translator')->get('app.project'); ?> <?php echo app('translator')->get('app.details'); ?></h5>

<?php $__env->startComponent('mail::text', ['text' => $content]); ?>

<?php echo $__env->renderComponent(); ?>


<?php $__env->startComponent('mail::button', ['url' => $url]); ?>
<?php echo app('translator')->get('app.view'); ?> <?php echo app('translator')->get('app.project'); ?>
<?php echo $__env->renderComponent(); ?>

<?php echo app('translator')->get('email.regards'); ?>,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/mail/project/created.blade.php ENDPATH**/ ?>