@extends('layouts.user.app')
@section('content')

<div class="container">
@unless (Auth::guard('user')->check())

<button type="button"class="btn-info text-center w-25">
     <a class="font-weight-bold text-center" href="{{ route('user.login') }}">{{ __('ユーザーログイン') }}</a>
 </button>
 @if (Route::has('user.register'))
 <button type="button"class="btn-info text-center w-25">
                                 <a class="font-weight-bold text-center" href="{{ route('user.register') }}">{{ __('ユーザー登録') }}</a>
                                </button>
                            @endif
        @else
        <a  type = "button" class= "btn btn-outline-success" href="{{ route('user.login') }}">{{ __('ユーザー管理ページへ') }}</a>

            <a type = "button" class= "btn btn-outline-success" href="{{ route('user.logout') }}" onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">{{ __('ログアウト') }}</a>
            <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
     @csrf
    </form>
    @endunless
                    
      
       <h1 class="display-6">募集企業一覧</h1>
            @foreach($items as $companyData)
       

            <div class="card">
  <div class="card-body">
    <p class="card-text">{{$companyData->name}}</p>
  </div>
  
  <img src="<?php print '/images/'.$companyData['id'].'/'.'img.png';?>" alt="Card image">

  <div class="card-body">
   <label>事業内容<p class="card-text">{{$companyData->company_contents}}</p></label><br>
   <label>HPへのリンク<p class="card-text">{{$companyData->link}}</p></label><br>
   <label>提出者へのメッセージ<p class="card-text">{{$companyData->msg}}</p></label><br>

   @unless (Auth::guard('user')->check())

   @if (Route::has('user.register'))
   <a type="button" class="btn btn-outline-danger"　href="{{ route('user.register') }}">{{ __('ユーザー登録後、アイディアの提出を実施してください') }}</a>
   @endif

   @else


 <form id="add-form" action="user/add" method="POST">
     @csrf
     <input type="hidden" name="add-company" value="{{$companyData->name}}">
     <button type="submit" class="btn btn-success"> {{ optional(Auth::user())->name }}としてアイディアを追加する</button>
    </form>
 
</div>
@endunless
          
            <hr>
            </div>
           
            @endforeach
            <!-- ここまで -->
       
@endsection
