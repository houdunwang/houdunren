<?php
namespace Modules\{MODULE_NAME}\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\{MODULE_NAME}\Entities\{MODEL};
use Modules\{MODULE_NAME}\Repositories\{NAME}Repository;

class {NAME}Controller extends Controller
{
    public function index({NAME}Repository $repository)
    {
        $data = $repository->paginate(10);
        return view('{MODULE_NAME_LOWER}::admin.{NAME_LOWER}.index', compact('data'));
    }

    public function create()
    {
        return view('{MODULE_NAME_LOWER}::admin.content.create');
    }

    public function store(Request $request, {NAME}Repository $repository)
    {
        $repository->create($request->input());
        return redirect(module_link('article.admin.{NAME_LOWER}.index'))->with('success', '添加完成');
    }

    public function edit({MODEL} ${NAME_LOWER})
    {
        return view('{MODULE_NAME_LOWER}::admin.{NAME_LOWER}.edit', ['field'=>${NAME_LOWER}]);
    }

    public function update(Request $request, {MODEL} ${NAME_LOWER}, {NAME}Repository $repository)
    {
        $repository->update(${NAME_LOWER}, $request->input());
        return redirect(module_link('{MODULE_NAME_LOWER}.admin.{NAME_LOWER}.index'))->with('success', '修改成功');
    }

    public function destroy({MODEL} ${NAME_LOWER})
    {
        ${NAME_LOWER}->delete();
        return redirect(module_link('{MODULE_NAME_LOWER}.admin.{NAME_LOWER}.index'))->with('success', '删除成功');
    }
}
