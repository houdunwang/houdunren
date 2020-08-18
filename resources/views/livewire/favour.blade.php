<div>
    @auth
    <div class="mt-5 text-center border-top border-gary pt-5">
        <div role="group" aria-label="First group" class="favour btn-group mr-2" wire:click="$emit('change')">
            <button type="button" class="btn btn-success">
                <i class="fa fa-thumbs-o-up"></i> 点个赞呗
            </button>

            <button type="button" class="btn btn-outline-info">
                @if ($this->field->favour_count)
                感谢 {{ $this->field->favour_count }}位朋友的喜欢
                @else
                {{ $this->field->favour_count }}
                @endif
            </button>
        </div>

    </div>
    @endauth

    @guest

    <div class="mt-5 text-center border-top border-gary pt-5">
        <div role="group" aria-label="First group" class="favour btn-group mr-2">
            @if ($this->field->favour_count>0)
            <button type="button" class="btn btn-outline-info">
                感谢 {{ $this->field->favour_count }}位朋友的喜欢
            </button>
            @endif
            <a href="{{ route('auth.login') }}" class="btn btn-success">
                登录系统点个赞呗
            </a>
        </div>
    </div>

    @endguest

    <div class="favour-list text-center pt-3 w-75 m-auto">
        @foreach ($this->field->favours->take(65) as $user)
        <a href="{{ route("Edu.space.fans",$user) }}" class="m-1 d-inline-block">
            <img src="{{ $user->icon }}" class="rounded-circle avatar35">
        </a>
        @endforeach
    </div>
</div>
