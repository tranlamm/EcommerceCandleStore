export default {
    SET_USER_REVIEW(state, payload) {
        state.userReview = payload;
    },

    SET_IS_LOGGED(state, isLogged) {
        state.isLogged = isLogged;
    },

    SET_HAS_REVIEWED(state, hasReviewed) {
        state.hasReviewed = hasReviewed;
    },

    SET_MESSAGE(state, payload) {
        state.message = payload;
    },

    SET_PRODUCT_INFO(state, payload) {
        state.productInfo = payload;
    },

    SET_PRODUCT_REVIEW_LIST(state, payload) {
        state.productReviewList = payload;
    },
}