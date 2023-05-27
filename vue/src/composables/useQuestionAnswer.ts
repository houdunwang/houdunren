import { http } from '@/plugins/axios'
import router from '@/plugins/router'
import { ElMessage } from 'element-plus'

export default () => {
  const questions = ref<(QuestionModel & { answer: any[] })[]>()
  const error = ref()

  //获取考题
  const getQuestions = async () => {
    try {
      const data = await http.request<QuestionModel[]>({ url: `question_answer` }, { message: false })
      questions.value = data.map((question: QuestionModel) => {
        question.answer = []
        return question
      })
    } catch (error) {
      router.push({ name: 'question' })
    }
  }

  //查看成绩
  const find = async (id: any) => {
    return await http.request<{ questions: QuestionModel[]; answer: QuestionAnswerModel }>({
      url: `question_answer/${id}`,
    })
  }

  //交卷
  const submit = async () => {
    try {
      const data = await http.request<QuestionAnswerModel>({
        url: `question_answer`,
        method: 'POST',
        data: questions.value?.map((q) => {
          return { id: q.id, answer: q.answer }
        }),
      })
      ElMessage.success('交卷成功')
      location.href = router.resolve({ name: 'question.answer.show', params: { id: data.id } }).fullPath
    } catch (error) {}
  }

  //今日成绩排行榜
  const getRankingList = async () => {
    return await http.request<QuestionAnswerModel[]>({ url: `question_answer/ranking_list` })
  }

  //本周成绩排行榜
  const getQuestionRankTotal = async () => {
    return await http.request<{ user: UserModel; total: number; id: number }[]>({
      url: `question_answer/questionRankTotal`,
    })
  }

  //我的考试历史
  const myAnswerList = async (page: any) => {
    return await http.request<ApiPage<QuestionAnswerModel>>({ url: `question_answer/my_answer_list?page=${page}` })
  }

  return { questions, getQuestions, submit, find, getRankingList, error, myAnswerList, getQuestionRankTotal }
}
