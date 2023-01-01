<template>
    <div class="container-fluid chat-wrapper">
        <div class="row flex-grow-1">
            <div class="col col-4">
                <ChatUserList :userList="userList" :currentUser="currentUser" :setCurrentUser="setCurrentUser" :removeAlert="removeAlert"></ChatUserList>
            </div>

            <div class="col col-8">
                <div v-for="(user, index) in userList" :key="index">
                    <ChatBoxWrapper :currentUser="currentUser" v-if="user.id === currentUser.id" :alert="alert"></ChatBoxWrapper>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import ChatUserList from './ChatUserList.vue';
    import ChatBoxWrapper from './ChatBoxWrapper.vue';
    export default {
        components: {
            ChatUserList,
            ChatBoxWrapper,
        },
        data() {
            return {
                userList: [],
                currentUser: {},
            }
        },
        created() {
            this.getAllUser();
        },
        methods: {
            async getAllUser() {
                try {
                    const response = await axios.get('/admin/chat/getAllUser');
                    this.userList = response.data.users.map(user => ({
                        ...user,
                        isAlert: false,
                    }));
                    this.setCurrentUser(2);
                } catch (error) {
                    console.log(error);
                }
            },

            setCurrentUser(id) {
                this.userList.forEach(user => {
                    if (user.id === id) 
                    {
                        this.currentUser = user;
                        return;
                    }
                })
            },

            alert(id) {
                this.userList.forEach(user => {
                    if (user.id === id)
                    {
                        user.isAlert = true;
                    }
                })
            },

            removeAlert(id) {
                this.userList.forEach(user => {
                    if (user.id === id)
                    {
                        user.isAlert = false;
                    }
                })
            }
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
</style>