<?php

use Illuminate\Database\Seeder;

class AnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $question_ids = DB::table('questions')->pluck('id');
        $first_question_id = $question_ids[0];
        $second_question_id = $question_ids[1];

        DB::table('answers')->insert([
            [
                'body' => 'Yay! First answer',
                'question_id' => $first_question_id
            ],
            [
                'body' => '42',
                'question_id' => $first_question_id
            ],
            [
                'body' => 'Another answer',
                'question_id' => $second_question_id
            ]
        ]);
    }
}
