<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kue;

class KueController extends Controller
{
    public function index()
    {
        $kues = Kue::all();
        return view('kue\index', compact('kues'));
    }

   
    public function show()
{
    $data = \App\Models\Kue::all();
    return view('kue\show', ['data' => $data]);
}
    
}