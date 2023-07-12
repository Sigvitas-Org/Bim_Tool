<link rel="stylesheet" href="{{ asset('vendor/css/dropzone.min.css') }}">
<div class="row">
    <div class="col-sm-12">
        <x-form id="save-job-data-form">
            <div class="add-client bg-white rounded">
                <h4 class="mb-0 p-20 f-21 font-weight-normal text-capitalize border-bottom-grey">
                    @lang('recruit::app.menu.joboffer') @lang('app.details')</h4>
                <div class="row p-20">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-md-3">
                                <x-forms.label fieldRequired="true" class="mt-3" fieldId="joblabel" :fieldLabel="__('recruit::modules.joboffer.job')"
                                   >
                                </x-forms.label>
                                <x-forms.input-group>
                                    @if($jobId) <input type="hidden" name="jobId" value="{{$jobId}}"> @endif
                                    <select @if($jobId) disabled @endif class="form-control select-picker" name="jobId"
                                        id="jobName" data-live-search="true">
                                        <option value="">--</option>
                                        @foreach ($jobs as $job)
                                            <option @if($jobId && $job->id = $jobId) selected @endif value="{{ $job->id }}">{{ ucfirst($job->title) }}</option>
                                        @endforeach
                                    </select>
                                </x-forms.input-group>
                            </div>

                            <div class="col-md-3">
                                <x-forms.label fieldRequired="true" class="mt-3" fieldId="jobApplicantLabel" :fieldLabel="__('recruit::app.jobOffer.jobApplicant')"
                                   >
                                </x-forms.label>
                                <x-forms.input-group>
                                    <select class="form-control select-picker job-app" name="jobApplicant"
                                        id="jobApplicant" data-live-search="true">
                                        <option value="">--</option>
                                        @if($jobId)
                                        @foreach ($jobApplications as $application)
                                            <option value="{{ $application->id }}">{{ ucfirst($application->full_name) }}</option>
                                        @endforeach
                                        @else
                                        @foreach ($applications as $application)
                                            <option value="{{ $application->id }}">{{ ucfirst($application->full_name) }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </x-forms.input-group>
                            </div>



                            <div class="col-md-3">
                                <x-forms.datepicker fieldId="start_date" fieldRequired="true"
                                    :fieldLabel="__('recruit::modules.joboffer.OfferExp')" fieldName="jobExpireDate" :fieldValue="now($global->timezone)->format($global->date_format)"
                                    :fieldPlaceholder="__('placeholders.date')" />
                            </div>

                            <div class="col-md-3">
                                <x-forms.datepicker fieldId="end_date" fieldRequired="true"
                                    :fieldLabel="__('recruit::app.jobOffer.expJoinDate')" fieldName="expJoinDate" :fieldValue="now($global->timezone)->format($global->date_format)"
                                    :fieldPlaceholder="__('placeholders.date')" />
                            </div>

                            <div class="col-md-3" id="comp_amount">

                                <x-forms.label class="my-3" fieldId="startamtlabel" :fieldLabel="__('recruit::app.job.salary') . ' ' . $global->currency->currency_symbol" fieldRequired="true"></x-forms.label>
                                <x-forms.input-group>
                                    <input type="number" min="0" class="form-control height-35 f-14"
                                        name="comp_amount" id="start_amount">
                                </x-forms.input-group>

                            </div>

                            <div class="col-md-3 pay_according" id="payaccording">
                                <x-forms.label fieldRequired="true" class="mt-3" fieldId="pay_according" :fieldLabel="__('recruit::app.job.payaccording')"
                                   >
                                </x-forms.label>
                                @if($jobOffer != null && $jobId)
                                <x-forms.input-group>
                                 <input type="hidden" name="pay_according" value="{{$jobOffer->pay_according}}">
                                    <select class="form-control select-picker"
                                        id="pay_according" data-live-search="true" disabled>
                                        <option  value="">--</option>
                                        <option @if($jobId && $jobOffer->pay_according == "hour") selected @endif  value="hour">{{ __('recruit::app.job.hour') }}</option>
                                        <option @if($jobId && $jobOffer->pay_according == "day") selected @endif value="day">{{ __('recruit::app.job.day') }}</option>
                                        <option @if($jobId && $jobOffer->pay_according == "week") selected @endif value="week">{{ __('recruit::app.job.week') }}</option>
                                        <option @if($jobId && $jobOffer->pay_according == "month") selected @endif value="month">{{ __('recruit::app.job.month') }}</option>
                                        <option @if($jobId && $jobOffer->pay_according == "year") selected @endif value="year">{{ __('recruit::app.job.year') }}</option>
                                    </select>
                                </x-forms.input-group>
                                @else
                                <x-forms.input-group>
                                        <input type="hidden" name="pay_according" value="">
                                       <select class="form-control select-picker"
                                           id="pay_according" data-live-search="true" disabled>
                                           <option  value="">--</option>
                                           <option  value="hour">{{ __('recruit::app.job.hour') }}</option>
                                           <option value="day">{{ __('recruit::app.job.day') }}</option>
                                           <option  value="week">{{ __('recruit::app.job.week') }}</option>
                                           <option  value="month">{{ __('recruit::app.job.month') }}</option>
                                           <option  value="year">{{ __('recruit::app.job.year') }}</option>
                                       </select>
                                   </x-forms.input-group>
                                   @endif
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="d-flex mt-2">
                                        <input type="hidden" name="signature" value="off"/>
                                        <x-forms.checkbox fieldId="is_public"
                                            :fieldLabel="__('recruit::app.jobOffer.SignatureReq')" fieldName="signature" value="on" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group my-3">
                                    <x-forms.file-multiple class="mr-0 mr-lg-2 mr-md-2"
                                    :fieldLabel="__('recruit::app.menu.add') . ' ' .__('recruit::app.jobOffer.files')" fieldName="resume"
                                    fieldId="file-upload-dropzone" />
                                <input type="hidden" name="applicationID" id="applicationID">
                                <input type="hidden" name="type" id="resume">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <input type="hidden" name="save_type" value="" id="save_type" />
                <x-form-actions class="c-inv-btns">
                    <div class="d-flex mb-3">

                        <div class="inv-action dropup mr-3">
                            <button class="btn-primary dropdown-toggle" type="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                @lang('app.save')
                                <span><i class="fa fa-chevron-down f-15 text-white"></i></span>
                            </button>
                            <!-- DROPDOWN - INFORMATION -->
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuBtn" tabindex="0">
                                <li>
                                    <a class="dropdown-item f-14 text-dark save-form" href="javascript:;" data-type="save">
                                        <i class="fa fa-save f-w-500 mr-2 f-11"></i> @lang('app.save')
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item f-14 text-dark save-form" href="javascript:void(0);"
                                        data-type="send">
                                        <i class="fa fa-paper-plane f-w-500  mr-2 f-12"></i> @lang('app.saveSend')
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <x-forms.button-cancel :link="route('job-offer-letter.index')" class="border-0">@lang('app.cancel')
                        </x-forms.button-cancel>

                    </div>

                </x-form-actions>
            </div>
        </x-form>

    </div>
</div>
<script src="{{ asset('vendor/jquery/dropzone.min.js') }}"></script>

<script>
    $(document).ready(function() {
        datepicker('#start_date', {
            minDate: new Date(),
            position: 'bl',
            ...datepickerConfig
        });
        datepicker('#end_date', {
            minDate: new Date(),
            position: 'bl',
            ...datepickerConfig
        });

        Dropzone.autoDiscover = false;
            //Dropzone class
            myDropzone = new Dropzone("div#file-upload-dropzone", {
                dictDefaultMessage: "{{ __('app.dragDrop') }}",
                url: "{{ route('job-offer-file.store') }}",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                paramName: "file",
                maxFilesize: 10,
                maxFiles: 10,
                autoProcessQueue: false,
                uploadMultiple: true,
                addRemoveLinks: true,
                parallelUploads: 10,
                init: function() {
                    myDropzone = this;
                }
            });
            myDropzone.on('sending', function(file, xhr, formData) {

                var ids = $('#applicationID').val();
                formData.append('applicationID', ids);
            });
            myDropzone.on('uploadprogress', function() {
                $.easyBlockUI();
            });
            myDropzone.on('completemultiple', function() {
                var msgs = "@lang('modules.projects.projectUpdated')";
                var redirect_url = $('#redirect_url').val();
                if (redirect_url != '') {
                    window.location.href = decodeURIComponent(redirect_url);
                }
                window.location.href = "{{ route('job-offer-letter.index') }}"
            });


        $('body').on('click', '.save-form', function() {

            var type = $(this).data('type');
            $('#save_type').val(type);

            const url = "{{ route('job-offer-letter.store') }}?type="+type;

            $.easyAjax({
                url: url,
                container: '#save-job-data-form',
                type: "POST",
                disableButton: true,
                blockUI: true,
                file:true,
                buttonSelector: "#save-job",
                data: $('#save-job-data-form').serialize(),
                success: function(response) {
                    if (response.status == 'success') {
                        if ((myDropzone.getQueuedFiles().length > 0)) {

                            $('#applicationID').val(response.application_id);
                            myDropzone.processQueue();
                        } else if (typeof response.redirectUrl !== 'undefined') {
                            window.location.href = response.redirectUrl;
                        }
                    }
                }
            });
        });

        $('#jobName').change(function() {

            const jobId = $(this).val();
            const url = "{{ route('job-offer-letter.fetch-job-application') }}";

            $.easyAjax({
                url: url,
                type: "GET",
                disableButton: true,
                blockUI: true,
                data: {
                    job_id:jobId
                },
                success: function(response) {
                    if (response.status == 'success') {
                        var options = [];
                        var rData = [];

                        rData = response.applications;

                        $.each(rData, function(index, value) {
                            var selectData = '';
                            selectData = '<option value="' + value.id + '">' + value
                                .full_name + '</option>';
                            options.push(selectData);

                        });

                        $('#pay_according').val(response.job.pay_according);
                        $("input[name='pay_according']").val(response.job.pay_according);
                        $('#jobApplicant').html('<option value="">--</option>' +
                            options);
                        $('#jobApplicant').selectpicker('refresh');
                        $('#pay_according').selectpicker('refresh');
                    }
                }
            });
        });

        $('body').on('click', '.department-setting', function() {
            const url = "{{ route('departments.create') }}";
            $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_LG, url);
        });

        init(RIGHT_MODAL);
    });
</script>
