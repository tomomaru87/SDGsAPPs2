<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;


class HomeController extends Controller
{
    
    public function index()
    { 
        $items= User::orderby('id')->get();
        return view('admin.home')->with(['items'=>$items]);
        
    }

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

}
