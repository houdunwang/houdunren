@can('download',$lesson)
    <button type="button" data-toggle="modal" data-target="#exampleModal"
            class="btn btn-xs btn-light u-btn-light transition-3d-hover btn-xs float-right ml-2 text-secondary">
        <i class="fa fa-download" aria-hidden="true"></i> 整套下载
    </button>
    <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">下载整套课程</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-5">
                    <span class="text-secondary">
                        {{$lesson['download_address']}}
                    </span>
                </div>
                <div class="p-3 text-center small">
                    <div class="alert alert-warning" role="alert">
                        <strong>请大家尊重版权不要传播 . 这样我们才可以继续录制高质量课程。</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endcan