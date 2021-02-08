<template>
    <div class="form-selectgroup">
        <label class="form-selectgroup-item" v-for="tag in tags" :key="tag.id">
            <input type="checkbox" name="name" :value="tag.id" class="form-selectgroup-input" v-model="$attrs.value" @change="$emit('input', $attrs.value)" />
            <span class="form-selectgroup-label">{{ tag.title }}</span>
        </label>
    </div>
</template>

<script>
export default {
    data() {
        return {
            tags: []
        }
    },
    async created() {
        this.tags = await this.axios.get(`tag`)
    }
}
</script>

<style></style>
