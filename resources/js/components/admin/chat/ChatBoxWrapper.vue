<template>
    <div class="chatbox-wrapper">
        <div class="chatbox-header">
            <div class="chatbox-avatar">
                <img src="/images/shop/chat-user2.png" alt="avatar">
            </div>
            <div class="d-flex flex-column">
                <div class="chatbox-name">{{ this.currentUser.fullname }}</div>
                <div class="chatbox-username">{{ this.currentUser.username }}</div>
            </div>
        </div>

        <div class="chatbox-body">
            <MessageItem v-for="(message, index) in this.messageList" :message="message" :key="index"></MessageItem>
            <div ref="scrollElement"></div>
        </div>

        <div class="chatbox-footer">
            <input type="text" class="chatbox-send" spellcheck="false" v-model="messageInput" @keyup.enter="this.sendMessage">
            <i class="fa-regular fa-paper-plane chatbox-btn" @click="this.sendMessage"></i>
        </div>
    </div>
</template>

<script>
import { mapActions, mapGetters, mapMutations } from 'vuex';
import MessageItem from './MessageItem.vue';
    export default {
        components: {
            MessageItem,
        }, 
        data() {
            return {
                messageList: [],
                messageInput: "",
                id: 2,
            }
        },
        async created() {
            await this.created();
            this.id = this.currentUser.id;

            Echo.join(`channel.${this.id}`)
                .here((users) => { 
                    // gọi ngay thời điểm ta join vào phòng, trả về tổng số user hiện tại có trong phòng (cả ta)
                    if (users.length > 1) {
                        this.SET_ONLINE_USER({
                            id: this.id,
                            isOnline: true,
                        })
                    }
                })
                .joining((user) => { 
                    // gọi khi có user mới join vào phòng
                    this.SET_ONLINE_USER({
                        id: this.id,
                        isOnline: true,
                    })
                })
                .leaving((user) => { 
                    // gọi khi có user rời phòng
                    this.SET_ONLINE_USER({
                        id: this.id,
                        isOnline: false,
                    })
                })
                .listen('MessagePosted', (e) => {
                    this.messageList.push(e.message);
                    setTimeout(this.scrollToBottom, 100);
                    this.SET_ALERT_USER({
                        id: this.id, 
                        isAlert: true
                    });
            })
        },
        beforeDestroy () {
            // huỷ lắng nghe tin nhắn ở chatroom hiện tại
            // nếu như user chuyển qua route/chatroom khác
            Echo.leave(`channel.${this.id}`)
        },
        methods: {
            ...mapActions(['getMessage', 'postMessage']),
            ...mapMutations(['SET_ALERT_USER', 'SET_ONLINE_USER']),
            async created() {
                try {
                    const response = await this.getMessage(this.currentUser.id);
                    this.messageList = response.data.messages;
                    setTimeout(this.scrollToBottom, 100);
                } catch (error) {
                    console.log(error);
                }
            },

            async sendMessage() {
                try {
                    const response = await this.postMessage({
                        id: this.currentUser.id, 
                        content: this.messageInput,
                    });
                    this.messageList.push(response.data.message);
                    this.messageInput = "";
                    setTimeout(this.scrollToBottom, 100);
                } catch (error) {
                    console.log(error);
                }
            },

            scrollToBottom() {
                const el = this.$refs.scrollElement;
                if (el) {
                    el.scrollIntoView({behavior: 'smooth'})
                }
            },
        },
        computed: {
            ...mapGetters(['currentUser']),
        }
    }
</script>

<style lang="scss" scoped>
    .chatbox-wrapper {
        border-radius: 12px;
        border: 1px solid rgba(0,0,0,.125);
        background-color: white;
        display: flex;
        flex-direction: column;
        height: 630px;
    }

    .chatbox-header {
        padding: 12px 24px;
        border-bottom: 1px solid rgba(0,0,0,.125);
        display: flex;
        align-items: center;

        .chatbox-avatar {
            width: 50px;
            height: 50px;
            margin-right: 18px;

            img {
                width: 100%;
                height: 100%;
                object-fit: contain;
                border-radius: 50%;
            }
        }

        .chatbox-name {
            font-size: 16px;
            font-weight: 600;
        }

        .chatbox-username {
            font-size: 14px;
            color: #666;
        }
    }

    .chatbox-body {
        flex-grow: 1;
        overflow-y: scroll;
        padding: 18px 6px 12px 14px;
    }

    .chatbox-footer {
        padding: 18px 24px;
        display: flex;
        align-items: center;
        border-top: 1px solid rgba(0,0,0,.125);

        .chatbox-send {
            flex-grow: 1;
            font-size: 16px;
            padding: 8px 24px;
            margin-right: 18px;
            border: none;
            border-radius: 12px;
            background-color: #f0f2f5;
            outline: none;
        }

        .chatbox-btn {
            font-size: 18px;

            &:hover {
                color: #0084ff;
                cursor: pointer;
            }
        }
    }
</style>