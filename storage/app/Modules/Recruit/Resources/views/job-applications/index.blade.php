@extends('layouts.app')

@push('styles')
    <!-- Drag and Drop CSS -->
    <link rel='stylesheet' href="{{ asset('vendor/css/dragula.css') }}" type='text/css' />
    <link rel='stylesheet' href="{{ asset('vendor/css/drag.css') }}" type='text/css' />
    <link rel="stylesheet" href="{{ asset('vendor/css/bootstrap-colorpicker.css') }}" />
    <style>
        #colorpicker .form-group {
            width: 87%;
        }

        .b-p-tasks {
            min-height: 100px;
        }

    </style>

@endpush

@section('filter-section')

    <x-filters.filter-box>
        <!-- DATE START -->
        <div class="select-box d-flex pr-2 border-right-grey border-right-grey-sm-0">
            <p class="mb-0 pr-3 f-14 text-dark-grey d-flex align-items-center">@lang('app.date')</p>
            <div class="input-group input-daterange">
                <input type="text"
                    class="position-relative text-dark date-range-field form-control border-0 p-0 text-left f-14 f-w-500"
                    id="start-date" placeholder="@lang('app.startDate')">
                <div class="input-group-addon datePickerInput d-flex align-items-center pr-3">@lang('app.to')</div>
                <input type="text" class="date-range-field1 text-dark form-control border-0 p-0 text-left f-14 f-w-500"
                    id="end-date" placeholder="@lang('app.endDate')">
            </div>
        </div>
        <!-- DATE END -->

        <!-- SEARCH BY TASK START -->
        <div class="task-search d-flex  py-1 px-lg-3 px-0 border-right-grey align-items-center">
            <form class="w-100 mr-1 mr-lg-0 mr-md-1 ml-md-1 ml-0 ml-lg-0">
                <div class="input-group bg-grey rounded">
                    <div class="input-group-prepend">
                        <span class="input-group-text border-0 bg-additional-grey">
                            <i class="fa fa-search f-13 text-dark-grey"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control f-14 p-1 border-additional-grey" id="search-text-field"
                        placeholder="@lang('app.startTyping')">
                </div>
            </form>
        </div>
        <!-- SEARCH BY TASK END -->

        <!-- RESET START -->
        <div class="select-box d-flex py-1 px-lg-2 px-md-2 px-0">
            <x-forms.button-secondary class="btn-xs d-none" id="reset-filters" icon="times-circle">
                @lang('app.clearFilters')
            </x-forms.button-secondary>
        </div>
        <!-- RESET END -->

        <!-- MORE FILTERS START -->
        <x-filters.more-filter-box>

            <div class="more-filter-items">
                        <label class="f-14 text-dark-grey mb-12 text-capitalize" for="usr">@lang('recruit::modules.job.job')</label>
                <div class="select-filter mb-4">
                    <div class="select-others">
                        <select class="form-control select-picker" id="jobId" data-live-search="true" data-container="body" data-size="8">
                            <option value="all">@lang('app.all')</option>
                            @foreach ($jobs as $job)
                                <option
                                    data-content=""
                                    value="{{ $job->id }}">{{ ucwords($job->title) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="more-filter-items">
                <label class="f-14 text-dark-grey mb-12 text-capitalize" for="usr">@lang('recruit::modules.jobApplication.status')</label>
                <div class="select-filter mb-4">
                    <div class="select-others">
                        <select class="form-control select-picker" id="status" data-live-search="true" data-container="body" data-size="8">
                            <option value="all">@lang('app.all')</option>
                            @foreach ($taskLabels as $status)
                            <option value="{{$status->id}}" data-content="<i class='fa fa-circle mr-2' style='color: {{$status->color}}'></i> {{ ucfirst($status->status) }}"></option>
                        @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="more-filter-items">
                <label class="f-14 text-dark-grey mb-12 text-capitalize" for="usr">@lang('recruit::modules.jobApplication.location')</label>
                <div class="select-filter mb-4">
                    <div class="select-others">
                        <select class="form-control select-picker" name="location"  data-container="body" id="location">
                            <option value="all">@lang('app.all')</option>
                            @foreach ($locations as $location)
                                <option value="{{ $location->id }}">{{ ucfirst($location->location) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="more-filter-items">
                <label class="f-14 text-dark-grey mb-12 text-capitalize" for="usr">@lang('recruit::modules.jobApplication.gender')</label>
                <div class="select-filter mb-4">
                    <div class="select-others">
                        <select class="form-control select-picker" name="gender" data-container="body" id="gender">
                            <option value="all">@lang('app.all')</option>
                            <option value="male">@lang('app.male')</option>
                            <option value="female">@lang('app.female')</option>
                            <option value="others">@lang('app.others')</option>

                        </select>
                    </div>
                </div>
            </div>

            <div class="more-filter-items">
                <label class="f-14 text-dark-grey mb-12 text-capitalize" for="usr">@lang('recruit::modules.jobApplication.experience')</label>
                <div class="select-filter mb-4">
                    <div class="select-others">
                        <select class="form-control select-picker" id="total_experience" data-live-search="true"
                            data-container="body" data-size="8">
                            <option value="all">@lang('app.all')</option>
                            <option value="fresher">@lang('recruit::modules.jobApplication.fresher')</option>
                            <option value="1-2">1-2 @lang('recruit::modules.jobApplication.years')</option>
                            <option value="3-4">3-4 @lang('recruit::modules.jobApplication.years')</option>
                            <option value="5-6">5-6 @lang('recruit::modules.jobApplication.years')</option>
                            <option value="7-8">7-8 @lang('recruit::modules.jobApplication.years')</option>
                            <option value="9-10">9-10 @lang('recruit::modules.jobApplication.years')</option>
                            <option value="11-12">11-12 @lang('recruit::modules.jobApplication.years')</option>
                            <option value="13-14">13-14 @lang('recruit::modules.jobApplication.years')</option>
                            <option value="over-15">@lang('recruit::modules.jobApplication.over15')</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="more-filter-items">
                <label class="f-14 text-dark-grey mb-12 text-capitalize" for="usr">@lang('recruit::modules.jobApplication.currentLocation')</label>
                <div class="select-filter">
                    <div class="select-others">
                        <select class="form-control select-picker" id="current_location" data-live-search="true"
                            data-container="body" data-size="8">
                            <option value="all">@lang('app.all')</option>
                            @if (count($currentLocations) > 0)
                                @foreach ($currentLocations as $currentLocation)
                                    <option value="{{ $currentLocation->current_location }}">{{ ucfirst($currentLocation->current_location) }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
            </div>
            <div class="more-filter-items">
                <x-forms.label class="my-3" fieldId="current_ctc_min" :fieldLabel="__('recruit::modules.jobApplication.currentCtc') . ' ' . $global->currency->currency_symbol"></x-forms.label>
                <div class="row">
                    <div class="col-md-5 ml-4">
                        <x-forms.input-group>
                            <input type="number" min="0" class="form-control height-35 f-14"
                                name="current_ctc_min" id="current_ctc_min" placeholder="@lang('recruit::modules.jobApplication.minimum')">
                        </x-forms.input-group>
                    </div>

                    <div class="col-md-5">
                        <x-forms.input-group>
                            <input type="number" min="0" class="form-control height-35 f-14"
                                name="current_ctc_max" id="current_ctc_max" placeholder="@lang('recruit::modules.jobApplication.maximum')">
                        </x-forms.input-group>
                    </div>
                </div>
            </div>

            <div class="more-filter-items">
                <x-forms.label class="my-3" fieldId="expected_ctc_min" :fieldLabel="__('recruit::modules.jobApplication.expectedCtc') . ' ' . $global->currency->currency_symbol"></x-forms.label>
                <div class="row">
                    <div class="col-md-5 ml-4">
                        <x-forms.input-group>
                            <input type="number" min="0" class="form-control height-35 f-14"
                                name="expected_ctc_min" id="expected_ctc_min" placeholder="@lang('recruit::modules.jobApplication.minimum')">
                        </x-forms.input-group>
                    </div>

                    <div class="col-md-5">
                        <x-forms.input-group>
                            <input type="number" min="0" class="form-control height-35 f-14"
                                name="expected_ctc_max" id="expected_ctc_max" placeholder="@lang('recruit::modules.jobApplication.maximum')">
                        </x-forms.input-group>
                    </div>
                </div>
            </div>
        </x-filters.more-filter-box>
        <!-- MORE FILTERS END -->
    </x-filters.filter-box>

@endsection

@php
$addApplicationPermission = user()->permission('add_job_application');
@endphp

@section('content')

    <!-- CONTENT WRAPPER START -->
    <div class="w-task-board-box px-4 py-2 bg-white">
        <!-- Add Task Export Buttons Start -->
        <div class="d-lg-flex d-md-flex d-block my-3">
            <div id="table-actions" class="flex-grow-1 align-items-center mb-2 mb-lg-0 mb-md-0">
                @if ($addApplicationPermission == 'all' || $addApplicationPermission == 'added')
                    <x-forms.link-primary :link="route('job-applications.create')" class="mr-3 openRightModal float-left" icon="plus" data-redirect-url="{{ url()->full() }}">
                        @lang('app.add')
                        @lang('recruit::app.menu.jobApplication')
                    </x-forms.link-primary>
                @endif
                @if (user()->permission('add_application_status') == 'all')
                    <x-forms.button-secondary icon="plus" id="add-column">
                        @lang('modules.tasks.addBoardColumn')
                    </x-forms.button-secondary>
                @endif
            </div>

            <div class="btn-group" role="group">
                <a href="{{ route('job-applications.index') }}" class="btn btn-secondary f-14" data-toggle="tooltip"
                    data-original-title="@lang('recruit::modules.jobApplication.jobApplication')"><i class="side-icon bi bi-list-ul"></i></a>

                    <a href="{{ route('job-appboard.index') }}" class="btn btn-secondary f-14 btn-active" data-toggle="tooltip"
                    data-original-title="@lang('recruit::app.menu.boardView')"><i class="side-icon bi bi-kanban"></i></a>
            </div>
        </div>

        <div class="w-task-board-panel d-flex" id="taskboard-columns">

        </div>
    </div>
    <!-- CONTENT WRAPPER END -->

@endsection

@push('scripts')
    <script src="{{ asset('vendor/jquery/dragula.js') }}"></script>

    <script>
        const dp1 = datepicker('.date-range-field', {
            position: 'bl',
            onSelect: (instance, date) => {
                $('#reset-filters').removeClass('d-none');
                dp2.setMin(date);
                loadData();
            },
            ...datepickerConfig
        });

        const dp2 = datepicker('.date-range-field1', {
            position: 'bl',
            onSelect: (instance, date) => {
                $('#reset-filters').removeClass('d-none');
                dp1.setMax(date);
                loadData();
            },
            ...datepickerConfig
        });

        $('#search-text-field, #status, #location, #jobId')
            .on('change keyup', function() {
                if ($('#search-text-field').val() !== "") {
                   $('#reset-filters').removeClass('d-none');
                }else if ($('#status').val() != "all") {
                    $('#reset-filters').removeClass('d-none');
                }else if ($('#location').val() != "all") {
                    $('#reset-filters').removeClass('d-none');
                }else if ($('#jobId').val() != "all") {
                    $('#reset-filters').removeClass('d-none');
                }else if ($('#gender').val() != "all") {
                    $('#reset-filters').removeClass('d-none');
                }else if ($('#total_experience').val() != "all") {
                    $('#reset-filters').removeClass('d-none');
                }else if ($('#current_location').val() != "all") {
                    $('#reset-filters').removeClass('d-none');
                }else {
                    $('#reset-filters').addClass('d-none');
                }
                loadData();
            });

        $('body').on('click', '#filter', function() {
            loadData();
        });

            $('body').on('click', '#reset-filters', function() {
                $('#filter-form')[0].reset();
                $('.filter-box #status').val('not finished');
                $('.filter-box .select-picker').selectpicker("refresh");
                $('#reset-filters').addClass('d-none');
                loadData();
            });
            $('body').on('click', '#reset-filters-2', function() {
                $('#filter-form')[0].reset();
                $('.filter-box .select-picker').selectpicker("refresh");
                $('#reset-filters').addClass('d-none');
                loadData();
            });

        $('body').on('click', '#add-column', function() {
            const url = "{{ route('job-appboard.create') }}";
            $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_LG, url);
        });

        function loadData() {
            var startDate = $('#start-date').val();

            if (startDate == '') {
                startDate = null;
            }

            var endDate = $('#end-date').val();

            if (endDate == '') {
                endDate = null;
            }

            var status = $('#status').val();
            var jobID = $('#jobId').val();
            var location = $('#location').val();
            var searchText = $('#search-text-field').val();
            var gender = $('#gender').val();
            var total_experience = $('#total_experience').val();
            var current_location = $('#current_location').val();
            var current_ctc_min = $('#current_ctc_min').val();
            var current_ctc_max = $('#current_ctc_max').val();
            var expected_ctc_min = $('#expected_ctc_min').val();
            var expected_ctc_max = $('#expected_ctc_max').val();
            var url = "{{ route('job-appboard.index') }}?startDate=" + encodeURIComponent(startDate) + '&endDate=' +
                encodeURIComponent(endDate) + '&status=' + status + '&jobID=' + jobID + '&searchText=' + searchText + '&location=' + location + '&gender=' + gender + '&total_experience=' + total_experience + '&current_location=' + current_location + '&current_ctc_min=' + current_ctc_min + '&current_ctc_max=' + current_ctc_max + '&expected_ctc_min=' + expected_ctc_min + '&expected_ctc_max=' + expected_ctc_max;

            $.easyAjax({
                url: url,
                container: '#taskboard-columns',
                type: "GET",
                success: function(response) {
                    $('#taskboard-columns').html(response.view);
                    $("body").tooltip({
                        selector: '[data-toggle="tooltip"]'
                    });
                }
            });
        }

        $('body').on('click', '.load-more-tasks', function() {
            var columnId = $(this).data('column-id');
            var currentTotalTasks = $('#drag-container-' + columnId + ' .task-card').length;
            var totalTasks = $(this).data('total-tasks');

            var startDate = $('#start-date').val();

            if (startDate == '') {
                startDate = null;
            }

            var endDate = $('#end-date').val();

            if (endDate == '') {
                endDate = null;
            }

            var status = $('#status').val();
            var jobID = $('#jobId').val();
            var location = $('#location').val();
            var searchText = $('#search-text-field').val();

            var url = "{{ route('job-appboard.load_more') }}?startDate=" + encodeURIComponent(startDate) +
                '&endDate=' +
                encodeURIComponent(endDate) + '&status=' + status + '&jobID=' + jobID +
                '&searchText=' + searchText + '&currentTotalTasks=' + currentTotalTasks +
                '&totalTasks=' + totalTasks + '&columnId=' + columnId;

            $.easyAjax({
                url: url,
                container: '#drag-container-' + columnId,
                blockUI: true,
                type: "GET",
                success: function(response) {
                    $('#drag-container-' + columnId).append(response.view);
                    if (response.load_more == 'show') {
                        $('#drag-container-' + columnId).closest('.b-p-body').find('.load-more-tasks');

                    } else {
                        $('#drag-container-' + columnId).closest('.b-p-body').find('.load-more-tasks')
                            .remove();
                    }

                    $("body").tooltip({
                        selector: '[data-toggle="tooltip"]'
                    });
                }
            });

        });

        var elem = document.getElementById("fullscreen");

        function openFullscreen() {
            if (elem.requestFullscreen) {
                elem.requestFullscreen();
                elem.classList.add("full");
            } else if (elem.mozRequestFullScreen) {
                /* Firefox */
                elem.mozRequestFullScreen();
            } else if (elem.webkitRequestFullscreen) {
                /* Chrome, Safari & Opera */
                elem.webkitRequestFullscreen();
            } else if (elem.msRequestFullscreen) {
                /* IE/Edge */
                elem.msRequestFullscreen();
            }
        }

        $('body').on('click', '.delete-column', function() {
            var id = $(this).data('column-id');
            var url = "{{ route('job-appboard.destroy', ':id') }}";
            url = url.replace(':id', id);

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
                    $.easyAjax({
                        url: url,
                        type: 'POST',
                        data: {
                            '_token': '{{ csrf_token() }}',
                            '_method': 'DELETE'
                        },
                        success: function(response) {
                            if (response.status == 'success') {
                                window.location.reload();
                            }
                        }
                    });
                }
            });

        });

        $('body').on('click', '.collapse-column', function() {
            var boardColumnId = $(this).data('column-id');
            var type = $(this).data('type');
            $.easyAjax({
                url: "{{ route('job-appboard.collapse_column') }}",
                type: 'POST',
                container: '#taskboard-columns',
                blockUI: true,
                data: {
                    boardColumnId: boardColumnId,
                    type: type,
                    '_token': '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.status == 'success') {
                        loadData();
                    }
                }
            });
        });


        $('body').on('click', '.edit-column-board', function() {
            var id = $(this).data('column-id');
            var url = "{{ route('job-appboard.edit', ':id') }}";
            url = url.replace(':id', id);

            $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_LG, url);
        });

        loadData();
    </script>

    <script>
        function openApplicationFilter() {
            var omf = document.getElementById("application_filter");
            omf.classList.add("in");
        }

        function closeApplicationFilter() {
            var cls = document.getElementById("application_filter");
            cls.classList.remove("in");
        }

        if ($('#application_filter').length > 0) {
            $(document).on('mouseup', function(e)
            {
                var container = $("#application_filter");
                var searchField = $(".bs-searchbox");

                // if the target of the click isn't the container nor a descendant of the container
                if (container.is(e.target) && container.has(e.target).length === 0 && !searchField.is(e.target) && searchField.has(e.target).length === 0)
                {
                    closeApplicationFilter()
                }
            });
        }
    </script>
@endpush
