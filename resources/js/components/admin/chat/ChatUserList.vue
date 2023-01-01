<template>
    <div class="chat-user-list">
        <div class="list-header">
            <input type="text" class="list-search" spellcheck="false" placeholder="Search....." v-model="search" @keyup.enter="search=''">
        </div>
        <div class="list-body">
            <ChatUserItem v-for="(user, index) in this.searchUserList" :key="index" :data="user" :currentUser="currentUser" :setCurrentUser="setCurrentUser" :removeAlert="removeAlert"></ChatUserItem>
        </div>
    </div>
</template>

<script>
    import ChatUserItem from './ChatUserItem.vue';
    export default {
        props: {
            userList: {
                type: Array,
                default: [],
            },
            currentUser: {
                type: Object,
                default: {}
            },
            setCurrentUser: {
                type: Function,
                default: () => {}
            },
            removeAlert: {
                type: Function,
                default: () => {}
            },
        },
        components: {
            ChatUserItem
        },
        data() {
            return {
                search: "",
            }
        },
        computed: {
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