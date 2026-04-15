<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::where('is_published', true)
            ->whereNotNull('published_at')
            ->orderByDesc('published_at')
            ->paginate(6);
            
        return view('site.news.index', compact('news'));
    }

    public function show(News $news)
    {
        if (!$news->is_published) {
            abort(404);
        }

        return view('site.news.show', compact('news'));
    }
}
