<template>
    <div class="editor">
        <p class="e-d-t-date">{{diary.date}}</p>
        <div class="editor-body">
            <input class="editor-title" type="text" name="" v-model="diary.title" placeholder="日記タイトル(空の場合は日付が入ります)">
            <textarea class="editor-content" name="name" v-model="diary.contents" @input="adjustTextareaHeight" placeholder="日記を書きましょう！"></textarea>
            <div v-bind:class="{'editor-publish': 1, 'uncheck': !diary.published}" @click="togglePublish">
                <span class="check">公開する</span>
                <span class="uncheck">公開しない</span>
            </div>
            <div class="editor-submit" @click="submit">保存する</div>
        </div>

        <WaitAnimationComponent :display="sending"></WaitAnimationComponent>
    </div>
</template>


<style lang="scss">
.editor{
    &-body{
        width: 100%;
        max-width: 710px;
        margin: 0 auto;
        padding: 70px 0;

        display: flex;
        flex-direction: column;
    }
    input, textarea{
        color: #7B7B7B;
        border: none;
        background-color: white;
        border-radius: 7px;
        outline: none;
        box-sizing: border-box;
        padding: 30px 40px;
        width: 100%;
    }
    &-title{
        margin-bottom: 40px;
        font-size: 30px;
        line-height: 1;
        margin-bottom: 50px;
        padding: 30px 40px
    }
    &-content{
        min-height: 50vh;
        font-size: 20px;
        line-height: 2;
        margin-bottom: 50px;
        resize: none;
    }
    &-publish{
        background-color: #C4F7C1;
        width: 210px;
        margin: 0 auto;
        margin-bottom: 50px;
        height: 55px;
        border-radius: 100px;
        text-align: center;
        line-height: 55px;
        font-size: 20px;
        color: #707070;
        transition: .2s;
        cursor: pointer;
        .check{display: block}
        .uncheck{display: none}
        position: relative;
        &::before{
            content: '';
            position: absolute;
            top: 50%;
            left: 9px;
            height: 40px;
            width: 40px;
            transition: .2s;
            background-color: white;
            border-radius: 100px;
            transform: translateY(-50%);
        }
        &.uncheck{
            background-color: #707070;
            color: white;
            .check{display: none}
            .uncheck{display: block}
            &::before{
                left: 161px;
            }
        }
    }
    &-submit{
        color: #7B7B7B;
        width: 100%;
        height: 60px;
        border-radius: 7px;
        border: solid 1px #7B7B7B;
        background-color: transparent;
        font-size: 20px;
        text-align: center;
        line-height: 60px;
        box-sizing: border-box;
        cursor: pointer;
        transition: .2s;
        &:hover{
            background-color: #F7C9A8;
            border: none;
            color: white;
        }
    }
}

.e-d-t-date{
    max-width: 710px;
    display: block;
    margin: 0 auto;
    color: #7B7B7B;
    font-size: 25px;
}

</style>


<script>
    import { ref, onMounted, reactive } from 'vue';
    import WaitAnimationComponent from '../WaitAnimation.vue';

    export default {
        components: {
            WaitAnimationComponent,
        },
        props: {
            api: '',
            diary_str: "",
        },
        setup(props){
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
                    console.log('日記の内容がありません。')
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
                }).finally(()=>{
                    sending.value = false;
                });
            };

            const textareaLine = ref(0);
            const adjustTextareaHeight = () => {
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

            return {
                formatDate,

                diary,
                togglePublish,

                sending,

                validation,
                submit,

                textareaLine,
                adjustTextareaHeight,
            };
        },
    }
</script>
