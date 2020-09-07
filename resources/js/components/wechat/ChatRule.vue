<template>
  <div>
    <div class="card">
      <div class="card-header">关键词设置</div>
      <div class="card-body">
        <div class="form-group">
          <label for="exampleFormControlSelect1">微信公众号</label>
          <select
            class="form-control"
            id="exampleFormControlSelect1"
            v-model="rule.wechat_id"
            size="3"
          >
            <option
              v-for="(wechat,index) in wechats"
              :key="index"
              :value="wechat.id"
            >{{ wechat.title }}</option>
          </select>
        </div>

        <div class="form-group">
          <label>规则名称</label>
          <input
            type="text"
            class="form-control"
            placeholder
            v-model="rule.title"
            :required="required"
          />
        </div>

        <div>
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <a
                class="nav-link active"
                id="home-tab"
                data-toggle="tab"
                href="#home"
                role="tab"
                aria-controls="home"
                aria-selected="true"
              >普通关键词</a>
            </li>
            <li class="nav-item" role="presentation">
              <a
                class="nav-link"
                id="profile-tab"
                data-toggle="tab"
                href="#profile"
                role="tab"
                aria-controls="profile"
                aria-selected="false"
              >正则关键词</a>
            </li>
          </ul>
          <div class="tab-content border p-3 border-top-0" id="myTabContent">
            <div
              class="tab-pane fade show active"
              id="home"
              role="tabpanel"
              aria-labelledby="home-tab"
            >
              <div
                class="input-group mb-3"
                v-for="(keyword, index) in keywords"
                :key="index"
                v-show="!keyword.regexp"
              >
                <input
                  type="text"
                  class="form-control"
                  :class="{ 'border-danger': keyword.has }"
                  required
                  v-model="keywords[index].word"
                  @blur="checkKeyword(keywords[index])"
                />
                <a href="#" class="input-group-append" @click.prevent="del(index)">
                  <span class="input-group-text">删除</span>
                </a>
              </div>
              <button class="btn btn-secondary btn-sm" @click="add(false)" type="button">添加完全匹配关键词</button>
              <small>添加系统中已经存在的关键词时，将会被忽略</small>
            </div>

            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
              <div
                class="input-group mb-3"
                v-for="(keyword, index) in keywords"
                :key="index"
                v-show="keyword.regexp"
              >
                <input
                  type="text"
                  class="form-control"
                  required
                  v-model="keywords[index].word"
                  @blur="checkKeyword(keywords[index])"
                />
                <a href="#" class="input-group-append" @click.prevent="del(index)">
                  <span class="input-group-text">删除</span>
                </a>
              </div>

              <button class="btn btn-secondary btn-sm" @click="add(true)" type="button">添加模糊匹配关键词</button>
              <small>添加系统中已经存在的关键词时，将会被忽略</small>
            </div>
          </div>
        </div>
      </div>

      <textarea v-html="rule" name="wechat[rule]" hidden></textarea>
      <textarea v-html="keywords" name="wechat[keywords]" hidden></textarea>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    rid: { type: Number, default: null },
    required: { type: Boolean, default: true },
  },
  data() {
    return {
      rule: {
        id: 0,
        wechat_id: 0,
        title: '',
      },
      keywords: [],
      wechats: [],
    }
  },
  async mounted() {
    this.getWechat()
    if (this.rid) {
      const response = await this.axios.get(`wechat/rule/${this.rid}`)
      this.rule = response.rule
      this.keywords = response.keywords
    }
  },
  methods: {
    async getWechat() {
      this.wechats = await this.axios.get(`wechat/rule/wechat`)
    },
    add(regexp = false) {
      this.keywords.push({
        id: 0,
        word: '',
        regexp,
      })
    },
    del(index) {
      this.$confirm('确定删除关键词吗？', '温馨提示').then(() => {
        this.keywords.splice(index, 1)
      })
    },
    async checkKeyword(keyword) {
      if (keyword) {
        const response = await this.axios.post(`wechat/rule/check-keyword`, {
          keyword,
        })
        this.$set(keyword, 'has', response.has)
        if (response.has) {
          this.$message.error('关键词已经存在')
        }
      }
    },
  },
}
</script>

<style lang="scss" scoped></style>
