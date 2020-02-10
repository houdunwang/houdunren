export default {
    get() {
        return window.localStorage.getItem("token");
    },
    del() {
        window.localStorage.removeItem("token");
    }
};
