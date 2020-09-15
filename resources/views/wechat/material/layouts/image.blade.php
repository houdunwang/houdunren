<div class="card image">
    <div class="card-body">
        @if (count($materials))
        <div class="row">
            @foreach ($materials as $image)
            <div class="col-2">
                <div class="card shadow-sm">
                    <div class="pic">
                        <img src="{{ $image['content']['pic'] }}" class="card-img-top" />
                    </div>
                    <div class="card-body text-center">
                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                            <a href="{{ route('wechat.material.edit',$image) }}" class="btn btn-info">编辑</a>
                            <btn-del action="{{ route('wechat.material.destroy',$image) }}" class="btn btn-secondary">删除
                            </btn-del>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        暂无图片素材
        @endif
    </div>
    <div class="card-footer d-flex align-items-center">
        <div>
            <a href="{{ route('wechat.material.create',['type'=>'image']) }}" class="btn btn-info btn-sm">添加图片素材</a>
        </div>

        <div class="flex-fill d-flex justify-content-end align-items-center">
            {{ $materials->links() }}
        </div>
    </div>
</div>
