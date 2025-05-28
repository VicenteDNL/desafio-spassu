<div id="chart-subject-book-count"></div>

<script>
    async function loadChartData() {
        try {
            const response = await fetch('api/report/subject-book-count');
            let data = await response.json();
            data = data.data

            var options = {
                series: [{
                    name: 'Total de Livros',
                    data: data.map(item => item.total_books)
                }],
                chart: {
                    height: 265,
                    type: 'bar',
                },
                plotOptions: {
                    bar: {
                        columnWidth: '45%',
                        distributed: true,
                    }
                },
                dataLabels: {
                    enabled: false
                },
                legend: {
                    show: false
                },
                xaxis: {
                    categories: data.map(item => item.description),
                },
                title: {
                    text: 'Total de livros por assunto'
                }
            };

            const chart = new ApexCharts(document.querySelector("#chart-subject-book-count"), options);
            chart.render();

        } catch (error) {
            console.error("Erro ao carregar dados do gráfico:", error);
        }
    }

    loadChartData();
</script>
