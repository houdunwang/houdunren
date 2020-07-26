{{-- 站内消息 --}}
<div class="d-flex pt-3 pb-3 border-bottom align-items-center mb-2">
    <a href="{{ $notification->data['link']}}" class="">
        <span class="mr-3 ">
            <img src="{{ $notification->data['icon']??'/images/avatar.jpg' }}" class="avatar45 rounded">
        </span>
    </a>
    <div class="d-flex flex-column justify-content-between">
        <a href="{{ route('Edu.member.message.show',$notification['id']) }}" class="text-secondary h5">
            {{ $notification->data['title'] }}
        </a>
        <div class="small text-black-50">
            {{-- <a href="{{ route('Edu.space.topic',$notification->notifiable) }}">
            {{ $notification->data['nickname']??'' }}
            </a> . --}}

            消息来自 {{ $notification->updated_at->diffForHumans() }}
        </div>

    </div>
</div>
