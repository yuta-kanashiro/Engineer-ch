<div class="card card-hover mb-3">
    <div class="row mt-2 ml-2">
        @if ($user->profile_image === null)
            <img class="profile-icon rounded-circle" src="{{ asset('default.png') }}" alt="プロフィール画像" width="30" height="30">
        @else
            <img class="profile-icon rounded-circle" src="{{ Storage::url($user->profile_image) }}" alt="プロフィール画像" width="30" height="30">
        @endif
        <small class="mt-1 ml-2 text-muted"><span class="text-dark">{{ $user->name }}</span>が{{ $bulletin->created_at->format('Y年m月d日') }}に投稿</small>
    </div>
    <a href="{{ route('bulletin.show', $bulletin) }}" class="card-body">
        <div class="row">
            @if ($bulletin->limited_key === '限定')
                <h5 class="text-dark font-weight-bold ml-2"><i class="fas fa-lock"></i>{{ $bulletin->title }}</h5>
            @else
                <h5 class="text-dark font-weight-bold ml-2">{{ $bulletin->title }}</h5>
            @endif
        </div>
        <div class="row">
            <small class="ml-2 text-muted">コメント数 {{ $bulletin->countComments() }}</small>
        </div>
    </a>
</div>