<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Idea;

class HomeController extends Controller
{
    
    public function index()
    { $items= Idea::orderby('created_at')->get();
        return view('admin.home')->with(['items'=>$items]);
       
    }

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

}
