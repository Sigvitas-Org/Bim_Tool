<div class="row p-20">

    <x-form id="editSettings" method="POST" class="ajax-form">
        <div class="col-lg-12">
            <x-forms.checkbox :fieldLabel="__('recruit::modules.setting.careerSiteBtn')"
                fieldName="career_site" fieldId="career_site" fieldValue="yes"
                :checked="$mail->career_site == 'yes'" />
        </div>
    </x-form>

    <div class="col-lg-12">
        <x-forms.file allowedFileExtensions="png jpg jpeg svg" class="mr-0 mr-lg-2 mr-md-2 cropper"
            :fieldLabel="__('recruit::modules.setting.companyLogo')" :fieldValue="$mail->logo_url"
            fieldName="logo" fieldId="logo" :popover="__('messages.fileFormat.ImageFile')" />
    </div>

    <div class="col-lg-6">
        <x-forms.text class="mr-0 mr-lg-2 mr-md-2" :fieldLabel="__('modules.accountSettings.companyName')"
            fieldPlaceholder="e.g. Acme Corporation" fieldRequired="false" fieldName="company_name"
            fieldId="company_name" :fieldValue="$mail->company_name" />
    </div>
    <div class="col-lg-6">
        <x-forms.text class="mr-0 mr-lg-2 mr-md-2"
            :fieldLabel="__('modules.accountSettings.companyWebsite')"
            fieldPlaceholder="e.g. https://www.spacex.com/" fieldRequired="false" fieldName="company_website"
            fieldId="company
            _website" :fieldValue="$mail->company_website" />
    </div>
    <div class="col-lg-12">
        <div class="form-group my-3">
            <x-forms.label class="my-3" fieldId="about"
                :fieldLabel="__('recruit::modules.setting.aboutCompany')">
            </x-forms.label>
            <div id="about" class="about-height">{!! $general->about !!}</div>
            <textarea name="about" id="about-text" class="d-none"></textarea>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-group my-3">
            <x-forms.label class="my-3" fieldId="description"
                :fieldLabel="__('recruit::modules.setting.legalNote')">
            </x-forms.label>
            <div id="job_description" class="about-height">{!! $mail->legal_term !!}</div>
            <textarea name="description" id="description-text" class="d-none"></textarea>
        </div>
    </div>


    <div class="col-md-12 mt-4">
        <h4 class="card-title mb-4">@lang('recruit::modules.setting.mailSettings')</h4>
    </div>

    <div id="mail-setting" class="col-lg-12">
        <label>@lang('recruit::modules.setting.sendmail')</label>
        <div class="d-flex">
            @foreach ($mail->mail_setting as $item)
                <x-forms.checkbox :checked="($item['status'] == 'true')" :fieldLabel="ucwords($item['name'])"
                    fieldName="checkBoardColumn[]" class="module_checkbox" :fieldId="'column-name-'.$item['id']" :fieldValue="$item['id']" />
            @endforeach
        </div>
    </div>

    <div class="col-lg-6 mt-3">
        <x-forms.text class="mr-0 mr-lg-2 mr-md-2" :fieldLabel="__('recruit::modules.setting.applicationRes')"
            fieldRequired="true" fieldName="application_restriction"
            fieldId="application_restriction" :fieldValue="$mail->application_restriction" />
    </div>

    <hr id="hr-content" class="mt-3">
    <div class="col-md-12 ml-0 row">
        <x-forms.radio fieldId="bgimage" :fieldLabel="__('recruit::modules.setting.backimg')"
            fieldName="type" fieldValue="bg-image"
            :checked="($mail)?$mail->type == 'bg-image' : ''">
        </x-forms.radio>
        <x-forms.radio fieldId="bgcolor" :fieldLabel="__('recruit::modules.setting.backcolor')"
            fieldValue="bg-color" fieldName="type"
            :checked="($mail)?$mail->type == 'bg-color' : ''">
        </x-forms.radio>
    </div>

    <div class="col-lg-12">
        @php
            $img = 'public/img/image.bg';
        @endphp
        <x-forms.file id="bg-image" allowedFileExtensions="png jpg jpeg" class="mr-0 mr-lg-2 mr-md-2 cropper"
            :fieldLabel="__('recruit::modules.setting.Backgroundimage').' '.__('recruit::modules.setting.bestview')"
            :fieldValue="($mail)?$mail->background_image_url : $img" fieldName="image"
            fieldId="input-file-now">
        </x-forms.file>
    </div>

    <div class="col-lg-6" id="bg-color">
        <div class="form-group my-3">
            <x-forms.label fieldId="logo_background_color" fieldRequired="true"
                :fieldLabel="__('recruit::modules.setting.Backgroundcolor')">
            </x-forms.label>
            <x-forms.input-group class="color-picker">
                <input type="text" class="form-control height-35 f-14"
                    value="{{ ($mail)?$mail->background_color  : '' }}" id="logo_background_color"
                    placeholder="{{ __('placeholders.colorPicker') }}" name="logo_background_color">

                <x-slot name="append">
                    <span class="input-group-text height-35 colorpicker-input-addon"><i></i></span>
                </x-slot>
            </x-forms.input-group>
        </div>
    </div>
</div>

<!-- Buttons Start -->
<div class="w-100 border-top-grey set-btns">
    <x-setting-form-actions>
        <x-forms.button-primary id="submitJobDataForm" class="mr-3" icon="check">@lang('app.save')
        </x-forms.button-primary>
    </x-setting-form-actions>
</div>
<!-- Buttons End -->

<script>
    $(document).ready(function() {
        $('.color-picker').colorpicker();

        $('.dropify').dropify({
            messages: {
                default: '@lang("app.dragDrop")',
                replace: '@lang("app.dragDropReplace")',
                remove: '@lang("app.remove")',
                error: '@lang("app.largeFile")'
            }
        });

        @if ($mail->type == 'bg-color')
            $("#bg-image").hide();
            $("#bg-color").show();
        @else
            $("#bg-color").hide();
            $("#bg-image").show();
        @endif

        $('body').on('click', '#bgimage', function() {
            $("#bg-image").show();
            $("#bg-color").hide();
        });

        $('body').on('click', '#bgcolor', function() {
            $("#bg-image").hide();
            $("#bg-color").show();
        });

        quillImageLoad('#job_description');
        quillImageLoad('#about');

        $('body').on('click', '#submitJobDataForm', function() {
            var jobDescription = document.getElementById('job_description').children[0].innerHTML;
            document.getElementById('description-text').value = jobDescription;

            var about = document.getElementById('about').children[0].innerHTML;
            document.getElementById('about-text').value = about;

            const url = "{{ route('recruit-settings.update', $mail->id) }}";

            $.easyAjax({
                url: url,
                container: '#editSettings',
                type: "POST",
                disableButton: true,
                blockUI: true,
                buttonSelector: "#save-job",
                file: true,
                data: $('#editSettings').serialize(),
                success: function(response) {
                    if (response.status == 'success') {
                    }
                }
            });
        });

        $('.cropper').on('dropify.fileReady', function(e) {
            var inputId = $(this).find('input').attr('id');
            var url = "{{ route('cropper', ':element') }}";
            url = url.replace(':element', inputId);
            $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_LG, url);
        });

        $('#career_site').click(function() {
            var career_site = 'no';
            if ($(this).prop("checked") == true) {
                career_site = 'yes';
            }
            $.easyAjax({
                url: "{{ route('recruit-settings.store') }}",
                type: "POST",
                data: {
                    '_token': '{{ csrf_token() }}',
                    'career_site': career_site
                }
            })
        });

    });
</script>


