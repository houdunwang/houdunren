<template>
  <div class="card rounded shadow-sm mb-2">
    <div class="card-header bg-white text-muted">
      <i class="fa fa-check-circle-o mr-1" aria-hidden="true"></i>
      社区小贴
    </div>
    <div class="card-body font-weight-light">后盾人是一个主张友好、分享、自由的技术交流社区。</div>
    <div class="card-footer text-muted bg-white text-center">
      <div class="d-flex justify-content-between">
        <router-link :to="{ name: 'topic.create' }" class="btn btn-outline-success btn-sm flex-fill">
          <i class="fa fa-pencil-square-o"></i> 发贴交流
        </router-link>
        <router-link to="/edu/sign" class="btn btn-outline-danger btn-sm flex-fill ml-2">
          <i class="fa fa-flag" aria-hidden="true"></i>
          签到打卡
        </router-link>
      </div>
    </div>
  </div>
</template>

<script>
export default {}
</script>

<style></style>
