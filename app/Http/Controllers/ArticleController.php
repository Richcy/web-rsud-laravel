<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Article;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $articles = Article::get();


        return view('admin.articles.article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.articles.article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'sub_desc' => 'required',
            'description' => 'required',
            'category' => 'required',
            'author' => 'required',
            'img' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        if ($request->img) {
            $img = $request->file('img');
            $articleName = $request->title;
            $imgName = $articleName . '.' . $request->file('img')->getClientOriginalExtension();
            $path = $img->storeAs('articles', $imgName, 'public');

            Article::create([
                'title' => $request->title,
                'sub_desc' => $request->sub_desc,
                'description' => $request->description,
                'category' => $request->category,
                'author' => $request->author,
                'img' => $path,
            ]);
        } else {
            Article::create([
                'title' => $request->title,
                'sub_desc' => $request->sub_desc,
                'description' => $request->description,
                'category' => $request->category,
                'author' => $request->author,
                'img' => 'default.jpg',
            ]);
        }



        return redirect()->route('artikel.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $article = Article::findOrFail($id);

        return view('admin.articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $article = Article::findOrFail($id);

        return view('admin.articles.article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'sub_desc' => 'required',
            'description' => 'required',
            'category' => 'required',
            'author' => 'required',
            'img' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $article = Article::findOrFail($id);

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $articleName = $request->title;
            $timestamp = now()->format('d-m-Y_H-i-s');
            $imgName = $articleName . '_' . $timestamp . '.' . $img->getClientOriginalExtension();

            $path = $img->storeAs('articles', $imgName, 'public');
            if ($article->img && !str_contains($article->img, 'default.jpg')) {

                Storage::delete('public/' . $article->img);
            }

            $article->update([
                'title' => $request->title,
                'sub_desc' => $request->sub_desc,
                'description' => $request->description,
                'category' => $request->category,
                'author' => $request->author,
                'img' => $path,
            ]);
        } else {
            $article->update([
                'title' => $request->title,
                'sub_desc' => $request->sub_desc,
                'description' => $request->description,
                'category' => $request->category,
                'author' => $request->author,
            ]);
        }

        return redirect()->route('artikel.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $article = article::findOrFail($id);

        if ($article->img && !str_contains($article->img, 'default.jpg')) {

            $path = 'public/' . $article->img;
            if (Storage::exists($path)) {
                Storage::delete($path);
            } else {
                Log::warning("File not found for deletion: " . $path);
            }
        }
        $article->delete();

        return redirect()->route('artikel.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
