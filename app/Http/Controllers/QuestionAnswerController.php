<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\QuestionAnswer;
use App\Http\Requests\StoreQuestionAnswerRequest;
use App\Http\Resources\QuestionAnswerResource;

//考试答题
class QuestionAnswerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->except(['rankingList', 'questionRankTotal']);
    }

    //用户考试列表
    public function myAnswerList()
    {
        $collection = Auth::user()->questionAnswer()->whereNotNull('answers')->latest()->paginate(10);

        return QuestionAnswerResource::collection($collection);
    }

    //今日排行榜
    public function rankingList()
    {
        $collection = QuestionAnswer::whereNotNull('mark')->with('user')
            ->whereDate('created_at', now())
            ->orderBy('mark', 'desc')
            ->orderByRaw('TIMESTAMPDIFF(SECOND,created_at,updated_at) asc')->get();
        return QuestionAnswerResource::collection($collection);
    }

    //本周总分排行榜
    public function questionRankTotal()
    {
        $firstWeekDay = now()->startOfWeek()->format("Y-m-d");

        $collection = QuestionAnswer::selectRaw('user_id, sum(mark) as total')->whereNotNull('mark')
            ->whereDate('created_at', '>=', $firstWeekDay)
            ->groupByRaw("user_id")->orderByRaw('total desc')->with('user')->limit(10)->get();
        return QuestionAnswerResource::collection($collection);
    }

    //考试题目
    public function index()
    {
        $questionAnswer = Auth::user()->questionAnswer()->whereDate('created_at', now())->first();
        $quections = Question::inRandomOrder()->limit(5)->has('favours', '>=', 3)->get();

        if ($quections->count() < 5) {
            return $this->respondError('考题数量不够');
        }
        if (!$questionAnswer) {
            Auth::user()->questionAnswer()->create();
            return QuestionAnswerResource::collection($quections);
        }
        if (!is_null($questionAnswer->mark)) {
            return $this->respondError('你今天已经考了，欢迎明天再来');
        }
        if ($questionAnswer->created_at->diffInMinutes(now(), false) > 20) {
            return $this->respondError('你今天已经考了，欢迎明天再来');
        }

        return $this->respondWithSuccess(QuestionAnswerResource::collection($quections));
    }

    //交卷判题
    public function store(StoreQuestionAnswerRequest $request)
    {
        $answers = $request->input();
        $questionAnswer = Auth::user()->questionAnswer()->whereDate('created_at', now())->latest('id')->first();
        //考试是否超时
        if ($questionAnswer->created_at->diffInMinutes(now(), false) > 20) {
            return $this->respondError('考试超时了，交卷失败');
        }

        //判题
        foreach ($answers as &$answer) {
            $question = Question::find($answer['id']);
            $answer['success'] = collect($question['answer'])->sort()->join('-') ==
                collect($answer['answer'])->sort()->join('-');
        }

        // 记算成绩并入库
        $questionAnswer->mark = ceil(100 / count($answers) * count(collect($answers)->filter(fn ($a) => $a['success'])));
        $questionAnswer->answers = $answers;
        $questionAnswer->save();
        return $this->respondWithSuccess($questionAnswer);
    }

    //考试结果
    public function show(QuestionAnswer $questionAnswer)
    {
        return [
            'answer' => $questionAnswer,
            'questions' => Question::whereIn('id', collect($questionAnswer->answers)->map(fn ($q) => $q['id']))->get()->each(function ($q) {
                $q->makeVisible('answer');
                return $q;
            })
        ];
    }
}
