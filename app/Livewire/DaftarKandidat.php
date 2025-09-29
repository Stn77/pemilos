<?php

namespace App\Livewire;

use App\Models\Kandidat;
use App\Models\Peserta;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class DaftarKandidat extends Component
{

    use WithFileUploads;

    public $curentKandidat, $kandidatId, $misiEdit;
    public $noKandidat, $name, $visi, $search;
    public $kandidatSelected = null;
    public $showKandidatDetail = false;
    public $showKandidatDelete = false;
    public $showKandidatAdd = false;
    public $shortColumn = 'name';
    public $shortDirection = 'asc';

    #[Validate('image|max:5120')]
    public $image;
    
    // public function mount()
    // {
    //     $this->kandidatList = Kandidat::all();
    //     $this->misisData = Kandidat::with('misi')->get();
    // }
    
    // public function openDataKandidat($kandidatId)
    // {
    //     $this->curentKandidat = DB::table('kandidats')->where('id', $kandidatId)->first();   
    //     $this->kandidatId = $kandidatId;
    //     $this->showKandidatDetail = true;
    //     // dd($this->curentKandidat);
    // } 

    public function deleteModal($id)
    {
        $this->kandidatId = $id;
        $this->showKandidatDelete = true;
    }
    
    public function delete()
    {
        $id = $this->kandidatId;
        $data = Kandidat::find($id);
        Storage::delete($data->foto_kandidat);
        $data->delete();
        $this->clear();
        session()->flash('success', 'data berhasil dihapus');
        $this->closeModals();
    }
    
    public function createKandidat()
    {
        $this->validate();
        Kandidat::create([
            'name' => $this->name,
            'foto_kandidat' => $this->image->store('kandidat','public'),
            'visi' => $this->visi,
            'no_kandidat' => $this->noKandidat
        ]);
        session()->flash('success', 'berhasil menambahkan kandidat');
        $this->closeModals();
    }
    
    public function closeModals()
    {
        $this->showKandidatDetail = false;
        $this->showKandidatDelete = false;
        $this->showKandidatAdd = false;
        $this->clear();
        $this->render();
    }

    public function clear()
    {
        $this->image = '';
        $this->noKandidat = '';
        $this->name = '';
        $this->visi = '';
        $this->kandidatId = '';
    }

    public function addKandidatModal()
    {
        $this->showKandidatAdd = true;
    }

    public function update()
    {
        $this->closeModals();
    }
    
    public function render()
    {
        // $query = Kandidat::query();

        // if($this->search != null)
        // {
        //     $query->where(function($q){
        //         $q->where('name', 'like', '%'.$this->search.'%');
        //     });
        // }

        // $kandidatList = $query->orderBy($this->shortColumn, $this->shortDirection);
        // // dd($kandidatList);
        // return view('livewire.daftar-kandidat', [
        //     'kandidatList' => $kandidatList
        // ]);

        return view('livewire.daftar-kandidat',[
            'kandidatList' => Kandidat::paginate(5),
            'misisData' => Kandidat::with('misi')->get()
        ]);
        
    }
}
