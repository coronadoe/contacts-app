<template>
    header template

    <div>
        <router-link to="/">Home</router-link>
        <router-link to="/contacts">Contacts</router-link>
    </div>
</template>

<script>
    import { defineComponent } from "vue";

    export default defineComponent({
        name: 'HeaderView'
    });

</script>

<style scoped>
</style>