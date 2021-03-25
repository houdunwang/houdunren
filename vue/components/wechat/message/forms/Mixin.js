export default form => ({
    props: ['wechat', 'message', 'show'],
    data() {
        return {
            isSubmit: false,
            form: _.cloneDeep(this.message || form),
            //消息编辑dialog
            dialogShow: this.show,
            //选择素材dialog
            materialDialogShow: false
        }
    },
    watch: {
        //父组件props
        show(show) {
            this.dialogShow = show
            this.form = _.cloneDeep(this.message || form)
        },
        //同步父组件状态
        dialogShow(state) {
            this.$emit('update:show', state)
        }
    },
    methods: {
        async onSubmit() {
            this.isSubmit = true
            const url = `site/${this.wechat.site_id}/wechat/${this.wechat.id}/message` + (this.message ? `/${this.message.id}` : ``)
            axios[this.message ? 'put' : 'post'](url, this.form)
                .then(_ => {
                    this.$parent.load()
                    this.dialogShow = false
                })
                .finally(_ => {
                    this.isSubmit = false
                })
        },
        //选择素材
        selectMaterial(material) {
            this.form.file = material.file
            this.form.content.media_id = material.response.media_id
            this.materialDialogShow = false
        }
    }
})
