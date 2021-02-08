<template>
    <div class="container-xl mt-16">
        <div class="md:flex">
            <div class="card md:w-9/12 md:mr-5 mb-5">
                <div class="card-header flex flex-col items-start px-10 py-8 leading-9 text-xl font-weight-lighter ">
                    {{ form.title }}
                </div>

                <div class="card-body px-10">
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
            form: {}
        }
    },
    async created() {
        this.form = await this.axios.get(`lesson/${this.$route.params.id}`)
    }
}
</script>

<style></style>
