<?php

namespace Modules\Edu\Api;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Modules\Edu\Transformers\SignResource;
use Modules\Edu\Http\Requests\SignRequest;
use App\Http\Controllers\Controller;
use Modules\Edu\Entities\Sign;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use ActivityService;
use App\Models\Site;
use Auth;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Database\Eloquent\InvalidCastException;
use Illuminate\Database\Eloquent\MassAssignmentException;
use LogicException;
use InvalidArgumentException;

/**
 * 签到
 * @package Modules\Edu\Api
 */
class SignController extends Controller
{
    use AuthorizesRequests;

    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->except('index');
        $this->authorizeResource(Sign::class, 'sign');
    }

    /**
     * 签到列表
     * @return AnonymousResourceCollection
     * @throws InvalidCastException
     * @throws LogicException
     * @throws InvalidArgumentException
     */
    public function index()
    {
        $signs = Sign::with('user')->where('site_id', site()['id'])->whereDate('created_at', now())->get();
        return SignResource::collection($signs);
    }

    /**
     * 发表签到
     * @param SignRequest $request
     * @param Site $site
     * @param Sign $sign
     * @return void
     * @throws MassAssignmentException
     * @throws InvalidArgumentException
     * @throws BindingResolutionException
     */
    public function store(SignRequest $request, Site $site, Sign $sign)
    {
        $sign->fill($request->input());
        $sign->site_id = site('id');
        $sign->user_id = Auth::id();
        $sign->save();
        ActivityService::log($sign);
        return $this->message('签到添加成功', new SignResource($sign->load('user')));
    }

    public function destroy(Request $request, Site $site, Sign $sign)
    {
        $sign->delete();
        return ['message' => '签到删除成功'];
    }
}
