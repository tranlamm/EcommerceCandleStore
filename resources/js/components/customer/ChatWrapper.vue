<template>
	<div class="wrapper">
        <div class="chat-wrapper" v-show="!isShow" @click="openChatBox">
            <img src="/images/shop/chat-icon.png" alt="chat-icon">
        </div>

        <div class="chatbox" v-show="isShow">
            <ChatLayout :closeChatBox="closeChatBox" ref="chatLayout"></ChatLayout>
        </div>
    </div>
</template>

<script>
    import ChatLayout from './ChatLayout.vue'
    export default {
        components: {
            ChatLayout,
        },        
        data() {
            return {
                isShow: false,
            }
        },
        methods: {
            closeChatBox() {
                this.isShow = false;
            },
            openChatBox() {
                this.isShow = true;
                setTimeout(this.$refs.chatLayout.scrollToElement, 100);
            }
        }
    }
</script>

<style lang="scss" scoped>
.wrapper {
    .chat-wrapper {
        width: 60px;
        height: 60px;
        margin-bottom: 20px;

        &:hover {
            cursor: pointer;
            opacity: 0.6;
        }

        img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
    }
}
</style>