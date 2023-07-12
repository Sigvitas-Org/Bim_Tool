@php
$moveClass = '';
@endphp
@if ($draggable == 'false')
    @php
        $moveClass = 'move-disable';
    @endphp
@endif

<div class="card rounded bg-white border-grey b-shadow-4 m-1 mb-3 {{ $moveClass }} task-card"
    data-app-id="{{ $application->id }}" id="drag-task-{{ $application->id }}">
    <div class="card-body p-2">
        <div class="d-flex justify-content-between mb-2">
            <div class="d-flex flex-wrap align-items-center">
                @php
                    $userImage = $application->hasGravatar($application->email) ? str_replace('?s=200&d=mp', '', $application->image_url) : asset('img/avatar.png');
                @endphp
                <div class="avatar-img mr-2 rounded-circle">
                    <a href="#" alt="{{ ucwords($application->full_name) }}"
                        data-toggle="tooltip" data-original-title="{{ ucwords($application->full_name) }}"
                        data-placement="right"><img src="{{$application->photo ? $application->image_url : $userImage}}"></a>
                </div>
                <a href="{{ route('job-applications.show', [$application->id]) }}"
                    class="f-12 f-w-500 text-dark mb-0 text-wrap openRightModal">{{ ucfirst($application->full_name) }}</a>
            </div>
        </div>

        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex flex-wrap align-items-center">
                    <a class="text-primary f-12">{{ $application ? $application->email : '' }}</a>
            </div>
            <div class="d-flex flex-wrap align-items-center">
                    <a class="text-primary f-12">{{ $application ? $application->phone : '' }}</a>
            </div>
        </div>

        @if ($application->applicationStatus->category_id == 2)
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex flex-wrap align-items-center">
                        <a class="text-lightest f-12">{{ $application ? $application->remark : '' }}</a>
                </div>
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center">
            @if ($application->job_id)
                <div class="d-flex align-items-center">
                    <i class="fa fa-layer-group f-11 text-lightest"></i>
                    <span
                        class="ml-2 f-12 text-lightest">{{ ucfirst($application->job->title) }}</span>
                </div>
            @endif

            <div class="d-flex justify-content-between align-items-center">
                @if (!is_null($application->created_at))
                    @if ($application->created_at->endOfDay()->isPast())
                        <div class="d-flex text-red">
                            <i class="f-11 mt-1 bi bi-calendar align-items-center"></i><span
                                class="f-11 ml-1">{{ $application->created_at->format(global_setting()->date_format) }}</span>
                        </div>
                    @elseif($application->created_at->setTimezone(global_setting()->timezone)->isToday())
                        <div class="d-flex text-dark-green align-items-center">
                            <i class="fa fa-calendar-alt f-11"></i><span class="f-12 ml-1">@lang('app.today')</span>
                        </div>
                    @else
                        <div class="d-flex text-lightest align-items-center">
                            <i class="fa fa-calendar-alt f-11"></i><span
                                class="f-11 ml-1">{{ $application->created_at->format(global_setting()->date_format) }}</span>
                        </div>
                    @endif
                @endif
            </div>

        </div>

    </div>
</div><!-- div end -->
