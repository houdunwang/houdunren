<template>
  <div>
    <div class="row">
      <div class="col-6 col-sm-3 mb-3" v-for="(tag,index) in tags" :key="index">
        <div class="input-group">
          <input type="text" class="form-control" placeholder name="tags[]" v-model="tag.title" />
          <input type="hidden" name="ids[]" v-model="tag.id" />
          <a href="#" class="input-group-append" @click.prevent="del(index)">
            <span class="input-group-text" id="basic-addon2">删除</span>
          </a>
        </div>
      </div>
    </div>
    <button class="btn btn-info btn-sm mt-2" @click.prevent="add">添加</button>
  </div>
</template>

<script>
export default {
    data(){
        return {
            tags:window.tags
        }
    },
    methods:{
        add(){
            this.tags.push({id:0,title:''})
        },
        del(index){
            this.tags.splice(index,1);
        }
    }
}
</script>

<style>
</style>
