<template>
    <div class="chat-user-item" :class="{active: currentUser.id === data.id}" @click="setUser(data.id)">
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
        setUser: {
            type: Function,
            default: () => {}
        }
    }
}
</script>

<style lang="scss" scoped>
    .chat-user-item {
        display: flex;
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
        width: 50px;
        height: 50px;
        margin-right: 18px;

        img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
    }

    .user-info {
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
</style>