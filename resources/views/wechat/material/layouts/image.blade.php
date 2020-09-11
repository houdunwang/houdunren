<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-2">
                <div class="card shadow-sm">
                    <img src="/images/user-bg.jpg" class="card-img-top" />
                    <div class="card-body text-center">
                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-info">编辑</button>
                            <button type="button" class="btn btn-outline-secondary">删除</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer text-muted">
        <a href="{{ route('wechat.material.create',['type'=>'image']) }}" class="btn btn-primary btn-sm">添加图片素材</a>
    </div>
</div>
