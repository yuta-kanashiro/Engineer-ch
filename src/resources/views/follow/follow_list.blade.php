@extends('layouts.app')

@section('title', 'フォロー一覧')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="tabs">
                <input id="following" type="radio" name="tab_item" checked>
                <label class="tab_item" for="following">フォロー中</label>
                <input id="follower" type="radio" name="tab_item">
                <label class="tab_item" for="follower">フォロワー</label>

                {{-- フォロー中 --}}
                <div class="tab_content" id="following_content">
                    <div class="card">
                        @if (!$followingUsers->isEmpty())
                            @foreach ($followingUsers as $followingUser)
                                <div class="card-body card-hover border-bottom py-2">
                                    <div class="row">
                                        <div class="col-xl-1 col-1 mx-auto py-2">
                                            <a href="{{ route('user.show', $followingUser) }}" class="icon-hover">
                                                @if ($followingUser->profile_image === null)
                                                    <img class="profile-icon rounded-circle" src="{{ asset('default.png') }}" alt="プロフィール画像" width="60" height="60">
                                                @else
                                                    <img class="profile-icon rounded-circle" src="{{ $followingUser->profile_image }}" alt="プロフィール画像" width="60" height="60">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="col-xl-10 col-9 mx-auto pb-1 ml-2">
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

                    <div class="d-flex justify-content-center pt-3">
                        {{ $followingUsers->links() }}
                    </div>
                </div>

                {{-- フォロワー --}}
                <div class="tab_content" id="follower_content">
                    <div class="card">
                        @if (!$followerUsers->isEmpty())
                            @foreach ($followerUsers as $followerUser)
                                <div class="card-body card-hover border-bottom py-2">
                                    <div class="row">
                                        <div class="col-xl-1 col-1 mx-auto py-2">
                                            <a href="{{ route('user.show', $followerUser) }}" class="icon-hover">
                                                @if ($followerUser->profile_image === null)
                                                    <img class="profile-icon rounded-circle" src="{{ asset('default.png') }}" alt="プロフィール画像" width="60" height="60">
                                                @else
                                                    <img class="profile-icon rounded-circle" src="{{ $followerUser->profile_image }}" alt="プロフィール画像" width="60" height="60">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="col-xl-10 col-9 mx-auto pb-1 ml-2">
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

                    <div class="d-flex justify-content-center pt-3">
                        {{ $followerUsers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection