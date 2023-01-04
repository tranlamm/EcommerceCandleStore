<template>
    <div class="chatlayout-wrapper" @click="SET_ALERT(false)">
        <div class="chatlayout-header" :class="{'header-alert': isAlert}">
            <div class="title">
                <div class="title-text">Chăm sóc khách hàng</div>
                <i class="fa-solid fa-headphones"></i>
            </div>
            <div class="close-btn" @click="SET_BOX(false)"><i class="fa-solid fa-xmark"></i></div>
        </div>

        <div class="chatlayout-body" v-if="messageList">
            <ChatItem v-for="(message, index) in messageList" :key="index" :message="message"></ChatItem>
            <div ref="scrollIntoMe"></div>
        </div>

        <div class="chatlayout-footer">
            <input class="chat-input" type="text" spellcheck="false" v-model="messageInput" @keydown.enter="this.sendMessage(messageInput)">
            <div class="chat-send" @click="this.sendMessage(messageInput)"><i class="fa-regular fa-paper-plane"></i></div>
        </div>
    </div>
</template>

<script>
import { mapActions, mapGetters, mapMutations } from 'vuex';
import ChatItem from './ChatItem.vue';
    export default {
        components: {
            ChatItem,
        },  
        data() {
            return {
                messageInput: "",
            }
        },
        async created() {
            await this.created();
        },
        beforeDestroy () {
            // huỷ lắng nghe tin nhắn ở chatroom hiện tại
            // nếu như user chuyển qua route/chatroom khác
            Echo.leave(`channel.${this.currentUser.id}`)
        },
        methods: {
            ...mapMutations(['SET_BOX', 'SET_ALERT', 'PUSH_MESSAGE']),
            ...mapActions(['fetchCurrentUser', 'fetchMessageList', 'postMessage']),
            async created() {
                await this.fetchCurrentUser();
                await this.fetchMessageList();
                Echo.join(`channel.${this.currentUser.id}`)
                    .listen('MessagePosted', (e) => {
                        this.PUSH_MESSAGE(e.message);
                        this.SET_ALERT(true);
                        setTimeout(this.scrollToBottom, 100);                  
                })
            },

            async sendMessage(content) {
                await this.postMessage(content);
                this.messageInput = "";
                this.scrollToBottom();
            },

            scrollToBottom() {
                const el = this.$refs.scrollIntoMe;
                if (el) {
                    el.scrollIntoView({behavior: 'smooth'});
                }
            }
        },
        computed: {
            ...mapGetters(['isAlert', 'messageList', 'currentUser'])
        }
    }
</script>

<style lang="scss" scoped>
    .chatlayout-wrapper {
        width: 340px;
        height: 460px;
        border-top-left-radius: 12px;
        border-top-right-radius: 12px;
        box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;
        background-color: white;
        display: flex;
        flex-direction: column;
    }

    .chatlayout-header {
        font-size: 16px;
        font-weight: 500;
        padding: 12px 18px;
        border-bottom: 1px solid rgba(14, 30, 37, 0.12);
        box-shadow: rgba(17, 17, 26, 0.1) 0px 1px 0px;
        display: flex;
        justify-content: space-between;
        align-items: center;

        &.header-alert {
            background-color: rgba(14, 30, 37, 0.1);
        }

        .title {
            display: flex;
            align-items: center;
            .title-text {
                color: #333;
                margin-right: 8px;
            }
        }

        .close-btn {
            font-size: 18px;
            color: #0084ff;
            &:hover {
                cursor: pointer;
                opacity: 0.5;
            }
        }
    }

    .chatlayout-body {
        flex-grow: 1;
        overflow-y: scroll;
        padding: 18px 8px 0px 8px;
    }

    .chatlayout-footer {
        display: flex;
        align-items: center;
        padding: 8px 0;
        border-top: 1px solid rgba(14, 30, 37, 0.12);

        .chat-input {
            font-size: 16px;
            padding: 8px 12px;
            border: none;
            border-radius: 12px;
            flex-grow: 1;
            background-color: #f0f2f5;
            color: black;
            margin-left: 6px;
        }

        .chat-send {
            padding: 0 12px;
            font-size: 18px;
            &:hover {
                cursor: pointer;
                color: #0084ff;
            }
        }
    }
</style>