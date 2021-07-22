<template>
    <transition>
        <div class="graybackground" v-show="display">
            <div class="graybackground-body" @click="closeSomething">
            </div>
        </div>
    </transition>
</template>


<script>
    import { computed, ref } from 'vue'
    import { useStore } from 'vuex'

    export default {
        setup(){
            const store = useStore();

            const display = computed(() => store.state.displayGrayBackground);

            const closeSomething = () => {store.commit('closeSomething')};

            return {
                display,
                closeSomething,
            }
        }
    }
</script>
