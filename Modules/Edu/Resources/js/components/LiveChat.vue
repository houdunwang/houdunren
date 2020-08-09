<template>
  <div class="flex-fill d-flex flex-column bg-light">
    <div class="flex-fill p-2">
      <div class="mb-2">
        <a href="#" class="text-secondary">向军大叔</a>
        <div class="d-inline-block pt-1">你好哟</div>
      </div>
      <div class="mb-2">
        <a href="#" class="text-secondary">向军大叔</a>
        <div class="d-inline-block pt-1">你好哟</div>
      </div>
    </div>
    <div class>
      <div class="form-group mb-0">
        <input
          type="text"
          class="form-control rounded-0 bg-light shadow-sm border-left-0 border-right-0"
          name="content"
          placeholder="说点什么吧..."
          style="outline: none !important; box-shadow: none;border:solid 3px #333;"
        />
      </div>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    let socket = new WebSocket('wss://dev.hdcms.com:8282')
    console.log(socket)
  },
}
</script>

<style>
</style>
