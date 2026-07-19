<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::with('createdBy', 'updatedBy')->latest()->paginate(10);
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:191',
            'title_bs' => 'nullable|string|max:191',
            'summary' => 'nullable|string',
            'summary_bs' => 'nullable|string',
            'content' => 'required|string',
            'content_bs' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'is_published' => 'boolean',
        ]);

        $news = new News();
        $news->title = $validated['title'];
        $news->title_bs = $validated['title_bs'] ?? null;

        $slug = Str::slug($validated['title']);
        if (News::where('slug', $slug)->exists()) {
            $slug .= '-'.uniqid();
        }
        $news->slug = $slug;

        $news->summary = $validated['summary'] ?? null;
        $news->summary_bs = $validated['summary_bs'] ?? null;
        $news->content = $validated['content'];
        $news->content_bs = $validated['content_bs'] ?? null;
        $news->is_published = $request->has('is_published');
        $news->published_at = $news->is_published ? now() : null;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('news', 'public');
            $news->image_path = $path;
        }

        $news->created_by = session('admin_id');
        $news->updated_by = session('admin_id');

        $news->save();

        return redirect()->route('admin.news.index')->with('success', 'Haber başarıyla eklendi.');
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:191',
            'title_bs' => 'nullable|string|max:191',
            'summary' => 'nullable|string',
            'summary_bs' => 'nullable|string',
            'content' => 'required|string',
            'content_bs' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'is_published' => 'boolean',
        ]);

        $news->title = $validated['title'];
        $news->title_bs = $validated['title_bs'] ?? null;

        // Prevent duplicate slugs by appending unique ID if needed
        $slug = Str::slug($validated['title']);
        if ($slug !== $news->slug && News::where('slug', $slug)->exists()) {
            $slug .= '-' . uniqid();
        }
        $news->slug = $slug;

        $news->summary = $validated['summary'] ?? null;
        $news->summary_bs = $validated['summary_bs'] ?? null;
        $news->content = $validated['content'];
        $news->content_bs = $validated['content_bs'] ?? null;
        $news->is_published = $request->has('is_published');
        
        if ($news->is_published && !$news->published_at) {
            $news->published_at = now();
        } elseif (!$news->is_published) {
            $news->published_at = null;
        }

        if ($request->hasFile('image')) {
            if ($news->image_path) {
                Storage::disk('public')->delete($news->image_path);
            }
            $path = $request->file('image')->store('news', 'public');
            $news->image_path = $path;
        } elseif ($request->has('remove_image')) {
            if ($news->image_path) {
                Storage::disk('public')->delete($news->image_path);
                $news->image_path = null;
            }
        }

        $news->updated_by = session('admin_id');

        $news->save();

        return redirect()->route('admin.news.index')->with('success', 'Haber güncellendi.');
    }

    public function destroy(News $news)
    {
        if ($news->image_path) {
            Storage::disk('public')->delete($news->image_path);
        }
        $news->delete();

        return redirect()->route('admin.news.index')->with('success', 'Haber silindi.');
    }
}
