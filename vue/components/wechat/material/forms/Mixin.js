//素材组件Mixin
import _ from 'lodash'
export default form => ({
    props: ['wechat', 'material', 'show', 'durationType'],
    data() {
        return {
            initForm: form,
            //提交动作
            isSubmit: false,
            //表单数据
            form,
            //临时或永久
            duration: this.durationType,
            //显示对话框
            dialogShow: false
        }
    },
    watch: {
        //显示对话框
        show(show) {
            this.dialogShow = show
            this.form = _.cloneDeep(this.material || form)
            this.form.duration = this.durationType
        },
        dialogShow(show) {
            this.$emit('update:show', show)
        }
    },
    methods: {
        onSubmit() {
            this.isSubmit = true
            const url = `site/${this.wechat.site_id}/wechat/${this.wechat.id}/material` + (this.form.id ? `/${this.form.id}` : ``)
            axios[this.form.id ? 'put' : 'post'](url, this.form)
                .then(_ => {
                    this.$parent.load(1, this.form.type)
                    this.dialogShow = false
                    //添加时初始化
                    if (!this.form.id) {
                        this.$set(this, 'form', this.initForm)
                    }
                })
                .finally(_ => {
                    this.isSubmit = false
                })
        }
    }
})
