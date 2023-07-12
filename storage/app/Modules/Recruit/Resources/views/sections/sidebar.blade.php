@php
$recruitManageSkillPermission = user()->permission('manage_skill');
$recruitViewJobPermission = user()->permission('view_job');
$recruitViewJobApplicationPermission = user()->permission('view_job_application');
$recruitViewInterviewPermission = user()->permission('view_interview_schedule');
$recruitViewOfferLetterPermission = user()->permission('view_offer_letter');
$recruitViewReportPermission = user()->permission('view_report');
@endphp

@if ($recruitManageSkillPermission != 'none' ||
    $recruitViewJobPermission != 'none' ||
    $recruitViewJobApplicationPermission != 'none' ||
    $recruitViewInterviewPermission != 'none' ||
    $recruitViewOfferLetterPermission != 'none' ||
    $recruitViewReportPermission != 'none')


    <x-menu-item icon="wallet" :text="__('recruit::app.menu.recruit')" :addon="App::environment('demo')">
        <x-slot name="iconPath">
            <path d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
            <path
                d="M4.5 0A2.5 2.5 0 0 0 2 2.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2.5A2.5 2.5 0 0 0 11.5 0h-7zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v10.795a4.2 4.2 0 0 0-.776-.492C11.392 12.387 10.063 12 8 12s-3.392.387-4.224.803a4.2 4.2 0 0 0-.776.492V2.5z" />
        </x-slot>

        <div class="accordionItemContent pb-2">
            <x-sub-menu-item :link="route('recruit-dashboard.index')" :text="__('recruit::app.menu.dashboard')" />

            @if ($recruitManageSkillPermission != 'none')
                <x-sub-menu-item :link="route('job-skills.index')" :text="__('recruit::app.menu.skills')" />
            @endif

            @if ($recruitViewJobPermission != 'none')
                <x-sub-menu-item :link="route('jobs.index')" :text="__('recruit::app.menu.job')" />
            @endif

            @if ($recruitViewJobApplicationPermission != 'none')
                <x-sub-menu-item :link="route('job-applications.index')" :text="__('recruit::app.menu.jobApplication')" />
            @endif

            @if ($recruitViewInterviewPermission != 'none')
                <x-sub-menu-item :link="route('interview-schedule.table_view')" :text="__('recruit::app.menu.interviewSchedule')" />
            @endif

            @if ($recruitViewOfferLetterPermission != 'none')
                <x-sub-menu-item :link="route('job-offer-letter.index')" :text="__('recruit::app.menu.offerletter')" />
            @endif

            @if ($recruitViewJobApplicationPermission != 'none')
                <x-sub-menu-item :link="route('candidate-database.index')" :text="__('recruit::app.menu.candidatedatabase')" />
            @endif

            @if ($recruitViewReportPermission != 'none')
                <x-sub-menu-item :link="route('recruit-job-report.index')" :text="__('recruit::app.menu.report')" />
            @endif

            <a class="d-block text-lightest f-14" target="_blank" href="{{ route('recruit') }}">@lang('recruit::app.menu.frontWebsite')</a>
        </div>
    </x-menu-item>
@endif
