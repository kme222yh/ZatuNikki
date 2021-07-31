<template>
    <div class="menubutton" :class="{opened: nowOpened=='HeaderNavMenu'}">
        <div class="menubutton-body" @click="toggleMenu">
            <div class="hamburger">
                <hr>
                <hr>
                <hr>
            </div>
        </div>

        <transition>
            <div class="menulink" v-show="nowOpened=='HeaderNavMenu'">
                <ul class="menulink-body">
                    <slot name="items"></slot>
                </ul>
            </div>
        </transition>
    </div>
</template>



<script>
    import { ref, computed } from 'vue';
    import { useStore } from 'vuex'

    export default {

        setup(){
            const store = useStore();
            const nowOpened = computed(() => store.state.nowOpened);
            const closeSomething = () => {store.commit('closeSomething');};

            const toggleMenu = () => {
                if(nowOpened.value == 'HeaderNavMenu'){
                    closeSomething();
                } else {
                    store.commit('openSomething', 'HeaderNavMenu');
                }
            };

            return {
                nowOpened,
                closeSomething,

                toggleMenu,
            };
        },
    }
</script>
