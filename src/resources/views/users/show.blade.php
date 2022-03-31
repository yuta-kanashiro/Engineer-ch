@extends('layouts.app')

@section('title', 'ユーザープロフィール画面')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-9">

            {{-- ユーザーのプロフィール --}}
            <div class="card mb-4">
                @include('users.user_profile')
            </div>

            @auth
                <div class="tabs">
                    <input id="bulletin" type="radio" name="tab_item" checked>
                    <label class="tab_item" for="bulletin">掲示板</label>
                    <input id="like" type="radio" name="tab_item">
                    <label class="tab_item" for="like">いいね</label>

                    {{-- ユーザーが投稿した掲示板一覧 --}}
                    <div class="tab_content" id="bulletin_content">
                        @include('users.user_bulletins')
                    </div>

                    {{-- ユーザーがいいねした掲示板一覧 --}}
                    <div class="tab_content" id="like_content">
                        @include('users.user_likes')
                    </div>
                </div>
            @endauth
            @guest
                <div class="d-flex justify-content-center">
                    <a href="{{ route('login') }}" class="btn orange-color text-white rounded-pill">
                        このユーザーの掲示板、いいねを見るにはログインしてください
                    </a>
                </div>
            @endguest
        </div>
    </div>
</div>
@endsection