<div class="border p-3 shadow-sm">
  <x-form name="title" title="网站名称" :value="$config['title']??''" />
  <x-form name="keywords" title="SEO关键字" :value="$config['keywords']??''" />
  <x-form name="description" title="SEO简单" :value="$config['description']??''" />
</div>
