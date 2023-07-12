<div class="row">
    <div class="col-sm-12">
        <x-form id="save-job-application-data-form" method="PUT">
            <div class="add-client bg-white rounded">
                <h4 class="mb-0 p-20 f-21 font-weight-normal text-capitalize border-bottom-grey">
                    @lang('recruit::modules.jobApplication.jobApplication') @lang('app.edit')</h4>
                <div class="row p-20">
                    <div @class([
                        'col-lg-9 col-xl-10' => $jobApplication->job->is_photo_require == 1,
                        'col-lg-12 col-xl-12' => $jobApplication->job->is_photo_require == 0,
                        
                    ])>
                        <div class="row">
                            <div class="col-md-3">
                                <x-forms.label fieldId="job_id" fieldRequired="true"
                                    :fieldLabel="__('recruit::modules.jobApplication.jobs')"
                                    class="mt-3"></x-forms.label>
                                <input type="hidden" name="job_id" value="{{$jobApplication->job_id}}">
                                <select
                                    @if($jobApplication->job_id) disabled @endif
                                        name="job_id" id="job_id" class="form-control select-picker" data-size="8">
                                    <option value="">--</option>
                                    @foreach ($jobs as $job)
                                        <option value="{{ $job->id }}"
                                            @if ($job->id == $jobApplication->job_id) selected @endif>{{ ucfirst($job->title) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <x-forms.text fieldId="full_name" :fieldValue="$jobApplication->full_name" :fieldLabel="__('recruit::modules.jobApplication.name')"
                                fieldName="full_name" fieldRequired="true">
                                </x-forms.text>
                            </div>
                            <div class="col-md-3">
                                <x-forms.text fieldId="email" :fieldValue="$jobApplication->email" :fieldLabel="__('recruit::modules.jobApplication.email')"
                                fieldName="email"
                                :fieldPlaceholder="__('recruit::modules.jobApplication.email')">
                            </x-forms.text>
                            </div>
                            <div class="col-md-3">
                                <x-forms.text fieldId="phone" :fieldValue="$jobApplication->phone" :fieldLabel="__('recruit::modules.jobApplication.phone')"
                                    fieldName="phone" fieldRequired="true"
                                    :fieldPlaceholder="__('recruit::modules.jobApplication.phone')">
                                </x-forms.text>
                            </div>
                            @if($jobApplication->job->is_gender_require)
                            <div class="col-md-3">
                                <x-forms.select fieldId="gender" :fieldLabel="__('recruit::modules.jobApplication.gender')"
                                    fieldName="gender" fieldRequired="true">
                                    <option value="male" {{ $jobApplication->gender == 'male' ? 'selected' : '' }}>@lang('app.male')
                                    </option>
                                    <option value="female" {{ $jobApplication->gender == 'female' ? 'selected' : '' }}>
                                        @lang('app.female')</option>
                                    <option value="others" {{ $jobApplication->gender == 'others' ? 'selected' : '' }}>
                                        @lang('app.others')</option>
                                </x-forms.select>
                            </div>
                            @endif
                            <div class="col-md-3">
                                <x-forms.select fieldId="location_id" fieldName="location_id" fieldRequired="true"
                                    :fieldLabel="__('recruit::modules.jobApplication.location')">
                                    @foreach ($locations as $location)
                                        <option value="{{ $location->id }}" @if ($location->id == $jobApplication->location_id) selected @endif>{{ ucfirst($location->location) }}
                                        </option>
                                    @endforeach
                                </x-forms.select>
                            </div>

                            <div class="col-md-3">
                                <x-forms.select fieldId="total_experience" :fieldLabel="__('recruit::modules.jobApplication.experience')"
                                fieldName="total_experience">
                                    <option value="">--</option>
                                    <option value="fresher" {{ $jobApplication->total_experience == 'fresher' ? 'selected' : '' }}>@lang('recruit::modules.jobApplication.fresher')</option>
                                    <option value="1-2" {{ $jobApplication->total_experience == '1-2' ? 'selected' : '' }}>1-2 @lang('recruit::modules.jobApplication.years')</option>
                                    <option value="3-4" {{ $jobApplication->total_experience == '3-4' ? 'selected' : '' }}>3-4 @lang('recruit::modules.jobApplication.years')</option>
                                    <option value="5-6" {{ $jobApplication->total_experience == '5-6' ? 'selected' : '' }}>5-6 @lang('recruit::modules.jobApplication.years')</option>
                                    <option value="7-8" {{ $jobApplication->total_experience == '7-8' ? 'selected' : '' }}>7-8 @lang('recruit::modules.jobApplication.years')</option>
                                    <option value="9-10" {{ $jobApplication->total_experience == '9-10' ? 'selected' : '' }}>9-10 @lang('recruit::modules.jobApplication.years')</option>
                                    <option value="11-12" {{ $jobApplication->total_experience == '11-12' ? 'selected' : '' }}>11-12 @lang('recruit::modules.jobApplication.years')</option>
                                    <option value="13-14" {{ $jobApplication->total_experience == '13-14' ? 'selected' : '' }}>13-14 @lang('recruit::modules.jobApplication.years')</option>
                                    <option value="over-15" {{ $jobApplication->total_experience == 'over-15' ? 'selected' : '' }}>@lang('recruit::modules.jobApplication.over15')</option>
                                </x-forms.select>
                            </div>

                            <div class="col-md-3">
                                <x-forms.text fieldId="current_location" :fieldLabel="__('recruit::modules.jobApplication.currentLocation')"
                                fieldName="current_location" :fieldValue="$jobApplication->current_location">
                                </x-forms.text>
                            </div>
                            <div class="col-md-3">
                                <x-forms.label class="my-3" fieldId="current_ctc" :fieldLabel="__('recruit::modules.jobApplication.currentCtc') . ' ' . $global->currency->currency_symbol"></x-forms.label>
                                <x-forms.input-group>
                                    <input type="number" min="0" class="form-control height-35 f-14"
                                        name="current_ctc" value={{ $jobApplication->current_ctc }}>
                                </x-forms.input-group>
                            </div>

                            <div class="col-md-3">
                                <x-forms.label class="my-3" fieldId="expected_ctc" :fieldLabel="__('recruit::modules.jobApplication.expectedCtc') . ' ' . $global->currency->currency_symbol"></x-forms.label>
                                <x-forms.input-group>
                                    <input type="number" min="0" class="form-control height-35 f-14"
                                        name="expected_ctc" value={{ $jobApplication->expected_ctc }}>
                                </x-forms.input-group>
                            </div>

                            <div class="col-md-3">
                                <x-forms.select fieldId="notice_period" :fieldLabel="__('recruit::modules.jobApplication.noticePeriod')"
                                fieldName="notice_period">
                                    <option value="">--</option>
                                    <option value="15" {{ $jobApplication->notice_period == '15' ? 'selected' : '' }}>15 @lang('recruit::modules.jobApplication.days')</option>
                                    <option value="30" {{ $jobApplication->notice_period == '30' ? 'selected' : '' }}>30 @lang('recruit::modules.jobApplication.days')</option>
                                    <option value="45" {{ $jobApplication->notice_period == '45' ? 'selected' : '' }}>45 @lang('recruit::modules.jobApplication.days')</option>
                                    <option value="60" {{ $jobApplication->notice_period == '60' ? 'selected' : '' }}>60 @lang('recruit::modules.jobApplication.days')</option>
                                    <option value="75" {{ $jobApplication->notice_period == '75' ? 'selected' : '' }}>75 @lang('recruit::modules.jobApplication.days')</option>
                                    <option value="90" {{ $jobApplication->notice_period == '90' ? 'selected' : '' }}>90 @lang('recruit::modules.jobApplication.days')</option>
                                    <option value="over-90" {{ $jobApplication->notice_period == 'over-90' ? 'selected' : '' }}>@lang('recruit::modules.jobApplication.over90')</option>
                                </x-forms.select>
                            </div>

                            @if($jobApplication->job->is_dob_require)
                            <div class="col-md-3">
                                <x-forms.datepicker fieldId="date_of_birth" :fieldLabel="__('recruit::modules.jobApplication.dateOfBirth')"
                                fieldName="date_of_birth" :fieldPlaceholder="__('placeholders.date')" fieldRequired="true"
                                :fieldValue="($jobApplication->date_of_birth ? $jobApplication->date_of_birth->format($global->date_format) : '')" />
                            </div>
                            @endif

                            <div class="col-md-3">
                                <x-forms.select fieldId="status_id" fieldName="status_id"
                                    :fieldLabel="__('recruit::modules.jobApplication.status')">
                                    @foreach ($applicationStatus as $status)
                                        <option  @if ($status->id == $jobApplication->status_id) selected @endif value="{{ $status->id }}" data-content="<i class='fa fa-circle mr-2' style='color: {{$status->color}}'></i> {{ ucfirst($status->status) }}"></option>
                                    @endforeach
                                </x-forms.select>
                            </div>
                            <div class="col-md-3">
                                <x-forms.select fieldId="source" fieldName="source" :fieldLabel="__('recruit::modules.front.applicationSource')">
                                    @foreach ($applicationSources as $source)

                                    <option @if($jobApplication->application_source_id == $source->id) selected @endif value="{{$source->id}}"> {{ ucfirst($source->application_source) }}</option>
                                    @endforeach
                                </x-forms.select>
                            </div>
                        </div>
                    </div>
                    @if($jobApplication->job->is_photo_require)
                    <div class="col-lg-3 col-xl-2">
                        @php
                            $userImage = $jobApplication->hasGravatar($jobApplication->email) ? str_replace('?s=200&d=mp', '', $employee->image_url) : asset('img/avatar.png');
                        @endphp
                        <x-forms.file allowedFileExtensions="png jpg jpeg" fieldRequired="true" class="mr-0 mr-lg-2 mr-md-2"
                            :fieldLabel="__('modules.profile.profilePicture')"
                             fieldName="photo" :fieldValue="($jobApplication->photo ? $jobApplication->image_url : $userImage)"
                            fieldId="photo" fieldHeight="119" />
                        <input type="hidden" name="photo" value="{{ $userImage }}">
                    </div>
                    @endif

                    <div class="col-md-12">
                        <x-forms.textarea class="mr-0 mr-lg-2 mr-md-2"
                            :fieldLabel="__('recruit::modules.jobApplication.coverLetter')" fieldName="cover_letter"
                            fieldId="cover_letter" :fieldValue="$jobApplication->cover_letter" :fieldPlaceholder="__('recruit::modules.jobApplication.coverLetter')">
                        </x-forms.textarea>
                    </div>
                    @if($jobApplication->job->is_resume_require)
                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <x-forms.label fieldId="resume" fieldRequired="false"
                                :fieldLabel="__('recruit::app.menu.add') . ' ' .__('recruit::app.jobApplication.resume')"
                                class="mt-3"></x-forms.label>
                            <input type="file" class="dropify" name="resume" data-allowed-file-extensions="png jpg jpeg pdf" data-messages-default="test" data-height="150" data-default-file ="{{ $jobApplictionFile ? $jobApplictionFile->file_url : asset('http://www.gravatar.com/resume.pdf') }}"/>
                            <input type="hidden" name="resume" value="{{ $jobApplictionFile ? $jobApplictionFile->file_url : asset('http://www.gravatar.com/resume.pdf') }}">
                        </div>
                    </div>
                    @endif
                </div>
                <x-form-actions>
                    <x-forms.button-primary id="save-job-application" class="mr-3" icon="check">@lang('app.save')
                    </x-forms.button-primary>
                    <x-forms.button-cancel :link="route('job-applications.index')" class="border-0">@lang('app.cancel')
                    </x-forms.button-cancel>
                </x-form-actions>
            </div>
        </x-form>
    </div>
</div>

<script>
    $(document).ready(function() {
        @if($jobApplication->job->is_dob_require)
        datepicker('#date_of_birth', {
            position: 'bl',
            maxDate: new Date(),
            ...datepickerConfig
        });
        @endif

        $(document).find('.dropify').dropify({
                messages: dropifyMessages
            });

        $('body').on('click', '#save-job-application', function() {

            const url = "{{ route('job-applications.update', $jobApplication->id) }}";

            $.easyAjax({
                url: url,
                container: '#save-job-application-data-form',
                type: "POST",
                disableButton: true,
                blockUI: true,
                file: true,
                buttonSelector: "#save-job-application",
                data: $('#save-job-application-data-form').serialize(),
                success: function(response) {
                    if ($(RIGHT_MODAL).hasClass('in')) {
                       document.getElementById('close-task-detail').click();
                        if ($('#job-applications-table').length) {
                            window.LaravelDataTables["job-applications-table"].draw();
                       }else {
                            window.location.href = response.redirectUrl;
                        }
                    } else {
                        window.location.href = response.redirectUrl;
                    }
                }

            });
        });

        $('body').on('click', '.delete-file', function() {
            var id = $(this).data('row-id');
            Swal.fire({
                title: "@lang('messages.sweetAlertTitle')",
                text: "@lang('messages.recoverRecord')",
                icon: 'warning',
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText: "@lang('messages.confirmDelete')",
                cancelButtonText: "@lang('app.cancel')",
                customClass: {
                    confirmButton: 'btn btn-primary mr-3',
                    cancelButton: 'btn btn-secondary'
                },
                showClass: {
                    popup: 'swal2-noanimation',
                    backdrop: 'swal2-noanimation'
                },
                buttonsStyling: false
            }).then((result) => {
                if (result.isConfirmed) {
                    var url = "{{ route('application-file.destroy', ':id') }}";
                    url = url.replace(':id', id);

                    var token = "{{ csrf_token() }}";

                    $.easyAjax({
                        type: 'POST',
                        url: url,
                        data: {
                            '_token': token,
                            '_method': 'DELETE'
                        },
                        success: function(response) {
                            if (response.status == "success") {
                                window.location.reload();
                            }
                        }
                    });
                }
            });
        });
        init(RIGHT_MODAL);
    });

</script>
