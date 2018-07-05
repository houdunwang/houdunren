<div id="modalMessage" tabindex="-1" role="dialog" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span class="mdi mdi-close"></span></button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <div class="text-primary"><span class="modal-main-icon mdi mdi-check"></span></div>
                    <h3>Awesome!</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br>Fusce ultrices euismod lobortis.</p>
                    <div class="mt-8">
                        <button type="button" data-dismiss="modal" class="btn btn-space btn-secondary">Cancel</button>
                        <button type="button" data-dismiss="modal" class="btn btn-space btn-primary">Proceed</button>
                    </div>
                </div>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        //显示消息框
        $('#modalMessage').modal('show');
    });
</script>
