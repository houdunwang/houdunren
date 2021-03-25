<template>
    <div class="container-xl mt-10">
        <div>
            <hd-skeleton-card v-if="loading" :num="1" class="h-40 mb-10" />
            <div v-else>
                <div v-if="isSign">
                    <div class="card shadow-sm" v-if="isLogin">
                        <div class="card-header bg-white">签到快乐，再接再厉</div>
                        <div class="card-body text-sm text-gray-700">
                            您上次签到时间: {{ my.created_at | format }} <br />
                            您的总签到天数: {{ my.total_days }}天 <br />
                            您本月签到天数:: {{ my.month_days }} 天 <br />
                        </div>
                    </div>
                </div>
                <div v-else>
                    <div class="card shadow-sm" v-if="isLogin">
                        <div class="card-header bg-white">签到快乐，再接再厉</div>
                        <div class="card-body h6 font-weight-normal">
                            <input
                                type="text"
                                name="content"
                                v-model.trim="form.content"
                                class="form-control form-control-lg "
                                required=""
                                placeholder="你今天的心情或最想说的话"
                            />
                            <hd-form-error name="content" />
                            <div class="mt-2 flex flex-wrap">
                                <label
                                    v-for="(icon, i) in icons"
                                    :key="i"
                                    class="w-16 h-16 bg-gray-50 cursor-pointer border-4 border-gray-200 mr-3 rounded-xl flex justify-center items-center hover:bg-yellow-400
                        hover:border-yellow-200 duration-500 shadow-sm mb-2"
                                    :class="{ 'bg-yellow-400 border-yellow-200': form.mood == icon.name }"
                                >
                                    <input type="radio" hidden="" v-model="form.mood" :value="icon.name" />
                                    <img :src="`/modules/Edu/static/sign/${icon.name}.gif`" class="w-3/4 h-3/4" />
                                </label>
                            </div>
                        </div>
                        <div class="card-footer text-muted">
                            <button type="submit" class="btn btn-success" @click.prevent="onSubmit">开始签到</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-8 ">
            <hd-skeleton-list v-if="loading" :num="8" />
            <div class="card shadow-sm sign-list" v-else>
                <div class="card-header bg-white text-base">今日签到排行</div>
                <div class="card-body text-base font-bold text-gray-600">
                    <el-table :data="signs" border stripe>
                        <el-table-column label="会员" #default="{row:sign}" width="180">
                            <a href="#" @click.prevent="space(sign.user)" class="flex justify-start items-center">
                                <img :src="sign.user.avatar" class="w-12 h-12 rounded-lg object-contain border-2 border-gray-50 mr-2" />
                                <span class="text-gray-600 text-sm">
                                    {{ sign.user.name }}
                                </span>
                            </a>
                        </el-table-column>
                        <el-table-column label="今日签到时间" #default="{row:sign}" width="150">{{ sign.created_at | format('hh:mm') }} </el-table-column>
                        <el-table-column label="总签到天数" #default="{row:sign}" width="150">{{ sign.total_days }} </el-table-column>
                        <el-table-column label="月签到天数" #default="{row:sign}" width="150">{{ sign.month_days }} </el-table-column>
                        <el-table-column label="签到心情" #default="{row:sign}">
                            <div class="flex justify-start items-center text-sm">
                                <img :src="`/modules/Edu/static/sign/${sign.mood}.gif`" class="w-10 h-10 object-contain" />
                                <span class="">
                                    {{ sign.content }}
                                </span>
                            </div>
                            <button type="button" class="btn btn-sm" v-if="sign.permissions.delete" @click.prevent="del(sign)">删除</button>
                        </el-table-column>
                    </el-table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
const icons = [
    { name: 'kx' },
    { name: 'ch' },
    { name: 'fd' },
    { name: 'ng' },
    { name: 'nu' },
    { name: 'shuai' },
    { name: 'wl' },
    { name: 'yl' },
    { name: 'ym' }
]
const signs = []
export default {
    route: { meta: { keepAlive: true } },
    data() {
        return {
            loading: true,
            icons,
            signs,
            form: {
                content: '',
                mood: ''
            }
        }
    },
    computed: {
        isSign() {
            if (this.isLogin) {
                return this.signs.some(s => s.user.id == this.user.id)
            }
        },
        my() {
            const sign = this.signs.find(s => s.user.id == this.user.id)
            return sign
        }
    },
    async created() {
        this.signs = await axios.get(`sign`)
        this.loading = false
    },
    methods: {
        async del(sign) {
            this.$confirm('确定删除吗?', '温馨提示').then(async _ => {
                await axios.delete(`sign/${sign.id}`)
                this.signs.splice(this.signs.indexOf(sign), 1)
            })
        },
        async onSubmit() {
            if (!this.form.content || !this.form.mood) {
                return this.$message.warning('签到内容和心情不能为空')
            }
            const { data: sign } = await axios.post(`sign`, this.form)
            this.signs.push(sign)
        }
    }
}
</script>

<style></style>
