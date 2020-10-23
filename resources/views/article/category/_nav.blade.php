<nav class="nav nav-tabs mb-3">
  <a class="nav-link {{ active_class(if_route('article.category.index'))}}"
    href="{{ route('article.category.index') }}">
    项目列表
  </a>
  <a class="nav-link {{ active_class(if_route('article.category.create'))}}"
    href="{{ route('article.category.create') }}">
    新增栏目
  </a>
  @if(if_route('article.category.edit'))
  <a class="nav-link active" href="#">
    编辑栏目
  </a>
  @endif
</nav>