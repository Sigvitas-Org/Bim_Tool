<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('vendor/css/all.min.css') }}">

    <!-- Simple Line Icons -->
    <link rel="stylesheet" href="{{ asset('vendor/css/simple-line-icons.css') }}">

    <!-- Template CSS -->
    <link type="text/css" rel="stylesheet" media="all" href="{{ asset('css/main.css') }}">

    <title>@lang($pageTitle)</title>
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ $global->favicon_url }}">
    <meta name="theme-color" content="#ffffff">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ $global->favicon_url }}">

    @isset($activeSettingMenu)
        <style>
            .preloader-container {
                margin-left: 510px;
                width: calc(100% - 510px)
            }

        </style>
    @endisset

    @stack('styles')

    <style>
        :root {
            --fc-border-color: #E8EEF3;
            --fc-button-text-color: #99A5B5;
            --fc-button-border-color: #99A5B5;
            --fc-button-bg-color: #ffffff;
            --fc-button-active-bg-color: #171f29;
            --fc-today-bg-color: #f2f4f7;
        }

        .preloader-container {
            height: 100vh;
            width: 100%;
            margin-left: 0;
            margin-top: 0;
        }

        .fc a[data-navlink] {
            color: #99a5b5;
        }

    </style>
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

        .signature_wrap {
            position: relative;
            height: 150px;
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
            user-select: none;
            width: 400px;
        }

        .signature-pad {
            position: absolute;
            left: 0;
            top: 0;
            width: 400px;
            height: 150px;
        }

    </style>


    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery/modernizr.min.js') }}"></script>

    <script>
        var checkMiniSidebar = localStorage.getItem("mini-sidebar");
    </script>

</head>

<body id="body" class="h-100 bg-additional-grey">

    <!-- BODY WRAPPER START -->
    <div class="body-wrapper clearfix">


        <!-- MAIN CONTAINER START -->
        <section class="bg-additional-grey" id="fullscreen">

            <div class="preloader-container d-flex justify-content-center align-items-center">
                <div class="spinner-border" role="status" aria-hidden="true"></div>
            </div>

            <x-app-title class="d-block d-lg-none" :pageTitle="__($pageTitle)"></x-app-title>

            <div class="content-wrapper container">

                <!-- INVOICE CARD START -->

                <div class="card border-0 invoice">
                    <!-- CARD BODY START -->
                    <div class="card-body">
                        <div class="invoice-table-wrapper">
                            <table width="100%" class="">
                                <tr class=" inv-logo-heading">
                                    <td><img src="{{ invoice_setting()->logo_url }}"
                                            alt="{{ ucwords($global->company_name) }}" id="logo" /></td>

                                    <td align="right" class="font-weight-bold f-21 text-dark text-uppercase mt-4 mt-lg-0 mt-md-0">

                                        @if ($jobOffer->status != 'expired' ||$jobOffer->status != 'draft')

                                        <span class="{{ $label_class }}">{{ $msg }}</span>
                                        @endif
                                        <a class="btn btn-secondary ml-4"
                                        href="{{ route('jobOffer.download', $jobOffer->id)}}">@lang('app.download')</a>
                                    </td>
                                </tr>
                                <tr class="inv-num">
                                    <td class="f-14 text-dark">
                                        <p class="mt-3 mb-0">
                                            {{ ucwords($global->company_name) }}<br>
                                            @if (!is_null($settings))
                                                {{ $global->company_phone }}
                                            @endif

                                        </p><br>
                                    </td>
                                    <td>
                                        <table class="text-black b-collapse rightaligned mr-4 mt-3">
                                            <tr>
                                                <td>
                                                    @if (!is_null($jobOffer->jobApplication->photo))
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
                                            {{ ucfirst($jobOffer->jobApplication->full_name) }}
                                        </p>
                                    </div>
                                    <div class="col-12 px-0 pb-3 d-block d-lg-flex d-md-flex">
                                        <p class="mb-0 text-lightest f-14 w-30 d-inline-block text-capitalize">
                                            @lang('recruit::modules.jobApplication.email')</p>
                                        <p class="mb-0 text-dark-grey f-14 w-70">
                                            {{ ucfirst($jobOffer->jobApplication->email) }}
                                        </p>
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
                                            {{ ucfirst($jobOffer->job->title) }}
                                        </p>
                                    </div>

                                    <div class="col-12 px-0 pb-3 d-block d-lg-flex d-md-flex">
                                        <p class="mb-0 text-lightest f-14 w-30 d-inline-block text-capitalize">
                                            @lang('recruit::modules.joboffer.workExperience')
                                        </p>
                                        <p class="mb-0 text-dark-grey f-14 w-70">
                                            {{ $jobOffer->job->workExperience->work_experience }}
                                        </p>
                                    </div>
                                    <div class="col-12 px-0 pb-3 d-block d-lg-flex d-md-flex">
                                        <p class="mb-0 text-lightest f-14 w-30 d-inline-block text-capitalize">
                                            @lang('recruit::modules.jobApplication.location')
                                        </p>
                                        <p class="mb-0 text-dark-grey f-14 w-70">
                                            {{ $jobOffer->jobApplication->location->location ? $jobOffer->jobApplication->location->location : '' }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <h5 class="text-grey text-capitalize">@lang('recruit::modules.joboffer.offerDetail')</h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 px-0 pb-3 d-block d-lg-flex d-md-flex">
                                        <p class="mb-0 text-lightest f-14 w-30 d-inline-block text-capitalize">
                                            @lang('recruit::modules.joboffer.designation')</p>
                                        <p class="mb-0 text-dark-grey f-14 w-70">
                                            {{ $jobOffer->job->team->team_name }}
                                        </p>
                                    </div>
                                    <div class="col-12 px-0 pb-3 d-block d-lg-flex d-md-flex">
                                        <p class="mb-0 text-lightest f-14 w-30 d-inline-block text-capitalize">
                                            @lang('recruit::modules.joboffer.offerPer')</p>
                                        <p class="mb-0 text-dark-grey f-14 w-70">
                                            {{$global->currency->currency_symbol.' '. $jobOffer->comp_amount }} @lang('recruit::modules.joboffer.per') {{ $jobOffer->job->pay_according }}
                                        </p>
                                    </div>
                                    <div class="col-12 px-0 pb-3 d-block d-lg-flex d-md-flex">
                                        <p class="mb-0 text-lightest f-14 w-30 d-inline-block text-capitalize">
                                            @lang('recruit::modules.joboffer.joiningDate')</p>
                                        <p class="mb-0 text-dark-grey f-14 w-70">
                                            {{ $jobOffer->expected_joining_date }}
                                        </p>
                                    </div>
                                    <div class="col-12 px-0 pb-3 d-block d-lg-flex d-md-flex">
                                        <p class="mb-0 text-lightest f-14 w-30 d-inline-block text-capitalize">
                                            @lang('recruit::modules.joboffer.lastDate')</p>
                                        <p class="mb-0 text-dark-grey f-14 w-70">
                                            {{ $jobOffer->job_expire }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            @if (count($jobOffer->files) > null)
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
                                        <p>({{ $jobOffer->jobApplication->full_name }}
                                            @lang("recruit::app.menu.signedOffer")
                                            {{$jobOffer->offer_accept_at->format(global_setting()->date_format)}})</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <!-- CARD BODY END -->
                    <!-- CARD FOOTER START -->
                    <div class="card-footer bg-white border-1 d-flex justify-content-end py-0 py-lg-4 py-md-4 mb-4 mb-lg-3 mb-md-3 ">

                        <div class="d-flex">
                            @if ($jobOffer->status == 'pending' && $job_not_expired == true)


                            <a class="dropdown-item f-14 btn btn-primary" data-toggle="modal"
                            data-target="#signature-modal" href="javascript:;">
                            <i class="fa fa-check f-w-500 mr-2 f-11"></i> @lang('app.accept')
                            </a>

                            <a class="dropdown-item f-14 btn btn-danger ml-2" data-toggle="modal"
                                            data-target="#reason-modal" href="javascript:;">
                                                <i class="fa fa-times f-w-500 mr-2 f-11"></i> @lang('app.decline')
                            </a>

                            @endif
                        </div>
                    </div>
                    <!-- CARD FOOTER END -->
                </div>
                <!-- INVOICE CARD END -->

                <div id="signature-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog d-flex justify-content-center align-items-center modal-md">
                        <div class="modal-content">
                            @include('recruit::jobs.offer-letter.accept-job-offer')
                        </div>
                    </div>
                </div>

                <div id="reason-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog d-flex justify-content-center align-items-center modal-md">
                        <div class="modal-content">
                            @include('recruit::jobs.offer-letter.decline-job-offer')
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>

    <!-- also the modal itself -->
    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog d-flex justify-content-center align-items-center modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modelHeading">@lang('recruit::modules.joboffer.modalTitle')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    Loading...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel rounded mr-3" data-dismiss="modal">@lang('app.close')</button>
                    <button type="button" class="btn-primary rounded">@lang('recruit::modules.joboffer.saveChanges')</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Global Required Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>

    <script src="{{ asset('vendor/jquery/signature_pad.min.js') }}"></script>
    <script>
        const MODAL_LG = '#myModal';
        const MODAL_HEADING = '#modelHeading';
        const dropifyMessages = {
            default: '@lang("app.dragDrop")',
            replace: '@lang("app.dragDropReplace")',
            remove: '@lang("app.remove")',
            error: '@lang("app.largeFile")'
        };

        $(window).on('load', function() {
            // Animate loader off screen
            init();
            $(".preloader-container").fadeOut("slow", function() {
                $(this).removeClass("d-flex");
            });
        });

        $(body).on('click', '#download-invoice', function() {
            window.location.href = "{{ route('invoices.download', [1]) }}";
        })
    </script>


    <script>
        var canvas = document.getElementById('signature-pad');

        var signaturePad = new SignaturePad(canvas, {
            backgroundColor: 'rgb(255, 255, 255)' // necessary for saving image as JPEG; can be removed is only saving as PNG or SVG
        });

        document.getElementById('clear-signature').addEventListener('click', function(e) {
            e.preventDefault();
            signaturePad.clear();
        });

        document.getElementById('undo-signature').addEventListener('click', function(e) {
            e.preventDefault();
            var data = signaturePad.toData();
            if (data) {
                data.pop(); // remove the last dot or line
                signaturePad.fromData(data);
            }
        });

        $('body').on('click', '#decline-offer-letter', function() {
            var status = 'decline';
            var decline_reason = $('#reason').val();

            decline_reason = decline_reason.trim();
            if (!decline_reason) {
                Swal.fire({
                    icon: 'error',
                    text: '{{ __('recruit::messages.Reasonis') }}',

                    customClass: {
                        confirmButton: 'btn btn-primary',
                    },
                    showClass: {
                        popup: 'swal2-noanimation',
                        backdrop: 'swal2-noanimation'
                    },
                    buttonsStyling: false
                });
                return false;
            }

            $.easyAjax({
                url: "{{ route('front.job-offer.accept', $jobOffer->id) }}",
                container: '#decline',
                type: "POST",
                blockUI: true,
                data: {
                    status: status,
                    reason : decline_reason,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.status == 'success') {
                        window.location.reload();
                    }
                }
            })
        });

        $('body').on('click', '#save-signature', function() {
            var status = 'accept';
            var signature = signaturePad.toDataURL('image/png');
            var signatureReq = '{{$jobOffer->sign_require}}';
            if (signaturePad.isEmpty() && signatureReq == "on" ) {

                Swal.fire({
                    icon: 'error',
                    text: '{{ __('messages.signatureRequired') }}',

                    customClass: {
                        confirmButton: 'btn btn-primary',
                    },
                    showClass: {
                        popup: 'swal2-noanimation',
                        backdrop: 'swal2-noanimation'
                    },
                    buttonsStyling: false
                });
                return false;
            }

            $.easyAjax({
                url: "{{ route('front.job-offer.accept', $jobOffer->id) }}",
                container: '#accept',
                type: "POST",
                blockUI: true,
                data: {
                    status: status,
                    signature: signature,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.status == 'success') {
                        window.location.reload();
                    }
                }
            })
        });

        $('body').on('click', '#accept-letter', function() {
            var status = 'accept';

            $.easyAjax({
                url: "{{ route('front.job-offer.accept', $jobOffer->id) }}",
                container: '#accept',
                type: "POST",
                blockUI: true,
                data: {
                    status: status,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.status == 'success') {
                        window.location.reload();
                    }
                }
            })
        });

        $('body').on('click', '.img-lightbox', function() {
            var imageUrl = $(this).data('image-url');
            const url = "{{ route('invoices.public.show_image') . '?image_url=' }}" + imageUrl;
            $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_LG, url);
        });
    </script>

</body>

</html>
