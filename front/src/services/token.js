export default {
    set(accessToken) {
        window.localStorage.setItem("access_token", accessToken);
    },
    get() {
        return window.localStorage.getItem("access_token");
    },
    del() {
        window.localStorage.removeItem("access_token");
    }
};
