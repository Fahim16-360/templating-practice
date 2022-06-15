<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminDasboardController extends Controller
{

    public function index(Request $request){
        return view('admin.dasboard');
    }
    }
