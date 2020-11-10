<nav class="nav nav-tabs mb-3">
  <a class="nav-link {{ active_class(if_route('article.admin.model.index'))}}"
     href="{{ route('article.admin.model.index') }}">
    模型列表
  </a>
  <a class="nav-link {{ active_class(if_route('article.admin.model.create'))}}"
     href="{{ route('article.admin.model.create') }}">
    新增模型
  </a>
  @if(if_route('article.admin.model.edit'))
  <a class="nav-link active" href="#">
    编辑模型
  </a>
  @endif
</nav>
