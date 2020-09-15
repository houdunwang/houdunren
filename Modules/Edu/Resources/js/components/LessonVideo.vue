<template>
  <div class="card mt-3">
    <div class="card-header">视频设置</div>
    <div class="card-body">
      <draggable
        class="row"
        :list="videos"
        :disabled="!enabled"
        ghost-class="ghost"
        @start="dragging = true"
        @end="dragging = false"
      >
        <div v-for="(video, index) in videos" :key="index" class="col-12 col-sm-4 mb-3">
          <div class="card">
            <div class="card-body">
              <div class="form-group row">
                <label for="colFormLabel" class="col-sm-2 col-form-label">视频名称</label>
                <div class="col-sm-10">
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" v-model="video.title" />
                    <input type="hidden" class="form-control" v-model="video.id" />
                    <a href="#" class="input-group-append" @click.prevent="del(index)">
                      <span class="input-group-text" id="basic-addon2">删除</span>
                    </a>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label for="colFormLabel" class="col-sm-2 col-form-label">视频地址</label>
                <div class="col-sm-10">
                  <input type="url" class="form-control" v-model="video.path" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </draggable>
    </div>
    <div class="card-footer">
      <textarea hidden name="videos" v-html="videos"></textarea>
      <button class="btn btn-outline-secondary btn-sm" @click.prevent="add">添加视频</button>
    </div>
  </div>
</template>

<script>
import draggable from 'vuedraggable'
export default {
  components: {
    draggable,
  },
  data() {
    return {
      enabled: true,
      videos: window.videos,
    }
  },
  methods: {
    add() {
      this.videos.push({ id: 0, title: '', path: '' })
    },
    del(index) {
      this.videos.splice(index, 1)
    },
  },
}
</script>

<style scoped>
.ghost {
  opacity: 0.5;
  background: #c8ebfb;
}
</style>
