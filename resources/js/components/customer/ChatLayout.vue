<template>
    <div class="chatlayout-wrapper">
        <div class="chatlayout-header">
            <div class="title">
                <div class="title-text">Chăm sóc khách hàng</div>
                <i class="fa-solid fa-headphones"></i>
            </div>
            <div class="close-btn" @click="closeChatBox"><i class="fa-solid fa-xmark"></i></div>
        </div>

        <div class="chatlayout-body">
            <ChatItem v-for="(message, index) in messageList" :key="index" :message="message" :currentUser="currentUser"></ChatItem>
            <div ref="scrollIntoMe"></div>
        </div>

        <div class="chatlayout-footer">
            <input class="chat-input" type="text" spellcheck="false" v-model="messageInput" @keydown.enter="postMessage">
            <div class="chat-send" @click="postMessage"><i class="fa-regular fa-paper-plane"></i></div>
        </div>
    </div>
</template>

<script>
import ChatItem from './ChatItem.vue';
    export default {
        props: {
            closeChatBox: {
                type: Function,
                default: () => {}
            },
        },
        components: {
            ChatItem,
        },  
        data() {
            return {
                currentUser: {},
                messageList: [],
                messageInput: "",
            }
        },
        async created() {
            await this.getCurrentUser();
            await this.loadMessages();
            await Echo.private(`channel.${this.currentUser.id}`)
                .listen('MessagePosted', (e) => {
                    this.messageList.push(e.message);
            })
        },
        beforeDestroy () {
            // huỷ lắng nghe tin nhắn ở chatroom hiện tại
            // nếu như user chuyển qua route/chatroom khác
            Echo.leave(`channel.${this.currentUser.id}`)
        },
        methods: {
            async getCurrentUser() {
                try {
                    const response = await axios.get('/customer/getCurrentUser');
                    this.currentUser = response.data;
                } catch (error) {
                    console.log(error);
                }
            },

            async loadMessages() {
                try {
                    const response = await axios.get('/customer/chat/getMessages');
                    this.messageList = response.data.messages;
                } catch (error) {
                    console.log(error);
                }
            },

            async postMessage() {
                try {
                    const response = await axios.post('/customer/chat/postMessage', {
                        content: this.messageInput
                    });
                    this.messageList.push(response.data.message);
                    this.messageInput = "";
                    setTimeout(this.scrollToElement, 100);
                } catch (error) {
                    console.log(error);
                }
            },

            scrollToElement() {
                const el = this.$refs.scrollIntoMe;
                if (el) {
                    el.scrollIntoView({behavior: 'smooth'});
                }
            }
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