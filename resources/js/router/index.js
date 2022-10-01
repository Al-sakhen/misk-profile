import {
    createRouter,
    createWebHistory
} from "vue-router";

const routes = [
    {
        path: "",
        name: "home",
        component: () => import("../views/HomeView.vue"),
    },
    {
        path: "/contact-us",
        name: "contactUs",
        component: () => import("../views/ContactView.vue"),
    },
    {
        path: "/services",
        name: "services",
        component: () => import("../views/ServicesView.vue"),
    },
    {
        path: "/crew",
        name: "crew",
        component: () => import("../views/CrewView.vue"),
    },
];

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes,
    linkActiveClass: "active",
});

export default router;
