import '../css/app.css';
import './bootstrap';
import { createApp } from 'vue';
import router from './Router';
import App from './App.vue';

const app = createApp(App);

app.use(router);

app.mount('#app');
