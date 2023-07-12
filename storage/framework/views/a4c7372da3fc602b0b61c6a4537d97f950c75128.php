<?php if (isset($component)) { $__componentOriginal4e65df8a9648483ff8a2bf21a107646914efde53 = $component; } ?>
<?php $component = App\View\Components\BarChart::resolve(['chartData' => $barChartData] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('bar-chart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\BarChart::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'expense-report','height' => '250']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4e65df8a9648483ff8a2bf21a107646914efde53)): ?>
<?php $component = $__componentOriginal4e65df8a9648483ff8a2bf21a107646914efde53; ?>
<?php unset($__componentOriginal4e65df8a9648483ff8a2bf21a107646914efde53); ?>
<?php endif; ?>
<?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/reports/expense/bar_chart.blade.php ENDPATH**/ ?>