<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('category')->latest()->get();
        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('articles.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required',
            'content' => 'required',
            'category_id' => 'nullable|exists:categories,id'
        ]);

        Article::create($request->all());

        return redirect()->route('articles.index')->with('success', 'Article created');
    }

    public function edit(Article $article)
    {
        $categories = Category::all();
        return view('articles.edit', compact('article', 'categories'));
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title'   => 'required',
            'content' => 'required',
            'category_id' => 'nullable|exists:categories,id'
        ]);

        $article->update($request->all());

        return redirect()->route('articles.index')->with('success', 'Article updated');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index')->with('success', 'Article deleted');
    }
}

