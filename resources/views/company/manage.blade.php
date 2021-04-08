<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>掲示板システム</title>

        <!-- これはbootstrapのスタイルシートを定義しています。 -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    </head>
    <body>

    <a href="input">募集の開始はこちら</a><br>
    
    <a href="idea/input">アイディアの投稿はこちら</a>

    <h1>内容の確認</h1>
       <div class="container">
     
            @foreach($items as $ideaData)
<p><a href="<?php print '/ideas/'.$ideaData['id'].'/'.'idea.pdf';?>">補足資料はこちら</a></p>

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
        <!-- ここにBootstrapで使用するjavascriptファイルを記述します。 -->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>        
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    </body>
</html>