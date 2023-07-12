<li <?php echo e($attributes->merge(['class' => 'accordionItem closeIt'])); ?>>

    <?php if(!is_null($link)): ?>
        <a class="nav-item text-lightest f-15 sidebar-text-color" href="<?php echo e($link); ?>"
           title="<?php echo e($text); ?>">
            <?php if(isset($iconPath)): ?>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                     class="bi bi-<?php echo e($icon); ?>" viewBox="0 0 16 16">
                    <?php echo $iconPath; ?>

                </svg>
            <?php endif; ?>
            <span class="pl-3"><?php echo e($text); ?></span>
            <?php if($addon): ?>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                     class="bi bi-gift ml-2 text-yellow" viewBox="0 0 16 16" data-toggle="tooltip"
                     data-original-title="Add On (Need to be bought separately)">
                    <path
                        d="M3 2.5a2.5 2.5 0 0 1 5 0 2.5 2.5 0 0 1 5 0v.006c0 .07 0 .27-.038.494H15a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a1.5 1.5 0 0 1-1.5 1.5h-11A1.5 1.5 0 0 1 1 14.5V7a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h2.038A2.968 2.968 0 0 1 3 2.506V2.5zm1.068.5H7v-.5a1.5 1.5 0 1 0-3 0c0 .085.002.274.045.43a.522.522 0 0 0 .023.07zM9 3h2.932a.56.56 0 0 0 .023-.07c.043-.156.045-.345.045-.43a1.5 1.5 0 0 0-3 0V3zM1 4v2h6V4H1zm8 0v2h6V4H9zm5 3H9v8h4.5a.5.5 0 0 0 .5-.5V7zm-7 8V7H2v7.5a.5.5 0 0 0 .5.5H7z"/>
                </svg>
            <?php endif; ?>
            <?php if($count != 0): ?>
                <span class="badge badge-primary menu-item-count"><?php echo e($count); ?></span>
            <?php endif; ?>
        </a>
    <?php else: ?>
        <a class="nav-item text-lightest f-15 sidebar-text-color accordionItemHeading <?php echo e($active == 1 ? 'active' : ''); ?>"
           title="<?php echo e($text); ?>">
            <?php if(isset($iconPath)): ?>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                     class="bi bi-<?php echo e($icon); ?>" viewBox="0 0 16 16">
                    <?php echo $iconPath; ?>

                </svg>
            <?php endif; ?>
            <span class="pl-3"><?php echo e($text); ?></span>

            <?php if($addon): ?>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                     class="bi bi-gift ml-2 text-yellow" viewBox="0 0 16 16" data-toggle="tooltip"
                     data-original-title="Add On (Need to be bought separately)">
                    <path
                        d="M3 2.5a2.5 2.5 0 0 1 5 0 2.5 2.5 0 0 1 5 0v.006c0 .07 0 .27-.038.494H15a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a1.5 1.5 0 0 1-1.5 1.5h-11A1.5 1.5 0 0 1 1 14.5V7a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h2.038A2.968 2.968 0 0 1 3 2.506V2.5zm1.068.5H7v-.5a1.5 1.5 0 1 0-3 0c0 .085.002.274.045.43a.522.522 0 0 0 .023.07zM9 3h2.932a.56.56 0 0 0 .023-.07c.043-.156.045-.345.045-.43a1.5 1.5 0 0 0-3 0V3zM1 4v2h6V4H1zm8 0v2h6V4H9zm5 3H9v8h4.5a.5.5 0 0 0 .5-.5V7zm-7 8V7H2v7.5a.5.5 0 0 0 .5.5H7z"/>
                </svg>
            <?php endif; ?>
        </a>
    <?php endif; ?>

    <?php echo e($slot); ?>

</li>
<?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/components/menu-item.blade.php ENDPATH**/ ?>