@extends('layouts.app')

@section('title', 'ユーザープロフィール画面')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card mb-5">
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
                            @if($user->countsFollowings() === 0)
                                <p class="text-muted">{{ $user->countsFollowings() }}<small class="text-muted mr-2 ml-1">フォロー中</small></p>
                            @else
                                <a href="{{ route('follow_list', $user->id) }}">
                                    <p class="text-dark">{{ $user->countsFollowings() }}<small class="text-muted mr-2 ml-1">フォロー中</small></p>
                                </a>
                            @endif

                            @if($user->countsFollowers() ===0)
                                <p class="text-muted">{{ $user->countsFollowers() }}<small class="text-muted ml-1">フォロワー</small></p>
                            @else
                                <a href="{{ route('follow_list', $user->id) }}">
                                    <p class="text-dark">{{ $user->countsFollowers() }}<small class="text-muted ml-1">フォロワー</small></p>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="btn-group d-flex justify-content-center mb-4" role="group">
                <a class="btn btn-bulletin orange-color text-white border-right">掲示板を見る</a>
                <a class="btn btn-like orange-color text-white">いいね！を見る</a>
            </div>

            <div class="bulletin">
                <!-- 投稿した掲示板がある場合 -->
                @if (!$bulletins->isEmpty())
                    <h4 class="text-center mb-4">{{ $user->name }}の投稿した掲示板</h4>
                    @foreach ($bulletins as $bulletin )
                        @if ($bulletin->limited_key === null)
                            <div class="card card-hover mb-3">
                                <div class="row mt-2 ml-2">
                                    @if ($user->profile_image === null)
                                        <img class="profile-icon rounded-circle" src="{{ asset('default.png') }}" alt="プロフィール画像" width="30" height="30">
                                    @else
                                        <img class="profile-icon rounded-circle" src="{{ Storage::url($user->profile_image) }}" alt="プロフィール画像" width="30" height="30">
                                    @endif
                                    <small class="mt-1 ml-2 text-muted"><span class="text-dark">{{ $user->name }}</span>が{{ $bulletin->created_at->format('Y年m月d日') }}に投稿</small>
                                </div>
                                <a href="{{ route('bulletin.show', $bulletin) }}" class="card-body">
                                    <div class="row">
                                        <h5 class="ml-2 text-dark font-weight-bold">{{ $bulletin->title }}</h5>
                                    </div>
                                    <div class="row">
                                        <small class="ml-2 text-muted">コメント数 {{ $bulletin->counts() }}</small>
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

            <div class="like" style="display:none;">
                <!-- いいねした掲示板がある場合 -->
                @if (!$bulletins->isEmpty())
                    <h4 class="text-center mb-4">{{ $user->name }}のいいねした掲示板</h4>
                    @foreach ($bulletins as $bulletin )
                        @if ($bulletin->limited_key === '限定')
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
                                        <small class="ml-2 text-muted">コメント数 {{ $bulletin->counts() }}</small>
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