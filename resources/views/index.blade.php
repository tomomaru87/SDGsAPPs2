@extends('layouts.admin.app')
@section('content')

<div class="container">
@unless (Auth::guard('user')->check())
<a  type = "button" class= "btn btn-outline-success" href="{{ route('user.login') }}">{{ __('ユーザー登録がお済みの方はこちらからログイン') }}</a>

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
            @for($i=0 ; $i < count($Additems);$i++)

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
   <a type="button" class="btn btn-outline-danger"　href="{{ route('user.register') }}">{{ __('アイディアの提出') }}</a>
   @endif

   @elseif(optional(Auth::user())->submission_company == $companyData->name ||$companyData->name == $Additems[$i]->submission_company && Auth::user()->name == $Additems[$i]->name && Auth::user()->email == $Additems[$i]->email)
   <a type="button" class="btn btn-outline-danger"　href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>{{ __('※すでに提出済みです') }}</a>

   @else

   <a type = "button" class= "btn btn-outline-success" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre onclick="event.preventDefault();
document.getElementById('add-form').submit();">
 <form id="add-form" action="user/add" method="POST" style="display: none;">
     @csrf
     <input type="hidden" name="add-company" value="{{$companyData->name}}">
    </form>
   {{ optional(Auth::user())->name }}としてアイディアを追加する</a>
</div>
@endunless
          
            <hr>
            @endfor
            @endforeach
            <!-- ここまで -->
        </div>
@endsection
