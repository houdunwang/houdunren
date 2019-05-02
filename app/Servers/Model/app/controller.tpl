<?php
namespace Modules\{UPPER_MODULE}\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\{UPPER_MODULE}\Entities\{MODEL};
use Modules\{UPPER_MODULE}\Repositories\{UPPER_NAME}Repository;
use App\Servers\FieldServer;
class {UPPER_NAME}Controller extends Controller
{
    protected function getFieldServer()
    {
        return app(FieldServer::class)->init(module(), '{MODEL}');
    }

    public function index({UPPER_NAME}Repository $repository)
    {
        $fieldServer = $this->getFieldServer();
        $data = $repository->paginate(10);
        return view('{LOWER_MODULE}::admin.{LOWER_NAME}.index', compact('data','fieldServer'));
    }

    public function create({MODEL} $model)
    {
        $fieldServer = $this->getFieldServer();
        return view('{LOWER_MODULE}::admin.{LOWER_NAME}.create',compact('model','fieldServer'));
    }

    public function store(Request $request, {UPPER_NAME}Repository $repository)
    {
        $repository->create($request->input());
        return redirect(module_link('{LOWER_MODULE}.admin.{LOWER_NAME}.index'))->with('success', '添加完成');
    }

    public function edit({MODEL} ${LOWER_NAME})
    {
        $fieldServer = $this->getFieldServer();
        return view('{LOWER_MODULE}::admin.{LOWER_NAME}.edit',
        ['model' => ${LOWER_NAME}, 'fieldServer' => $fieldServer]);
    }

    public function update(Request $request, {MODEL} ${LOWER_NAME}, {UPPER_NAME}Repository $repository)
    {
        $repository->update(${LOWER_NAME}, $request->input());
        return redirect(module_link('{LOWER_MODULE}.admin.{LOWER_NAME}.index'))->with('success', '修改成功');
    }

    public function destroy({MODEL} ${LOWER_NAME},{UPPER_NAME}Repository $repository)
    {
        $repository->delete(${LOWER_NAME});
        return redirect(module_link('{LOWER_MODULE}.admin.{LOWER_NAME}.index'))->with('success', '删除成功');
    }
}
