<table id="example" <?php echo e($attributes->merge(['class' => 'table'])); ?>>
    <?php if(isset($thead)): ?>
        <thead class="<?php echo e($headType); ?>">
            <tr>
                <?php echo $thead; ?>

            </tr>
        </thead>
    <?php endif; ?>
    <tbody>
        <?php echo e($slot); ?>

    </tbody>
</table>
<?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/components/table.blade.php ENDPATH**/ ?>