<template>
  <div class="admin-container">
    <error />
    <Navbar />
    <div class="mt-2 container-fluid">
      <div class="row">
        <div class="col-12 col-md-3">
          <div class="list-group rounded-0">
            <a href="#" class="list-group-item bg-light disabled rounded-0">Cras justo odio</a>
            <a
              href="#"
              class="list-group-item list-group-item-action rounded-0"
            >Dapibus ac facilisis in</a>
            <a href="#" class="list-group-item list-group-item-action rounded-0">Morbi leo risus</a>
            <a
              href="#"
              class="list-group-item list-group-item-action rounded-0"
            >Porta ac consectetur ac</a>
            <a href="#" class="list-group-item list-group-item-action disabled">Vestibulum at eros</a>
            <a href="#" class="list-group-item bg-light disabled rounded-0">Cras justo odio</a>
            <a
              href="#"
              class="list-group-item list-group-item-action rounded-0"
            >Dapibus ac facilisis in</a>
            <a href="#" class="list-group-item list-group-item-action rounded-0">Morbi leo risus</a>
            <a
              href="#"
              class="list-group-item list-group-item-action rounded-0"
            >Porta ac consectetur ac</a>
          </div>
        </div>
        <div class="col-12 col-md-9 mt-2 mt-md-0">
          <div class="card rounded-0">
            <div class="card-body rounded-0"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import Navbar from './module/layouts/Navbar'
import Error from './layouts/Error'
import '@/assets/animate.css'

export default {
  components: {
    Error,
    Navbar
  },
  methods: {}
}
</script>
<style lang="scss">
</style>
