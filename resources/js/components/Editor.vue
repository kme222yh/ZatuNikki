<template>
    <div class="editor">
        <p class="e-d-t-date">{{diary.date}}</p>
        <div class="editor-body">
            <input class="editor-title" type="text" name="" v-model="diary.title" placeholder="日記タイトル(空の場合は日付が入ります)">
            <textarea class="editor-content" name="name" v-model="diary.contents" placeholder="日記を書きましょう！"></textarea>
            <div v-bind:class="{'editor-publish': 1, 'uncheck': !diary.published}" @click="togglePublish">
                <span class="check">公開する</span>
                <span class="uncheck">公開しない</span>
            </div>
            <div class="editor-submit" @click="submit">保存する</div>
        </div>

        <wait-animation-component :display="sending"></wait-animation-component>
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
</style>


<script>
    export default {
        props: {
            api: '',
            diary_str: "",
        },
        data: ()=>({
            diary: {},
            error: {
                content: false,
            },
            sending: false,
        }),
        mounted(){
            this.diary = JSON.parse(this.diary_str);
            console.log(this.diary_str);
        },
        methods: {
            togglePublish: function(){
                this.diary.published = !this.diary.published;
            },
            submit: function(){
                if(!this.validation()){
                    console.log('日記の内容がありません。')
                    return;
                }
                this.sending = true;
                const url = this.api;
                const param = this.diary;
                console.log(param)
                axios.post(url, param).then(res=>{

                }).finally(()=>{
                    this.sending=false;
                });
            },
            validation(){
                this.error.contents = false
                let result = true
                if(!this.diary.contents){
                    this.error.contents = true
                    result = result&false
                }
                return result
            },
        }
    }
</script>
