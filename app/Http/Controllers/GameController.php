<?php

namespace App\Http\Controllers;

use App\QuestionOptions;
use App\Quran;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Session;
use App\Answer;
use App\Question;

class GameController extends Controller
{
    // MIDDLEWARE
//    public function __construct()
//    {
//        $this->middleware('auth', ['except' => [
//            'index', 'viewnews', 'get_all_news', 'get_active_news', 'get_news', 'paginate_news', 'storeCommentByUser'
//        ]]);
//        $this->middleware('isAdmin', ['except' => [
//            'index', 'viewnews', 'get_all_news', 'get_active_news', 'get_news', 'paginate_news', 'storeCommentByUser'
//        ]]);
//
//    }

    public function index()
    {
//        $news = new News();
//        $news = $news->get_all_news();

//        $question = new Quran();
//        $questions = $question->all();

        //get modul training

//        dd($questions);

//        return view('user.news.index')->with('newses', $news)->with('module', $modul);

        return view('welcome');
    }

    public function pilih_surat(){
        return view('list_surah');
    }

    public function selected_surat(Request $request) {
        $id_attempt = DB::table('user_attempts')->insertGetId(
            [
                'id_user' => \Auth::user()->id,
            ]
        );

        Session::put('id_attempt',$id_attempt);

        return redirect(url(action('GameController@get_the_question',$request->listSurah)));
    }

    public function get_the_surah($no_surat){
        $surahs = new Quran();
        $the_surah = $surahs->get_the_surah($no_surat);

        return $the_surah;
    }

    public function get_the_question($no_surat){
        $quran = new Quran();
        $the_question = $quran->get_the_question($no_surat);
//        return $the_question;
        return view('landing')->with('thestring',$the_question)->with('no_surat',$no_surat);
    }

    public function finish_all(Request $request, $id_attempt) {

        $total_benar = Answer::where('id_attempt',$id_attempt)->where('id_user',\Auth::user()->id)->where('is_true',1)->get();
        $total_salah = Answer::where('id_attempt',$id_attempt)->where('id_user',\Auth::user()->id)->where('is_true',0)->get();
        $total_pertanyaan = Answer::where('id_attempt',$id_attempt)->where('id_user',\Auth::user()->id)->get();

        $total_all = Answer::where('id_user',\Auth::user()->id)->get();

        return view('result')->with('total_benar',count($total_benar))->with('total_salah',count($total_salah))
            ->with('total_pertanyaan',count($total_pertanyaan))->with('total_all',count($total_all));
    }

    public function next_question(Request $request, $no_surat) {
        $quran = new Quran();
        $the_question = $quran->get_the_question($no_surat);
        $the_true = QuestionOptions::where('id_question',$request->id_question)->where('is_true',1)->first();
//        dd($request->option);
        $answer = new Answer();
        $answer->id_user = \Auth::user()->id;
        $answer->answer = $request->option;
        $answer->id_question = $request->id_question;
        $answer->id_attempt = $request->id_attempt;
        if($request->option == $the_true->option_content) {
            $answer->is_true = 1;
        } else {
            $answer->is_true = 0;
        }
        $answer->save();

        return redirect(action('GameController@get_the_question',$no_surat));
//        return view('landing')->with('thestring',$the_question)->with('no_surat',$no_surat);
    }

    public function result(){
        return view('result');
    }
}