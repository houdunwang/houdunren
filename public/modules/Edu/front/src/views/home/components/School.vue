<template>
  <!--校园活动-->
  <div id="school" class="pt-5 pb-5">
    <div class="container pt-5">
      <h3 class="text-center mb-5">校园活动</h3>
      <div class="row">
        <div
          @click="playVideo(stu.video)"
          class="col-12 col-sm-4 mb-3 pr-md-1 pl-md-1 pic" v-for="(stu,i) in students" :key="i" v-show="i+1<=showNums">
          <div class="card">
            <div class="pic border-bottom">
              <img :src="stu.pic" class="card-img-top" :alt="stu.title">
            </div>
            <div class="card-footer">
              <p class="card-text small">
                {{stu.title}}
              </p>
            </div>
          </div>
        </div>
        <div class="col-12 text-center">
          <button class="btn btn-outline-primary btn-sm cursor"
                  v-show="showNums<students.length" @click="showNums=1000">加载更多</button>
        </div>
      </div>
    </div>
    <video-play @close="closeVideo" v-if="videoPath" :path="videoPath"/>
  </div>
</template>

<script>
  import VideoPlay from "../../../components/Video";

  export default {
    data() {
      return {
        showNums: 6,
        videoPath: '',
        students: [
          {
            title: '后盾人新校区落成剪彩仪式成功举办',
            pic: require('@/assets/school/1.jpg'),
            video: 'https://houdunren-test.oss-cn-hangzhou.aliyuncs.com/school/1.mp4'
          },
          {
            title: '后盾人2015年中秋佳节香山登高活动', pic: require('@/assets/school/2.jpg'),
            video: 'https://houdunren-test.oss-cn-hangzhou.aliyuncs.com/school/2.mp4'
          },
          {
            title: '青春无极限，这最萌身高差，绝了',
            pic: require('@/assets/school/3.jpg'),
            video: 'https://houdunren-test.oss-cn-hangzhou.aliyuncs.com/school/3.mp4'
          },
          {
            title: '后盾人2014夏季趣味运动会成功举行！',
            pic: require('@/assets/school/5.jpg'),
            video: 'https://houdunren-test.oss-cn-hangzhou.aliyuncs.com/school/5.mp4'
          },
          {
            title: '后盾人中秋香山登高活动视频曝光啦！',
            pic: require('@/assets/school/6.jpg'),
            video: 'https://houdunren-test.oss-cn-hangzhou.aliyuncs.com/school/6.mp4'
          },
          {
            title: '后盾人2016中秋佳节长城励志行精彩集锦',
            pic: require('@/assets/school/7.jpg'),
            video: 'https://houdunren-test.oss-cn-hangzhou.aliyuncs.com/school/7.mp4'
          },
          {
            title: '后盾人迎国庆暨第一届篮球友谊赛精彩瞬间集',
            pic: require('@/assets/school/8.jpg'),
            video: 'https://houdunren-test.oss-cn-hangzhou.aliyuncs.com/school/8.mp4'
          },
          {
            title: '欢乐一家人~嗨翻了~后盾人平安夜',
            pic: require('@/assets/school/9.jpg'),
            video: 'https://houdunren-test.oss-cn-hangzhou.aliyuncs.com/school/9.mp4'
          },
          {
            title: '异地新年，别样温暖。后盾人留京学员2015春节联欢',
            pic: require('@/assets/school/10.jpg'),
            video: 'https://houdunren-test.oss-cn-hangzhou.aliyuncs.com/school/10.mp4'
          },
          {
            title: '不仅技术要牛，身体更要棒棒哒！后盾人2016羽毛球赛精彩集锦',
            pic: require('@/assets/school/11.jpg'),
            video: 'https://houdunren-test.oss-cn-hangzhou.aliyuncs.com/school/11.mp4'
          },
          {
            title: '欢乐一家人~嗨翻了~后盾人平安夜暨2017迎新春联欢会',
            pic: require('@/assets/school/13.jpg'),
            video: 'https://houdunren-test.oss-cn-hangzhou.aliyuncs.com/school/13.mp4'
          },
          {
            title: '后盾人2016新春联欢会，笑爆了！红包拿到手软！',
            pic: require('@/assets/school/14.jpg'),
            video: 'https://houdunren-test.oss-cn-hangzhou.aliyuncs.com/school/14.mp4'
          },
          {
            title: '后盾人2016年元宵节灯谜会温情来袭！',
            pic: require('@/assets/school/15.jpg'),
            video: 'https://houdunren-test.oss-cn-hangzhou.aliyuncs.com/school/15.mp4'
          },
          {
            title: '后盾人2015年双十一脑力购物狂欢节精彩集锦',
            pic: require('@/assets/school/16.jpg'),
            video: 'https://houdunren-test.oss-cn-hangzhou.aliyuncs.com/school/16.mp4'
          },
          {
            title: '后盾人2018夏季羽毛球友谊赛',
            pic: require('@/assets/school/18.jpg'),
            video: 'https://houdunren-test.oss-cn-hangzhou.aliyuncs.com/school/18.mp4'
          },
          {
            title: '后盾人2015年元宵节灯谜会！一个欢乐的活动，一个比家还温暖的地方！',
            pic: require('@/assets/school/20.jpg'),
            video: 'https://houdunren-test.oss-cn-hangzhou.aliyuncs.com/school/20.mp4'
          },
          {
            title: '后盾人第一届趣味知识竞赛爆笑来袭！',
            pic: require('@/assets/school/22.jpg'),
            video: 'https://houdunren-test.oss-cn-hangzhou.aliyuncs.com/school/22.mp4'
          },
          {
            title: '中秋节快乐~后盾人实训班发月饼啦~',
            pic: require('@/assets/school/27.jpg'),
            video: 'https://houdunren-test.oss-cn-hangzhou.aliyuncs.com/school/27.mp4'
          },
        ]
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
  #school {

    .row {
      background: #fff;

      .card {
        border-radius: 0;
        cursor: pointer;
        transition: .5s;

        .card-text {
          height: 4em;
        }

        &:hover {
          box-shadow: 0 3px 6px -4px rgba(0, 0, 0, 0.12), 0 6px 16px 0 rgba(0, 0, 0, 0.08), 0 9px 28px 8px rgba(0, 0, 0, 0.05);
        }

        .pic {
          height: 150px;
          overflow: hidden;
        }
      }
    }
  }
</style>
