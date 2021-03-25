<template>
    <div class="relative">
        <el-upload
            class="avatar-uploader"
            :action="action"
            :show-file-list="false"
            :on-success="handleAvatarSuccess"
            :before-upload="beforeAvatarUpload"
            :headers="headers"
        >
            <img v-if="imageUrl" :src="imageUrl" class="avatar object-cover" />
            <i v-else class="el-icon-plus avatar-uploader-icon"></i>
        </el-upload>
        <i class="fas fa-window-close absolute fa-2x text-white top-2 left-2 cursor-pointer" @click="del"></i>
    </div>
</template>

<script>
export default {
    props: {
        sid: { type: Number },
        value: { type: String },
        type: {
            type: Array,
            default() {
                return ['image/jpeg', 'image/png']
            }
        },
        size: { type: Number, default: 1024 * 1024 * 2 }
    },
    data() {
        return {
            imageUrl: this.value
        }
    },
    watch: {
        value(n) {
            this.imageUrl = n
        }
    },
    computed: {
        action() {
            return this.sid ? `/api/upload?site=${this.sid}` : `/api/upload`
        },
        headers() {
            return {
                // Authorization: `Bearer ${this.$store.getters.token}`,
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        }
    },
    methods: {
        //移除上传文件
        del() {
            this.$confirm('确定删除吗?', '温馨提示').then(_ => {
                this.$emit('input', (this.imageUrl = ''))
            })
        },
        handleAvatarSuccess(res, file) {
            this.imageUrl = res.path
            this.$emit('input', this.imageUrl)
        },
        beforeAvatarUpload(file) {
            const isType = this.type.includes(file.type)
            const isSize = file.size < this.size
            if (!isType) {
                this.$message.error('文件类型错误')
            }
            if (!isSize) {
                this.$message.error(`上传文件不能超过${Math.round(this.size / 1024)}KB`)
            }
            return isType && isSize
        }
    }
}
</script>

<style>
.avatar-uploader .el-upload {
    border: 1px dashed #d9d9d9;
    border-radius: 6px;
    cursor: pointer;
    position: relative;
    overflow: hidden;
}
.avatar-uploader .el-upload:hover {
    border-color: #409eff;
}
.avatar-uploader-icon {
    font-size: 28px;
    color: #8c939d;
    width: 178px;
    height: 178px;
    line-height: 178px;
    text-align: center;
}
.avatar {
    width: auto;
    height: 178px;
    display: block;
    background: #f3f3f3;
}
</style>
