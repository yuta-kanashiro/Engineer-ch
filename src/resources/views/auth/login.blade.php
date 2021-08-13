@extends('layouts.app')

@section('title', 'ログイン画面')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header sunny-morning-gradient mb-3">
                    <h4 class="text-center text-white mt-2">ログイン</h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row pb-2">
                            <label for="email" class="mt-2 col-md-4 text-md-right">メールアドレス</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email" value="{{ old('email')}}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row pb-2">
                            <label for="password" class="mt-2 col-md-4 text-md-right">パスワード</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-center mb-3">
                            <div class="form-check">
                                <input id="remember" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember"><small>ログイン状態を保存する</small></label>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center mb-3">
                            <button type="submit" class="btn orange-color btn-shadow text-white rounded-pill">
                                ログイン
                            </button>
                        </div>

                        <div class="d-flex justify-content-center">
                            <small>アカウントをお持ちでないですか？<a href="{{ route('register') }}" class="ml-2" style="font-size:0.9rem;">登録する</a></small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection