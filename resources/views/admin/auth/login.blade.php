@extends('layouts.admin.common')
@section('title', '管理者ログイン')

@section('content')
    <div class="center-box-inner bg-none login-inner">
        <div class="login">
            <h1>Web検査確認 管理画面</h1>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.login') }}" id="login-form">
                @csrf
                    <div class="form-item">
                        <label for="administrator_id" class="col-md-4 control-label">ID</label>
                        <div class="col-md-6">
                            <input id="administrator_id" type="text" class="form-control" name="administrator_id" value="{{ old('administrator_id') }}" required autofocus>
                            @if ($errors->has('administrator_id'))
                                <span class="help-block">
                                    <strong style="color: red;">{{ $errors->first('administrator_id') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-item">
                        <label for="password">パスワード</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @if ($errors->has('administrator_id'))
                            <span class="help-block">
                                <strong style="color: red;">{{ $errors->first('administrator_id') }}</strong>
                            </span>
                        @endif
                    </div>
                    <button type="submit">{{('ログイン') }}<i class="fas fa-caret-right"></i></button>
                </form>
                <div class="center reset-link"><a href=""></a></div>
                <div class="login-note">
                    <p class="login-note-txt">本システムでは、以下の動作環境の<br class="sp">Webブラウザーの使用を推奨しています。</p>
                    <div class="browser-list">
                        <div>
                            <p class="browser-list-title">Windows</p>
                            <ul>
                                <li>Internet Explorer11</li>
                                <li>Microsoft Edge最新版</li>
                                <li>Mozilla Firefox最新版</li>
                                <li>Google Chrome最新版</li>
                            </ul>
                        </div>
                        <div>
                            <p class="browser-list-title">macOS</p>
                            <ul>
                                <li>Safari最新版</li>
                                <li>Mozilla Firefox最新版</li>
                                <li>Google Chrome最新版</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('layouts.footer')
@endsection