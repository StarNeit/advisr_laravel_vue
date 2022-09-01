<template>
    <div class="main">
        <infinite-scroll @infinite-scroll="handleLoadMore" :message="message" :noResult="noResult">
            <list-user :users="users" :handleLoadMore="handleLoadMore" />
        </infinite-scroll>
    </div>
</template>
<script>
import { ref } from 'vue'
import axios from 'axios'
import ListUser from "./components/ListUser.vue";
import InfiniteScroll from "infinite-loading-vue3";
export default {
    components: { ListUser, InfiniteScroll },
    props: ['users'],
    setup(props) {
        const users = ref(props.users.data)
        const page = ref(props.users.current_page)
        const message = ref('')
        const noResult = ref(false)
        async function handleLoadMore() {
            try {
                const { data: results } = await axios.get(`/api/users?page=${page.value + 1}`);
                if (results?.data?.length) {
                    users.value = [
                        ...users.value,
                        ...results.data
                    ]
                    page.value = page.value + 1;
                } else {
                    noResult.value = true;
                    message.value = "No result found";
                }
            } catch (e) {
                noResult.value = true;
                message.value = "Error loading data";
            }
        }
        return {
            users,
            page,
            handleLoadMore,
            noResult,
            message
        }
    }
};
</script>