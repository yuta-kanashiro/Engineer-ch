<div class="ml-auto">
    @if (Auth::user()->isFollowing($user->id))
        <form action="{{ route('unfollow', $user->id) }}" method="POST">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn follow-btn orange-color rounded-pill text-white">フォロー中</button>
        </form>
    @else
        <form action="{{ route('follow', $user->id) }}" method="POST">
            @csrf

            <button type="submit" class="btn follow-btn btn-outline-warning orange-color rounded-pill text-white">フォローする</button>
        </form>
    @endif
</div>