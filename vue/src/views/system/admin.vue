<script setup lang="ts">
import draggable from 'vuedraggable'
const route = useRoute()
const { collection, findAll, order, remove } = useSystem()
const type = ref(route.query.type || 'project')
await findAll(1, { type: type.value })
</script>

<template>
  <HdCard>
    <template #header>
      <div class="flex justify-between items-center">
        <div>
          <el-button
            :type="type == 'system' ? 'primary' : 'info'"
            size="default"
            @click="$router.push({ name: 'admin.system', query: { type: 'system' } })">
            系统课程
          </el-button>
          <el-button
            :type="type == 'project' ? 'primary' : 'info'"
            size="default"
            @click="$router.push({ name: 'admin.system', query: { type: 'project' } })">
            实战项目
          </el-button>
        </div>
        <el-button type="success" size="default" @click="$router.push({ name: 'system.create' })"> 添加课程 </el-button>
      </div>
    </template>
    <template #default>
      <div class="text-center p-3" v-if="!collection.length">暂无课程</div>
      <draggable
        v-model="collection"
        group="people"
        @end="order(collection!)"
        item-key="id"
        class="grid md:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-5 gap-3">
        <template #item="{ element }">
          <SystemItem :item="element" @del="remove">
            <template #footer> </template>
          </SystemItem>
        </template>
      </draggable>
    </template>
  </HdCard>
</template>
