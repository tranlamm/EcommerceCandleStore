import axios from "axios";

const fetchProductReviewInfo = async ({ commit }, id) => {
    try {
        const response = await axios.get(`/customer/product/review/detail/${id}`);
        if (response.data.hasOwnProperty('error'))
        {
            commit('SET_MESSAGE', response.data.error);
        }
        else
        {
            commit('SET_PRODUCT_INFO', response.data.product);
            commit('SET_PRODUCT_REVIEW_LIST', response.data.comments);
        }
    } catch (error) {
        console.log(error);
    }
}

export default {
    async fetchCurrentUser({ commit }, id) {
        try {
            const response = await axios.get(`/customer/product/review/getCurrentUser/${id}`);
            if (response.data.hasOwnProperty('error'))
            {
                commit('SET_IS_LOGGED', false);
            }
            else
            {
                commit('SET_IS_LOGGED', true);
                if (response.data.hasReviewed)
                {
                    commit('SET_HAS_REVIEWED', true);
                    commit('SET_USER_REVIEW', response.data.review);
                }
                else 
                {
                    commit('SET_HAS_REVIEWED', false);
                }
            }
        } catch (error) {
            console.log(error);
        }
    },

    fetchProductReviewInfo,

    async postReview({ commit }, { id, point, comment }) {
        try {
            const response = await axios.post('/customer/product/review/post', {
                id,
                point,
                comment,
            });
            if (response.data.hasOwnProperty('error'))
                commit('SET_MESSAGE', response.data.error);
            else {
                commit('SET_MESSAGE', response.data.success);
                commit('SET_HAS_REVIEWED', true);
            }
            await fetchProductReviewInfo({ commit }, id);
        } catch (error) {
            console.log(error);
        }
    },

    async deleteReview({ commit }, id) {
        try {
            const response = await axios.delete('/customer/product/review/delete', {
                data: {
                    id,
                }
            })
            if (response.data.hasOwnProperty('error'))
                commit('SET_MESSAGE', response.data.error);
            else {
                commit('SET_MESSAGE', response.data.success);
                commit('SET_HAS_REVIEWED', false);
            }
            await fetchProductReviewInfo({ commit }, id);
        } catch (error) {
            console.log(error);
        }
    }
}