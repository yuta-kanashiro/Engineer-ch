<div class="card card-hover mb-3">
    <div class="row mt-2 ml-2">
        <a href="{{ route('user.show', $like->user) }}" class="icon-hover">
            @if ($like->user->profile_image === null)
                <img class="profile-icon rounded-circle" src="{{ asset('default.png') }}" alt="プロフィール画像" width="30" height="30">
            @else
                <img class="profile-icon rounded-circle" src="{{ Storage::url($like->user->profile_image) }}" alt="プロフィール画像" width="30" height="30">
            @endif
        </a>
        <small class="mt-1 ml-2 text-muted"><a href="{{ route('user.show', $like->user) }}" class="user-name-hover text-dark">{{ $like->user->name }}</a>が{{ $like->created_at->format('Y年m月d日') }}に投稿</small>
    </div>
    <a href="{{ route('bulletin.show', $like) }}" class="card-body">
        <div class="row">
            @if ($like->limited_key === '限定')
                <h5 class="text-dark font-weight-bold ml-2"><i class="fas fa-lock"></i>{{ $like->title }}</h5>
            @else
                <h5 class="text-dark font-weight-bold ml-2">{{ $like->title }}</h5>
            @endif
        </div>
        <div class="row">
            <small class="ml-2 text-muted">コメント数 {{ $like->countComments() }}</small>
        </div>
    </a>
</div>