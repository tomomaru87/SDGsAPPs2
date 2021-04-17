@extends('layouts.admin.app')

@section('content')


    <a href="input">募集の開始はこちら</a><br>
    
    <a href="idea/input">アイディアの投稿はこちら</a>

    <h1>内容の確認</h1>
       <div class="container">
     
            @foreach($items as $ideaData)
            @if($user == $ideaData )
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

        <form method="post" action="edit">
        @csrf
        <input type="hidden" name="id" value="{{$ideaData->id}}">
        <input type="hidden" name="name" value="{{$ideaData->name}}">
        <input type="hidden" name="email" value="{{$ideaData->email}}">
        <input type="hidden" name="idea_name" value="{{$ideaData->idea_name}}">
        <input type="hidden" name="number" value="{{$ideaData->number}}">
        <input type="hidden" name="submission_company" value="{{$ideaData->submission_company}}">
        <input type="hidden" name="idea_details" value="{{$ideaData->idea_details}}">
        <input type="hidden" name="budget" value="{{$ideaData->budget}}">
        <input type="hidden" name="target" value="{{$ideaData->target}}">
        <input type="hidden" name="marketing" value="{{$ideaData->marketing}}">
        <button type="submit" class="btn btn-primary">
                      {{ __('アイディアの編集はこちら') }}
                     </button>
                    </form>

       
            <hr>
            @endif
            @endforeach

            <!--ここから追加したアイディア情報の取得-->

         @foreach($Add_items as $Addidea)
        <!--追加で提出したアイディアの名前とメールアドレスを現在ログインしているアカウントと照合し二つの条件がTrueならアイディアの表示-->
         @if($user->name == $Addidea->name && $user->email == $Addidea->email )

            <p><a href="<?php print '/ideas/'.$ideaData['id'].'/'.'idea.pdf';?>">補足資料はこちら（PDFファイル）</a></p>

            <div class="row">
                <label>提出先起業：<b>{{$Addidea->submission_company}}</b></label>
            </div>

            <div class="row">
                <label>アイディア名：<b>{{$Addidea->idea_name}}</b></label>
            </div>

            <div class="row">
                <label>SDGsナンバー：<b>{{$Addidea->number}}</b></label>
            </div>

            <div class="row">
                <label>アイディアの詳細：<b>{{$Addidea->idea_details}}</b></label>
            </div>

            <div class="row">
                <label>予算：<b>{{$Addidea->budget}}</b></label>
            </div>

            <div class="row">
            <label>顧客ターゲット：<b>{{$Addidea->target}}</b></label>
        </div>
          
        <div class="row">
        <label>マーケティングプラン：<b>{{$Addidea->marketing}}</b></label>
        </div>

        <!--見えないように編集ページに情報の送付-->
        <form method="post" action="edit2">
        @csrf
        <input type="hidden" name="id" value="{{$Addidea->id}}">
        <input type="hidden" name="name" value="{{$Addidea->name}}">
        <input type="hidden" name="email" value="{{$Addidea->email}}">
        <input type="hidden" name="idea_name" value="{{$Addidea->idea_name}}">
        <input type="hidden" name="number" value="{{$Addidea->number}}">
        <input type="hidden" name="submission_company" value="{{$Addidea->submission_company}}">
        <input type="hidden" name="idea_details" value="{{$Addidea->idea_details}}">
        <input type="hidden" name="budget" value="{{$Addidea->budget}}">
        <input type="hidden" name="target" value="{{$Addidea->target}}">
        <input type="hidden" name="marketing" value="{{$Addidea->marketing}}">

        <button type="submit" class="btn btn-primary">
                                    {{ __('アイディアの編集はこちら') }}
                                </button>

                                </form>
            <hr>
            @endif
            @endforeach
           

            <!-- ここまで -->
        </div>
      @endsection