<template>
    <div class="mydiarylist">
        <div class="mydiarylist-body">
            <div class="minimap">
                <div class="minimap-body">
                    <ul class="minimap-item" v-for="(y_diaries, year) in diaries" :key="year">
                        <li class="minimap-year">{{ year }}年</li>
                        <li class="minimap-month" v-for="(m_diaries, month) in y_diaries" :key="month">
                            <a :href="'#'+year+month">{{ month }}月</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="list">
                <div class="list-body">
                    <div class="list-year" v-for="(y_diaries, year) in diaries" :key="year">
                        <ul :id="year+month" class="list-month" v-for="(m_diaries, month) in y_diaries" :key="month">
                            <li class="list-head">{{ year }}年 {{ month }}月</li>
                            <li class="list-day" v-for="(diary, day) in m_diaries" :key="day">
                                <a :href="showurl+'/'+diary.id"><span>{{ day }}日</span> {{ diary.title ?? formatDate(new Date(diary.date), 'yyyy年MM月dd日の日記') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
    import { ref, onMounted } from 'vue'

    export default {
        props: {
            api: '',
            showurl: '',
        },
        setup(props){
            const diaries = ref([]);

            onMounted(() => {
                const url = props.api;
                axios.get(url).then(res=>{
                    diaries.value = res.data;
                    console.log(res.data[2021][4][30]);
                }).catch(()=>{
                    store.commit('pushMessage', {
                        text: 'データの取得に失敗しました',
                        type: 'warning',
                    });
                }).finally(()=>{
                });
            });

            const formatDate = (date, format) => {
                format = format.replace(/yyyy/g, date.getFullYear());
                format = format.replace(/MM/g, ('0' + (date.getMonth() + 1)).slice(-2));
                format = format.replace(/dd/g, ('0' + date.getDate()).slice(-2));
                return format;
            };

            return {
                diaries,

                formatDate,
            }
        }
    }
</script>
