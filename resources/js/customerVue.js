import { createApp } from 'vue';

const chatCustomer = createApp({});
import ChatWrapper from './components/customer/ChatWrapper.vue';
chatCustomer.component('chat-wrapper', ChatWrapper);
chatCustomer.mount('#chatCustomer-vue');