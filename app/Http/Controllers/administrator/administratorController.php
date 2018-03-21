<?php

namespace App\Http\Controllers\administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class administratorController extends Controller
{
    // public function _construct(){
    //     $this->middleware('auth');
    // }
    public function getAdmin() {
        return view('administrator.indexAdmin');
    }
}
