import axios from "axios";

export default {
    async fetchCurrentUser({ commit }) {
        try {
            const response = await axios.get('/customer/getCurrentUser');
            commit('SET_CURRENT_USER', response.data);
        } catch (error) {
            console.log(error);
        }
    },

    async fetchMessageList({ commit }) {
        try {
            const response = await axios.get('/customer/chat/getMessages');
            commit('SET_MESSAGE_LIST', response.data.messages);
        } catch (error) {
            console.log(error);
        }
    },

    async postMessage({ commit }, content) {
        try {
            const response = await axios.post('/customer/chat/postMessage', {
                content,
            });
            commit('PUSH_MESSAGE', response.data.message);
        } catch (error) {
            console.log(error);
        }
    }
}