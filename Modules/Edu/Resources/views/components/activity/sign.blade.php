<div class="d-flex pt-3 pb-3 border-bottom align-items-center mb-2">
    <a href="{{ route('Edu.space.topic',$sign->user) }}">
        <span class="mr-3 ant-avatar ant-avatar-square ant-avatar-image">
            <img src="{{ $sign->user->avatar }}" class="w45 rounded">
        </span>
    </a>
    <div class="d-flex flex-column justify-content-between">
        <a href="{{ route('Edu.front.sign.index') }}" class="text-secondary h5">
            {{ $sign->content }}
        </a>
        <div class="small text-black-50">
            <span class="badge badge-success">每日签到</span>
            <a href="{{ route('Edu.space.topic',$sign->user) }}" class="">{{ $sign->user->name }}</a>
            . 发表于 {{ $sign->updated_at->diffForHumans() }}
        </div>
    </div>
</div>
