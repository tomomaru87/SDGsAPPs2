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
    $search = $request->input('search');
     // dd($request);
    $item = DB::table('ideas');

    if($search !== null){
        //全角スペースを半角にする
        $search_split = mb_convert_kana($search,'s');

        //空白で区切る
        $search_split2 = preg_split('/[\s]+/',$search_split,-1,PREG_SPLIT_NO_EMPTY);

        //単語をループで回す
        foreach($search_split2 as $value){
            $item->where('name','like','%'.$value.'%')
            ->orWhere('company','like','%'.$value.'%')
            ->orWhere('idea_name','like','%'.$value.'%')
            ->orWhere('number','like','%'.$value.'%')
            ->orWhere('idea_details','like','%'.$value.'%')
            ->orWhere('budget','like','%'.$value.'%')
            ->orWhere('target','like','%'.$value.'%')
            ->orWhere('marketing','like','%'.$value.'%');
        

        }
    }
  
     $item->select('id','name','company','idea_name','number','idea_details','budget','target','marketing','created_at');
     //順番の入れ替え↓
    $item->orderBy('created_at','asc');
    //１ページあたりの表示件数
    $items = $item->paginate(10);


     $user = Auth::user();

    return view('admin.home')->with(['items'=>$items,'user'=>$user]);
        
    }

    public function __construct()
    {
        $this->middleware('auth:admin');
    }



}
