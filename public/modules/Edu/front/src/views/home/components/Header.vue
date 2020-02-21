<template>
  <div id="header" class="shadow">
    <div class="fixed-top top-menu shadow">
      <div class="container">
        <nav class="navbar navbar-expand-sm navbar-light bg-light">
          <a class="navbar-brand text-dark" href="#">
            <i class="fa fa-code" aria-hidden="true"></i>
            后盾人训练营
          </a>
          <button class="navbar-toggler d-lg-none" type="button"
                  data-toggle="collapse" data-target="#collapsibleNavId"
                  aria-controls="collapsibleNavId"
                  aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav m-auto pt-1 mt-lg-0">
              <li class="nav-item mr-3">
                <a class="nav-link" href="#knowledge">多端学习</a>
              </li>
              <li class="nav-item mr-3">
                <a class="nav-link" href="#school">校园活动</a>
              </li>
              <li class="nav-item mr-3">
                <a class="nav-link" href="#question">常见问题</a>
              </li>
              <li class="nav-item mr-3">
                <a class="nav-link" href="#student">他们在说</a>
              </li>
              <li class="nav-item mr-3">
                <a class="nav-link" href="#appraise">真实好评</a>
              </li>
              <li class="nav-item mr-3">
                <a class="nav-link" href="#contact">联系我们</a>
              </li>
              <!--              <li class="nav-item mr-3 pt-2 font-weight-lighter text-primary">-->
              <!--                <i class="fa fa-phone-square pr-1" aria-hidden="true"></i>-->
              <!--                <span>18611400072</span>-->
              <!--              </li>-->
            </ul>
            <form class="form-inline my-2 my-lg-0">
              <!--<button class="btn btn-outline-success my-2 my-sm-0" type="submit">视频介绍</button>-->
            </form>
          </div>
        </nav>
      </div>
    </div>

    <!--    <div class="container subject d-none">-->
    <!--      <div class="row">-->
    <!--        <div class="col-12 col-md-5">-->
    <!--          <h4>项目驱动</h4>-->
    <!--          <p>-->
    <!--            不堆积上百知识点，而最终不能开发完整项目-->
    <!--          </p>-->
    <!--          <button class="btn btn-primary">视频介绍</button>-->
    <!--        </div>-->
    <!--        <div class="col-12 col-md-7 pic">-->
    <!--          <img src="@/assets/project.jpg" class="shadow-lg">-->
    <!--        </div>-->
    <!--      </div>-->
    <!--    </div>-->

    <div class="project clearfix">
      <div class="container subject">
        <div class="container project text-center introduce">
          <h1 class="text-center font-weight-light">实战项目驱动</h1>
          <h4 class="text-secondary font-weight-light">
            在最短的时间内通过实战项目，打造高水平的开发能力
          </h4>
          <h5 class="mt-3 font-weight-lighter bg-primary d-inline-block text-white pl-2 pr-2">
            疫情期学费7折，送两年后盾人会员！之后恢复原价
          </h5>
          <div class="text-center">
<!--            <button type="button" class="btn btn-success mt-3 mb-5"-->
<!--                    @click="playVideo('https://houdunren-test.oss-cn-hangzhou.aliyuncs.com/%E5%90%8E%E7%9B%BE%E4%BA%BA.mp4')">-->
<!--              视频介绍-->
<!--            </button>-->
          </div>
          <div class="project mt-5">
            <img src="@/assets/project.jpg" class="shadow-lg">
          </div>
        </div>
      </div>
      <video-play @close="closeVideo" v-if="videoPath" :path="videoPath"/>
    </div>
  </div>
</template>

<script>
  import VideoPlay from "../../../components/Video";

  export default {
    data() {
      return {
        videoPath: ''
      }
    },
    components: {
      VideoPlay
    },
    methods: {
      playVideo(path) {
        this.videoPath = path;
      },
      closeVideo() {
        this.videoPath = '';
      }
    }
  }
</script>

<style lang="scss" scoped>
  #header {
    padding-bottom: 6em;

    .top-menu {
      background: #fff;

      .navbar-light {
        background: #fff !important;
      }
    }

    .subject {
      padding-top: 8em;

      .pic {
        img {
          width: 100%;
        }
      }
    }

    /*.menus {*/
    /*  background: #fff;*/
    /*  margin-bottom: 8em;*/

    /*  .navbar-light {*/
    /*    background: #fff !important;*/
    /*  }*/
    /*}*/

    /*.introduce {*/
    /*  margin-top: 8em;*/

    /*  h1 {*/
    /*    font-weight: bold;*/
    /*    margin-bottom: .6em;*/
    /*  }*/

    .project {
      img {
        width: 100%;
      }
    }
  }
</style>
