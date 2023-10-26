import './bootstrap';
import { createApp } from 'vue';

import MainComponent from './components/MainComponent.vue';
import router from './router'

const app = createApp();
app.component('main-component', MainComponent);

app.use(router);
app.mount('#app');