
<?php
    $addLeadAgentPermission = user()->permission('manage_leave_setting');
    $approveRejectPermission = user()->permission('approve_or_reject_leaves');
?>

<link rel="stylesheet" href="<?php echo e(asset('vendor/css/bootstrap-datepicker3.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('vendor/css/dropzone.min.css')); ?>">

<div class="row">
    <div class="col-sm-12">
        <?php if (isset($component)) { $__componentOriginal0777dca6b0ab2eebdcaf6ba884d5b30ab61203a6 = $component; } ?>
<?php $component = App\View\Components\Form::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Form::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'save-lead-data-form']); ?>
            <div class="add-client bg-white rounded">
                <h4 class="mb-0 p-20 f-21 font-weight-normal text-capitalize border-bottom-grey">
                    <?php echo app('translator')->get('modules.leaves.assignLeave'); ?></h4>
                <div class="row p-20">

                    <div class="col-lg-4 col-md-6">
                        <?php if(isset($defaultAssign)): ?>
                            <?php if (isset($component)) { $__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad = $component; } ?>
<?php $component = App\View\Components\Forms\Label::resolve(['fieldId' => '','fieldLabel' => __('app.name'),'fieldRequired' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Label::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mt-3']); ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad)): ?>
<?php $component = $__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad; ?>
<?php unset($__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad); ?>
<?php endif; ?>
                            <input type="hidden" name="user_id" id="user_id" value="<?php echo e($defaultAssign->id); ?>">
                            <input type="text" value="<?php echo e($defaultAssign->name); ?>"
                                class="form-control height-35 f-15 readonly-background" readonly>
                        <?php else: ?>
                            <?php if (isset($component)) { $__componentOriginalaa9e2e00dcec6b58db49b9128f7191370bc93381 = $component; } ?>
<?php $component = App\View\Components\Forms\Select::resolve(['fieldId' => 'user_id','fieldLabel' => __('modules.messages.chooseMember'),'fieldName' => 'user_id','search' => 'true','fieldRequired' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                <option value="">--</option>
                                <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if (isset($component)) { $__componentOriginal3a9f7815236e62d576ffe72a6df948b4e8598398 = $component; } ?>
<?php $component = App\View\Components\UserOption::resolve(['user' => $employee,'selected' => request()->has('default_assign') &&
                                        request('default_assign') == $employee->id] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('user-option'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\UserOption::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3a9f7815236e62d576ffe72a6df948b4e8598398)): ?>
<?php $component = $__componentOriginal3a9f7815236e62d576ffe72a6df948b4e8598398; ?>
<?php unset($__componentOriginal3a9f7815236e62d576ffe72a6df948b4e8598398); ?>
<?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalaa9e2e00dcec6b58db49b9128f7191370bc93381)): ?>
<?php $component = $__componentOriginalaa9e2e00dcec6b58db49b9128f7191370bc93381; ?>
<?php unset($__componentOriginalaa9e2e00dcec6b58db49b9128f7191370bc93381); ?>
<?php endif; ?>
                        <?php endif; ?>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <?php if (isset($component)) { $__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad = $component; } ?>
<?php $component = App\View\Components\Forms\Label::resolve(['fieldId' => '','fieldLabel' => __('modules.leaves.leaveType'),'fieldRequired' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Label::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mt-3']); ?>
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
                            <select class="form-control select-picker" name="leave_type_id" id="leave_type_id"
                                data-live-search="true">
                                <option value="">--</option>
                                <?php if(isset($leaveTypes)): ?>
                                    <?php $__currentLoopData = $leaveTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leaveType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($leaveType->id); ?>"><?php echo e(mb_ucwords($leaveType->type_name)); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                <?php if(isset($leaveQuotas)): ?>
                                    <?php $__currentLoopData = $leaveQuotas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leaveQuota): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($leaveQuota->no_of_leaves > 0): ?>
                                            <option value="<?php echo e($leaveQuota->leaveType->id); ?>">
                                                <?php echo e(mb_ucwords($leaveQuota->leaveType->type_name)); ?>

                                            </option>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </select>

                            <?php if($addLeadAgentPermission == 'all' || $addLeadAgentPermission == 'added'): ?>
                                 <?php $__env->slot('append', null, []); ?> 
                                    <button type="button"
                                        class="btn btn-outline-secondary border-grey add-lead-type2"
                                        data-toggle="tooltip" data-original-title="<?php echo e(__('modules.leaves.addLeaveType')); ?>"><?php echo app('translator')->get('app.add'); ?></button>
                                 <?php $__env->endSlot(); ?>
                            <?php endif; ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal863bfe686851606453ee7ca47b08abfa2e4810a8)): ?>
<?php $component = $__componentOriginal863bfe686851606453ee7ca47b08abfa2e4810a8; ?>
<?php unset($__componentOriginal863bfe686851606453ee7ca47b08abfa2e4810a8); ?>
<?php endif; ?>
                    </div>

                    <?php if($approveRejectPermission == 'all'): ?>
                        <div class="col-lg-4 col-md-6">
                            <?php if (isset($component)) { $__componentOriginalaa9e2e00dcec6b58db49b9128f7191370bc93381 = $component; } ?>
<?php $component = App\View\Components\Forms\Select::resolve(['fieldId' => 'status','fieldLabel' => __('app.status'),'fieldName' => 'status','search' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                <option value="approved"><?php echo app('translator')->get('app.approved'); ?></option>
                                <option value="pending"><?php echo app('translator')->get('app.pending'); ?></option>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalaa9e2e00dcec6b58db49b9128f7191370bc93381)): ?>
<?php $component = $__componentOriginalaa9e2e00dcec6b58db49b9128f7191370bc93381; ?>
<?php unset($__componentOriginalaa9e2e00dcec6b58db49b9128f7191370bc93381); ?>
<?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <div class="col-md-6 col-lg-4">
                        <div class="form-group my-3">
                            <label class="f-14 text-dark-grey mb-12 w-100" for="usr"><?php echo app('translator')->get('modules.leaves.selectDuration'); ?></label>
                            <div class="d-block d-lg-flex d-md-flex">
                                <?php if (isset($component)) { $__componentOriginald8738d15765d6b35d603018b407a63f14ee18785 = $component; } ?>
<?php $component = App\View\Components\Forms\Radio::resolve(['fieldId' => 'duration_single','fieldLabel' => __('modules.leaves.single'),'fieldName' => 'duration','fieldValue' => 'single','checked' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.radio'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Radio::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald8738d15765d6b35d603018b407a63f14ee18785)): ?>
<?php $component = $__componentOriginald8738d15765d6b35d603018b407a63f14ee18785; ?>
<?php unset($__componentOriginald8738d15765d6b35d603018b407a63f14ee18785); ?>
<?php endif; ?>
                                <?php if (isset($component)) { $__componentOriginald8738d15765d6b35d603018b407a63f14ee18785 = $component; } ?>
<?php $component = App\View\Components\Forms\Radio::resolve(['fieldId' => 'duration_multiple','fieldLabel' => __('modules.leaves.multiple'),'fieldValue' => 'multiple','fieldName' => 'duration'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.radio'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Radio::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald8738d15765d6b35d603018b407a63f14ee18785)): ?>
<?php $component = $__componentOriginald8738d15765d6b35d603018b407a63f14ee18785; ?>
<?php unset($__componentOriginald8738d15765d6b35d603018b407a63f14ee18785); ?>
<?php endif; ?>

                                <?php if (isset($component)) { $__componentOriginald8738d15765d6b35d603018b407a63f14ee18785 = $component; } ?>
<?php $component = App\View\Components\Forms\Radio::resolve(['fieldId' => 'half_day_first','fieldLabel' => __('modules.leaves.firstHalf'),'fieldName' => 'duration','fieldValue' => 'first_half'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.radio'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Radio::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald8738d15765d6b35d603018b407a63f14ee18785)): ?>
<?php $component = $__componentOriginald8738d15765d6b35d603018b407a63f14ee18785; ?>
<?php unset($__componentOriginald8738d15765d6b35d603018b407a63f14ee18785); ?>
<?php endif; ?>
                                <?php if (isset($component)) { $__componentOriginald8738d15765d6b35d603018b407a63f14ee18785 = $component; } ?>
<?php $component = App\View\Components\Forms\Radio::resolve(['fieldId' => 'half_day_second','fieldLabel' => __('modules.leaves.secondHalf'),'fieldValue' => 'second_half','fieldName' => 'duration'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.radio'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Radio::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald8738d15765d6b35d603018b407a63f14ee18785)): ?>
<?php $component = $__componentOriginald8738d15765d6b35d603018b407a63f14ee18785; ?>
<?php unset($__componentOriginald8738d15765d6b35d603018b407a63f14ee18785); ?>
<?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 single_date_div">
                        <?php if (isset($component)) { $__componentOriginal3985d2df1d9ef7c51070d7c0b8f4b0e4589145ab = $component; } ?>
<?php $component = App\View\Components\Forms\Text::resolve(['fieldLabel' => __('app.date'),'fieldName' => 'leave_date','fieldId' => 'single_date','fieldPlaceholder' => __('app.date'),'fieldValue' => Carbon\Carbon::today()->format(company()->date_format)] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Text::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3985d2df1d9ef7c51070d7c0b8f4b0e4589145ab)): ?>
<?php $component = $__componentOriginal3985d2df1d9ef7c51070d7c0b8f4b0e4589145ab; ?>
<?php unset($__componentOriginal3985d2df1d9ef7c51070d7c0b8f4b0e4589145ab); ?>
<?php endif; ?>
                    </div>

                    <div class="col-lg-4 col-md-6 d-none multi_date_div">
                        <?php if (isset($component)) { $__componentOriginal3985d2df1d9ef7c51070d7c0b8f4b0e4589145ab = $component; } ?>
<?php $component = App\View\Components\Forms\Text::resolve(['fieldLabel' => __('messages.selectMultipleDates'),'fieldName' => 'multi_date','fieldId' => 'multi_date','fieldPlaceholder' => __('messages.selectMultipleDates'),'fieldValue' => Carbon\Carbon::today()->format(company()->date_format)] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Text::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3985d2df1d9ef7c51070d7c0b8f4b0e4589145ab)): ?>
<?php $component = $__componentOriginal3985d2df1d9ef7c51070d7c0b8f4b0e4589145ab; ?>
<?php unset($__componentOriginal3985d2df1d9ef7c51070d7c0b8f4b0e4589145ab); ?>
<?php endif; ?>
                    </div>

                    <div class="col-lg-2 col-md-6 mt-5">
                        <p id="users"></p>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <?php if (isset($component)) { $__componentOriginal582987c8de0d25188b5e8e44b2a5588ebcdc0b11 = $component; } ?>
<?php $component = App\View\Components\Forms\Textarea::resolve(['fieldLabel' => __('modules.leaves.reason'),'fieldName' => 'reason','fieldId' => 'reason','fieldRequired' => 'true','fieldPlaceholder' => __('placeholders.leave.reason')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Textarea::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-0 mr-lg-2 mr-md-2']); ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal582987c8de0d25188b5e8e44b2a5588ebcdc0b11)): ?>
<?php $component = $__componentOriginal582987c8de0d25188b5e8e44b2a5588ebcdc0b11; ?>
<?php unset($__componentOriginal582987c8de0d25188b5e8e44b2a5588ebcdc0b11); ?>
<?php endif; ?>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <?php if (isset($component)) { $__componentOriginal97f972d3036ec98e45782eab9a9572b3af7fcdb9 = $component; } ?>
<?php $component = App\View\Components\Forms\FileMultiple::resolve(['fieldLabel' => __('app.add') . ' ' . __('app.file'),'fieldName' => 'file','fieldId' => 'leave-file-upload-dropzone'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.file-multiple'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\FileMultiple::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-0 mr-lg-2 mr-md-2','popover' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.leaveFileMessage'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal97f972d3036ec98e45782eab9a9572b3af7fcdb9)): ?>
<?php $component = $__componentOriginal97f972d3036ec98e45782eab9a9572b3af7fcdb9; ?>
<?php unset($__componentOriginal97f972d3036ec98e45782eab9a9572b3af7fcdb9); ?>
<?php endif; ?>
                        <input type="hidden" name="leaveID" id="leaveID">
                    </div>

                </div>

                <?php if (isset($component)) { $__componentOriginalfc2695d0fb2b25f1a4057d7bc43eb62e95aaec66 = $component; } ?>
<?php $component = App\View\Components\FormActions::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form-actions'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\FormActions::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    <?php if (isset($component)) { $__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480 = $component; } ?>
<?php $component = App\View\Components\Forms\ButtonPrimary::resolve(['icon' => 'check'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'save-leave-form','class' => 'mr-3']); ?><?php echo app('translator')->get('app.save'); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480)): ?>
<?php $component = $__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480; ?>
<?php unset($__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginaldffecccc219bb81c1548bfa6ec1531014cb3bec8 = $component; } ?>
<?php $component = App\View\Components\Forms\ButtonCancel::resolve(['link' => route('leaves.index')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-cancel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonCancel::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'border-0']); ?><?php echo app('translator')->get('app.cancel'); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldffecccc219bb81c1548bfa6ec1531014cb3bec8)): ?>
<?php $component = $__componentOriginaldffecccc219bb81c1548bfa6ec1531014cb3bec8; ?>
<?php unset($__componentOriginaldffecccc219bb81c1548bfa6ec1531014cb3bec8); ?>
<?php endif; ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfc2695d0fb2b25f1a4057d7bc43eb62e95aaec66)): ?>
<?php $component = $__componentOriginalfc2695d0fb2b25f1a4057d7bc43eb62e95aaec66; ?>
<?php unset($__componentOriginalfc2695d0fb2b25f1a4057d7bc43eb62e95aaec66); ?>
<?php endif; ?>

            </div>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0777dca6b0ab2eebdcaf6ba884d5b30ab61203a6)): ?>
<?php $component = $__componentOriginal0777dca6b0ab2eebdcaf6ba884d5b30ab61203a6; ?>
<?php unset($__componentOriginal0777dca6b0ab2eebdcaf6ba884d5b30ab61203a6); ?>
<?php endif; ?>

    </div>
</div>


<script src="<?php echo e(asset('vendor/jquery/bootstrap-datepicker.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/jquery/dropzone.min.js')); ?>"></script>

<script>
    $(document).ready(function() {

        console.log('here');
        Dropzone.autoDiscover = false;
        //Dropzone class
        myDropzone = new Dropzone("div#leave-file-upload-dropzone", {
            dictDefaultMessage: "<?php echo e(__('app.dragDrop')); ?>",
            url: "<?php echo e(route('leave-files.store')); ?>",
            headers: {
                'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
            },
            paramName: "file",
            maxFilesize: DROPZONE_MAX_FILESIZE,
            maxFiles: 10,
            autoProcessQueue: false,
            uploadMultiple: true,
            addRemoveLinks: true,
            parallelUploads: 10,
            acceptedFiles: DROPZONE_FILE_ALLOW,
            init: function() {
                myDropzone = this;
            }
        });
        myDropzone.on('sending', function(file, xhr, formData) {
            var ids = $('#leaveID').val();
            console.log(ids);
            formData.append('leave_id', ids);
        });
        myDropzone.on('uploadprogress', function() {
            $.easyBlockUI();
        });
        myDropzone.on('completemultiple', function() {
            var redirect_url = $('#redirect_url').val();
            if (redirect_url != '') {
                window.location.href = decodeURIComponent(redirect_url);
            }
            window.location.href = "<?php echo e(route('leaves.index')); ?>"
        });

        getDate();
        const dp1 = datepicker('#single_date', {
            onSelect: function () {
                getDate();
            },
            position: 'bl',
            ...datepickerConfig
        });

        const dp2 = $('#multi_date').datepicker({
            linkedCalendars: false,
            multidate: true,
            todayHighlight: true,
            format: 'yyyy-mm-d'

        });

        $('input[type=radio][name=duration]').change(function() {
            if (this.value == 'multiple') {

                const dp2 = $('#multi_date').datepicker('clearDates').datepicker({
                    linkedCalendars: false,
                    multidate: true,
                    todayHighlight: true,
                    format: 'yyyy-mm-d'

                });
            }
        });

        setMinDate($('#user_id').val());

        $('#user_id').on('change', function(e) {
            setMinDate(e.target.value);
        });

        function setMinDate(employeeID) {
            var employees = <?php echo json_encode($employees, 15, 512) ?>;
            var employee = employees.filter(function(item) {
                return item.id == employeeID;
            });

            if(employees.length > 0 && employee[0] !== undefined)
            {
                var minDate = new Date(employee[0].employee_detail.joining_date);
                dp1.setMin(minDate);
                $('#multi_date').datepicker('setStartDate', minDate);
            }
        }

        $('#save-leave-form').click(function() {

            const url = "<?php echo e(route('leaves.store')); ?>";

            $.easyAjax({
                url: url,
                container: '#save-lead-data-form',
                type: "POST",
                disableButton: true,
                blockUI: true,
                buttonSelector: "#save-leave-form",
                data: $('#save-lead-data-form').serialize(),
                success: function(response) {
                    if (response.status == 'success') {
                        $('#leaveID').val(response.leaveID);
                        myDropzone.processQueue();
                        window.location.href = response.redirectUrl;
                    }
                }
            });
        });

        $('body').on('click', '.add-lead-type2', function() {
            var url = "<?php echo e(route('leaveType.create')); ?>";
            $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_LG, url);
        });

        $("input[name=duration]").click(function() {
            ($('input[name=duration]:checked').val() == "multiple") ? getDate('multiple') : getDate();

            $(this).val() == 'multiple' ? $('.multi_date_div').removeClass('d-none') : $(
                '.multi_date_div').addClass('d-none');
            $(this).val() == 'multiple' ? $('.single_date_div').addClass('d-none') : $(
                '.single_date_div').removeClass('d-none');
        });

        $('#user_id').change(function() {
            var id = $(this).val();
            if (id == '') {
                id = 0;
            }
            var url = "<?php echo e(route('employee-leaves.employee_leave_types', ':id')); ?>";
            url = url.replace(':id', id);
            $.easyAjax({
                url: url,
                type: "GET",
                container: '#save-lead-data-form',
                blockUI: true,
                success: function(data) {
                    $('#leave_type_id').html(data.data);
                    $('#leave_type_id').selectpicker('refresh');
                }
            })
        });

        function getDate(value) {
            let url = "<?php echo e(route('leaves.date')); ?>";
            date = $('#single_date').val();

            if (value == 'multiple') {
                date = '';
            }

            $.easyAjax({
                type: 'GET',
                url: url,
                container: '#save-lead-data-form',
                data: {
                    'date': date
                },
                success: function(response) {
                    if(response.status == 'success'){
                        if(response.users > 0 && response.users < 2){
                            $('#users').text(response.users+' <?php echo app('translator')->get('modules.leaves.employeeOnLeave'); ?>');
                        }else if(response.users > 0){
                            $('#users').text(response.users+' <?php echo app('translator')->get('modules.leaves.employeesOnLeave'); ?>');
                        }else{
                            $('#users').text('');
                        }
                    }
                }
            });
        };

        init(RIGHT_MODAL);
    });
</script>
<?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/leaves/ajax/create.blade.php ENDPATH**/ ?>