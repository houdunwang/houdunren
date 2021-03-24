<template>
    <div>
        <table class="border-collapse w-full">
            <thead>
                <tr>
                    <th
                        v-for="col in columns"
                        :prop="col.prop"
                        :key="col.id"
                        :width="col.width"
                        class="p-3 font-bold text-sm uppercase bg-gray-50 text-gray-600 border border-gray-200 lg:table-cell"
                        :class="{ 'text-center': col.id != 'title' }"
                    >
                        {{ col.label }}
                    </th>
                    <th :width="width" class="p-3 font-bold text-sm uppercase bg-gray-100 text-gray-600 border border-gray-200 lg:table-cell"></th>
                </tr>
            </thead>
            <draggable v-model="lessonData" tag="tbody" @end="drag">
                <tr
                    v-for="lesson in lessonData"
                    :key="lesson.id"
                    class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0"
                >
                    <td
                        v-for="col in columns"
                        :prop="col.prop"
                        :key="col.id"
                        :width="col.width"
                        class="w-full lg:w-auto p-3 text-gray-700 border border-b block lg:table-cell relative lg:static text-xs font-bold"
                        :class="{ 'text-center': col.id != 'title' }"
                    >
                        <el-image v-if="col.id == 'thumb'" :src="lesson.thumb" fit="cover" :lazy="true" class="w-20 h-8 object-contain" />
                        <div v-else-if="col.id == 'is_commend'">
                            <i class="far fa-check-square text-green-700" v-if="lesson.is_commend"></i>
                        </div>
                        <div v-else-if="col.id == 'status'">
                            <i class="far fa-check-square text-green-700" v-if="lesson.status"></i>
                        </div>
                        <div v-else-if="col.id == 'updated_at'">
                            {{ lesson.updated_at | fromNow }}
                        </div>
                        <span v-else class="px-2 py-1 uppercase">
                            {{ lesson[col.id] }}
                        </span>
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 border border-b block lg:table-cell relative lg:static">
                        <slot :lesson="lesson" />
                    </td>
                </tr>
            </draggable>
        </table>
    </div>
</template>

<script>
import draggable from 'vuedraggable'
const columns = [
    { id: 'id', label: '编号', width: 80 },
    { id: 'title', label: '课程名称' },
    { id: 'is_commend', label: '推荐', width: 80 },
    { id: 'status', label: '上架', width: 80 },
    { id: 'thumb', label: '预览图', width: 100 },
    { id: 'video_num', label: '视频数量', width: 100 },
    { id: 'read_num', label: '浏览量', width: 100 },
    { id: 'favour_count', label: '点赞数', width: 100 },
    { id: 'favorite_count', label: '收藏数', width: 100 },
    { id: 'comment_num', label: '评论数', width: 100 },
    { id: 'updated_at', label: '更新时间', width: 100 },
    { id: 'price', label: '售价', width: 100 }
]
export default {
    components: {
        draggable
    },
    props: { lessons: Array, width: { type: Number, default: 150 } },
    data() {
        return {
            columns,
            lessonData: this.lessons
        }
    },
    watch: {
        //监听prop.lesson
        lessons(n) {
            this.lessonData = n
        }
    },
    methods: {
        drag(...v) {
            this.$emit('update:lessons', this.lessonData)
            // console.log(this.lessonData)
        }
    }
}
</script>

<style></style>
