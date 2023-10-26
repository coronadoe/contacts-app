import { createRouter, createWebHistory } from "vue-router";

import ContactsView from '../views/ContactsView.vue';
import HomeView from '../views/HomeView.vue';

const routes = [
    {
        path: '/',
        name: 'Home',
        component: HomeView
    },
    {
        path: '/contacts',
        name: 'Contacts',
        component: ContactsView
    },

];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;