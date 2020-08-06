<div class="card mt-3">
    <div class="card-header">
        直播配置
    </div>
    <div class="card-body">
        <x-form theme="textarea" name="live[other_path]" title="B站等第三方推流地址">{{ config('module.live.other_path') }}
        </x-form>

        <x-form theme="textarea" name="live[notice]" title="直播公告">{{ config('module.live.notice') }}</x-form>
    </div>

</div>

<div class="card mt-3">
    <div class="card-header">
        阿里云直播参数
    </div>
    <div class="card-body">
        <x-form name="live[push_url]" value="{{ config('module.live.push_url') }}" title="推流地址"></x-form>
        <x-form name="live[push_key]" value="{{ config('module.live.push_key') }}" title="推流鉴权KEY"></x-form>

        <x-form name="live[play_url]" value="{{ config('module.live.play_url') }}" title="播流地址"></x-form>

        <x-form name="live[play_key]" value="{{ config('module.live.play_key') }}" title="播流鉴权KEY"></x-form>

    </div>
</div>
