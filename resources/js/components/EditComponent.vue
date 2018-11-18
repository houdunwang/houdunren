<template>
    <div class="container">
        <markdown-editor v-model="value"/>
        {{value}}
    </div>
</template>

<script>
    import MarkdownEditor from './MarkdownEditorComponent'
    console.log(MarkdownEditor)
    export default {
        components:{
            'markdown-editor':MarkdownEditor
        },
        data(){
            return {
                value:'88811'
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
