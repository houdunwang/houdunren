<template>
    <div class="container-xl mt-16">
        <div class="md:flex topic-show">
            <div class="card md:w-9/12 md:mr-5 mb-5" v-loading="loading">
                <div class="card-header flex flex-col items-start px-14 py-14 leading-9 text-xl font-weight-lighter ">
                    {{ form.title }}
                    <div class="text-sm text-gray-500 mt-5 ">{{ form.user.name }} 更新于{{ form.updated_at | fromNow }}</div>
                </div>
                <div class="card-body leading-8 px-14 py-10 text-gray-700" style="min-height:100px;" v-html="form.content"></div>
            </div>
            <div class="md:w-3/12">
                <community-tip />
            </div>
        </div>
    </div>
</template>

<script>
import MarkdownIt from 'markdown-it'
import hljs from 'highlight.js'
import 'highlight.js/styles/rainbow.css'
import javascript from 'highlight.js/lib/languages/javascript'
export default {
    route: { path: `topic/:id/show` },
    data() {
        return {
            loading: true,
            form: { user: {} }
        }
    },
    async created() {
        this.form = await this.axios.get(`topic/${this.$route.params.id}`)
        const md = new MarkdownIt()
        this.form.content = md.render(this.form.content)
        this.$nextTick(() => {
            hljs.registerLanguage('javascript', javascript)
            document.querySelectorAll('pre code').forEach(block => {
                hljs.highlightBlock(block)
            })
        })
        this.loading = false
    }
}
</script>

<style>
.topic-show pre {
    padding: 0 !important;
    margin: 2rem -3.5rem !important;
    border-left: none !important;
    border-right: none !important;
    border-radius: 0 !important;
}
.topic-show pre code {
    line-height: 1.5rem;
    padding: 2rem 3rem !important;
}
.topic-show .hljs {
    font-weight: 600;
    font-family: 'Jetbrains Mono', ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, 'Liberation Mono', 'Courier New', monospace;
}
</style>
