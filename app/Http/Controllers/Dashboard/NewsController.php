<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\News;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\dashboard\news\storeNewsRequest;
use App\Http\Requests\dashboard\news\updateNewsRequest;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all();
        return view('dashboard.news.index',compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeNewsRequest $request)
    {
        if($request->hasFile('image')){
            $path = $request->file('image')->store('images/news' , 'public');
        }
        News::create([
            'title' => $request->title,
            'image' => $path,
        ]);
        return redirect()->route('dashboard.news.index')->with(['status' => 'success', 'message' => 'News Created Successfully']);
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
        $news = News::find($news->id);
        return view('dashboard.news.edit',compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(updateNewsRequest $request, News $news)
    {
        $path = $news->image;
        if($request->hasFile('image')){
            Storage::disk('public')->delete($news->image);
            $path = $request->file('image')->store('images/news' , 'public');
        }
        $news->update([
            'title' => $request->title,
            'image' => $path,
        ]);
        return redirect()->route('dashboard.news.index')->with(['status' => 'success', 'message' => 'News Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();

        if(Storage::disk('public')->exists($news->image)) {
            Storage::disk('public')->delete($news->image);
        }

        return redirect()->route('dashboard.news.index')->with(['status' => 'success', 'message' => 'News Deleted Successfully']);
    }
}
