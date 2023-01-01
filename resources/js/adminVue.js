import { createApp } from 'vue';

const statistic = createApp({});
import RevenueWrapper from './components/admin/statistic/RevenueWrapper.vue';
statistic.component('revenue-wrapper', RevenueWrapper);
statistic.mount('#statistic-vue')

const chatAdmin = createApp({});
import ChatAdminWrapper from './components/admin/chat/ChatAdminWrapper.vue';
chatAdmin.component('chat-wrapper', ChatAdminWrapper);
chatAdmin.mount('#chatAdmin-vue');