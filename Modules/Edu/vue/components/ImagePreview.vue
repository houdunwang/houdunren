<template>
    <el-dialog :visible.sync="dialogVisible" :width="width">
        <img :src="imagePreview" style="width:100%;" />
    </el-dialog>
</template>

<script>
export default {
    props: {
        minWidth: { type: Number, default: 500 }
    },
    data() {
        return {
            dialogVisible: false,
            imagePreview: ''
        }
    },
    mounted() {
        this.$nextTick(_ => {
            this.$parent.$el.addEventListener('click', event => {
                if (event.target.nodeName == 'IMG') {
                    if (event.target.clientWidth > this.minWidth) {
                        const src = event.target.getAttribute('src')
                        this.dialogVisible = true
                        this.imagePreview = src
                    }
                }
            })
        })
    },
    computed: {
        width() {
            return document.documentElement.clientWidth < 768 ? '100%' : '50%'
        }
    }
}
</script>

<style></style>
