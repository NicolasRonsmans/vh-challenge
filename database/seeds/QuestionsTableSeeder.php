<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->insert([
            [
                'body' => 'Yay! First question?'
            ],
            [
                'body' => 'And a second one?'
            ]
        ]);
    }
}
