<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" type="image/png" sizes="16x16" href="{{ $setting->favicon_url }}">
    <meta name="msapplication-TileImage" content="{{ $setting->favicon_url }}">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('vendor/css/all.min.css') }}">
     <!-- Template CSS -->
     <link type="text/css" rel="stylesheet" media="all" href="{{ asset('css/main.css') }}">

    <!-- Simple Line Icons -->
    <link rel="stylesheet" href="{{ asset('vendor/css/simple-line-icons.css') }}">

    <!-- Datepicker -->
    <link rel="stylesheet" href="{{ asset('vendor/css/datepicker.min.css') }}">

    <!-- TimePicker -->
    <link rel="stylesheet" href="{{ asset('vendor/css/bootstrap-timepicker.min.css') }}">

    <!-- Select Plugin -->
    <link rel="stylesheet" href="{{ asset('vendor/css/select2.min.css') }}">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="{{ asset('vendor/css/bootstrap-icons.css') }}">

    <title>@lang($pageTitle)</title>

    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ $setting->favicon_url }}">
    <meta name="theme-color" content="#ffffff">
    <style>
        .tagify {
            width: 100%;
        }

        .tags-look .tagify__dropdown__item {
            display: inline-block;
            border-radius: 3px;
            padding: .3em .5em;
            border: 1px solid #CCC;
            background: #F3F3F3;
            margin: .2em;
            font-size: .85em;
            color: black;
            transition: 0s;
        }

        .tags-look .tagify__dropdown__item--active {
            color: white;
        }

        .tags-look .tagify__dropdown__item:hover {
            background: var(--header_color);
        }

    </style>

    <style>
        /* Set the size of the div element that contains the map */
        #map {
            height: 400px;
            /* The height is 400 pixels */
            width: 100%;
            /* The width is the width of the web page */
        }

        #description {
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
        }

        #infowindow-content .title {
            font-weight: bold;
        }

        #infowindow-content {
            display: none;
        }

        #map #infowindow-content {
            display: inline;
        }

        .pac-card {
            background-color: #fff;
            border: 0;
            border-radius: 2px;
            box-shadow: 0 1px 4px -1px rgba(0, 0, 0, 0.3);
            margin: 10px;
            padding: 0 0.5em;
            font: 400 18px Roboto, Arial, sans-serif;
            overflow: hidden;
            font-family: Roboto;
            padding: 0;
        }

        #pac-container {
            padding-bottom: 12px;
            margin-right: 12px;
        }

        .pac-controls {
            display: inline-block;
            padding: 5px 11px;
        }

        .pac-controls label {
            font-family: Roboto;
            font-size: 13px;
            font-weight: 300;
        }

        #pac-input {
            background-color: #fff;
            font-size: 15px;
            font-weight: 300;
            margin-left: 12px;
            padding: 0 11px 0 13px;
            text-overflow: ellipsis;
            width: 400px;
        }

        #pac-input:focus {
            border-color: #4d90fe;
        }

        #title {
            font-size: 18px;
            font-weight: 500;
            padding: 10px 12px;
        }
        .site-footer {
            font-size: 0.75rem;
            padding: 20px 0;
            width: 100%;
        }
        .main-content
        {
            min-height: -webkit-calc(100% - 158px);
            min-height: -moz-calc(100% - 158px);
            min-height: calc(100% - 158px);
        }
    </style>
</head>

<body>
    @yield('content')
    <!-- Footer -->
    <footer class="site-footer">
        <div class="row text-center m-0">
            <div class="col-12 col-lg-12 mb-10">
            @forelse($customPages as $customPage)
                <a class="px-5 fw-400" href="/{{ $customPage->slug }}"><span>{{ ucfirst($customPage->title) }}</span></a>
            @empty
            @endforelse

            </div>
            <div class="col-12 col-lg-12 mb-0 mt-2">
                <p>&copy; {{ \Carbon\Carbon::now(global_setting()->timezone)->year }} @lang('app.by') {{ $companyName }}</p>
            </div>
        </div>
    </footer>
    <!-- END Footer -->
    <!-- Global Required Javascript -->

    <script src="{{ asset('vendor/jquery/all.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery/modernizr.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        const global_setting = @json(global_setting());
        const dropifyMessages = {
            default: "@lang('app.dragDrop')",
            replace: "@lang('app.dragDropReplace')",
            remove: "@lang('app.remove')",
            error: "@lang('messages.errorOccured')",
        };

        const dropzoneFileAllow =
            "{{ $global->allowed_file_types }}";

            const datepickerConfig = {
            formatter: (input, date, instance) => {
                input.value = moment(date).format('{{ $global->moment_date_format }}')
            },
            showAllDates: true,
            customDays: ["@lang('app.weeks.Sun')", "@lang('app.weeks.Mon')", "@lang('app.weeks.Tue')",
                "@lang('app.weeks.Wed')", "@lang('app.weeks.Thu')", "@lang('app.weeks.Fri')",
                "@lang('app.weeks.Sat')"
            ],
            customMonths: ["@lang('app.months.January')", "@lang('app.months.February')",
                "@lang('app.months.March')", "@lang('app.months.April')", "@lang('app.months.May')",
                "@lang('app.months.June')", "@lang('app.months.July')", "@lang('app.months.August')",
                "@lang('app.months.September')", "@lang('app.months.October')",
                "@lang('app.months.November')", "@lang('app.months.December')"
            ],
            customOverlayMonths: ["@lang('app.monthsShort.Jan')", "@lang('app.monthsShort.Feb')",
                "@lang('app.monthsShort.Mar')", "@lang('app.monthsShort.Apr')",
                "@lang('app.monthsShort.May')", "@lang('app.monthsShort.Jun')",
                "@lang('app.monthsShort.Jul')", "@lang('app.monthsShort.Aug')",
                "@lang('app.monthsShort.Sep')", "@lang('app.monthsShort.Oct')",
                "@lang('app.monthsShort.Nov')", "@lang('app.monthsShort.Dec')"
            ],
            overlayButton: "@lang('app.submit')",
            overlayPlaceholder: "@lang('app.enterYear')"
        };

        const daterangeConfig = {
            "@lang('app.today')": [moment(), moment()],
            "@lang('app.last30Days')": [moment().subtract(29, 'days'), moment()],
            "@lang('app.thisMonth')": [moment().startOf('month'), moment().endOf('month')],
            "@lang('app.lastMonth')": [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month')
                .endOf(
                    'month')
            ],
            "@lang('app.last90Days')": [moment().subtract(89, 'days'), moment()],
            "@lang('app.last6Months')": [moment().subtract(6, 'months'), moment()],
            "@lang('app.last1Year')": [moment().subtract(1, 'years'), moment()]
        };

        const daterangeLocale = {
            "format": "{{ $global->moment_date_format }}",
            "customRangeLabel": "@lang('app.customRange')",
            "separator": " @lang('app.to') ",
            "applyLabel": "@lang('app.apply')",
            "cancelLabel": "@lang('app.cancel')",
            "daysOfWeek": ['@lang("app.weeks.Sun")', '@lang("app.weeks.Mon")',
                '@lang("app.weeks.Tue")',
                '@lang("app.weeks.Wed")', '@lang("app.weeks.Thu")', '@lang("app.weeks.Fri")',
                '@lang("app.weeks.Sat")'
            ],
            "monthNames": ['@lang("app.months.January")', '@lang("app.months.February")',
                "@lang('app.months.March')", "@lang('app.months.April')",
                "@lang('app.months.May')",
                "@lang('app.months.June')", "@lang('app.months.July')",
                "@lang('app.months.August')",
                "@lang('app.months.September')", "@lang('app.months.October')",
                "@lang('app.months.November')", "@lang('app.months.December')"
            ],
            "firstDay": 1
        };
    </script>

    @stack('scripts')
    <script>
         $(".select-picker").selectpicker();

    </script>

    <!-- Font Awesome -->
</body>

</html>
