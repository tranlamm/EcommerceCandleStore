<template>
    <div class="row">
        <div class="col col-8">
            <div class="chart-title">Biểu đồ doanh số hàng tháng theo từng mặt hàng</div>
            <div class="line-chart">
                <Line :data="lineChartData" :options="chartOptions" />
            </div>
        </div>
        <div class="col col-4">
            <div class="chart-title">Biểu đồ doanh thu hàng tháng theo từng mặt hàng</div>
            <div class="pie-chart">
                <Pie :data="pieChartData" :options="chartOptions" />
            </div>
        </div>
    </div>
</template>

<script lang="ts">
    import { Chart as ChartJS, CategoryScale, LinearScale, PointElement, LineElement, ArcElement, Title, Tooltip, Legend } from 'chart.js';
    import { Line, Pie } from 'vue-chartjs';
    ChartJS.register( CategoryScale, LinearScale, PointElement, LineElement, ArcElement, Title, Tooltip, Legend );

    export default {
        props: {
            activeMonth: {
                type: Number,
                default: 1,
            },
            dataPerMonth: {
                type: Array,
                default: [],
            }
        },
        components: {
            Line,
            Pie
        },
        data() {
            return {
                lineChartData: {
                    labels: ["Week 1", "Week 2", "Week 3", "Week 4"],
                    datasets: this.lineDataSets()
                },
                pieChartData: {
                    labels: ["Candle Revenue", "Oil Revenue", "Wax Revenue"],
                    datasets: this.pieDataSets()
                },
                chartOptions : {
                    responsive: true,
                    maintainAspectRatio: false,
                }
            }
        },
        methods: {
            lineDataSets() {
                const dataCandle : Number[] = [], dataOil : Number[] = [], dataWax : Number[] = [];
                this.dataPerMonth.forEach(week => {
                    dataCandle.push(week.candle);
                    dataOil.push(week.oil);
                    dataWax.push(week.wax);
                });
                return [
                    {
                        label: 'CANDLE',
                        backgroundColor: '#FF5733',
                        borderColor: '#FF5733',
                        borderWidth: 2,
                        data: dataCandle,
                    },
                    {
                        label: 'ESSENTIAL OIL',
                        backgroundColor: '#A020F0',
                        borderColor: '#A020F0',
                        borderWidth: 2,
                        data: dataOil,
                    },
                    {
                        label: 'SCENTED WAX',
                        backgroundColor: '#006400',
                        borderColor: '#006400',
                        borderWidth: 2,
                        data: dataWax,
                    },
                ]
            },
            pieDataSets() {
                let dataCandle : Number = 0, dataOil : Number = 0, dataWax : Number = 0;
                const data : Number[] = [];
                this.dataPerMonth.forEach(week => {
                    dataCandle += week.candle_price;
                    dataOil += week.oil_price;
                    dataWax += week.wax_price;
                });
                data.push(dataCandle, dataOil, dataWax);
                return [{
                    backgroundColor: ['#FF5733', '#A020F0', '#006400'],
                    data
                }];
            }
        }
    }
</script>

<style lang="scss" scoped>
    .chart-title {
        font-size: 18px;
        font-weight: 600;
        text-align: center;
        margin-bottom: 24px;
    }
    .line-chart {
        min-height: 400px;
    }
</style>