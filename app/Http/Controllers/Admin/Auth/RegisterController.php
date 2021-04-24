<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::ADMIN_HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

    public function showRegistrationForm()
    {
        return view('admin.auth.register');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'company_contents'=>['required','string'],
            'link'=>['url','nullable'],
            'msg'=>['required'],
            'pj_name'=>['required'],
            'history'=>['nullable'],
            'image'=>['mimes:jpeg,png,jpg,bmb']

        ]);
    }

    protected function create(array $data)
    {
        //変数に値を格納する。
        $admin= Admin::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
            'company_contents'=>$data['company_contents'],
            'link'=>$data['link'],
            'msg'=>$data['msg'],
            'pj_name'=>$data['pj_name'],
            'timestamp'=>['false']
           
        ]);
        //以下画像のアップロード

      
        $id = $admin->id;
        $path = public_path().'/images/'.$id;
              //ファイルがあったら作る。無ければそのまま上書き
        if(file_exists($path)){

            move_uploaded_file($_FILES['image']['tmp_name'],$path.'/'.'img.png');

            return $admin;
        }

        mkdir($path);
        move_uploaded_file($_FILES['image']['tmp_name'],$path.'/'.'img.png');
        
        return $admin;
           
 

    }
}