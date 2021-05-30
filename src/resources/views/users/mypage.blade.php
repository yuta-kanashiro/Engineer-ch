@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card mb-4">
                <div class="card-body row">
                    <div class="col-lg-3 text-center mb-5">
                        <img class="profile-icon rounded-circle" src="{{ asset('storage/app/public/profiles/') }}" alt="プロフィール画像" width="150" height="150">
                    </div>
                    <div class="col-lg-8 ml-2">
                        <div class="d-flex">
                            <a href="{{ route('user.show', $user) }}"><h5 class="my-3 text-dark font-weight-bold">{{ $user->name }}</h5></a>
                            <button class="text-white bg-info ml-auto btn-sm"> フォロー</button>
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
                <button class="btn btn-light" aria-expanded="false" data-toggle="collapse" data-target="#collapse1" aria-controls="collapse1">掲示板を見る</button>
                <button class="btn btn-light" aria-expanded="false" data-toggle="collapse" data-target="#collapse2" aria-controls="collapse2">いいね！を見る</button>
            </div>

            <div class="collapse multi-collapse" id="collapse1">

                {{-- 投稿した掲示板がある場合 --}}
                @if (!$bulletins->isEmpty())
                    <h4 class="text-center mb-4">{{ $user->name }}の投稿した掲示板</h4>
                        @foreach($bulletins as $bulletin )
                            @if ($bulletin->limited_id == 1)
                                <div class="card mb-3">
                                    <div class="row mt-2 ml-2">
                                        <img class="profile-icon rounded-circle" src="{{ $user->profile_image }}" alt="プロフィール画像" width="30" height="30">
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
                        <p>投稿した掲示板がありません。</p>
                    </div>
                @endif
            </div>

            <div class="collapse multi-collapse" id="collapse2">
                {{-- いいねした掲示板がある場合 --}}
                @if (!$bulletins->isEmpty())
                    <h4 class="text-center mb-4">{{ $user->name }}のいいねした掲示板</h4>
                        @foreach($bulletins as $bulletin )
                            @if ($bulletin->limited_id == 1)
                                <div class="card mb-3">
                                    <div class="row mt-2 ml-2">
                                        <img class="profile-icon rounded-circle" src="{{ $user->profile_image }}" alt="プロフィール画像" width="30" height="30">
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