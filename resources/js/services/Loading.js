// 统一页面加载UI
import { Loading } from "element-ui";
let loading;
export default {
    show(text = "加载中...") {
        loading = Loading.service({
            lock: true,
            // text: text,
            // spinner: "el-icon-loading",
            fullscreen: true
            // background: "rgba(200，200，200,1)"
        });
    },
    close() {
        loading.close();
    }
};
