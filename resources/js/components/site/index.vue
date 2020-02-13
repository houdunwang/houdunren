<template>
  <div>
    <router-link :to="{name:'site.add'}" class="btn btn-info mb-3">
      <i class="fa fa-plus"></i> 添加网站
    </router-link>
    <site v-for="site in sites" :key="site.id" :site="site" />
  </div>
</template>

<script>
import Site from "./blocks/Site";
import store from "../../store/index";
import { mapState, mapActions } from "vuex";
import { Message } from "element-ui";

export default {
  data() {
    return {
      sites: []
    };
  },
  methods: {
    ...mapActions("site", ["getLists"])
  },
  async created() {
    const sites = await this.getLists();
    this.$set(this, "sites", sites);
  },
  components: {
    Site
  }
};
</script>

<style></style>
