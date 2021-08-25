@if (Auth::user()->isLike($bulletin->id))
    <form action="{{ route('unlike', $bulletin->id) }}" method="POST" name="unlike">
        @csrf
        @method('DELETE')

        <a type="btn" onclick="document.unlike.submit();">
            <i class="fas fa-heart fa-lg text-danger"></i>
        </a>
    </form>
@else
    <form action="{{ route('like', $bulletin->id) }}" method="POST" name="like">
        @csrf

        <a type="btn" onclick="document.like.submit();">
            <i class="far fa-heart fa-lg"></i>
        </a>
    </form>
@endif