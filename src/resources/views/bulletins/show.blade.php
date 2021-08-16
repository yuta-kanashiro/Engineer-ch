@extends('layouts.app')

@section('title', 'みんなの掲示板詳細画面')

@section('content')
<!-- コメント表示エリア -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card mb-4">
                <div class="card-header sunny-morning-gradient">
                    <div class="row">
                        @if ($bulletin->limited_key === '限定')
                            <h5 class="font-weight-bold text-white ml-3 mt-4"><i class="fas fa-lock"></i>{{ $bulletin->title }}</h5>
                        @else
                        <h5 class="font-weight-bold text-white ml-3 mt-4">{{ $bulletin->title }}</h5>
                        @endif

                        @auth
                            @if (Auth::id() === $bulletin->user->id)
                                <div class="dropdown ml-auto mr-3">
                                    <a id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="text-white ml-auto">
                                        <i class="fas fa-ellipsis-h"></i>
                                    </a>
                                    <ul class="dropdown-menu bulletin-menu" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item pl-3 py-2" href="{{ route('bulletin.edit', $bulletin) }}"><i class="fas fa-edit" style="padding-right:8px;"></i>編集する</a></li>
                                        <li><a class="dropdown-item pl-3 py-2" href="#"><i class="far fa-trash-alt" style="padding-right:12px;"></i>削除する</a></li>
                                    </ul>
                                </div>
                            @endif
                        @endauth
                    </div>
                    <small class="float-right text-white">最終更新日：{{ $updatedTime }}</small>
                </div>
                <div class="card-body border-bottom row justify-content-center">
                    <div class="col-md-1 mb-2 mr-2">
                        <a href="{{ route('user.show', $bulletin->user) }}" class="icon-hover">
                            @if ($bulletin->user->profile_image === null)
                                <img class="profile-icon rounded-circle" src="{{ asset('default.png') }}" alt="プロフィール画像" width="55" height="55">
                            @else
                                <img class="profile-icon rounded-circle" src="{{ Storage::url($bulletin->user->profile_image) }}" alt="プロフィール画像" width="50" height="50">
                            @endif
                        </a>
                    </div>
                    <div class="col-md-10">
                        <a href="{{ route('user.show', $bulletin->user) }}" class="user-name-hover text-muted">{{ $bulletin->user->name }}</a>
                        <p>{{ $bulletin->summary }}</p>
                    </div>
                </div>
                <div class="card-body">
                    @include('comments.comment')
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    @guest
        <div class="d-flex justify-content-center mb-3">
            <a href="{{ route('login') }}" class="btn orange-color text-white rounded-pill">
                コメントするにはログインしてください
            </a>
        </div>
    @endguest
    <!-- コメント入力エリア -->
    @auth
        <form method="POST" action="{{ route('add', $bulletin->id) }}">
            @csrf

            <div class="comment-container">
                <div class="row justify-content-center">
                    <div class="col-lg-9">
                        <div class="input-group">
                            <textarea class="form-control" id="comment" name="comment" placeholder="コメントを追加" maxlength="200" required></textarea>
                            <button type="submit" class="btn btn-outline-orange" id="send-btn" disabled>送信</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endauth
</div>
@endsection