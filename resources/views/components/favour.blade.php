{{--收藏--}}
<div class="mt-5 text-center border-top border-gary pt-5">
    <div class="favour btn-group mr-2 {{active_class(!$model->isFavour(),'d-none')}}" role="group"
         aria-label="First group">
        <button class="btn btn-success" onclick="modelFavour()">
            <i class="fa fa-thumbs-o-up"></i> 已赞
        </button>
        <button type="button" onclick="modelFavour()" class="btn btn-outline-secondary border-left-0 favourCount">
            {{$model->favourCount()}}
        </button>
    </div>
    <div class="favour btn-group mr-2 {{active_class($model->isFavour(),'d-none')}}" role="group"
         aria-label="First group">
        <button class="btn btn-outline-secondary" onclick="modelFavour()">
            <i class="fa fa-thumbs-o-up"></i> 点个赞呗
        </button>
        <button type="button" onclick="modelFavour()" class="btn btn-outline-secondary border-left-0 favourCount">
            {{$model->favourCount()}}
        </button>
    </div>
</div>
@if ($avatar??false)
    <div class="favour-list text-center pt-3 w-75 m-auto">
        @foreach($model->favour as $favour)
            <a href="#" class="avatar rounded-circle favour-{{$favour->user['id']}}"
               style="background-image: url('{{asset($favour->user->avatar)}}')"></a>
        @endforeach
        @if (auth()->check())
            <a href="#" class="avatar rounded-circle d-none favour-current-{{auth()->id()}}"
               style="background-image: url('{{asset(auth()->user()['avatar'])}}')"></a>
        @endif
    </div>
@endif
@push('js')
    <script>
        function modelFavour() {
            require(['hdjs', 'axios'], function (hdjs, axios) {
                let url = "{{route('member.favour.make',['Modules-Edu-Entities-EduTopic',$model['id']])}}";
                axios.get(url).then(function (response) {
                    $(".favourCount").html(response.data.total);
                    $(".favour").each(function () {
                        $(this).toggleClass('d-none');
                    });
                    switch (response.data.action) {
                        case 'add':
                            $(".favour-current-{{auth()->id()}}").removeClass('d-none');
                            break;
                        case 'del':
                            $(".favour-current-user").addClass('d-none');
                            $(".favour-{{auth()->id()}}").remove();
                            $(".favour-current-{{auth()->id()}}").addClass('d-none');
                            break;
                    }
                }).catch(function (error) {
                    hdjs.info(error.response.data.message);
                })
            });
        }
    </script>
@endpush
