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
use Illuminate\Support\Facades\Auth; 
use App\Http\Requests\Edit;

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
        return view('user.home')->with(['items'=>$items,'user'=>$user]);

    }

    public function edit(){
        $company=Admin::select('name')->get();
        $user = Auth::user();
        $items= User::orderby('created_at','desc')->get();
        return view('user.edit')->with(['items'=>$items,'user'=>$user,'company'=>$company]);
       
    }

    protected function update(Edit $request){

        // Validator::make($request, [
        //     'idea_name'=>'required|string',
        //     'number'=>'required',
        //     'idea_details'=>'required|string',
        //     'budget'=>'required|string',
        //     'target'=>'required|string',
        //     'marketing'=>'required|string',
        //     'pdf' => 'mimes:pdf|nullable'
        // ]);


        User::where('id',$request->id)->update([
            'idea_name'=>$request->idea_name,
            'number'=>$request->number,
            'idea_details'=>$request->idea_details,
            'budget'=>$request->budget,
            'marketing'=>$request->marketing,
            'target'=>$request->target
            
        ]);
        
        
        return view('user.comp');

    }

}