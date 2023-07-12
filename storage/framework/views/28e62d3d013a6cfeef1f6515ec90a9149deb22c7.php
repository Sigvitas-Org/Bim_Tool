<?php if(isset($fields) && count($fields) > 0): ?>
    <div <?php echo e($attributes->merge(['class' => 'row p-20'])); ?>>
        <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4">
                <div class="form-group">
                    <?php if($field->type == 'text'): ?>
                        <?php if (isset($component)) { $__componentOriginal3985d2df1d9ef7c51070d7c0b8f4b0e4589145ab = $component; } ?>
<?php $component = App\View\Components\Forms\Text::resolve(['fieldId' => 'custom_fields_data['.e($field->name . '_' . $field->id).']','fieldLabel' => $field->label,'fieldName' => 'custom_fields_data['.e($field->name . '_' . $field->id).']','fieldPlaceholder' => $field->label,'fieldRequired' => ($field->required == 'yes') ? 'true' : 'false','fieldValue' => $model->custom_fields_data['field_'.$field->id] ?? ''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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

                    <?php elseif($field->type == 'password'): ?>
                        <?php if (isset($component)) { $__componentOriginal48b3a418fdb9f7d4bd9204ec3036a721ea2be229 = $component; } ?>
<?php $component = App\View\Components\Forms\Password::resolve(['fieldId' => 'custom_fields_data['.e($field->name . '_' . $field->id).']','fieldLabel' => $field->label,'fieldName' => 'custom_fields_data['.e($field->name . '_' . $field->id).']','fieldPlaceholder' => $field->label,'fieldRequired' => ($field->required === 'yes') ? true : false,'fieldValue' => $model->custom_fields_data['field_'.$field->id] ?? ''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.password'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Password::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal48b3a418fdb9f7d4bd9204ec3036a721ea2be229)): ?>
<?php $component = $__componentOriginal48b3a418fdb9f7d4bd9204ec3036a721ea2be229; ?>
<?php unset($__componentOriginal48b3a418fdb9f7d4bd9204ec3036a721ea2be229); ?>
<?php endif; ?>

                    <?php elseif($field->type == 'number'): ?>
                        <?php if (isset($component)) { $__componentOriginal9cc635f9ffa1f2f42c8f27975e194fec79eaad2c = $component; } ?>
<?php $component = App\View\Components\Forms\Number::resolve(['fieldId' => 'custom_fields_data['.e($field->name . '_' . $field->id).']','fieldLabel' => $field->label,'fieldName' => 'custom_fields_data['.e($field->name . '_' . $field->id).']','fieldPlaceholder' => $field->label,'fieldRequired' => ($field->required === 'yes') ? true : false,'fieldValue' => $model->custom_fields_data['field_'.$field->id] ?? ''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.number'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Number::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9cc635f9ffa1f2f42c8f27975e194fec79eaad2c)): ?>
<?php $component = $__componentOriginal9cc635f9ffa1f2f42c8f27975e194fec79eaad2c; ?>
<?php unset($__componentOriginal9cc635f9ffa1f2f42c8f27975e194fec79eaad2c); ?>
<?php endif; ?>

                    <?php elseif($field->type == 'textarea'): ?>
                        <?php if (isset($component)) { $__componentOriginal582987c8de0d25188b5e8e44b2a5588ebcdc0b11 = $component; } ?>
<?php $component = App\View\Components\Forms\Textarea::resolve(['fieldLabel' => $field->label,'fieldName' => 'custom_fields_data['.e($field->name . '_' . $field->id).']','fieldId' => 'custom_fields_data['.e($field->name . '_' . $field->id).']','fieldRequired' => ($field->required === 'yes') ? true : false,'fieldPlaceholder' => $field->label,'fieldValue' => $model->custom_fields_data['field_'.$field->id] ?? ''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Textarea::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal582987c8de0d25188b5e8e44b2a5588ebcdc0b11)): ?>
<?php $component = $__componentOriginal582987c8de0d25188b5e8e44b2a5588ebcdc0b11; ?>
<?php unset($__componentOriginal582987c8de0d25188b5e8e44b2a5588ebcdc0b11); ?>
<?php endif; ?>

                    <?php elseif($field->type == 'radio'): ?>
                        <div class="form-group my-3">
                            <?php if (isset($component)) { $__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad = $component; } ?>
<?php $component = App\View\Components\Forms\Label::resolve(['fieldId' => 'custom_fields_data['.e($field->name . '_' . $field->id).']','fieldLabel' => $field->label,'fieldRequired' => ($field->required === 'yes') ? true : false] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                            <div class="d-flex">
                                <?php $__currentLoopData = $field->values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if (isset($component)) { $__componentOriginald8738d15765d6b35d603018b407a63f14ee18785 = $component; } ?>
<?php $component = App\View\Components\Forms\Radio::resolve(['fieldId' => 'optionsRadios'.e($key . $field->id).'','fieldLabel' => $value,'fieldName' => 'custom_fields_data['.e($field->name . '_' . $field->id).']','fieldValue' => $value,'checked' => ($model && $model->custom_fields_data['field_'.$field->id] == $value) ? true : false] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>



                    <?php elseif($field->type == 'select'): ?>
                        <div class="form-group my-3">
                            <?php if (isset($component)) { $__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad = $component; } ?>
<?php $component = App\View\Components\Forms\Label::resolve(['fieldId' => 'custom_fields_data['.e($field->name . '_' . $field->id).']','fieldLabel' => $field->label,'fieldRequired' => ($field->required === 'yes') ? true : false] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                            <?php echo Form::select('custom_fields_data[' . $field->name . '_' . $field->id . ']',
 $field->values, $model ? $model->custom_fields_data['field_' . $field->id] : '',
  ['class' => 'form-control select-picker']); ?>

                        </div>
                    <?php elseif($field->type == 'date'): ?>
                        <?php if (isset($component)) { $__componentOriginal375ba69c4c90abc0fec300a948e1f40a31222641 = $component; } ?>
<?php $component = App\View\Components\Forms\Datepicker::resolve(['custom' => 'true','fieldId' => 'custom_fields_data['.e($field->name . '_' . $field->id).']','fieldRequired' => ($field->required === 'yes') ? true : false,'fieldLabel' => $field->label,'fieldName' => 'custom_fields_data['.e($field->name . '_' . $field->id).']','fieldValue' => ($model && $model->custom_fields_data['field_'.$field->id] != '') ? \Carbon\Carbon::parse($model->custom_fields_data['field_'.$field->id])->format(company()->date_format) : now()->format(company()->date_format),'fieldPlaceholder' => $field->label] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.datepicker'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Datepicker::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal375ba69c4c90abc0fec300a948e1f40a31222641)): ?>
<?php $component = $__componentOriginal375ba69c4c90abc0fec300a948e1f40a31222641; ?>
<?php unset($__componentOriginal375ba69c4c90abc0fec300a948e1f40a31222641); ?>
<?php endif; ?>

                    <?php elseif($field->type == 'checkbox'): ?>
                        <div class="form-group my-3">
                            <?php if (isset($component)) { $__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad = $component; } ?>
<?php $component = App\View\Components\Forms\Label::resolve(['fieldId' => 'custom_fields_data['.e($field->name . '_' . $field->id).']','fieldLabel' => $field->label,'fieldRequired' => ($field->required === 'yes') ? true : false] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                            <div class="d-flex checkbox-<?php echo e($field->id); ?>">

                                <input type="hidden" name="custom_fields_data[<?php echo e($field->name.'_'.$field->id); ?>]"
                                       id="<?php echo e($field->name.'_'.$field->id); ?>"
                                       value="<?php echo e($model ? $model->custom_fields_data['field_'.$field->id]:''); ?>"
                                >

                                <?php $__currentLoopData = $field->values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if (isset($component)) { $__componentOriginaldf5bb0e32b087bca724e42ed3cdc51682b267e1e = $component; } ?>
<?php $component = App\View\Components\Forms\Checkbox::resolve(['fieldId' => 'optionsRadios'.e($key . $field->id).'','fieldLabel' => $value,'fieldName' => $field->name.'_'.$field->id.'[]','fieldValue' => $value,'checked' => $model && $model->custom_fields_data['field_'.$field->id] != '' && in_array($value ,explode(', ', $model->custom_fields_data['field_'.$field->id]))] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Checkbox::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['fieldRequired' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(($field->required === 'yes') ? true : false),'onchange' => 'checkboxChange(\'checkbox-'.e($field->id).'\', \''.e($field->name.'_'.$field->id).'\')']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldf5bb0e32b087bca724e42ed3cdc51682b267e1e)): ?>
<?php $component = $__componentOriginaldf5bb0e32b087bca724e42ed3cdc51682b267e1e; ?>
<?php unset($__componentOriginaldf5bb0e32b087bca724e42ed3cdc51682b267e1e); ?>
<?php endif; ?>


                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>

                    <?php endif; ?>

                    <div class="form-control-focus"></div>
                    <span class="help-block"></span>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endif; ?>
<?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/components/forms/custom-field.blade.php ENDPATH**/ ?>