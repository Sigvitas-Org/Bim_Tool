@extends('recruit::layouts.front')
<!-- Header Start -->
<style>
    .required:after {
        content: " *";
        color: red;
    }
    .front-background{
        background-color: #F2F4F7;
    }
</style>
@section('content')

    <header class="sticky-top bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12 py-2 login_header d-flex justify-content-between align-items-center">
                    <a href="{{ url('/job-opening') }}">
                        <img class="mr-2 rounded" src="{{ $global->logo_url }}">
                    </a>
                    <h3 class="mb-0 pl-1 ">{{ $companyName }}</h3>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Content Start -->
    <form id="createForm" method="POST">
        @csrf
        <input type="hidden" name="job_id" value="{{ $job->id }}">
        <input type="hidden" name="location_id" value="{{ $job->address[0]->id }}">
        <section class="front-background py-5">
            <div class="container">
                <!-- Overview Start -->
                <div class="row">
                    <div class="col-md-12 mt-3">
                        <div class="add-client bg-white rounded">
                            <h4 class="mb-0 p-20 f-21 font-weight-normal text-capitalize border-bottom-grey">
                                @lang('recruit::modules.front.personalInformation')</h4>
                            <div class="row p-20">
                                <div class="col-md-4">
                                    <div class="form-group my-3">
                                        <x-forms.text fieldId="full_name"
                                            :fieldLabel="__('recruit::modules.front.fullName')" fieldName="full_name"
                                            fieldRequired="true" :fieldPlaceholder="__('placeholders.name')">
                                        </x-forms.text>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group my-3">
                                        <x-forms.text fieldId="email" :fieldLabel="__('recruit::modules.front.email')"
                                            fieldName="email" fieldRequired="true"
                                            :fieldPlaceholder="__('placeholders.email')">
                                        </x-forms.text>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group my-3">
                                        <x-forms.tel fieldId="phone" fieldRequired="true" :fieldLabel="__('app.mobile')"
                                            fieldName="phone" fieldPlaceholder="e.g. 987654321"></x-forms.tel>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <x-forms.label class="my-3" fieldId="selectEmployeeData" :fieldLabel="__('recruit::modules.jobApplication.skills')">
                                    </x-forms.label>
                                    <x-forms.input-group>
                                        <select class="form-control multiple-users" multiple name="skill_id[]" id="selectEmployeeData"
                                            data-live-search="true" data-size="8">
                                            @forelse ($skills as $skill)
                                                <option
                                                    data-content="<span class='badge badge-pill badge-light border'><div class='d-inline-block mr-1'></div> {{ ucfirst($skill->name) }}</span>"
                                                    value="{{ $skill->id }}">{{ ucwords($skill->name) }}</option>
                                            @empty
                                                <option value=""> @lang('recruit::messages.noSkillAdded')</option>
                                            @endforelse
                                        </select>
                                    </x-forms.input-group>
                                </div>

                                @if($job->is_dob_require)
                                    <div class="col-md-4">
                                        <x-forms.text class="date-picker" :fieldRequired="true" :fieldLabel="__('recruit::modules.jobApplication.dateOfBirth')" fieldName="date_of_birth"
                                        fieldId="date_of_birth" :fieldPlaceholder="__('placeholders.date')" fieldValue="" />
                                    </div>
                                @endif
                                @if($job->is_gender_require)
                                    <div class="col-md-4">
                                        <x-forms.select fieldId="gender" fieldRequired="true" :fieldLabel="__('recruit::modules.jobApplication.gender')"
                                        fieldName="gender">
                                            <option value="">--</option>
                                            <option value="male">@lang('app.male')</option>
                                            <option value="female">@lang('app.female')</option>
                                            <option value="others">@lang('app.others')</option>
                                        </x-forms.select>
                                    </div>
                                @endif

                                <div class="col-md-4">
                                    <x-forms.select fieldId="total_experience" :fieldLabel="__('recruit::modules.jobApplication.experience')"
                                    fieldName="total_experience">
                                        <option value="">--</option>
                                        <option value="fresher">@lang('recruit::modules.jobApplication.fresher')</option>
                                        <option value="1-2">1-2 @lang('recruit::modules.jobApplication.years')</option>
                                        <option value="3-4">3-4 @lang('recruit::modules.jobApplication.years')</option>
                                        <option value="5-6">5-6 @lang('recruit::modules.jobApplication.years')</option>
                                        <option value="7-8">7-8 @lang('recruit::modules.jobApplication.years')</option>
                                        <option value="9-10">9-10 @lang('recruit::modules.jobApplication.years')</option>
                                        <option value="11-12">11-12 @lang('recruit::modules.jobApplication.years')</option>
                                        <option value="13-14">13-14 @lang('recruit::modules.jobApplication.years')</option>
                                        <option value="over-15">@lang('recruit::modules.jobApplication.over15')</option>
                                    </x-forms.select>
                                </div>

                                <div class="col-md-4">
                                    <x-forms.text fieldId="current_location" :fieldLabel="__('recruit::modules.jobApplication.currentLocation')"
                                    fieldName="current_location"
                                    :fieldPlaceholder="__('recruit::modules.jobApplication.currentLocationPlaceholder')">
                                    </x-forms.text>
                                </div>
                                <div class="col-md-4">
                                    <x-forms.label class="my-3" fieldId="current_ctc" :fieldLabel="__('recruit::modules.jobApplication.currentCtc') . ' ' . $global->currency->currency_symbol"></x-forms.label>
                                    <x-forms.input-group>
                                        <input type="number" min="0" class="form-control height-35 f-14"
                                            name="current_ctc" placeholder="@lang('recruit::modules.jobApplication.currentCtcPlaceHolder')">
                                    </x-forms.input-group>
                                </div>

                                <div class="col-md-4">
                                    <x-forms.label class="my-3" fieldId="expected_ctc" :fieldLabel="__('recruit::modules.jobApplication.expectedCtc') . ' ' . $global->currency->currency_symbol"></x-forms.label>
                                    <x-forms.input-group>
                                        <input type="number" min="0" class="form-control height-35 f-14"
                                            name="expected_ctc" placeholder="@lang('recruit::modules.jobApplication.expectedCtcPlaceHolder')">
                                    </x-forms.input-group>
                                </div>

                                <div class="col-md-4">
                                    <x-forms.select fieldId="notice_period" :fieldLabel="__('recruit::modules.jobApplication.noticePeriod')"
                                    fieldName="notice_period">
                                        <option value="">--</option>
                                        <option value="15">15 @lang('recruit::modules.jobApplication.days')</option>
                                        <option value="30">30 @lang('recruit::modules.jobApplication.days')</option>
                                        <option value="45">45 @lang('recruit::modules.jobApplication.days')</option>
                                        <option value="60">60 @lang('recruit::modules.jobApplication.days')</option>
                                        <option value="75">75 @lang('recruit::modules.jobApplication.days')</option>
                                        <option value="90">90 @lang('recruit::modules.jobApplication.days')</option>
                                        <option value="over-90">@lang('recruit::modules.jobApplication.over90')</option>
                                    </x-forms.select>
                                </div>

                                <div class="col-md-4">
                                    <x-forms.select fieldId="source" fieldName="source"
                                        :fieldLabel="__('recruit::modules.front.source')">
                                        <option value="">--</option>
                                        @foreach ($applicationSources as $source)
                                            <option value="{{$source->id}}"> {{ ucfirst($source->application_source) }}</option>
                                        @endforeach
                                    </x-forms.select>
                                    </div>
                                </div>
                                <div class="row">
                                    @if($job->is_resume_require)
                                        <div class="col-md-6">
                                                <div class="col-md-10">
                                                    <x-forms.label class="" fieldRequired="true" fieldId="resume" :fieldLabel="__('recruit::modules.front.resume')"
                                                    ></x-forms.label>
                                                <div class="form-group custom-file">
                                                    <input type="file" class="custom-file-input" name="resume" accept="png jpg jpeg pdf">
                                                    <x-forms.label fieldId="resume" fieldRequired="false"
                                                    :fieldLabel="__('recruit::app.menu.add') . ' ' .__('recruit::app.jobApplication.resume')"
                                                    class="custom-file-label"></x-forms.label>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if($job->is_photo_require)
                                        <div class="col-md-6">
                                            <div class="col-md-10">
                                                <x-forms.label class="" fieldRequired="true" fieldId="photo" :fieldLabel="__('recruit::modules.front.photo')"
                                                ></x-forms.label>
                                                <div class="form-group custom-file">
                                                    <input type="file" class="custom-file-input" name="photo" accept="image/jpeg, image/jpg, image/png">
                                                    <x-forms.label fieldId="photo" fieldRequired="false"
                                                        :fieldLabel="__('recruit::app.menu.add') . ' ' .__('recruit::modules.front.photo')"
                                                        class="custom-file-label"></x-forms.label>
                                                    </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-12 mt-4">
                                    <x-forms.textarea class="mr-0 mr-lg-2 mr-md-2"
                                    :fieldLabel="__('recruit::modules.jobApplication.coverLetter')" fieldName="cover_letter"
                                        fieldId="cover_letter"
                                        :fieldPlaceholder="__('recruit::modules.jobApplication.coverLetter')">
                                    </x-forms.textarea>
                                </div>
                                @if(!is_null($recruitSetting->legal_term))
                                <h4 class="mb-0 p-20 f-21 font-weight-normal text-capitalize border-top-grey">
                                    @lang(('recruit::modules.front.termsCondition')) </h4>
                                <div class="col-md-12 p-20 mb-0">
                                    <p class="text-dark-grey mb-0 text-justify">{!! $recruitSetting->legal_term !!}</p>
                                </div>
                                <div class="col-md-12 ml-3">
                                    <x-forms.checkbox :fieldLabel="__('recruit::modules.front.agreeCondition')"
                                        fieldName="term_agreement" fieldId="term_agreement" />
                                </div>
                                @endif
                                <div class="col-md-12 mt-3 mr-4">

                                    <x-form-actions>
                                        <x-forms.button-primary id="save-form" class="mr-3" icon="check">
                                            @lang('recruit::modules.front.apply')
                                        </x-forms.button-primary>
                                        <x-forms.button-cancel :link="route('job_opening')" class="border-0">
                                            @lang('app.cancel')
                                        </x-forms.button-cancel>
                                    </x-form-actions>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- Overview End -->
            </div>
        </section>
    </form>
@endsection
<!-- Content End -->
@push('scripts')

    <script>

        $("#selectEmployeeData").selectpicker({
            actionsBox: true,
            selectAllText: "{{ __('modules.permission.selectAll') }}",
            deselectAllText: "{{ __('modules.permission.deselectAll') }}",
            multipleSeparator: " ",
            selectedTextFormat: "count > 8",
            countSelectedText: function(selected, total) {
                return selected + " {{ __('app.membersSelected') }} ";
            }
        });

        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });

        $('body').on('click', '#save-form', function() {

            $.easyAjax({
                url: "{{ route('save_application') }}",
                container: '#createForm',
                type: "POST",
                disableButton: true,
                blockUI: true,
                file: true,
                redirect: true,
                success: function(response) {
                     window.location.href = response.redirectUrl;
                },

            })
        });

        datepicker('#date_of_birth', {
            position: 'bl',
            maxDate: new Date(),

            ...datepickerConfig
        });

    </script>
@endpush
