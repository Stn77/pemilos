<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use App\Models\Misi;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function dashboardAdminPeserta(){
        return view('admin.AdmDashPeserta');
    }

    function dashboardAdminKandidat(){
        return view('admin.AdmDashKandidat');
    }

    public function editKandidat($id)
    {
        try{
            $data = Kandidat::findOrFail($id);
        }catch(\Exception $e){
            return redirect()->back()->with('notfund','Data kandidat tidak ditemukan'.$e->getMessage());
        }
        return view('admin.AdmDashEditKandidat', compact('data'));
    }

    public function updateKandidat(Request $request, $id)
    {
        try{
            $kandidat = kandidat::findOrFail($id);
            $kandidat->update([
                'name' => $request->name,
                'visi' => $request->visi,
            ]);
        }catch (\Exception $e){
            return redirect()->back()->with('notfund','Data kandidat tidak ditemukan'.$e->getMessage());
        }
    }

    function dashboardAdminChartPemilihan(){
        return view('admin.AdmDashChart');
    }
    
    function dashboardAdmin(){
        return view('admin.AdminDasboard');
    }
}
