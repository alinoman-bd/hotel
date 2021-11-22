<div class="modal fade" id="cropper_alt_modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
    aria-hidden="true" style="z-index: 9999999">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">@lang('backend.modal.croper.image')</h4>
            </div>
            <div class="modal-body" style="width: 100%; overflow: hidden;">
                <div class="img-container">
                    <img id="cropper_alt_image" src="https://avatars0.githubusercontent.com/u/3456749"
                        style="width: 100%">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">>@lang('backend.modal.cancel')</button>
                <button type="button" class="btn btn-primary" id="cropper_alt_crop">>@lang('backend.modal.crop')</button>
            </div>
        </div>
    </div>
</div>