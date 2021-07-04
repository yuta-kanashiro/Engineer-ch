<div class="ml-auto">
    @if (Auth::user()->isFollowing($user->id))
        <form action="{{ route('unfollow', $user->id) }}" method="POST" class="follow-form">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn unfollow-btn rounded-pill text-white font-weight-bold">
                <span class="follow-nomal">フォロー中</span>
                <span class="follow-hover">フォローを外す</span>
            </button>
        </form>
    @else
        <form action="{{ route('follow', $user->id) }}" method="POST">
            @csrf

            <button type="submit" class="btn follow-btn rounded-pill font-weight-bold">フォローする</button>
        </form>
    @endif
</div>