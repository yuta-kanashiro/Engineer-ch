@extends('layouts.app')

@section('title', 'フォロー一覧')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="btn-group d-flex justify-content-center mb-2" role="group">
                <a class="btn btn-following">フォロー中</a>
                <a class="btn btn-follower">フォロワー</a>
            </div>

            {{-- フォロー中 --}}
            <div class="following">
                <div class="card mb-4 mt-2">
                    @if (!$followingUsers->isEmpty())
                        @foreach ($followingUsers as $followingUser)
                            <div class="card-body card-hover border-bottom py-2">
                                <div class="row">
                                    <div class="col-xl-1 col-1 mx-auto py-2">
                                        <a href="{{ route('user.show', $followingUser) }}" class="icon-hover">
                                            @if ($followingUser->profile_image === null)
                                                <img class="profile-icon rounded-circle" src="{{ asset('default.png') }}" alt="プロフィール画像" width="60" height="60">
                                            @else
                                                <img class="profile-icon rounded-circle" src="{{ Storage::url($followingUser->profile_image) }}" alt="プロフィール画像" width="60" height="60">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="col-xl-10 col-9 mx-auto pb-1">
                                        <div class="d-flex mb-1">
                                            <a href="{{ route('user.show', $followingUser) }}"><h5 class="user-name-hover text-dark font-weight-bold pt-2">{{ $followingUser->name }}</h5></a>
                                            @auth
                                                @if (Auth::id() != $followingUser->id)
                                                    @include('follow.follow_button', ['user' => $followingUser])
                                                @endif
                                            @endauth
                                        </div>
                                        <p class="d-inline">{{ $followingUser->introduction }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="card-body">
                            @if ($user->id === Auth::id())
                                <h5 class="text-center mt-1">まだ誰もフォローしていません</h5>
                            @else
                                <h5 class="text-center mt-1">{{ $user->name }}さんはまだ誰もフォローしていません</h5>
                            @endif
                        </div>
                    @endif
                </div>
            </div>

            {{-- フォロワー --}}
            <div class="follower">
                <div class="card mb-4">
                    @if (!$followerUsers->isEmpty())
                        @foreach ($followerUsers as $followerUser)
                            <div class="card-body card-hover border-bottom py-2">
                                <div class="row">
                                    <div class="col-xl-1 col-1 mx-auto py-2">
                                        <a href="{{ route('user.show', $followerUser) }}" class="icon-hover">
                                            @if ($followerUser->profile_image === null)
                                                <img class="profile-icon rounded-circle" src="{{ asset('default.png') }}" alt="プロフィール画像" width="60" height="60">
                                            @else
                                                <img class="profile-icon rounded-circle" src="{{ Storage::url($followerUser->profile_image) }}" alt="プロフィール画像" width="60" height="60">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="col-xl-10 col-9 mx-auto pb-1">
                                        <div class="d-flex mb-1">
                                            <a href="{{ route('user.show', $followerUser) }}"><h5 class="user-name-hover text-dark font-weight-bold pt-2">{{ $followerUser->name }}</h5></a>
                                            @auth
                                                @if (Auth::id() != $followerUser->id)
                                                    @include('follow.follow_button', ['user' => $followerUser])
                                                @endif
                                            @endauth
                                        </div>
                                        <p class="d-inline">{{ $followerUser->introduction }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="card-body">
                            @if ($user->id === Auth::id())
                                <h5 class="text-center mt-1">まだフォロワーがいません</h5>
                            @else
                                <h5 class="text-center mt-1">{{ $user->name }}さんにはまだフォロワーがいません</h5>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection