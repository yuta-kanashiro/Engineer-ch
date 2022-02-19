@extends('layouts.app')

@section('title', 'みんなの掲示板トップページ')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card description-card sunny-morning-gradient mb-5 text-white">
                <div class="card-title">
                    <h3 class="card-title-border mt-5">ユーザー・掲示板検索</h3>
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

            @if ($users and $bulletins != '')
            <div class="card bg-white rounded border p-4">
                {{-- ユーザー検索結果 --}}
                <div class="border-bottom">
                    <h5 class="font-weight-bold pb-2">アカウント</h5>
                    @if (!$users->isEmpty())
                        <div class="row flex-row flex-nowrap overflow-auto pb-4">
                            @foreach($users as $user)
                                <div class="col-5">
                                    <a href="{{ route('user.show', $user) }}" class="card border shadow-sm card-hover h-100 text-dark">
                                        <div class="card-body">
                                            <div class="mb-2">
                                                @if ($user->profile_image === null)
                                                    <img class="profile-icon rounded-circle" src="{{ asset('default.png') }}" alt="プロフィール画像" width="50" height="50">
                                                @else
                                                    <img class="profile-icon rounded-circle" src="{{ Storage::url($user->profile_image) }}" alt="プロフィール画像" width="50" height="50">
                                                @endif
                                            </div>
                                            <h5 class="font-weight-bold">{{ $user->name }}</h5>
                                            <div>{{ Str::limit($user->introduction, 65, '...') }}</div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <h4 class="text-center mb-5">{{ request('search') }}の検索結果はありません</h4>
                    @endif
                </div>

                {{-- 掲示板検索結果 --}}
                <h5 class="font-weight-bold mt-4">掲示板</h5>
                @if (!$bulletins->isEmpty())
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
                @else
                    <h4 class="text-center mb-4">{{ request('search') }}の検索結果はありません</h4>
                @endif
            </div>
            @endif
        </div>
    </div>
</div>
@endsection