require('./bootstrap');
window.Vue = require('vue');
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
import HdVueForm from 'houdunren-vue-form';
Vue.use(ElementUI);
//url为上传文件处理地址
Vue.use(HdVueForm,{url:'/upload'});

Vue.component('example-component', require('./ExampleComponent.vue'));
const app = new Vue({
    el: '#app'
});
