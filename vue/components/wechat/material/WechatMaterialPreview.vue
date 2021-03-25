<template>
    <div>
        <div v-if="material.type == 'image'">
            <el-popover placement="top" width="200" trigger="hover">
                <el-image :src="material.file" fit="cover"></el-image>
                <el-image slot="reference" :src="material.file" fit="cover" class="w-10 h-10"></el-image>
            </el-popover>
        </div>
        <div v-if="material.type == 'voice'">
            <audio controls preload="auto" class="relative outline-none w-48 h-10" style="background-color: #f3f3f3;">
                <source :src="material.file" type="audio/mp3" />
            </audio>
        </div>
        <div v-if="material.type == 'video'">
            <el-popover placement="top" width="500" trigger="hover">
                <!-- <video muted controls width="100%" class="outline-none">
                    <source :src="material.file" type="video/mp4" />
                </video> -->
                <video slot="reference" muted controls class="outline-none w-52">
                    <source :src="material.file" type="video/mp4" />
                </video>
                <!-- <i slot="reference" class="fas fa-video w-10 h-10 text-xl"></i> -->
            </el-popover>
        </div>
        <div v-if="material.type == 'news'">
            <el-popover placement="top" width="250" trigger="hover">
                <ul class="border">
                    <li v-for="(article, index) in material.content" :key="index" class="flex border-b" :class="{ 'flex-col': !index, 'p-2': index }">
                        <el-image :src="article.picurl" fit="cover" :class="{ 'w-10 h-10 order-2': index, 'w-full h-20': !index }"></el-image>
                        <h2 class="text-white bg-gray-700 py-2 text-center" v-show="index == 0">{{ article.title }}</h2>
                        <p class="text-sm flex-1" v-show="index">
                            {{ article.description }}
                        </p>
                    </li>
                </ul>
                <el-image slot="reference" :src="material.content[0].picurl" fit="cover" class="w-10 h-10"></el-image>
            </el-popover>
        </div>
        <div v-if="material.type == 'module'"><i class="fas fa-info-circle    "></i> 回复内容由模块处理</div>
    </div>
</template>

<script>
export default {
    props: {
        material: { type: Object }
    }
}
</script>

<style></style>
