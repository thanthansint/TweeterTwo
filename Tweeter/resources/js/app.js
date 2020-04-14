

require('./bootstrap');

window.Vue = require('vue');

import Like from './components/Like.vue'
import Gif from './components/Gif.vue'

Vue.component('Root', require('./components/Root.vue').default);


const app = new Vue({
    el: '#app',
    components: {
        Like,
        Gif
    }
});


document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems, {});
  });
