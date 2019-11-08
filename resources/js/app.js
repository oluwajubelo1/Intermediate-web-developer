import Vue from 'vue';
import {
    InertiaApp
} from '@inertiajs/inertia-vue';

Vue.config.productionTip = false;
Vue.use(InertiaApp);
Vue.mixin({
    methods: {
        route: window.route
    }
})



const app = document.getElementById('app');

new Vue({
    render(h) {
        return h(InertiaApp, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent: name => {
                    return import(`./Pages/${name}`).then(
                        module => module.default
                    );
                }
            }
        });
    }
}).$mount(app)
