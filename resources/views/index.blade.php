@extends('layouts.admin.app')

@section('content')

@unless (Auth::guard('user')->check())
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.login') }}">{{ __('ユーザーログイン') }}</a>
                            </li>
                            @if (Route::has('user.register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('user.register') }}">{{ __('ユーザー登録') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('user.logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('ログアウト') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endunless

    <h1>内容の確認</h1>
       <div class="container">
     
            @foreach($items as $companyData)
<img src="<?php print public_path().'/images/'.$companyData['id'].'/'.'logo.png';?>"style="max-width:70%">

            <div class="row">
                <label>会社名：<b>{{$companyData->name}}</b></label>
            </div>
            <div class="row">
                <label>事業内容：<b>{{$companyData->company_contents}}</b></label>
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
    @endsection