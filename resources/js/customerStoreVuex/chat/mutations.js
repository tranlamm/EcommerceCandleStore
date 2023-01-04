export default {
    SET_BOX(state, isShow) {
        state.isShow = isShow;
    },

    SET_ALERT(state, isAlert) {
        state.isAlert = isAlert;
    },

    SET_CURRENT_USER(state, payload) {
        state.currentUser = payload;
    },

    SET_MESSAGE_LIST(state, payload) {
        state.messageList = payload;
    },

    PUSH_MESSAGE(state, payload) {
        state.messageList.push(payload);
    }
}