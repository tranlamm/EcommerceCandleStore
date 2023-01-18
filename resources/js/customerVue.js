import { createApp } from 'vue';
import { createStore } from 'vuex';
import mutations from './customerStoreVuex/chat/mutations';
import actions from './customerStoreVuex/chat/actions';
import getters from './customerStoreVuex/chat/getters';

import commentMutations from './customerStoreVuex/comment/mutations';
import commentActions from './customerStoreVuex/comment/actions';
import commentGetters from './customerStoreVuex/comment/getters';

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

const reviewStore = createStore({
    state() {
        return {
            isLogged: false,
            hasReviewed: false,
            userReview: {},
            productInfo: {},
            productReviewList: [],
            message: '',
        }
    },
    'getters': commentGetters,
    'actions': commentActions,
    'mutations': commentMutations,
})

// create app
const chatCustomer = createApp({});
const reviewCustomer =createApp({});

// add components
import ChatWrapper from './components/customer/chat/ChatWrapper.vue';
chatCustomer.component('chat-wrapper', ChatWrapper);

import ReviewWrapper from './components/customer/comment/ReviewWrapper.vue';
reviewCustomer.component('review-wrapper', ReviewWrapper);

// add store
chatCustomer.use(store);
reviewCustomer.use(reviewStore);

// mount
chatCustomer.mount('#chatCustomer-vue');
reviewCustomer.mount('#reviewCustomer-vue');