@extends('layouts.app')

@section('title', 'みんなの掲示板トップページ')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card description-card sunny-morning-gradient mb-5 text-white">
                <div class="card-title">
                    <h3 class="card-title-border mt-5">みんなの掲示板</h3>
                </div>
                <div class="card-body text-center">
                    <p>気になる掲示板を覗いたり、興味のある内容の掲示板を作ったりしてみよう！</p>
                </div>
            </div>

            {{-- 投稿した掲示板がある場合 --}}
            @if (!$bulletins->isEmpty())
                <div class="card border">
                    @foreach ($bulletins as $bulletin)
                        @if ($bulletin->limited_key === null)
                            <div class="card-body card-hover border-bottom">
                                <div class="mb-3">
                                    <a href="{{ route('user.show', $bulletin->user) }}" class="icon-hover">
                                        @if ($bulletin->user->profile_image === null)
                                            <img class="profile-icon rounded-circle" src="{{ asset('default.png') }}" alt="プロフィール画像" width="30" height="30">
                                        @else
                                            <img class="profile-icon rounded-circle" src="{{ Storage::url($bulletin->user->profile_image) }}" alt="プロフィール画像" width="30" height="30">
                                        @endif
                                    </a>
                                    <small class="mt-1 ml-1 text-muted"><a href="{{ route('user.show', $bulletin->user) }}" class="user-name-hover text-dark">{{ $bulletin->user->name }}</a>が{{ $bulletin->created_at->format('Y年m月d日') }}に投稿</small>
                                </div>
                                <a href="{{ route('bulletin.show', $bulletin) }}">
                                    <h5 class="text-dark font-weight-bold">{{ $bulletin->title }}</h5>
                                    <small class="text-muted">コメント数 {{ $bulletin->countComments() }}</small>
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>
            @else
                <h4 class="text-center">投稿された掲示板がありません</h4>
            @endif
        </div>

        @auth
            @include('bulletins.post_btn')
        @endauth
    </div>
</div>
@endsection