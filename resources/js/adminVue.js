import { createApp } from 'vue';
import { createStore } from 'vuex';

// chatStore
import mutations from './adminStoreVuex/chat/mutations';
import actions from './adminStoreVuex/chat/actions';
import getters from './adminStoreVuex/chat/getters';

// dashboardStore 
import dashboardGetters from './adminStoreVuex/dashboard/getters';
import dashboardMutations from './adminStoreVuex/dashboard/mutations';
import dashboardActions from './adminStoreVuex/dashboard/actions';

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

const dashboardStore = createStore({
    state() {
        return {
            activeChart: 'revenue',
        }
    },
    getters: dashboardGetters,
    mutations: dashboardMutations,
    actions: dashboardActions,
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

const dashboard = createApp({});
dashboard.use(dashboardStore);
import DashboardWrapper from './components/admin/statistic/DashboardWrapper.vue';
dashboard.component('dashboard-wrapper', DashboardWrapper);
dashboard.mount('#dashboard-vue');

