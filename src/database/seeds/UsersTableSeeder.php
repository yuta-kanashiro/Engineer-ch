<?php

use Illuminate\Database\Seeder;

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
            'password' => bcrypt('sample1'),
            'profile_image' => null,
            'introduction' => 'みなさんこんにちは。僕の名前はsample1です。この文章は自己紹介のサンプルです。',
            'created_at' => '2021-03-01 07:25:42',
            'updated_at' => '2021-03-02 07:25:42'
        ],
        [
            'name' => 'sample2',
            'email' => 'sample2@sample.com',
            'age' => '22',
            'prefecture' => '東京都',
            'password' => bcrypt('sample2'),
            'profile_image' => null,
            'introduction' => 'みなさんこんにちは。僕の名前はsample2です。この文章は自己紹介のサンプルです。みなさんこんにちは。僕の名前はsample2です。この文章は自己紹介のサンプルです。',
            'created_at' => '2021-03-01 07:25:42',
            'updated_at' => '2021-03-02 07:25:42'
        ],
        [
            'name' => 'sample3',
            'email' => 'sample3@sample.com',
            'age' => '23',
            'prefecture' => '名古屋県',
            'password' => bcrypt('sample3'),
            'profile_image' => null,
            'introduction' => 'みなさんこんにちは。僕の名前はsample3です。この文章は自己紹介のサンプルです。',
            'created_at' => '2021-03-01 07:25:42',
            'updated_at' => '2021-03-02 07:25:42'
        ],
        [
            'name' => 'sample4',
            'email' => 'sample4@sample.com',
            'age' => '24',
            'prefecture' => '大阪府',
            'password' => bcrypt('sample4'),
            'profile_image' => null,
            'introduction' => 'みなさんこんにちは。僕の名前はsample4です。この文章は自己紹介のサンプルです。みなさんこんにちは。僕の名前はsample4です。この文章は自己紹介のサンプルです。',
            'created_at' => '2021-03-01 07:25:42',
            'updated_at' => '2021-03-02 07:25:42'
        ],
        [
            'name' => 'sample5',
            'email' => 'sample5@sample.com',
            'age' => '25',
            'prefecture' => '福岡県',
            'password' => bcrypt('sample5'),
            'profile_image' => null,
            'introduction' => 'みなさんこんにちは。僕の名前はsample5です。この文章は自己紹介のサンプルです。',
            'created_at' => '2021-03-01 07:25:42',
            'updated_at' => '2021-03-02 07:25:42'
        ],
        ]);
    }
}
