import Vue from "vue";
import View from "./View.vue";

class Notice {
    constructor(props) {
        let vm = new Vue({
            render(h) {
                return h(View, {
                    props
                });
            }
        }).$mount();

        document.body.appendChild(vm.$el);
        setTimeout(() => {
            vm.$el.remove();
            vm.$destroy();
        }, props.timeout);
    }
}

export default {
    install(Vue) {
        Vue.prototype.$notice = config => new Notice(config);
    }
};
