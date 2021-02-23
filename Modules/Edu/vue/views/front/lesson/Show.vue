<template>
    <div class="container-xl">
        <div class="md:flex">
            <div class="card md:w-9/12 md:mr-5 mb-5" v-loading="loading">
                <div class="card-header flex flex-col items-start md:p-10 leading-9 text-xl font-weight-lighter ">
                    {{ form.title }}
                    <p class="p-3 font-normal bg-gray-100 border border-gray-200 text-sm text-gray-500 mt-5 w-full" v-if="form.description">
                        {{ form.description }}
                    </p>
                </div>
                <div class="card-body md:px-10">
                    <video-list :videos="form.videos" />
                </div>
            </div>
            <div class="md:w-3/12">
                <community-tip />
            </div>
        </div>
    </div>
</template>

<script>
export default {
    route: { path: `lesson/:id/show` },
    data() {
        return {
            loading: true,
            form: {}
        }
    },
    async created() {
        this.form = await this.axios.get(`lesson/${this.$route.params.id}`)
        this.loading = false
    }
}
</script>

<style></style>
