<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function voteTrue(){
        return view('auth.SudahVote');
    }


    
    function votePage(){
        return view('peserta.peserta');
    }
}
