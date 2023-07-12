<link rel="stylesheet" href="<?php echo e(asset('vendor/css/dropzone.min.css')); ?>">

<div class="modal-header">
    <h5 class="modal-title" id="modelHeading"><?php echo app('translator')->get("modules.messages.startConversation"); ?></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">×</span></button>
</div>
<div class="modal-body">
    <?php if (isset($component)) { $__componentOriginal0777dca6b0ab2eebdcaf6ba884d5b30ab61203a6 = $component; } ?>
<?php $component = App\View\Components\Form::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Form::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'createConversationForm']); ?>
        <div class="row">

            <div class="col-md-12 <?php echo e(isset($clientId) ? 'd-none' : ''); ?>">
                <div class="form-group">
                    <div class="d-flex">

                        <?php if(!in_array('client', user_roles())): ?>
                            <?php if(
                            $messageSetting->allow_client_employee == 'yes' && in_array('employee', user_roles())
                            || $messageSetting->allow_client_admin == 'yes' && in_array('admin', user_roles())
                            ): ?>
                                <?php if (isset($component)) { $__componentOriginald8738d15765d6b35d603018b407a63f14ee18785 = $component; } ?>
<?php $component = App\View\Components\Forms\Radio::resolve(['fieldId' => 'user-type-employee','fieldLabel' => __('app.member'),'fieldValue' => 'employee','fieldName' => 'user_type','checked' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php $component = App\View\Components\Forms\Radio::resolve(['fieldId' => 'user-type-client','fieldLabel' => __('app.client'),'fieldValue' => 'client','fieldName' => 'user_type'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                            <?php else: ?>
                                <input type="hidden" name="user_type" value="employee">
                            <?php endif; ?>
                        <?php endif; ?>

                        <?php if(in_array('client', user_roles())): ?>
                            <?php if($messageSetting->allow_client_employee == 'yes' || $messageSetting->allow_client_admin == 'yes'): ?>
                                <input type="hidden" name="user_type" value="employee">
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="col-md-12" id="member-list">
                <div class="form-group">
                    <?php if (isset($component)) { $__componentOriginalaa9e2e00dcec6b58db49b9128f7191370bc93381 = $component; } ?>
<?php $component = App\View\Components\Forms\Select::resolve(['fieldId' => 'selectEmployee','fieldLabel' => __('modules.messages.chooseMember'),'fieldName' => 'user_id','search' => 'true','fieldRequired' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                        <option value="">--</option>
                        <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if (isset($component)) { $__componentOriginal3a9f7815236e62d576ffe72a6df948b4e8598398 = $component; } ?>
<?php $component = App\View\Components\UserOption::resolve(['user' => $item,'pill' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                </div>
            </div>

            <?php if((
                ($messageSetting->allow_client_admin == 'yes' && in_array('admin', user_roles()))
                || ($messageSetting->allow_client_employee == 'yes'  && in_array('employee', user_roles())))
                && !in_array('client', user_roles()
            )): ?>
                <div class="col-md-12 d-none" id="client-list">
                    <div class="form-group">

                        <?php if(isset($clientId)): ?>
                            <?php if (isset($component)) { $__componentOriginal3985d2df1d9ef7c51070d7c0b8f4b0e4589145ab = $component; } ?>
<?php $component = App\View\Components\Forms\Text::resolve(['fieldReadOnly' => true,'fieldLabel' => __('modules.client.clientName'),'fieldName' => 'client_name','fieldId' => 'client_name','fieldPlaceholder' => '','fieldValue' => $client->name] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                            <input type="hidden" name="client_id" id="client_id" value="<?php echo e($clientId); ?>">
                        <?php else: ?>
                            <?php if (isset($component)) { $__componentOriginalaa9e2e00dcec6b58db49b9128f7191370bc93381 = $component; } ?>
<?php $component = App\View\Components\Forms\Select::resolve(['fieldId' => 'client_id','fieldLabel' => __('modules.client.clientName'),'fieldName' => 'client_id','search' => 'true','fieldRequired' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                <option value="">--</option>
                                <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if (isset($component)) { $__componentOriginal3a9f7815236e62d576ffe72a6df948b4e8598398 = $component; } ?>
<?php $component = App\View\Components\UserOption::resolve(['user' => $item,'pill' => true,'selected' => isset($client) && $client->id == $item->id] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                                    </select>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalaa9e2e00dcec6b58db49b9128f7191370bc93381)): ?>
<?php $component = $__componentOriginalaa9e2e00dcec6b58db49b9128f7191370bc93381; ?>
<?php unset($__componentOriginalaa9e2e00dcec6b58db49b9128f7191370bc93381); ?>
<?php endif; ?>

                        <?php endif; ?>

                    </div>
                </div>
            <?php endif; ?>

            <div class="col-md-12">
                <div class="form-group">
                    <?php if (isset($component)) { $__componentOriginal582987c8de0d25188b5e8e44b2a5588ebcdc0b11 = $component; } ?>
<?php $component = App\View\Components\Forms\Textarea::resolve(['fieldLabel' => __('modules.messages.message'),'fieldRequired' => 'true','fieldName' => 'message','fieldId' => 'message','fieldPlaceholder' => __('modules.messages.typeMessage')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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

            <div class="col-md-12">
                <?php if (isset($component)) { $__componentOriginal97f972d3036ec98e45782eab9a9572b3af7fcdb9 = $component; } ?>
<?php $component = App\View\Components\Forms\FileMultiple::resolve(['fieldLabel' => __('app.add') . ' ' .__('app.file'),'fieldName' => 'file','fieldId' => 'message-file-upload-dropzone'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.file-multiple'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\FileMultiple::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-0 mr-lg-2 mr-md-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal97f972d3036ec98e45782eab9a9572b3af7fcdb9)): ?>
<?php $component = $__componentOriginal97f972d3036ec98e45782eab9a9572b3af7fcdb9; ?>
<?php unset($__componentOriginal97f972d3036ec98e45782eab9a9572b3af7fcdb9); ?>
<?php endif; ?>
                <input type="hidden" name="message_id" id="message_id">
                <input type="hidden" name="type" id="message">

                
                <input type="hidden" name="user_list" id="user_list">
                <input type="hidden" name="message_list" id="message_list">
                <input type="hidden" name="receiver_id" id="receiver_id">
            </div>

        </div>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0777dca6b0ab2eebdcaf6ba884d5b30ab61203a6)): ?>
<?php $component = $__componentOriginal0777dca6b0ab2eebdcaf6ba884d5b30ab61203a6; ?>
<?php unset($__componentOriginal0777dca6b0ab2eebdcaf6ba884d5b30ab61203a6); ?>
<?php endif; ?>
</div>
<div class="modal-footer">
    <?php if (isset($component)) { $__componentOriginaldffecccc219bb81c1548bfa6ec1531014cb3bec8 = $component; } ?>
<?php $component = App\View\Components\Forms\ButtonCancel::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-cancel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonCancel::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['data-dismiss' => 'modal','class' => 'border-0 mr-3']); ?><?php echo app('translator')->get('app.cancel'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldffecccc219bb81c1548bfa6ec1531014cb3bec8)): ?>
<?php $component = $__componentOriginaldffecccc219bb81c1548bfa6ec1531014cb3bec8; ?>
<?php unset($__componentOriginaldffecccc219bb81c1548bfa6ec1531014cb3bec8); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480 = $component; } ?>
<?php $component = App\View\Components\Forms\ButtonPrimary::resolve(['icon' => 'check'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'save-message']); ?><?php echo app('translator')->get('app.send'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480)): ?>
<?php $component = $__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480; ?>
<?php unset($__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480); ?>
<?php endif; ?>
</div>

<script src="<?php echo e(asset('vendor/jquery/dropzone.min.js')); ?>"></script>

<script>

    $('#selectEmployee').selectpicker();

    $("input[name=user_type]").click(function() {
        if ($(this).val() == 'employee') {
            $('#member-list').removeClass('d-none');
            $('#client-list').addClass('d-none');
        } else {
            $('#member-list').addClass('d-none');
            $('#client-list').removeClass('d-none');
        }
    });

    /* Upload images */
    Dropzone.autoDiscover = false;

    //Dropzone class
    taskDropzone1 = new Dropzone("#message-file-upload-dropzone", {
        dictDefaultMessage: "<?php echo e(__('app.dragDrop')); ?>",
        url: "<?php echo e(route('message-file.store')); ?>",
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
            taskDropzone1 = this;
            this.on("success", function(file, response) {
                $('#message_list').val(response.message_list);
                setContent();
                $.easyUnblockUI();
                taskDropzone1.removeAllFiles(true);
            })
        }
    });
    taskDropzone1.on('sending', function (file, xhr, formData) {
        var ids = $('#message_id').val();
        formData.append('message_id', ids);
        formData.append('type', 'message');
        formData.append('receiver_id', $('#receiver_id').val());
        $.easyBlockUI();
    });
    taskDropzone1.on('uploadprogress', function () {
        $.easyBlockUI();
    });

    $('#save-message').click(function() {
        var url = "<?php echo e(route('messages.store')); ?>";
        $.easyAjax({
            url: url,
            container: '#createConversationForm',
            disableButton: true,
            blockUI: true,
            buttonSelector: "#save-message",
            type: "POST",
            data: $('#createConversationForm').serialize(),
            success: function(response) {

                $('#user_list').val(response.user_list);
                $('#message_list').val(response.message_list);
                $('#receiver_id').val(response.receiver_id);
                $('.message-user').html(response.userName);

                if (taskDropzone1.getQueuedFiles().length > 0) {
                    message_id = response.message_id;
                    $('#message_id').val(response.message_id);
                    taskDropzone1.processQueue();
                } else {
                    setContent();
                }

                $('.show-user-messages').removeClass('active');
                $('#user-no-'+response.receiver_id+' a').addClass('active');
                let receiverId = $('#chatBox').data('chat-for-user');
                $('#user-no-'+receiverId+' a').addClass('active');

            }
        })
    });

    function setContent() {
        <?php if(isset($client)): ?>
            let clientId = $('#client_id').val();
            var redirectUrl = "<?php echo e(route('messages.index')); ?>?clientId="+clientId;
            window.location.href = redirectUrl;
        <?php endif; ?>

        document.getElementById('msgLeft').innerHTML = $('#user_list').val();
        document.getElementById('chatBox').innerHTML = $('#message_list').val();
        $('#sendMessageForm').removeClass('d-none');

        if ($("input[name=user_type]").length > 0 && $("input[name=user_type]").val() ==
            'client') {
            var userId = $('#client-list').val();
        } else {
            var userId = $('#selectEmployee').val();
        }

        $('#current_user_id').val(userId);
        $('#receiver_id').val(userId);
        $(MODAL_LG).modal('hide');

        scrollChat();
    }

    // If request comes from project overview tab where client id is set, then it will select that client name default
    <?php if(isset($client)): ?>
        $("#user-type-client").prop("checked", true);
        $('#member-list, #client-list').toggleClass('d-none');
    <?php endif; ?>

    init('#createConversationForm');
</script>
<?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/messages/create.blade.php ENDPATH**/ ?>