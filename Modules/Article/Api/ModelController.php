<?php

namespace Modules\Article\Api;

use App\Http\Controllers\Controller;
use App\Models\Site;
use Auth;
use Illuminate\Contracts\Container\BindingResolutionException;
use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\InvalidCastException;
use Illuminate\Database\Eloquent\MassAssignmentException;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use InvalidArgumentException;
use LogicException;
use Modules\Article\Entities\Model;
use Modules\Article\Transformers\ModelResource;

class ModelController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    /**
     * 所有模型
     * @param Site $site
     * @return AnonymousResourceCollection
     */
    public function index(Site $site)
    {
        $models = Model::where('site_id', $site->id)->with('user')->get();
        return ModelResource::collection($models);
    }

    /**
     * 保存
     * @param Request $request
     * @param Site $site
     * @param Model $model
     * @return void
     * @throws InvalidCastException
     * @throws LogicException
     * @throws MassAssignmentException
     * @throws InvalidArgumentException
     * @throws BindingResolutionException
     */
    public function store(Request $request, Site $site, Model $model)
    {
        $model->fill($request->input() + ['site_id' => $site['id']]);
        $model->user_id = Auth::id();
        $model->save();
        return $this->message('模型添加成功', $model);
    }

    /**
     * 单条
     * @param Site $site
     * @param Model $model
     * @return Model
     */
    public function show(Site $site, Model $model)
    {
        return $model;
    }

    /**
     * 更新
     * @param Request $request
     * @param Site $site
     * @param Model $model
     * @return void
     * @throws MassAssignmentException
     * @throws InvalidArgumentException
     * @throws BindingResolutionException
     */
    public function update(Request $request, Site $site, Model $model)
    {
        $model->fill($request->input());
        $model->user_id = Auth::id();
        $model->save();
        return $this->message('模型修改成功', $model);
    }

    /**
     * 删除
     * @param Site $site
     * @param Model $model
     * @return void
     * @throws BindingResolutionException
     * @throws Exception
     */
    public function destroy(Site $site, Model $model)
    {
        if ($model->categories->count()) {
            return $this->error('有栏目在使用模型不允许删除');
        }
        $model->delete();
        return $this->message('模型删除成功');
    }
}
