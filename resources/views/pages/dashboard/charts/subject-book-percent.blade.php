<div id="chart-subject-book-percent"></div>

<script>
    async function loadChartData() {
        try {
            const response = await fetch('api/report/subject-book-count');
            let data = await response.json();
            data = data.data

            var options = {
                series: data.map((e) => e.total_books),
                chart: {
                    width: 450,
                    type: 'pie',
                },
                labels: data.map((e) => e.description),
                title: {
                    text: 'Porcentagem de livros por assunto'
                }
            };
            const chart = new ApexCharts(document.querySelector("#chart-subject-book-percent"), options);
            chart.render();

        } catch (error) {
            console.error("Erro ao carregar dados do gráfico:", error);
        }
    }
    loadChartData();
</script>
