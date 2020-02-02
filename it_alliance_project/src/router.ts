import Vue from "vue";
import VueRouter from "vue-router";
import list_page from "@/component/list_page.vue"

Vue.use(VueRouter);

export default new VueRouter({
    mode: "history",
    base: process.env.BASE_URL,
    routes: [
        {
            path: "/list_page",
            name: "list_page",
            component: list_page
        },

    ]
});
