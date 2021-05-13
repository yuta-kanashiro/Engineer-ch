<?php

use Illuminate\Database\Seeder;

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
            'created_at' => '2021-03-01 07:25:42',
            'updated_at' => '2021-03-02 07:25:42',
            'deleted_at' => null
        ],
        [
            'user_id' => '2',
            'title' => 'PHPについて語ろう',
            'created_at' => '2021-03-01 07:25:42',
            'updated_at' => '2021-03-02 07:25:42',
            'deleted_at' => null
        ],
        [
            'user_id' => '3',
            'title' => 'Vue.jsについて語ろう',
            'created_at' => '2021-03-01 07:25:42',
            'updated_at' => '2021-03-02 07:25:42',
            'deleted_at' => null
        ],
        [
            'user_id' => '4',
            'title' => 'Dockerについて語ろう',
            'created_at' => '2021-03-01 07:25:42',
            'updated_at' => '2021-03-02 07:25:42',
            'deleted_at' => null
        ],
        [
            'user_id' => '5',
            'title' => 'MDBootstrapについて語ろう',
            'created_at' => '2021-03-01 07:25:42',
            'updated_at' => '2021-03-02 07:25:42',
            'deleted_at' => null
        ],
        ]);
    }
}
