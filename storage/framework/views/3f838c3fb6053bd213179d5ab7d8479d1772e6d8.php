<a href="<?php echo e($href); ?>" <?php if($ajax == "false"): ?> <?php echo e($attributes->merge(['class' => 'text-dark-grey text-capitalize border-right-grey p-sub-menu'])); ?>

    
<?php else: ?>
<?php echo e($attributes->merge(['class' => 'text-dark-grey text-capitalize border-right-grey p-sub-menu ajax-tab'])); ?> <?php endif; ?>><span><?php echo e($text); ?></span></a>
<?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/components/tab.blade.php ENDPATH**/ ?>