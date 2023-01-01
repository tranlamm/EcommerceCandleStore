<template>
    <div class="chat-user-item" :class="{active: currentUser.id === data.id}" @click="this.handleClick">
        <div class="user-avatar">
            <img src="/images/shop/chat-user.png" alt="avatar">
        </div>

        <div class="user-info">
            <div class="user-name">
                {{ data.fullname }}
            </div>
            <div class="user-username">
                {{ data.username }}
            </div>
        </div>

        <div v-show="data.isAlert" class="user-notify">!</div>
    </div>
</template>

<script>
export default {
    props: {
        data: {
            type: Object,
            default: {}
        },
        currentUser: {
            type: Object,
            default: {}
        },
        setCurrentUser: {
            type: Function,
            default: () => {}
        },
        removeAlert: {
            type: Function,
            default: () => {}
        }
    },
    methods: {
        handleClick() {
            this.setCurrentUser(this.data.id);
            this.removeAlert(this.data.id);
        }
    }
}
</script>

<style lang="scss" scoped>
    .chat-user-item {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
        padding: 10px 12px;
        border-radius: 8px;
        transition: background-color ease-in-out 200ms;

        &:hover {
            background-color: #efefef;
            cursor: pointer;
        }
        &.active {
            background-color: #efefef;
        }
    }

    .user-avatar {
        width: 40px;
        height: 40px;
        margin-right: 18px;

        img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
    }

    .user-info {
        flex-grow: 1;
        display: flex;
        flex-direction: column;

        .user-name {
            font-size: 16px;
            font-weight: 600;
            color: black;
        }

        .user-username {
            font-size: 14px;
            color: #666;
        }
    }

    .user-notify {
        width: 16px;
        height: 16px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: red;
        color: white;
        font-size: 14px;
        font-weight: 600;
    }
</style>