import axios from "axios";

export default {
    async fetchUserList({ commit }) {
        try {
            const response = await axios('/admin/chat/getAllUser');
            commit('SET_USER_LIST', response.data.users);
        } catch (error) {
            console.log(error);
        }
    },

    async getMessage({ commit }, id) {
        try {
            const response = await axios.get(`/admin/chat/getMessages/${id}`);
            return response;
        } catch (error) {
            console.log(error);
        }
    },

    async postMessage({ commit }, {id, content}) {
        try {
            const response = await axios.post(`/admin/chat/postMessage/${id}`, {
                content,
            });
            return response;
        } catch (error) {
            console.log(error);
        }
    }
}