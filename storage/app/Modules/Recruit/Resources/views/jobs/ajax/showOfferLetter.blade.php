
<style>
    #logo {
        height: 33px;
    }
    .imgnew {
        height: 100px !important;
        width: 100px !important;
    }

    .new {
        height: 100% !important;
        width: 100% !important;
    }
    .rightaligned {
        margin-right: 0;
        margin-left: auto;
    }
    .mt-0 {
        margin-top: 0px;
    }

</style>

<div class="body-wrapper clearfix">
    <section class="bg-additional-grey" id="fullscreen">

        <x-app-title class="d-block d-lg-none" :pageTitle="__($pageTitle)"></x-app-title>

        <div class="content-wrapper container">
            <div class="card border-0 invoice">
                <div class="card-body">
                    <div class="invoice-table-wrapper">
                        <table width="100%">
                            <tr class="inv-logo-heading">
                                <td>
                                    <img src="{{ invoice_setting()->logo_url }}"
                                        alt="{{ ucwords($global->company_name) }}" id="logo" />
                                </td>

                                <td align="right" class="font-weight-bold f-21 text-dark text-uppercase mt-4 mt-lg-0 mt-md-0">
                                    @if ($jobOffer->status != 'expired' ||$jobOffer->status != 'draft')
                                        <span class="{{ $label_class }}">{{ $msg }}</span>
                                    @endif
                                    <a class="btn btn-secondary ml-4" href="{{ route('jobOffer.download', $jobOffer->id)}}">@lang('app.download')</a>
                                </td>
                            </tr>
                            <tr class="inv-num">
                                <td class="f-14 text-dark">
                                    <p class="mt-3 mb-0">
                                        {{ ucwords($global->company_name) }}
                                        <br>
                                        @if (!is_null($settings))
                                            {{ $global->company_phone }}
                                        @endif
                                    </p>
                                    <br>
                                </td>
                                <td>
                                    <table class="text-black b-collapse rightaligned mr-4 mt-3">
                                        <tr>
                                            <td>
                                                @if ($jobOffer->jobApplication->photo ?? false)
                                                    @php
                                                        $userImage = $jobOffer->jobApplication->hasGravatar($jobOffer->jobApplication->email) ? str_replace('?s=200&d=mp', '', $employee->image_url) : asset('img/avatar.png');
                                                    @endphp

                                                    <div class="jobApplicationImg mr-1">
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
                                <td height="20"></td>
                            </tr>
                        </table>

                        <div class="row">
                            <div class="col-sm-12">
                                <h5 class="text-grey text-capitalize">@lang('recruit::modules.joboffer.candidateDetails')</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 px-0 pb-3 d-block d-lg-flex d-md-flex">
                                    <p class="mb-0 text-lightest f-14 w-30 d-inline-block text-capitalize">
                                        @lang('recruit::modules.jobApplication.name')</p>
                                    <p class="mb-0 text-dark-grey f-14 w-70">
                                        {{ ucfirst($jobOffer->jobApplication->full_name) }}</p>
                                </div>
                                <div class="col-12 px-0 pb-3 d-block d-lg-flex d-md-flex">
                                    <p class="mb-0 text-lightest f-14 w-30 d-inline-block text-capitalize">
                                        @lang('recruit::modules.jobApplication.email')</p>
                                    <p class="mb-0 text-dark-grey f-14 w-70">
                                        {{ ucfirst($jobOffer->jobApplication->email) }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h5 class="text-grey text-capitalize">@lang('recruit::modules.joboffer.jobDetails')</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 px-0 pb-3 d-block d-lg-flex d-md-flex">
                                    <p class="mb-0 text-lightest f-14 w-30 d-inline-block text-capitalize">
                                        @lang('recruit::modules.job.jobTitle')</p>
                                    <p class="mb-0 text-dark-grey f-14 w-70">
                                        {{ ucfirst($jobOffer->job->title) }}</p>
                                </div>

                                <div class="col-12 px-0 pb-3 d-block d-lg-flex d-md-flex">
                                    <p class="mb-0 text-lightest f-14 w-30 d-inline-block text-capitalize">
                                        @lang('recruit::modules.joboffer.workExperience')</p>
                                    <p class="mb-0 text-dark-grey f-14 w-70">
                                        {{ $jobOffer->job->workExperience->work_experience }}</p>
                                </div>
                                <div class="col-12 px-0 pb-3 d-block d-lg-flex d-md-flex">
                                    <p class="mb-0 text-lightest f-14 w-30 d-inline-block text-capitalize">
                                        @lang('recruit::modules.jobApplication.location')</p>
                                    <p class="mb-0 text-dark-grey f-14 w-70">
                                        {{ $jobOffer->jobApplication->location->location ? $jobOffer->jobApplication->location->location : '' }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h5 class="text-grey text-capitalize">@lang('recruit::modules.joboffer.offerDetail')</h5>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 px-0 pb-3 d-block d-lg-flex d-md-flex">
                                            <p class="mb-0 text-lightest f-14 w-30 d-inline-block text-capitalize">
                                                @lang('app.department')</p>
                                            <p class="mb-0 text-dark-grey f-14 w-70">
                                                {{ $jobOffer->job->team->team_name }}</p>
                                        </div>
                                        <div class="col-12 px-0 pb-3 d-block d-lg-flex d-md-flex">
                                            <p class="mb-0 text-lightest f-14 w-30 d-inline-block text-capitalize">
                                                @lang('recruit::modules.joboffer.offerPer')</p>
                                            <p class="mb-0 text-dark-grey f-14 w-70">
                                                {{$global->currency->currency_symbol.' '. $jobOffer->comp_amount }} @lang('recruit::modules.joboffer.per') {{ $jobOffer->job->pay_according }}</p>
                                        </div>
                                        <div class="col-12 px-0 pb-3 d-block d-lg-flex d-md-flex">
                                            <p class="mb-0 text-lightest f-14 w-30 d-inline-block text-capitalize">
                                                @lang('recruit::modules.joboffer.joiningDate')</p>
                                            <p class="mb-0 text-dark-grey f-14 w-70">
                                                {{ $jobOffer->expected_joining_date }}</p>
                                        </div>
                                        <div class="col-12 px-0 pb-3 d-block d-lg-flex d-md-flex">
                                            <p class="mb-0 text-lightest f-14 w-30 d-inline-block text-capitalize">
                                                @lang('recruit::modules.joboffer.lastDate')</p>
                                            <p class="mb-0 text-dark-grey f-14 w-70">
                                                {{ $jobOffer->job_expire }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if ($jobOffer->files == '')
                            <div class="row">
                                <div class="col-sm-12">
                                    <h4>Files</h4>
                                </div>
                            </div>
                        @endif

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
                                                <button class="btn btn-lg f-14 p-0 text-lightest text-capitalize rounded  dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-h"></i>
                                                </button>

                                                <div class="dropdown-menu dropdown-menu-right border-grey rounded b-shadow-4 p-0" aria-labelledby="dropdownMenuLink" tabindex="0">
                                                    @if ($file->icon != 'images')
                                                        <a class="cursor-pointer d-block text-dark-grey f-13 pt-3 px-3 " target="_blank" href="{{ $file->file_url }}">@lang('app.view')</a>
                                                    @endif
                                                    <a class="cursor-pointer d-block text-dark-grey f-13 py-3 px-3 "
                                                        href="{{ route('job-offer-file.download', md5($file->id)) }}">@lang('app.download')</a>
                                                </div>
                                            </div>
                                        </x-slot>
                                </x-file-card>
                            @endforeach
                        </div>
                        @if ($jobOffer->sign_require == 'on' && $jobOffer->sign_image != null)
                            <div class="row">
                                <div class="col-sm-12 mt-4">
                                    <h6>@lang('modules.estimates.signature')</h6>
                                    <img src="{{ $jobOffer->file_url }}" style="width: 200px;">
                                    <p>({{ $jobOffer->jobApplication->full_name }}  @lang("recruit::app.menu.signedOffer")
                                        {{$jobOffer->offer_accept_at->format(global_setting()->date_format)}})</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
