<div class="job-right position-relative">
    <div class="bg-white sticky-top py-3 px-4 d-flex justify-content-between align-items-center">
        <h4 class="mb-0">{{ ucwords($job->title) }}</h4>
        <div class="mt-3 mt-lg-0 mt-md-0">
            @if($job->slug != null || $jobLocation->id != null)
                <a href="{{ route('job_apply',[$job->slug, $jobLocation->id]) }}" class="btn btn-primary f-14" data-toggle="tooltip"
                    data-original-title="@lang('recruit::modules.front.apply')"><i
                        class="fa fa-briefcase mr-1"></i>@lang('recruit::modules.front.apply')</a>
            @endif
        </div>
    </div>
    <input type="hidden" name="location_id{{$jobLocation->id}}" id="location_id" value="{{ $jobLocation->id }}">
    <div class="px-4">
        <h6>@lang('recruit::modules.front.skill')</h6>
        <div class="gap-multiline-items-1">
            @foreach ($job->skills as $job_skill)
                <span class="badge badge-pill badge-light border">{{ $job_skill->skill->name }}</span>
            @endforeach
            <i class="ml-2 mr-2 fa fa-map-marker"></i>{{$jobLocation->location}}
        </div>
        @if($job->job_description)
            <h6 class="mt-4 fs-16 text-dark"><b>@lang('recruit::modules.front.description')</b></h6>

            <p class="mb-0">
                {!! $job->job_description !!}
            </p>
        @else
            <p class="mb-0"></p>
        @endif
    </div>

</div>
