<template>
  <!--校园活动-->
  <div id="tutorial">
    <div class="container">
      <div class="card p-5">
        <div class="row">
          <div class="col-12 col-sm-7 col-xs-12">
            <h3>视频教程</h3>
            <p class="font-weight-lighter">
              视频教程课程库中包含了大量制作精良的课程，你可以在这里浏览到后盾人所有课程，
              并且根据需求，按照技术分类进行检索
            </p>
            <a href="https://www.houdunren.com" class="btn btn-primary mb-5">查看视频课程</a>
          </div>
          <div class="col-12 col-sm-4 offset-sm-1 text-center mt-5">
            <img src="@/assets/pc.jpg">
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    data() {
      return {}
    }
  }
</script>

<style lang="scss" scoped>
  #tutorial {
    margin: 3em 0;
    box-sizing: content-box;

    img {
      width: 100%;
    }
  }
</style>
