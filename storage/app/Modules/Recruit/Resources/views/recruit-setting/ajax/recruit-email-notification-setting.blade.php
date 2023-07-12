<div class="col-xl-8 col-lg-12 col-md-12 ntfcn-tab-content-left w-100 p-4 ">

    <h4 class="f-16 text-capitalize f-w-500 text-dark-grey">@lang("modules.emailSettings.notificationTitle")</h4>
    @foreach ($emailSettings as $emailSetting)
        <div class="mb-3 d-flex">
            <x-forms.checkbox :checked="$emailSetting->send_email == 'yes'"
                :fieldLabel="__('recruit::modules.emailNotification.'.str_slug($emailSetting->setting_name))"
                fieldName="send_email[]" :fieldId="'send_email_'.$emailSetting->id" :fieldValue="$emailSetting->id" />
        </div>
    @endforeach
</div>


<!-- Buttons Start -->
<div class="w-100 border-top-grey set-btns">
    <x-setting-form-actions>
        <x-forms.button-primary id="save-email-form" icon="check">@lang('app.save')</x-forms.button-primary>
    </x-setting-form-actions>
</div>
<!-- Buttons End -->
<script>


    $('body').on('click', '#save-email-form', function() {
        var url = "{{ route('notification-settings.update','$emailSettings->id') }}";

        $.easyAjax({
            url: url,
            type: "POST",
            container: '#editSettings',
            blockUI: true,
            messagePosition: "inline",
            data: $('#editSettings').serialize(),
            success: function(response) {
                if (response.status == 'success') {
                    location.reload();
                }
            }
        })
    });

</script>
