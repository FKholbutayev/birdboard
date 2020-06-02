require('./bootstrap');

window.Vue = require('vue');
import VModal from 'vue-js-modal';
Vue.use(VModal);

//components
Vue.component('new-project-modal', require('./components/NewProjectModal.vue').default);

new Vue({
    el: '#app',
});
