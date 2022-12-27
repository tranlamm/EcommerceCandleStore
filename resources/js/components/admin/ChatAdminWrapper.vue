<template>
    <div class="container">
        <div class="row">
            <div class="col col-2">
                <div class="chat-user-list"></div>
            </div>

            <div class="col col-10">

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        components: {

        },
        data() {
            return {
                userList: [],
            }
        },
        created() {
            
        },
        methods: {
            async getAllUser() {
                try {
                    const response = await axios.get('/admin/chat/getAllUser');
                    this.userList = response.data.users;
                } catch (error) {
                    console.log(error);
                }
            }
        }
    }
</script>

<style lang="scss" scoped>
    
</style>