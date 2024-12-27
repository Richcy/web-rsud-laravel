<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\ArticleCategory;

class ArticleCategoryController extends Controller
{
    public function showArticleCategory(): View
    {
        $articleCategories = ArticleCategory::get();
        return view('admin.articles.article_category.index', compact('articleCategories'));
    }

    public function storeArticleCategory(Request $request): RedirectResponse
    {
        ArticleCategory::create([
            'name' => $request->name,
        ]);

        return redirect()->route('article.showArticleCategory')->with(['success' => 'Data Berhasil Ditambah!']);
    }

    public function updateArticleCategory(Request $request, string $id): RedirectResponse
    {

        $articleCategory = ArticleCategory::findOrFail($id);

        $articleCategory->update([
            'name' => $request->name,
        ]);

        return redirect()->route('article.showArticleCategory')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroyArticleCategory(string $id): RedirectResponse
    {
        $articleCategory = ArticleCategory::findOrFail($id);
        $articleCategory->delete();
        return redirect()->route('article.showArticleCategory')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
