
<link rel="stylesheet" href="<?php echo e(asset('vendor/css/tagify.css')); ?>">

<style>
    .tagify {
        width: 100%;
    }

    .tags-look .tagify__dropdown__item {
        display: inline-block;
        border-radius: 3px;
        padding: .3em .5em;
        border: 1px solid #CCC;
        background: #F3F3F3;
        margin: .2em;
        font-size: .85em;
        color: black;
        transition: 0s;
    }

    .tags-look .tagify__dropdown__item--active {
        color: white;
    }

    .tags-look .tagify__dropdown__item:hover {
        background: var(--header_color);
    }

    #datatable{
        margin-bottom: -20px;
    }

</style>

<div class="col-lg-12 col-md-12 ntfcn-tab-content-left w-100 p-4 ">
    <div class="row">

        <div class="col-lg-3">

            <label for="allowed_file_size" class="mt-3">
                <?php echo app('translator')->get('modules.accountSettings.allowedFileSize'); ?> <sup class="f-14">*</sup>
            </label>

            <?php if (isset($component)) { $__componentOriginal863bfe686851606453ee7ca47b08abfa2e4810a8 = $component; } ?>
<?php $component = App\View\Components\Forms\InputGroup::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.input-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\InputGroup::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <input type="number" name="allowed_file_size" id="allowed_file_size"
                       value="<?php echo e(global_setting()->allowed_file_size); ?>"
                       placeholder="<?php echo app('translator')->get('modules.emailSettings.mailPassword'); ?>"
                       class="form-control height-35 f-14"/>
                 <?php $__env->slot('preappend', null, []); ?> 
                    <label class="input-group-text border-grey bg-white height-35">MB</label>
                 <?php $__env->endSlot(); ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal863bfe686851606453ee7ca47b08abfa2e4810a8)): ?>
<?php $component = $__componentOriginal863bfe686851606453ee7ca47b08abfa2e4810a8; ?>
<?php unset($__componentOriginal863bfe686851606453ee7ca47b08abfa2e4810a8); ?>
<?php endif; ?>

        </div>

        <div class="col-lg-12 mt-4">
            <label for="allowed_file_types">
                <?php echo app('translator')->get('modules.accountSettings.allowedFileType'); ?> <sup class="f-14">*</sup>
            </label>
            <textarea type="text" name="allowed_file_types" id="allowed_file_types"
                      placeholder="e.g. application/x-zip-compressed"
                      class="form-control f-14"><?php echo e(global_setting()->allowed_file_types); ?></textarea>
        </div>

    </div>
</div>

<div class="w-100 border-top-grey set-btns">
    <?php if (isset($component)) { $__componentOriginal698fd7a4bca51a1feab5ec62ef3754628de98690 = $component; } ?>
<?php $component = App\View\Components\SettingFormActions::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('setting-form-actions'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SettingFormActions::class))->getConstructor()): ?>
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
<?php $component->withAttributes(['id' => 'save-file-upload-setting-form','class' => 'mr-3']); ?><?php echo app('translator')->get('app.save'); ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480)): ?>
<?php $component = $__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480; ?>
<?php unset($__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480); ?>
<?php endif; ?>

     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal698fd7a4bca51a1feab5ec62ef3754628de98690)): ?>
<?php $component = $__componentOriginal698fd7a4bca51a1feab5ec62ef3754628de98690; ?>
<?php unset($__componentOriginal698fd7a4bca51a1feab5ec62ef3754628de98690); ?>
<?php endif; ?>
</div>


<script src="<?php echo e(asset('vendor/jquery/tagify.min.js')); ?>"></script>

<script>

    $(document).ready(function() {
        var input = document.querySelector('textarea[id=allowed_file_types]');
        console.log(input);

        var whitelist = [
            'image/*', 'application/vnd.ms-excel',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/docx',
            'application/pdf', 'text/plain', 'application/msword',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/zip',
            'application/x-zip-compressed', 'application/x-compressed', 'multipart/x-zip', '.xlsx', 'video/x-flv',
            'video/mp4', 'application/x-mpegURL', 'video/MP2T', 'video/3gpp', 'video/quicktime', 'video/x-msvideo',
            'video/x-ms-wmv', 'application/sla', '.stl'
        ];
        // init Tagify script on the above inputs
        tagify = new Tagify(input, {
            whitelist: whitelist,
            userInput: false,
            dropdown: {
                classname: "tags-look",
                enabled: 0,
                closeOnSelect: false
            }
        });

        $('body').on('click', '#save-file-upload-setting-form', function () {
            const url = "<?php echo e(route('app-settings.update', [company()->id])); ?>?page=file-upload-setting";

            $.easyAjax({
                url: url,
                container: '#editSettings',
                type: "POST",
                disableButton: true,
                buttonSelector: "#save-file-upload-setting-form",
                data: $('#editSettings').serialize(),
            })
        });
    });


</script>
<?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/app-settings/ajax/file-upload-setting.blade.php ENDPATH**/ ?>