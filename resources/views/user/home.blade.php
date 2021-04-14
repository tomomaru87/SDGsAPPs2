@extends('layouts.admin.app')

@section('content')

    <a href="input">募集の開始はこちら</a><br>
    
    <a href="idea/input">アイディアの投稿はこちら</a>

    <h1>内容の確認</h1>
       <div class="container">
     
            @foreach($items as $ideaData)
            @if($ideaData->idea_details==$user->idea_details && $ideaData->idea_name==$user->idea_name && $ideaData->name==$user->name)
<p><a href="<?php print '/ideas/'.$ideaData['id'].'/'.'idea.pdf';?>">補足資料はこちら（PDFファイル）</a></p>
<div class="row">
                <label>提出先起業：<b>{{$ideaData->submission_company}}</b></label>
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
            <hr>
            @endif
            @endforeach
            <!-- ここまで -->
        </div>
      @endsection