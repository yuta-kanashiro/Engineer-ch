@extends('layouts.app')

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
                @foreach($bulletins as $bulletin )
                    @if ($bulletin->limited_id == 1)
                        <div class="card mb-3">
                            <div class="row mt-2 ml-2">
                                <img class="profile-icon rounded-circle" src="{{ $bulletin->user->profile_image }}" alt="プロフィール画像" width="30" height="30">
                                <small class="mt-1 ml-2 text-muted"><a href="{{ route('user.show', $bulletin->user) }}" class="text-dark">{{ $bulletin->user->name }}</a>が{{ $bulletin->created_at->format('Y年m月d日') }}に投稿</small>
                            </div>
                            <a href="" class="card-body">
                                <div class="row mb-3">
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
    </div>
</div>
@endsection