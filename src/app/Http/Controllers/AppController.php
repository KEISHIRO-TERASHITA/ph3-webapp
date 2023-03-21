<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Study;
use App\Language;
use App\Content;
use DateTime;

class AppController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $studies = Study::where('user_id', Auth::id())->get();
        $month_studies = Study::month()->where('user_id', Auth::id())->get();
        $today_studies = Study::date()->where('user_id', Auth::id())->get();
        $languages = Language::all();
        $contents = Content::all();
        $hours = 0;
        foreach($studies as $study)
        {
            $hours += $study->hours;
        }
        $month_hours = 0;
        foreach($month_studies as $study)
        {
            $month_hours += $study->hours;
        }
        $today_hours = 0;
        foreach($today_studies as $study)
        {
            $today_hours += $study->hours;
        }
        return view('webApp.index', compact('studies', 'hours', 'month_studies', 'month_hours', 'today_studies', 'today_hours', 'languages', 'contents'));
    }
}
