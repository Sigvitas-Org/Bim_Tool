@extends('recruit::layouts.front')
    <link rel="stylesheet" href="{{ asset('vendor/css/tagify.css') }}">
    <!-- Header Start -->
<link rel="stylesheet" href="{{ asset('vendor/css/tagify.css') }}">
@php
    if($setting->background_image == null)
    {
        $img = asset('img/image-bg.jpg');
    }
    else {
        $img = 'user-uploads/background/'.$setting->background_image;
    }
@endphp

<style>
    .banner-header{
        background-image: url({{$img}});
        background-repeat: no-repeat;
        background-position: center;
        height: 200px;
    }

    .banner-color{
        background-color: {{ $setting->background_color}};
        background-repeat: no-repeat;
        background-position: center;
        height: 200px;

    }

    .header-banner-logo{
        position: absolute !important;
        background-color: white !important;
        width: 130px !important;
        height: 130px !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        bottom: -49px !important;
    }
    .front-background{
        background-color: #F2F4F7;
    }
    .site-footer {
        font-size: 0.75rem;
        border-top: 1px solid #f1f2f3;
        padding: 20px 0;
        position:absolute;
    }

</style>
<!-- Header Start -->
@section('content')

<header class="sticky-top bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 py-2 login_header d-flex justify-content-between align-items-center">
                <img class="mr-2 rounded" src="{{ $global->logo_url }}">
                <h3 class="mb-0 pl-1 ">{{ $companyName }}</h3>
                @if (auth()->user())
                    <x-forms.link-secondary :link="route('recruit-dashboard.index')" class="mr-3 openRightModal float-left mb-2 mb-lg-0 mb-md-0">
                        @lang('recruit::app.menu.goToDashboard')
                    </x-forms.link-secondary>
                    @else
                    <x-forms.link-primary :link="route('login')" class="mr-3 openRightModal float-left mb-2 mb-lg-0 mb-md-0">
                        @lang('app.login')
                    </x-forms.link-primary>
                @endif
            </div>
        </div>
    </div>
</header>
<!-- Header End -->

<!-- Content Start -->
<section class="front-background py-5 main-content">
    <div class="container">
        <!-- Banner Start -->
        <div class="row">
            <div class="col-md-12">
                <div class="bg-white rounded overflow-auto border-grey">
                    <div class="col-md-12

                    @if($setting->type == 'bg-image')
                    banner-header
                    @else
                    banner-color
                    @endif
                    "
                    id="bannerImg">
                        <div class="header-banner-logo rounded">
                            @php
                                $logo = asset('img/worksuite-logo.png');
                            @endphp
                            <img src={{($setting)?$setting->logo_url : $logo }} />
                        </div>
                    </div>
                    <div
                        class="col-md-12 mt-5 pb-4 d-block d-lg-flex d-md-flex  justify-content-between align-items-end">
                        <div class="">
                            <h3>{{ $setting->company_name }}</h3>
                            <p class="mb-0">{{ $setting->company_website }}</p>
                            {{-- <p class="text-dark-grey mb-0">{{ $global->address }}</p> --}}
                        </div>

                        <div class="mt-3 mt-lg-0 mt-md-0">
                            <a href="{{ route('job_opening') }}" class="btn btn-primary f-14" data-toggle="tooltip"
                                data-original-title="@lang('recruit::app.menu.job')"><i
                                    class="fa fa-briefcase mr-1"></i>@lang('recruit::app.menu.job')</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Banner End -->
        <!-- Overview Start -->
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="bg-white rounded overflow-auto border-grey">
                    <div class="col-md-12 mt-3 pb-4 success-message">
                        <h4 class="mb-3">@lang('app.about')</h4>
                        <p class="text-dark-grey mb-0 text-justify">{!! $setting->about !!}</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Overview End -->
        <!-- Location Start -->
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="bg-white rounded overflow-auto border-grey">
                    <div class="col-md-12 mt-3 pb-4">
                        <h4 class="mb-3">Location</h4>
                        <div id="infowindow-content">
                            <span id="place-name" class="title"></span><br />
                            <span id="place-address"></span>
                        </div>
                        <div id="map" class="border rounded"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Location End -->
    </div>
</section>


@endsection
<!-- Content End -->
@push('scripts')
    <script
        src="https://maps.googleapis.com/maps/api/js?key={{ global_setting()->google_map_key }}&callback=initMap&libraries=places&v=weekly"
        async>
    </script>

    <script>
        const myLatLng = {
            lat: parseFloat(global_setting.latitude),
            lng: parseFloat(global_setting.longitude)
        };

        function initMap() {
            const map = new google.maps.Map(document.getElementById("map"), {
                center: myLatLng,
                zoom: 17,
                mapTypeControl: false
            });

            const card = document.getElementById("pac-card");
            const pacinput = document.getElementById("pac-input");
            pacinput.classList.add("form-control", "height-35", "f-14");

            const biasInputElement = document.getElementById("use-location-bias");
            const strictBoundsInputElement = document.getElementById("use-strict-bounds");
            const options = {
                fields: ["formatted_address", "geometry", "name"],
                strictBounds: false,
                types: ["establishment"],
            };

            map.controls[google.maps.ControlPosition.TOP_LEFT].push(card);
            const infowindow = new google.maps.InfoWindow();
            const infowindowContent = document.getElementById("infowindow-content");

            infowindow.setContent(infowindowContent);

            const marker = new google.maps.Marker({
                map,
                anchorPoint: new google.maps.Point(0, -29),
                position: myLatLng,
                Draggable: true,
                Title: global_setting.company_name
            });

            marker.addListener('drag', handleEvent);
            marker.addListener('dragend', handleEvent);

            function handleEvent(event) {
                document.getElementById('latitude').value = event.latLng.lat();
                document.getElementById('longitude').value = event.latLng.lng();
            }

            setupClickListener("changetype-all", []);
            setupClickListener("changetype-address", ["address"]);
            setupClickListener("changetype-establishment", ["establishment"]);
            setupClickListener("changetype-geocode", ["geocode"]);
            setupClickListener("changetype-cities", ["(cities)"]);
            setupClickListener("changetype-regions", ["(regions)"]);
        }
    </script>
@endpush
