import { createRouter, createWebHistory } from 'vue-router';
import AuthPage from '../Pages/AuthPage.vue';

const routes = [
    {
        path: '/auth',
        component: AuthPage,
        name: 'auth',
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
