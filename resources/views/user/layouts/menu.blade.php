@inject('ModuleRepository','App\Repositories\ModuleRepository')
@foreach($ModuleRepository->getMenus(site(),'user_pc') as $moduleTitle=>$menus)
    @if (count($menus['menus']))
        <div class="card rounded shadow-sm bg-white">
            <div class="card-body p-0">
                <div class="list-group list-group-flush">
                    @foreach($menus['menus'] as $menu)
                        <a class="list-group-item list-group-item-action text-secondary"
                           href="{{$menu['url']}}?sid={{\site()['id']}}&mid={{$menus['module']['id']}}">
                            {!! $menu['title'] !!}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
@endforeach