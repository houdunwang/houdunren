<?php

namespace Modules\Edu\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Edu\Entities\Sign;
use Modules\Edu\Transformers\SignResource;
use Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use ActivityService;
use Modules\Edu\Http\Requests\SignRequest;
use App\Models\Site;

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

    public function index()
    {
        $signs = Sign::with('user')->where('site_id', site()['id'])->whereDate('created_at', now())->get();
        return SignResource::collection($signs);
    }

    public function store(SignRequest $request, Site $site, Sign $sign)
    {
        $sign->fill($request->input());
        $sign->site_id = SID;
        $sign->user_id = Auth::id();
        $sign->save();
        ActivityService::log($sign);
        return $this->message('签到添加成功', new SignResource($sign));
    }

    public function destroy(Request $request, Site $site, Sign $sign)
    {
        $sign->delete();
        return ['message' => '签到删除成功'];
    }
}
