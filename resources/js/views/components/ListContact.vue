<template>
    <div class="row">
        <div class="col-lg-12">
            <div class="main-box no-header clearfix">
                <div class="main-box-body clearfix">
                    <div class="table-responsive">
                        <table class="table user-list">
                            <thead>
                                <tr>
                                    <th><span>No</span></th>
                                    <th><span>First Name</span></th>
                                    <th><span>Last Name</span></th>
                                    <th><span>Company</span></th>
                                    <th><span>Phone</span></th>
                                    <th><span>Email</span></th>
                                    <th><span>Address</span></th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(contact, index) in contacts" :key="contact.id">
                                    <td>
                                        {{ index + 1 }}
                                    </td>
                                    <td>
                                        {{ contact.first_name || '-' }}
                                    </td>
                                    <td>
                                        {{ contact.last_name || '-' }}
                                    </td>
                                    <td>
                                        {{ contact.company || '-' }}
                                    </td>
                                    <td>
                                        {{ contact.phone || '-' }}
                                    </td>
                                    <td>
                                        {{ contact.email || '-' }}
                                    </td>
                                    <td>
                                        {{ contact.address || '-' }}
                                    </td>
                                    <td style="width: 20%;" v-if="is_current_user">
                                        <a class="btn btn-small btn-light mr-2"
                                            :href="'/contacts/' + contact.id + '/edit'">
                                            Edit
                                        </a>

                                        <button class="btn btn-small btn-light" @click="deleteContact(contact)">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import { computed } from 'vue'
export default {
    props: ['contacts', 'is_current_user', 'deleteContact'],
    setup(props) {
        const contacts = computed(() => props.contacts)
        contacts.value = props.contacts
        return {
            contacts,
            is_current_user: props.is_current_user,
            deleteContact: props.deleteContact
        }
    }
};
</script>
<style lang="scss">
body {
    background: #eee;
}

.main-box.no-header {
    padding-top: 20px;
}

.main-box {
    background: #FFFFFF;
    -webkit-box-shadow: 1px 1px 2px 0 #CCCCCC;
    -moz-box-shadow: 1px 1px 2px 0 #CCCCCC;
    -o-box-shadow: 1px 1px 2px 0 #CCCCCC;
    -ms-box-shadow: 1px 1px 2px 0 #CCCCCC;
    box-shadow: 1px 1px 2px 0 #CCCCCC;
    margin-bottom: 16px;
    -webikt-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
}

.table a.table-link.danger {
    color: #e74c3c;
}

.label {
    border-radius: 3px;
    font-size: 0.875em;
    font-weight: 600;
}

.user-list tbody td .user-subhead {
    font-size: 0.875em;
    font-style: italic;
}

.user-list tbody td .user-link {
    display: block;
    font-size: 1.25em;
    padding-top: 3px;
    margin-left: 60px;
}

a {
    color: #3498db;
    outline: none !important;
}

.user-list tbody td>img {
    position: relative;
    max-width: 50px;
    float: left;
    margin-right: 15px;
}

.table thead tr th {
    text-transform: uppercase;
    font-size: 0.875em;
}

.table thead tr th {
    border-bottom: 2px solid #e7ebee;
}

.table tbody tr td:first-child {
    font-size: 1.125em;
    font-weight: 300;
}

.table tbody tr td {
    font-size: 0.875em;
    vertical-align: middle;
    border-top: 1px solid #e7ebee;
    padding: 12px 8px;
}

a:hover {
    text-decoration: none;
}
</style>