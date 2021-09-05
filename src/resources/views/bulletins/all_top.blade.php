@extends('layouts.app')

@section('title', 'みんなの掲示板トップページ')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card description-card sunny-morning-gradient mb-5 text-white">
                <div class="card-title"><h3 class="card-title-border mt-5">みんなの掲示板</h3></div>
                <div class="card-body text-center">
                    <p>気になる掲示板を覗いたり、興味のある内容の掲示板を作ったりしてみよう！</p>
                </div>
            </div>

            {{-- 投稿した掲示板がある場合 --}}
            @if (!$bulletins->isEmpty())
                @foreach ($bulletins as $bulletin)
                    @if ($bulletin->limited_key === null)
                        <div class="card card-hover mb-3">
                            <div class="mt-2 ml-2">
                                <a href="{{ route('user.show', $bulletin->user) }}" class="icon-hover">
                                    @if ($bulletin->user->profile_image === null)
                                        <img class="profile-icon rounded-circle" src="{{ asset('default.png') }}" alt="プロフィール画像" width="30" height="30">
                                    @else
                                        <img class="profile-icon rounded-circle" src="{{ Storage::url($bulletin->user->profile_image) }}" alt="プロフィール画像" width="30" height="30">
                                    @endif
                                </a>
                                <small class="mt-1 ml-1 text-muted"><a href="{{ route('user.show', $bulletin->user) }}" class="user-name-hover text-dark">{{ $bulletin->user->name }}</a>が{{ $bulletin->created_at->format('Y年m月d日') }}に投稿</small>
                            </div>
                            <a href="{{ route('bulletin.show', $bulletin) }}" class="card-body">
                                <div class="row mb-2">
                                    <h5 class="text-dark font-weight-bold ml-2">{{ $bulletin->title }}</h5>
                                </div>
                                <div class="row">
                                    <small class="text-muted ml-2">コメント数 {{ $bulletin->countComments() }}</small>
                                </div>
                            </a>
                        </div>
                    @endif
                @endforeach
            @else
                <div class="text-center my-4">
                    <p>投稿された掲示板がありません。</p>
                </div>
            @endif
        </div>

        @auth
            @include('bulletins.post_btn')
        @endauth
    </div>
</div>
@endsection