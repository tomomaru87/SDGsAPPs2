<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>企業情報入力</title>

        <!-- これはbootstrapのスタイルシートを定義しています。 -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <h1>企業情報入力</h1>
            <form method="post" action="thnks" enctype="multipart/form-data" >
                <!-- 入力フォームはここから -->
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="comment">会社名</label>
                    <input type="text" class="form-control" id="title" name="company_name" 
                           placeholder="ここに会社名を入力してください" value="{{old('company_name')}}"></input>
                </div>

                <div class="form-group">
                    <label for="comment">事業内容</label>
                    <textarea class="form-control" rows="5" id="comment" name="company_contents" 
                              placeholder="御社の事業内容を入力してください">{{old('company_contents')}}</textarea>
                </div>

                <div class="form-group">
                    <label for="comment">担当者名</label>
                    <input type="text" class="form-control" id="title" name="pj_name" 
                           placeholder="担当者名を入力してください" value="{{old('pj_name')}}"></input>
                </div>

                <div class="form-group">
                    <label for="comment">担当者メールアドレス</label>
                    <input type="text" class="form-control" id="title" name="company_mail" 
                           placeholder="メールアドレスを入力してください" value="{{old('company_mail')}}"></input>
                </div>

                <div class="form-group">
                    <label for="comment">パスワード</label>
                    <input type="text" class="form-control" id="title" name="password" 
                           placeholder="パスワードを入力してください" value="{{old('password')}}"></input>
                </div>

                <div class="form-group">
                    <label for="comment">自社のホームページへのリンク</label>
                    <input type="text" class="form-control" id="title" name="link" 
                           placeholder="ホームページのリンクを入力してください。" value="{{old('link')}}"></input>
                </div>

                <div class="form-group">
                    <label for="comment">会社の簡単な沿革</label>
                    <textarea class="form-control" rows="5" id="comment" name="history" 
                              placeholder="1999年→設立、2008年→マザーズ上場">{{old('history')}}</textarea>
                </div>


                <div class="form-group">
                    <label for="comment">メッセージ</label>
                    <textarea class="form-control" rows="5" id="comment" name="msg" 
                              placeholder="アイディアを出す人へのメッセージ">{{old('msg')}}</textarea>
                </div>

                <div class="form-group">
                    <label for="comment">会社のロゴ（HOME画面のサムネイルとして使用されます）</label>
                    <input type="file" class="form-control" id="comment" name="image"  onchange="previewImage(this);"></input>
                </div>
                
                <img id="preview" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" style="max-width:70%;">
                </p>

                @if($errors->any())
                <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
                </ul>
                </div>
                @endif

               
                <input type="submit"  value="送信する" class="btn btn-primary btn-lg" name="contribute" >
                <!-- ここまで -->
            </form>
         
           
            <!-- ここまで -->
        </div>
        <!-- ここにBootstrapで使用するjavascriptファイルを記述します。 -->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>        
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

        <script>
    function previewImage(obj)
{
	var fileReader = new FileReader();
	fileReader.onload = (function() {
		document.getElementById('preview').src = fileReader.result;
	});
	fileReader.readAsDataURL(obj.files[0]);
}

    </script>
    </body>


</html>