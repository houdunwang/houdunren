<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChatRequest;
use App\Models\Site;
use App\Models\Chat;
use App\Repositories\ChatRepository;

/**
 * 站点微信设置
 * Class WeChatController
 * @package App\Http\Controllers\Site
 */
class ChatController extends Controller
{
    public function index(Site $site, Chat $chat)
    {
        $chats = $chat->site($site)->get();
        return view('site.chat.index', compact('site', 'chats'));
    }

    public function create(Site $site)
    {
        $this->authorize('admin', $site);
        return view('site.chat.create', ['site' => $site]);
    }

    public function store(Site $site, ChatRequest $request, ChatRepository $repository)
    {
        $this->authorize('admin', $site);
        $data = $request->input();
        $data['site_id'] = $site['id'];
        $chat = $repository->create($data);
        return redirect(route('site.chat.show', [$site, $chat]));
    }

    public function show(Site $site, Chat $chat)
    {
        $this->authorize('admin', $site);
        return view('site.chat.show', compact('chat', 'site'));
    }

    public function edit(site $site, Chat $chat)
    {
        $this->authorize('admin', $site);
        return view('site.chat.edit', compact('site', 'chat'));
    }

    public function update(Site $site, Chat $chat, ChatRequest $request)
    {
        $this->authorize('admin', $site);
        $chat->update($request->input());
        return redirect(route('site.chat.show', [$site, $chat]))->with('success', '微信公众号修改成功');
    }

    public function destroy(Site $site, Chat $chat)
    {
        $this->authorize('admin', $site);
        $chat->delete();
        return redirect(route('site.chat.index',[$site]))->with('success', $chat['name'] . '公众号删除成功');
    }
}
