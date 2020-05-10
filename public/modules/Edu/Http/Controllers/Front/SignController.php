<?php

namespace Modules\Edu\Http\Controllers\Front;

use App\Http\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Exception;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Auth;
use Modules\Edu\Entities\Sign;
use Modules\Edu\Http\Requests\Front\SignRequest;
use Modules\Edu\Transformers\Front\SignResource;

class SignController extends ApiController
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->only(['store', 'destroy']);
    }
    /**
     * 签到列表
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        $signs = Sign::whereDate('created_at', now())->oldest()->get();
        return SignResource::collection($signs);
    }

    public function store(SignRequest $request, Sign $sign)
    {
        if (Sign::todayIsSign(Auth::user())) {
            return $this->error('今天已经签到了');
        }
        $data = $request->all();
        $data['site_id'] = SITEID;
        $data['user_id'] = Auth::id();
        $sign->fill($data)->save();
        return $this->success('签到成功');
    }

    /**
     * 删除签到
     * @param Sign $sign
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Sign $sign)
    {
        $this->authorize('delete', $sign);
        $sign->delete();
        return $this->success('删除成功');
    }
}
