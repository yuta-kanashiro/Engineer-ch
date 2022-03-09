@extends('layouts.app')

@section('title', 'ともだちの掲示板トップページ')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card description-card sunny-morning-gradient mb-5 text-white">
                <div class="card-title">
                    <h3 class="card-title-border mt-5">ともだちの掲示板</h3>
                </div>
                <div class="card-body text-center">
                    <p>フォロー中の掲示板が投稿順に表示されます</p>
                </div>
            </div>

            {{-- 投稿した掲示板がある場合 --}}
            @if (!$bulletinsLimited->isEmpty())
                <!-- <div class="card border"> -->
                    @foreach ($bulletinsLimited as $bulletin)
                    <div class="card border mb-3">
                        <div class="card-body card-hover">
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
                                @if ($bulletin->limited_key === '限定')
                                    <h5 class="text-dark font-weight-bold"><i class="fas fa-lock"></i>{{ $bulletin->title }}</h5>
                                @else
                                    <h5 class="text-dark font-weight-bold">{{ $bulletin->title }}</h5>
                                @endif
                                <small class="text-muted">コメント数 {{ $bulletin->countComments() }}</small>
                            </a>
                        </div>
                    </div>
                    @endforeach

                    <div class="d-flex justify-content-center">
                        {{ $bulletinsLimited->links() }}
                    </div>
                <!-- </div> -->
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