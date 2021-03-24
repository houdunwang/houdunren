export default {
    props: ['form', 'wechat'],
    data() {
        return {
            showKeywordDialog: false,
            message: null
        }
    },
    watch: {
        'form.key': {
            async handler(keyword) {
                const message = await axios.get(`site/${this.wechat.site_id}/wechat/${this.wechat.id}/message/${keyword}`)
                this.message = message.id ? message : null
            },
            immediate: true
        }
    },
    methods: {
        select(message) {
            this.form.key = message.keyword
        }
    }
}
