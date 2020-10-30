<nav class="nav nav-tabs mb-3">
  <a class="nav-link" href="{{ route('article.model.index') }}">
    返回模型列表
  </a>
  <a class="nav-link {{ active_class(if_route('article.system.field.index'))}}"
     href="{{ route('article.system.field.index',$model) }}">
    系统字段列表
  </a>
  @if(if_route('article.system.field.edit'))
  <a class="nav-link active" href="#">
    编辑字段
  </a>
  @endif
</nav>
