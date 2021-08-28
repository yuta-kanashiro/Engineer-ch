<?php

use Illuminate\Database\Seeder;

class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('likes')->insert([
        [
            'user_id' => '1',
            'bulletin_id' => '6',
            'created_at' => '2021-03-01 07:25:42',
            'updated_at' => '2021-03-02 07:25:42'
        ],
        [
            'user_id' => '1',
            'bulletin_id' => '4',
            'created_at' => '2021-03-02 07:25:42',
            'updated_at' => '2021-03-03 07:25:42'
        ],
        [
            'user_id' => '1',
            'bulletin_id' => '2',
            'created_at' => '2021-03-03 07:25:42',
            'updated_at' => '2021-03-04 07:25:42'
        ],
        [
            'user_id' => '1',
            'bulletin_id' => '3',
            'created_at' => '2021-03-04 07:25:42',
            'updated_at' => '2021-03-05 07:25:42'
        ],
        [
            'user_id' => '1',
            'bulletin_id' => '1',
            'created_at' => '2021-03-05 07:25:42',
            'updated_at' => '2021-03-06 07:25:42'
        ],
        [
            'user_id' => '1',
            'bulletin_id' => '8',
            'created_at' => '2021-03-06 07:25:42',
            'updated_at' => '2021-03-07 07:25:42'
        ],
        [
            'user_id' => '2',
            'bulletin_id' => '4',
            'created_at' => '2021-03-01 07:25:42',
            'updated_at' => '2021-03-02 07:25:42'
        ],
        [
            'user_id' => '3',
            'bulletin_id' => '5',
            'created_at' => '2021-03-01 07:25:42',
            'updated_at' => '2021-03-02 07:25:42'
        ],
        [
            'user_id' => '4',
            'bulletin_id' => '1',
            'created_at' => '2021-03-01 07:25:42',
            'updated_at' => '2021-03-02 07:25:42'
        ],
        [
            'user_id' => '5',
            'bulletin_id' => '2',
            'created_at' => '2021-03-01 07:25:42',
            'updated_at' => '2021-03-02 07:25:42'
        ],
        [
            'user_id' => '2',
            'bulletin_id' => '9',
            'created_at' => '2021-03-02 07:25:42',
            'updated_at' => '2021-03-03 07:25:42'
        ],
        [
            'user_id' => '3',
            'bulletin_id' => '10',
            'created_at' => '2021-03-02 07:25:42',
            'updated_at' => '2021-03-03 07:25:42'
        ],
        [
            'user_id' => '4',
            'bulletin_id' => '6',
            'created_at' => '2021-03-02 07:25:42',
            'updated_at' => '2021-03-03 07:25:42'
        ],
        [
            'user_id' => '5',
            'bulletin_id' => '7',
            'created_at' => '2021-03-02 07:25:42',
            'updated_at' => '2021-03-03 07:25:42'
        ],
        ]);
    }
}
