<template>
    <div class="announcementlist">
        <div class="announcementlist-body">
            <div class="list">
                <ul class="list-body">
                    <li class="list-empty" v-if="loading==false && announcements.length==0">
                        <p class="list-empty-message">お知らせはありません…</p>
                    </li>
                    <li class="list-item" v-for="announcement in announcements" :key="announcement.id">
                        <a :href="showurl+'/'+announcement.id">
                            <span class="list-date">{{formatDate(announcement.updated_at, 'MM/dd')}}</span>
                            <span class="list-title">{{announcement.title}}</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="pagination" v-if="page_links.length>1">
                <div class="pagination-body">
                    <a class="pagination-prev" @click.prevent="fetchAnnouncements" :href="prev_page_url" v-if="prev_page_url">
                        <i class="fas fa-caret-left"></i>
                    </a>
                    <div class="pagination-links">
                        <ul class="pagination-links-body">
                            <li class="pagination-links-item" v-for="link in page_links" :key="link.url">
                                <p class="pagination-page active" @click.prevent href="" v-if="link.active">
                                    {{link.label}}
                                </p>
                                <a class="pagination-page" @click.prevent="fetchAnnouncements" :href="link.url" v-else>
                                    {{link.label}}
                                </a>
                            </li>
                        </ul>
                    </div>
                    <a class="pagination-next" @click.prevent="fetchAnnouncements" :href="next_page_url" v-if="next_page_url">
                        <i class="fas fa-caret-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <WaitAnimationComponent :display="loading"></WaitAnimationComponent>
</template>


<script>
    import { ref, onMounted } from 'vue'
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

            const announcements = ref([]);
            const page_links = ref([]);
            const next_page_url = ref(null);
            const prev_page_url = ref(null);

            const page = ref(1);
            const n = ref(10);

            const loading = ref(true);

            const adjustFetchNumber = () => {
                const $list = document.querySelector('.announcementlist .list');
                const $listStyle = getComputedStyle($list, null);
                if(window.parent.screen.width <= 769){
                    n.value = Math.trunc(parseInt($listStyle.getPropertyValue('height')) / 50);
                } else{
                    n.value = Math.trunc(parseInt($listStyle.getPropertyValue('height')) / 65);
                }
                if(n.value < 10){
                    n.value = 10;
                }
            }

            const fetchAnnouncements = (e) => {
                loading.value = true;
                if(e){
                    if(e.target.href){
                        page.value = url2Page(e.target.href);
                    } else {
                        loading.value = false;
                        return;
                    }
                }
                const url = props.api;
                adjustFetchNumber();
                const params = {
                    page: page.value,
                    n: n.value
                };
                axios.get(url, {params: params}).then(res=>{
                    announcements.value = res.data.data;
                    page_links.value = res.data.links.slice(1, -1);
                    next_page_url.value = res.data.next_page_url;
                    prev_page_url.value = res.data.prev_page_url;
                }).catch(()=>{
                    store.commit('pushMessage', {
                        text: 'データの取得に失敗しました',
                        type: 'warning',
                    });
                }).finally(()=>{
                    loading.value = false
                });
            };

            onMounted(fetchAnnouncements);

            const url2Page = (url) => {
                url = new URL(url);
                return url.searchParams.get('page');
            }

            const formatDate = (date, format) => {
                date = new Date(date);
                format = format.replace(/yyyy/g, date.getFullYear());
                format = format.replace(/MM/g, ('0' + (date.getMonth() + 1)).slice(-2));
                format = format.replace(/dd/g, ('0' + date.getDate()).slice(-2));
                return format;
            };

            return {
                announcements,
                page_links,
                prev_page_url,
                next_page_url,

                page,
                // n,

                fetchAnnouncements,

                formatDate,

                loading,
            }
        }
    }
</script>
