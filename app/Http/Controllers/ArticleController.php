<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use function Laravel\Prompts\error;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::with(['user'])->get();
        return view('article.index', compact('articles'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('article.create', compact('categories'));
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required'
        ]);

        $article = Auth::user()->articles()->create($attributes);

        if ($request->hasFile('image')) {
            $originalName = $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('images', $article->id . '/' . $originalName, 'public');
            $article->update(['image' => $path]);
        }

        return redirect()->route('article.index');
    }
    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        
        return view('article.show', compact('article'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $categories = Category::all();
        return view('article.edit', compact('article', 'categories'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        // dd($request->all());
        $attributes = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required'
        ]);

        $article->update($attributes);

        if ($request->hasFile('image')) 
        {

            if ($article->image) 
            {
                Storage::disk('public')->delete($article->image);
            }

            $originalName = $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('images', $article->id . '/' . $originalName, 'public');
            $article->update(['image' => $path]);
        } 

        return redirect()->route('article.index');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        
        //
    }
}
