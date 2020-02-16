//日期格式化
import Vue from "vue";
import moment from "moment";
// moment.locale('zh_CN');
Vue.filter('dateFormat', (value) => {
    if (!value) return '';
    return moment(value).fromNow();
});
