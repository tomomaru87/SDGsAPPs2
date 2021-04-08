<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Idea;
use App\Http\Requests\IdeaForm;

class IdeaController extends Controller
{
    public function index(){
        return view('idea.input');
    }
    public function thnks(){
        return view ('idea.thnks');
    }

    public function add(){
        //TableSelect::orderby — select 文のソート条件を設定する
        $items= Idea::orderby('created_at')->get();
        return view('admin.home')->with(['items'=>$items]);
    }


    public function post(IdeaForm $request){
        //ここでモデルに配列の中身を送付（tinker）と一緒
        Idea::create($request->only([
        'submission_company',
        'idea_name',
        'number',
        'company_image',
        'idea_details',
        'budget',
        'target',
        'marketing',
        'make_person'
           
            ]));

            //pdfのバリデーションと保存処理
         $ext = $request->input('pdf');
         $pdf=$_FILES['pdf']['name'];
         $contents = $request->input('idea_details');
         $id= Idea::where('idea_details',$contents)->value('id');
         $path = public_path().'/ideas/'.$id;
         mkdir($path);
         move_uploaded_file($_FILES['pdf']['tmp_name'],$path.'/'.'idea.pdf');
         
    
    

        return redirect('idea/thnks');
    }
}
