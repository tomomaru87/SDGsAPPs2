<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:user');
    }

    // Guardの認証方法を指定
    protected function guard()
    {
        return Auth::guard('user');
    }

    // 新規登録画面
    public function showRegistrationForm()
    {
        return view('user.auth.register');
    }

    // バリデーション
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'submission_company'=>'required|string',
            'idea_name'=>'required|string',
            'number'=>'required',
            'company_image'=>'nullable|string',
            'idea_details'=>'required|string',
            'budget'=>'required|string',
            'target'=>'required|string',
            'marketing'=>'required|string',
            'make_person'=>'nullable|string',
            'pdf' => 'mimes:pdf'
        ]);
    }

    // 登録処理
    protected function create(array $data)
    {
        return User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
            'submission_company'=>$data['submission_company'],
            'idea_name'=>$data['idea_name'],
            'number'=>$data['number'],
            // 'company_image'=>$data['company_image'],
            'idea_details'=>$data['idea_details'],
            'budget'=>$data['budget'],
            'target'=>$data['target'],
            'marketing'=>$data['marketing'],
            // 'make_person'=>$data['make_person']
            
        ]);
        $ext = $request->input('pdf');
        $pdf=$_FILES['pdf']['name'];
        $contents = $request->input('idea_details');
        $id= User::where('idea_details',$contents)->value('id');
        $path = public_path().'/ideas/'.$id;
        mkdir($path);
        move_uploaded_file($_FILES['pdf']['tmp_name'],$path.'/'.'idea.pdf');
        
        return view('user.home');
    }
}