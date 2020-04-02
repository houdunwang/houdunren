<template>
  <div class="main">
    <router-view class="section"></router-view>
    <error />
  </div>
</template>

<script>
import Error from '../../components/Error'
export default {
  components: { Error }
}
</script>

<style lang="scss" scoped>
.main {
  height: 100vh;
  width: 100vw;
  background-image: url('../../assets/images/user-bg.jpg');
  background-size: cover;
  display: flex;
  justify-content: center;
  align-items: center;
  .section {
    @media screen and(min-width:768px) {
      width: 500px;
    }
    @media screen and (max-width: 768px) {
      width: 95%;
    }
  }
}
</style>
