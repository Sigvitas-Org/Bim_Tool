<?php if (isset($component)) { $__componentOriginala47034f53c760093430782092f08182eb71aad42 = $component; } ?>
<?php $component = App\View\Components\LineChart::resolve(['chartData' => $chartData] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('line-chart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\LineChart::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'task-chart2','height' => '250']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala47034f53c760093430782092f08182eb71aad42)): ?>
<?php $component = $__componentOriginala47034f53c760093430782092f08182eb71aad42; ?>
<?php unset($__componentOriginala47034f53c760093430782092f08182eb71aad42); ?>
<?php endif; ?>
<?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/reports/expense/chart.blade.php ENDPATH**/ ?>