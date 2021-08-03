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
            'summary' => 'ここは概要欄です！Laravelについて語ろう！ここは概要欄です！Laravelについて語ろう！ここは概要欄です！Laravelについて語ろう！',
            'limited_key' => null,
            'created_at' => '2021-03-01 07:25:42',
            'updated_at' => '2021-03-02 07:25:42',
            'deleted_at' => null
        ],
        [
            'user_id' => '2',
            'title' => 'PHPについて語ろう',
            'summary' => 'ここは概要欄です！PHPについて語ろう！ここは概要欄です！PHPについて語ろう！ここは概要欄です！PHPについて語ろう！',
            'limited_key' => null,
            'created_at' => '2021-03-02 07:25:42',
            'updated_at' => '2021-03-03 07:25:42',
            'deleted_at' => null
        ],
        [
            'user_id' => '3',
            'title' => 'Vue.jsについて語ろう',
            'summary' => 'ここは概要欄です！Vue.jsについて語ろう！ここは概要欄です！Vue.jsについて語ろう！ここは概要欄です！Vue.jsについて語ろう！',
            'limited_key' => null,
            'created_at' => '2021-03-03 07:25:42',
            'updated_at' => '2021-03-04 07:25:42',
            'deleted_at' => null
        ],
        [
            'user_id' => '4',
            'title' => 'Dockerについて語ろう',
            'summary' => 'ここは概要欄です！Dockerについて語ろう！ここは概要欄です！Dockerについて語ろう！ここは概要欄です！Dockerについて語ろう！',
            'limited_key' => null,
            'created_at' => '2021-03-04 07:25:42',
            'updated_at' => '2021-03-05 07:25:42',
            'deleted_at' => null
        ],
        [
            'user_id' => '5',
            'title' => 'MDBootstrapについて語ろう',
            'summary' => 'ここは概要欄です！MDBootstrapについて語ろう！ここは概要欄です！MDBootstrapについて語ろう！ここは概要欄です！MDBootstrapについて語ろう！',
            'limited_key' => null,
            'created_at' => '2021-03-05 07:25:42',
            'updated_at' => '2021-03-06 07:25:42',
            'deleted_at' => null
        ],
        [
            'user_id' => '1',
            'title' => 'Laravelについて語ろう（限定）',
            'summary' => 'ここは概要欄です！Laravel（限定）について語ろう！ここは概要欄です！Laravel（限定）について語ろう！ここは概要欄です！Laravel（限定）について語ろう！',
            'limited_key' => '限定',
            'created_at' => '2021-03-06 07:25:42',
            'updated_at' => '2021-03-07 07:25:42',
            'deleted_at' => null
        ],
        [
            'user_id' => '2',
            'title' => 'PHPについて語ろう（限定）',
            'summary' => 'ここは概要欄です！PHP（限定）について語ろう！ここは概要欄です！PHP（限定）について語ろう！ここは概要欄です！PHP（限定）について語ろう！',
            'limited_key' => '限定',
            'created_at' => '2021-03-07 07:25:42',
            'updated_at' => '2021-03-08 07:25:42',
            'deleted_at' => null
        ],
        [
            'user_id' => '3',
            'title' => 'Vue.jsについて語ろう（限定）',
            'summary' => 'ここは概要欄です！Vue.js（限定）について語ろう！ここは概要欄です！Vue.js（限定）について語ろう！ここは概要欄です！Vue.js（限定）について語ろう！',
            'limited_key' => '限定',
            'created_at' => '2021-03-08 07:25:42',
            'updated_at' => '2021-03-09 07:25:42',
            'deleted_at' => null
        ],
        [
            'user_id' => '4',
            'title' => 'Dockerについて語ろう（限定）',
            'summary' => 'ここは概要欄です！Docker（限定）について語ろう！ここは概要欄です！Docker（限定）について語ろう！ここは概要欄です！Docker（限定）について語ろう！',
            'limited_key' => '限定',
            'created_at' => '2021-03-09 07:25:42',
            'updated_at' => '2021-03-10 07:25:42',
            'deleted_at' => null
        ],
        [
            'user_id' => '5',
            'title' => 'MDBootstrapについて語ろう（限定）',
            'summary' => 'ここは概要欄です！MDBootstrap（限定）について語ろう！ここは概要欄です！MDBootstrap（限定）について語ろう！ここは概要欄です！MDBootstrap（限定）について語ろう！',
            'limited_key' => '限定',
            'created_at' => '2021-03-10 07:25:42',
            'updated_at' => '2021-03-11 07:25:42',
            'deleted_at' => null
        ],
        [
            'user_id' => '1',
            'title' => 'Laravel×Vue.jsについて語ろう',
            'summary' => 'ここは概要欄です！Laravel×Vue.jsについて語ろう！ここは概要欄です！Laravel×Vue.jsについて語ろう！ここは概要欄です！Laravel×Vue.jsについて語ろう！',
            'limited_key' => null,
            'created_at' => '2021-03-11 07:25:42',
            'updated_at' => '2021-03-12 07:25:42',
            'deleted_at' => null
        ],
        [
            'user_id' => '1',
            'title' => 'Laravel×Vue.jsについて語ろう（限定）',
            'summary' => 'ここは概要欄です！Laravel×Vue.js（限定）について語ろう！ここは概要欄です！Laravel×Vue.js（限定）について語ろう！ここは概要欄です！Laravel×Vue.js（限定）について語ろう！',
            'limited_key' => '限定',
            'created_at' => '2021-03-12 07:25:42',
            'updated_at' => '2021-03-13 07:25:42',
            'deleted_at' => null
        ],
        ]);
    }
}
