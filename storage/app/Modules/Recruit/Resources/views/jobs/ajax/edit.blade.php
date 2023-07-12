@php
    $addPermission = user()->permission('add_job');
    $addDepartmentPermission = user()->permission('add_department');
    $skillPermission = user()->permission('manage_skill');
    $addRecruiterPermission = user()->permission('add_recruiter');
@endphp
<div class="row">
    <div class="col-sm-12">
        <x-form id="save-job-data-form" method="PUT">
            <div class="add-client bg-white rounded">
                <h4 class="mb-0 p-20 f-21 font-weight-normal text-capitalize border-bottom-grey">
                    @lang('recruit::modules.job.job') @lang('app.details')</h4>
                <div class="row p-20">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-md-3">
                                <x-forms.text fieldId="heading" :fieldLabel="__('recruit::modules.job.jobTitle')"
                                    fieldName="title" :fieldValue="$job->title" fieldRequired="true"
                                    :fieldPlaceholder="__('recruit::modules.job.jobTitle')">
                                </x-forms.text>
                            </div>

                            <div class="col-md-3 department">
                                <x-forms.label class="mt-3" fieldId="department_id" :fieldLabel="__('app.department')"
                                fieldRequired="true">
                                </x-forms.label>
                                <x-forms.input-group>
                                    <x-forms.input-group>
                                        <select class="form-control select-picker" name="department_id"
                                            id="department_id" data-live-search="true">
                                            <option value="">--</option>
                                            @foreach ($departments as $team)
                                                <option @if ($job->department_id == $team->id) selected @endif value="{{ $team->id }}">{{ $team->team_name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($addDepartmentPermission == 'all' || $addDepartmentPermission == 'added')
                                            <x-slot name="append">
                                                <button type="button"
                                                    class="btn btn-outline-secondary border-grey department-setting">@lang('app.add')</button>
                                            </x-slot>
                                        @endif
                                    </x-forms.input-group>
                                </x-forms.input-group>
                            </div>

                            <div class="col-md-3 skill">
                                <x-forms.label class="mt-3" fieldRequired="true" fieldId="selectEmployeeData" :fieldLabel="__('recruit::modules.job.skill')"
                                    >
                                </x-forms.label>
                                <x-forms.input-group>
                                    <select class="form-control multiple-users" multiple name="skill_id[]"
                                        id="selectEmployeeData" data-live-search="true" data-size="8">
                                        @foreach ($skills as $skill)
                                            <option
                                            @if(in_array($skill->id, $selected_skills)) selected @endif
                                            data-content="<span class='badge badge-pill badge-light border'><div class='d-inline-block mr-1'></div> {{ ucfirst($skill->name) }}</span>"
                                                value="{{ $skill->id }}">{{ ucwords($skill->name) }}</option>
                                        @endforeach
                                    </select>
                                    @if ($skillPermission == 'all')
                                        <x-slot name="append">
                                            <button type="button"
                                                class="btn btn-outline-secondary border-grey skill-setting">@lang('app.add')</button>
                                        </x-slot>
                                    @endif
                                </x-forms.input-group>
                            </div>

                            <div class="col-md-3 location">
                                <x-forms.label fieldRequired="true" class="mt-3" fieldId="selectEmployee" :fieldLabel="__('app.location')"
                                >
                             </x-forms.label>
                                <x-forms.input-group>
                                    <select class="form-control select-picker" multiple name="location_id[]"
                                        id="selectEmployee" data-live-search="true">
                                        <option value="">--</option>
                                        @foreach ($locations as $location)
                                            <option @if(in_array($location->id, $selected_locations)) selected @endif  data-content="<span class='badge badge-pill badge-light border'><div class='d-inline-block mr-1'></div> {{ ucfirst($location->location) }}</span>" value="{{ $location->id }}">{{ ucfirst($location->location) }}</option>
                                        @endforeach
                                    </select>
                                </x-forms.input-group>
                            </div>

                            <div class="col-md-3">
                                <x-forms.label class="mt-3" fieldRequired="true" fieldId="selectStages" :fieldLabel="__('recruit::modules.jobApplication.stages')"
                                    >
                                </x-forms.label>
                                <x-forms.input-group>
                                    <select class="form-control multiple-users" multiple name="stage_id[]"
                                        id="selectStages" data-live-search="true" data-size="8">
                                        @foreach ($stages as $stage)
                                            <option
                                                @if(in_array($stage->id, $jobInterviews)) selected @endif
                                                data-content="<span class='badge badge-pill badge-light border'><div class='d-inline-block mr-1'></div> {{ ucfirst($stage->name) }}</span>"
                                                value="{{ $stage->id }}">{{ ucwords($stage->name) }}</option>
                                        @endforeach
                                    </select>
                                    @if ($addPermission == 'all' || $addPermission == 'added')
                                        <x-slot name="append">
                                            <button type="button"
                                                class="btn btn-outline-secondary border-grey interview-stage">@lang('app.add')</button>
                                        </x-slot>
                                    @endif
                                </x-forms.input-group>
                            </div>

                            <div class="col-md-3">
                                <x-forms.datepicker fieldId="start_date" fieldRequired="true"
                                    :fieldLabel="__('modules.projects.startDate')" fieldName="start_date" :fieldValue="$job->start_date->format($global->date_format)"
                                    :fieldPlaceholder="__('placeholders.date')" />
                            </div>

                            <div class="col-md-3" id="endDateBox">
                                <x-forms.datepicker fieldId="end_date" fieldRequired="true"
                                    :fieldLabel="__('recruit::modules.job.endDate')" fieldName="end_date" :fieldValue="
                                    $job->end_date ? $job->end_date->format($global->date_format) : ''" :fieldPlaceholder="__('placeholders.date')" />
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="form-group">
                                    <div class="d-flex mt-5">
                                        <x-forms.checkbox fieldId="without_end_date"
                                            :fieldLabel="__('recruit::modules.job.noEndDate')" :checked="$noEndDate" fieldName="without_end_date" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 position">
                                <x-forms.number fieldId="total_positions" :fieldValue="$job->total_positions" :fieldLabel="__('recruit::modules.job.totalOpening')"
                                fieldName="total_positions" fieldRequired="true">
                                </x-forms.text>
                            </div>
                            <div class="col-md-3">
                                <x-forms.select fieldId="status" :fieldLabel="__('app.status')" fieldName="status"
                                    search="true">
                                    <option value=""> -- </option>
                                    <option  @if($job->status == 'open') selected @endif value="open" data-content="<i class='fa fa-circle mr-2 text-light-green'></i> @lang('app.open')"></option>
                                    <option  @if($job->status == 'closed') selected @endif value="closed" data-content="<i class='fa fa-circle mr-2 text-red'></i> @lang('app.closed')"></option>
                                </x-forms.select>
                            </div>

                            <div class="col-md-3 recruiter">
                                <x-forms.label fieldRequired="true" class="mt-3" fieldId="recruiter" :fieldLabel="__('recruit::app.job.recruiter')"
                                   >
                                </x-forms.label>
                                <x-forms.input-group>
                                    <select class="form-control select-picker" name="recruiter"
                                        id="recruiter" data-live-search="true">
                                        <option value="">--</option>
                                        @foreach ($employees as $employee)
                                            <option @if($job->recruiter_id == $employee->user->id ) selected @endif data-content="<div class='d-inline-block mr-1'><img class='taskEmployeeImg rounded-circle' src='{{ $employee->user->image_url }}' ></div> {{ ucfirst($employee->user->name) }}" value="{{ $employee->user->id }}">{{ ucfirst($employee->user->name) }}</option>
                                        @endforeach
                                    </select>
                                    @if ($addRecruiterPermission == 'all')
                                        <x-slot name="append">
                                            <button type="button"
                                                class="btn btn-outline-secondary border-grey recruiter-add">@lang('app.add')</button>
                                        </x-slot>
                                    @endif
                                </x-forms.input-group>
                            </div>

                            <div class="col-md-3 jobtype">
                                <x-forms.label fieldRequired="true" class="mt-3" fieldId="job_type" :fieldLabel="__('recruit::app.job.jobtype')"
                                   >
                                </x-forms.label>
                                <x-forms.input-group>
                                    <select class="form-control select-picker" name="job_type_id"
                                        id="job-type" data-live-search="true">
                                        <option value="">--</option>
                                        @foreach ($jobTypes as $jobType)
                                            <option @if($job->job_type_id == $jobType->id) selected @endif value="{{ $jobType->id }}">{{ $jobType->job_type }}</option>
                                        @endforeach
                                    </select>
                                    <x-slot name="append">
                                        <button type="button"
                                            class="btn btn-outline-secondary border-grey job-type">@lang('app.add')</button>
                                    </x-slot>
                                </x-forms.input-group>
                            </div>

                            <div class="col-md-3 work_experience">
                                <x-forms.label fieldRequired="true" class="mt-3" fieldId="work_experience" :fieldLabel="__('recruit::app.job.workexperience')"
                                   >
                                </x-forms.label>
                                <x-forms.input-group>
                                    <select class="form-control select-picker" name="work_experience"
                                        id="work_experience" data-live-search="true">
                                        <option value="">--</option>
                                        @foreach ($workExperience as $key => $experience)
                                            <option @if($job->work_experience_id == $experience->id) selected @endif  value="{{ $experience->id }}">{{ ucfirst($experience->work_experience) }}</option>
                                        @endforeach
                                    </select>
                                    <x-slot name="append">
                                        <button type="button"
                                            class="btn btn-outline-secondary border-grey work-experience">@lang('app.add')</button>
                                    </x-slot>
                                </x-forms.input-group>
                            </div>

                            <div class="col-md-3 paytype">
                                <x-forms.label fieldRequired="true" class="mt-3" fieldId="paytype" :fieldLabel="__('recruit::app.job.paytype')"
                                   >
                                </x-forms.label>
                                <x-forms.input-group>
                                    <select class="form-control select-picker" name="paytype"
                                        id="paytype" data-live-search="true">
                                        <option value="">--</option>
                                        <option @if($job->pay_type == 'Range' ) selected @endif value="Range">{{ __('recruit::app.job.range') }}</option>
                                        <option @if($job->pay_type == 'Starting' ) selected @endif value="Starting">{{ __('recruit::app.job.Startingamt') }}</option>
                                        <option @if($job->pay_type == 'Maximum' ) selected @endif value="Maximum">{{ __('recruit::app.job.Maximumamt') }}</option>
                                        <option @if($job->pay_type == 'Exact Amount' ) selected @endif value="Exact Amount">{{ __('recruit::app.job.exactamt') }}</option>

                                    </select>
                                </x-forms.input-group>
                            </div>


                            <div class="col-md-6" id="amount_field">
                                <div class="row">
                                    <div class="col-md-6" id="start_amt">

                                        <x-forms.label class="my-3" fieldRequired="true" fieldId="startamtlabel" :fieldLabel="__('recruit::app.job.minsal')"></x-forms.label>
                                        <x-forms.input-group>
                                            <input type="number" min="0" class="form-control height-35 f-14"
                                                name="start_amount" value="{{ $job->start_amount }}" id="start_amount">
                                        </x-forms.input-group>

                                    </div>
                                    <div class="col-md-6" id="end_amt">
                                         <x-forms.label class="my-3" fieldRequired="true" fieldId="endamtlabel" :fieldLabel="__('recruit::app.job.maxsal') . ' ' . $global->currency->currency_symbol"></x-forms.label>
                                        <x-forms.input-group>
                                            <input type="number" value="{{ $job->end_amount }}" min="0" class="form-control height-35 f-14"
                                                name="end_amount" id="end_amount" required>
                                        </x-forms.input-group>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 pay_according" id="payaccording">
                                <x-forms.label fieldRequired="true" class="mt-3" fieldId="pay_according" :fieldLabel="__('recruit::app.job.payaccording')"
                                   >
                                </x-forms.label>
                                <x-forms.input-group>
                                    <select class="form-control select-picker" name="pay_according"
                                        id="pay_according" data-live-search="true">
                                        <option value="">--</option>
                                        <option @if($job->pay_according == 'hour' ) selected @endif value="hour">{{ __('recruit::app.job.hour') }}</option>
                                        <option @if($job->pay_according == 'day' ) selected @endif value="day">{{ __('recruit::app.job.day') }}</option>
                                        <option @if($job->pay_according == 'week' ) selected @endif value="week">{{ __('recruit::app.job.week') }}</option>
                                        <option @if($job->pay_according == 'month' ) selected @endif value="month">{{ __('recruit::app.job.month') }}</option>
                                        <option @if($job->pay_according == 'year' ) selected @endif value="year">{{ __('recruit::app.job.year') }}</option>
                                    </select>
                                </x-forms.input-group>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group my-3">
                                    <x-forms.label class="my-3" fieldId="description-textt" :fieldValue="$job->job_description"
                                        :fieldLabel="__('recruit::modules.job.jobDescription')">
                                    </x-forms.label>
                                    <div id="job_description" >{!! $job->job_description !!}</div>
                                    <textarea name="job_description" id="description-text" class="d-none"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <x-forms.text fieldId="meta-title" :fieldLabel="__('recruit::modules.job.metaTitle')"
                                    fieldName="meta_title" fieldValue="{{ $job->meta_details ? $job->meta_details['title']: ''}}"
                                    :fieldPlaceholder="__('recruit::modules.job.metaTitle')">
                                </x-forms.text>
                            </div>
                            <div class="col-md-6">
                                <x-forms.textarea class="mr-0 mr-lg-2 mr-md-2"
                                    :fieldLabel="__('recruit::modules.job.metaDescription')" fieldName="meta_description"
                                    fieldId="meta_description" fieldValue="{{ $job->meta_details ? $job->meta_details['description'] : '' }}" :fieldPlaceholder="__('recruit::modules.job.metaDescription')">
                                </x-forms.textarea>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group my-3">
                            <x-forms.label class="my-3" fieldId=""
                                     :fieldLabel="__('recruit::modules.job.requiredColumn')">
                                    </x-forms.label>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="form-group">
                                    <div class="d-flex ">
                                        <x-forms.checkbox :fieldLabel="__('recruit::modules.job.photoRequired')" fieldName="is_photo_require"
                                            fieldId="is_photo_require" :checked="$job->is_photo_require" fieldValue="1" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="form-group">
                                    <div class="d-flex ">
                                        <x-forms.checkbox :fieldLabel="__('recruit::modules.job.resumeRequired')" fieldName="is_resume_require"
                                            fieldId="is_resume_require" :checked="$job->is_resume_require" fieldValue="1" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="form-group">
                                    <div class="d-flex ">
                                        <x-forms.checkbox :fieldLabel="__('recruit::modules.jobApplication.dateOfBirth')" fieldName="is_dob_require"
                                            fieldId="is_dob_require" :checked="$job->is_dob_require" fieldValue="1" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="form-group">
                                    <div class="d-flex ">
                                        <x-forms.checkbox :fieldLabel="__('recruit::modules.jobApplication.gender')" fieldName="is_gender_require"
                                            fieldId="is_gender_require" :checked="$job->is_gender_require" fieldValue="1" />
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <x-form-actions>
                    <x-forms.button-primary id="save-job" class="mr-3" icon="check">@lang('app.save')
                    </x-forms.button-primary>
                    <x-forms.button-cancel :link="route('jobs.index')" class="border-0">@lang('app.cancel')
                    </x-forms.button-cancel>
                </x-form-actions>
            </div>
        </x-form>

    </div>
</div>

<script>
    $(document).ready(function() {
        datepicker('#start_date', {
            position: 'bl',
            ...datepickerConfig
        });
        datepicker('#end_date', {
            position: 'bl',
            ...datepickerConfig
        });
        quillImageLoad('#job_description');
        $("#selectEmployee").selectpicker({
            actionsBox: true,
            selectAllText: "{{ __('modules.permission.selectAll') }}",
            deselectAllText: "{{ __('modules.permission.deselectAll') }}",
            multipleSeparator: " ",
            selectedTextFormat: "count > 8",
            countSelectedText: function(selected, total) {
                return selected + " {{ __('recruit::messages.skillsSelected') }} ";
            }
        });

        $("#selectEmployeeData").selectpicker({
            actionsBox: true,
            selectAllText: "{{ __('modules.permission.selectAll') }}",
            deselectAllText: "{{ __('modules.permission.deselectAll') }}",
            multipleSeparator: " ",
            selectedTextFormat: "count > 8",
            countSelectedText: function(selected, total) {
                return selected + " {{ __('recruit::messages.skillsSelected') }} ";
            }
        });

        $("#selectStages").selectpicker({
            actionsBox: true,
            selectAllText: "{{ __('modules.permission.selectAll') }}",
            deselectAllText: "{{ __('modules.permission.deselectAll') }}",
            multipleSeparator: " ",
            selectedTextFormat: "count > 8",
            countSelectedText: function(selected, total) {
                return selected + " {{ __('recruit::messages.skillsSelected') }} ";
            }
        });

        $('#without_end_date').click(function() {
            var check = $('#without_end_date').is(":checked") ? true : false;
            if (check == true) {
                $('#endDateBox').hide();
            } else {
                $('#endDateBox').show();
            }
        });

        @if ($job->end_date == null)
            $('#endDateBox').hide();
        @endif

        if($('#paytype').val() != 'Range')
        {
            $('#end_amt').hide();
            $('#start_amt').removeClass('col-md-6');
            $('#start_amt').addClass('col-md-12');

            switch($('#paytype').val())
            {
                case 'Starting' : $('#start_amt > label').html("{{ __('recruit::app.job.Startingamt') }} {{$global->currency->currency_symbol}}<sup class='f-14 mr-1'>*</sup>");
                    break;
                case 'Maximum' : $('#start_amt > label').html("{{ __('recruit::app.job.maxsal') }} {{$global->currency->currency_symbol}}<sup class='f-14 mr-1'>*</sup>");
                    break;
                case 'Exact Amount' : $('#start_amt > label').html("{{ __('recruit::app.job.exactamt') }} {{$global->currency->currency_symbol}}<sup class='f-14 mr-1'>*</sup>");
                    break;
            }
        }
        else
        {
            $('#start_amt').removeClass('col-md-12');
            $('#start_amt').addClass('col-md-6');
        }

        $('#paytype').change(function () {
            if($('#paytype').val() != 'Range')
            {
                $('#amount_field, #payaccording').show();
                $('#end_amt').hide();
                $('#start_amt').removeClass('col-md-6');
                $('#start_amt').addClass('col-md-12');

                switch($('#paytype').val())
                {
                    case 'Starting' : $('#start_amt > label').html("{{ __('recruit::app.job.Startingamt') }} {{$global->currency->currency_symbol}}<sup class='f-14 mr-1'>*</sup>");
                        break;
                    case 'Maximum' : $('#start_amt > label').html("{{ __('recruit::app.job.maxsal') }} {{$global->currency->currency_symbol}}<sup class='f-14 mr-1'>*</sup>");
                        break;
                    case 'Exact Amount' : $('#start_amt > label').html("{{ __('recruit::app.job.exactamt') }} {{$global->currency->currency_symbol}}<sup class='f-14 mr-1'>*</sup>");
                        break;
                }
            }
            else
            {
                $('#start_amt > label').html("{{ __('recruit::app.job.minsal') }} {{$global->currency->currency_symbol}}<sup class='f-14 mr-1'>*</sup>");
                $('#amount_field, #end_amt, #payaccording').show();
                $('#start_amt').removeClass('col-md-12');
                $('#start_amt').addClass('col-md-6');
            }
        });

        $('body').on('click', '#save-job', function() {
            var jobDescription = document.getElementById('job_description').children[0].innerHTML;
            document.getElementById('description-text').value = jobDescription;

            const url = "{{ route('jobs.update', $job->id) }}";

            $.easyAjax({
                url: url,
                container: '#save-job-data-form',
                type: "POST",
                disableButton: true,
                blockUI: true,
                buttonSelector: "#save-job",
                file: true,
                data: $('#save-job-data-form').serialize(),
                success: function(response) {
                    if (response.status == 'success') {
                        if ($(MODAL_XL).hasClass('show')) {
                            $(MODAL_XL).hide();
                            window.location.reload();
                        } else {
                            window.location.href = response.redirectUrl;
                        }
                    }
                }
            });
        });
        $('body').on('click', '.department-setting', function() {
            const url = "{{ route('departments.create') }}";
            $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_LG, url);
        });

        $('body').on('click', '.work-experience', function() {
            const url = "{{ route('work-experience.create') }}";
            $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_LG, url);
        });
        $('body').on('click', '.job-type', function() {
            const url = "{{ route('job-type.create') }}";
            $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_LG, url);

        });

        $('body').on('click', '.skill-setting', function() {
            var selectedValue = $('#selectEmployeeData').val();
            var newVal = selectedValue.join(',');
            const url = "{{ route('job-skills.addSkill') }}?skill="+newVal;
            $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_LG, url);
        });

        $('body').on('click', '.recruiter-add', function() {
            const url = "{{ route('jobs.addRecruiter') }}";
            $(MODAL_DEFAULT + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_DEFAULT, url);
        });

        $('body').on('click', '.interview-stage', function() {
            var selectedValue = $('#selectStages').val();
            var newVal = selectedValue.join(',');
            const url = "{{ route('interview-stages.create') }}?stage="+newVal;
            $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_LG, url);
        });

        init(RIGHT_MODAL);
    });
</script>
