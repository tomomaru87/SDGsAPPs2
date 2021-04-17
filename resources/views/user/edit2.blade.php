@extends('layouts.admin.app')

@section('content')


<form method="POST" action="comp2" enctype="multipart/form-data" >
@csrf
                            <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('提出先企業名') }}</label>

                  
                        <p>{{$items->submission_company}}</p>
                      
                              
                        </div>


                        <div class="form-group row">
                            <label for="idea_name" class="col-md-4 col-form-label text-md-right">{{ __('アイディア名') }}</label>

                            <div class="col-md-6">
                                <input id="idea_name" type="text" class="form-control @error('idea_name') is-invalid @enderror" name="idea_name" value="{{$items->idea_name}}" >

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
                                <input id="number" type="text" class="form-control @error('number') is-invalid @enderror" name="number" value="{{$items->number}}" required autocomplete="idea_name">

                                @error('idea_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="idea_name" class="col-md-4 col-form-label text-md-right">{{ __('アイディアの詳細') }}</label>

                            <div class="col-md-6">
                                <textarea id="idea_details" type="text" class="form-control @error('idea_details') is-invalid @enderror" name="idea_details" value="" required autocomplete="idea_name" required autocomplete="idea_name">{{$items->idea_details}}</textarea>

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
                                <input id="budget" type="text" class="form-control @error('idea_name') is-invalid @enderror" name="budget" value="{{$items->budget}}" required autocomplete="budget">

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
                                <textarea id="target" type="text" class="form-control @error('target') is-invalid @enderror" name="target"  required autocomplete="idea_name">{{$items->target}}</textarea>

                                @error('target')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="target" class="col-md-4 col-form-label text-md-right">{{ __('マーケティングプラン') }}</label>

                            <div class="col-md-6">
                                <textarea id="marketing" type="text" class="form-control @error('marketing') is-invalid @enderror" name="marketing" required autocomplete="idea_name">{{$items->marketing}}</textarea>

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

                        <input type="hidden" name="id" value="{{$items->id}}">

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('アイディアの送信') }}
                                </button>
                            </div>
                         

                            </form>

                       
@endsection