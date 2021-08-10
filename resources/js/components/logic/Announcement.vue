<template>
</template>



<script>
    import { onMounted } from 'vue'
    import { useStore } from 'vuex'

    export default {
        props: {
            api: ''
        },

        setup(props) {
            const store = useStore();

            onMounted(()=>{
                const url = props.api;
                axios.get(url).then(res=>{
                    if(res.data){
                        setTimeout(()=>{
                            store.commit('pushMessage', {
                                text: res.data.title,
                                type: 'news',
                                url: '/',
                            })
                        }, 1000);
                    }
                });
            })

        },
    }
</script>
