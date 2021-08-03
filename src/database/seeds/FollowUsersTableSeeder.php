<?php

use Illuminate\Database\Seeder;

class FollowUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('follow_users')->insert([
        [
            'following_id' => '1',
            'follower_id' => '2',
            'created_at' => '2021-03-01 07:25:42',
            'updated_at' => '2021-03-01 07:25:42'
        ],
        [
            'following_id' => '1',
            'follower_id' => '3',
            'created_at' => '2021-03-02 07:25:42',
            'updated_at' => '2021-03-02 07:25:42'
        ],
        [
            'following_id' => '1',
            'follower_id' => '4',
            'created_at' => '2021-03-03 07:25:42',
            'updated_at' => '2021-03-03 07:25:42'
        ],
        [
            'following_id' => '1',
            'follower_id' => '5',
            'created_at' => '2021-03-04 07:25:42',
            'updated_at' => '2021-03-04 07:25:42'
        ],
        [
            'following_id' => '2',
            'follower_id' => '3',
            'created_at' => '2021-03-05 07:25:42',
            'updated_at' => '2021-03-05 07:25:42'
        ],
        [
            'following_id' => '2',
            'follower_id' => '4',
            'created_at' => '2021-03-06 07:25:42',
            'updated_at' => '2021-03-06 07:25:42'
        ],
        [
            'following_id' => '3',
            'follower_id' => '4',
            'created_at' => '2021-03-07 07:25:42',
            'updated_at' => '2021-03-07 07:25:42'
        ],
        [
            'following_id' => '3',
            'follower_id' => '5',
            'created_at' => '2021-03-08 07:25:42',
            'updated_at' => '2021-03-08 07:25:42'
        ],
        [
            'following_id' => '4',
            'follower_id' => '5',
            'created_at' => '2021-03-09 07:25:42',
            'updated_at' => '2021-03-09 07:25:42'
        ],
        [
            'following_id' => '4',
            'follower_id' => '1',
            'created_at' => '2021-03-10 07:25:42',
            'updated_at' => '2021-03-10 07:25:42'
        ],
        [
            'following_id' => '5',
            'follower_id' => '1',
            'created_at' => '2021-03-11 07:25:42',
            'updated_at' => '2021-03-11 07:25:42'
        ],
        [
            'following_id' => '5',
            'follower_id' => '2',
            'created_at' => '2021-03-12 07:25:42',
            'updated_at' => '2021-03-12 07:25:42'
        ],
        ]);
    }
}
