<?php

namespace App\Livewire;

use App\Models\Peserta;
use Livewire\Component;
use Livewire\WithPagination;

class DataPeserta extends Component
{
    use WithPagination;

    public $kataKunci;
    public $voteStatus, $kelas, $jurusan = '';
    public $name;
    public $nisn;
    public $idPeserta;
    public $sortColumn = 'name';
    public $sortDirection = 'asc';
    public $showDeleteModal = false;

    // Add validation rules as a property for reusability
    protected $rules = [
        'nisn' => 'required|numeric',  // Changed from 'number' to 'numeric'
        'name' => 'required|min:3'
    ];

    protected $messages = [
        'nisn.required' => 'NISN wajib di isi',
        'nisn.numeric' => 'NISN wajib berisi angka',
        'name.required' => 'Nama wajib di isi',
        'name.min' => 'Nama minimal 3 karakter'
    ];

    public function refresh(){
        $this->render();
        $this->clear();
    }

    // Reset validation on input updates
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function openDeleteModal($id)
    {
        $this->idPeserta = $id;
        $this->showDeleteModal = true;
    }

    public function closeModals()
    {
        $this->showDeleteModal = false;
        $this->reset(['name', 'nisn', 'idPeserta']);
    }

    public function update()
    {
        // Validate the input
        $validatedData = $this->validate();

        try {
            // Find and update the Peserta
            $peserta = Peserta::findOrFail($this->idPeserta);
            $peserta->update([
                'name' => $this->name,
                'nisn' => $this->nisn
            ]);

            // Show success message
            session()->flash('message', 'Data berhasil diperbarui!');
            
            // Close modal using JavaScript
            $this->dispatch('closeModal');
            
            // Reset form
            $this->clear();

        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
    
    public function edit($id)
    {
        $data = Peserta::findOrFail($id);
        $this->idPeserta = $id;
        $this->name = $data->name;
        $this->nisn = $data->nisn;
    }

    function clear()
    {
        $this->reset(['name', 'nisn', 'idPeserta', 'voteStatus', 'kelas', 'jurusan', 'kataKunci']);
    }

    public function delete()
    {
        try {
            Peserta::findOrFail($this->idPeserta)->delete();
            session()->flash('message', 'Data berhasil dihapus!');
            $this->closeModals();
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function render()
    {
        $query = Peserta::query()->where('role', 'peserta');
        
        if ($this->kataKunci) {
            $query->where(function($q) {
                $q->where('nisn', 'like', '%'.$this->kataKunci.'%')
                  ->orWhere('name', 'like', '%'.$this->kataKunci.'%');
            });
        }
        if($this->voteStatus){
            $query->where(function($q){
                $q->where('vote_status', $this->voteStatus);
            });
        }
        if($this->kelas){
            $query->where(function($q){
                $q->where('kelas', $this->kelas);
            });
        }
        if($this->jurusan){
            $query->where(function($q){
                $q->where('jurusan', $this->jurusan);
            });
        }

        $dataPeserta = $query->orderBy($this->sortColumn, $this->sortDirection)->paginate(50);

        // dd($dataPeserta);

        return view('livewire.data-peserta', [
            'dataPeserta' => $dataPeserta
        ]);
    }
}