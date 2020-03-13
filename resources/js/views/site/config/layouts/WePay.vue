<template>
  <div class="card">
    <div class="card-body">
      <el-form :model="form" label-width="120px">
        <el-form-item :label="form.wepay.mch_id.title">
          <el-input v-model="form.wepay.mch_id.value" :placeholder="form.wepay.mch_id.desc"></el-input>
        </el-form-item>
        <el-form-item :label="form.wepay.key.title">
          <el-input v-model="form.wepay.key.value" :placeholder="form.wepay.key.desc"></el-input>
        </el-form-item>
        <el-form-item :label="form.wepay.apiclient_cert.title">
          <el-input
            v-model="form.wepay.apiclient_cert.value"
            :placeholder="form.wepay.apiclient_cert.desc"
          ></el-input>
        </el-form-item>
        <el-form-item :label="form.wepay.apiclient_key.title">
          <el-input
            v-model="form.wepay.apiclient_key.value"
            :placeholder="form.wepay.apiclient_key.desc"
          ></el-input>
        </el-form-item>
        <el-form-item :label="form.wepay.rootca.title">
          <el-input v-model="form.wepay.rootca.value" :placeholder="form.wepay.rootca.desc"></el-input>
        </el-form-item>
      </el-form>
    </div>
  </div>
</template>

<script>
export default {
  props: { form: Object }
}
</script>

<style scoped></style>
