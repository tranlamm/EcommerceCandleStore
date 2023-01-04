import { createApp } from 'vue';
import { createStore } from 'vuex';
import mutations from './adminStoreVuex/chat/mutations';
import actions from './adminStoreVuex/chat/actions';
import getters from './adminStoreVuex/chat/getters';

// create store
const chatStore = createStore({
    state() {
        return {
            userList: [],
            currentUser: {},
        }
    },
    getters,
    actions,
    mutations,
})

// create app chat
const chatAdmin = createApp({});

// add components
import ChatAdminWrapper from './components/admin/chat/ChatAdminWrapper.vue';
chatAdmin.component('chat-wrapper', ChatAdminWrapper);

// add store
chatAdmin.use(chatStore);

// mount
chatAdmin.mount('#chatAdmin-vue');

// ---------------------------------------------------------------------------

// create app statistic
const statistic = createApp({});
import RevenueWrapper from './components/admin/statistic/RevenueWrapper.vue';
statistic.component('revenue-wrapper', RevenueWrapper);
statistic.mount('#statistic-vue')

