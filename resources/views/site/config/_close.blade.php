<div class="alert alert-secondary" role="alert">
    只影响前台用户，超级管理员不受影响。
</div>
<div class="card">
    <div class="card-header">站点维护</div>
    <div class="card-body">
        <div class="form-group row">
            <label class="col-form-label col-sm-1 pt-0">
                暂停访问
                <small class="text-secondary">(state)</small>
            </label>
            <div class="col-sm-6">
                <div class="form-check form-check-inline">
                    <label class="form-check-label mr-3">
                        <input class="form-check-input" type="radio" value="1"
                               name="state" {{active_class(($config['state']??0)==1,'checked')}}> 是
                    </label>
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" value="0"
                               name="state" {{active_class(($config['state']?? 0)==0,'checked')}}> 否
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-form-label col-sm-1 pt-0">
                提示信息
                <small class="text-secondary">(message)</small>
            </label>
            <div class="col-sm-6">
                <div class="form-group">
                    <textarea class="form-control" name="message"
                              rows="5">{{$config['message']??'网站停机维护请稍候访问，给你带来的不便敬请谅解。'}}</textarea>
                </div>
                <span class="help-block text-muted small">
                    网站临时关闭时提示给用户的友好信息。
                </span>
            </div>
        </div>
    </div>
</div>