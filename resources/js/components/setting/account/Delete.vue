<template>
    <li class="setting-content-item"><a :href="api" @click.prevent="openConfirmDialog">アカウントを消す</a></li>

    <Dialog :display="nowOpened=='DiaryDeleteConfirmDialog'" :url="api" @denied="closeSomething"></Dialog>
</template>



<script>
    import { ref, computed, provide } from 'vue'
    import { useStore } from 'vuex'

    import Dialog from './deleteDialog.vue';

    export default {
        components:{
            Dialog,
        },
        props: {
            api: '',
            csrf: '',
            mail_ref: '',
        },

        setup(props) {
            const store = useStore();
            const nowOpened = computed(() => store.state.nowOpened);
            const closeSomething = () => {store.commit('closeSomething');};

            const api = ref(props.api);

            const openConfirmDialog = () => {
                store.commit('openSomething', 'DiaryDeleteConfirmDialog');
            }

            provide('csrf', props.csrf);
            provide('mail_ref', props.mail_ref);

            return {
                api,
                nowOpened,
                closeSomething,
                openConfirmDialog,
            }
        },
    }
</script>
