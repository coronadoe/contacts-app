<template>
    <home-view />
    <router-view />
    <footer-view />
</template>

<script>
    import HomeView  from "../views/HeaderView.vue";
    import FooterView  from "../views/FooterView.vue"

    export default {
        name: 'MainComponent',
        components: {
            HomeView,
            FooterView,
        }
    }


</script>