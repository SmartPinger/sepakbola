<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class klasemenController extends Controller
{
    public function index()
    {
        $namaklub = DB::table('namaklub')->get();

        return view('index',['namaklub' => $namaklub]);
    }
}