<div class="modal-header">
    <h5 class="modal-title" id="modelHeading">@lang('app.edit') @lang('recruit::modules.jobApplication.boardColumn')</h5>
    <button type="button"  class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">×</span></button>
</div>
<div class="modal-body">
    <x-form id="updateTaskBoardColumn" method="PUT">
        <div class="row">
            <div class="col-md-6">
                <x-forms.label fieldId="category_id" fieldRequired="true"
                    :fieldLabel="__('app.category')"
                    class="mt-3"></x-forms.label>
                <select name="category_id" id="category_id" class="form-control select-picker" data-size="8">
                    <option value="">--</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            @if ($category->id == $status->category_id) selected @endif>{{ ucfirst($category->name) }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <x-forms.text class="mr-0 mr-lg-2 mr-md-2" :fieldLabel="__('recruit::modules.jobApplication.columnName')"
                    fieldName="status" fieldId="status" :placeholder="__('recruit::modules.jobApplication.columnName')"
                    :fieldValue="$status->status" fieldRequired="true" />
            </div>

            <div class="col-md-6">
                <x-forms.select fieldId="position" :fieldLabel="__('recruit::modules.jobApplication.position')" fieldName="position"
                    search="true">
                    <option selected value="no_change">@lang('recruit::modules.jobApplication.noChange')</option>
                    @if ($status->position > 0 && isset($firstStatus))
                            <option value="before_first">{{'Before '.ucwords($firstStatus->status)}}</option>
                        @endif
                        @foreach ($statuses as $stat)

                            <option @if($stat->position === $status->position-1) selected @endif value="{{$stat->position}}">{{'After '.ucwords($stat->status)}}</option>
                        @endforeach
                </x-forms.select>
            </div>

            <div class="col-md-6">
                <div class="form-group my-3">
                    <x-forms.label fieldId="colorselector" fieldRequired="true"
                        :fieldLabel="__('recruit::modules.jobApplication.labelColor')">
                    </x-forms.label>
                    <x-forms.input-group id="colorpicker">
                        <input type="text" class="form-control height-35 f-14" value="{{ $status->color }}"
                            placeholder="{{ __('placeholders.colorPicker') }}" name="color" id="colorselector">

                        <x-slot name="append">
                            <span class="input-group-text height-35 colorpicker-input-addon"><i></i></span>
                        </x-slot>
                    </x-forms.input-group>
                </div>
            </div>

            <div class="col-lg-12 my-2 ml-1 py-20">
                <x-forms.checkbox :fieldLabel="__('recruit::modules.jobApplication.action')" fieldName="action"
                    fieldId="action" fieldValue="yes" :checked="$status->action == 'yes'" />
            </div>
        </div>
    </x-form>
</div>
<div class="modal-footer">
    <x-forms.button-cancel data-dismiss="modal" class="border-0 mr-3">@lang('app.cancel')</x-forms.button-cancel>
    <x-forms.button-primary id="update-job-board-column" icon="check">@lang('app.save')</x-forms.button-primary>
</div>

<script src="{{ asset('vendor/jquery/bootstrap-colorpicker.js') }}"></script>
<script>
    $("#updateTaskBoardColumn .select-picker").selectpicker();

    $('#colorpicker').colorpicker({
        "color": "{{ $status->color }}"
    });

    $('body').on('click', '#update-job-board-column', function() {

        var url = "{{ route('job-appboard.update', $status->id) }}";

        $.easyAjax({
            url: url,
            container: '#updateTaskBoardColumn',
            disableButton: true,
            blockUI: true,
            buttonSelector: "#update-board-column",
            type: "POST",
            data: $('#updateTaskBoardColumn').serialize(),
            success: function(response) {
                if (response.status == 'success') {
                    window.location.reload();
                }
            }
        })
    });

</script>
