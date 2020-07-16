<div class="container mt-5">
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

            <editor name="content" error="@error('content'){{ $message }} @enderror" :content="content">
            </editor>
        </div>
        <div class="card-footer text-muted">
            <button class="btn btn-primary mt-3">保存</button>
        </div>
    </div>
</div>
@push('scripts')
<script>
    window.vue={
        data:{
            content:@json(old('content',$topic['content']))
        }
    }
    // window.editor_content=
</script>
@endpush
