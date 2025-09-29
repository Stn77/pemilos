{{-- // resources/views/livewire/chart-pemilihan.blade.php --}}
<div wire:pool wire:ignore class="container bg-body">
    <div class="polarArea w-[50%]">
        <canvas id="myChart" class="w-60"></canvas>
    </div>
</div>
@assets
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endassets
{{-- @push('scripts') --}}
@script
<script>
    const ctx = document.getElementById('myChart');
    const dataT = $wire.voteData;
    console.log(dataT);

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: dataT.labels,
            datasets: [{
                label: '# of Votes',
                data: dataT.vote,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    // Initialize chart saat halaman dimuat
    document.addEventListener('DOMContentLoaded', () => {
        initializeChart();
    });
    
    // Listen untuk event update data
    $wire.on('chartDataUpdated', () => {
        initializeChart();
    });
</script>
@endscript