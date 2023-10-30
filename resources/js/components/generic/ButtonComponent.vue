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

        mounted() {
            console.log(this);
        }

    });

</script>

<style scoped>
</style>