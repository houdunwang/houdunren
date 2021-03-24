<template>
    <div class="relative">
        <div class="flex flex-col" v-if="file" style="background-color: #f3f3f3">
            <video muted controls width="100%" class="outline-none">
                <source :src="file" type="video/mp4" />
            </video>
            <el-button type="danger" size="mini" @click="del">移除上传</el-button>
        </div>
        <el-upload
            v-else
            class="upload-demo"
            drag
            :multiple="false"
            :action="action"
            :show-file-list="false"
            :on-success="handleAvatarSuccess"
            :before-upload="beforeAvatarUpload"
            :headers="headers"
        >
            <i class="el-icon-upload"></i>
            <div class="el-upload__text">将文件拖到此处，或<em>点击上传</em></div>
        </el-upload>
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
                return ['video/mp4']
            }
        },
        size: { type: Number, default: 1024 * 1024 * 10 }
    },
    data() {
        return {
            file: this.value
        }
    },
    watch: {
        value(n) {
            this.file = n
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
                this.$emit('input', (this.file = ''))
            })
        },
        handleAvatarSuccess(res, file) {
            this.file = res.path
            this.$emit('input', this.file)
        },
        beforeAvatarUpload(file) {
            const isType = this.type.includes(file.type)
            const isSize = file.size < this.size
            if (!isType) {
                this.$message.error('文件类型错误')
            }
            if (!isSize) {
                this.$message.error(`上传文件不能超过${Math.round(this.size / 1024 / 1024)}MB`)
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
