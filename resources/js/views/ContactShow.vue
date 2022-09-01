<template>
    <div class="main">
        <infinite-scroll @infinite-scroll="handleLoadMore" :message="message" :noResult="noResult">
            <list-contact :is_current_user="is_current_user" :contacts="contacts" :deleteContact="deleteContact" />
        </infinite-scroll>
    </div>
</template>
<script>
import { ref } from 'vue'
import axios from 'axios'
import InfiniteScroll from "infinite-loading-vue3";
import ListContact from "./components/ListContact.vue";
export default {
    components: { ListContact, InfiniteScroll },
    props: ['contacts' , 'is_current_user', 'id'],
    setup(props) {
        const contacts = ref(props.contacts.data)
        const page = ref(props.contacts.current_page)
        const message = ref('')
        const noResult = ref(false)
        async function handleLoadMore() {
            try {
                const { data: results } = await axios.get(`/api/contacts/${props.id}?page=${page.value + 1}`);
                if (results?.data?.length) {
                    contacts.value = [
                        ...contacts.value,
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

        async function deleteContact(contact) {
            try {
                await axios.delete('/contacts/' + contact.id)
                contacts.value = contacts.value.filter(_contact => _contact.id !== contact.id)
            } catch (e) {
                //throw e
            }
        }
        return {
            contacts,
            page,
            noResult,
            message,
            handleLoadMore,
            deleteContact
        }
    }
};
</script>