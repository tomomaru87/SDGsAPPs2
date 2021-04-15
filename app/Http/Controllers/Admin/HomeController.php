<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\DB; 




class HomeController extends Controller
{
    
    public function index(Request $request)
    {   
    //検索フォーム用
    $search = $request->input('Search');
    // dd($request);
    $item = DB::table('users');

    if($search!== null){
        //全角スペースを半角にする
        $search_split = mb_convert_kana($search,'s');

        //空白で区切る
        $search_split2 = preg_split('/[\s]+/',-1,PREG_SPLIT_NO_EMPTY);

        //単語をループで回す
        foreach($search_split2 as $value){
            $item->where(['name',
            'submission_company',
            'idea_name',
            'number',
            'idea_details',
            'budget',
            'target',
            'marketing'
        ],'like','%'.$value.'%');

        }
    }
   
     $item->select('id','name','submission_company','idea_name','number','idea_details','budget','target','marketing','created_at');
     //順番の入れ替え↓
    $item->orderBy('created_at','asc');
    //１ページあたりの表示件数
    $items = $item->paginate(10);


     $user = Auth::user();
    
    // ddd($items,$user);


    // $items= User::orderby('id')->get();
    return view('admin.home',compact('items','user'));
        
    }

    public function __construct()
    {
        $this->middleware('auth:admin');
    }



}
