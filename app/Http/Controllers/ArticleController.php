<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('article.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

//        dd($request);
//        $this->validate($request, [
//            'title' => 'required',
//            'body' => 'required']);
//
//        $user_id = Auth::user()->id;
//
////        dd($user_id);
//
//        $article = new Article();
//        $article->create($request->only('title', 'body' ,'video_id','$user_id'));
        $request->user()->articles()->create($request->only('title', 'body' ,'video_id'));
        return redirect('/home')->with('info', 'article saved successfully!');
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }

    public static  function getUser($val){
        $startTime = Carbon::parse(date('Y-m-d H:i:s'));
        $endTime = Carbon::parse($val);
//        dd($startTime, $endTime);
        $totalDuration = $endTime->diffForHumans($startTime);

        return view('welcome', compact('totalDuration'));
    }
}
