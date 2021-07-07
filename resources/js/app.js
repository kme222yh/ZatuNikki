require('./bootstrap');

require('alpinejs');







window.Vue = require('vue').default;
Vue.component('EditorComponent', require('./components/diary/Editor.vue').default);
Vue.component('DiaryMenuComponent', require('./components/diary/Menu.vue').default);
Vue.component('WaitAnimationComponent', require('./components/WaitAnimation.vue').default);
const app = new Vue({
    el: '#app',
    created(){
    }
});
