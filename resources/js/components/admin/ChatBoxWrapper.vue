<template>
    <div class="chatbox-wrapper">
        <div class="chatbox-header">
            <div class="chatbox-avatar">
                <img src="/images/shop/chat-user2.png" alt="avatar">
            </div>
            <div class="d-flex flex-column">
                <div class="chatbox-name">{{ currentUser.fullname }}</div>
                <div class="chatbox-username">{{ currentUser.username }}</div>
            </div>
        </div>

        <div class="chatbox-body">
            <MessageItem v-for="(message, index) in messageList" :message="message" :key="index"></MessageItem>
            <div ref="scrollElement"></div>
        </div>

        <div class="chatbox-footer">
            <input type="text" class="chatbox-send" spellcheck="false" v-model="messageInput" @keyup.enter="this.postMessage">
            <i class="fa-regular fa-paper-plane chatbox-btn" @click="this.postMessage"></i>
        </div>
    </div>
</template>

<script>
    import MessageItem from './MessageItem.vue';
    export default {
        props: {
            currentUser: {
                type: Object,
                default: {},
            }
        },
        components: {
            MessageItem,
        }, 
        created() {
            this.getMessages();
            setTimeout(this.scrollToElement, 1000);
        },
        data() {
            return {
                messageList: [],
                messageInput: "",
            }
        },
        methods: {
            async getMessages() {
                try {
                    const response = await axios.get(`/admin/chat/getMessages/${this.currentUser.id}`);
                    this.messageList = response.data.messages;
                } catch (error) {
                    console.log(error);
                }
            },
            async postMessage() {
                try {
                    const response = await axios.post(`/admin/chat/postMessage/${this.currentUser.id}`, {
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
                const el = this.$refs.scrollElement;
                if (el) {
                    el.scrollIntoView({behavior: 'smooth'})
                }
            }
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