<div id="chart-author-count-subject"></div>

<script>
    async function loadChartData() {
        try {
            const response = await fetch('api/report/author-count-subject');
            let data = await response.json();
            data = data.data
            const authors = Array.from(new Set(data.map((e) => e.name)))
            const subject = Array.from(new Set(data.map((e) => e.description)))
            const findData = (s, a) => {
                const result = data.filter((e) => e.name == a && e.description == s)
                if (result.length == 0) return 0
                return result[0].total_books
            }
            const series = subject.map((s) => {
                return {
                    name: s,
                    data: authors.map((a) => findData(s, a))
                }
            })
            var options = {
                series: series,
                chart: {
                    type: 'bar',
                    height: 650,
                    stacked: true,

                },
                plotOptions: {
                    bar: {
                        horizontal: true,
                        dataLabels: {
                            total: {
                                enabled: false,
                                offsetX: 0,
                                style: {
                                    fontSize: '12px',
                                    fontWeight: 900
                                }
                            }
                        }
                    },
                },
                stroke: {
                    width: 0
                },
                title: {
                    text: 'Autores por assunto'
                },
                xaxis: {
                    categories: authors,
                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return val + "  Livro(s)"
                        }
                    }
                },
                responsive: [{
                    breakpoint: 768,
                    options: {
                        chart: {
                            height: 500
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
                }, ]
            };

            var chart = new ApexCharts(document.querySelector("#chart-author-count-subject"), options);
            chart.render();

        } catch (error) {
            console.error("Erro ao carregar dados do gráfico:", error);
        }
    }
    loadChartData();
</script>
