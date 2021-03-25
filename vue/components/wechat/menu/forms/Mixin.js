export default {
    props: ['form', 'wechat'],
    data() {
        return {
            //消息选择dialog
            showMessageDialog: false,
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
        //选择消息回调
        selectMessage(message) {
            this.form.key = message.keyword
            this.showMessageDialog = false
        }
    }
}
