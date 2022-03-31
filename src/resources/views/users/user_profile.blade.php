<div class="card-body row">
    <div class="col-lg-3 text-center my-2">
        @if ($user->profile_image === null)
            <img class="rounded-circle" src="{{ asset('default.png') }}" alt="プロフィール画像" width="140" height="140">
        @else
            <img class="rounded-circle" src="{{ Storage::url($user->profile_image) }}" alt="プロフィール画像" width="140" height="140">
        @endif
    </div>
    <div class="col-lg-8 ml-2">
        <div class="d-flex">
            <h4 class="my-3 text-dark font-weight-bold">{{ $user->name }}</h4>
            @auth
                @if (Auth::id() === $user->id)
                    <a href="{{ route('user.edit', Auth::user()) }}" class="btn btn-shadow orange-color rounded-pill text-white ml-auto">編集</a>
                @else

                    @include('follow.follow_button')

                @endif
            @endauth
        </div>
        <div class="d-flex">
            @auth
                @if (Auth::id() != $user->id)
                    @if ($user->isFollowing(Auth::id()))
                        <small class="bg-light text-muted">フォローされています</small>
                    @endif
                @endif
            @endauth
        </div>
        <div class="d-flex flex-row mt-3">
            <p class="mr-3 text-muted">年齢：{{ $user->age }}歳</p>
            <p class="text-muted">在住：{{ $user->prefecture }}</p>
        </div>
        <p>{{ $user->introduction }}</p>

        <div class="d-flex flex-row">
            @if($user->countFollowings() === 0)
                <text class="text-muted">{{ $user->countFollowings() }}<small class="text-muted mr-2 ml-1">フォロー中</small></text>
            @else
                <a href="{{ route('follow_list', $user->id) }}">
                    <text class="text-dark">{{ $user->countFollowings() }}<small class="text-muted mr-2 ml-1">フォロー中</small></text>
                </a>
            @endif

            @if($user->countFollowers() === 0)
                <text class="text-muted">{{ $user->countFollowers() }}<small class="text-muted ml-1">フォロワー</small></text>
            @else
                <a href="{{ route('follow_list', $user->id) }}">
                    <text class="text-dark">{{ $user->countFollowers() }}<small class="text-muted ml-1">フォロワー</small></text>
                </a>
            @endif
        </div>
    </div>
</div>