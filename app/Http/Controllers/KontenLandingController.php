<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KontenLandingController extends Controller
{
    public function stafView(){
        return view('admin.stafKami');
    }
    public function produckView(){
        return view('admin.produck');
    }
    public function blogView(){
        return view('admin.blog');    
    }
    public function sosmedView(){
        return view('admin.sosmed');
    }
}
