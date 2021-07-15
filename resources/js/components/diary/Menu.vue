<template>
    <div :class="{'diarymenu': true, 'opened': opened}">
        <ul class="diarymenu-body">
            <li class="diarymenu-head" @click="toggleMenu"><p>メニュー</p></li>
            <li class="diarymenu-item"><a :href="deleteurl">削除</a></li>
            <li class="diarymenu-item"><a :href="editurl">編集</a></li>
        </ul>
    </div>
</template>


<style lang="scss">
.diarymenu{
    position: fixed;
    bottom: 100px;
    right: 100px;

    li{list-style: none;}

    &-body{
        position: relative;
    }

    &-head, &-item{
        height: 100px;
        width: 100px;
        background-color: #F7C9A8;
        border-radius: 100px;
        text-align: center;
        cursor: pointer;
        position: absolute;
        bottom: 0;
        right: 0;
        z-index: 1;
        p, a{
            line-height: 100px;
            color: white;
            text-decoration: none;
            display: block;
        }
    }

    &-item{
        transition: .3s;
        z-index: 0;
    }
    &.opened &-item{
        bottom: 130px;
        &:last-child{
            bottom: 260px;
        }
    }

}
</style>


<script>
    import { ref } from 'vue'
    export default {
        props: {
            deleteurl: '',
            editurl: "",
        },
        setup() {
            const opened = ref(false);
            const toggleMenu = () => {opened.value = !opened.value};
            return {
                opened,
                toggleMenu,
            };
        },
    }
</script>
