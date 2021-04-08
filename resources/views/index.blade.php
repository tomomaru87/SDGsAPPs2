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
     
            @foreach($items as $companyData)
<img src="<?php print '/images/'.$companyData['id'].'/'.'logo.png';?>"style="max-width:70%">

            <div class="row">
                <label>会社名：<b>{{$companyData->company_name}}</b></label>
            </div>
            <div class="row">
                <label>事業内容：<b>{{$companyData->company_contents}}</b></label>
            </div>

            <div class="row">
                <label>会社の歴史：<b>{{$companyData->history}}</b></label>
            </div>

            <div class="row">
                <label>HPへのリンク：<b>{{$companyData->link}}</b></label>
            </div>

            <div class="row">
                <label>メッセージ：<b>{{$companyData->msg}}</b></label>
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