<?php

namespace Modules\Edu\Http\Controllers\Front;

use App\Http\Controllers\Auth\Controller;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Edu\Entities\Tag;
use Modules\Edu\Entities\Topic;
use Modules\Edu\Http\Requests\TopicRequest;
use Modules\Edu\Transformers\CommentCollection;
use Modules\Edu\Transformers\CommentResource;

class TopicController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->except(['index', 'show', 'comment']);
    }

    public function index(Request $request)
    {
        $topics = Topic::search($request->query('w'))
            ->where('site_id', site()['id'])
            ->latest()
            ->with('user')
            ->paginate();
        return view('edu::topic.index', compact('topics'));
    }

    public function create(Topic $topic)
    {
        $tags = Tag::all();
        return view('edu::topic.create', compact('tags', 'topic'));
    }

    public function store(TopicRequest $request, Topic $topic)
    {
        $topic->title = $request->title;
        $topic->content = $request->content;
        $topic->site_id = site()['id'];
        $topic->user_id = Auth::id();
        $topic->save();

        $topic->tags()->sync($request->tags);

        return redirect()
            ->route('Edu.front.topic.index')
            ->with('success', '贴子发表成功');
    }

    public function show(Topic $topic)
    {
        $tags = Tag::all();
        return view('edu::topic.show', compact('topic', 'tags'));
    }

    public function edit(Topic $topic)
    {
        $this->authorize('update', $topic);
        $tags = Tag::all();
        return view('edu::topic.edit', compact('tags', 'topic'));
    }

    public function update(Request $request, Topic $topic)
    {
        $this->authorize('update', $topic);
        $topic->fill($request->input())->save();
        $topic->tags()->sync($request->input('tags'));

        return redirect()
            ->route('Edu.front.topic.index')
            ->with('success', '贴子发表成功');
    }

    public function destroy(Request $request, Topic $topic)
    {
        $this->authorize('delete', $topic);
        $topic->delete();
        if ($request->expectsJson()) {
            return response()->json(['message' => '贴子删除成功']);
        }
        return redirect()
            ->route('Edu.front.topic.index')
            ->with('success', '删除成功');
    }

    public function recommend(Topic $topic)
    {
        $topic->recommend = !$topic->recommend;
        $topic->save();
        return back()->with('success', '推荐修改成功');
    }
}
