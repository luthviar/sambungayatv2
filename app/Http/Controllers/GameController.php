<?php

namespace App\Http\Controllers;

use App\Quran;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Session;

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

        $question = new Quran();
        $questions = $question->all();

        //get modul training

        dd($questions);

//        return view('user.news.index')->with('newses', $news)->with('module', $modul);

//        return view('user.newsboard')->with('newses',$news);
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
        return view('landing')->with('thestring',$the_question);
    }
}