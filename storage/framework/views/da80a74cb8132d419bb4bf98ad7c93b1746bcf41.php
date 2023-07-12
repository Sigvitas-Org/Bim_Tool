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
<?php $component->withAttributes(['id' => 'save-knowledgebase-data-form']); ?>
            <div class="add-client bg-white rounded">
                <h4 class="mb-0 p-20 f-21 font-weight-normal text-capitalize border-bottom-grey">
                    <?php echo app('translator')->get('modules.knowledgeBase.knowledgeDetails'); ?></h4>
                <div class="row p-20">
                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <div class="d-flex">
                                <?php if (isset($component)) { $__componentOriginald8738d15765d6b35d603018b407a63f14ee18785 = $component; } ?>
<?php $component = App\View\Components\Forms\Radio::resolve(['fieldId' => 'toEmployee','fieldLabel' => __('modules.knowledgeBase.toEmployee'),'fieldName' => 'to','fieldValue' => 'employee','checked' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php $component = App\View\Components\Forms\Radio::resolve(['fieldId' => 'toClient','fieldLabel' => __('modules.knowledgeBase.toClients'),'fieldValue' => 'client','fieldName' => 'to'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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

                    <div class="col-md-6">
                        <div class="form-group my-3">
                            <?php if (isset($component)) { $__componentOriginal3985d2df1d9ef7c51070d7c0b8f4b0e4589145ab = $component; } ?>
<?php $component = App\View\Components\Forms\Text::resolve(['fieldId' => 'heading','fieldLabel' => __('modules.knowledgeBase.knowledgeHeading'),'fieldName' => 'heading','fieldRequired' => 'true','fieldPlaceholder' => __('modules.knowledgeBase.knowledgeHeading')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                    </div>

                    <div class="col-md-6 knowledgecategory">
                        <div class="form-group my-3">
                            <?php if (isset($component)) { $__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad = $component; } ?>
<?php $component = App\View\Components\Forms\Label::resolve(['fieldId' => 'knowledgebasecategory','fieldRequired' => 'true','fieldLabel' => __('modules.knowledgeBase.knowledgeCategory')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                                <select class="form-control select-picker" name="category" id="category"
                                    data-live-search="true">
                                    <option value="">--</option>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option
                                        <?php echo e(isset($selected_category_id) && $selected_category_id == $category->id ? 'selected' : ''); ?>

                                         value="<?php echo e($category->id); ?>">
                                            <?php echo e(mb_ucwords($category->name)); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                                 <?php $__env->slot('append', null, []); ?> 
                                    <button id="addKnowledgeCategory" type="button"
                                        class="btn btn-outline-secondary border-grey"
                                        data-toggle="tooltip" data-original-title="<?php echo e(__('app.add').' '.__('modules.knowledgeBase.knowledgeCategory')); ?>"><?php echo app('translator')->get('app.add'); ?></button>
                                 <?php $__env->endSlot(); ?>

                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal863bfe686851606453ee7ca47b08abfa2e4810a8)): ?>
<?php $component = $__componentOriginal863bfe686851606453ee7ca47b08abfa2e4810a8; ?>
<?php unset($__componentOriginal863bfe686851606453ee7ca47b08abfa2e4810a8); ?>
<?php endif; ?>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <?php if (isset($component)) { $__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad = $component; } ?>
<?php $component = App\View\Components\Forms\Label::resolve(['fieldId' => 'description-textt','fieldLabel' => __('modules.knowledgeBase.knowledgeDesc')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Label::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'my-3']); ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad)): ?>
<?php $component = $__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad; ?>
<?php unset($__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad); ?>
<?php endif; ?>
                            <div id="description"></div>
                            <textarea name="description" id="description-text" class="d-none"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">

                        <?php if (isset($component)) { $__componentOriginal97f972d3036ec98e45782eab9a9572b3af7fcdb9 = $component; } ?>
<?php $component = App\View\Components\Forms\FileMultiple::resolve(['fieldLabel' => __('modules.knowledgeBase.uploadFile'),'fieldName' => 'file','fieldId' => 'file-upload-dropzone'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.file-multiple'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\FileMultiple::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal97f972d3036ec98e45782eab9a9572b3af7fcdb9)): ?>
<?php $component = $__componentOriginal97f972d3036ec98e45782eab9a9572b3af7fcdb9; ?>
<?php unset($__componentOriginal97f972d3036ec98e45782eab9a9572b3af7fcdb9); ?>
<?php endif; ?>
                        </div>
                        <input type="hidden" name="knowledge_base_id" id="knowledge_base_id">
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
<?php $component->withAttributes(['id' => 'save-knowledgebase','class' => 'mr-3']); ?><?php echo app('translator')->get('app.save'); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480)): ?>
<?php $component = $__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480; ?>
<?php unset($__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginaldffecccc219bb81c1548bfa6ec1531014cb3bec8 = $component; } ?>
<?php $component = App\View\Components\Forms\ButtonCancel::resolve(['link' => route('knowledgebase.index')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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

<script src="<?php echo e(asset('vendor/jquery/dropzone.min.js')); ?>"></script>
<script>
    $(document).ready(function() {

        quillImageLoad('#description');
        // show/hide project detail
        $(document).on('change', 'input[type=radio][name=to]', function() {
            $('.department').toggleClass('d-none');
        });

        Dropzone.autoDiscover = false;
            //Dropzone class
            knowledgeBaseDropzone = new Dropzone("div#file-upload-dropzone", {
                dictDefaultMessage: "<?php echo e(__('app.dragDrop')); ?>",
                url: "<?php echo e(route('knowledgebase-files.store')); ?>",
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
                init: function () {
                    knowledgeBaseDropzone = this;
                }
            });

            knowledgeBaseDropzone.on('sending', function (file, xhr, formData) {
                var knowledgeBaseId = $('#knowledge_base_id').val();
                formData.append('knowledge_base_id', knowledgeBaseId);
                $.easyBlockUI();
            });
            knowledgeBaseDropzone.on('uploadprogress', function () {
                $.easyBlockUI();
            });
            knowledgeBaseDropzone.on('completemultiple', function () {
                window.location.href = "<?php echo e(route('knowledgebase.index')); ?>"
            });


        $('#save-knowledgebase').click(function() {
            const url = "<?php echo e(route('knowledgebase.store')); ?>";

            var note = document.getElementById('description').children[0].innerHTML;
            document.getElementById('description-text').value = note;

            $.easyAjax({
                url: url,
                container: '#save-knowledgebase-data-form',
                type: "POST",
                disableButton: true,
                blockUI: true,
                buttonSelector: "#save-knowledgebase",

                data: $('#save-knowledgebase-data-form').serialize(),
                success: function(response) {
                        if (response.status == 'success') {
                            if (knowledgeBaseDropzone.getQueuedFiles().length > 0) {
                                knowledgeBaseId = response.knowledgeBaseId;
                                $('#knowledge_base_id').val(knowledgeBaseId);
                                knowledgeBaseDropzone.processQueue();
                            }
                            else {
                                if ($(MODAL_XL).hasClass('show')) {
                                    $(MODAL_XL).hide();
                                    window.location.reload();
                                } else {
                                    window.location.href = response.redirectUrl;
                                }
                            }
                        }
                }
            });
        });

        $('#addKnowledgeCategory').click(function() {
            const url = "<?php echo e(route('knowledgebasecategory.create')); ?>";
            $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_LG, url);
        })

        init(RIGHT_MODAL);
    });
</script>
<?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/knowledge-base/ajax/create.blade.php ENDPATH**/ ?>