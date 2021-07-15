require('./bootstrap');

// require('alpinejs');




import { createApp } from 'vue';
import EditorComponent from './components/diary/Editor.vue';
import DiaryMenuComponent from './components/diary/Menu.vue';
import WaitAnimationComponent from './components/WaitAnimation.vue';

createApp({
    components:{
        WaitAnimationComponent,
        DiaryMenuComponent,
        EditorComponent,
    }
}).mount('#app')
