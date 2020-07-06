require('./bootstrap');

import Index from "./Index";

window.Vue = require('vue');

const app = new Vue({
    el: '#app',
    components: {
        index: Index
    }
});
