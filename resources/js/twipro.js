window.Vue = require('vue');

import App from './components/Home'

const app = new Vue({
    el: '#app',
    components: { App },
    template: '<App/>'
})