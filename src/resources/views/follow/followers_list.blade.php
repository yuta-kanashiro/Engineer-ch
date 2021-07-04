@extends('layouts.app')

@section('title', 'フォロー一覧')

@section('content')
<div class="chat-container">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card mb-4">
                <div class="card-header sunny-morning-gradient">
                    <h4 class="text-center text-white mt-2">フォロワー</h4>
                </div>
                @if(!$followerUsers->isEmpty())
                    @foreach($followerUsers as $followerUser)
                        <div class="card-body card-hover border-bottom py-2">
                            <div class="row">
                                <div class="col-xl-1 col-1 mx-auto pt-2">
                                    <a href="{{ route('user.show', $followerUser) }}" class="icon-hover">
                                        @if ($followerUser->profile_image === null)
                                            <img class="profile-icon rounded-circle" src="{{ asset('default.png') }}" alt="プロフィール画像" width="60" height="60">
                                        @else
                                            <img class="profile-icon rounded-circle" src="{{ Storage::url($followerUser->profile_image) }}" alt="プロフィール画像" width="60" height="60">
                                        @endif
                                    </a>
                                </div>
                                <div class="col-xl-10 col-9 mx-auto pb-1">
                                    <div class="d-flex">
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
                        @if($user->id === Auth::id())
                            <h5 class="text-center mt-1">まだ誰もフォローしていません</h5>
                        @else
                            <h4>{{ $user->name }}さんはまだ誰もフォローしていません</h4>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection