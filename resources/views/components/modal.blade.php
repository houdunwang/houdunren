<form action="{{$url}}" method="post">
    @csrf
    @isset($method) @method($method) @endif
    <div id="{{$id??''}}" tabindex="-1" role="dialog" class="modal fade colored-header colored-header-primary">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-colored">
                    <h3 class="modal-title">
                        @isset($title) {{$title}} @endisset
                    </h3>
                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close md-close"><span class="mdi mdi-close"></span></button>
                </div>
                <div class="modal-body">
                    {{$slot}}
                </div>
                <div class="modal-footer">
                    @isset($footer)
                        {{$footer}}
                    @else
                        <button type="button" data-dismiss="modal" class="btn btn-secondary md-close">关闭</button>
                        <button type="submit" class="btn btn-primary">保存</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</form>
