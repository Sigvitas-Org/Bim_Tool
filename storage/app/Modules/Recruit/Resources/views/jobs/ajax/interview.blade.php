@extends('layouts.app')

@push('datatable-styles')
    @include('sections.datatable_css')
@endpush

@section('filter-section')

    <x-filters.filter-box>
        <!-- DATE START -->
        <div class="select-box d-flex pr-2 border-right-grey border-right-grey-sm-0">
            <p class="mb-0 pr-3 f-14 text-dark-grey d-flex align-items-center">@lang('app.date')</p>
            <div class="select-status d-flex">
                <input type="text" class="position-relative text-dark form-control border-0 p-2 text-left f-14 f-w-500"
                    id="datatableRange" placeholder="@lang('placeholders.dateRange')">
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
                <label class="f-14 text-dark-grey mb-12 text-capitalize" for="usr">@lang('app.status')</label>
                <div class="select-filter mb-4">
                    <div class="select-others">
                        <select class="form-control select-picker" name="status" data-container="body" id="status">
                            <option value="all">@lang('app.all')</option>
                            <option value="rejected">@lang('app.rejected')</option>
                            <option value="hired">@lang('app.hired')</option>
                            <option value="pending">@lang('app.pending')</option>
                            <option value="canceled">@lang('app.canceled')</option>
                        </select>
                    </div>
                </div>
            </div>

        </x-filters.more-filter-box>
        <!-- MORE FILTERS END -->
    </x-filters.filter-box>

@endsection

@php
$addInterviewPermission = user()->permission('add_interview_schedule');
@endphp

@section('content')
    <!-- CONTENT WRAPPER START -->
    <div class="content-wrapper">
        <!-- Add Task Export Buttons Start -->
        <div class="d-flex justify-content-between action-bar">

            <div id="table-actions" class="d-block d-lg-flex align-items-center">
                @if ($addInterviewPermission == 'all' || $addInterviewPermission == 'added')
                    <x-forms.link-primary :link="route('interview-schedule.create',['id' => $jobId])" class="mr-3 openRightModal"
                        icon="plus" data-redirect-url="{{ url()->full() }}">
                        @lang('add') @lang('recruit::app.menu.interviewSchedule')
                    </x-forms.link-primary>
                @endif

            </div>
            <div class="d-flex">
                <x-datatable.actions>
                    <div class="select-status mr-3 pl-3">
                        <select name="action_type" class="form-control select-picker" id="quick-action-type" disabled>
                            <option value="">@lang('app.selectAction')</option>
                            <option value="change-status">@lang('modules.tasks.changeStatus')</option>
                            <option value="delete">@lang('app.delete')</option>
                        </select>
                    </div>
                    <div class="select-status mr-3 d-none quick-action-field" id="change-status-action">
                        <select name="status" class="form-control select-picker">
                            <option value="selectStatus">@lang('app.all')</option>
                            <option value="rejected">@lang('app.rejected')</option>
                            <option value="hired">@lang('app.hired')</option>
                            <option value="pending">@lang('app.pending')</option>
                            <option value="canceled">@lang('app.canceled')</option>
                        </select>
                    </div>
                </x-datatable.actions>

                <div class="btn-group mt-3 mt-lg-0 mt-md-0 ml-3" role="group">
                    <a href="{{ route('interview-schedule.index') }}" class="btn btn-secondary f-14" data-toggle="tooltip"
                    data-original-title="@lang('recruit::app.menu.calendarView')"><i
                    class="ide-icon bi bi-calendar"></i></a>
                    <a href="{{ route('interview-schedule.table_view') }}" class="btn btn-secondary f-14 btn-active"
                    data-toggle="tooltip" data-original-title="@lang('recruit::app.menu.tableView')"><i
                    class="side-icon bi bi-list-ul"></i></a>

                </div>
            </div>

        </div>
        <!-- Add Task Export Buttons End -->
        <!-- Task Box Start -->
        <div class="d-flex flex-column w-tables rounded mt-3 bg-white">

            {!! $dataTable->table(['class' => 'table table-hover border-0 w-100']) !!}

        </div>
        <!-- Task Box End -->
    </div>
    <!-- CONTENT WRAPPER END -->

@endsection

@push('scripts')
    @include('sections.datatable_js')

    <script>
        $('#interview-schedule-table').on('preXhr.dt', function(e, settings, data) {
            data['job_id'] = '{{ $job->id }}';
        });

        const showTable = () => {
            window.LaravelDataTables["interview-schedule-table"].draw();
        }

        $('#search-text-field, #status, #location, #job')
            .on('change keyup', function() {
                if ($('#search-text-field').val() !== "") {
                    $('#reset-filters').removeClass('d-none');
                } else if ($('#status').val() != "all") {
                    $('#reset-filters').removeClass('d-none');
                    showTable();
                }
                showTable();
            });
        $('body').on('click', '#reset-filters', function() {
            $('#filter-form')[0].reset();
            $('.filter-box #status').val('not finished');
            $('.filter-box .select-picker').selectpicker("refresh");
            $('#reset-filters').addClass('d-none');
            showTable();
        });
        $('body').on('click', '#reset-filters-2', function() {
            $('#filter-form')[0].reset();
            $('.filter-box .select-picker').selectpicker("refresh");
            $('#reset-filters').addClass('d-none');
            showTable();
        });
        $('#quick-action-type').change(function() {
            const actionValue = $(this).val();
            if (actionValue !== '') {
                $('#quick-action-apply').removeAttr('disabled');

                if (actionValue === 'change-status') {
                    $('.quick-action-field').addClass('d-none');
                    $('#change-status-action').removeClass('d-none');
                } else {
                    $('.quick-action-field').addClass('d-none');
                }
            } else {
                $('#quick-action-apply').attr('disabled', true);
                $('.quick-action-field').addClass('d-none');
            }
        });
        $('body').on('click', '#quick-action-apply', function() {
            const actionValue = $('#quick-action-type').val();
            if (actionValue == 'delete') {
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
                        applyQuickAction();
                    }
                });

            } else {
                applyQuickAction();
            }
        });
        const applyQuickAction = () => {
            var rowdIds = $("#interview-schedule-table input:checkbox:checked").map(function() {
                return $(this).val();
            }).get();

            const url = "{{ route('interview-schedule.apply_quick_action') }}?row_ids=" + rowdIds;

            $.easyAjax({
                url: url,
                container: '#quick-action-form',
                type: "POST",
                disableButton: true,
                buttonSelector: "#quick-action-apply",
                data: $('#quick-action-form').serialize(),
                success: function(response) {
                    if (response.status == 'success') {
                        showTable();
                        resetActionButtons();
                        deSelectAll();
                    }
                }
            })
        };
        $('body').on('click', '.delete-table-row', function() {
            var id = $(this).data('user-id');
            console.log(id);
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
                    var url = "{{ route('interview-schedule.destroy', ':id') }}";
                    url = url.replace(':id', id);
                    var token = "{{ csrf_token() }}";
                    $.easyAjax({
                        type: 'POST',
                        url: url,
                        blockUI: true,
                        data: {
                            '_token': token,
                            '_method': 'DELETE'
                        },
                        success: function(response) {
                            if (response.status == "success") {
                                showTable();
                            }
                        }
                    });
                }
            });
        });

        $('body').on('click', '.reschedule-interview', function() {
            var id = $(this).data('user-id');
            const url = "{{ route('interview-schedule.reschedule') }}?id="+id;
            $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_LG, url);
        });

        $('body').on('change', '.change-interview-status', function() {
            var id = $(this).data('interview-id');
            var url = "{{ route('interview-schedule.change_interview_status') }}";

            var token = "{{ csrf_token() }}";
            var status = $(this).val();

            if (typeof id !== 'undefined') {
                $.easyAjax({
                    url: "{{ route('interview-schedule.change_interview_status') }}",
                    type: "POST",
                    data: {
                        '_token': token,
                        interviewId: id,
                        status: status
                    },

                    success: function(response) {
                        if (response.status == "success") {
                            showTable();
                            resetActionButtons();
                            deSelectAll();
                        }
                    }
                });
            }
        });

        $('body').on('click', '.employeeResponse', function() {
            var action = $(this).data('response-action');
            var responseId = $(this).data('response-id');
            var url = "{{ route('interview-schedule.employee_response') }}";
            var msg;

            Swal.fire({
                title: "@lang('messages.sweetAlertTitle')",
                icon: 'warning',
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText: "@lang('messages.confirm')",
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
                        type: 'POST',
                        url: url,
                        blockUI: true,
                        data: {
                            'action': action,
                            'responseId': responseId,
                            '_token': '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            if (response.status == 'success') {
                                showTable();
                                resetActionButtons();
                                deSelectAll();
                            }
                        }
                    });
                }
            });

        });

    </script>
@endpush