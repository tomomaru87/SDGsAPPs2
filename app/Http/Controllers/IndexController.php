<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use App\Models\Idea;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\DB; 

class IndexController extends Controller
{

  

    public function index(){
        //TableSelect::orderby — select 文のソート条件を設定する
        $user = Auth::user();
        $items= Admin::orderby('id')->paginate(9);
        $Additems= Idea::orderby('created_at','desc')->get();
       return view('index')->with([
            'items'=>$items,
            'user'=>$user,
            'Additems'=>$Additems
                        ]);
    }


}
