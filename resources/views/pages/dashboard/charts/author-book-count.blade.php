<div id="chart-author-book-count"></div>

<script>
    async function loadChartData() {
        try {
            const response = await fetch('api/report/author-book-count');
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
                    categories: data.map(item => item.name)
                },
                title: {
                    text: 'Quantidade de livros por autor'
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
                        },
                        yaxis: {
                            labels: {
                                formatter: function(val) {
                                    if (Number.isInteger(val)) return val;
                                    ''
                                    const parts = val.split(' ');
                                    if (parts.length === 1) return parts[0];
                                    const last = parts[parts.length - 1];
                                    const firstInitial = parts[0].charAt(0).toUpperCase();
                                    return `${firstInitial}. ${last}`;
                                },
                                style: {
                                    fontSize: '10px'
                                }
                            }
                        },
                    }
                }]
            };

            const chart = new ApexCharts(document.querySelector("#chart-author-book-count"), options);
            chart.render();

        } catch (error) {
            console.error("Erro ao carregar dados do gráfico:", error);
        }
    }

    loadChartData();
</script>
