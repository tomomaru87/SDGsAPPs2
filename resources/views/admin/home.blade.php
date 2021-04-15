@extends('layouts.admin.app')

@section('content')

<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand">Navbar</a>
    <form method="GET" action="home"class="d-flex">
      <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">検索</button>
    </form>
  </div>
</nav>

    <h1 class="text-lg-center">{{$user->name}} 情報管理ページ</h1>
    <h1 class="text-lg-center"></h1>
       <div class="container">

            @foreach($items as $ideaData)
            
           @if($ideaData->submission_company==$user->name)
        
<p><a href="<?php print '/ideas/'.$ideaData['id'].'/'.'idea.pdf';?>">補足資料はこちら（PDFファイル）</a></p>

<div class="row">
                <label>アイディア提出者：<b>{{$ideaData->name}} </b></label>
              
            </div>
<div class="row">
                <label>提出先会社名：<b>{{$ideaData->submission_company}} </b></label>
              
            </div>
            <div class="row">
                <label>アイディア名：<b>{{$ideaData->idea_name}}</b></label>
            </div>
            <div class="row">
                <label>SDGsナンバー：<b>{{$ideaData->number}}</b></label>
            </div>

          

            <div class="row">
                <label>アイディアの詳細：<b>{{$ideaData->idea_details}}</b></label>
            </div>

            <div class="row">
                <label>予算：<b>{{$ideaData->budget}}</b></label>
            </div>

            <div class="row">
            <label>顧客ターゲット：<b>{{$ideaData->target}}</b></label>
        </div>
          
        <div class="row">
        <label>マーケティングプラン：<b>{{$ideaData->marketing}}</b></label>
        </div>

        <div class="row">
        <label>事業化に必要な人材スキル：<b>{{$ideaData->make_person}}</b></label>
        </div>
            @else
            <h2>まだ提出アイディアはありません。</h2>
        @endif
            @endforeach
            <!-- ここまで -->
        </div>
        {{$items->links()}}
      @endsection