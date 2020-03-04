<template>
  <div class="d-flex hd">
    <div class="menu border-right shadow-sm bg-light">
      <div class="icon p-3">user</div>
      <ul class="list-group rounded-0 border-right-0 bg-light">
        <li class="list-group-item rounded-0 border-right-0 bg-light" aria-disabled="true">Cras justo odio</li>
        <li class="list-group-item border-right-0 bg-light">Dapibus ac facilisis in</li>
        <li class="list-group-item border-right-0 bg-light">Morbi leo risus</li>
        <li class="list-group-item border-right-0 bg-light">Porta ac consectetur ac</li>
        <li class="list-group-item rounded-0 border-right-0 bg-light">Vestibulum at eros</li>
      </ul>
    </div>
    <div class="flex-fill content p-5">33</div>
  </div>
</template>

<script>
export default {
  async created() {
    let response = await this.axios.get(`module/${window.sid}/menu/${window.mid}`).then(r => r.data.data)
    console.log(response)
  }
}
</script>

<style lang="scss" scoped>
.hd {
  height: 100vh;
  .menu {
    width: 200px;
    overflow-y: auto;
  }
}
</style>
