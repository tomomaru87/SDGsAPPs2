@extends('layouts.admin.app')

@section('content')

   

    <h1 class="text-lg-center">法人様管理画面</h1>
       <div class="container">
     
            @foreach($items as $ideaData)
<p><a href="<?php print '/ideas/'.$ideaData['id'].'/'.'idea.pdf';?>">補足資料はこちら（PDFファイル）</a></p>

            <div class="row">
                <label>アイディア名：<b>{{$ideaData->idea_name}}</b></label>
            </div>
            <div class="row">
                <label>SDGsナンバー：<b>{{$ideaData->number}}</b></label>
            </div>

            <div class="row">
                <label>会社に対するイメージ：<b>{{$ideaData->company_image}}</b></label>
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
            @endforeach
            <!-- ここまで -->
        </div>
      @endsection