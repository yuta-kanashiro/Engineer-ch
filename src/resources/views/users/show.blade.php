@extends('layouts.app')

@section('title', 'ユーザープロフィール画面')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card mb-4">
                <div class="card-body row">
                    <div class="col-lg-3 text-center my-2">
                        @if ($user->profile_image === null)
                            <img class="rounded-circle" src="{{ asset('default.png') }}" alt="プロフィール画像" width="140" height="140">
                        @else
                            <img class="rounded-circle" src="{{ Storage::url($user->profile_image) }}" alt="プロフィール画像" width="140" height="140">
                        @endif
                    </div>
                    <div class="col-lg-8 ml-2">
                        <div class="d-flex">
                            <h4 class="my-3 text-dark font-weight-bold">{{ $user->name }}</h4>
                            @auth
                                @if (Auth::id() === $user->id)
                                    <a href="{{ route('user.edit', Auth::user()) }}" class="btn btn-shadow orange-color rounded-pill text-white ml-auto">編集</a>
                                @else

                                    @include('follow.follow_button')

                                @endif
                            @endauth
                        </div>
                        <div class="d-flex">
                            @auth
                                @if (Auth::id() != $user->id)
                                    @if ($user->isFollowing(Auth::id()))
                                        <small class="bg-light text-muted">フォローされています</small>
                                    @endif
                                @endif
                            @endauth
                        </div>
                        <div class="d-flex flex-row mt-3">
                            <p class="mr-3 text-muted">年齢：{{ $user->age }}歳</p>
                            <p class="text-muted">在住：{{ $user->prefecture }}</p>
                        </div>
                        <p>{{ $user->introduction }}</p>
                        <div class="d-flex flex-row">
                            @if($user->countFollowings() === 0)
                                <p class="text-muted">{{ $user->countFollowings() }}<small class="text-muted mr-2 ml-1">フォロー中</small></p>
                            @else
                                <a href="{{ route('follow_list', $user->id) }}">
                                    <p class="text-dark">{{ $user->countFollowings() }}<small class="text-muted mr-2 ml-1">フォロー中</small></p>
                                </a>
                            @endif

                            @if($user->countFollowers() === 0)
                                <p class="text-muted">{{ $user->countFollowers() }}<small class="text-muted ml-1">フォロワー</small></p>
                            @else
                                <a href="{{ route('follow_list', $user->id) }}">
                                    <p class="text-dark">{{ $user->countFollowers() }}<small class="text-muted ml-1">フォロワー</small></p>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            @guest
                <div class="d-flex justify-content-center">
                    <a href="{{ route('login') }}" class="btn orange-color text-white rounded-pill">
                        このユーザーの掲示板を見るにはログインしてください
                    </a>
                </div>
            @endguest
            @auth

                <div class="btn-group d-flex justify-content-center mb-4" role="group">
                    <a class="btn btn-bulletin">掲示板を見る</a>
                    <a class="btn btn-like">いいねを見る</a>
                </div>

                <div class="bulletin">
                    <!-- 投稿した掲示板がある場合 -->
                    @if (!$bulletins->isEmpty())
                        <h4 class="text-center mb-4">{{ $user->name }}の投稿した掲示板</h4>
                        <!-- ユーザーがログイン中のユーザー、もしくはログイン中のユーザーがフォローしているユーザーの場合 -->
                        @if (Auth::user()->isFollowing($user->id) || $user == Auth::user())
                            @foreach ($bulletins as $bulletin)

                                @include('users.user_bulletins')

                            @endforeach
                        @else
                            @foreach ($bulletins as $bulletin)
                                @if ($bulletin->limited_key === null)

                                    @include('users.user_bulletins')

                                @endif
                            @endforeach
                        @endif
                    @else
                        <div class="text-center my-4">
                            <p>投稿した掲示板がありません。</p>
                        </div>
                    @endif
                </div>

                <div class="like" style="display:none;">
                    <!-- いいねした掲示板がある場合 -->
                    @if (!$likes->isEmpty())
                        <h4 class="text-center mb-4">{{ $user->name }}のいいねした掲示板</h4>
                        @foreach ($likes as $like)
                            @if (Auth::user()->isFollowing($like->user->id) || $like->user == Auth::user())
                                @include('users.user_likes')
                            @else
                                @if ($like->limited_key === null)

                                    @include('users.user_likes')

                                @endif
                            @endif
                        @endforeach
                    @else
                        <div class="text-center my-4">
                            <p>いいねした掲示板がありません。</p>
                        </div>
                    @endif
                </div>
            @endauth
        </div>
    </div>
</div>
@endsection