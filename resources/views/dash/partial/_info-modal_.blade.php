<?php
/**
 * Created by PhpStorm
 * User: Junior Trust
 * Date: 10/8/2020
 * Time: 7:01 PM
 */
?>

<div class="modal fade" id="info-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="info-modal-title">Default Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="info-modal-body">
                <p>...</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<script>
   let $info_modal = $("#info-modal");
   let $info_modal_body = $("#info-modal-body");
   let $info_modal_title = $("#info-modal-title");
   $info_modal.on('hidden.bs.modal', function (e) {
       // do something...
       $info_modal_body.html("")
       $info_modal_title.html("Title")
   })
</script>
