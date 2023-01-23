<template>
    <div>
        <div class="income-chart-header">
            <div class="row">
                <div class="col col-6">
                    <div class="d-none d-md-block">
                        <div class="income-chart-header-text">Sales Revenue</div>
                        <div class="income-chart-header-price">{{ this.currencyFormat }}</div>
                        <div class="income-chart-header-sub">Your sales monitoring dashboard. <a href="/admin/invoice/onlineinvoice">View details</a></div>
                    </div>
                </div>
                <div class="col col-6 d-flex justify-content-end align-items-center">
                    <div class="date-wrapper">
                        <label class="date-label">Year</label>
                        <input type="number" min="2018" max="2030" class="date-input" v-model="this.year">
                        <div class="date-warning" v-show="this.isWarning">Year is invalid</div>
                        <button class="date-btn" @click="this.handleClick">Submit</button>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="!this.isLoading" class="chart-wrapper">
            <canvas ref="incomeChart"></canvas>
        </div>
    </div>
</template>

<script>
import { mapActions } from 'vuex';
import Chart from 'chart.js/auto';
    export default {
        data() {
            return {
                year: 2022,
                isWarning: false,
                isLoading: false,
                data: {},
            }
        },
        async mounted() {
            await this.created();
            this.renderChart();
            
        },
        methods: {
            ...mapActions(['fetchYearRevenue']),

            async created() {
                try {
                    this.isLoading = true;
                    const response =await this.fetchYearRevenue(this.year);
                    this.data = response.data;
                    this.isLoading = false;
                } catch (error) {
                    this.isLoading = false;
                    console.log(error);
                }
            },

            async handleSubmit() {
                try {
                    if (this.year) {
                        this.isLoading = true;
                        const response =await this.fetchYearRevenue(this.year);
                        this.data = response.data;
                        this.isLoading = false; 
                        this.isWarning = false;
                    }
                    else {
                        this.isWarning = true;
                    }
                } catch (error) {
                    this.isLoading = false;
                    console.log(error);
                }
            },

            async handleClick() {
                await this.handleSubmit();
                this.renderChart();
            },

            renderChart() {
                const incomeChartData = {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', "July", 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'],
                    datasets: [{
                        label: 'Total Sales',
                        backgroundColor: 'rgba(0, 128, 128, 0.3)',
                        borderColor: 'rgba(0, 128, 128, 0.7)',
                        borderWidth: 2,
                        lineTension: 0.5,
                        data: this.data.data,
                    }]
                };
                const chart = this.$refs.incomeChart;
                new Chart(chart, {
                    type: 'line',
                    data: incomeChartData,
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                display: true,
                                ticks: {
                                    callback: (value) => {
                                        value = value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                                        return value;
                                    },
                                    beginAtZero: true
                                },
                                afterDataLimits(scale) {
                                    scale.max += 1;
                                },
                            }
                        },
                        tooltips: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    return 'Sales: ' + tooltipItem.yLabel.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + ' VND';
                                },
                            }
                        },
                    }
                });
            }
        },
        computed: {
            currencyFormat() {
                if (this.data.income)
                {
                    return this.data.income.toLocaleString('it-IT', {style : 'currency', currency : 'VND'});
                }
                else
                    return '0 VND';
            }
        }
    }
</script>

<style lang="scss" scoped>
    .income-chart-header {
        margin-bottom: 14px;
        .income-chart-header-text {
            font-size: 20px;
            font-weight: 600;
        }
        .income-chart-header-price {
            font-size: 26px;
            font-weight: 600;
            color: #dc3545;
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
                margin-left: 24px;
                border: none;
            }
        }
    }
    .chart-wrapper {
        margin-top: 32px;
    }
</style>