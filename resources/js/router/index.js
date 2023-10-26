import { createRouter, createWebHistory } from "vue-router";
import Contacts  from "../components/contacts/ContactComponent.vue";
import HomeComponent from '../components/HomeComponent.vue'

const routes = [
    {
        path: '/',
        name: 'Home',
        component: HomeComponent
    },
    {
        path: '/contacts',
        name: 'Contacts',
        component: Contacts
    },

];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;