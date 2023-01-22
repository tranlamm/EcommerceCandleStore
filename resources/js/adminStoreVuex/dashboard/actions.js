import axios from "axios";

export default {
    async fetchYearRevenue(context, year) {
        try {
            const response = await axios.get(`/admin/statistic/getrevenue/${year}`);
            return response;
        } catch (error) {
            console.log(error);
        }
    },

    async fetchYearExpense(context, year) {
        try {
            const response = await axios.get(`/admin/statistic/getexpense/${year}`);
            return response;
        } catch (error) {
            console.log(error);
        }
    },

    async fetchDataPerMonth(context, { year, month }) {
        try {
            const response = await axios.get(`/admin/statistic/getdata/${year}/${month}`);
            return response;
        } catch (error) {
            console.log(error);
        }
    }
}