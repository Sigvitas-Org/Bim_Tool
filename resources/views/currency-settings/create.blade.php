<div class="modal-header">
    <h5 class="modal-title" id="modelHeading">@lang('modules.currencySettings.addNewCurrency')</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">×</span></button>
</div>
<div class="modal-body">
    <x-form id="addCurrency">

        {{-- Used for show currency error inline --}}
        <div class="row">
            <div class="col-sm-12" id="alert">
            </div>
        </div>
        <div class="row">

            <div class=" col-sm-12 col-lg-4">
                <x-forms.text class="mr-0 mr-lg-2 mr-md-2"
                              :fieldLabel="__('modules.currencySettings.currencyName')"
                              :fieldPlaceholder="__('placeholders.currency.currencyName')"
                              fieldName="currency_name"
                              fieldId="currency_name" fieldRequired="true"></x-forms.text>
            </div>

            <div class="col-sm-12 col-lg-4">
                <x-forms.text class="mr-0 mr-lg-2 mr-md-2"
                              :fieldLabel="__('modules.currencySettings.currencySymbol')"
                              :fieldPlaceholder="__('placeholders.currency.currencySymbol')"
                              fieldName="currency_symbol"
                              fieldId="currency_symbol" fieldRequired="true"></x-forms.text>
            </div>

            <div class="col-sm-12 col-lg-4">
                <x-forms.text class="mr-0 mr-lg-2 mr-md-2"
                              :fieldLabel="__('modules.currencySettings.currencyCode')"
                              :fieldPlaceholder="__('placeholders.currency.currencyCode')"
                              fieldName="currency_code"
                              fieldId="currency_code" fieldRequired="true"></x-forms.text>
            </div>

            <div class="col-sm-12 col-lg-4">
                <div class="form-group my-3">
                    <label class="f-14 text-dark-grey mb-12 w-100"
                           for="usr">@lang('modules.currencySettings.isCryptoCurrency')</label>
                    <div class="d-flex">
                        <x-forms.radio fieldId="crypto_currency_yes" :fieldLabel="__('app.yes')"
                                       fieldName="is_cryptocurrency" fieldValue="yes">
                        </x-forms.radio>
                        <x-forms.radio fieldId="crypto_currency_no" :fieldLabel="__('app.no')" fieldValue="no"
                                       fieldName="is_cryptocurrency" checked>
                        </x-forms.radio>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-lg-4 crypto-currency" style="display: none">
                <x-forms.text class="mr-0 mr-lg-2 mr-md-2" :fieldLabel="__('modules.currencySettings.usdPrice')"
                              :fieldPlaceholder="__('placeholders.price')" fieldName="usd_price"
                              fieldId="usd_price" fieldRequired="true">
                </x-forms.text>
            </div>

            <div class="col-sm-12 col-lg-6 regular-currency">
                <x-forms.number class="mr-0 mr-lg-2 mr-md-2"
                                :fieldLabel="__('modules.currencySettings.exchangeRate')"
                                :fieldPlaceholder="__('placeholders.price')" fieldName="exchange_rate"
                                fieldId="exchange_rate" fieldRequired="true">
                </x-forms.number>

                @if(global_setting()->currency_converter_key !=='')
                    <a href="javascript:;" class="fetch-exchange-rate" icon="key"><i class="fa fa-key"></i>
                        @lang('modules.currencySettings.fetchLatestExchangeRate')
                    </a>
                @else
                    @lang('messages.configureCurrencyConverterKey',['link'=> '<a href="javascript:;" class="fetch-exchange-rate" icon="key"><i class="fa fa-key"></i> '.ucwords(__("app.clickHere")).'</a>'])
                @endif
            </div>

        </div>
    </x-form>
</div>
<!-- SETTINGS END -->

<div class="modal-footer">
    <x-forms.button-cancel data-dismiss="modal" class="border-0">@lang('app.cancel')
    </x-forms.button-cancel>
    <x-forms.button-primary id="save-form" class="mr-3" icon="check">@lang('app.save')
    </x-forms.button-primary>
</div>

<script>
    // Toggle between Usd Price field
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
        $.easyAjax({
            url: "{{ route('currency-settings.store') }}",
            container: '#addCurrency',
            type: "POST",
            blockUI: true,
            redirect: true,
            disableButton: true,
            buttonSelector: "#save-form",
            data: $('#addCurrency').serialize(),
            success: function (response) {
                if (response.status == 'success') {
                    window.location.reload();
                }
            }
        })
    });

    $('.fetch-exchange-rate').click(function () {

        let currencyConverterKey = '{{ global_setting()->currency_converter_key }}';

        if (currencyConverterKey === "") {
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
            blockUI: true,
            messagePosition: 'inline',
            success: function (response) {
                $('#exchange_rate').val(response);
            }
        })
    });

    function addCurrencyExchangeKey() {
        const url = "{{ route('currency_settings.exchange_key') }}";
        $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_LG, url);
    }
</script>
