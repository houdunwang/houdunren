<?php

namespace App\WeChat;

use App\Http\Controllers\Controller;
use App\Http\Requests\WeChatMessageRequest;
use App\Http\Resources\WeChatMessageResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\MassAssignmentException;
use Illuminate\Database\Eloquent\InvalidCastException;
use App\Models\Site;
use App\Models\WeChat;
use App\Models\WeChatMessage;
use InvalidArgumentException;
use LogicException;

/**
 * 微信文消息
 * @package App\WeChat
 */
class WeChatMessageController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(WeChatMessage::class, 'message');
    }

    /**
     * 列表
     * @param Site $site
     * @param WeChat $wechat
     * @return AnonymousResourceCollection
     * @throws InvalidCastException
     * @throws LogicException
     */
    public function index(WeChat $wechat)
    {
        $weChatMessages = $wechat->messages()->where('type', request('type'))->when(request('module'), function ($query, $module) {
            return $query->where('module_id', $module);
        })->paginate(15);
        return WeChatMessageResource::collection($weChatMessages);
    }

    /**
     * 添加消息
     * @param WeChatMessageRequest $request
     * @param WeChat $wechat
     * @param WeChatMessage $weChatMessage
     * @throws InvalidCastException
     * @throws LogicException
     * @throws BindingResolutionException
     * @throws MassAssignmentException
     * @throws InvalidArgumentException
     */
    public function store(WeChatMessageRequest $request, WeChat $wechat, WeChatMessage $message)
    {
        $data = $request->input() + ['wechat_id' => $wechat['id'], 'module_id' => request('module')];
        $message->fill($data)->save();
        return $this->message('消息添加成功');
    }

    /**
     * 更新消息
     * @param WeChatMessageRequest $request
     * @param Site $site
     * @param WeChat $wechat
     * @param WeChatMessage $weChatMessage
     * @return void
     * @throws InvalidCastException
     * @throws LogicException
     * @throws BindingResolutionException
     * @throws MassAssignmentException
     * @throws InvalidArgumentException
     */
    public function update(WeChatMessageRequest $request,  WeChat $wechat, WeChatMessage $message)
    {
        $message->fill($request->except(['keywordTypeTitle']))->save();
        return $this->message('消息修改成功');
    }

    /**
     * 删除消息
     * @param WeChatMessage $weChatMessage
     * @return void
     */
    public function destroy(WeChat $wechat, WeChatMessage $message)
    {
        $message->delete();
        return $this->message('消息删除成功');
    }
}
