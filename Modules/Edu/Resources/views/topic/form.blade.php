<div class="container mt-5" id="app">
    <div class="card shadow-sm">
        <div class="card-header">
            贴子管理
        </div>
        <div class="card-body">
            <x-form name="title" title="贴子标题" requried value="{{ $topic['title'] }}"></x-form>
            <div class="mb-2">
                @foreach ($tags as $tag)
                <label class="mr-3">
                    <input type="checkbox" name="tags[]" value="{{ $tag['id'] }}"
                        {{ $topic->tags->contains($tag)?'checked':'' }}>
                    {{ strtoupper($tag['title']) }}
                </label>
                @endforeach
            </div>
            <div class="v-cloak">
                <editor :content.sync="content" action="{{ route('common.upload') }}" name="content"></editor>
                <textarea hidden name="content" v-model="content"></textarea>
            </div>
        </div>
        <div class="card-footer text-muted">
            <button class="btn btn-primary mt-3">保存</button>
        </div>
    </div>
</div>

@push('vue')
<script>
    window.vue={
        data:{
            content:@json(old('content',$topic['content']))
        }
    }
</script>
@endpush
