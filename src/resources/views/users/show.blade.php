@extends('layouts.app')

@section('title', 'ユーザープロフィール画面')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card mb-5">
                <div class="card-body row">
                    <div class="col-lg-3 text-center mb-5">
                        @if ($user->profile_image === null)
                            <img class="rounded-circle" src="{{ asset('default.png') }}" alt="プロフィール画像" width="150" height="150">
                        @else
                            <img class="rounded-circle" src="{{ Storage::url($user->profile_image) }}" alt="プロフィール画像" width="150" height="150">
                        @endif
                    </div>
                    <div class="col-lg-8 ml-2">
                        <div class="d-flex">
                            <h5 class="my-3 text-dark font-weight-bold">{{ $user->name }}</h5>
                            @auth
                                @if (Auth::id() === $user->id)
                                    <a href="{{ route('user.edit', Auth::user()) }}" class="btn orange-color text-white ml-auto"> 編集</a>
                                @else
                                    <button class="btn-sm orange-color text-white ml-auto"> フォロー</button>
                                @endif
                            @endauth
                        </div>
                        <div class="d-flex flex-row mt-3">
                            <p class="mr-3 text-muted">年齢：{{ $user->age }}歳</p>
                            <p class="text-muted">在住：{{ $user->prefecture }}</p>
                        </div>
                        <p>{{ $user->introduction }}</p>
                        <div class="d-flex flex-row">
                            <p class="mr-1">2<p class="text-muted mr-2">フォロー</p></p>
                            <p class="mr-1">2<p class="text-muted">フォロワー</p></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="btn-group d-flex justify-content-center mb-4" role="group">
                <button class="btn orange-color text-white" aria-expanded="false" data-toggle="collapse" data-target="#collapse1" aria-controls="collapse1">掲示板を見る</button>
                <button class="btn orange-color text-white" aria-expanded="false" data-toggle="collapse" data-target="#collapse2" aria-controls="collapse2">いいね！を見る</button>
            </div>

            <div class="collapse multi-collapse" id="collapse1">
                <!-- 投稿した掲示板がある場合 -->
                @if (!$bulletins->isEmpty())
                    <h4 class="text-center mb-4">{{ $user->name }}の投稿した掲示板</h4>
                        @foreach($bulletins as $bulletin )
                            @if ($bulletin->limited_id === 1)
                                <div class="card mb-3">
                                    <div class="row mt-2 ml-2">
                                        @if ($user->profile_image === null)
                                            <img class="profile-icon rounded-circle" src="{{ asset('default.png') }}" alt="プロフィール画像" width="30" height="30">
                                        @else
                                            <img class="profile-icon rounded-circle" src="{{ Storage::url($user->profile_image) }}" alt="プロフィール画像" width="30" height="30">
                                        @endif
                                        <small class="mt-1 ml-2 text-muted"><a href="#" class="text-dark">{{ $user->name }}</a>が{{ $bulletin->created_at->format('Y年m月d日') }}に投稿</small>
                                    </div>
                                    <a href="{{ route('bulletin.show', $bulletin) }}" class="card-body">
                                        <div class="row">
                                            <h5 class="ml-2 text-dark font-weight-bold">{{ $bulletin->title }}</h5>
                                        </div>
                                        <div class="row">
                                            <small class="ml-2 text-muted">コメント数 2</small>
                                        </div>
                                    </a>
                                </div>
                            @endif
                        @endforeach
                @else
                    <div class="text-center my-4">
                        <p>投稿した掲示板がありません。</p>
                    </div>
                @endif
            </div>

            <div class="collapse multi-collapse" id="collapse2">
                <!-- いいねした掲示板がある場合 -->
                @if (!$bulletins->isEmpty())
                    <h4 class="text-center mb-4">{{ $user->name }}のいいねした掲示板</h4>
                        @foreach($bulletins as $bulletin )
                            @if ($bulletin->limited_id === 2)
                                <div class="card mb-3">
                                    <div class="row mt-2 ml-2">
                                        @if ($user->profile_image === null)
                                            <img class="profile-icon rounded-circle" src="{{ asset('default.png') }}" alt="プロフィール画像" width="30" height="30">
                                        @else
                                            <img class="profile-icon rounded-circle" src="{{ Storage::url($user->profile_image) }}" alt="プロフィール画像" width="30" height="30">
                                        @endif
                                        <small class="mt-1 ml-2 text-muted"><a href="{{ route('login') }}" class="text-dark">{{ $user->name }}</a>が{{ $bulletin->created_at->format('Y年m月d日') }}に投稿</small>
                                    </div>
                                    <a href="" class="card-body">
                                        <div class="row">
                                            <h5 class="ml-2 text-dark font-weight-bold">{{ $bulletin->title }}</h5>
                                        </div>
                                        <div class="row">
                                            <small class="ml-2 text-muted">コメント数 2</small>
                                        </div>
                                    </a>
                                </div>
                            @endif
                        @endforeach
                @else
                    <div class="text-center my-4">
                        <p>いいねした掲示板がありません。</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection