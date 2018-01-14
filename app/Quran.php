<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quran extends Model
{
    protected $table="qurans";

    public function get_all_qurans() {
        $qurans = Quran::all();
        return $qurans;
    }

    public function get_the_surah($no_surat){

        $surahs = Quran::where('no_surat', $no_surat)->orderBy('id')->get();

        return $surahs;
    }

    // berisi pertanyaan beserta PG nya, lalu jawabannya
    public function get_the_question($no_surat){

        function get_ayat($ayat_surat, $max = 0) {
            $random_ayat = rand(1, $ayat_surat);
            $random_surat = rand(78, 114);

            $get_ayat = Quran::where('no_surat', $random_surat)->where('ayat_surat',$random_ayat)->get();

            if(count($get_ayat) >= $max) {
                return $get_ayat;
            } else {
                return $get_ayat($ayat_surat,$max);
            }
        }

        // create a random ayat
        $last_ayat = Quran::where('no_surat', $no_surat)->orderBy('id','desc')->first();

        $random_ayat = rand(1, $last_ayat->ayat_surat);

        // create an answer
        $first_id = Quran::where('no_surat',$no_surat)
            ->where('ayat_surat', $random_ayat)->orderBy('id')->first()->id;
        $last_id = Quran::where('no_surat',$no_surat)
            ->where('ayat_surat', $random_ayat)->orderBy('id','desc')->first()->id;

        $random_answer_id = rand($first_id,$last_id);

        $true_answer = Quran::where('id',$random_answer_id)->first();

        // create a question
        $question = Quran::where('no_surat',$no_surat)
            ->where('ayat_surat',$random_ayat)
            ->where('id','!=',$random_answer_id)->get();

        $lengkap = Quran::where('no_surat',$no_surat)
            ->where('ayat_surat',$random_ayat)->get();

        if (count($question) == 0) {
            $this->get_the_question($no_surat);
        }

        // save it then return
        $array['question'] = $question;
        $array['true_answer'] = $true_answer;
        $array['lengkap'] = $lengkap;

        // prepare question to save to DB
        $question_store['question_content'] = '';
        foreach($array['lengkap'] as $text) {
            if($array['true_answer']->word == $text->word) {
                $question_store['question_content'] .= json_decode($question_store['question_content'], true).'...';
            } else {
                $question_store['question_content'] .= json_decode($question_store['question_content'], true).$text->word;
            }
        }

        // save question_store variable to DB
//        $question_table = new Question();
//        $question_table->question_content = $question_store['question_content'];
//        $question_table->save();

        $id_question = DB::table('questions')->insertGetId(
            [
                'question_content' => $question_store['question_content'],
            ]
        );

        // prepare question_options to save to DB
        $max_pg = 4;
        $option_store = '';


        if (count($array['lengkap']) >= $max_pg ) {
            for($i = 0; $i<$max_pg-1; $i++) {
                $option_table = new QuestionOptions();
                $option_table->option_content = $array['lengkap'][$i]->word;
                $option_table->id_question = $id_question;
                $option_table->save();
            }
            $option_table = new QuestionOptions();
            $option_table->option_content = $array['true_answer']->word;
            $option_table->id_question = $id_question;
            $option_table->save();
        } else {
            $new_options = get_ayat($last_ayat, $max_pg);

            if ($new_options >= $max_pg) {
                for($i = 0; $i<$max_pg-1; $i++) {
                    $option_table = new QuestionOptions();
                    $option_table->option_content = $array['lengkap'][$i]->word;
                    $option_table->id_question = $id_question;
                    $option_table->save();
                }
                $option_table = new QuestionOptions();
                $option_table->option_content = $array['true_answer']->word;
                $option_table->id_question = $id_question;
                $option_table->save();
            }
        }

        // save question_option to DB


//        dd($question_table);

        return $array;
    }
}