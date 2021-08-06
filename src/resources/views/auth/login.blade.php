@extends('layouts.app')

@section('title', 'ログイン画面')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header sunny-morning-gradient mb-3">
                    <h4 class="text-center text-white mt-2">{{ __('ログイン') }}</h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row pb-2">
                            <label for="email" class="mt-2 col-md-4 text-md-right">{{ __('メールアドレス') }}</label>
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
                            <label for="password" class="mt-2 col-md-4 text-md-right">{{ __('パスワード') }}</label>
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
                            <a href="{{ route('register') }}"><small>{{ __('アカウント登録から始める') }}</small></a>
                        </div>

                        <div class="d-flex justify-content-center mb-3">
                            <button type="submit" class="btn orange-color btn-shadow text-white rounded-pill">
                                {{ __('ログイン') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection