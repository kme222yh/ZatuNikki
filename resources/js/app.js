require('./bootstrap');

// require('alpinejs');


import store from './store.js'


import { createApp } from 'vue';
import EditorComponent from './components/diary/Editor.vue';
import DiaryShowMenu from './components/diary/ShowMenu.vue';
import WaitAnimationComponent from './components/WaitAnimation.vue';
import MenuButton from './components/layout/MenuButton.vue';
import GrayBackground from './components/layout/GrayBackground.vue';
import Messanger from './components/layout/Messanger.vue';
import MyDiaryList from './components/diary/MyDiaryList.vue';
import LogicAnnouncement from './components/logic/Announcement.vue';
import AnnouncementList from './components/announcement/List.vue';


createApp({
    components:{
        WaitAnimationComponent,
        DiaryShowMenu,
        EditorComponent,
        MenuButton,
        GrayBackground,
        Messanger,
        MyDiaryList,
        LogicAnnouncement,
        AnnouncementList,
    }
}).use(store).mount('#app');




require('./scripts/headerTitle');
