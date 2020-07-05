<div class="card">
    <div class="card-header">
        基本信息
    </div>
    <div class="card-body col-6">
        <x-form title="关键词" name="base[keywords]" value="{{ config('site.base.keywords') }}"></x-form>

        <x-form title="网站描述" name="base[description]" value="{{ config('site.base.description') }}"></x-form>

        <x-form title="ICP备案号" name="base[icp]" value="{{ config('site.base.icp') }}"></x-form>

        <x-form title="电话" name="base[tel]" value="{{ config('site.base.tel') }}"></x-form>

        <x-form title="邮箱" name="base[email]" value="{{ config('site.base.email') }}"></x-form>

        <x-form theme="textarea" title="统计代码" name="base[copyright]">{{ config('site.base.copyright') }}</x-form>

    </div>
</div>
