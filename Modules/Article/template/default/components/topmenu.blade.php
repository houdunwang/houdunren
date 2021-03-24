@inject('category','Modules\Article\Entities\Category')

<header class="navbar navbar-expand-md navbar-light d-print-none shadow border-t-4 border-hd">
    <div class="container-xl flex items-center"><button type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" class="navbar-toggler"><span
                  class="navbar-toggler-icon"></span></button>
        <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
            <a href="/" aria-current="page"
               class="text-hd hover:text-red-800 text-red-500 text-xl router-link-exact-active router-link-active">
                <i class="fas fa-code"></i>
                houdunren.com
            </a></h1>
        <div class="navbar-nav flex-row order-md-last">

        </div>
        <div id="navbar-menu" class="collapse navbar-collapse">
            <div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
                <ul class="navbar-nav">
                    @foreach($category->limit(6)->get() as $category)
                    <li class="nav-item">
                        <a href="{{ route('article.category',$category) }}" class="nav-link text-gray-500 font-semibold hover:text-hd">
                            <span class="nav-link-title">
                                {{ mb_substr($category->title,0,5,'utf-8') }}
                            </span>
                        </a>
                    </li>
                    @endforeach

                </ul>
            </div>
        </div>
    </div>
</header>
