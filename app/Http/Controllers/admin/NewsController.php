<?php

namespace App\Http\Controllers\admin;
use Carbon\Carbon;
use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $newses=News::query();
        if ($request->search){
            $search=$request->search;
            $newses->where('name','LIKE',"%{$search}%");
        }
        $newses=  $newses->latest()->paginate(10);
        return view('admin.news.all',compact(['newses']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=auth()->user();
        $data = $request->validate([
            'title' => 'required|max:256',
            'content' => 'required',
            'show' => 'required',
        ]);
        $user->newses()->create($data);
        alert()->success(__('alert.a7'));
        return redirect()->route('news.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {

        return view('admin.news.edit',compact(['news']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
         $user=auth()->user();
        $data = $request->validate([
            'title' => 'required|max:256',
            'content' => 'required',
            'show' => 'required',
        ]);
        $news->update($data);
        alert()->success(__('alert.a7'));
        return redirect()->route('news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        //
    }

    public function single_news(News $news)
    {
        return view('admin.news.single_news',compact(['news']));
    }
    public function news_list(Request $request)
    {
        $newses=News::query();
        if ($request->search){
            $search=$request->search;
            $newses->where('name','LIKE',"%{$search}%");
        }
        $newses=  $newses->whereShow(1)->whereMonth(
            'created_at', '=', Carbon::now()->month
        )->latest()->paginate(10);
        return view('admin.news.news_list',compact(['newses']));
    }
}
