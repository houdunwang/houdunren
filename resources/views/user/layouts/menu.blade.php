@inject('MenuRepository','App\Repositories\MenuRepository')
@foreach($MenuRepository->get(\site(),'user_pc') as $moduleTitle=>$menus)
    @if (count($menus['menus']))
        <div class="card rounded shadow-sm bg-white">
            <div class="card-body p-0">
                <div class="list-group list-group-flush">
                    @foreach($menus['menus'] as $menu)
                        <a class="list-group-item list-group-item-action text-secondary"
                           href="{{$menu['url']}}&uid={{$user['id']}}">
                            {!! $menu['title'] !!}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
@endforeach