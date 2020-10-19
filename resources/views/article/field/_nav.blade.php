<nav class="nav nav-tabs mb-3">
  <a class="nav-link" href="{{ route('article.model.index') }}">
    返回模型列表
  </a>
  <a class="nav-link {{ active_class(if_route('article.model.field.index'))}}"
    href="{{ route('article.model.field.index',$model) }}">
    字段列表
  </a>
  <a class="nav-link {{ active_class(if_route('article.model.field.create'))}}"
    href="{{ route('article.model.field.create',$model) }}">
    添加字段
  </a>
  @if(if_route('article.field.edit'))
  <a class="nav-link active" href="#">
    编辑字段
  </a>
  @endif
</nav>
