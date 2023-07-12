@extends('recruit::layouts.front')

    <link rel="stylesheet" href="{{ asset('vendor/css/tagify.css') }}">
    <!-- Header Start -->
<link rel="stylesheet" href="{{ asset('vendor/css/tagify.css') }}">
@php
    if($setting->background_image == null)
    {
        $img = 'https://recruit.froid.works/front/assets/img/header-bg.jpg';
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

</style>
@section('content')
    <!-- Header Start -->
    <header class="sticky-top bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12 py-2 login_header d-flex justify-content-between align-items-center">
                    <a href="{{ url('/recruit') }}">
                        <img class="mr-2 rounded" src="{{ $global->logo_url }}">
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
    <section class="bg-grey py-5 main-content">
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

                        </div>
                    </div>
                </div>
            </div>
            <!-- Banner End -->
            <!-- Overview Start -->
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="bg-white rounded overflow-auto border-grey">
                        <div class="col-md-12 mt-4 pb-4 success-message justify-content-center align-items-center">
                            <h3 class="text-center">@lang('recruit::modules.front.thankyou')</h3>
                            <p class="text-center">@lang('recruit::modules.front.frontNote')<a class="ml-1" href="{{ route('job_opening') }}">@lang('recruit::modules.front.viewJob')<i class="fa fa-arrow-right ml-1"></i></a></p>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Overview End -->
                </div>
    </section>
    <!-- Content End -->
@endsection
