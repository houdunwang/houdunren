<template>
    <div class="relative">
        <el-upload
            class="avatar-uploader"
            :action="`/api/${action}`"
            :show-file-list="false"
            :on-success="handleAvatarSuccess"
            :before-upload="beforeAvatarUpload"
            :headers="headers"
        >
            <img v-if="imageUrl" :src="imageUrl" class="avatar" />
            <i v-else class="el-icon-plus avatar-uploader-icon"></i>
        </el-upload>
        <i class="fas fa-window-close absolute fa-2x text-white top-2 left-2 cursor-pointer" @click="del"></i>
    </div>
</template>

<script>
export default {
    props: {
        action: { type: String, required: true },
        value: { type: String }
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
        headers() {
            return {
                // Authorization: `Bearer ${this.$store.getters.token}`,
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        }
    },
    methods: {
        del() {
            this.$emit('input', (this.imageUrl = ''))
        },
        handleAvatarSuccess(res, file) {
            this.imageUrl = res.path
            this.$emit('input', this.imageUrl)
        },
        beforeAvatarUpload(file) {
            const isJPG = file.type === 'image/jpeg' || file.type === 'image/png'
            const isLt2M = file.size / 1024 / 1024 < 2
            if (!isJPG) {
                this.$message.error('上传头像图片只能是 JPG 格式!')
            }
            if (!isLt2M) {
                this.$message.error('上传头像图片大小不能超过 2MB!')
            }
            return isJPG && isLt2M
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
