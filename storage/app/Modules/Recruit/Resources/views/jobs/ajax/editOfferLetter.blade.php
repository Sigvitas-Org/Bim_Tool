<link rel="stylesheet" href="{{ asset('vendor/css/dropzone.min.css') }}">
<div class="row">
    <div class="col-sm-12">
        <x-form id="save-job-data-form" method="PUT">
            <div class="add-client bg-white rounded">
                <h4 class="mb-0 p-20 f-21 font-weight-normal text-capitalize border-bottom-grey">
                    @lang('recruit::app.menu.offerletter') @lang('app.edit')</h4>
                <div class="row p-20">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-md-3">
                                <x-forms.label fieldRequired="true" class="mt-3" fieldId="joblabel" :fieldLabel="__('recruit::modules.joboffer.job')"
                                   >
                                </x-forms.label>
                                <x-forms.input-group>
                                    <input type="hidden" name="jobId" value="{{$jobOffer->job_id}}">
                                    <select class="form-control select-picker" name="jobId" @if($jobOffer->job_id) disabled @endif
                                        id="jobName" data-live-search="true">
                                        <option value="">--</option>
                                        @foreach ($jobs as $job)
                                            <option @if($jobOffer->job_id == $job->id) selected @endif value="{{ $job->id }}">{{ ucfirst($job->title) }}</option>
                                        @endforeach
                                    </select>
                                </x-forms.input-group>
                            </div>

                            <div class="col-md-3">
                                <x-forms.label fieldRequired="true" class="mt-3" fieldId="jobApplicantLabel" :fieldLabel="__('recruit::app.jobOffer.jobApplicant')"
                                   >
                                </x-forms.label>
                                <x-forms.input-group>
                                    <select class="form-control select-picker" name="jobApplicant"
                                        id="jobApplicant" data-live-search="true">
                                        <option value="">--</option>
                                        @foreach ($applications as $application)
                                            <option @if($jobOffer->job_app_id == $application->id) selected @endif value="{{ $application->id }}">{{ ucfirst($application->full_name) }}</option>
                                        @endforeach
                                    </select>
                                </x-forms.input-group>
                            </div>

                            <div class="col-md-3">
                                <x-forms.datepicker fieldId="start_date" fieldRequired="true"
                                    :fieldLabel="__('recruit::modules.joboffer.OfferExp')" fieldName="jobExpireDate" :fieldValue="$jobOffer->job_expire"
                                    :fieldPlaceholder="__('placeholders.date')" />
                            </div>

                            <div class="col-md-3">
                                <x-forms.datepicker fieldId="end_date" fieldRequired="true"
                                    :fieldLabel="__('recruit::app.jobOffer.expJoinDate')" fieldName="expJoinDate" :fieldValue="$jobOffer->expected_joining_date"
                                    :fieldPlaceholder="__('placeholders.date')" />
                            </div>

                            <div class="col-md-4" id="comp_amount">

                                <x-forms.label class="my-3" fieldId="startamtlabel" :fieldLabel="__('recruit::app.job.startamt') . ' ' . $global->currency->currency_symbol"></x-forms.label>
                                <x-forms.input-group>
                                    <input type="number" min="0" class="form-control height-35 f-14"
                                        name="comp_amount" id="start_amount" value="{{ $jobOffer->comp_amount}}">
                                </x-forms.input-group>

                            </div>

                            <div class="col-md-4 pay_according" id="payaccording">
                                <x-forms.label fieldRequired="true" class="mt-3" fieldId="pay_according" :fieldLabel="__('recruit::app.job.payaccording')"
                                   >
                                </x-forms.label>
                                <x-forms.input-group>
                                    <input type="hidden" name="pay_according" value="{{$jobOffer->pay_according}}">
                                    <select class="form-control select-picker" name="pay_according"
                                        id="pay_according" data-live-search="true" @if($jobOffer->pay_according) disabled @endif>
                                        <option value="">--</option>
                                        <option @if($jobOffer->pay_according == 'hour') selected @endif value="hour">{{ __('recruit::app.job.hour') }}</option>
                                        <option @if($jobOffer->pay_according == 'day') selected @endif value="day">{{ __('recruit::app.job.day') }}</option>
                                        <option @if($jobOffer->pay_according == 'week') selected @endif value="week">{{ __('recruit::app.job.week') }}</option>
                                        <option @if($jobOffer->pay_according == 'month') selected @endif value="month">{{ __('recruit::app.job.month') }}</option>
                                        <option @if($jobOffer->pay_according == 'year') selected @endif value="year">{{ __('recruit::app.job.year') }}</option>
                                    </select>
                                </x-forms.input-group>
                            </div>

                            <div class="col-md-4">
                                <x-forms.select fieldId="status_id" fieldName="status"
                                    :fieldLabel="__('recruit::modules.jobApplication.status')">

                                    <option @if($jobOffer->status == 'pending') selected @endif value="pending" data-content="<i class='fa fa-circle mr-2 text-yellow'></i> {{ __('recruit::app.job.pending') }}"></option>
                                    <option @if($jobOffer->status == 'draft') selected @endif value="draft" data-content="<i class='fa fa-circle mr-2 text-brown'></i> {{ __('recruit::app.job.draft') }}" >{{ __('recruit::app.job.draft') }}</option>
                                    <option @if($jobOffer->status == 'withdraw') selected @endif value="withdraw" data-content="<i class='fa fa-circle mr-2 text-blue'></i> {{ __('recruit::app.job.withdraw') }}">{{ __('recruit::app.job.withdraw')
                                    }}</option>
                                    <option @if($jobOffer->status == 'accept') selected @endif value="accept" data-content="<i class='fa fa-circle mr-2 text-light-green'></i> {{ __('app.accept') }}">{{ __('app.accept')
                                    }}</option>
                                    <option @if($jobOffer->status == 'decline') selected @endif value="decline" data-content="<i class='fa fa-circle mr-2 text-red'></i> {{ __('app.decline') }}">{{ __('app.decline')
                                    }}</option>

                                </x-forms.select>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="d-flex mt-2">
                                        <x-forms.checkbox fieldId="is_public"
                                            :fieldLabel="__('recruit::app.jobOffer.SignatureReq')" fieldName="signature"
                                            :checked="($jobOffer)?$jobOffer->sign_require == 'on' : ''"
                                            />
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group my-3">
                                    <x-forms.file-multiple class="mr-0 mr-lg-2 mr-md-2"
                                    :fieldLabel="__('recruit::app.menu.add') . ' ' .__('recruit::app.jobApplication.resume')" fieldName="resume"
                                    fieldId="file-upload-dropzone" />
                                <input type="hidden" name="applicationID" id="applicationID">
                                <input type="hidden" name="type" id="resume">
                                </div>
                            </div>


                            {{-- **************** --}}

                            <div class="d-flex flex-wrap p-20" id="aplication-file-list">
                                @foreach($jobOffer->files as $file)
                                    <x-file-card :fileName="$file->filename" :dateAdded="$file->created_at->diffForHumans()">
                                        @if ($file->icon == 'images')
                                            <img src="{{ $file->file_url }}">
                                        @else
                                            <i class="fa fa-file-pdf text-lightest"></i>
                                        @endif
                                            <x-slot name="action">
                                                <div class="dropdown ml-auto file-action">
                                                    <button class="btn btn-lg f-14 p-0 text-lightest text-capitalize rounded  dropdown-toggle"
                                                        type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-h"></i>
                                                    </button>

                                                    <div class="dropdown-menu dropdown-menu-right border-grey rounded b-shadow-4 p-0"
                                                        aria-labelledby="dropdownMenuLink" tabindex="0">
                                                            @if ($file->icon != 'images')
                                                                <a class="cursor-pointer d-block text-dark-grey f-13 pt-3 px-3 " target="_blank"
                                                                    href="{{ $file->file_url }}">@lang('app.view')</a>
                                                            @endif
                                                            <a class="cursor-pointer d-block text-dark-grey f-13 py-3 px-3 "
                                                                href="{{ route('job-offer-file.download', md5($file->id)) }}">@lang('app.download')</a>

                                                            <a class="cursor-pointer d-block text-dark-grey f-13 pb-3 px-3 delete-file"
                                                                data-row-id="{{ $file->id }}" href="javascript:;">@lang('app.delete')</a>
                                                    </div>
                                                </div>
                                            </x-slot>
                                    </x-file-card>
                                @endforeach

                            </div>
                            {{-- **************** --}}

                        </div>
                    </div>
                </div>

                <x-form-actions>
                    <x-forms.button-primary id="save-job" class="mr-3" icon="check">@lang('app.save')
                    </x-forms.button-primary>
                    <x-forms.button-cancel :link="route('job-offer-letter.index')" class="border-0">@lang('app.cancel')
                    </x-forms.button-cancel>
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


        $('body').on('click', '#save-job', function() {

            const url = "{{ route('job-offer-letter.update', $jobOffer->id) }}";

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

                    if ((myDropzone.getQueuedFiles().length > 0)) {
                            $('#applicationID').val(response.application_id);
                            myDropzone.processQueue();
                        } else if ($(RIGHT_MODAL).hasClass('in')) {
                       document.getElementById('close-task-detail').click();
                        if ($('#offer-table').length) {
                            window.LaravelDataTables["offer-table"].draw();
                       }else {
                            window.location.href = response.redirectUrl;
                        }
                    } else {
                        window.location.href = response.redirectUrl;
                    }

                }
            });
        });


        $('body').on('click', '.department-setting', function() {
            const url = "{{ route('departments.create') }}";
            $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_LG, url);
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
                        selectData = '<option  value="' + value.id + '">' + value
                            .full_name + '</option>';
                        options.push(selectData);
                    });

                    $('#jobApplicant').html('<option value="">--</option>' +
                        options);
                    $('#jobApplicant').selectpicker('refresh');
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
                        var url = "{{ route('job-offer-file.destroy', ':id') }}";
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
