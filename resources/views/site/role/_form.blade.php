<div class="card mt-3 shadow-sm">
  <div class="card-header">
    角色设置
  </div>
  <div class="card-body">
    <x-form title="角色名称" name="title" required class="col-12 col-md-8" placeholder="请输入中文角色名称"
            :value="$role?$role['title']:''" />
    <x-form title="角色标识" name="name" required class="col-12 col-md-8" placeholder="请输入英文字符"
            :value="$role?$role['name']:''" />
  </div>
</div>
