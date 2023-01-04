import { createApp } from 'vue';
import { createStore } from 'vuex';
import mutations from './customerStoreVuex/mutations';
import actions from './customerStoreVuex/actions';
import getters from './customerStoreVuex/getters';

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
import ChatWrapper from './components/customer/ChatWrapper.vue';
chatCustomer.component('chat-wrapper', ChatWrapper);

// add store
chatCustomer.use(store);

// mount
chatCustomer.mount('#chatCustomer-vue');