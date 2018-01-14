<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

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

        function get_ayat($ayat_surat = 1, $max = 0) {
            if (is_int($ayat_surat)) {
                $random_ayat = rand(1, $ayat_surat);
            } else {
                $random_ayat = rand(1, (int) $ayat_surat);
            }

            $random_surat = rand(78, 114);

            $get_ayat = Quran::where('no_surat', $random_surat)->where('ayat_surat',$random_ayat)->get();

            if(count($get_ayat) >= $max) {
                return $get_ayat;
            } else {
                return get_ayat($ayat_surat,$max);
            }
        }

        function random_opsi($index=0, $max=1) {
            $the_random = rand($index,$max);

            if($the_random<=$index ) {
                return $the_random;
            } else {
                return random_opsi($index,$max);
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

        // save it to array, to pass it to controller
        $array['question'] = $question;
        $array['true_answer'] = $true_answer;
        $array['lengkap'] = $lengkap;

        // prepare question to save to DB
        $question_store['question_content'] = '';
        foreach($array['lengkap'] as $text) {
            if($array['true_answer']->word == $text->word) {
                $question_store['question_content'] .= json_decode($question_store['question_content'], true).'٠٠٠';
            } else {
                $question_store['question_content'] .= json_decode($question_store['question_content'], true).$text->word;
            }
        }

        // save right question to DB
        $id_question = DB::table('questions')->insertGetId(
            [
                'question_content' => $question_store['question_content'],
                'no_surat' => $no_surat,
                'ayat_surat' => $random_ayat,
            ]
        );

        // prepare and save question_options to save to DB
        $max_pg = 8;
        $option_table = '';
        $options[] = '';

        if (count($array['lengkap']) >= $max_pg ) {

            $counter = 0;
            for($i = 0; $i<$max_pg-1; $i++) {

                $option_table = new QuestionOptions();
                $option_table->option_content = $array['lengkap'][$i]->word;
                $option_table->id_question = $id_question;
                $option_table->is_true = 0;
                $options[$i] = $array['lengkap'][$i]->word;
                $option_table->save();

            }
            $option_table = new QuestionOptions();
            $option_table->option_content = $array['true_answer']->word;
            $option_table->id_question = $id_question;
            $option_table->is_true = 1;
            $options[$max_pg] = $array['true_answer']->word;
            $option_table->save();
        } else {
            $new_options = get_ayat($last_ayat->ayat_surat, $max_pg);
            $counter = 0;
            if (count($new_options) >= $max_pg) {
                for($i = 0; $i<$max_pg-1; $i++) {

                    $option_table = new QuestionOptions();
                    $option_table->option_content = $new_options[$i]->word;
                    $option_table->id_question = $id_question;
                    $option_table->is_true = 0;
                    $options[$i] = $new_options[$i]->word;
                    $option_table->save();

                }
                $option_table = new QuestionOptions();
                $option_table->option_content = $array['true_answer']->word;
                $option_table->id_question = $id_question;
                $option_table->is_true = 1;
                $options[$max_pg] = $array['true_answer']->word;
                $option_table->save();

            }
        }

        $array['options'] = collect($options)->shuffle()->all();
//        dd($array);

        return $array;
    }
}