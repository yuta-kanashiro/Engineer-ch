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
            'updated_at' => '2021-03-02 07:25:42'
        ],
        [
            'user_id' => '2',
            'bulletin_id' => '3',
            'comment' => 'Vue.js',
            'created_at' => '2021-03-01 07:25:42',
            'updated_at' => '2021-03-02 07:25:42'
        ],
        [
            'user_id' => '3',
            'bulletin_id' => '4',
            'comment' => 'Docker',
            'created_at' => '2021-03-01 07:25:42',
            'updated_at' => '2021-03-02 07:25:42'
        ],
        [
            'user_id' => '4',
            'bulletin_id' => '5',
            'comment' => 'MDBootstrap',
            'created_at' => '2021-03-01 07:25:42',
            'updated_at' => '2021-03-02 07:25:42'
        ],
        [
            'user_id' => '5',
            'bulletin_id' => '1',
            'comment' => 'Laravel',
            'created_at' => '2021-03-01 07:25:42',
            'updated_at' => '2021-03-02 07:25:42'
        ],
        [
            'user_id' => '1',
            'bulletin_id' => '7',
            'comment' => 'PHPについて',
            'created_at' => '2021-03-01 07:25:42',
            'updated_at' => '2021-03-02 07:25:42'
        ],
        [
            'user_id' => '2',
            'bulletin_id' => '8',
            'comment' => 'Vue.jsについて',
            'created_at' => '2021-03-01 07:25:42',
            'updated_at' => '2021-03-02 07:25:42'
        ],
        [
            'user_id' => '3',
            'bulletin_id' => '9',
            'comment' => 'Dockerについて',
            'created_at' => '2021-03-01 07:25:42',
            'updated_at' => '2021-03-02 07:25:42'
        ],
        [
            'user_id' => '4',
            'bulletin_id' => '10',
            'comment' => 'MDBootstrapについて',
            'created_at' => '2021-03-01 07:25:42',
            'updated_at' => '2021-03-02 07:25:42'
        ],
        [
            'user_id' => '5',
            'bulletin_id' => '6',
            'comment' => 'Laravelについて',
            'created_at' => '2021-03-01 07:25:42',
            'updated_at' => '2021-03-02 07:25:42'
        ],
        ]);
    }
}
