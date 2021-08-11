@extends('layouts.app')

@section('title', '掲示板編集画面')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header sunny-morning-gradient mb-3">
                    <h4 class="text-center text-white mt-2">掲示板編集</h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route( 'bulletin.update', $bulletin->id )}}">
                        @csrf
                        @method('PATCH')

                        <div class="form-group row pb-2">
                            <label for="title" class="mt-2 col-md-3 text-md-center">タイトル</label>
                            <div class="col-md-7">
                                <textarea id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" autocomplete="title" required autofocus>{{ old('title', $bulletin->title)}}</textarea>
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
                                <textarea id="summary" type="text" class="form-control @error('summary') is-invalid @enderror" name="summary" autocomplete="summary" required>{{ old('summary', $bulletin->summary)}}</textarea>
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
                                    @if ($bulletin->limited_key === '限定')
                                        <input type="checkbox" class="custom-control-input" id="limited_key" checked disabled>
                                        <label class="custom-control-label" for="limited_key">
                                            <small class="limited-release ml-2">状態：限定公開（フォロワーだけが閲覧できます）<strong class="text-danger">※変更できません</strong></small>
                                        </label>
                                    @else
                                        <input type="checkbox" class="custom-control-input" id="limited_key" disabled>
                                        <label class="custom-control-label" for="limited_key">
                                            <small class="full-release ml-2">状態：公開（全てのユーザーが閲覧できます）<strong class="text-danger">※変更できません</strong></small>
                                        </label>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn orange-color btn-shadow text-white rounded-pill">
                                編集
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection