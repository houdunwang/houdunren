import Vue from 'vue'
import moment from "moment";
moment.locale("zh_CN");

Vue.prototype.$moment = moment;

//日期格式化
Vue.filter('dateFormat', (value) => {
    if (!value) return '';
    return moment(value).fromNow();
});
