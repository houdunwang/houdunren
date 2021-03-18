export default form => ({
    props: ['wechat', 'message', 'show'],
    data() {
        return {
            isSubmit: false,
            form: _.merge({}, this.message || form),
            dialogShow: this.show
        }
    },
    watch: {
        show(show) {
            this.dialogShow = show
            this.form = _.merge({}, this.message || form)
        },
        dialogShow(state) {
            this.$emit('update:show', state)
        }
    },
    methods: {
        async onSubmit() {
            this.isSubmit = true
            const url = `wechat/${this.wechat.id}/message` + (this.message ? `/${this.message.id}` : ``) + `?site=${this.wechat.site_id}`
            axios[this.message ? 'put' : 'post'](url, this.form)
                .then(_ => {
                    this.$parent.load()
                    this.dialogShow = false
                })
                .finally(_ => {
                    this.isSubmit = false
                })
        }
    }
})
