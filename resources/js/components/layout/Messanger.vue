<template>
    <div class="messanger">
        <ul class="messanger-body">
            <transition-group>
                <li tag="li" name="messgelist" class="messanger-itemwrapper" v-for="message in messageQueue" :key="message.key">
                    <li class="messanger-item"
                        :class="{
                             warning: message.type=='warning',
                             success: message.type=='success',
                        }"
                    >
                        <p>
                            <i v-if="message.type=='warning'" class="fas fa-exclamation-circle"></i>
                            <i v-if="message.type=='success'" class="fas fa-check"></i>
                            {{ message.text }}
                        </p>
                    </li>
                </li>
            </transition-group>
        </ul>
    </div>
</template>



<script>
    import { ref, computed, watch, reactive } from 'vue'
    import { useStore } from 'vuex'

    export default {
        setup() {
            const store = useStore();
            const messageQueue = computed(() => store.state.messageQueue);

            const displayMessage = () => {
                if(!store.getters.doesExistMessage) return;
                setTimeout(()=>store.getters.processedMessage, 3000);
            }

            watch(messageQueue, displayMessage, {deep: true});

            return {
                messageQueue,
            }
        },
    }
</script>
