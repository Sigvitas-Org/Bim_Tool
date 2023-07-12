<!-- Datatables -->
<script src="<?php echo e(asset('vendor/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/datatables/dataTables.bootstrap4.min.js')); ?>"></script>


<script src="<?php echo e(asset('vendor/datatables/dataTables.buttons.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/datatables/buttons.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/datatables/buttons.server-side.js')); ?>"></script>
<?php echo $dataTable->scripts(); ?>


<?php echo $__env->make('sections.daterange_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/sections/datatable_js.blade.php ENDPATH**/ ?>