import { createRouter, createWebHistory } from "vue-router";
import IndexPage from "../Pages/IndexPage.vue";

const routes = [
    {
        path: "/",
        component: IndexPage,
        name: "Index",
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
