<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateBulletinRequest;
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
        $bulletins = Bulletin::orderBy('created_at','desc')->with(['user'])->get();

        return view('bulletins.all-top', compact('bulletins'));
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
    public function store(CreateBulletinRequest $request)
    {
        //Postモデルのインスタンスを作成する
        $bulletin = new Bulletin();
        //ユーザーID
        $bulletin->user_id = Auth::id();
        // 限定公開に設定されている場合
        if($request->limited_key === 'on'){
            $bulletin->limited_key = '限定';
        }
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
        $comments = Comment::where('bulletin_id', $bulletin->id)->orderBy('created_at','asc')->with(['user'])->get();

        if(!$comments->isEmpty()){
            // 最終更新日表示用データ, sortByDesc('created_at')で投稿日時が新しい順（降順）に並べ直し、first()で一つ目（最新）のデータを取得
            $updatedTime = $comments->sortByDesc('created_at')->first()->created_at->format('Y年m月d日');
        }else{
            // コメントがない場合、掲示板の投稿日を最終更新日とする
            $updatedTime = $bulletin->created_at->format('Y年m月d日');
        }

        return view('bulletins.show', compact('bulletin', 'comments', 'updatedTime'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
