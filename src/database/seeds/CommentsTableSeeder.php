<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
        [
            'user_id' => '1',
            'bulletin_id' => '2',
            'comment' => 'PHP',
            'created_at' => '2021-03-01 07:25:42',
            'updated_at' => '2021-03-01 07:25:42'
        ],
        [
            'user_id' => '2',
            'bulletin_id' => '3',
            'comment' => 'Vue.js',
            'created_at' => '2021-03-02 07:25:42',
            'updated_at' => '2021-03-02 07:25:42'
        ],
        [
            'user_id' => '3',
            'bulletin_id' => '4',
            'comment' => 'Docker',
            'created_at' => '2021-03-03 07:25:42',
            'updated_at' => '2021-03-03 07:25:42'
        ],
        [
            'user_id' => '4',
            'bulletin_id' => '5',
            'comment' => 'MDBootstrap',
            'created_at' => '2021-03-04 07:25:42',
            'updated_at' => '2021-03-04 07:25:42'
        ],
        [
            'user_id' => '5',
            'bulletin_id' => '1',
            'comment' => 'Laravel',
            'created_at' => '2021-03-05 07:25:42',
            'updated_at' => '2021-03-05 07:25:42'
        ],
        [
            'user_id' => '1',
            'bulletin_id' => '7',
            'comment' => 'PHPについて（限定）',
            'created_at' => '2021-03-07 07:25:42',
            'updated_at' => '2021-03-07 07:25:42'
        ],
        [
            'user_id' => '2',
            'bulletin_id' => '8',
            'comment' => 'Vue.jsについて（限定）',
            'created_at' => '2021-03-09 07:25:42',
            'updated_at' => '2021-03-09 07:25:42'
        ],
        [
            'user_id' => '3',
            'bulletin_id' => '9',
            'comment' => 'Dockerについて（限定）',
            'created_at' => '2021-03-11 07:25:42',
            'updated_at' => '2021-03-11 07:25:42'
        ],
        [
            'user_id' => '4',
            'bulletin_id' => '10',
            'comment' => 'MDBootstrapについて（限定）',
            'created_at' => '2021-03-13 07:25:42',
            'updated_at' => '2021-03-13 07:25:42'
        ],
        [
            'user_id' => '5',
            'bulletin_id' => '6',
            'comment' => 'Laravelについて（限定）',
            'created_at' => '2021-03-14 07:25:42',
            'updated_at' => '2021-03-14 07:25:42'
        ],
        [
            'user_id' => '1',
            'bulletin_id' => '2',
            'comment' => 'PHPについて',
            'created_at' => '2021-03-15 07:25:42',
            'updated_at' => '2021-03-15 07:25:42'
        ],
        [
            'user_id' => '2',
            'bulletin_id' => '3',
            'comment' => 'Vue.jsについて',
            'created_at' => '2021-03-16 07:25:42',
            'updated_at' => '2021-03-16 07:25:42'
        ],
        [
            'user_id' => '3',
            'bulletin_id' => '4',
            'comment' => 'Dockerについて',
            'created_at' => '2021-03-17 07:25:42',
            'updated_at' => '2021-03-17 07:25:42'
        ],
        [
            'user_id' => '4',
            'bulletin_id' => '5',
            'comment' => 'MDBootstrapについて',
            'created_at' => '2021-03-19 07:25:42',
            'updated_at' => '2021-03-19 07:25:42'
        ],
        [
            'user_id' => '5',
            'bulletin_id' => '1',
            'comment' => 'Laravelについて',
            'created_at' => '2021-03-21 07:25:42',
            'updated_at' => '2021-03-21 07:25:42'
        ],
        [
            'user_id' => '1',
            'bulletin_id' => '7',
            'comment' => 'PHP（限定）',
            'created_at' => '2021-03-23 07:25:42',
            'updated_at' => '2021-03-23 07:25:42'
        ],
        [
            'user_id' => '2',
            'bulletin_id' => '8',
            'comment' => 'Vue.js（限定）',
            'created_at' => '2021-03-25 07:25:42',
            'updated_at' => '2021-03-25 07:25:42'
        ],
        [
            'user_id' => '3',
            'bulletin_id' => '9',
            'comment' => 'Docker（限定）',
            'created_at' => '2021-03-26 07:25:42',
            'updated_at' => '2021-03-26 07:25:42'
        ],
        [
            'user_id' => '4',
            'bulletin_id' => '10',
            'comment' => 'MDBootstrap（限定）',
            'created_at' => '2021-03-27 07:25:42',
            'updated_at' => '2021-03-27 07:25:42'
        ],
        [
            'user_id' => '5',
            'bulletin_id' => '6',
            'comment' => 'Laravel（限定）',
            'created_at' => '2021-03-29 07:25:42',
            'updated_at' => '2021-03-29 07:25:42'
        ],
        [
            'user_id' => '1',
            'bulletin_id' => '1',
            'comment' => 'コメント数',
            'created_at' => '2022-02-23 07:25:42',
            'updated_at' => '2022-02-23 07:25:42'
        ],
        [
            'user_id' => '2',
            'bulletin_id' => '1',
            'comment' => '一番の',
            'created_at' => '2022-02-23 07:25:42',
            'updated_at' => '2022-02-23 07:25:42'
        ],
        [
            'user_id' => '3',
            'bulletin_id' => '1',
            'comment' => '掲示板',
            'created_at' => '2022-02-23 07:25:42',
            'updated_at' => '2022-02-23 07:25:42'
        ],
        [
            'user_id' => '4',
            'bulletin_id' => '3',
            'comment' => 'コメント数２位の',
            'created_at' => '2022-02-23 07:25:42',
            'updated_at' => '2022-02-23 07:25:42'
        ],
        [
            'user_id' => '5',
            'bulletin_id' => '3',
            'comment' => '掲示板',
            'created_at' => '2022-02-23 07:25:42',
            'updated_at' => '2022-02-23 07:25:42'
        ],
        [
            'user_id' => '1',
            'bulletin_id' => '5',
            'comment' => 'コメント数３位の掲示板',
            'created_at' => '2022-02-23 07:25:42',
            'updated_at' => '2022-02-23 07:25:42'
        ],
        ]);
    }
}
