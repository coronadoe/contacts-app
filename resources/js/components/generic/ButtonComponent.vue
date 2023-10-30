<template>
    <button @click="btnClicked()" class="btn">{{ text }}</button>
</template>

<script>
    import { defineComponent } from 'vue';

    export default defineComponent({
        name: 'ButtonComponent',

        props: {
            text: {
                type: String,
                default: 'Button'
            },
            
        },

        methods: {
            btnClicked() {
                this.$emit('btn-click');
            },
        },

    });

</script>

<style scoped>
    .btn {
        cursor: pointer;
    }
</style>