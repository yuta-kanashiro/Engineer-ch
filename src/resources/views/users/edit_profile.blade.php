@extends('layouts.app')

@section('title', 'プロフィール編集画面')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header sunny-morning-gradient mb-3">
                    <h4 class="text-center text-white mt-2">{{ __('プロフィール編集') }}</h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route( 'user.update', Auth::user() )}}" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf

                        <div class="form-group row justify-content-center pb-3">
                            <label for="profile-image" class="col-md-3 text-primary row">
                                @if ($user->profile_image === null)
                                    <img id="icon" class="profile-image rounded-circle mx-auto" src="{{ asset('default.png') }}" alt="プロフィール画像" width="150" height="150">
                                @else
                                    <img id="icon" class="profile-image rounded-circle" src="{{ Storage::url($user->profile_image) }}" alt="プロフィール画像" width="150" height="150">
                                @endif
                                <input id="profile-image" type="file" class="icon-update form-control @error('profile-image') is-invalid @enderror" name="profile_image" value="{{ old('profile_image', $user->profile_image)}}" accept="image/png, image/jpeg" onchange="previewImage(this);">
                            </label>
                            @error('profile-image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <label for="name" class="mt-2 col-md-4 text-md-right">{{ __('ニックネーム') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus value="{{ old('name', $user->name)}}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="introduction" class="mt-2 col-md-4 text-md-right">{{ __('自己紹介') }}</label>
                            <div class="col-md-6">
                                <textarea id="introduction" type="text" class="form-control @error('introduction') is-invalid @enderror" name="introduction" autocomplete="introduction">{{ old('introduction', $user->introduction)}}</textarea>
                                @error('introduction')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row pb-2">
                            <label for="age" class="mt-2 col-md-4 text-md-right">{{ __('年齢') }}</label>
                            <div class="col-md-6">
                                <select id="age" class="form-control @error('age') is-invalid @enderror" name="age" required>
                                    @foreach(config('ages') as $age )
                                        <option value="{{ $age }}" @if(old('age', $user->age) == $age) selected @endif>{{ $age }}</option>
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
                            <label for="prefecture" class="mt-2 col-md-4 text-md-right">{{ __('都道府県') }}</label>
                            <div class="col-md-6">
                                <select id="prefecture" class="form-control @error('prefecture') is-invalid @enderror" name="prefecture" required autocomplete="prefecture">
                                    @foreach(config('prefecturies') as $prefecture)
                                        <option value="{{ $prefecture }}" @if(old('prefecture', $user->prefecture) == $prefecture) selected @endif>{{ $prefecture }}</option>
                                    @endforeach
                                </select>
                                @error('prefecture')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-center mb-3">
                            <a href="{{ route('edit_infomation', Auth::id()) }}"><small>{{ __('メールアドレス、パスワードの変更はこちら') }}</small></a>
                        </div>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn orange-color text-white rounded-pill">
                                {{ __('完了') }}
                            </button>
                        </div>
                    </form>
                    <script>
                        function previewImage(obj)
                        {
                            var fileReader = new FileReader();
                            fileReader.onload = (function() {
                            document.getElementById('icon').src = fileReader.result;
                            });
                            fileReader.readAsDataURL(obj.files[0]);
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection