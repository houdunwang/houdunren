<script setup lang="ts">
import useQuestion from '@/composables/useQuestion'
import useUtil from '@/composables/hd/useUtil'
import Layout from './layout.vue'

const util = useUtil()
const { find, addItem, removeItem, update, model, setAnswer, changeType, add } = useQuestion()
const id = util.routeParams('id')
if (id) model.value = await find(id)

const onSubmit = async () => {
  id ? update() : add()
}
</script>

<template>
  <Layout>
    <template #tip> 感谢你出的题，帮助到努力前进的少年 </template>
    <HdCard class="col-span-8 mb-5">
      <template #header>
        <div class="flex items-center justify-between">题目类型</div>
      </template>
      <div>
        <el-radio-group v-model="model.category" size="small">
          <el-radio-button label="web">前端</el-radio-button>
        </el-radio-group>
        <div class="mt-2 text-sm">目前只允许前端题目</div>
      </div>
    </HdCard>
    <HdCard class="col-span-8 mb-5">
      <template #header>
        <div class="flex items-center justify-between">
          <div class="flex-1">问题描述</div>
          <div class="text-sm text-gray-600">
            因为每个考题只有2分钟，所以考题说明请尽量精简，否则会影响同学的交卷时间
          </div>
        </div>
      </template>
      <HdMarkdownEditor v-model="model.description" />
      <HdError name="description" />
    </HdCard>
    <HdCard class="col-span-8 mb-5">
      <template #header>答题选项</template>
      <section class="flex flex-col gap-2">
        <div class="">
          <el-radio v-model="model.type" label="radio" @change="changeType">单选题</el-radio>
          <el-radio v-model="model.type" label="checkbox" @change="changeType">多选题</el-radio>
        </div>
        <div class="flex items-center gap-2" v-for="(item, index) of model.lists" :key="index">
          <el-input v-model="item.title" placeholder="请输入问题选项" size="large" clearable></el-input>
          <el-checkbox-group v-model="model.answer" size="large">
            <el-checkbox :label="index" border @change="setAnswer(index)"> 正确答案 </el-checkbox>
          </el-checkbox-group>
          <el-button size="large" @click="removeItem(index)" plain color="#d35400">删除</el-button>
        </div>
        <HdError name="answer" />
        <HdError name="lists" />
      </section>

      <template #footer>
        <section class="justify-center">
          <el-button type="primary" size="default" @click="onSubmit">保存提交</el-button>
          <el-button type="success" size="default" @click="addItem">添加选项</el-button>
        </section>
      </template>
    </HdCard>
  </Layout>
</template>

<style lang="scss"></style>
