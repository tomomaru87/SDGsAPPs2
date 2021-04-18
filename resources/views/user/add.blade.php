@extends('layouts.user.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                <form method="POST" action="success" enctype="multipart/form-data" >
                        @csrf

            <input id="name" type="hidden" class="form-control" name="name" value="{{Auth::user()->name}}">

            <input id="email" type="hidden" class="form-control @error('email') is-invalid @enderror" name="email" value="{{Auth::user()->email}}">


                        

                    <hr>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('提出先企業名') }}</label>

                               
                        <select name="company">
                       
                        <option>{{$company}}</option>
                       
                        </select>
                      

                                @error('company')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           
                        </div>

                        <div class="form-group row">
                            <label for="idea_name" class="col-md-4 col-form-label text-md-right">{{ __('アイディア名') }}</label>

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