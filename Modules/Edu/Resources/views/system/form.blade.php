<div class="card mt-3">
    <div class="card-header">
        课程资料
    </div>
    <div class="card-body">

        <div class="col-6">
            <x-form name="title" title="课程名称" required value="{{ $system['title'] }}"></x-form>
            <x-form theme="textarea" name="description" title="课程介绍" required>
                {{ old('description',$system['description']) }}
            </x-form>

            <x-form theme="image" title="预览图" name="preview" value="{{ $system['preview'] }}"></x-form>
        </div>
    </div>
</div>

<lesson-lists></lesson-lists>

<button class="btn btn-primary mt-3">保存</button>

@push('scripts')
<script>
    window.lessons = @json($system->lessons->toArray());
</script>
@endpush
