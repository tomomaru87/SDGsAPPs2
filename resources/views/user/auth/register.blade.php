@extends('layouts.user.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user.register') }}" enctype="multipart/form-data" >
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('氏名') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('メールアドレス') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('パスワード') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('確認用') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                    <hr>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('提出先企業名') }}</label>

                            <div class="col-md-6">
                                <input id="submission_company" type="text" class="form-control @error('submission_company') is-invalid @enderror" name="submission_company" value="{{ old('submission_company') }}" required autocomplete="submission_company">

                                @error('submission_company')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('アイディア名') }}</label>

                            <div class="col-md-6">
                                <input id="idea_name" type="text" class="form-control @error('idea_name') is-invalid @enderror" name="idea_name" value="{{ old('idea_name') }}" required autocomplete="idea_name">

                                @error('idea_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="number" class="col-md-4 col-form-label text-md-right">{{ __('SDGsナンバー') }}</label>

                            <div class="col-md-6">
                                <input id="number" type="text" class="form-control @error('number') is-invalid @enderror" name="number" value="{{ old('number') }}" required autocomplete="number">

                                @error('number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="idea_details" class="col-md-4 col-form-label text-md-right">{{ __('アイディアの詳細') }}</label>

                            <div class="col-md-6">
                                <input id="idea_details" type="text" class="form-control @error('idea_details') is-invalid @enderror" name="idea_details" value="{{ old('idea_details') }}" required autocomplete="idea_details">

                                @error('idea_details')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="budget" class="col-md-4 col-form-label text-md-right">{{ __('予算') }}</label>

                            <div class="col-md-6">
                                <input id="budget" type="text" class="form-control @error('budget') is-invalid @enderror" name="budget" value="{{ old('budget') }}" required autocomplete="budget">

                                @error('budget')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="target" class="col-md-4 col-form-label text-md-right">{{ __('顧客ターゲット') }}</label>

                            <div class="col-md-6">
                                <input id="target" type="text" class="form-control @error('target') is-invalid @enderror" name="target" value="{{ old('target') }}" required autocomplete="target">

                                @error('target')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="marketing" class="col-md-4 col-form-label text-md-right">{{ __('マーケティング戦略') }}</label>

                            <div class="col-md-6">
                                <input id="marketing" type="text" class="form-control @error('marketing') is-invalid @enderror" name="marketing" value="{{ old('marketing') }}" required autocomplete="marketing">

                                @error('marketing')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                    <label for="comment">その他補足資料(PDFのみ対応)</label>
                    <input type="file" class="form-control" id="pdf" name="pdf" accept=".pdf"></input>
                    @error('pdf')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('アイディアの送信') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection