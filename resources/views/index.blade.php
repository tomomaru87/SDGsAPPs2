@extends('layouts.user.app')
@section('content')


<div class="img-on-btn">
@unless (Auth::guard('admin')->check()||Auth::guard('user')->check())

    
        <div class="btn-zone"> 
            
        <div class="c-btn">
       <button class="reg" onclick="location.href='{{ route('admin.register') }}'">{{ __('法人登録') }}</button><br>
       
                  
   <button class="log" onclick="location.href='{{ route('admin.login') }}'">{{ __('登録済みの方はログイン') }}</button>
   </div>
                          
                        
                      
                           
             <div class="u-btn">           
   <button class="reg" onclick="location.href='{{ route('user.register') }}'">{{ __('ユーザー登録') }}</button><br>
                    
          <button class="log" onclick="location.href='{{ route('user.login') }}'">{{ __('登録済みの方はログイン') }}</button>
</div>
</div>
                      
                        @endunless




    <img src="other/top.png" class="top-img">


</div>


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
