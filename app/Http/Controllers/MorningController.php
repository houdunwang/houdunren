<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;

use Auth;
use DB;
use App\Http\Controllers\Controller;
use App\Models\Morning;
use App\Models\User;
use App\Http\Requests\StoreMorningRequest;
use App\Http\Requests\UpdateMorningRequest;
use App\Http\Resources\MorningResource;

class MorningController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->except(['index', 'latest', 'signs']);
    }

    //最新活动签到用户列表
    public function signs()
    {
        return UserResource::collection($this->query()->inRandomOrder()->paginate(36));
    }

    //最新的活动
    public function latest()
    {
        return new MorningResource(Morning::whereState(false)->latest()->first());
    }

    //随机抽取用户
    public function luck()
    {
        $morning = Morning::latest('id')->whereState(false)->first();
        if (!$morning) return $this->respondError('下次活动马上要开始了');
        if ($morning->end_time->diffInMinutes(now(), false) < 0) return $this->respondError('还没到抽取时间');
        if (!Auth::user()->is_administrator) return $this->respondError('你没有操作权限');

        DB::beginTransaction();
        $user = $this->query()->inRandomOrder()->first();
        //修改活动状态
        if ($user) {
            $morning->user_id = $user->id;
            $morning->save();
            Morning::latest('id')->update(['state' => true]);
        }
        DB::commit();
        if ($user) return $this->respondWithSuccess(new UserResource($user));
        return $this->respondError('没有用户满足条件');
    }

    protected function query()
    {
        $morning = Morning::latest()->whereState(false)->first();

        $q = User::whereNotNull('address')->whereNotNull('mobile');
        if (!$morning) return $q->where('id', 0)->with('signs');

        $q->whereHas('signs', function ($query) use ($morning) {
            $query->select('user_id')
                ->whereDate('created_at', '>=', $morning->created_at)
                ->where('created_at', '<=', $morning->end_time)
                ->whereTime('created_at', '>=', '05:00:00')
                ->whereTime('created_at', '<=', '07:30:00')
                ->groupBy('user_id')->havingRaw("count('user_id')>=?", [2]);
        })->whereNotIn(
            'id',
            Morning::whereNotNull('user_id')->whereNull('video')->pluck('user_id')
        );

        return $q;
    }

    //往期活动
    public function index()
    {
        return MorningResource::collection(Morning::when(request('state'), function ($query) {
            $query->whereState(request('state'));
        })->latest('end_time')->paginate(20));
    }

    public function show(Morning $morning)
    {
        return new MorningResource($morning);
    }

    public function store(StoreMorningRequest $request, Morning $morning)
    {
        $this->authorize('create', Morning::class);
        $morning->fill($request->input())->save();
        return $this->respondOk('添加成功');
    }

    public function update(UpdateMorningRequest $request, Morning $morning)
    {
        $this->authorize('update', $morning);
        $morning->fill($request->input())->save();
        return $this->respondOk('更新成功');
    }

    public function destroy(Morning $morning)
    {
        $this->authorize('update', $morning);
        $morning->delete();
        return $this->respondOk('删除成功');
    }
}
