<template>
	<div class="wrapper">
        <div class="chat-wrapper" :class="{'chat-alert': isAlert}" v-show="!isShow" @click="openChatBox">
            <img src="/images/shop/chat-icon.png" alt="chat-icon">
            <div class="chat-notify" v-show="isAlert">!</div>
        </div>

        <div class="chatbox" v-show="isShow">
            <ChatLayout ref="chatLayout"></ChatLayout>
        </div>
    </div>
</template>

<script>
import { mapGetters, mapMutations } from 'vuex';
import ChatLayout from './ChatLayout.vue'
    export default {
        components: {
            ChatLayout,
        },    
        methods: {
            ...mapMutations(['SET_BOX', 'SET_ALERT']),
            openChatBox() {
                this.SET_BOX(true);
                this.SET_ALERT(false);
                setTimeout(this.$refs.chatLayout.scrollToBottom, 100);
            },
        },
        computed: {
            ...mapGetters(['isShow', 'isAlert']),
        }
    }
</script>

<style lang="scss" scoped>
.wrapper {
    .chat-wrapper {
        width: 60px;
        height: 60px;
        margin-bottom: 20px;
        position: relative;

        &:hover {
            cursor: pointer;
            opacity: 0.6;
        }

        img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
        
        &.chat-alert {
            animation: shake 0.5s;
            animation-iteration-count: infinite;
            @keyframes shake {
                0% { transform: rotate(0deg); }
                25% { transform: rotate(5deg); }
                50% { transform: rotate(0deg); }
                75% { transform: rotate(-5deg); }
                100% { transform: rotate(0deg); }
            }
        }

        .chat-notify {
            position: absolute;
            top: 0;
            right: 0;
            font-size: 16px;
            font-weight: 600;
            width: 22px;
            height: 22px;
            border-radius: 50%;
            background-color: red;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    }
}
</style>