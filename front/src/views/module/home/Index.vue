<template>
  <div class="row">
    <div class="col-3">
      <div class="card text-left shadow-sm">
        <div class="card-body row">
          <div class="col-3">
            <div class="img-thumbnail">
              <img  src="http://houdunren.oss-cn-hangzhou.aliyuncs.com/153749361493714134.jpg" alt="">
            </div>
          </div>
          <div class="col-9">
            <h5 class="card-title">Title</h5>
            <p class="card-text text-secondary small">Body</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {}
</script>

<style lang="scss" scoped>
  .card{
    cursor: pointer;
    .img-thumbnail {
      border-radius: 50%;
      width: 50px;
      height: 50px;
      max-width: none;
      overflow: hidden;
      img{
        height: 100%;
      }
    }
  }
</style>
