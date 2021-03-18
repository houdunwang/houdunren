<template>
    <el-form :model="form" ref="form" label-width="100px" :inline="false" size="normal">
        <el-card shadow="never" :body-style="{ padding: '10px' }" class="mb-3">
            <div slot="header">
                关键词规则
            </div>
            <el-form-item label="规则描述">
                <el-input v-model="form.title"></el-input>
                <hd-error name="title" />
            </el-form-item>
            <!-- <el-form-item label="规则描述">
                <el-radio-group v-model="form.keyword_type">
                    <el-radio label="all">完全匹配</el-radio>
                    <el-radio label="regexp">正则匹配</el-radio>
                </el-radio-group>
                <hd-error name="keyword_type" />
            </el-form-item> -->
            <el-form-item label="关键词">
                <el-input v-model="form.keyword"></el-input>
                <hd-error name="keyword" />
            </el-form-item>
        </el-card>
    </el-form>
</template>

<script>
export default {
    props: ['form']
}
</script>

<style></style>
