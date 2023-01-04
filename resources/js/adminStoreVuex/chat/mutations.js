export default {
    SET_CURRENT_USER(state, payload) {
        state.currentUser = payload;
    },

    SET_USER_LIST(state, payload) {
        state.userList = payload.map(user => ({
            ...user,
            isAlert: false,
            isOnline: false,      
        }));
    },

    SET_ALERT_USER(state, {id, isAlert}) {
        state.userList.forEach(user => {
            if (user.id === id) {
                user.isAlert = isAlert;
            }
        })
    },

    SET_ONLINE_USER(state, {id, isOnline}) {
        state.userList.forEach(user => {
            if (user.id === id) {
                user.isOnline = isOnline;
            }
        })
    }
}