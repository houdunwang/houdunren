<div class="card mt-3">
    <div class="card-header">
        套餐资料
    </div>
    <div class="card-body">
        <x-form name="title" required title="套餐名称" value="{{ $subscribe['title'] }}"></x-form>
        <x-form name="icon" required title="图标" value="{{ $subscribe['icon'] }}"></x-form>

        <x-form theme="textarea" name="ad" required title="广告语">{{ old('ad',$subscribe['ad']) }}</x-form>
        <x-form name="price" type="text" required title="价格" value="{{ $subscribe['price'] }}"></x-form>
        <x-form name="month" type="number" required title="订阅月数" value="{{ $subscribe['month'] }}"></x-form>

    </div>
</div>

<button class="btn btn-primary mt-3">保存</button>
