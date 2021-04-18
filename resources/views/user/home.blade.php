@extends('layouts.user.app')

@section('content')

       <div class="container">
       <h1>自分が提出したアイディアの確認</h1>
       <hr>
     
         @foreach($Add_items as $Addidea)
      
         @if($user->name == $Addidea->name && $user->email == $Addidea->email )

          

            <div class="row">
                <label>提出先起業：<b>{{$Addidea->company}}</b></label>
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

        <p class="row"><a href="<?php print '/Addideas/'.$Addidea->id.'/'.'idea.pdf';?>">補足資料はこちら（PDFファイル）</a></p>

        <!--見えないように編集ページに情報の送付-->
        <form method="post" action="edit">
        @csrf
        <input type="hidden" name="id" value="{{$Addidea->id}}">
        <input type="hidden" name="name" value="{{$Addidea->name}}">
        <input type="hidden" name="email" value="{{$Addidea->email}}">
        <input type="hidden" name="idea_name" value="{{$Addidea->idea_name}}">
        <input type="hidden" name="number" value="{{$Addidea->number}}">
        <input type="hidden" name="company" value="{{$Addidea->company}}">
        <input type="hidden" name="idea_details" value="{{$Addidea->idea_details}}">
        <input type="hidden" name="budget" value="{{$Addidea->budget}}">
        <input type="hidden" name="target" value="{{$Addidea->target}}">
        <input type="hidden" name="marketing" value="{{$Addidea->marketing}}">

        <button type="submit" class="btn btn-primary">
                                    {{ __('アイディアの編集') }}
                                </button>

                                </form>
                                <br>

        <form method="post" action="destroy" id="delete_{{$Addidea->id}}">
        @csrf
        <input type="hidden" name="id" value="{{$Addidea->id}}">
        <input type="hidden" name="name" value="{{$Addidea->name}}">
        <input type="hidden" name="email" value="{{$Addidea->email}}">
        <input type="hidden" name="idea_name" value="{{$Addidea->idea_name}}">
        <input type="hidden" name="number" value="{{$Addidea->number}}">
        <input type="hidden" name="company" value="{{$Addidea->company}}">
        <input type="hidden" name="idea_details" value="{{$Addidea->idea_details}}">
        <input type="hidden" name="budget" value="{{$Addidea->budget}}">
        <input type="hidden" name="target" value="{{$Addidea->target}}">
        <input type="hidden" name="marketing" value="{{$Addidea->marketing}}">

        <a type="submit" class="btn btn-danger" data-id="{{$Addidea->id}}" onclick="deletePost(this);">
                                    {{ __('アイディアの削除') }}
                                </a>

                                </form>
            <hr>
            @endif
            @endforeach
           

            <!-- ここまで -->
        </div>

        <script>

        function deletePost(e){
            'use strict';
            if(confirm('本当に削除していいですか？')){
                document.getElementById('delete_'+e.dataset.id).submit();
            }
        }

        </script>
      @endsection