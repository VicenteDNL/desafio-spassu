<div id="chart-subject-by-year"></div>

<script>
    async function loadChartData() {
        try {
            const response = await fetch('api/report/subject-by-year');
            let data = await response.json();
            data = data.data
            const authors = Array.from(new Set(data.map((e) => e.year_publication)))
            const subject = Array.from(new Set(data.map((e) => e.description)))
            const findData = (s, y) => {
                const result = data.filter((e) => e.year_publication == y && e.description == s)
                if (result.length == 0) return 0
                return result[0].total_books
            }
            const series = subject.map((y) => {
                return {
                    name: y,
                    data: authors.map((a) => findData(y, a))
                }
            })

            var options = {
                series: series,
                chart: {
                    type: 'bar',
                    height: 350,
                    stacked: true,
                    toolbar: {
                        show: true
                    },
                    zoom: {
                        enabled: true
                    }
                },
                responsive: [{
                    breakpoint: 480,
                    options: {
                        legend: {
                            position: 'bottom',
                            offsetX: -10,
                            offsetY: 0
                        }
                    }
                }],
                plotOptions: {
                    bar: {
                        dataLabels: {
                            total: {
                                enabled: true,
                            }
                        }
                    },
                },
                xaxis: {
                    type: 'text',
                    categories: authors
                },
                title: {
                    text: 'Assuntos Publicados por Ano'
                }
            };
            const chart = new ApexCharts(document.querySelector("#chart-subject-by-year"), options);
            chart.render();

        } catch (error) {
            console.error("Erro ao carregar dados do gráfico:", error);
        }
    }
    loadChartData();
</script>
