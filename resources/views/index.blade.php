@extends('layouts.user.app')
@section('content')

@unless (Auth::guard('admin')->check())

      @if (Route::has('admin.register'))
                                
       <button class="company-reg" onclick="location.href='{{ route('admin.register') }}'">{{ __('法人登録') }}</button><br>
                  
                       @endif
   <button class="company-login" onclick="location.href='{{ route('admin.login') }}'">{{ __('登録済みの方はログイン') }}</button>
                          
                        
                        @else
            
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
                            
               @endunless

<img src="other/top.png" class="top-img">

<h1 class="heading">ENTRY
<small>アイディア募集中の企業</small>
</h1>
     <div class="company-flex">
     
    
       @foreach($items as $companyData)
       
<div class="company-items">
    <p class="c-name">{{$companyData->name}}</p>
 
  


   @unless (Auth::guard('user')->check())

   @if (Route::has('user.register'))
     <div class="c-detail">
            <img src="<?php print '/images/'.$companyData['id'].'/'.'img.png';?>" alt="会社のロゴ" class="cimg" >

            <div class=mask>
            <p>{{$companyData->msg}}</p>
            <button type="button" class="send-btn" onclick="location.href='{{$companyData->link}}'">企業HPへ</button>
     </div>

   </div>


   <button type="button" class="send-btn" onclick="location.href='{{ route('user.register') }}'">{{ __('ユーザー登録＆アイディアの提出') }}</button>
   @endif

   @else
   <img src="<?php print '/images/'.$companyData['id'].'/'.'img.png';?>" alt="会社のロゴ" class="cimg" onclick="event.preventDefault();
        document.getElementById('add-form').submit();">

<br>
 <form id="add-form" action="user/add" method="POST">
     @csrf
     <input type="hidden" name="add-company" value="{{$companyData->name}}">
     <button type="submit" class="send-btn"> アイディアを追加する</button>
    </form>
    @endunless
          
    
          </div>
          @endforeach
    </div>
  
    <div class="row">
	<div class="col-md-4 offset-md-4">
		{{ $items->links()}}
    </div>
</div>
       
@endsection
