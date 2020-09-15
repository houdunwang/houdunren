<div class="card mt-3">
    <div class="card-header">
        课程资料
    </div>
    <div class="card-body">
        <x-form name="title" title="课程名称" require value="{{$lesson['title']}}" />
        <x-form theme="radio-inline" title="课程上架" name="status" :options="[1=>'是',0=>'否']"
            value="{{ $lesson['status']??1 }}">
        </x-form>
        <x-form theme="radio-inline" title="推荐课程" name="is_commend" :options="[1=>'是',0=>'否']"
            value="{{ $lesson['is_commend']??0 }}">
        </x-form>
        <x-form theme="textarea" name="description" title="简单介绍">{{ old('description',$lesson['description']) }}
        </x-form>


        <x-form theme="image" title="预览图" name="thumb" value="{{ $lesson['thumb'] }}"></x-form>

    </div>
</div>

<div class="card mt-3">
    <div class="card-header">
        销售
    </div>
    <div class="card-body">
        <x-form name="free_num" title="免费观看数量" value="{{ $lesson['free_num'] }}"></x-form>
        <x-form type="number" name="price" title="售价" value="{{ $lesson['price'] }}"></x-form>
        <x-form type="url" name="download_address" title="高清下载地址" value="{{ $lesson['download_address'] }}"></x-form>
    </div>
</div>

<div class="card mt-3">
    <div class="card-header">
        标签
    </div>
    <div class="card-body">
        @foreach ($tags as $tag)
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="customCheck{{ $tag['id'] }}" name="tags[]"
                value="{{ $tag['id'] }}" {{ $lesson->tags->contains($tag)?'checked':'' }}>
            <label class="custom-control-label" for="customCheck{{ $tag['id'] }}">{{ $tag['title'] }}</label>
        </div>
        @endforeach
    </div>
</div>
<lesson-video></lesson-video>
<button class="btn btn-primary mt-3">保存</button>

@push('vue')
<script>
    window.videos = {!! old('videos',json_encode($lesson->videos->toArray()))!!}
</script>
@endpush
