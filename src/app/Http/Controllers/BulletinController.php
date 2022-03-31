<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BulletinRequest;
use App\Models\User;
use App\Models\Bulletin;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class BulletinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 掲示板を投稿日時が新しい順（降順）に取得、with()でN+1問題を解決
        $bulletins = Bulletin::orderBy('created_at', 'desc')->with(['user'])->paginate(10);

        return view('bulletins.top', compact('bulletins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bulletins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BulletinRequest $request)
    {
        //Postモデルのインスタンスを作成する
        $bulletin = new Bulletin();
        //ユーザーID
        $bulletin->user_id = Auth::id();

        //リクエストデータを受け取り、データベースへ保存
        $bulletin->fill($request->all())->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Bulletin $bulletin)
    {
        // コメントのbulletin_idと掲示板のidが一致するものを投稿日時が古い順（昇順）に取得
        $comments = Comment::where('bulletin_id', $bulletin->id)->orderBy('created_at', 'asc')->with(['user'])->get();

        if(!$comments->isEmpty()){
            // 最終更新日表示用データ, sortByDesc('created_at')で投稿日時が新しい順（降順）に並べ直し、first()で一つ目（最新）のデータを取得
            $updatedTime = $comments->sortByDesc('created_at')->first()->created_at->format('Y年m月d日');
        }else{
            // コメントがない場合、掲示板の投稿日を最終更新日とする
            $updatedTime = $bulletin->created_at->format('Y年m月d日');
        }

        return view('bulletins.show', compact('bulletin', 'comments', 'updatedTime'));
    }

    public function showTimeline()
    {
        $loginUser = Auth::user();
        // フォローしているユーザーの掲示板とログインユーザー自身の掲示板を投稿日時が新しい順（降順）に取得
        $bulletins = Bulletin::whereIn('user_id', $loginUser->followings()->pluck('follower_id'))->orWhere('user_id', $loginUser->id)->latest()->paginate(10);

        return view('bulletins.timeline', compact('bulletins'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Bulletin $bulletin)
    {
        // 認可機能（BulletinPolicy）
        $this->authorize('edit', $bulletin);

        return view('bulletins.edit', compact('bulletin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BulletinRequest $request, $id)
    {
        // findメゾットでレコードを取得して$articleに代入
        $bulletin = Bulletin::find($id);
        // リクエストデータを受け取り、データベースへ保存
        $bulletin->fill($request->all())->save();

        return redirect()->route('bulletin.show', $bulletin);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
