<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */


     public function create()
    {
        return view('articles.create'); // Ensure the view exists
    }


     public function store(Request $request)
     {
         // Validate the request
         $request->validate([
             'heading' => 'required|string|max:255',
             'subheading' => 'required|string|max:255',
             'category' => 'required|string|max:255',
             'body' => 'required|string',
             'pub_date' => 'required|date',
             'img_src' => 'nullable|url',
             'references' => 'nullable|string|max:255',
         ]);
     
         // Create the article
         Article::create([
             'heading' => $request->heading,
             'subheading' => $request->subheading,
             'category' => $request->category,
             'body' => $request->body,
             'pub_date' => $request->pub_date,
             'img_src' => $request->img_src,
             'references' => $request->references,
             'created_at' => now(),
             'updated_at' => now(),
         ]);
     
         return to_route('articles.index');
     }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        
       $article = Article::find($id);
        return view('articles.show')->with('articles', $article);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article = Article::find($id);
        return view('articles.edit')->with('articles', $article);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
    
            $request->validate([
                'heading' => 'required|string|max:255',
                'subheading' => 'required|string|max:255',
                'category' => 'required|string|max:255',
                'body' => 'required|string',
                'pub_date' => 'required|date',
                'img_src' => 'nullable|url',
                'references' => 'nullable|string|max:255',

            ]);

          

            $article->update([
                

                'heading' => $request->heading,
                'subheading' => $request->subheading,
                'category' => $request->category,
                'body' => $request->body,
                'pub_date' => $request->pub_date,
                'img_src' => $request->article_image_name,
                'references' => $request->references
            ]);

            return to_route('articles.show', $article);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return to_route('articles.index')->with('success', 'Article deleted succesfully');
    }
}
