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
                        class="p-3 font-bold text-sm uppercase bg-gray-100 text-gray-600 border border-gray-200 lg:table-cell"
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
                        class="w-full lg:w-auto p-3 text-gray-800 border border-b block lg:table-cell relative lg:static"
                    >
                        <el-image v-if="col.id == 'thumb'" :src="lesson.thumb" fit="cover" :lazy="true" />
                        <span v-else class="px-2 py-1 text-xs font-bold uppercase">
                            {{ lesson[col.id] }}
                        </span>
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 border border-b block lg:table-cell relative lg:static">
                        <slot :lesson="lesson" />
                    </td>
                </tr>
            </draggable>
        </table>
        <div class="hidden">
            {{ lessons }}
        </div>
    </div>
</template>

<script>
import draggable from 'vuedraggable'
import columns from '@/Pages/Admin/Lesson/columns'
export default {
    components: {
        draggable
    },
    props: { lessons: Array, width: { type: Number, default: 150 } },
    data() {
        return {
            columns,
            lessonData: this.$attrs.value
        }
    },
    watch: {
        //监听prop.lesson
        lessons(n) {
            this.lessonData = n
        },
        lessonData(n) {}
    },
    methods: {
        drag(...v) {
            this.$emit('input', this.lessonData)
            // console.log(this.lessonData)
        }
    }
}
</script>

<style></style>
