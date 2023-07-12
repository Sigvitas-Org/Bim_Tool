<div class="modal-header">
    <h5 class="modal-title" id="modelHeading">@lang('recruit::modules.jobApplication.applicantNotes')</h5>
    <button type="button"  class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">×</span></button>
</div>
<div class="modal-body">

    <x-form id="edit-comment-data-form" method="PUT">
        <div class="row">
            <div class="col-md-12 p-20 ">
                <div class="media">

                    <div class="media-body bg-white">
                        <div class="form-group">
                            <div id="task-edit-comment">{!! $note->note_text !!}</div>
                            <textarea name="comment" class="form-control invisible d-none"
                                id="task-edit-comment-text">{!!  $note->note_text !!}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-form>
</div>
<div class="modal-footer">
    <x-forms.button-cancel data-dismiss="modal" class="border-0 mr-3">@lang('app.cancel')</x-forms.button-cancel>
    <x-forms.button-primary id="save-edit-comment" icon="check">@lang('app.save')</x-forms.button-primary>
</div>

<script>
    $(document).ready(function() {
        quillImageLoad('#task-edit-comment');

        $('body').on('click', '#save-edit-comment', function() {

            var comment = document.getElementById('task-edit-comment').children[0].innerHTML;
            document.getElementById('task-edit-comment-text').value = comment;

            var token = '{{ csrf_token() }}';

            const url = "{{ route('applicant-note.update', $note->id) }}";

            $.easyAjax({
                url: url,
                container: '#edit-comment-data-form',
                type: "POST",
                disableButton: true,
                blockUI: true,
                buttonSelector: "#save-edit-comment",
                data: {
                    '_token': token,
                    comment: comment,
                    '_method': 'PUT',
                    applicationId: '{{ $note->job_application_id }}'
                },
                success: function(response) {
                    if (response.status == "success") {
                        document.getElementById('comment-list').innerHTML = response.view;
                        $(MODAL_LG).modal('hide');
                    }

                }
            });
        });

    });

</script>
