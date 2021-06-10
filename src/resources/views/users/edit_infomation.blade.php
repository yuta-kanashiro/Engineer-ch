@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header sunny-morning-gradient mb-3">
                    <h4 class="text-center text-white mt-2">{{ __('個人情報') }}</h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('update_infomation', Auth::id()) }}">
                        @method('PATCH')
                        @csrf

                        <div class="form-group row pb-2">
                            <label for="email" class="mt-2 col-md-4 text-md-right">{{ __('メールアドレス') }}<span class="text-danger">(※)</span></label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autofocus autocomplete="email" value="{{ old('email', $user->email)}}" placeholder="****@mail.com">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row pb-2">
                            <label for="current" class="mt-2 col-md-4 text-md-right">{{ __('現在のパスワード') }}<span class="text-danger">(※)</span></label>
                            <div class="col-md-6">
                                <input id="current" type="password" class="form-control @error('current-password') is-invalid @enderror" name="current-password" required placeholder="半角英数字8文字以上">
                                @error('current-password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row pb-2">
                            <label for="password" class="mt-2 col-md-4 text-md-right">{{ __('新しいパスワード') }}<span class="text-danger">(※)</span></label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('new-password') is-invalid @enderror" name="new-password" required placeholder="半角英数字8文字以上">
                                @error('new-password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row pb-2">
                            <label for="password-confirm" class="mt-2 col-md-4 text-md-right">{{ __('パスワードの確認') }}<span class="text-danger">(※)</span></label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="new-password_confirmation" required placeholder="********">
                            </div>
                        </div>


                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn orange-color text-white rounded-pill">
                                {{ __('変更') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection