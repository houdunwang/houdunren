<template>
  <div id="question" class="container mt-5">
    <h3>常见问题</h3>
    <!-- Card -->
    <div class="card mb-3">
      <div class="card-header card-collapse" id="basicsHeadingOne1">
        <h5 class="mb-0">
          <button class="btn btn-link btn-block d-flex justify-content-between card-btn p-3 collapsed"
                  data-toggle="collapse" data-target="#basicsCollapseOne1" aria-expanded="false"
                  aria-controls="basicsCollapseOne1">
            讲的知识点足够多吗?
            <span class="card-btn-arrow">
            <span class="fa fa-arrow-down small"></span>
            </span>
          </button>
        </h5>
      </div>
      <div id="basicsCollapseOne1" class="collapse" aria-labelledby="basicsHeadingOne1" data-parent="#question">
        <div class="card-body">
          <p>
            这就和学开车一样的道理，如果教你开车，教你保养和简单的修车。感觉是很好的，但结果是车也开不好，车也修不会。现实和理想总是有差距的。
            现在知识点越来越多，如果想面面俱到，最终只会得到一塌糊涂。
          </p>
          <p>
            在几个月的时间里，学习几十种/上百种知识点，最终也只能做到点到即止，这不是我们想看到的，也是不切实际的。
          </p>
          <p>
            所以课程我们以实战项目为主，会构建一个多模块平台，在些平台下衍生出多个应用，如在线教育、微商城等应用，同时打通微信公众号/小程序/手机APP等多个应用平台。
          </p>
        </div>
      </div>
    </div>
    <!-- End Card -->

    <!-- Card -->
    <div class="card mb-3">
      <div class="card-header card-collapse" id="basicsHeadingOne2">
        <h5 class="mb-0">
          <button class="btn btn-link btn-block d-flex justify-content-between card-btn p-3 collapsed"
                  data-toggle="collapse" data-target="#basicsCollapseOne2" aria-expanded="false"
                  aria-controls="basicsCollapseOne2">
            为什么送后盾人在线会员?
            <span class="card-btn-arrow">
            <span class="fa fa-arrow-down small"></span>
            </span>
          </button>
        </h5>
      </div>
      <div id="basicsCollapseOne2" class="collapse" aria-labelledby="basicsHeadingOne2" data-parent="#question">
        <div class="card-body">
          <p>
            这就是解决上面的问题，在实战培训中我们会以企业项目为主导，那么后盾人会员就是对其他知识点的补充，我们会上后盾人平台上录制更多有用的视频。
          </p>
          <p>
            解决大家在工作中遇到的各种问题，做好保驾护航。
          </p>
        </div>
      </div>
    </div>
    <!-- End Card -->
  </div>
</template>

<script>
  export default {
    name: "Questions"
  }
</script>

<style lang="scss" scoped>
  #question {
    .card-body {
      text-indent: 2em;

      p {
        line-height: 2em;
      }
    }
  }
</style>
