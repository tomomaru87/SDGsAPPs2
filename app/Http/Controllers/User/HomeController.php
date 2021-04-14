<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth; 

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:user');
    }

    public function index(Request $request)
    {   
        $user = Auth::user();
        $items= User::orderby('created_at')->get();
        return view('user.home')->with(['items'=>$items,'user'=>$user]);


      
        

    }

}