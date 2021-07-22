<template>
    <transition>
        <div class="dialog" v-if="display">
            <div class="dialog-body">
                <p class="dialog-message">
                    <slot></slot>
                </p>
                <div class="dialog-items">
                    <a :href="url" class="dialog-item">はい</a>
                    <a href="javascript:void(0)" @click="$emit('denied')" class="dialog-item">いいえ</a>
                </div>
            </div>
        </div>
    </transition>
</template>



<script>
    import { ref } from 'vue'

    export default {
        props: {
            url: '',
            display: false,
        },
    }
</script>
