<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $articles = Article::all();
        $startTime = Carbon::parse(date('Y-m-d H:i:s'));
        $endTime = Carbon::parse(Auth::user()->created_at);
        $totalDuration = $endTime->diffForHumans($startTime);
        return view('welcome', ['articles' => $articles  ], compact('totalDuration'));
    }

    public static  function getUser($val){
        $startTime = Carbon::parse(date('Y-m-d H:i:s'));
        $endTime = Carbon::parse($val);
//        dd($startTime, $endTime);
        $totalDuration = $endTime->diffForHumans($startTime);

        return view('welcome', compact('totalDuration'));
    }
}
