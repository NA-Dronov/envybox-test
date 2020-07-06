require('./bootstrap');

import Index from "./Index";
import ValidationErrors from "./shared/ValidationErrors";
import ResponseMessage from "./shared/ResponseMessage";

window.Vue = require('vue');

Vue.component("v-errors", ValidationErrors);
Vue.component("v-response-msg", ResponseMessage);

const app = new Vue({
    el: '#app',
    components: {
        index: Index
    }
});
