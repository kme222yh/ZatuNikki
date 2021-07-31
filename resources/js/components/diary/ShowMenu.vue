<template>
    <div class="showmenu" v-if="auth==false">
        <div class="showmenu-body">
            <div class="showmenu-head" @click="linkCopy">
                <a href="javascript:void(0)"><i class="fas fa-code"></i></a>
            </div>
        </div>
    </div>

    <div class="showmenu auth" v-if="auth==true">
        <ul class="showmenu-body" :class="{'opened': nowOpened=='DiaryShowMenu'}">
            <li class="showmenu-head" @click="toggleMenu"><p><i class="fas fa-ellipsis-h"></i></p></li>
            <li class="showmenu-item"><a :href="editurl"><i class="fas fa-edit"></i></a></li>
            <li class="showmenu-item" @click="linkCopy(),toggleMenu()"><a href="javascript:void(0)"><i class="fas fa-code"></i></a></li>
            <li class="showmenu-item" @click="openConfirmDialog"><a href="javascript:void(0)"><i class="fas fa-trash-alt"></i></a></li>
        </ul>
    </div>

    <Dialog :display="nowOpened=='DiaryDeleteConfirmDialog'" :url="deleteurl" @denied="closeSomething">
        <i class="fas fa-exclamation-circle"></i> この日記を削除しますか？ <br> この操作は元に戻せません
    </Dialog>
</template>



<script>
    import { ref, computed } from 'vue'
    import { useStore } from 'vuex'

    import Dialog from './dialog.vue';

    export default {
        components:{
            Dialog,
        },
        props: {
            auth: false,
            deleteurl: '',
            editurl: "",
        },
        setup() {
            const store = useStore();
            const nowOpened = computed(() => store.state.nowOpened);
            const closeSomething = () => {store.commit('closeSomething');};

            const toggleMenu = () => {
                if(nowOpened.value == 'DiaryShowMenu'){
                    closeSomething();
                } else {
                    store.commit('openSomething', 'DiaryShowMenu');
                }
            };

            const linkCopy = () => {
                const element = document.createElement('input');
                element.value = location.href;
                document.body.appendChild(element);
                element.select();
                document.execCommand('copy');
                document.body.removeChild(element);
                store.commit('pushMessage', {
                    text: 'リンクをコピーしました',
                    type: 'success',
                });
            }

            const openConfirmDialog = () => {
                store.commit('openSomething', 'DiaryDeleteConfirmDialog');
            }

            return {
                nowOpened,
                closeSomething,

                toggleMenu,

                linkCopy,

                openConfirmDialog,
            };
        },
    }
</script>
