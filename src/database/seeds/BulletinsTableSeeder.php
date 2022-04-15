<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Bulletin;

class BulletinsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bulletins')->insert([
        [
            'user_id' => '1',
            'title' => 'Laravelについて語ろう',
            'summary' => 'ここは概要欄です。掲示板に対するメッセージを書きましょう',
            'created_at' => '2022-03-01 07:25:42',
            'updated_at' => '2022-03-02 07:25:42',
            'deleted_at' => null
        ],
        [
            'user_id' => '2',
            'title' => 'PHPについて語ろう',
            'summary' => 'ここは概要欄です！PHPについて語ろう！ここは概要欄です！PHPについて語ろう！ここは概要欄です！PHPについて語ろう！',
            'created_at' => '2022-03-02 07:25:42',
            'updated_at' => '2022-03-03 07:25:42',
            'deleted_at' => null
        ],
        [
            'user_id' => '3',
            'title' => 'Vue.jsについて語ろう',
            'summary' => 'ここは概要欄です！Vue.jsについて語ろう！ここは概要欄です！Vue.jsについて語ろう！ここは概要欄です！Vue.jsについて語ろう！',
            'created_at' => '2022-03-03 07:25:42',
            'updated_at' => '2022-03-04 07:25:42',
            'deleted_at' => null
        ],
        [
            'user_id' => '4',
            'title' => 'Dockerについて語ろう',
            'summary' => 'ここは概要欄です！Dockerについて語ろう！ここは概要欄です！Dockerについて語ろう！ここは概要欄です！Dockerについて語ろう！',
            'created_at' => '2022-03-04 07:25:42',
            'updated_at' => '2022-03-05 07:25:42',
            'deleted_at' => null
        ],
        [
            'user_id' => '5',
            'title' => 'MDBootstrapについて語ろう',
            'summary' => 'ここは概要欄です！MDBootstrapについて語ろう！ここは概要欄です！MDBootstrapについて語ろう！ここは概要欄です！MDBootstrapについて語ろう！',
            'created_at' => '2022-03-05 07:25:42',
            'updated_at' => '2022-03-06 07:25:42',
            'deleted_at' => null
        ],
        [
            'user_id' => '1',
            'title' => 'Rubyについて語ろう',
            'summary' => 'ここは概要欄です！Laravel（限定）について語ろう！ここは概要欄です！Laravel（限定）について語ろう！ここは概要欄です！Laravel（限定）について語ろう！',
            'created_at' => '2022-03-06 07:25:42',
            'updated_at' => '2022-03-07 07:25:42',
            'deleted_at' => null
        ],
        [
            'user_id' => '2',
            'title' => 'Mysqlについて語ろう',
            'summary' => 'ここは概要欄です！PHP（限定）について語ろう！ここは概要欄です！PHP（限定）について語ろう！ここは概要欄です！PHP（限定）について語ろう！',
            'created_at' => '2022-03-07 07:25:42',
            'updated_at' => '2022-03-08 07:25:42',
            'deleted_at' => null
        ],
        [
            'user_id' => '3',
            'title' => 'Reactについて語ろう',
            'summary' => 'ここは概要欄です！Vue.js（限定）について語ろう！ここは概要欄です！Vue.js（限定）について語ろう！ここは概要欄です！Vue.js（限定）について語ろう！',
            'created_at' => '2022-03-08 07:25:42',
            'updated_at' => '2022-03-09 07:25:42',
            'deleted_at' => null
        ],
        [
            'user_id' => '4',
            'title' => 'Docker-composeについて語ろう',
            'summary' => 'ここは概要欄です！Docker（限定）について語ろう！ここは概要欄です！Docker（限定）について語ろう！ここは概要欄です！Docker（限定）について語ろう！',
            'created_at' => '2022-03-09 07:25:42',
            'updated_at' => '2022-03-10 07:25:42',
            'deleted_at' => null
        ],
        [
            'user_id' => '5',
            'title' => 'Ruby on Railsについて語ろう',
            'summary' => 'ここは概要欄です！MDBootstrap（限定）について語ろう！ここは概要欄です！MDBootstrap（限定）について語ろう！ここは概要欄です！MDBootstrap（限定）について語ろう！',
            'created_at' => '2022-03-10 07:25:42',
            'updated_at' => '2022-03-11 07:25:42',
            'deleted_at' => null
        ],
        [
            'user_id' => '1',
            'title' => 'Laravel×Vue.jsについて語ろう',
            'summary' => 'ここは概要欄です！Laravel×Vue.jsについて語ろう！ここは概要欄です！Laravel×Vue.jsについて語ろう！ここは概要欄です！Laravel×Vue.jsについて語ろう！',
            'created_at' => '2022-03-11 07:25:42',
            'updated_at' => '2022-03-12 07:25:42',
            'deleted_at' => null
        ],
        [
            'user_id' => '6',
            'title' => 'Javascriptについて語ろう',
            'summary' => 'ここは概要欄です！Laravel×Vue.js（限定）について語ろう！ここは概要欄です！Laravel×Vue.js（限定）について語ろう！ここは概要欄です！Laravel×Vue.js（限定）について語ろう！',
            'created_at' => '2022-03-12 07:25:42',
            'updated_at' => '2022-03-13 07:25:42',
            'deleted_at' => null
        ],
        [
            'user_id' => '7',
            'title' => '未経験転職について語ろう',
            'summary' => 'ここは概要欄です！Laravel×Vue.js（限定）について語ろう！ここは概要欄です！Laravel×Vue.js（限定）について語ろう！ここは概要欄です！Laravel×Vue.js（限定）について語ろう！',
            'created_at' => '2022-03-13 07:25:42',
            'updated_at' => '2022-03-14 07:25:42',
            'deleted_at' => null
        ],
        [
            'user_id' => '8',
            'title' => 'いい会社選びについて語ろう',
            'summary' => 'ここは概要欄です！Laravel×Vue.js（限定）について語ろう！ここは概要欄です！Laravel×Vue.js（限定）について語ろう！ここは概要欄です！Laravel×Vue.js（限定）について語ろう！',
            'created_at' => '2022-03-14 07:25:42',
            'updated_at' => '2022-03-15 07:25:42',
            'deleted_at' => null
        ],
        [
            'user_id' => '9',
            'title' => 'Qiitaについて語ろう',
            'summary' => 'ここは概要欄です！Laravel×Vue.js（限定）について語ろう！ここは概要欄です！Laravel×Vue.js（限定）について語ろう！ここは概要欄です！Laravel×Vue.js（限定）について語ろう！',
            'created_at' => '2022-03-15 07:25:42',
            'updated_at' => '2022-03-16 07:25:42',
            'deleted_at' => null
        ],
        [
            'user_id' => '10',
            'title' => '23卒で語ろう',
            'summary' => 'ここは概要欄です！Laravel×Vue.js（限定）について語ろう！ここは概要欄です！Laravel×Vue.js（限定）について語ろう！ここは概要欄です！Laravel×Vue.js（限定）について語ろう！',
            'created_at' => '2022-03-16 07:25:42',
            'updated_at' => '2022-03-17 07:25:42',
            'deleted_at' => null
        ],
        [
            'user_id' => '11',
            'title' => '未経験エンジニアについて語ろう',
            'summary' => 'ここは概要欄です！Laravel×Vue.js（限定）について語ろう！ここは概要欄です！Laravel×Vue.js（限定）について語ろう！ここは概要欄です！Laravel×Vue.js（限定）について語ろう！',
            'created_at' => '2022-03-17 07:25:42',
            'updated_at' => '2022-03-18 07:25:42',
            'deleted_at' => null
        ],
        [
            'user_id' => '12',
            'title' => 'フリーランスについて語ろう',
            'summary' => 'ここは概要欄です！Laravel×Vue.js（限定）について語ろう！ここは概要欄です！Laravel×Vue.js（限定）について語ろう！ここは概要欄です！Laravel×Vue.js（限定）について語ろう！',
            'created_at' => '2022-03-18 07:25:42',
            'updated_at' => '2022-03-19 07:25:42',
            'deleted_at' => null
        ],
        [
            'user_id' => '13',
            'title' => 'セキュリティ強化について語ろう',
            'summary' => 'ここは概要欄です！Laravel×Vue.js（限定）について語ろう！ここは概要欄です！Laravel×Vue.js（限定）について語ろう！ここは概要欄です！Laravel×Vue.js（限定）について語ろう！',
            'created_at' => '2022-03-19 07:25:42',
            'updated_at' => '2022-03-20 07:25:42',
            'deleted_at' => null
        ],
        [
            'user_id' => '14',
            'title' => 'N+1問題について語ろう',
            'summary' => 'ここは概要欄です！Laravel×Vue.js（限定）について語ろう！ここは概要欄です！Laravel×Vue.js（限定）について語ろう！ここは概要欄です！Laravel×Vue.js（限定）について語ろう！',
            'created_at' => '2022-03-20 07:25:42',
            'updated_at' => '2022-03-21 07:25:42',
            'deleted_at' => null
        ],
        [
            'user_id' => '15',
            'title' => '画像アップロードについて語ろう',
            'summary' => 'ここは概要欄です！Laravel×Vue.js（限定）について語ろう！ここは概要欄です！Laravel×Vue.js（限定）について語ろう！ここは概要欄です！Laravel×Vue.js（限定）について語ろう！',
            'created_at' => '2022-03-21 07:25:42',
            'updated_at' => '2022-03-22 07:25:42',
            'deleted_at' => null
        ],
        [
            'user_id' => '16',
            'title' => 'Swiftについて語ろう',
            'summary' => 'ここは概要欄です！Laravel×Vue.js（限定）について語ろう！ここは概要欄です！Laravel×Vue.js（限定）について語ろう！ここは概要欄です！Laravel×Vue.js（限定）について語ろう！',
            'created_at' => '2022-03-22 07:25:42',
            'updated_at' => '2022-03-23 07:25:42',
            'deleted_at' => null
        ],
        [
            'user_id' => '17',
            'title' => '30代からの転職について語ろう',
            'summary' => 'ここは概要欄です！Laravel×Vue.js（限定）について語ろう！ここは概要欄です！Laravel×Vue.js（限定）について語ろう！ここは概要欄です！Laravel×Vue.js（限定）について語ろう！',
            'created_at' => '2022-03-23 07:25:42',
            'updated_at' => '2022-03-24 07:25:42',
            'deleted_at' => null
        ],
        [
            'user_id' => '18',
            'title' => 'Flutterについて語ろう',
            'summary' => 'ここは概要欄です！Laravel×Vue.js（限定）について語ろう！ここは概要欄です！Laravel×Vue.js（限定）について語ろう！ここは概要欄です！Laravel×Vue.js（限定）について語ろう！',
            'created_at' => '2022-03-24 07:25:42',
            'updated_at' => '2022-03-25 07:25:42',
            'deleted_at' => null
        ],
        [
            'user_id' => '19',
            'title' => 'Pythonについて語ろう',
            'summary' => 'ここは概要欄です！Laravel×Vue.js（限定）について語ろう！ここは概要欄です！Laravel×Vue.js（限定）について語ろう！ここは概要欄です！Laravel×Vue.js（限定）について語ろう！',
            'created_at' => '2022-03-25 07:25:42',
            'updated_at' => '2022-03-26 07:25:42',
            'deleted_at' => null
        ],
        [
            'user_id' => '1',
            'title' => '楽しくプログラミングを学ぶためには',
            'summary' => 'ここは概要欄です！Laravel×Vue.js（限定）について語ろう！ここは概要欄です！Laravel×Vue.js（限定）について語ろう！ここは概要欄です！Laravel×Vue.js（限定）について語ろう！',
            'created_at' => '2022-03-26 07:25:42',
            'updated_at' => '2022-03-27 07:25:42',
            'deleted_at' => null
        ],
        [
            'user_id' => '1',
            'title' => '挫折しそうな人はここに集まれ！',
            'summary' => 'ここは概要欄です！Laravel×Vue.js（限定）について語ろう！ここは概要欄です！Laravel×Vue.js（限定）について語ろう！ここは概要欄です！Laravel×Vue.js（限定）について語ろう！',
            'created_at' => '2022-03-27 07:25:42',
            'updated_at' => '2022-03-28 07:25:42',
            'deleted_at' => null
        ],
        [
            'user_id' => '1',
            'title' => 'Laravelで画像アップロードってどうしたら実装できるの？',
            'summary' => 'ここは概要欄です！Laravel×Vue.js（限定）について語ろう！ここは概要欄です！Laravel×Vue.js（限定）について語ろう！ここは概要欄です！Laravel×Vue.js（限定）について語ろう！',
            'created_at' => '2022-03-28 07:25:42',
            'updated_at' => '2022-03-29 07:25:42',
            'deleted_at' => null
        ],
        [
            'user_id' => '1',
            'title' => 'エラー解決会',
            'summary' => 'ここは概要欄です！Laravel×Vue.js（限定）について語ろう！ここは概要欄です！Laravel×Vue.js（限定）について語ろう！ここは概要欄です！Laravel×Vue.js（限定）について語ろう！',
            'created_at' => '2022-03-29 07:25:42',
            'updated_at' => '2022-03-30 07:25:42',
            'deleted_at' => null
        ],
        [
            'user_id' => '1',
            'title' => 'ポートフォリオ座談会',
            'summary' => 'ここは概要欄です！Laravel×Vue.js（限定）について語ろう！ここは概要欄です！Laravel×Vue.js（限定）について語ろう！ここは概要欄です！Laravel×Vue.js（限定）について語ろう！',
            'created_at' => '2022-03-30 07:25:42',
            'updated_at' => '2022-03-31 07:25:42',
            'deleted_at' => null
        ],
        ]);

        // 中間テーブル（likeテーブル）のダミーデータ作成
        $like_users = User::all();

        foreach($like_users as $like_user){
            // 1~8までの数値をランダムで取得
            $ran = rand(1, 8);
            // Bulletinモデルからランダムで1~8件取得
            $like_bulletins = Bulletin::inRandomOrder()->take($ran)->get();

            foreach($like_bulletins as $like_bulletin){
                // すでにいいね済みではないか？
                $existing = $like_user->isLike($like_bulletin->id);

                // いいね済みではない場合、いいねをする
                if (!$existing){
                    $like_user->like($like_bulletin->id);
                }
            }
        }
    }
}
