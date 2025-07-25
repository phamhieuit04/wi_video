import { createRouter, createWebHistory } from 'vue-router';
import AuthPage from '../Pages/AuthPage.vue';
import HomePage from '../Pages/HomePage.vue';

const routes = [
    {
        path: '/auth',
        component: AuthPage,
        name: 'auth',
    },
    {
        path: '/home',
        component: HomePage,
        name: 'home',
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
