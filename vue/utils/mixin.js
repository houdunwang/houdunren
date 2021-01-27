import store from '@/store'

const mixin = {
    methods: {
        errors(name) {
            return store.getters[name]
        }
    }
}

export default mixin
