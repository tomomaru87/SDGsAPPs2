<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Http\Requests\CompanyForm;

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

        $items= company::orderby('id')->get();
       
        return view('index')->with([
            'items'=>$items
            ]);
    }


   

    //画像→フォルダを作成し保存、文章データベースに保存
    public function post(CompanyForm $request){
        //ここでモデルに配列の中身を送付渡す
        Company::create($request->only([
        
        'company_name',
        'company_contents',
        'company_mail',
        'link',
        'msg',
        'password',
        'pj_name',
        'created',
        'history'
        ]));
        

        $contents = $request->input('company_contents');
        $img=$_FILES['image']['name'];
        $id= Company::where('company_contents',$contents)->value('id');
        $path = public_path().'/images/'.$id;
        mkdir($path);
        move_uploaded_file($_FILES['image']['tmp_name'],$path.'/'.'logo.png');


        //送信完了画面に飛ばす
        return redirect('thnks');
    }
}
