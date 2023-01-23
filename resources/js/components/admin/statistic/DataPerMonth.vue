<template>
    <div>
        <div class="income-chart-header">
            <div class="d-none d-md-block">
                <div class="income-chart-header-text">Chi tiết doanh thu sản phẩm hàng tháng</div>
                <div class="income-chart-header-sub">Your sales monitoring dashboard. <a href="/admin/candleproduct">View details</a></div>
            </div>
            <div class="date-wrapper">
                <label class="date-label">Date</label>
                <input type="month" class="date-input" ref="date" value="2022-01">
                <div class="date-warning" v-show="this.isWarning">Please select date !</div>
                <button class="date-btn" @click="handleClick">Submit</button>
            </div>
        </div>
        <div v-if="!this.isLoading" class="body-wrapper container-fluid">
            <div class="row">
                <div class="col col-12 col-lg-6 mt-4">
                    <canvas ref="saleChart" class="chart-wrapper"></canvas>
                </div>
                <div class="col col-12 col-lg-6 mt-4">
                    <canvas ref="leftChart" class="chart-wrapper"></canvas>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapActions } from 'vuex';
import Chart from 'chart.js/auto';
    export default {
        data() {
            return {
                data: {},
                isWarning: false,
                isLoading: false,
            }
        },
        async mounted() {
            await this.created();
            this.renderChart();
        },
        methods: {
            ...mapActions(['fetchDataPerMonth']),

            async created() {
                try {
                    this.isLoading = true;
                    const response = await this.fetchDataPerMonth({year: 2022, month: 1});
                    this.data = response.data;
                    this.isLoading = false;
                } catch (error) {
                    this.isLoading = false;
                    console.log(error);
                }
            },

            async handleSubmit() {
                const date = this.$refs.date;
                if (date) {
                    const year = date.value.slice(0, 4);
                    const month = date.value.slice(5, 7);
                    if (!year)
                    {
                        this.isWarning = true;
                        return;
                    }
                    if (!month)
                    {
                        this.isWarning = true;
                        return;
                    }
                    try {
                        this.isWarning = false;
                        this.isLoading = true;
                        const response = await this.fetchDataPerMonth({year, month});
                        this.data = response.data;
                        this.isLoading = false;
                    } catch (error) {
                        this.isLoading = false;
                        console.log(error);
                    }
                }
            },

            async handleClick() {
                try {
                    await this.handleSubmit();
                    this.renderChart();
                } catch (error) {
                    console.log(error);
                }
            },

            renderChart() {
                const saleData = {
                    labels: ['Candle', 'Essential Oil', 'Scented Wax'],
                    datasets: [{
                        label: 'Number of products sold',
                        data: [this.data.candle_sale, this.data.oil_sale, this.data.wax_sale],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 205, 86, 0.2)',
                        ],
                        borderColor: [
                            'rgb(255, 99, 132)',
                            'rgb(255, 159, 64)',
                            'rgb(255, 205, 86)',
                        ],
                        borderWidth: 1
                    }]
                };
                const leftData = {
                    labels: ['Candle', 'Essential Oil', 'Scented Wax'],
                    datasets: [{
                        label: 'Number of products left in stock',
                        data: [this.data.candle_left, this.data.oil_left, this.data.wax_left],
                        backgroundColor: [
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                        ],
                        borderColor: [
                            'rgb(75, 192, 192)',
                            'rgb(54, 162, 235)',
                            'rgb(153, 102, 255)',
                        ],
                        borderWidth: 1
                    }]
                };
                const saleChart = this.$refs.saleChart;
                const leftChart = this.$refs.leftChart;
                new Chart(saleChart, {
                    type: 'bar',
                    data: saleData,
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                ticks: {
                                    beginAtZero: true
                                },
                                afterDataLimits(scale) {
                                    scale.max += 1;
                                },
                            }
                        },
                    }
                });
                new Chart(leftChart, {
                    type: 'bar',
                    data: leftData,
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                ticks: {
                                    beginAtZero: true
                                },
                                afterDataLimits(scale) {
                                    scale.max += 1;
                                },
                            }
                        },
                    }
                });
            }
        }
    }
</script>

<style lang="scss" scoped>
    .income-chart-header {
        margin-bottom: 14px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        .income-chart-header-text {
            font-size: 20px;
            font-weight: 600;
        }
        .income-chart-header-sub {
            font-size: 14px;
            color: #888;
            a {
                color: #888;
                &:hover {
                    color: black;
                }
            }
        }
        .date-wrapper {
            margin-left: 50px;
            display: flex;
            align-items: center;
            
            .date-label {
                font-size: 18px;
                margin-right: 10px;
                color: #888;
            }
    
            .date-input {
                font-size: 14px;
            }

            .date-warning {
                margin-left: 12px;
                font-size: 16px;
                font-weight: 600;
                color: #dc3545;
            }
    
            .date-btn {
                outline: none;
                color: white;
                background-color: #0d6efd;
                font-size: 14px;
                padding: 4px 12px;
                margin-left: 20px;
                border: none;
            }
        }
    }
</style>