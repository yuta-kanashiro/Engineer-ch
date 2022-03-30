<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Bulletin;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    # 検索機能
    public function search(Request $request)
    {
        // 入力されたキーワードを取得する
        $search = $request->input('search');

        // キーワードが入力された時
        if($search != null){
            // クエリビルダ
            $queryUser = User::query();
            $queryBulletin = Bulletin::query();

            // 空白を全角スペースに統一する
            $searchWord = mb_convert_kana($search, 's');
            // 全角スペースで文字を区切り、配列にする
            $keywords = preg_split('/[\s]+/', $searchWord);

            // 配列をforeachで回し、orWhere検索のクエリ発行
            foreach($keywords as $keyword) {
                $queryUser->orWhere('name', 'like', '%'.$keyword.'%');
                $queryBulletin->orWhere('title', 'like', '%'.$keyword.'%');
            }

            // 掲示板、ユーザーを作成日時が新しい順（降順）に取得、with()でN+1問題を解決、ページネーションは別々に動作するよう記述
            $bulletins = $queryBulletin->orderBy('created_at', 'desc')->with(['user'])->paginate(10, ['*'], 'bulletins');
            $users = $queryUser->orderBy('created_at', 'desc')->paginate(10, ['*'], 'users');

            return view('search.top', compact('users', 'bulletins','search'));

        }else{
            // キーワードが入力されていない時
            // いいね数が多い掲示板上位5件を取得
            $bulletinsLikes = Bulletin::withCount('likes')->orderBy('likes_count', 'desc')->take(5)->get();

            return view('search.top', compact('bulletinsLikes', 'search'));
        }
    }
}
