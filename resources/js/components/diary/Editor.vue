<template>
    <div class="editor">
        <div class="editor-body">
            <p class="editor-head">{{diary.date}}</p>
            <input class="editor-title" type="text" name="" v-model="diary.title" @change="setConfirmChange" placeholder="日記タイトル (空の場合は日付が入ります)">
            <div class="editor-content">
                <textarea class="editor-content-body" name="name" v-model="diary.contents" @input="adjustTextareaHeight" @change="setConfirmChange" placeholder="日記を書きましょう！"></textarea>
            </div>
            <div v-bind:class="{'editor-publish': 1, 'uncheck': !diary.published}" @click="togglePublish">
                <span class="check">公開する</span>
                <span class="uncheck">公開しない</span>
            </div>
            <div class="editor-submit" @click="submit(),cancelConfirmChange()">保存する</div>
        </div>

    </div>

    <WaitAnimationComponent :display="sending"></WaitAnimationComponent>

    <!-- <Dialog :display="nowOpened=='DiaryEditorMoveConfirmDialog'" url="" @denied="closeSomething">
        <i class="fas fa-exclamation-circle"></i> まだ保存していません <br> 変更を破棄しますか？
    </Dialog> -->
</template>




<script>
    import { ref, onMounted, computed } from 'vue';
    import { useStore } from 'vuex'

    import WaitAnimationComponent from '../WaitAnimation.vue';
    // import Dialog from './dialog.vue';

    export default {
        components: {
            WaitAnimationComponent,
            // Dialog,
        },
        props: {
            api: '',
            diary_str: "",
        },
        setup(props){
            const store = useStore();
            // const nowOpened = computed(() => store.state.nowOpened);
            // const closeSomething = () => {store.commit('closeSomething');};

            // const openConfirmDialog = () => {
            //     store.commit('openSomething', 'DiaryEditorMoveConfirmDialog');
            // }

            const formatDate = (date, format) => {
                format = format.replace(/yyyy/g, date.getFullYear());
                format = format.replace(/MM/g, ('0' + (date.getMonth() + 1)).slice(-2));
                format = format.replace(/dd/g, ('0' + date.getDate()).slice(-2));
                return format;
            };


            const diary = ref(JSON.parse(props.diary_str));
            diary.value.date = formatDate(new Date(diary.value.date), 'yyyy/MM/dd');
            const togglePublish = () => {diary.value.published = !diary.value.published;};


            const sending = ref(false);


            const error = ref({
                content : false,
            });
            const validation = () => {
                error.value.contents = false
                let result = true
                if(!diary.value.contents){
                    error.value.contents = true
                    result = result&false
                }
                return result
            };
            const submit = () => {
                if(!validation()){
                    store.commit('pushMessage', {
                        text: '内容がありません',
                        type: 'warning',
                    });
                    return;
                }
                sending.value = true;
                const url = props.api;
                const param = diary.value;
                axios.post(url, param).then(res=>{
                    diary.value.contents = res.data.contents;
                    diary.value.date = formatDate(new Date(res.data.date), 'yyyy/MM/dd');
                    diary.value.published = res.data.published;
                    diary.value.title = res.data.title;
                    diary.value.id = res.data.id;
                    store.commit('pushMessage', {
                        text: '日記を保存しました',
                        type: 'success',
                    });
                }).catch(()=>{
                    store.commit('pushMessage', {
                        text: '保存に失敗しました',
                        type: 'warning',
                    });
                }).finally(()=>{
                    sending.value = false;
                });
            };

            const textareaLine = ref(0);
            const adjustTextareaHeight = () => {
                return;
                let $textarea = document.getElementsByClassName('editor-content')[0];
                let $content = document.getElementsByClassName('content')[0];
                const oldTextareLine = textareaLine.value;
                textareaLine.value = ($textarea.value + '\n').match(/\n/g).length;
                const $textareaStyle = getComputedStyle($textarea, null);
                const padding = parseInt($textareaStyle.getPropertyValue('padding-top')) + parseInt($textareaStyle.getPropertyValue('padding-bottom'));
                const lineHeight = parseInt($textareaStyle.getPropertyValue('line-height'));
                const minHeight = parseInt($textareaStyle.getPropertyValue('min-height'));
                const dLine = textareaLine.value - oldTextareLine;
                const scrollAmount = dLine * lineHeight;
                $textarea.style.height = textareaLine.value * lineHeight + padding + 'px';
                if(textareaLine.value * lineHeight + padding > minHeight){
                    $content.scrollBy(0, scrollAmount);
                }
            };

            onMounted(()=>{
                let $textarea = document.getElementsByClassName('editor-content')[0];
                textareaLine.value = ($textarea.value + '\n').match(/\n/g).length;
            });


            const alreadyConfirmSet = ref(false);
            const unloadEvent = (e) => {
                e.returnValue = '変更を保存していません。';
            };
            const setConfirmChange = () => {
                if(alreadyConfirmSet.value == true) return;
                alreadyConfirmSet.value = true;
                window.addEventListener('beforeunload', unloadEvent, false);
            }
            const cancelConfirmChange = () => {
                if(alreadyConfirmSet.value == false) return;
                alreadyConfirmSet.value = false;
                window.removeEventListener('beforeunload', unloadEvent, false);
            }


            return {
                // nowOpened,
                // closeSomething,
                // openConfirmDialog,

                formatDate,

                diary,
                togglePublish,

                sending,

                validation,
                submit,

                textareaLine,
                adjustTextareaHeight,

                setConfirmChange,
                cancelConfirmChange,
            };
        },
    }
</script>
