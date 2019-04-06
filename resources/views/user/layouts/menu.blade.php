@inject('MenuRepository','App\Repositories\MenuRepository')
@foreach($MenuRepository->get(\site(),'user_pc') as $moduleTitle=>$menus)
    @if (count($menus['menus']))
        <div class="card rounded shadow-sm bg-white">
            <div class="card-body p-0">
                <div class="list-group list-group-flush">
                    <a href="{{module_link('user.follower',$user)}}"
                       class="list-group-item list-group-item-action text-secondary
{{active_class(if_route('user.follower'),'bg-light')}}">
                        TA 的关注
                    </a>
                    <a href="{{module_link('user.fans',$user)}}"
                       class="list-group-item list-group-item-action text-secondary
{{active_class(if_route('user.fans'),'bg-light')}}">
                        TA 的粉丝
                    </a>
                    @foreach($menus['menus'] as $menu)
                        <a href="{{$menu['url']}}?sid={{\site()['id']}}&mid={{$menus['module']['id']}}&uid={{$user['id']}}"
                           class="list-group-item list-group-item-action text-secondary
{{active_class(strpos(host().$_SERVER['REQUEST_URI'],$menu['url'])!==false,'bg-light')}}">
                            {!! $menu['title'] !!}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
@endforeach