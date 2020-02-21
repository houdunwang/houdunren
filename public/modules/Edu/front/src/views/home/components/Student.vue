<template>
  <!--学员故事-->
  <div id="student" class="shadow pt-5 pb-5">
    <div class="container">
      <h3 class="text-center font-weight-lighter mb-5">学员有话说</h3>
      <div class="row">
        <div class="col-6 col-sm-6 col-md-3 mb-3 pl-1 pr-1"
             @click="playVideo(stu.video)"
             v-for="(stu,i) in students" :key="i" v-show="i<showNums">
          <div class="card">
            <div class="pic p-3">
              <img :src="stu.pic" class="card-img-top" :alt="stu.title">
            </div>
            <div class="card-body">
              <p class="card-text small">
                {{stu.title}}
              </p>
            </div>
          </div>
        </div>
        <div class="col-12 text-center">
          <button class="btn btn-outline-primary btn-sm cursor"
                  v-show="showNums<=students.length"
                  @click="showNums=1000">加载更多</button>
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
        showNums: 4,
        videoPath: '',
        students: [
          {
            title: '毅然来到后盾人参加培训，毕业后改变了自己！',
            pic: require('@/assets/student/1.jpg'),
            video: 'https://houdunren-test.oss-cn-hangzhou.aliyuncs.com/student/1.mp4'
          },
          {
            title: '在网上偶然看到后盾人，培训后薪水很高，没白来',
            pic: require('@/assets/student/2.jpg'),
            video: 'https://houdunren-test.oss-cn-hangzhou.aliyuncs.com/student/2.mp4'
          },
          {
            title: '感谢后盾人给了扎实的技术，有了高薪的收入',
            pic: require('@/assets/student/3.jpg'),
            video: 'https://houdunren-test.oss-cn-hangzhou.aliyuncs.com/student/3.mp4'
          },
          {
            title: '一位东北女孩的PHP转型真实经历',
            pic: require('@/assets/student/4.jpg'),
            video: 'https://houdunren-test.oss-cn-hangzhou.aliyuncs.com/student/4.mp4'
          },
          {
            title: '退伍不褪色，在互联网开发行业依然我有的一片天地',
            pic: require('@/assets/student/5.jpg'),
            video: 'https://houdunren-test.oss-cn-hangzhou.aliyuncs.com/student/5.mp4'
          },
          {
            title: '摸爬滚打不如意，果断来后盾人成功转型',
            pic: require('@/assets/student/6.jpg'),
            video: 'https://houdunren-test.oss-cn-hangzhou.aliyuncs.com/student/6.mp4'
          },
          {
            title: '一个老程序员的互联网转型之路',
            pic: require('@/assets/student/7.jpg'),
            video: 'https://houdunren-test.oss-cn-hangzhou.aliyuncs.com/student/7.mp4'
          },
          {
            title: '对技术感兴趣，在后盾人实现了自己的高薪愿望',
            pic: require('@/assets/student/8.jpg'),
            video: 'https://houdunren-test.oss-cn-hangzhou.aliyuncs.com/student/8.mp4'
          },
          {
            title: '一个团队拓展教练的PHP转型之路',
            pic: require('@/assets/student/9.jpg'),
            video: 'https://houdunren-test.oss-cn-hangzhou.aliyuncs.com/student/9.mp4'
          },
          {
            title: '来后盾人参加PHP培训轻松在迷茫的大学毕业季中脱颖而出',
            pic: require('@/assets/student/10.jpg'),
            video: 'https://houdunren-test.oss-cn-hangzhou.aliyuncs.com/student/10.mp4'
          },
          {
            title: '大学毕业充满迷茫，后盾人给了未来方向',
            pic: require('@/assets/student/11.jpg'),
            video: 'https://houdunren-test.oss-cn-hangzhou.aliyuncs.com/student/11.mp4'
          },
          {
            title: '看17岁的零基础小白学员如何逆袭成为PHP程序员',
            pic: require('@/assets/student/12.jpg'),
            video: 'https://houdunren-test.oss-cn-hangzhou.aliyuncs.com/student/12.mp4'
          },
          {
            title: '事实证明我的选择是对的，来后盾人我会变得更好！',
            pic: require('@/assets/student/13.jpg'),
            video: 'https://houdunren-test.oss-cn-hangzhou.aliyuncs.com/student/13.mp4'
          },
          {
            title: '摸爬滚打好多年，不甘庸庸碌碌，果断来后盾人转行到互联网',
            pic: require('@/assets/student/14.jpg'),
            video: 'https://houdunren-test.oss-cn-hangzhou.aliyuncs.com/student/14.mp4'
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
  #student {
    background: #F7F8F9;
    .row {
      .card {
        border-radius: 0;
        cursor: pointer;
        transition: .5s;

        &:hover {
          box-shadow: 0 3px 6px -4px rgba(0, 0, 0, 0.12), 0 6px 16px 0 rgba(0, 0, 0, 0.08), 0 9px 28px 8px rgba(0, 0, 0, 0.05);
        }

        .card-text {
          height: 4em;
        }

        .pic {
          height: 150px;
          overflow: hidden;
        }
      }
    }
  }
</style>
