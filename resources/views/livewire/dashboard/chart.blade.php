<div>
    <div class="bg-white rounded-xl shadow-md p-6 mb-8">
        <h2 class="text-xl font-bold text-gray-800 mb-6">Statistik Kegiatan per Bulan</h2>
        <div class="h-80">
            <canvas id="activityChart" wire:ignore></canvas>
        </div>
    </div>
</div>

@script
<script>
    let chartInstance = null;

    const initChart = () => {
        const ctx = document.getElementById('activityChart');
        if (!ctx) return;

        if (chartInstance) {
            chartInstance.destroy();
        }

        const chartData = @json($chartData);
        const chartLabels = @json($chartLabels);
        
        chartInstance = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: chartLabels,
                datasets: [{
                    label: 'Jumlah Kegiatan',
                    data: chartData,
                    backgroundColor: 'rgba(102, 126, 234, 0.7)',
                    borderColor: 'rgba(102, 126, 234, 1)',
                    borderWidth: 1,
                    borderRadius: 5
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 5
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return 'Kegiatan: ' + context.parsed.y;
                            }
                        }
                    }
                }
            }
        });
    };

    initChart();
</script>
@endscript