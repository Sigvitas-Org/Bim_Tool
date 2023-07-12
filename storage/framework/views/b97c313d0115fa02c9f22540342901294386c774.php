<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(global_setting()->favicon_url); ?>">
    <meta name="msapplication-TileImage" content="<?php echo e(global_setting()->favicon_url); ?>">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo e(asset('vendor/css/all.min.css')); ?>">

    <!-- Simple Line Icons -->
    <link rel="stylesheet" href="<?php echo e(asset('vendor/css/simple-line-icons.css')); ?>">

    <!-- Datepicker -->
    <link rel="stylesheet" href="<?php echo e(asset('vendor/css/datepicker.min.css')); ?>">

    <!-- TimePicker -->
    <link rel="stylesheet" href="<?php echo e(asset('vendor/css/bootstrap-timepicker.min.css')); ?>">

    <!-- Select Plugin -->
    <link rel="stylesheet" href="<?php echo e(asset('vendor/css/select2.min.css')); ?>">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="<?php echo e(asset('vendor/css/bootstrap-icons.css')); ?>">

    <?php echo $__env->yieldPushContent('datatable-styles'); ?>

    <!-- Template CSS -->
    <link type="text/css" rel="stylesheet" media="all" href="<?php echo e(asset('css/main.css')); ?>">

    <title><?php echo app('translator')->get($pageTitle); ?></title>
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo e(global_setting()->favicon_url); ?>">
    <meta name="theme-color" content="#ffffff">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>"/>
    <?php if(isset($activeSettingMenu)): ?>
        <style>
            .preloader-container {
                margin-left: 510px;
                width: calc(100% - 510px)
            }

            .blur-code {
                filter: blur(3px);

            }

            .purchase-code {
                transition: filter .2s ease-out;
                margin-right: 4px;
            }


        </style>
    <?php endif; ?>

    <?php echo $__env->yieldPushContent('styles'); ?>

    <style>
        :root {
            --fc-border-color: #E8EEF3;
            --fc-button-text-color: #99A5B5;
            --fc-button-border-color: #99A5B5;
            --fc-button-bg-color: #ffffff;
            --fc-button-active-bg-color: #171f29;
            --fc-today-bg-color: #f2f4f7;
        }

        .fc a[data-navlink] {
            color: #99a5b5;
        }
    </style>

    
    <?php if(!user()->dark_theme): ?>
        <?php echo $__env->make('sections.theme_css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <?php if(file_exists(public_path() . '/css/app-custom.css')): ?>
        <link href="<?php echo e(asset('css/app-custom.css')); ?>" rel="stylesheet">
    <?php endif; ?>

    <script src="<?php echo e(asset('vendor/jquery/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/jquery/modernizr.min.js')); ?>"></script>

    
    <script src="<?php echo e(asset('vendor/jquery/bootstrap-timepicker.min.js')); ?>"></script>

    <?php if ($__env->exists('sections.push-setting-include')) echo $__env->make('sections.push-setting-include', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <?php if ($__env->exists('sections.custom_script')) echo $__env->make('sections.custom_script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <script>
        const checkMiniSidebar = localStorage.getItem("mini-sidebar");
    </script>

</head>


<body id="body" class="<?php echo e(user()->dark_theme ? 'dark-theme' : ''); ?> <?php echo e(user()->rtl ? 'rtl' : ''); ?>">
<script>
    if (checkMiniSidebar == "yes" || checkMiniSidebar == "") {
        $('body').addClass('sidebar-toggled');
    }
</script>

<?php echo $__env->make('sections.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php echo $__env->make('sections.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- BODY WRAPPER START -->
<div class="body-wrapper clearfix">


    <!-- MAIN CONTAINER START -->
    <section class="main-container bg-additional-grey mb-5 mb-sm-0" id="fullscreen">

        <div class="preloader-container d-flex justify-content-center align-items-center">
            <div class="spinner-border" role="status" aria-hidden="true"></div>
        </div>


        <?php echo $__env->yieldContent('filter-section'); ?>

        <?php if (isset($component)) { $__componentOriginalb52aa4388d1868c1311dcb85fdaa976563befc1f = $component; } ?>
<?php $component = App\View\Components\AppTitle::resolve(['pageTitle' => __($pageTitle)] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-title'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppTitle::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'd-block d-lg-none']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb52aa4388d1868c1311dcb85fdaa976563befc1f)): ?>
<?php $component = $__componentOriginalb52aa4388d1868c1311dcb85fdaa976563befc1f; ?>
<?php unset($__componentOriginalb52aa4388d1868c1311dcb85fdaa976563befc1f); ?>
<?php endif; ?>

        <?php echo $__env->yieldContent('content'); ?>


    </section>
    <!-- MAIN CONTAINER END -->
</div>
<!-- BODY WRAPPER END -->
<?php echo $__env->make('sections.modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- Global Required Javascript -->
<script src="<?php echo e(asset('js/main.js')); ?>"></script>
<script>
    const MODAL_DEFAULT = '#myModalDefault';
    const MODAL_LG = '#myModal';
    const MODAL_XL = '#myModalXl';
    const MODAL_HEADING = '#modelHeading';
    const RIGHT_MODAL = '#task-detail-1';
    const RIGHT_MODAL_CONTENT = '#right-modal-content';
    const RIGHT_MODAL_TITLE = '#right-modal-title';
    const company = <?php echo json_encode(companyOrGlobalSetting(), 15, 512) ?>;
    const pusher_setting = <?php echo json_encode(pusher_settings(), 15, 512) ?>;
    const SEARCH_KEYWORD = "<?php echo e(request('search_keyword')); ?>";
    const MOMENTJS_TIME_FORMAT = "<?php echo e((companyOrGlobalSetting()->time_format == 'h:i A') ? 'hh:mm A' : ( (companyOrGlobalSetting()->time_format == 'h:i a') ? 'hh:mm a' : 'H:mm')); ?>";

    const datepickerConfig = {
        formatter: (input, date, instance) => {
            input.value = moment(date).format('<?php echo e(company()->moment_date_format); ?>')
        },
        showAllDates: true,
        customDays: ["<?php echo app('translator')->get('app.weeks.Sun'); ?>", "<?php echo app('translator')->get('app.weeks.Mon'); ?>", "<?php echo app('translator')->get('app.weeks.Tue'); ?>",
            "<?php echo app('translator')->get('app.weeks.Wed'); ?>", "<?php echo app('translator')->get('app.weeks.Thu'); ?>", "<?php echo app('translator')->get('app.weeks.Fri'); ?>",
            "<?php echo app('translator')->get('app.weeks.Sat'); ?>"
        ],
        customMonths: ["<?php echo app('translator')->get('app.months.January'); ?>", "<?php echo app('translator')->get('app.months.February'); ?>",
            "<?php echo app('translator')->get('app.months.March'); ?>", "<?php echo app('translator')->get('app.months.April'); ?>", "<?php echo app('translator')->get('app.months.May'); ?>",
            "<?php echo app('translator')->get('app.months.June'); ?>", "<?php echo app('translator')->get('app.months.July'); ?>", "<?php echo app('translator')->get('app.months.August'); ?>",
            "<?php echo app('translator')->get('app.months.September'); ?>", "<?php echo app('translator')->get('app.months.October'); ?>",
            "<?php echo app('translator')->get('app.months.November'); ?>", "<?php echo app('translator')->get('app.months.December'); ?>"
        ],
        customOverlayMonths: ["<?php echo app('translator')->get('app.monthsShort.Jan'); ?>", "<?php echo app('translator')->get('app.monthsShort.Feb'); ?>",
            "<?php echo app('translator')->get('app.monthsShort.Mar'); ?>", "<?php echo app('translator')->get('app.monthsShort.Apr'); ?>",
            "<?php echo app('translator')->get('app.monthsShort.May'); ?>", "<?php echo app('translator')->get('app.monthsShort.Jun'); ?>",
            "<?php echo app('translator')->get('app.monthsShort.Jul'); ?>", "<?php echo app('translator')->get('app.monthsShort.Aug'); ?>",
            "<?php echo app('translator')->get('app.monthsShort.Sep'); ?>", "<?php echo app('translator')->get('app.monthsShort.Oct'); ?>",
            "<?php echo app('translator')->get('app.monthsShort.Nov'); ?>", "<?php echo app('translator')->get('app.monthsShort.Dec'); ?>"
        ],
        overlayButton: "<?php echo app('translator')->get('app.submit'); ?>",
        overlayPlaceholder: "<?php echo app('translator')->get('app.enterYear'); ?>",
        startDay: parseInt("<?php echo e(attendance_setting()->week_start_from); ?>")
    };

    const daterangeConfig = {
        "<?php echo app('translator')->get('app.today'); ?>": [moment(), moment()],
        "<?php echo app('translator')->get('app.last30Days'); ?>": [moment().subtract(29, 'days'), moment()],
        "<?php echo app('translator')->get('app.thisMonth'); ?>": [moment().startOf('month'), moment().endOf('month')],
        "<?php echo app('translator')->get('app.lastMonth'); ?>": [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month')
            .endOf(
                'month')
        ],
        "<?php echo app('translator')->get('app.last90Days'); ?>": [moment().subtract(89, 'days'), moment()],
        "<?php echo app('translator')->get('app.last6Months'); ?>": [moment().subtract(6, 'months'), moment()],
        "<?php echo app('translator')->get('app.last1Year'); ?>": [moment().subtract(1, 'years'), moment()]
    };

    const daterangeLocale = {
        "format": "<?php echo e(companyOrGlobalSetting()->moment_date_format); ?>",
        "customRangeLabel": "<?php echo app('translator')->get('app.customRange'); ?>",
        "separator": " <?php echo app('translator')->get('app.to'); ?> ",
        "applyLabel": "<?php echo app('translator')->get('app.apply'); ?>",
        "cancelLabel": "<?php echo app('translator')->get('app.cancel'); ?>",
        "daysOfWeek": ['<?php echo app('translator')->get("app.weeks.Sun"); ?>', '<?php echo app('translator')->get("app.weeks.Mon"); ?>',
            '<?php echo app('translator')->get("app.weeks.Tue"); ?>',
            '<?php echo app('translator')->get("app.weeks.Wed"); ?>', '<?php echo app('translator')->get("app.weeks.Thu"); ?>', '<?php echo app('translator')->get("app.weeks.Fri"); ?>',
            '<?php echo app('translator')->get("app.weeks.Sat"); ?>'
        ],
        "monthNames": [
            '<?php echo app('translator')->get("app.months.January"); ?>',
            '<?php echo app('translator')->get("app.months.February"); ?>',
            "<?php echo app('translator')->get('app.months.March'); ?>",
            "<?php echo app('translator')->get('app.months.April'); ?>",
            "<?php echo app('translator')->get('app.months.May'); ?>",
            "<?php echo app('translator')->get('app.months.June'); ?>",
            "<?php echo app('translator')->get('app.months.July'); ?>",
            "<?php echo app('translator')->get('app.months.August'); ?>",
            "<?php echo app('translator')->get('app.months.September'); ?>",
            "<?php echo app('translator')->get('app.months.October'); ?>",
            "<?php echo app('translator')->get('app.months.November'); ?>",
            "<?php echo app('translator')->get('app.months.December'); ?>"
        ],
        "firstDay": parseInt("<?php echo e(attendance_setting()->week_start_from); ?>")
    };

    const dropifyMessages = {
        default: "<?php echo app('translator')->get('app.dragDrop'); ?>",
        replace: "<?php echo app('translator')->get('app.dragDropReplace'); ?>",
        remove: "<?php echo app('translator')->get('app.remove'); ?>",
        error: "<?php echo app('translator')->get('messages.errorOccured'); ?>",
    };

    const DROPZONE_FILE_ALLOW = "<?php echo e(global_setting()->allowed_file_types); ?>";
    const DROPZONE_MAX_FILESIZE = "<?php echo e(global_setting()->allowed_file_size); ?>";
    Dropzone.prototype.defaultOptions.dictDefaultMessage = "<?php echo e(__('modules.projectTemplate.dropFile')); ?>";
    Dropzone.prototype.defaultOptions.timeout = 0;

</script>

<!-- Scripts -->
<script>
    window.Laravel = <?php echo json_encode([
    'csrfToken' => csrf_token(),
    'user' => user(),
]); ?>;
</script>

<?php echo $__env->yieldPushContent('scripts'); ?>

<script>
    $(window).on('load', function () {
        // Animate loader off screen
        init();
        $(".preloader-container").fadeOut("slow", function () {
            $(this).removeClass("d-flex");
        });
    });

    $('body').on('click', '.view-notification', function (event) {
        event.preventDefault();
        const id = $(this).data('notification-id');
        const href = $(this).attr('href');

        $.easyAjax({
            url: "<?php echo e(route('mark_single_notification_read')); ?>",
            type: "POST",
            data: {
                '_token': "<?php echo e(csrf_token()); ?>",
                'id': id
            },
            success: function () {
                if (typeof href !== 'undefined') {
                    window.location = href;
                }
            }
        });
    });

    $('body').on('click', '.img-lightbox', function () {
        const imageUrl = $(this).data('image-url');
        const url = "<?php echo e(route('invoices.show_image').'?image_url='); ?>" + encodeURIComponent(imageUrl);
        $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_LG, url);
    });

    function updateOnesignalPlayerId(userId) {
        $.easyAjax({
            url: '<?php echo e(route('profile.update_onesignal_id')); ?>',
            type: 'POST',
            data: {
                'userId': userId,
                '_token': '<?php echo e(csrf_token()); ?>'
            }
        })
    }

    if (SEARCH_KEYWORD !== '' && $('#search-text-field').length > 0) {
        $('#search-text-field').val(SEARCH_KEYWORD);
        $('#reset-filters').removeClass('d-none');
    }

    $('body').on('click', '.show-hide-purchase-code', function () {
        $('> .icon', this).toggleClass('fa-eye-slash fa-eye');
        $(this).siblings('span').toggleClass('blur-code ');
    });


</script>

<script>
    let quillArray = {};

    function quillImageLoad(ID) {

        quillArray[ID] = new Quill(ID, {
            modules: {
                toolbar: [
                    [{
                        header: [1, 2, 3, 4, 5, false]
                    }],
                    [{
                        'list': 'ordered'
                    }, {
                        'list': 'bullet'
                    }],
                    ['bold', 'italic', 'underline', 'strike'],
                    ['image', 'code-block', 'link'],
                    [{
                        'direction': 'rtl'
                    }],
                    ['clean']
                ],
                clipboard: {
                    matchVisual: false
                },
                "emoji-toolbar": true,
                "emoji-textarea": true,
                "emoji-shortname": true,
            },
            theme: 'snow'
        });
        $.each(quillArray, function (key, quill) {
            quill.getModule('toolbar').addHandler('image', selectLocalImage);
        });

    }

    /**
     * Step1. select local image
     *
     */
    function selectLocalImage() {
        const input = document.createElement('input');
        input.setAttribute('type', 'file');
        input.click();

        // Listen upload local image and save to server
        input.onchange = () => {
            const file = input.files[0];

            // file type is only image.
            if (/^image\//.test(file.type)) {
                saveToServer(file);
            } else {
                console.warn('You could only upload images.');
            }
        };
    }

    /**
     * Step2. save to server
     *
     * @param {File} file
     */
    function saveToServer(file) {
        const fd = new FormData();
        fd.append('image', file);
        $.ajax({
            type: 'POST',
            url: "<?php echo e(route('image.store')); ?>",
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: fd,
            contentType: false,
            processData: false,
            success: function (response) {
                insertToEditor(response)
            },
        });
    }

    function insertToEditor(url) {
        // push image url to rich editor.
        $.each(quillArray, function (key, quill) {
            try {
                let range = quill.getSelection();
                quill.insertEmbed(range.index, 'image', url);
            } catch (err) {
            }
        });
    }
</script>

<script>
    $('body').on('click', '#pause-timer-btn', function () {
        const id = $(this).data('time-id');
        let url = "<?php echo e(route('timelogs.pause_timer', ':id')); ?>";
        url = url.replace(':id', id);
        const token = '<?php echo e(csrf_token()); ?>';
        $.easyAjax({
            url: url,
            blockUI: true,
            type: "POST",
            disableButton: true,
            buttonSelector: "#pause-timer-btn",
            data: {
                timeId: id,
                _token: token
            },
            success: function (response) {
                if (response.status === 'success') {
                    if ($('#myActiveTimer').length > 0) {
                        $(MODAL_XL + ' .modal-content').html(response.html);

                        if ($('#allTasks-table').length) {
                            window.LaravelDataTables["allTasks-table"].draw(false);
                        }
                    } else {
                        window.location.reload();
                    }
                }
            }
        })
    });

    $('body').on('click', '#resume-timer-btn', function () {
        const id = $(this).data('time-id');
        let url = "<?php echo e(route('timelogs.resume_timer', ':id')); ?>";
        url = url.replace(':id', id);
        const token = '<?php echo e(csrf_token()); ?>';
        $.easyAjax({
            url: url,
            blockUI: true,
            type: "POST",
            disableButton: true,
            buttonSelector: "#resume-timer-btn",
            data: {
                timeId: id,
                _token: token
            },
            success: function (response) {
                if (response.status === 'success') {
                    if ($('#myActiveTimer').length > 0) {
                        $(MODAL_XL + ' .modal-content').html(response.html);
                    } else {
                        window.location.reload();
                    }
                }
            }
        })
    });

    $('body').on('click', '.stop-active-timer', function () {
        const id = $(this).data('time-id');
        let url = "<?php echo e(route('timelogs.stop_timer', ':id')); ?>";
        url = url.replace(':id', id);
        const token = '<?php echo e(csrf_token()); ?>';
        $.easyAjax({
            url: url,
            type: "POST",
            data: {
                timeId: id,
                _token: token
            },
            success: function (response) {
                if ($('#myActiveTimer').length > 0) {
                    $(MODAL_XL + ' .modal-content').html(response.html);
                    if (response.activeTimerCount > 0) {
                        $('#show-active-timer .active-timer-count').html(response.activeTimerCount);
                    } else {
                        window.location.reload();
                    }
                } else {
                    window.location.reload();
                }
            }
        })

    });
</script>
</body>

</html>
<?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/layouts/app.blade.php ENDPATH**/ ?>