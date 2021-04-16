@extends('layouts.admin.app')

@section('content')

<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand"></a>
    <form method="GET" action="home"class="d-flex">
      <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">検索</button>
    </form>
  </div>
</nav>

    <h1 class="text-lg-center">{{$user->name}} 情報管理ページ</h1>
    <h1 class="text-lg-center"></h1>
       <div class="container">

        
            @for($i=0 ; $i < count($items);$i++)
           @if($items[$i]->submission_company==$user->name)
        
<p><a href="<?php print '/ideas/'.$items[$i]->id.'/'.'idea.pdf';?>">補足資料はこちら（PDFファイル）</a></p>

<div class="row">
                <label>アイディア提出者：<b>{{$items[$i]->name}} </b></label>
            </div>
<div class="row">
                <label>提出先会社名：<b>{{$items[$i]->submission_company}} </b></label>
              
            </div>
            <div class="row">
                <label>アイディア名：<b>{{$items[$i]->idea_name}}</b></label>
            </div>
            <div class="row">
                <label>SDGsナンバー：<b>{{$items[$i]->number}}</b></label>
            </div>

          

            <div class="row">
                <label>アイディアの詳細：<b>{{$items[$i]->idea_details}}</b></label>
            </div>

            <div class="row">
                <label>予算：<b>{{$items[$i]->budget}}</b></label>
            </div>

            <div class="row">
            <label>顧客ターゲット：<b>{{$items[$i]->target}}</b></label>
        </div>
          
        <div class="row">
        <label>マーケティングプラン：<b>{{$items[$i]->marketing}}</b></label>
        </div>
<hr>

        @endif
   
        @endfor
       
            </div>
        </div>
        {{$items->links()}}
      @endsection