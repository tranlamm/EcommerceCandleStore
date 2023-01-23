<template>
    <div class="container-fluid chat-wrapper">
        <div class="row flex-grow-1">
            <div class="col col-lg-4 col-md-5 col-12 mt-3">
                <ChatUserList></ChatUserList>
            </div>

            <div class="col col-lg-8 col-md-7 col-12 mt-3" v-if="this.currentUser.id">
                <div v-for="(user, index) in this.userList" :key="index">
                    <ChatBoxWrapper v-if="user.id === currentUser.id"></ChatBoxWrapper>
                </div>
            </div>

            <div class="col col-lg-8 col-md-7 col-12 chat-placeholder mt-3" v-else></div>
        </div>
    </div>
</template>

<script>
import ChatUserList from './ChatUserList.vue';
import ChatBoxWrapper from './ChatBoxWrapper.vue';
import { mapGetters } from 'vuex';
    export default {
        components: {
            ChatUserList,
            ChatBoxWrapper,
        },
        computed: {
            ...mapGetters(['userList', 'currentUser']),
        }
    }
</script>

<style lang="scss" scoped>
    .chat-wrapper {
        height: 100%;
        display: flex;
        align-items: center;
        padding: 0 24px;
    }

    .chat-placeholder {
        border-radius: 12px;
        border: 1px solid rgba(0,0,0,.125);
        background-color: rgba(0,0,0,.1);
        display: flex;
        flex-direction: column;
        height: 630px;
    }
</style>