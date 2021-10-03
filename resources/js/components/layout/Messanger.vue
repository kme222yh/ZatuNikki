<template>
    <div class="messanger">
        <ul class="messanger-body">
            <transition-group>
                <li tag="li" name="messgelist" class="messanger-itemwrapper" v-for="message in messages" :key="message.key">
                    <li class="messanger-item" @click="processMessage(message.key)"
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
/*
ref = [
    {
        text: '',
        type: '',
        key: null,
        timeoutId,
    }
]
*/

    import { ref, computed, watch } from 'vue'
    import { useStore } from 'vuex'

    export default {
        setup() {
            const messages = ref([]);

            const store = useStore();
            const messageQueue = computed(() => store.state.messageQueue);

            const processMessage = (key) => {
                const index = messages.value.findIndex(message => message.key == key);
                clearTimeout(messages.value[index].timeoutId);
                messages.value.splice(index, 1);
            };
            const getMessage = () => {
                if(store.getters.doesExistMessage == false) return;
                let message = store.getters.popMessage;
                message.key = (new Date()).getTime();
                message.timeoutId = setTimeout(()=>{
                    processMessage(message.key);
                }, 5000);
                messages.value.push(message);
            };

            watch(messageQueue, getMessage, {deep: true});


            return {
                messages,
                processMessage
            }
        },
    }
</script>
