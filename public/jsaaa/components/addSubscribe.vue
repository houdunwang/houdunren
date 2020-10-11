<template>
  <div>
    <el-dialog title="添加会员套餐" :visible.sync="dialogVisible" width="50%">
      <div class="card">
        <div class="card-header">套餐资料</div>
        <div class="card-body">
          <div class="form-group">
            <label for>套餐名称</label>
            <input type="text" class="form-control" placeholder="请输入中文套餐兔名称" v-model="form.title" />
            <small class="form-text text-muted" v-if="errors.mobile">{{errors.mobile}}</small>
          </div>
        </div>
      </div>
    </el-dialog>
    <button class="btn btn-primary btn-sm" @click="dialogVisible=true">添加套餐</button>
  </div>
</template>

<script>
import { mapState } from 'vuex'

export default{
    data(){
        return {
            dialogVisible:false,
            form:{
                title:'',
                ad:'',
                icon:"",
                price:'',
                month:''
            }
        }
    },
    computed:{
       ...mapState(['errors'])
    },
    methods:{
        add(){

        }
    }
}
</script>
