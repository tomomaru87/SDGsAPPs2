@extends('layouts.user.app')
@section('content')

@unless (Auth::guard('admin')->check())

                            @if (Route::has('admin.register'))
                                
                                <a class="nav-link" href="{{ route('admin.register') }}">{{ __('法人としてアイディアを募集する') }}</a>
                  
                        @endif
                                <a class="nav-link" href="{{ route('admin.login') }}">{{ __('すでに登録済みの方はこちらからログイン') }}</a>
                          
                        
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    法人ログアウト<span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                       onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                                        {{ __('ログアウト') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endunless
<div class="container">


       <h1 class="display-6 text-center">募集企業一覧</h1>
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
