//验证组件
import { ValidationProvider, ValidationObserver, extend } from "vee-validate";
//验证规则
import * as rules from "vee-validate/dist/rules";
//语言包
import { localize } from "vee-validate";
import zh from "vee-validate/dist/locale/zh_CN.json";
Vue.component("ValidationProvider", ValidationProvider);
Vue.component("ValidationObserver", ValidationObserver);
//批量设置规则
Object.keys(rules).forEach(rule => {
    extend(rule, rules[rule]);
});
Object.keys(rules).forEach(rule => {
    extend(rule, {
        ...rules[rule], // copies rule configuration
        message: zh[rule] // assign message
    });
});
//设置中文语言
localize("zh", zh);
