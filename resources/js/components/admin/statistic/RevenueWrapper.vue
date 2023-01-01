<template>
    <div class="revenue-wrapper">
        <div class="revenue-header">
            <div class="revenue-nav">
                <div class="revenue-nav-item" v-for="month in 12" :key="month" @click="this.handleClickMonth(month)">{{ month }}</div>
            </div>
        </div>

        <div class="revenue-body">
            <RevenueChart ></RevenueChart>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
import RevenueChart from './RevenueChart.vue'; 
    export default {
        components: {
            RevenueChart,
        },
        created() {
            this.getMonthData(1);
        },
        data() {
            return {
                activeMonth: 1,
                dataPerMonth: [],
            }
        },
        methods: {
            async getMonthData(month) {
                try {
                    const response = await axios.get(`/admin/data/month/${month}`);
                    this.dataPerMonth = response.data;
                } catch (error) {
                    console.log(error);
                }
            },

            async handleClickMonth(month) {
                try {
                    if (month != this.activeMonth)
                    {
                        this.activeMonth = month;
                        await this.getMonthData(month);
                    }
                } catch (error) {
                    console.log(error);
                }
            }
        }
    }
</script>

<style lang="scss" scoped>
    .revenue-wrapper {
        padding: 32px;
        background-color: white;
        display: flex;
        flex-direction: column;
    }

    .revenue-header {
        padding-bottom: 18px;
        margin-bottom: 24px;
        border-bottom: 1px solid #d5d6d7;

        .revenue-nav {
            display: flex;
            justify-content: flex-end;

            .revenue-nav-item {
                font-size: 14px;
                font-weight: 600;
                color: #333;
                padding: 4px 14px;
                margin-left: 16px;
                background-color: rgba(0, 0, 0, 0.1);

                &:hover {
                    cursor: pointer;
                    background-color: rgba(0, 0, 0, 0.2);
                }
            }
        }
    }
</style>