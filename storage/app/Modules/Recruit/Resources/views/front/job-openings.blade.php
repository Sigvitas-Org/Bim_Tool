@extends('recruit::layouts.front')
<style>
    .active{
        background: #E3E9F0 !important;

    }
    .front-background{
        background-color: #F2F4F7;
    }
</style>
<body>
    <!-- Header Start -->
@section('content')

    <header class="sticky-top bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12 py-2 login_header d-flex justify-content-between align-items-center">
                    <a href="{{ url('/recruit') }}">
                        <img class ="mr-2 rounded" src="{{ $global->logo_url }}">
                    </a>
                    <h3 class="mb-0 pl-1 ">{{ $companyName }}</h3>
                    @if (auth()->user())
                        <x-forms.link-secondary :link="route('recruit-dashboard.index')" class="mr-3 openRightModal float-left mb-2 mb-lg-0 mb-md-0">
                            @lang('recruit::app.menu.goToDashboard')
                        </x-forms.link-secondary>
                    @else
                        <x-forms.link-secondary :link="route('login')" class="mr-3 openRightModal float-left mb-2 mb-lg-0 mb-md-0">
                            @lang('app.login')
                        </x-forms.link-secondary>
                    @endif
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Content Start -->
    <section class="front-background py-5">
        <div class="container">
            <div class="job-container">
                <div class="job-left">
                    <ul class="list-style-none">
                        @forelse($locations as $locationData)
                            @if(!is_null($locationData->job))
                            <li class="border-bottom-grey cursor-pointer job-opening-card">
                                <div class="card border-0 p-4">
                                    <div class="card-block" onclick="openJobDetail({{$locationData->job->id}},
                                    {{ $locationData->address_id }})">
                                        <input type="hidden" name="job_id{{$locationData->job->id}}" id="job_id" value="{{ $locationData->job->id }}">
                                        <h5 class="card-title mb-0">{{ ucwords($locationData->job->title) }}
                                        </h5>
                                        <small class="text-dark-grey">@lang('app.by') {{ ucwords($companyName) }}</small>
                                        <div class="d-flex flex-wrap justify-content-between card-location mt-5">

                                            <span class="fw-400 fs-14"><i class="mr-2 fa fa-map-marker"></i>{{ ucwords($locationData->location->location) }}</span>

                                            <span class="fw-400 fs-14">{{ ucwords($locationData->job->team->team_name) }}<i class="ml-2 fa fa-graduation-cap"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endif
                        @empty
                        <x-cards.no-record icon="list" :message="__('recruit::messages.noOpenings')" />
                        @endforelse
                    </ul>
                </div>
                <div class="job-right position-relative">
                    @if ($firstJob == '')
                        <x-cards.no-record icon="list" :message="__('recruit::messages.noOpenings')" />
                    @else

                        <div class ="jobDetail">
                            <div class="bg-white sticky-top py-3 px-4 d-flex justify-content-between align-items-center">
                                <h4 class="mb-0">{{ ucwords($firstJob->title) }}</h4>
                                <div class="mt-3 mt-lg-0 mt-md-0">
                                    <a href="{{ route('job_apply',$firstJob->slug) }}" class="btn btn-primary f-14" data-toggle="tooltip"
                                        data-original-title="@lang('recruit::modules.front.apply')"><i
                                        class="fa fa-briefcase mr-1"></i>@lang('recruit::modules.front.apply')</a>
                                </div>
                            </div>
                            <div class="px-4">
                                <h6>@lang('recruit::modules.front.skill')</h6>
                                <div class="gap-multiline-items-1">
                                    @foreach ($firstJob->skills as $job_skill)
                                        <span class="badge badge-pill badge-light border">{{ $job_skill->skill->name }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection

<!-- Content End -->
@push('scripts')

    <script>
        $(document).ready(function() {
            $("ul li:first").find('.card').addClass('active');
            $('body').on('click', '.job-opening-card', function() {
                $('.job-opening-card').find('.card').removeClass("active");
                $(this).find('.card').addClass('active');
            });
        });
        
        @if ($locations->count() > 0 &&  $locations[0]->job != null){
            var jobid = '{{ $locations[0]->job->id }}'
            var  locationid = '{{ $locations[0]->address_id}}'
            openJobDetail(jobid, locationid);
        } 
        @else {
            var jobid = ''
            var  locationid = ''
        }
        @endif

       function openJobDetail(job_id, location_id) {
        var id = job_id;
        var locationId = location_id

        var url = "{{route('job-detail', [':id', ':locationId'])}}";
        url = url.replace(':id', id);
        url = url.replace( ':locationId', locationId);
        
        $.easyAjax({
            url: url,
            type: "GET",
            blockUI: true,
            success: function(response) {
                if (response.status == "success") {
                    $('.jobDetail').html(response.html);
                }
            }
        })
    }
    </script>
@endpush

</body>

