<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Auth; 




class HomeController extends Controller
{
    
    public function index()
    {   
        $user = Auth::user();

        $items= User::orderby('id')->get();
        return view('admin.home')->with(['items'=>$items,'user'=>$user]);
        
    }

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

}
