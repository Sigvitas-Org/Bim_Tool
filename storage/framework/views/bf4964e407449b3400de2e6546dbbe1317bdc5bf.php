

<?php if($company->paymentGatewayCredentials->show_pay_webhook == 'active' && $company->show_new_webhook_alert === 1): ?>
    <div class="col-md-12 mt-2 " id="webhook-message-box">
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.alert','data' => ['type' => 'secondary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'secondary']); ?>
            <!--Close Icon-->
            <button type="button" class="close close-webhook-message" data-toggle="tooltip"
                    data-original-title="Click close if you have configured it and do not want to show message in future">
                <span>×</span>
            </button>
            <p><b>Note:</b> Payment Gateway's webhook URLs has been changed. Please update the same on your payment
                gateway
            </p>
            <ul class="px-3">
                <?php if($company->paymentGatewayCredentials->paypal_status =='active'): ?>
                    <li style="list-style:auto">
                        New Webhook url for Paypal <i class="fab fa-paypal f-w-500 mr-2 f-11"></i>:
                        <strong class="f-13"
                                id="paypal-webhook-link-text"><?php echo e(route('paypal.webhook',[$company->hash])); ?></strong>
                        <a href="javascript:;" class="btn-copy btn-secondary f-8 rounded p-1 "
                           data-toggle="tooltip" data-original-title="Copy"
                           data-clipboard-target="#paypal-webhook-link-text">
                            <i class="fa fa-copy mx-1"></i></a>
                    </li>
                <?php endif; ?>
                <?php if($company->paymentGatewayCredentials->stripe_status == 'active'): ?>
                    <li style="list-style:auto" class="mt-1">

                        New Webhook url for Stripe <i class="fab fa-stripe-s f-w-500 mr-2 f-11"></i>:
                        <strong class="f-13"
                                id="stripe-webhook-link-text"><?php echo e(route('stripe.webhook',[$company->hash])); ?></strong>
                        <a href="javascript:;" class="btn-copy btn-secondary f-8 rounded p-1 "
                           data-toggle="tooltip" data-original-title="Copy"
                           data-clipboard-target="#stripe-webhook-link-text">
                            <i class="fa fa-copy mx-1"></i></a>
                    </li>
                <?php endif; ?>
                <?php if($company->paymentGatewayCredentials->razorpay_status == 'active'): ?>
                    <li style="list-style:auto" class="mt-1">
                        New Webhook url for Razorpay <i class="fa fa-credit-card f-w-500 mr-2 f-11"></i>:
                        <strong class="f-13"
                                id="razorpay-webhook-link-text"><?php echo e(route('razorpay.webhook',[$company->hash])); ?></strong>
                        <a href="javascript:;" class="btn-copy btn-secondary f-8 rounded p-1 "
                           data-toggle="tooltip" data-original-title="Copy"
                           data-clipboard-target="#razorpay-webhook-link-text">
                            <i class="fa fa-copy mx-1"></i></a>
                    </li>
                <?php endif; ?>
                <?php if($company->paymentGatewayCredentials->paystack_status == 'active'): ?>
                    <li style="list-style:auto" class="mt-1">
                        New Webhook url for Paystack <img style="height: 15px;" src="<?php echo e(asset('img/paystack.jpg')); ?>">:
                        <strong class="f-13"
                                id="paystack-webhook-link-text"><?php echo e(route('paystack.webhook',[$company->hash])); ?></strong>
                        <a href="javascript:;" class="btn-copy btn-secondary f-8 rounded p-1 "
                           data-toggle="tooltip" data-original-title="Copy"
                           data-clipboard-target="#paystack-webhook-link-text">
                            <i class="fa fa-copy mx-1"></i></a>
                    </li>
                <?php endif; ?>
                <?php if($company->paymentGatewayCredentials->square_status == 'active'): ?>
                    <li style="list-style:auto" class="mt-1">
                        New Webhook url for Square <img style="height: 15px;" src="<?php echo e(asset('img/square.svg')); ?>">:
                        <strong class="f-13"
                                id="square-webhook-link-text"><?php echo e(route('square.webhook',[$company->hash])); ?></strong>
                        <a href="javascript:;" class="btn-copy btn-secondary f-8 rounded p-1 "
                           data-toggle="tooltip" data-original-title="Copy"
                           data-clipboard-target="#square-webhook-link-text">
                            <i class="fa fa-copy mx-1"></i></a>
                    </li>
                <?php endif; ?>

                <?php if($company->paymentGatewayCredentials->flutterwave_status == 'active'): ?>
                    <li style="list-style:auto" class="mt-1">
                        New Webhook url for Flutterwave <img style="height: 15px;"
                                                             src="<?php echo e(asset('img/flutterwave.png')); ?>">:
                        <strong class="f-13"
                                id="flutterwave-webhook-link-text"><?php echo e(route('flutterwave.webhook',[$company->hash])); ?></strong>
                        <a href="javascript:;" class="btn-copy btn-secondary f-8 rounded p-1 "
                           data-toggle="tooltip" data-original-title="Copy"
                           data-clipboard-target="#flutterwave-webhook-link-text">
                            <i class="fa fa-copy mx-1"></i></a>
                    </li>
                <?php endif; ?>
            </ul>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    </div>
<?php endif; ?>

<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('vendor/jquery/clipboard.min.js')); ?>"></script>
    <script>
        var clipboard = new ClipboardJS('.btn-copy');

        clipboard.on('success', function (e) {
            Swal.fire({
                icon: 'success',
                text: '<?php echo app('translator')->get("app.webhookUrlCopied"); ?> ' + e.text,
                toast: true,
                position: 'top-end',
                timer: 3000,
                timerProgressBar: true,
                showConfirmButton: false,

                showClass: {
                    popup: 'swal2-noanimation',
                },
            })
        });


        $('body').on('click', '.close-webhook-message', function () {
            Swal.fire({
                title: "<?php echo app('translator')->get('messages.sweetAlertTitle'); ?>",
                text: "You have configured the new webhook to the payment gateways",
                icon: 'warning',
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText: "Yes, Please hide the message",
                cancelButtonText: "<?php echo app('translator')->get('app.cancel'); ?>",
                customClass: {
                    confirmButton: 'btn btn-primary mr-3',
                    cancelButton: 'btn btn-secondary'
                },
                showClass: {
                    popup: 'swal2-noanimation',
                    backdrop: 'swal2-noanimation'
                },
                buttonsStyling: false
            }).then((result) => {
                if (result.isConfirmed) {
                    const url = "<?php echo e(route('hideWebhookAlert')); ?>";

                    $.easyAjax({
                        type: 'GET',
                        url: url,
                        success: function () {
                            $('#webhook-message-box').remove()
                        }
                    });
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>




<?php /**PATH /home/u561154491/domains/builtinmysore.com/public_html/resources/views/dashboard/update-gateway-credentials.blade.php ENDPATH**/ ?>