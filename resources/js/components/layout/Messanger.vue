<template>
    <div class="messanger">
        <ul class="messanger-body">
            <transition-group>
                <li tag="li" name="messgelist" class="messanger-itemwrapper" v-for="message in messageQueue" :key="message.key">
                    <li class="messanger-item" @click="popMessage"
                        :class="{
                             warning: message.type=='warning',
                             success: message.type=='success',
                             news: message.type=='news',
                        }"
                    >
                        <p>
                            <i v-if="message.type=='warning'" class="fas fa-exclamation-circle"></i>
                            <i v-if="message.type=='success'" class="fas fa-check"></i>
                            <i v-if="message.type=='news'" class="fas fa-rss"></i>
                            {{ message.text }}
                        </p>
                    </li>
                </li>
            </transition-group>
        </ul>
    </div>
</template>



<script>
    import { ref, computed, watch, onMounted } from 'vue'
    import { useStore } from 'vuex'

    export default {
        setup() {
            const store = useStore();
            const messageQueue = computed(() => store.state.messageQueue);

            const popMessage = () => store.getters.processedMessage;

            const displayMessage = () => {
                if(!store.getters.doesExistMessage) return;
                setTimeout(popMessage, 5000);
            }

            watch(messageQueue, displayMessage, {deep: true});

            return {
                messageQueue,
                popMessage
            }
        },
    }
</script>
