<?php

namespace App\Livewire;

use App\Models\Kandidat;
use App\Models\Misi;
use App\Models\Peserta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Livewire\Component;

class BilikSuara extends Component
{
    public $kandidatSelected = null;
    public $kandidat;
    public $showVisiMisi, $voteModal;
    public $visi, $misis;
    public $curentKandidat, $kandidatList, $vote_status, $vote_at;

    public function mount(){
        $this->kandidatList = Kandidat::all();
        $this->vote_status = Auth::user()->vote_status;
        $this->vote_at = Auth::user()->vote_at;
        $this->misis = Misi::where('kandidat_id', $this->kandidatSelected)->get();

    }

    public function selectKandidat($kandidatId){
        $this->kandidatSelected = $kandidatId;
        $this->kandidat = Kandidat::find($kandidatId);
        if($this->kandidat){
            $this->visi = $this->kandidat->visi;
        }
    }

    function clear(){
        $this->kandidatSelected = null;
    }

    function pilih(){
        if(!$this->kandidatSelected){
            session()->flash('error', 'pilih dulu kandidatnya');
            return;
        }

        $peserta = Peserta::find(Auth::id());

        if(!$peserta){
            session()->flash('error', 'invalid auth');
        }
        
        if($peserta->vote_status == 'sudah'){
            session()->flash('error', 'kamu telah vote');
            return redirect()->route('voteTrue');
        }

        // Mengubah status vote
        $this->vote_status = 'sudah';
        $this->vote_at = now();
        $peserta->update([
            'vote_status' => $this->vote_status,
            'vote_at' => Date::now(),
        ]);

        $kandidate = Kandidat::find($this->kandidatSelected);
        $kandidate->increment('jumlah_vote');
        $kandidate->save();
        
        session()->flash('message', 'Your vote has been recorded successfully!');
        
        redirect()->route('voteTrue');
    }

    function clearVM(){
        $this->clear(['visi', 'misi']);
    }

    public function showVisiMisi($kandidatId){
        $this->kandidat = Kandidat::find($kandidatId);
        $this->visi = $this->kandidat->visi;
    }

    public function render()
    {
        return view('livewire.bilik-suara');
    }
}
