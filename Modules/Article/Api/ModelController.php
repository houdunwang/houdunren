<?php

namespace Modules\Article\Api;

use App\Http\Controllers\Controller;
use App\Models\Site;
use Auth;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Modules\Article\Entities\Model;

class ModelController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    public function index(Site $site)
    {
        return Model::where('site_id', $site->id)->get();
    }

    public function store(Request $request, Site $site, Model $model)
    {
        $model->fill($request->input() + ['site_id' => $site['id']]);
        $model->user_id = Auth::id();
        $model->save();
        return $this->message('模型添加成功', $model);
    }

    public function show(Site $site, Model $model)
    {
        return  $model;
    }

    public function update(Request $request, Site $site, Model $model)
    {
        $model->fill($request->input());
        $model->user_id = Auth::id();
        $model->save();
        return $this->message('模型修改成功', $model);
    }

    public function destroy(Site $site, Model $model)
    {
        $model->delete();
        return $this->message('模型删除成功');
    }
}
