<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Generator as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        [
            'name' => 'sample1',
            'email' => 'sample1@sample.com',
            'age' => '21',
            'prefecture' => '北海道',
            'password' => bcrypt('sample1sample1'),
            'profile_image' => null,
            'introduction' => 'みなさんこんにちは。僕の名前はsample1です。この文章は自己紹介のサンプルです。',
            'created_at' => '2021-03-01 07:25:42',
            'updated_at' => '2021-03-02 07:25:42',
            'remember_token'    => Str::random(10)
        ],
        ]);

        // ダミーデータの作成
        factory(User::class, 20)->create();

        // 中間テーブル（follow_usersテーブル）のダミーデータ作成
        $following_users = User::all();

        foreach($following_users as $following_user){
            // 1~12までの数値をランダムで取得
            $ran = rand(1, 12);
            // Userモデルからランダムで1~12件取得
            $follower_users = User::inRandomOrder()->take($ran)->get();

            foreach($follower_users as $follower_user){
                // すでにフォロー済みではないか？
                $existing = $following_user->isFollowing($follower_user->id);
                // フォローする相手がユーザ自身ではないか？
                $myself = $following_user->id === $follower_user->id;

                // フォロー済みではない、かつフォロー相手がユーザ自身ではない場合、フォロー
                if (!$existing && !$myself){
                    $following_user->follow($follower_user->id);
                }
            }
        }

    }
}
