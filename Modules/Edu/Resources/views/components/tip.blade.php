<div class="card rounded shadow-sm mb-2">
    <div class="card-header bg-white text-muted">
        <i aria-hidden="true" class="fa fa-check-circle-o mr-1"></i>
        社区小贴
    </div>
    <div class="card-body font-weight-light">后盾人是一个主张友好、分享、自由的技术交流社区。</div>
    <div class="card-footer text-muted bg-white text-center">
        <div class="d-flex justify-content-between">
            <a href="{{ route('Edu.front.topic.create') }}" class="btn btn-outline-success btn-sm flex-fill">
                <i class="fa fa-pencil-square-o"></i> 发贴交流
            </a>
            <a href="{{ route("Edu.front.sign.index") }}" class="btn btn-outline-danger btn-sm flex-fill ml-2">
                <i aria-hidden="true" class="fa fa-flag"></i>
                签到打卡
            </a>
        </div>
    </div>
</div>
