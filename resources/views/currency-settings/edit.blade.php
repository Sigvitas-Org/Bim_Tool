<div class="modal-header">
    <h5 class="modal-title" id="modelHeading">@lang('app.edit') @lang('app.currency')</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">×</span></button>
</div>
<div class="modal-body">
    <x-form id="editCurrency">
        @method('PUT')

        {{-- Used for show currency error inline --}}
        <div class="row">
            <div class="col-sm-12" id="alert">
            </div>
        </div>

        <div class="row">

            <div class="col-lg-4">
                <x-forms.text class="mr-0 mr-lg-2 mr-md-2" :fieldLabel="__('modules.currencySettings.currencyName')"
                              fieldPlaceholder="e.g. Dollar" fieldName="currency_name" fieldId="currency_name"
                              :fieldValue="$currency->currency_name" fieldRequired="true"></x-forms.text>
            </div>

            <div class="col-lg-4">
                <x-forms.text class="mr-0 mr-lg-2 mr-md-2"
                              :fieldLabel="__('modules.currencySettings.currencySymbol')" fieldPlaceholder="e.g. $"
                              fieldName="currency_symbol" fieldId="currency_symbol"
                              :fieldValue="$currency->currency_symbol" fieldRequired="true">
                </x-forms.text>
            </div>

            <div class="col-lg-4">
                <x-forms.text class="mr-0 mr-lg-2 mr-md-2" :fieldLabel="__('modules.currencySettings.currencyCode')"
                              fieldPlaceholder="e.g. USD" fieldName="currency_code" fieldId="currency_code"
                              :fieldValue="$currency->currency_code" fieldRequired="true"></x-forms.text>
            </div>

            <div class="col-lg-4">
                <div class="form-group my-3">
                    <label class="f-14 text-dark-grey mb-12 w-100"
                           for="usr">@lang('modules.currencySettings.isCryptoCurrency')</label>
                    <div class="d-flex">
                        <x-forms.radio fieldId="crypto_currency_yes" :fieldLabel="__('app.yes')"
                                       fieldName="is_cryptocurrency" fieldValue="yes"
                                       :checked="($currency->is_cryptocurrency == 'yes') ? 'checked' : ''">
                        </x-forms.radio>
                        <x-forms.radio fieldId="crypto_currency_no" :fieldLabel="__('app.no')" fieldValue="no"
                                       fieldName="is_cryptocurrency"
                                       :checked="($currency->is_cryptocurrency == 'no') ? 'checked' : ''">
                        </x-forms.radio>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 crypto-currency"
                 @if ($currency->is_cryptocurrency == 'no') style="display: none" @endif>
                <x-forms.text class="mr-0 mr-lg-2 mr-md-2" :fieldLabel="__('modules.currencySettings.usdPrice')"
                              fieldPlaceholder="e.g. 100" fieldName="usd_price" fieldId="usd_price"
                              :fieldValue="$currency->usd_price" fieldRequired="true"></x-forms.text>
            </div>

            <div class="col-lg-4 regular-currency"
                 @if ($currency->is_cryptocurrency == 'yes') style="display: none;" @endif>
                <x-forms.number class="mr-0 mr-lg-2 mr-md-2"
                                :fieldLabel="__('modules.currencySettings.exchangeRate')"
                                fieldPlaceholder="e.g. 100" fieldName="exchange_rate" fieldId="exchange_rate"
                                :fieldValue="$currency->exchange_rate" fieldRequired="true"></x-forms.number>

                <a href="javascript:;" id="fetch-exchange-rate" icon="key"><i icon="key"></i>
                    @lang('modules.currencySettings.fetchLatestExchangeRate')</a>
            </div>

        </div>
    </x-form>

</div>

<!-- Buttons Start -->
<div class="modal-footer">
    <x-forms.button-cancel data-dismiss="modal" class="border-0">@lang('app.cancel')
    </x-forms.button-cancel>
    <x-forms.button-primary id="save-form" class="mr-3" icon="check">@lang('app.save')
    </x-forms.button-primary>
</div>
<!-- Buttons End -->
<!-- SETTINGS END -->

<script>
    $(document).ready(function () {

        // Toggle between Exchange Rate and Usd Price fields
        $("input[name=is_cryptocurrency]").click(function () {
            if ($(this).val() == 'yes') {
                $('.regular-currency').hide();
                $('.crypto-currency').show();
            } else {
                $('.crypto-currency').hide();
                $('.regular-currency').show();
            }
        })

        // Save form data
        $('#save-form').click(function () {
            const url = "{{ route('currency-settings.update', [$currency->id]) }}";
            $.easyAjax({
                url: url,
                container: '#editCurrency',
                type: "POST",
                disableButton: true,
                blockUI: true,
                buttonSelector: "#save-form",
                data: $('#editCurrency').serialize(),
                success: function (response) {
                    if (response.status == 'success') {
                        window.location.reload();
                    }
                }

            })
        });

        $('#fetch-exchange-rate').click(function () {

            let currencyConverterKey = '{{ global_setting()->currency_converter_key }}';

            if (currencyConverterKey == "") {
                addCurrencyExchangeKey();
                return false;
            }

            let currencyCode = $('#currency_code').val();
            let url = "{{ route('currency_settings.exchange_rate', '#cc') }}";
            url = url.replace('#cc', currencyCode);

            $.easyAjax({
                url: url,
                type: "GET",
                data: {
                    currencyCode: currencyCode
                },
                disableButton: true,
                messagePosition: "inline",
                blockUI: true,
                success: function (response) {
                    if (response.status === 'success') {
                        $('#exchange_rate').val(response.value);
                    }
                }
            })
        });

        function addCurrencyExchangeKey() {
            const url = "{{ route('currency_settings.exchange_key') }}";
            $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_LG, url);
        }

    });
</script>
