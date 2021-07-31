<template>
    <div class="mydiarylist">
        <div class="mydiarylist-body">
            <div class="minimap">
                <div class="minimap-body">
                    <ul class="minimap-item" v-for="year in reversedKeys(diaries)" :key="year">
                        <li class="minimap-year">{{ year }}年</li>
                        <li class="minimap-month" v-for="month in reversedKeys(diaries[year])" :key="month">
                            <a :href="'#'+year+month">{{ month }}月</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="list">
                <div class="list-body">
                    <div class="list-empty" v-if="loading==false && diaries.length==0">
                        <p class="list-empty-message">日記を書きましょう！</p>
                    </div>
                    <div class="list-year" v-for="year in reversedKeys(diaries)" :key="year">
                        <ul :id="year+month" class="list-month" v-for="month in reversedKeys(diaries[year])" :key="month">
                            <li class="list-head">{{ year }}年 {{ month }}月</li>
                            <li class="list-day" v-for="day in reversedKeys(diaries[year][month])" :key="day">
                                <a :href="showurl+'/'+diaries[year][month][day].id">
                                    <span>{{ day }}日</span>
                                    {{ getTitle(diaries[year][month][day]) }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <WaitAnimationComponent :display="loading"></WaitAnimationComponent>
</template>


<script>
    import { ref, onMounted, filter } from 'vue'
    import { useStore } from 'vuex'

    import WaitAnimationComponent from '../WaitAnimation.vue';

    export default {
        components: {
            WaitAnimationComponent,
        },
        props: {
            api: '',
            showurl: '',
        },
        setup(props){
            const store = useStore();

            const diaries = ref([]);

            const loading = ref(true);

            onMounted(() => {
                loading.value = true;
                const url = props.api;
                axios.get(url).then(res=>{
                    diaries.value = res.data;
                }).catch(()=>{
                    store.commit('pushMessage', {
                        text: 'データの取得に失敗しました',
                        type: 'warning',
                    });
                }).finally(()=>{
                    loading.value = false
                });
            });

            const formatDate = (date, format) => {
                format = format.replace(/yyyy/g, date.getFullYear());
                format = format.replace(/MM/g, ('0' + (date.getMonth() + 1)).slice(-2));
                format = format.replace(/dd/g, ('0' + date.getDate()).slice(-2));
                return format;
            };

            const getTitle = diary => diary.title ?? formatDate(new Date(diary.date), 'yyyy年MM月dd日の日記');

            const reversedKeys = items => Object.keys(items).reverse();

            return {
                diaries,

                loading,

                formatDate,

                getTitle,

                reversedKeys,
            }
        }
    }
</script>
