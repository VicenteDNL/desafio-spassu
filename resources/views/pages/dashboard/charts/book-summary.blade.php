<div id="chart-book-summary"></div>

<script>
    async function loadChartData() {
        try {
            const response = await fetch('api/report/book-summary');
            let data = await response.json();
            data = data.data
            const options = {
                chart: {
                    type: 'bar',
                    height: 300
                },
                series: [{
                    name: 'Total de Livros',
                    data: data.map(item => item.total_books)
                }],
                xaxis: {
                    categories: data.map(item => item.year_publication)
                },
                title: {
                    text: 'Livros Publicados por Ano'
                },
                plotOptions: {
                    bar: {
                        horizontal: false
                    }
                },
                responsive: [{
                    breakpoint: 768,
                    options: {
                        plotOptions: {
                            bar: {
                                horizontal: true
                            }
                        },
                        chart: {
                            height: 400
                        }
                    }
                }]
            };

            const chart = new ApexCharts(document.querySelector("#chart-book-summary"), options);
            chart.render();

        } catch (error) {
            console.error("Erro ao carregar dados do gráfico:", error);
        }
    }

    loadChartData();
</script>
