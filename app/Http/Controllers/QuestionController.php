<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Http\Resources\QuestionResource;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    public function index()
    {
        $collection = Question::latest()->with(['user'])->paginate(5);
        return QuestionResource::collection($collection);
    }

    //用户出的考题列表
    public function userQuestionList(User $user)
    {
        $collection = $user->questions()->with(['user'])->latest()->paginate(5);
        return QuestionResource::collection($collection);
    }

    //待审核考题
    public function examine()
    {
        $collection = Question::has('favours', '<', 3)->with('user')->orderBy('id', 'desc')->paginate(5);
        return QuestionResource::collection($collection);
    }

    public function store(StoreQuestionRequest $request)
    {
        $this->authorize('create', Question::class);
        Auth::user()->questions()->create($request->input());
        return $this->respondOk('添加成功');
    }

    public function show(Question $question)
    {
        return new QuestionResource($question->load('user')->makeVisible('answer'));
    }

    public function update(UpdateQuestionRequest $request, Question $question)
    {
        $this->authorize('update', $question);
        $question->fill($request->input())->save();
        return $this->respondOk('更新成功');
    }

    public function destroy(Question $question)
    {
        $this->authorize('delete', $question);
        $question->delete();
        return $this->respondOk("删除成功");
    }

    //上一个、下一下问题
    public function relationQuestion(Question $question)
    {
        return [
            "prev_question" => Question::has('favours', '<', 3)->where("id", "<", $question->id)->first(),
            "next_question" => Question::has('favours', '<', 3)->where("id", ">", $question->id)->first(),
        ];
    }
}
