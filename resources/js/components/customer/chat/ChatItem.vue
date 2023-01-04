<template>
    <div>
        <div class="chat-item chat-user" v-if="this.message.user.id === this.currentUser.id">
            <div class="chat-message">
                {{ message.content }}
            </div>
        </div>

        <div class="chat-item" v-else>
            <div class="chat-avatar">
                <img src="/images/shop/chat-admin.png" alt="admin">
            </div>

            <div class="chat-message chat-user">
                {{ message.content }}
            </div>
        </div>
    </div>
</template>

<script>
import { mapGetters } from 'vuex';
    export default {
        props: {
            message: {
                type: Object,
                default: "",
            },
        },
        computed: {
            ...mapGetters(['currentUser']),
        }
    }
</script>

<style lang="scss" scoped>
    .chat-item {
        display: flex;
        align-items: center;
        margin-bottom: 16px;

        &.chat-user {
            justify-content: end;

            .chat-message {
                color: white;
                background-color: #0084ff;
            }
        }
    }

    .chat-avatar {
        width: 30px;
        height: 30px;
        margin-right: 12px;

        img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: contain;
        }
    }

    .chat-message {
        font-size: 14px;
        padding: 4px 10px;
        color: black;
        border-radius: 8px;
        background-color: #e4e6eb;
        max-width: 200px;
        word-break: break-all;
    }

</style>