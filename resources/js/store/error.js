export default {
    namespaced: true,
    state: {
        errors: {
            name: "error..."
        }
    },
    mutations: {
        set(state, errors) {
            state.errors = errors
        }
    }
}
