import { createApp } from 'vue';
import { createStore } from 'vuex';
import mutations from './customerStoreVuex/chat/mutations';
import actions from './customerStoreVuex/chat/actions';
import getters from './customerStoreVuex/chat/getters';

// create store
const store = createStore({
    state() {
        return {
            isShow: false,
            isAlert: false,
            currentUser: {},
            messageList: [],
        }
    },
    getters,
    actions,
    mutations,
})

// create app
const chatCustomer = createApp({});

// add components
import ChatWrapper from './components/customer/chat/ChatWrapper.vue';
chatCustomer.component('chat-wrapper', ChatWrapper);

// add store
chatCustomer.use(store);

// mount
chatCustomer.mount('#chatCustomer-vue');