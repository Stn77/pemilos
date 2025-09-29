<?php
namespace App\Livewire;
use App\Models\Kandidat;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class ChartPemilihan extends Component
{
    public $voteData;
    
    // Tambahkan listener untuk memperbarui chart
    protected $listeners = ['ubahData' => 'loadChartData', 'refreshChart' => '$refresh'];

    public function mount()
    {
        $this->loadChartData();
    }

    public function loadChartData()
    {
        $data = Cache::remember('kandidat_votes', 2, function () {
            return Kandidat::select('name', 'jumlah_vote')->get();
        });

        $this->voteData = [
            'labels' => $data->pluck('name')->toArray(),
            'vote' => $data->pluck('jumlah_vote')->toArray(),
        ];
        
        $this->dispatch('chartDataUpdated');
    }

    public function render()
    {
        return view('livewire.chart-pemilihan');
    }
}