<template>
    <div class="container-xl mt-16">
        <div class="flex justify-center">
            <div class="w-10/12">
                <div class="card">
                    <div class="card-header flex flex-col items-start px-14 py-14 leading-9 text-xl font-weight-lighter ">
                        {{ form.title }}
                        <div class="p-3 bg-gray-100 text-base text-gray-700 mt-5 w-full">
                            {{ form.description }}
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header px-14">
                        课程列表
                    </div>
                    <div class="card-body px-14">
                        <lesson-list :lessons="form.lessons" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    route: { path: `system/:id/edit` },
    data() {
        return {
            form: { lessons: [] }
        }
    },
    async created() {
        this.form = await this.axios.get(`system/${this.$route.params.id}`)
    }
}
</script>

<style></style>
