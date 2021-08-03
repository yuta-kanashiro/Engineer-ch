@extends('layouts.app')

@section('title', '掲示板投稿画面')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card">
                <div class="card justify-content-center">
                    <div class="card-header sunny-morning-gradient">
                        <h4 class="text-center text-white mt-2">掲示板投稿</h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('bulletin.store') }}">
                            @csrf

                            <div class="form-group row pb-2">
                                <label for="title" class="mt-2 col-md-3 text-md-center">タイトル</label>
                                <div class="col-md-7">
                                    <!-- <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" required autocomplete="name" autofocus value="{{ old('name')}}" placeholder="山田太郎"> -->
                                    <textarea id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" autocomplete="title" required autofocus>{{ old('title')}}</textarea>
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row pb-2">
                                <label for="summary" class="mt-2 col-md-3 text-md-center">概要</label>
                                <div class="col-md-7">
                                    <!-- <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email" value="{{ old('email')}}" placeholder="****@mail.com"> -->
                                    <textarea id="summary" type="text" class="form-control @error('summary') is-invalid @enderror" name="summary" autocomplete="summary" required>{{ old('summary')}}</textarea>
                                    @error('summary')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="limited_key" class="col-md-3 text-md-center">公開範囲</label>
                                <div class="col-md-7">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="limited_key" name="limited_key">
                                        <label class="custom-control-label" for="limited_key">
                                            <small class="full-release ml-2">公開：全てのユーザーが閲覧できます</small>
                                            <small class="limited-release ml-2" style="display:none;">限定公開：フォロワーだけが閲覧できます</small>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn orange-color btn-shadow text-white rounded-pill">
                                    投稿
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection