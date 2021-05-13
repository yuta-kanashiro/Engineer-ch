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
            'birthday' => '1998-07-13 00:00:00',
            'prefecture_id' => '1',
            'password' => bcrypt('sample1'),
            'created_at' => '2021-03-01 07:25:42',
            'updated_at' => '2021-03-02 07:25:42'
        ],
        [
            'name' => 'sample2',
            'email' => 'sample2@sample.com',
            'birthday' => '1998-08-13 00:00:00',
            'prefecture_id' => '2',
            'password' => bcrypt('sample2'),
            'created_at' => '2021-03-01 07:25:42',
            'updated_at' => '2021-03-02 07:25:42'
        ],
        [
            'name' => 'sample3',
            'email' => 'sample3@sample.com',
            'birthday' => '1998-09-13 00:00:00',
            'prefecture_id' => '3',
            'password' => bcrypt('sample3'),
            'created_at' => '2021-03-01 07:25:42',
            'updated_at' => '2021-03-02 07:25:42'
        ],
        [
            'name' => 'sample4',
            'email' => 'sample4@sample.com',
            'birthday' => '1998-10-13 00:00:00',
            'prefecture_id' => '4',
            'password' => bcrypt('sample4'),
            'created_at' => '2021-03-01 07:25:42',
            'updated_at' => '2021-03-02 07:25:42'
        ],
        [
            'name' => 'sample5',
            'email' => 'sample5@sample.com',
            'birthday' => '1998-11-13 00:00:00',
            'prefecture_id' => '5',
            'password' => bcrypt('sample5'),
            'created_at' => '2021-03-01 07:25:42',
            'updated_at' => '2021-03-02 07:25:42'
        ],
        ]);
    }
}
