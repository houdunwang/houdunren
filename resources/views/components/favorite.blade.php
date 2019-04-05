{{--收藏--}}
<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
    <button onclick="modelFavorite()"
            class="btn btn-outline-danger btn-sm float-right small p-0 pl-2 pr-2 favorite {{active_class(!$model->isFavorite(),'d-none')}}">
        <i class="fa fa-heart"></i> 已收藏
    </button>
    <button onclick="modelFavorite()"
            class="btn btn-outline-secondary rounded-left btn-sm float-right small p-0 pl-2 pr-2 favorite {{active_class($model->isFavorite(),'d-none')}}">
        <i class="fa fa-heart-o"></i> 收藏
    </button>
  <button type="button" class="btn btn-outline-secondary favoriteCount">{{$model->favoriteCount()}}</button>
</div>
@push('js')
    <script>
        function modelFavorite() {
            if (user_login()) {
                require(['hdjs', 'axios'], function (hdjs, axios) {
                    let url =
                        "{{route('member.favorite.make',[str_replace('\\','-',get_class($model)),$model['id']])}}";
                    axios.get(url).then(function (response) {
                        $(".favoriteCount").html(response.data.total);
                        $(".favorite").each(function () {
                            $(this).toggleClass('d-none');
                        });
                    }).catch(function (error) {
                        hdjs.info(error.response.data.message);
                    })
                });
            }
        }
    </script>
@endpush
