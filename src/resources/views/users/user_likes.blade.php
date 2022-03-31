<div class="card">
    <!-- いいねした掲示板がある場合 -->
    @if (!$like_bulletins->isEmpty())
        @foreach ($like_bulletins as $like_bulletin)
            <div class="card-body card-hover border-bottom">
                <div class="mb-3">
                    <a href="{{ route('user.show', $like_bulletin->user) }}" class="icon-hover">
                        @if ($like_bulletin->user->profile_image === null)
                            <img class="profile-icon rounded-circle" src="{{ asset('default.png') }}" alt="プロフィール画像" width="30" height="30">
                        @else
                            <img class="profile-icon rounded-circle" src="{{ Storage::url($like_bulletin->user->profile_image) }}" alt="プロフィール画像" width="30" height="30">
                        @endif
                    </a>
                    <small class="mt-1 ml-1 text-muted"><a href="{{ route('user.show', $like_bulletin->user) }}" class="user-name-hover text-dark">{{ $like_bulletin->user->name }}</a>が{{ $like_bulletin->created_at->format('Y年m月d日') }}に投稿</small>
                </div>
                <a href="{{ route('bulletin.show', $like_bulletin) }}">
                    <h5 class="text-dark font-weight-bold">{{ $like_bulletin->title }}</h5>
                    <small class="text-muted">いいね数 {{ $like_bulletin->countLikes() }}</small>
                    <small class="text-muted">コメント数 {{ $like_bulletin->countComments() }}</small>
                </a>
            </div>
        @endforeach

        <div class="d-flex justify-content-center pt-3">
            {{ $like_bulletins->links() }}
        </div>
    @else
        <div class="text-center my-4">
            <p>いいねした掲示板がありません。</p>
        </div>
    @endif
</div>