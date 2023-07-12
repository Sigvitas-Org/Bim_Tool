@extends('layouts.app')

@section('content')

    <!-- SETTINGS START -->
    <div class="w-100 d-flex ">

        <x-setting-sidebar :activeMenu="$activeSettingMenu"/>

        <x-setting-card>

            <x-slot name="header">
                <div class="s-b-n-header" id="tabs">
                    <h2 class="mb-0 p-20 f-21 font-weight-normal text-capitalize border-bottom-grey">
                        @lang($pageTitle)</h2>
                </div>
            </x-slot>

            <div class="col-lg-12 col-md-12 ntfcn-tab-content-left w-100 p-4 ">

                <x-alert type="secondary">
                    <ul>
                        <li class="py-2"> &bull; <b>@lang('app.storageSetting.local')</b> @lang('app.storageSetting.localStorageNote')</li>
                        <li> &bull; @lang('app.storageSetting.storageSuggestion')</li>
                    </ul>
                </x-alert>


                <div class="row">

                        <div class="col-lg-12">
                            <x-forms.select fieldId="storage" :fieldLabel="__('app.storageSetting.selectStorage')"
                                            fieldName="storage">
                                <option value="local"
                                        @if (isset($localCredentials) && $localCredentials->status == 'enabled') selected @endif>@lang('app.storageSetting.local')</option>
                                <option value="aws_s3"
                                        @if (isset($awsCredentials) && $awsCredentials->status == 'enabled') selected @endif>@lang('app.storageSetting.aws')</option>
                                <option value="digitalocean"
                                        @if (isset($digitalOceanCredentials) && $digitalOceanCredentials->status == 'enabled') selected @endif>
                                    DigitalOcean Spaces
                                </option>
                            </x-forms.select>

                        </div>

                        @include('storage-settings.aws_s3')
                        @include('storage-settings.digitalocean')

                    </div>
            </div>

            <x-slot name="action">
                <!-- Buttons Start -->
                <div class="w-100 border-top-grey">

                    <x-setting-form-actions>
                        <x-forms.button-primary id="save-form" class="mr-3" icon="check">@lang('app.save')
                        </x-forms.button-primary>

                        <x-forms.button-secondary id="test-aws" icon="location-arrow" class="aws-form mr-3">
                            @lang('app.storageSetting.testAws')
                        </x-forms.button-secondary>

                        <x-forms.button-secondary id="test-aws" icon="location-arrow" class="digitalocean-form mr-3">
                            @lang('app.storageSetting.testDigitalocean')
                        </x-forms.button-secondary>

                        @if($localFilesCount>0)
                            <x-forms.button-secondary id="local-to-aws" icon="location-arrow" class="aws-form">
                                @lang('app.moveAws')
                            </x-forms.button-secondary>
                        @endif
                    </x-setting-form-actions>

                </div>
                <!-- Buttons End -->
            </x-slot>

        </x-setting-card>

    </div>
    <!-- SETTINGS END -->
@endsection

@push('scripts')
    <script>

        let CHANGE_DETECTED = false;
        $('.field').each(function () {
            let elem = $(this);
            CHANGE_DETECTED = false

            // Look for changes in the value
            elem.bind("change keyup paste", function (event) {
                CHANGE_DETECTED = true;
            });
        });
        $(function () {
            const type = $('#storage').val();
            toggleAwsLocal(type);
        });

        function toggleAwsLocal(type) {
            if (type === 'aws_s3') {
                $('.aws-form').css('display', 'block');
                $('.digitalocean-form').css('display', 'none');
            } else if (type === 'digitalocean') {
                $('.digitalocean-form').css('display', 'block');
                $('.aws-form').css('display', 'none');
            } else if (type === 'local') {
                $('.aws-form,.digitalocean-form').css('display', 'none');
            }
        }

        $('#storage').on('change', function (event) {
            event.preventDefault();
            const type = $(this).val();
            if (type === 'aws_s3') {
                CHANGE_DETECTED = true;
            }
            toggleAwsLocal(type);
        });

        $('body').on('click', '#test-aws', function () {
            // Save the AWS credentials when changed detected for test button click
            if (CHANGE_DETECTED) {
                submitForm();
            }
            let url = "{{ route('storage-settings.aws_test_modal',':type') }}";
            url = url.replace(':type', $('#storage').val());
            $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_LG, url);
        });


        $('#save-form').click(function () {
            submitForm();
        });

        function submitForm() {
            CHANGE_DETECTED = false;
            const data = ($('#editSettings').serialize()).replace("_method=PUT", "_method=POST");
            $.easyAjax({
                url: "{{ route('storage-settings.store') }}",
                container: '#editSettings',
                type: "POST",
                disableButton: true,
                blockUI: true,
                buttonSelector: "#save-form",
                data: data,
            })
        }

        $('body').on('click', '#local-to-aws', function () {
            if (CHANGE_DETECTED) {
                submitForm();
            }
            const url = "{{ route('storage-settings.aws_local_to_aws_modal') }}";

            $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_LG, url);
        });

        init()
    </script>
@endpush
