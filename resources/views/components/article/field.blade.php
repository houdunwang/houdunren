@foreach ($category->model->fields as $field)
@switch($field['type'])
@case('radio')
<x-form :theme="$field['type']" :name="$name($field)" :title="$field['title']" class="mt-3"
        :placeholder="$field['placeholder']" :required="$field['required']"
        :options="$options($field['options']['options'])">
</x-form>
@break
@case('editor')
<x-form :theme="$field['options']['type']" :name="$name($field)" :title="$field['title']" class="mt-3"
        :placeholder="$field['placeholder']" :required="$field['required']">
</x-form>
@break
@default
<x-form :theme="$field['type']" :name="$name($field)" :title="$field['title']" class="mt-3"
        :placeholder="$field['placeholder']" :required="$field['required']" :options="$field['options']"></x-form>
@endswitch
@endforeach
