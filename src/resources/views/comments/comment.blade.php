@foreach($comments as $comment)
    <div class="media row mb-2">
        <div class="media-body col-md-10 mx-auto">
            <div class="row">
                <div class="col-1 mb-2 mr-2">
                    <a href="{{ route('user.show', $comment->user) }}">
                        @if ($comment->user->profile_image === null)
                            <img class="profile-icon rounded-circle" src="{{ asset('default.png') }}" alt="プロフィール画像" width="40" height="40">
                        @else
                            <img class="profile-icon rounded-circle" src="{{ Storage::url($comment->user->profile_image) }}" alt="プロフィール画像" width="40" height="40">
                        @endif
                    </a>
                </div>
                <div class="col-9">
                    <a href="{{ route('user.show', $comment->user) }}" class="text-muted mr-1">{{ $comment->user->name }}</a>
                    <p>{{ $comment->comment }}<small class="text-muted ml-2">{{ $comment->created_at->format('Y/m/d H:i') }}</small></p>
                </div>
            </div>
        </div>
    </div>
@endforeach