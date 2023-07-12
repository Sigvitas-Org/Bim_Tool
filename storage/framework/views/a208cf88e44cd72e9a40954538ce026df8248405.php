<?php $__env->startPush('datatable-styles'); ?>
    <script src="<?php echo e(asset('vendor/jquery/frappe-charts.min.iife.js')); ?>"></script>
    <?php echo $__env->make('sections.datatable_css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('filter-section'); ?>

    <?php if (isset($component)) { $__componentOriginal8063c234a2d1e8800396f6cffced963918807943 = $component; } ?>
<?php $component = App\View\Components\Filters\FilterBox::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filters.filter-box'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Filters\FilterBox::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
        <!-- DATE START -->
        <div class="select-box d-flex pr-2 border-right-grey border-right-grey-sm-0">
            <p class="mb-0 pr-3 f-14 text-dark-grey d-flex align-items-center"><?php echo app('translator')->get('app.date'); ?></p>
            <div class="select-status d-flex">
                <input type="text" class="position-relative text-dark form-control border-0 p-2 text-left f-14 f-w-500"
                    id="datatableRange2" placeholder="<?php echo app('translator')->get('placeholders.dateRange'); ?>">
            </div>
        </div>
        <!-- DATE END -->

        <!-- EXPENSE CATEGORY START -->
        <div class="select-box d-flex  py-2 px-lg-2 px-md-2 px-0 border-right-grey border-right-grey-sm-0">
            <p class="mb-0 pr-3 f-14 text-dark-grey d-flex align-items-center"><?php echo app('translator')->get('app.category'); ?></p>
            <div class="select-status">
                <select class="form-control select-picker" name="category" id="category_id" data-live-search="true"
                    data-size="8">
                    <option value="all"><?php echo app('translator')->get('app.all'); ?></option>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->id); ?>"><?php echo e(ucwords($category->category_name)); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
        <!-- EXPENSE CATEGORY END -->

        <!-- CLIENT START -->
        <div class="select-box d-flex  py-2 px-lg-2 px-md-2 px-0 border-right-grey border-right-grey-sm-0">
            <p class="mb-0 pr-3 f-14 text-dark-grey d-flex align-items-center"><?php echo app('translator')->get('app.employee'); ?></p>
            <div class="select-status">
                <select class="form-control select-picker" name="employee" id="employee_id" data-live-search="true"
                    data-size="8">
                    <option value="all"><?php echo app('translator')->get('app.all'); ?></option>
                    <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if (isset($component)) { $__componentOriginal3a9f7815236e62d576ffe72a6df948b4e8598398 = $component; } ?>
<?php $component = App\View\Components\UserOption::resolve(['user' => $employee] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('user-option'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\UserOption::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3a9f7815236e62d576ffe72a6df948b4e8598398)): ?>
<?php $component = $__componentOriginal3a9f7815236e62d576ffe72a6df948b4e8598398; ?>
<?php unset($__componentOriginal3a9f7815236e62d576ffe72a6df948b4e8598398); ?>
<?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
        <!-- CLIENT END -->

        <!-- PROJECT START -->
        <div class="select-box d-flex  py-2 px-lg-2 px-md-2 px-0 border-right-grey border-right-grey-sm-0">
            <p class="mb-0 pr-3 f-14 text-dark-grey d-flex align-items-center"><?php echo app('translator')->get('app.project'); ?></p>
            <div class="select-status">
                <select class="form-control select-picker" name="project_id" id="project_id" data-live-search="true"
                    data-size="8">
                    <option value="all"><?php echo app('translator')->get('app.all'); ?></option>
                    <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($project->id); ?>"><?php echo e(ucwords($project->project_name)); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
        <!-- PROJECT END -->

        <!-- RESET START -->
        <div class="select-box d-flex py-1 px-lg-2 px-md-2 px-0">
            <?php if (isset($component)) { $__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26 = $component; } ?>
<?php $component = App\View\Components\Forms\ButtonSecondary::resolve(['icon' => 'times-circle'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonSecondary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'btn-xs d-none','id' => 'reset-filters']); ?>
                <?php echo app('translator')->get('app.clearFilters'); ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26)): ?>
<?php $component = $__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26; ?>
<?php unset($__componentOriginal145d6f964f40dbb2191316e2895f0c633dbd4d26); ?>
<?php endif; ?>
        </div>
        <!-- RESET END -->

     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8063c234a2d1e8800396f6cffced963918807943)): ?>
<?php $component = $__componentOriginal8063c234a2d1e8800396f6cffced963918807943; ?>
<?php unset($__componentOriginal8063c234a2d1e8800396f6cffced963918807943); ?>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- CONTENT WRAPPER START -->
    <div class="content-wrapper">
        <div class="row mb-4">
            <div class="col-lg-4">
                <?php if (isset($component)) { $__componentOriginal3372d3ef031d7cb240e013bd2685bbb8031ec38a = $component; } ?>
<?php $component = App\View\Components\Cards\Widget::resolve(['title' => __('modules.dashboard.totalExpenses'),'value' => '0','icon' => 'coins','widgetId' => 'totalExpense'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.widget'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Widget::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3372d3ef031d7cb240e013bd2685bbb8031ec38a)): ?>
<?php $component = $__componentOriginal3372d3ef031d7cb240e013bd2685bbb8031ec38a; ?>
<?php unset($__componentOriginal3372d3ef031d7cb240e013bd2685bbb8031ec38a); ?>
<?php endif; ?>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-lg-6">

                <div class="d-flex flex-column">
                    <!-- EXPENSE STATUS START -->
                    <?php if (isset($component)) { $__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e = $component; } ?>
<?php $component = App\View\Components\Cards\Data::resolve(['title' => __($pageTitle)] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Data::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'e']); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e)): ?>
<?php $component = $__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e; ?>
<?php unset($__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e); ?>
<?php endif; ?>
                    <!-- EXPENSE STATUS END -->

                    <div id="table-actions" class="flex-grow-1 align-items-center mt-4">
                    </div>
                </div>
            </div>
             <div class="col-lg-6">
                <?php if (isset($component)) { $__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e = $component; } ?>
<?php $component = App\View\Components\Cards\Data::resolve(['title' => __($categoryTitle)] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Data::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    <div id="expense-chart-card"></div>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e)): ?>
<?php $component = $__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e; ?>
<?php unset($__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e); ?>
<?php endif; ?>
            </div>
        </div>

        <!-- Task Box Start -->
        <div class="d-flex flex-column w-tables rounded mt-4 bg-white">
            <?php echo $dataTable->table(['class' => 'table table-hover border-0 w-100']); ?>

        </div>
        <!-- Task Box End -->
    </div>
    <!-- CONTENT WRAPPER END -->

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <?php echo $__env->make('sections.datatable_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script type="text/javascript">

        function setDate() {
            var start = moment().clone().startOf('month');
            var end = moment();

            function cb(start, end) {
                $('#datatableRange2').val(start.format('<?php echo e(company()->moment_date_format); ?>') +
                    ' <?php echo app('translator')->get("app.to"); ?> ' + end.format(
                        '<?php echo e(company()->moment_date_format); ?>'));
                $('#reset-filters').removeClass('d-none');
            }

            $('#datatableRange2').daterangepicker({
                locale: daterangeLocale,
                linkedCalendars: false,
                startDate: start,
                endDate: end,
                ranges: daterangeConfig
            }, cb);
        }

        $(function() {
            setDate()
            $('#datatableRange2').on('apply.daterangepicker', function(ev, picker) {
                showTable();
            });

            function barChart() {
                var startDate = $('#datatableRange2').val();

                if (startDate == '') {
                    startDate = null;
                    endDate = null;
                } else {
                    var dateRangePicker = $('#datatableRange2').data('daterangepicker');
                    startDate = dateRangePicker.startDate.format('<?php echo e(company()->moment_date_format); ?>');
                    endDate = dateRangePicker.endDate.format('<?php echo e(company()->moment_date_format); ?>');
                }

                var data = new Array();
                var projectID = $('#project_id').val();
                var employeeID = $('#employee_id').val();
                var categoryID = $('#category_id').val();
                var searchText = $('#search-text-field').val();

                var url = "<?php echo e(route('expense-report.chart')); ?>";

                $.easyAjax({
                    url: url,
                    container: '#e',
                    blockUI: true,
                    type: "POST",
                    data: {
                        startDate: startDate,
                        endDate: endDate,
                        categoryID: categoryID,
                        projectID: projectID,
                        employeeID: employeeID,
                        _token: '<?php echo e(csrf_token()); ?>'
                    },
                    success: function(response) {
                        $('#e .card-body').html(response.html);
                        $('#expense-chart-card').html(response.html2);
                        $('#totalExpense').html(response.totalExpenses);
                    }
                });
            }

            barChart();

            $('#expense-report-table').on('preXhr.dt', function(e, settings, data) {

                var dateRangePicker = $('#datatableRange2').data('daterangepicker');
                var startDate = $('#datatableRange2').val();

                if (startDate == '') {
                    startDate = null;
                    endDate = null;
                } else {
                    startDate = dateRangePicker.startDate.format('<?php echo e(company()->moment_date_format); ?>');
                    endDate = dateRangePicker.endDate.format('<?php echo e(company()->moment_date_format); ?>');
                }

                var projectID = $('#project_id').val();
                if (!projectID) {
                    projectID = 0;
                }
                var employeeID = $('#employee_id').val();
                var categoryID = $('#category_id').val();
                var searchText = $('#search-text-field').val();

                data['categoryID'] = categoryID;
                data['employeeID'] = employeeID;
                data['projectID'] = projectID;
                data['startDate'] = startDate;
                data['endDate'] = endDate;
                data['searchText'] = searchText;
            });

            const showTable = () => {
                window.LaravelDataTables["expense-report-table"].draw(false);
                barChart();
            }

            $('#category_id, #employee_id, #project_id')
                .on('change keyup',
                    function() {
                        if ($('#project_id').val() != "all") {
                            $('#reset-filters').removeClass('d-none');
                            showTable();
                        } else if ($('#category_id').val() != "all") {
                            $('#reset-filters').removeClass('d-none');
                            showTable();
                        } else if ($('#project_id').val() != "all") {
                            $('#reset-filters').removeClass('d-none');
                            showTable();
                        } else if ($('#employee_id').val() != "all") {
                            $('#reset-filters').removeClass('d-none');
                            showTable();
                        } else {
                            $('#reset-filters').addClass('d-none');
                            showTable();
                        }
                    });

        $('#search-text-field').on('keyup', function() {
            if ($('#search-text-field').val() != "") {
                $('#reset-filters').removeClass('d-none');
                showTable();
            }
        });

            $('#reset-filters').click(function() {
                $('#filter-form')[0].reset();
                setDate()

                $('.filter-box .select-picker').selectpicker("refresh");
                $('#reset-filters').addClass('d-none');
                showTable();
            });

            $('#reset-filters-2').click(function() {
                $('#filter-form')[0].reset();

                $('.filter-box .select-picker').selectpicker("refresh");
                $('#reset-filters').addClass('d-none');
                showTable();
            });

        });

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/reports/expense/index.blade.php ENDPATH**/ ?>