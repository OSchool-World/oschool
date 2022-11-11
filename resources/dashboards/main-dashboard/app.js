import Vue from 'vue';
import VueRouter from 'vue-router';
import OSchoolUIKit from '../../ui-kit/index';
import axios from 'axios';
import VueAxios from 'vue-axios';

Vue.use(VueAxios, axios);
Vue.use(OSchoolUIKit);
Vue.use(VueRouter);


import routes from './routes';
import NavigationItems from "./nav-items";
import LanguageManager from './Tools/LanguageManager';
// import APIManager from './Tools/APIManager';

//=====================================================

// const plugin = {
//     install () {
//         Vue.GET = APIManager.get;
//         Vue.POST = APIManager.post;
//         Vue.prototype.$get = APIManager.get;
//     }
// };
//
// Vue.use(plugin);

axios.defaults.baseURL = 'http://oschool.local/api';

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
