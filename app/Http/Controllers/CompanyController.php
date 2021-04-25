<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CompanyForm;
use App\Models\Admin;
use App\Models\Idea;
use Illuminate\Support\Facades\Auth; 

class CompanyController extends Controller
{

    //会社情報入力画面の表示
    public function index()
    {
        return view('company.input');
    }

//サンクスページの表示
    public function thnks(){
        return view('company.thnks');
    }



    public function add(){
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
