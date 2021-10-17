<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bulletin;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    # コメント機能
    public function add(Request $request, $id)
    {
        $bulletin = Bulletin::find($id);
        // Commentモデルのインスタンスを作成する
        $comment = new Comment();
        // ユーザーID取得
        $comment->user_id = Auth::id();
        // 掲示板ID取得
        $comment->bulletin_id = $id;
        //リクエストデータを受け取り、データベースへ保存
        $comment->fill($request->all())->save();

        return redirect()->route('bulletin.show', $bulletin);
    }
}
