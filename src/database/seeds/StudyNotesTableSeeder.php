<?php

use Illuminate\Database\Seeder;

class StudyNotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('study_notes')->insert([
        [
            'user_id' => '1',
            'title' => 'Laravelについて',
            'time' => '01:00:00',
            'summary' => 'LaravelについてLaravelについてLaravelについて',
            'created_at' => '2021-03-01 07:25:42',
            'updated_at' => '2021-03-02 07:25:42'
        ],
        [
            'user_id' => '2',
            'title' => 'PHPについて',
            'time' => '02:00:00',
            'summary' => 'PHPについてPHPについてPHPについて',
            'created_at' => '2021-03-01 07:25:42',
            'updated_at' => '2021-03-02 07:25:42'
        ],
        [
            'user_id' => '3',
            'title' => 'Vue.jsについて',
            'time' => '03:00:00',
            'summary' => 'Vue.jsについてVue.jsについてVue.jsについて',
            'created_at' => '2021-03-01 07:25:42',
            'updated_at' => '2021-03-02 07:25:42'
        ],
        [
            'user_id' => '4',
            'title' => 'Dockerについて',
            'time' => '04:00:00',
            'summary' => 'DockerについてDockerについてDockerについて',
            'created_at' => '2021-03-01 07:25:42',
            'updated_at' => '2021-03-02 07:25:42'
        ],
        [
            'user_id' => '5',
            'title' => 'MDBootstrapについて',
            'time' => '05:00:00',
            'summary' => 'MDBootstrapについてMDBootstrapについてMDBootstrapについて',
            'created_at' => '2021-03-01 07:25:42',
            'updated_at' => '2021-03-02 07:25:42'
        ],
        ]);
    }
}
