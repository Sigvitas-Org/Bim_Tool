<!DOCTYPE html>
<html lang="en">
<head>
    <title>@lang('recruit::app.menu.offerletter') - #{{ $jobOffer->id }}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ global_setting()->favicon_url }}">
    <meta name="theme-color" content="#ffffff">

    <style>
        body {
            margin: 0;
            font-family: Verdana, Arial, Helvetica, sans-serif;
        }
        .bg-white {
            background-color: #fff;
        }
        .f-14 {
            font-size: 14px;
        }

        .text-black {
            color: #28313c;
        }

        .text-grey {
            color: #616e80;
        }
        .text-capitalize {
            text-transform: capitalize;
        }

        .line-height {
            line-height: 24px;
        }

        .mb-0 {
            margin-bottom: 0px;
        }
        .rightaligned {
            margin-right: 0;
            margin-left: auto;
        }
        .mt-0 {
            margin-top: 0px;
        }
        .mt-2 {
            margin-top: 2rem;
        }
        .imgnew {
            height: 100px !important;
            width: 100px !important;
        }

        .new {
            height: 100% !important;
            width: 100% !important;
        }
        .f-21 {
            font-size: 21px;
        }
        .font-weight-700 {
            font-weight: 700;
        }
        .text-uppercase {
            text-transform: uppercase;
        }
        .logo {
            height: 33px;
        }
        .margin-bottom {
            margin-bottom: 20px;
        }

    </style>
</head>

<body class="content-wrapper">
    <table class="bg-white" border="0" cellpadding="0" cellspacing="0" width="100%" role="presentation">
        <tbody>
            <!-- Table Row Start -->
            <tr>
                <td><img src="{{ invoice_setting()->logo_url }}" alt="{{ ucwords($global->company_name) }}"
                        class="logo" /></td>
                <td align="right" class="f-21 text-black font-weight-700 text-uppercase">@lang('recruit::modules.job.offerletter')</td>

            </tr>
            <!-- Table Row End -->
            <!-- Table Row Start -->
            <tr>
                <td>
                    <p class="line-height mt-1 mb-0 f-14 text-black">
                        {{ ucwords($global->company_name) }}<br>
                        @if (!is_null($settings))
                            {{ $global->company_phone }}
                        @endif
                    </p>
                </td>
                <td>
                    <table class="text-black b-collapse rightaligned mr-4 mt-0">
                        <tr>
                            <td>
                                @if (!is_null($jobOffer->jobApplication->photo))
                                    @php
                                        $userImage = $jobOffer->jobApplication->hasGravatar($jobOffer->jobApplication->email) ? str_replace('?s=200&d=mp', '', $employee->image_url) : asset('img/avatar.png');
                                    @endphp

                                    <div class="jobApplicationImg mr-1 mt-2">
                                        <div class="imgnew">
                                            <img data-toggle="tooltip" class="new"
                                                data-original-title="{{ ucwords($jobOffer->jobApplication->name) }}"
                                                src="{{ $jobOffer->jobApplication->image_url }}">
                                        </div>
                                    </div>
                                @endif
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td height="20" colspan="2"></td>
            </tr>
            <h5 class="text-grey text-capitalize">@lang('recruit::modules.joboffer.candidateDetails')</h5>
            <tr>
                <td class="f-14 text-black">
                    <p class="line-height mb-0">@lang('recruit::modules.jobApplication.name')</p>
                    <p class="line-height mb-0">@lang('recruit::modules.jobApplication.email')</p>
                </td>
                <td class="f-14 text-black">
                    <p class="line-height mb-0">{{ $jobOffer->jobApplication->full_name }}</p>
                    <p class="line-height mb-0">{{ $jobOffer->jobApplication->email }}</p>
                </td>
            </tr>
            <tr>
                <td height="20" colspan="2"></td>
            </tr>
            <h5 class="text-grey text-capitalize">@lang('recruit::modules.joboffer.jobDetails')</h5>
            <tr>
                <td class="f-14 text-black">
                    <p class="line-height mb-0">@lang('recruit::modules.footerlinks.title')</p>
                    <p class="line-height mb-0">@lang('recruit::modules.joboffer.workExperience')</p>
                    <p class="line-height mb-0">@lang('recruit::modules.jobApplication.location')</p>
                </td>
                <td class="f-14 text-black">
                    <p class="line-height mb-0">{{ $jobOffer->job->title }}</p>
                    @if($jobOffer->job->workExperience->work_experience == 'fresher')
                        <p class="line-height mb-0">{{ ucfirst($jobOffer->job->workExperience->work_experience) }}</p>
                    @else
                        <p class="line-height mb-0">{{ $jobOffer->job->workExperience->work_experience }} @lang('recruit::modules.joboffer.frontText')</p>
                    @endif
                    <p class="line-height mb-0">{{ $jobOffer->jobApplication->location->location ? $jobOffer->jobApplication->location->location : '' }}</p>
                </td>
            </tr>
            <tr>
                <td height="20" colspan="2"></td>
            </tr>
            <h5 class="text-grey text-capitalize">@lang('recruit::modules.joboffer.offerDetail')</h5>
            <tr>
                <td class="f-14 text-black">
                    <p class="line-height mb-0">@lang('recruit::modules.joboffer.designation')</p>
                    <p class="line-height mb-0">@lang('recruit::modules.joboffer.offerPer')</p>
                    <p class="line-height mb-0">@lang('recruit::modules.joboffer.joiningDate')</p>
                    <p class="line-height mb-0">@lang('recruit::modules.joboffer.lastDate')</p>
                </td>
                <td class="f-14 text-black">

                    <p class="line-height mb-0">{{ $jobOffer->job->team->team_name }}</p>
                    <p class="line-height mb-0">{{$global->currency->currency_symbol.' '. $jobOffer->comp_amount }} @lang('recruit::modules.joboffer.per') {{ $jobOffer->job->pay_according }}</p>
                    <p class="line-height mb-0">{{ $jobOffer->expected_joining_date }}</p>
                    <p class="line-height mb-0">{{ $jobOffer->job_expire }}</p>
                </td>
            </tr>
        </tbody>
    </table>

    @if (!is_null($jobOffer->sign_image))
        <div style="text-align: right; margin-top: 10px;">
            <h2 class="name f-14 text-black margin-bottom">@lang('app.signature')</h2>
            {!! Html::image($jobOffer->file_url, '', ['class' => '', 'height' => '75px']) !!}
            <p class="f-14 text-black">({{ $jobOffer->jobApplication->full_name }}
                @lang("recruit::app.menu.signedOffer")
                {{$jobOffer->offer_accept_at->format(global_setting()->date_format)}})</p>
        </div>
    @endif

</body>
</html>
