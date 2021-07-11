@extends('layouts.app')

@section('title', 'みんなの掲示板詳細画面')

@section('content')
<!-- コメント表示エリア -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card mb-4">
                <div class="card-header bg-white">
                    <h5 class="font-weight-bold mt-4">{{ $bulletin->title }}</h5>
                    <small class="float-right text-muted">最終更新日：{{ $updatedTime }}</small>
                </div>
                <div class="card-body border-bottom row justify-content-center">
                    <div class="col-md-1 mb-2 mr-2">
                        <a href="{{ route('user.show', $bulletin->user) }}">
                            @if ($bulletin->user->profile_image === null)
                                <img class="profile-icon rounded-circle" src="{{ asset('default.png') }}" alt="プロフィール画像" width="55" height="55">
                            @else
                                <img class="profile-icon rounded-circle" src="{{ Storage::url($bulletin->user->profile_image) }}" alt="プロフィール画像" width="50" height="50">
                            @endif
                        </a>
                    </div>
                    <div class="col-md-10">
                        <a href="{{ route('user.show', $bulletin->user) }}" class="text-muted">{{ $bulletin->user->name }}</a>
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
                            <textarea class="form-control" id="comment" placeholder="コメントを追加" maxlength="200" required></textarea>
                            <button type="submit" class="btn btn-outline-orange" id="send-btn" disabled>送信</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endauth
</div>
@endsection