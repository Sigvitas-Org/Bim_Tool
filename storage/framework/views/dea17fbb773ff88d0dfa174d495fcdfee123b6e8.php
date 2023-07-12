<a href="<?php echo e($link); ?>" <?php echo e($attributes->merge(['class' => 'btn-secondary rounded f-14 p-2'])); ?>>
    <?php if($icon != ''): ?>
        <i class="fa fa-<?php echo e($icon); ?> mr-1"></i>
    <?php endif; ?>
    <?php echo e($slot); ?>

</a>
<?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/components/forms/link-secondary.blade.php ENDPATH**/ ?>