<div class="card">
    <!-- 投稿した掲示板がある場合 -->
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
        <div class="text-center mt-3">
            <p>投稿した掲示板がありません。</p>
        </div>
    @endif
</div>

<div class="d-flex justify-content-center pt-3">
    {{ $bulletins->links() }}
</div>