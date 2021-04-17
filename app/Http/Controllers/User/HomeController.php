<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Models\User;
use App\Models\Admin;
use App\Models\Company;
use Illuminate\Support\Facades\Auth; 
use App\Http\Requests\Edit;
use App\Http\Requests\Add;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:user');
    }

    public function index(Request $request)
    {   
        $user = Auth::user();
        $items= User::orderby('created_at','desc')->get();
        $Add_items= Company::orderby('created_at','desc')->get();
        return view('user.home')->with(['items'=>$items,'user'=>$user,'Add_items'=>$Add_items]);

    }

    public function edit(Request $request){
  
        $user = Auth::user();
        $items= $request;
        return view('user.edit')->with(['items'=>$items,'user'=>$user]);
       
    }

    public function edit2(Request $request){
  
        $user = Auth::user();
        $items= $request;
      
        return view('user.edit2')->with(['items'=>$items,'user'=>$user]);
       
    }

    protected function update(Edit $request){
        
        User::where('id',$request->id)->update([
            'idea_name'=>$request->idea_name,
            'number'=>$request->number,
            'idea_details'=>$request->idea_details,
            'budget'=>$request->budget,
            'marketing'=>$request->marketing,
            'target'=>$request->target
            
        ]);

       

        $id = $request->id;
        $path = public_path().'/ideas/'.$id;
        move_uploaded_file($_FILES['pdf']['tmp_name'],$path.'/'.'idea.pdf');

        return view('user.comp');

    }



    protected function update2(Edit $request){
        
        Company::where('id',$request->id)->update([
            'idea_name'=>$request->idea_name,
            'number'=>$request->number,
            'idea_details'=>$request->idea_details,
            'budget'=>$request->budget,
            'marketing'=>$request->marketing,
            'target'=>$request->target
            
        ]);

        $id = $request->id;
        $path = public_path().'/ideas/'.$id;
        move_uploaded_file($_FILES['pdf']['tmp_name'],$path.'/'.'idea.pdf');

        return view('user.comp');

        }


    protected function add(){

        //会社情報の送付（選択肢を与えない）
        $company=$_POST['add-company'];
        return view('user.add')->with(['company'=>$company]);
       
    }

    protected function success(Add $request){
    

        Company::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'idea_name'=>$request->idea_name,
            'submission_company'=>$request->submission_company,
            'number'=>$request->number,
            'idea_details'=>$request->idea_details,
            'budget'=>$request->budget,
            'marketing'=>$request->marketing,
            'target'=>$request->target

        ]);

        return view('user.success');
     
       
    }
}