<nav class="nav nav-tabs mb-3">
  <a class="nav-link {{ active_class(if_route('article.content.index'))}}" href="{{ route('article.content.index') }}">
    文章列表
  </a>
  <a class="nav-link {{ active_class(if_route('article.content.create'))}}"
    href="{{ route('article.content.create') }}">
    新增文章
  </a>
  @if(if_route('article.content.edit'))
  <a class="nav-link active" href="#">
    编辑文章
  </a>
  @endif
</nav>
