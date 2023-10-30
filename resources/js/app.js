import './bootstrap';
import { createApp } from 'vue';
import { createPinia } from 'pinia'

import MainComponent from './components/MainComponent.vue';
import router from './router'

const app = createApp();
app.component('main-component', MainComponent);

app.use(createPinia());
app.use(router);
app.mount('#app');