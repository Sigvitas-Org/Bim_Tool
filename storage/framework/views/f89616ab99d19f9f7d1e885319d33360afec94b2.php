<?php
$addClientPermission = user()->permission('add_clients');
?>

<?php if (isset($component)) { $__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad = $component; } ?>
<?php $component = App\View\Components\Forms\Label::resolve(['fieldId' => 'client_id','fieldLabel' => __('app.client'),'fieldRequired' => $fieldRequired] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Label::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad)): ?>
<?php $component = $__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad; ?>
<?php unset($__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad); ?>
<?php endif; ?>

<?php if (isset($component)) { $__componentOriginal863bfe686851606453ee7ca47b08abfa2e4810a8 = $component; } ?>
<?php $component = App\View\Components\Forms\InputGroup::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.input-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\InputGroup::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <select class="form-control select-picker" data-live-search="true" data-size="8" name="client_id" id="client_list_id">
        <option value="">--</option>
        <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clientOpt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option <?php if(!is_null($selected) && $selected == $clientOpt->id): ?>
                selected
        <?php endif; ?>
        data-content="
        <?php if (isset($component)) { $__componentOriginaldadf53610789f85f1a530cc52713d386b5cb5cb4 = $component; } ?>
<?php $component = App\View\Components\ClientSearchOption::resolve(['user' => $clientOpt] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('client-search-option'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\ClientSearchOption::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldadf53610789f85f1a530cc52713d386b5cb5cb4)): ?>
<?php $component = $__componentOriginaldadf53610789f85f1a530cc52713d386b5cb5cb4; ?>
<?php unset($__componentOriginaldadf53610789f85f1a530cc52713d386b5cb5cb4); ?>
<?php endif; ?>"
        value="<?php echo e($clientOpt->id); ?>"><?php echo e(mb_ucwords($clientOpt->name)); ?> </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>

    <?php if($addClientPermission == 'all' || $addClientPermission == 'added'): ?>
         <?php $__env->slot('append', null, []); ?> 
            <a href="javascript:;" id="quick-create-client"
            data-toggle="tooltip" data-original-title="<?php echo e(__('modules.client.addNewClient')); ?>"
                class="btn btn-outline-secondary border-grey"
                data-redirect-url="<?php echo e(url()->full()); ?>"><?php echo app('translator')->get('app.add'); ?></a>
         <?php $__env->endSlot(); ?>
    <?php endif; ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal863bfe686851606453ee7ca47b08abfa2e4810a8)): ?>
<?php $component = $__componentOriginal863bfe686851606453ee7ca47b08abfa2e4810a8; ?>
<?php unset($__componentOriginal863bfe686851606453ee7ca47b08abfa2e4810a8); ?>
<?php endif; ?>

<script>
    $('#quick-create-client').click(function() {
        const url = "<?php echo e(route('clients.create') . '?quick-form=1'); ?>";
        $(MODAL_DEFAULT + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_DEFAULT, url);
    });
</script>
<?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/components/client-selection-dropdown.blade.php ENDPATH**/ ?>