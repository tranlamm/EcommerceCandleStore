<template>
    <div class="chat-user-list">
        <div class="list-header">
            <input type="text" class="list-search" spellcheck="false" placeholder="Search....." v-model="search" @keyup.enter="search = ''">
        </div>
        <div class="list-body" v-if="this.userList">
            <ChatUserItem v-for="(user, index) in this.searchUserList" :key="index" :user="user"></ChatUserItem>
        </div>
    </div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex';
import ChatUserItem from './ChatUserItem.vue';
    export default {
        components: {
            ChatUserItem
        },
        async created() {
            await this.fetchUserList();
        },
        data() {
            return {
                search: "",
            }
        },
        methods: {
            ...mapActions(['fetchUserList']),
        },  
        computed: {
            ...mapGetters(['userList']),
            searchUserList() {
                return this.userList.filter(user => user.username.includes(this.search));
            }
        },
    }
</script>

<style lang="scss" scoped>
    .chat-user-list {
        padding: 24px;
        border-radius: 12px;
        border: 1px solid rgba(0,0,0,.125);
        background-color: white;
        display: flex;
        flex-direction: column;
        height: 630px;
    }

    .list-header {
        margin-bottom: 24px;

        .list-search {
            width: 100%;
            font-size: 16px;
            padding: 4px 12px;
            color: #333;
        }
    }

    .list-body {
        flex-grow: 1;
        max-height: 500px;
        overflow-y: scroll;
    }
</style>