<div class="card">
    <div class="card-header">
        基本信息
    </div>
    <div class="card-body col-6">
        <x-form theme="radio" title="上传驱动" name="upload[drive]" :options="['local'=>'本地上传','oss'=>'阿里云OSS']"
            value="{{ config('site.upload.drive','local') }}" placeholder="">
        </x-form>
        <x-form title="文件大小" name="upload[file_size]" value="{{ config('site.upload.file_size','200000000') }}"
            placeholder="允许上传的文件大小"></x-form>

        <x-form title="上传类型" name="upload[extensions]"
            value="{{ config('site.upload.extensions','jpg,jpeg,gif,png,doc,txt,pem') }}" placeholder="请用英文半角逗号分隔文件类型">
        </x-form>
    </div>
</div>
