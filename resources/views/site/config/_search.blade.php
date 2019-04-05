<div class="card">
    <div class="card-header">
        algolia
        <small>请登录 <a href="https://www.algolia.com">https://www.algolia.com</a> 获取</small>
    </div>
    <div class="card-body">
        <div class="form-group col-sm-6">
            <label>Application ID
                <small class="text-secondary">(search.algolia_id)</small>
            </label>
            <input type="text" name="algolia_id" class="form-control"
                   value="{{old('algolia_id',$config['algolia_id']??'')}}">
        </div>
        <div class="form-group col-sm-6">
            <label>ALGOLIA_SECRET
                <small class="text-secondary">(search.algolia_secret)</small>
            </label>
            <input type="text" name="algolia_secret" class="form-control"
                   value="{{old('algolia_secret',$config['algolia_secret']??'')}}">
        </div>
    </div>
</div>