<template>
    <div class="dashboard-wrapper_vue">
        <div class="dashboard-header_vue">
            <div class="row">
                <div class="col col-4">
                    <div class="dashboard-item_vue" :class="{'dashboard-item_vue--active': this.activeChart === 'revenue'}" @click="this.SET_ACTIVE_CHART('revenue')">Total Revenue</div>
                </div>
                <div class="col col-4">
                    <div class="dashboard-item_vue" :class="{'dashboard-item_vue--active': this.activeChart === 'expense'}" @click="this.SET_ACTIVE_CHART('expense')">Total Expense</div>
                </div>
                <div class="col col-4">
                    <div class="dashboard-item_vue" :class="{'dashboard-item_vue--active': this.activeChart === 'dataMonth'}" @click="this.SET_ACTIVE_CHART('dataMonth')">Data per month</div>
                </div>
            </div>
        </div>

        <div class="dashboard-body_vue">
            <div class="dashboard-chart_vue" v-if="this.activeChart === 'revenue'">
                <RevenueChart></RevenueChart>
            </div>
            <div class="dashboard-chart_vue" v-if="this.activeChart === 'expense'">
                <ExpenseChart></ExpenseChart>
            </div>
            <div class="datamonth-chart_vue" v-if="this.activeChart === 'dataMonth'">
                <DataPerMonth></DataPerMonth>
            </div>
        </div>
    </div>
</template>

<script>
import { mapGetters, mapMutations } from 'vuex';
import RevenueChart from './RevenueChart.vue';
import ExpenseChart from './ExpenseChart.vue';
import DataPerMonth from './DataPerMonth.vue';
    export default {
        components: {
            RevenueChart, 
            ExpenseChart,
            DataPerMonth,
        },
        methods: {
            ...mapMutations(['SET_ACTIVE_CHART']),
        },  
        computed: {
            ...mapGetters(['activeChart']),
        }
    }
</script>

<style lang="scss" scoped>
    .dashboard-wrapper_vue {
        background-color: white;
        border: 1px solid #d5d6d7;
    }
    .dashboard-header_vue {
        padding: 28px 32px;
        border-bottom: 1px solid #d5d6d7;

        .dashboard-item_vue {
            height: 100%;
            margin: 0 32px;
            font-size: 16px;
            padding: 6px 16px;
            color: #333;
            background-color: rgba(0, 0, 0, 0.1);

            &.dashboard-item_vue--active {
                color: white;
                background-color: #198754;

                &:hover {
                    cursor: pointer;
                    background-color: #198754;
                }
            }

            &:hover {
                cursor: pointer;
                background-color: rgba(0, 0, 0, 0.2);
            }
        }
    }
    .dashboard-body_vue {
        padding: 50px 0;

        .dashboard-chart_vue {
            width: 70%;
            margin: auto;
        }

        .datamonth-chart_vue {
            padding: 0 50px;
        }
    }
</style>