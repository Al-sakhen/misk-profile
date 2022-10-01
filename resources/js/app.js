import './bootstrap';
import { createApp } from 'vue';
import router from './router/index.js';
import '@splidejs/vue-splide/css/skyblue';
import { createPinia } from "pinia";



const app = createApp({});

import AppViewComponent from './AppView.vue';
app.component('app-component', AppViewComponent);

app.use(router);
app.use(createPinia());
app.mount('#app');
