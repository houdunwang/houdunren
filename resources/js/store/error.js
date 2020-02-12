export default {
    namespaced: true,
    state: {
        errors: {
            name: ""
        }
    },
    mutations: {
        set(state, errors) {
            state.errors = errors
        }
    }
}
