document.addEventListener('DOMContentLoaded', () => {

    const ctx = document.getElementById('chart');
    const ctx2 = document.getElementById('chart2');
    const chartData = $('#chartData').data('values');

    let labels = Object.keys(chartData);
    let values = Object.values(chartData);

    let sum = 0;
    for (let key in values) {
        if (typeof values[key] == 'number') {
            sum += values[key];
        }
    }
    sum = [sum];

    Chart.register('ChartDataLabels');
    Chart.register('chartjs-plugin-annotation');




    const chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Топливо', 'Компостирование', 'Удобрение', 'Опылители'],
            datasets: [{
                data: values,
                borderWidth: 3,
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)',
                    'rgb(48, 243, 171)',
                ],
                hoverOffset: 4,
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },

            layout: {
                padding: 20
            },

            plugins: {
                legend: {
                    display: true,
                    labels: {
                        font: {
                            size: 14,
                        },
                        color: 'black',
                        generateLabels: function (chart) {
                            return chart.data.labels.map(function (label, i) {
                                return {
                                    text: label,
                                    fillStyle: chart.data.datasets[0].backgroundColor[i]
                                };
                            });
                        }
                    }
                },
                title: {
                    display: true,
                    text: 'Графическое представление данных',
                    font: {
                        size: 30,
                    }
                },
                datalabels: {
                    color: 'black',
                    labels: {
                        title: {
                            font: {
                                weight: 'bold',
                                size: 14,
                            }
                        },
                    }
                }
            }
        },
        plugins: [ChartDataLabels],
    })

    const chart2 = new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: ['CO₂-экв. тыс. тонн общ.'],
            datasets: [{
                data: sum,
                borderWidth: 3,
                backgroundColor: 'rgb(210, 170, 170)',
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },

            layout: {
                padding: 20
            },

            plugins: {
                legend: {
                    display: true,
                    labels: {
                        font: {
                            size: 14,
                        },
                        color: 'black',
                        generateLabels: function() {
                            return [{
                                text: 'CO₂-экв. тыс. тонн общ.',
                                fillStyle: 'rgb(255, 99, 132)',
                            }];
                        }
                    }
                },
                title: {
                    display: true,
                    text: 'Сумма данных в CO₂-экв. тыс. тонн',
                    font: {
                        size: 30,
                    }
                },
                annotation: {
                    annotations: {
                        line1: {
                            type: 'line',
                            yMin: 50,
                            yMax: 50,
                            borderColor: 'rgb(255, 99, 132)',
                            borderWidth: 3,
                        }
                    }
                },
                datalabels: {
                    color: 'black',
                    labels: {
                        title: {
                            font: {
                                weight: 'bold',
                                size: 14,
                            }
                        },
                    }
                }
            }
        },
        plugins: [ChartDataLabels],
    })






})