@extends('layouts.app')

@section('title', '検索トップページ')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card description-card sunny-morning-gradient mb-5 text-white">
                <div class="card-title">
                    <h4 class="card-title-border mt-5">掲示板・ユーザー検索</h4>
                </div>
                <div class="card-body row d-flex justify-content-center">
                    {{-- 検索フォーム --}}
                    <div class="col-md-8 mb-2">
                        <form method="get" class="search-form">
                            <input type="text" name="search" class="form-control pr-4" value="{{ request('search') }}" placeholder="キーワードを入力する">
                            <input type="submit" value="&#xf002;" class="fas">
                        </form>
                    </div>
                </div>
            </div>

            <!-- 検索した時 -->
            @if ($search != null)
                <div class="tabs">
                    <input id="bulletin" type="radio" name="tab_item" checked>
                    <label class="tab_item" for="bulletin">掲示板</label>
                    <input id="user" type="radio" name="tab_item">
                    <label class="tab_item" for="user">ユーザー</label>

                    {{-- 掲示板検索結果 --}}
                    <div class="tab_content" id="bulletin_content">
                        <div class="card">
                            @if (!$bulletins->isEmpty())
                                @foreach ($bulletins as $bulletin)
                                    <div class="card-body card-hover border-bottom">
                                        <div class="mb-3">
                                            <a href="{{ route('user.show', $bulletin->user) }}" class="icon-hover">
                                                @if ($bulletin->user->profile_image === null)
                                                    <img class="profile-icon rounded-circle" src="{{ asset('default.png') }}" alt="プロフィール画像" width="30" height="30">
                                                @else
                                                    <img class="profile-icon rounded-circle" src="{{ $bulletin->user->profile_image }}" alt="プロフィール画像" width="30" height="30">
                                                @endif
                                            </a>
                                            <small class="mt-1 ml-1 text-muted"><a href="{{ route('user.show', $bulletin->user) }}" class="user-name-hover text-dark">{{ $bulletin->user->name }}</a>が{{ $bulletin->created_at->format('Y年m月d日') }}に投稿</small>
                                        </div>
                                        <a href="{{ route('bulletin.show', $bulletin) }}">
                                            <h5 class="text-dark font-weight-bold">{{ $bulletin->title }}</h5>
                                            <small class="text-muted">いいね数 {{ $bulletin->countLikes() }}</small>
                                            <small class="text-muted">コメント数 {{ $bulletin->countComments() }}</small>
                                        </a>
                                    </div>
                                @endforeach
                            @else
                                <h5 class="text-center pt-4 pb-3">検索結果：なし</h5>
                            @endif
                        </div>

                        <div class="d-flex justify-content-center pt-3">
                            {{ $bulletins->appends(request()->query())->links() }}
                        </div>
                    </div>

                    {{-- ユーザー検索結果 --}}
                    <div class="tab_content" id="user_content">
                        <div class="card">
                            @if (!$users->isEmpty())
                                @foreach($users as $user)
                                    <div class="card-body card-hover border-bottom py-2 h-50">
                                        <div class="row">
                                            <div class="col-xl-1 col-1 mx-auto py-2">
                                                <a href="{{ route('user.show', $user) }}" class="icon-hover">
                                                    @if ($user->profile_image === null)
                                                        <img class="profile-icon rounded-circle" src="{{ asset('default.png') }}" alt="プロフィール画像" width="60" height="60">
                                                    @else
                                                        <img class="profile-icon rounded-circle" src="{{ $user->profile_image }}" alt="プロフィール画像" width="60" height="60">
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="col-xl-10 col-9 mx-auto pb-1 ml-2">
                                                <div class="d-flex mb-1">
                                                    <a href="{{ route('user.show', $user) }}"><h5 class="user-name-hover text-dark font-weight-bold pt-2">{{ $user->name }}</h5></a>
                                                    @auth
                                                        @if (Auth::id() != $user->id)
                                                            @include('follow.follow_button', ['user' => $user])
                                                        @endif
                                                    @endauth
                                                </div>
                                                <p class="d-inline">{{ $user->introduction }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <h5 class="text-center pt-4 pb-3">検索結果：なし</h5>
                            @endif
                        </div>

                        <div class="d-flex justify-content-center pt-3">
                            {{ $users->appends(request()->query())->links() }}
                        </div>
                    </div>
                </div>

            <!-- 検索していない時 -->
            @else
                <div class="card">
                    <div class="card-body border-bottom pt-4">
                        <big class="font-weight-bold border-bottom">人気の掲示板</big>
                        <small class="text-muted pl-2">いいね数が多い掲示板</small>
                    </div>
                    @foreach ($bulletinsLikes as $bulletin)
                        <div class="card-body card-hover border-bottom">
                            <div class="mb-3">
                                <a href="{{ route('user.show', $bulletin->user) }}" class="icon-hover">
                                    @if ($bulletin->user->profile_image === null)
                                        <img class="profile-icon rounded-circle" src="{{ asset('default.png') }}" alt="プロフィール画像" width="30" height="30">
                                    @else
                                        <img class="profile-icon rounded-circle" src="{{ $bulletin->user->profile_image }}" alt="プロフィール画像" width="30" height="30">
                                    @endif
                                </a>
                                <small class="mt-1 ml-1 text-muted"><a href="{{ route('user.show', $bulletin->user) }}" class="user-name-hover text-dark">{{ $bulletin->user->name }}</a>が{{ $bulletin->created_at->format('Y年m月d日') }}に投稿</small>
                            </div>
                            <a href="{{ route('bulletin.show', $bulletin) }}">
                                <h5 class="text-dark font-weight-bold">{{ $bulletin->title }}</h5>
                                <small class="text-muted">いいね数 {{ $bulletin->countLikes() }}</small>
                                <small class="text-muted">コメント数 {{ $bulletin->countComments() }}</small>
                            </a>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
@endsection