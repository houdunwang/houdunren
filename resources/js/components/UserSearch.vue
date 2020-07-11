<template>
  <div>
    <el-dialog title="提示" :visible.sync="dialogVisible" width="50%" :before-close="handleClose">
      <div class="card">
        <div class="card-header">
          <div class="input-group mb-3">
            <input
              type="text"
              class="form-control"
              placeholder="请输入邮箱、手机或用户编号"
              v-model="name"
              @keyup.enter="get"
            />
            <div class="input-group-append">
              <a
                href="javascript:;"
                class="input-group-text"
                id="basic-addon2"
                @click.prevent="get"
              >搜索</a>
            </div>
          </div>
        </div>

        <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                <th width="80">编号</th>
                <th>昵称</th>
                <th>邮箱</th>
                <th>手机号</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="user in users" :key="user.id">
                <td class="align-middle">{{ user.id }}</td>
                <td class="align-middle">
                  <img :src="user.avatar" class="rounded mr-3" style="width:30px;" />
                  {{ user.name }}
                </td>
                <td class="align-middle">{{ user.email }}</td>
                <td class="align-middle">{{ user.mobile }}</td>
                <td class="text-right align-middle">
                  <slot :user="user"></slot>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </el-dialog>
    <button class="btn btn-info btn-sm" @click="dialogVisible=true">{{title}}</button>
  </div>
</template>

<script>
export default {
    props:{action:{required:true},title:{default:'选择用户'}},
    data() {
      return {
        dialogVisible: false,
        name:'',
        users:[]
      };
    },
    methods: {
      handleClose(done) {
        done();
      },
      get(){
          this.axios.post(this.action,{
              name:this.name
          }).then(response=>{
              this.users = response;
              this.name ='';
          })
      }
    }
  };
</script>

<style>
</style>
