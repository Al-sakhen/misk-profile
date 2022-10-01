<?php

namespace App\Http\Controllers\Api;

use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function index(){

        $news = News::all();

        return response()->json([
            'status' => true,
            'news' => $news
        ]);

    }
}
