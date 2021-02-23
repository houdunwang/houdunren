<template>
    <div class="container-xl">
        <div class="flex justify-center" v-loading="loading">
            <div class="w-full">
                <div class="card">
                    <div class="card-header flex flex-col items-start md:p-14 leading-9 text-xl font-weight-lighter ">
                        {{ form.title }}
                        <div class="p-3 font-normal bg-gray-100 border border-gray-200 text-sm text-gray-500 mt-5 w-full">
                            {{ form.description }}
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header md:px-14">
                        课程列表
                    </div>
                    <div class="card-body md:px-14">
                        <lesson-list :lessons="form.lessons" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    route: { path: `system/:id` },
    data() {
        return {
            loading: true,
            form: { lessons: [] }
        }
    },
    async created() {
        this.form = await this.axios.get(`system/${this.$route.params.id}`)
        this.loading = false
    }
}
</script>

<style></style>
