<div id="task-detail-section">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 mb-4 mb-xl-0 mb-lg-4 mb-md-0">
            <div class="card bg-white border-0 b-shadow-4">
                <div class="card-header bg-white  border-bottom-grey text-capitalize justify-content-between p-20">
                    <div class="row">
                        <div class="col-lg-8 col-10">
                            <h1 class="heading-h1">
                                {{ ucfirst($application[0]->name) }}</h1>
                        </div>
                        <div class="col-lg-4 col-2 text-right">
                            <x-forms.button-primary  data-status="completed"
                                class="change-task-status mr-3" id="retrive_job">
                                @lang('recruit::modules.job.retrive')
                            </x-forms.button-primary>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-8 col-lg-8 col-md-12 mb-4 mb-xl-0 mb-lg-4 mb-md-0">

                            <div class="col-12 px-0 pb-3 d-block d-lg-flex d-md-flex">
                                <p class="mb-0 text-lightest f-14 w-30 d-inline-block text-capitalize">
                                    @lang('recruit::modules.job.jobTitle')</p>
                                <p class="mb-0 text-dark-grey f-14 w-70">
                                    {{ ucfirst($application[0]->job) }}
                                </p>
                            </div>
                            <div class="col-12 px-0 pb-3 d-block d-lg-flex d-md-flex">
                                <p class="mb-0 text-lightest f-14 w-30 d-inline-block text-capitalize">
                                    @lang('recruit::modules.job.location')</p>
                                <p class="mb-0 text-dark-grey f-14 w-70">
                                    {{ ucfirst($application[0]->location) }}
                                </p>
                            </div>
                            <div class="col-12 px-0 pb-3 d-block d-lg-flex d-md-flex">
                                <p class="mb-0 text-lightest f-14 w-30 d-inline-block text-capitalize">
                                    @lang('recruit::modules.jobApplication.jobapplied')</p>
                                <p class="mb-0 text-dark-grey f-14 w-70">
                                    {{ date('d-m-Y', strtotime($application[0]->Job_applied_on)) }}
                                </p>
                            </div>
                            <div class="col-12 px-0 pb-3 d-block d-lg-flex d-md-flex">
                                <p class="mb-0 text-lightest f-14 w-30 d-inline-block text-capitalize">
                                    @lang('recruit::modules.jobApplication.skills')</p>
                                <p class="mb-0 text-dark-grey f-14 w-70">
                                    @foreach ($skills as $item)
                                    <span>{{ $item['name'] }}</span><br>
                                    @endforeach
                                </p>
                            </div>



                        </div>

                    </div>
                </div>
            </div>

             <!-- TASK TABS START -->

            <!-- TASK TABS END -->
        </div>
    </div>
</div>
<script>

    $(document).ready(function() {
             $("body").on("click", ".ajax-tab", function(event) {
                event.preventDefault();

                $('.task-tabs .ajax-tab').removeClass('active');
                $(this).addClass('active');

                const requestUrl = this.href;

                $.easyAjax({
                    url: requestUrl,
                    blockUI: true,
                    container: "#nav-tabContent",
                    historyPush: ($(RIGHT_MODAL).hasClass('in') ? false : true),
                    data: {
                        'json': true
                    },
                    success: function(response) {
                        if (response.status == "success") {
                            $('#nav-tabContent').html(response.html);
                        }
                    }
                });
            });




            $("#selectSkill").selectpicker({
            actionsBox: true,
            selectAllText: "{{ __('modules.permission.selectAll') }}",
            deselectAllText: "{{ __('modules.permission.deselectAll') }}",
            multipleSeparator: " ",
            selectedTextFormat: "count > 8",
            countSelectedText: function(selected, total) {
                return selected + " {{ __('app.membersSelected') }} ";
            }
        });
    });

    $('#retrive_job').on('click', function() {

    var url = "{{ route('candidate-database.update',$application[0]->id) }}";
    var token = "{{ csrf_token() }}";

        $.easyAjax({
            url: url,
            type: "PUT",
            data: {
                '_token': token,
                job_app_id: {{ $application[0]->job_application_id }}
            },
            success: function(response) {
                if(response.status == 'success')
                {
                    setTimeout(() => {
                            window.location.href = "{{ route('job-applications.index') }}"
                        }, 500);
                }
            }
        });
    });
</script>

