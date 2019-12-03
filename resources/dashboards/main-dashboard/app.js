import Vue from 'vue';
import VueRouter from 'vue-router';
import axios from 'axios';
import OSchoolUIKit from '../../ui-kit/index';

Vue.use(OSchoolUIKit);
Vue.use(VueRouter);


import routes from './routes';
import NavigationItems from "./nav-items";
import LanguageManager from './Tools/LanguageManager';

//=====================================================

const router = new VueRouter({
    linkActiveClass: 'active',
    routes: routes
});

const app = new Vue({
    el: "#app",
    router: router,
    data: {
        navigationItems: NavigationItems,
        LanguageManager: LanguageManager,

        is_collapsed_nav: false,
    },
    methods: {

    },
    created() {

    }
});