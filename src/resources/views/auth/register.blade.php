@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center mt-2">{{ __('新規登録') }}</h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <p class="col-md-12 text-center"><span class="text-danger">(※)</span>は入力必須項目です。</p>
                            </div>

                            <div class="form-group row pb-2">
                                <label for="name" class="mt-2 col-md-4 text-md-right">{{ __('ニックネーム') }}<span class="text-danger">(※)</span></label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus value="{{ old('name')}}" placeholder="山田太郎">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row pb-2">
                                <label for="email" class="mt-2 col-md-4 text-md-right">{{ __('メールアドレス') }}<span class="text-danger">(※)</span></label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email" value="{{ old('email')}}" placeholder="****@mail.com">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row pb-2">
                                <label for="age" class="mt-2 col-md-4 text-md-right">{{ __('年齢') }}<span class="text-danger">(※)</span></label>
                                <div class="col-md-6">
                                    <select id="age" class="form-control @error('age') is-invalid @enderror" name="age" required>
                                        <option value='' disabled selected style='display:none;'>選択してください</option>
                                        @foreach(config('ages') as $age )
                                            <option value="{{ $age }}" @if(old('age') == $age) selected @endif>{{ $age }}</option>
                                        @endforeach
                                    </select>
                                    @error('age')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row pb-2">
                                <label for="prefecture" class="mt-2 col-md-4 text-md-right">{{ __('都道府県') }}<span class="text-danger">(※)</span></label>
                                <div class="col-md-6">
                                    <select id="prefecture" class="form-control @error('prefecture') is-invalid @enderror" name="prefecture" required autocomplete="prefecture">
                                        <option value='' disabled selected style='display:none;'>選択してください</option>
                                        @foreach(config('prefecturies') as $prefecture)
                                            <option value="{{ $prefecture }}" @if(old('prefecture') == $prefecture) selected @endif>{{ $prefecture }}</option>
                                        @endforeach
                                    </select>
                                    @error('prefecture')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row pb-2">
                                <label for="password" class="mt-2 col-md-4 text-md-right">{{ __('パスワード') }}<span class="text-danger">(※)</span></label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="半角英数字8文字以上">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row pb-2">
                                <label for="password" class="mt-2 col-md-4 text-md-right">{{ __('パスワード確認') }}<span class="text-danger">(※)</span></label>
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="********">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-5 offset-md-5">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('登録') }}
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