<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $articles = Article::all();
        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */


     public function create()
    {

        $user = Auth::user();
        $user->authorizeRoles('admin');

        return view('admin.articles.create'); // Ensure the view exists
    }


     public function store(Request $request)
     {


        $user = Auth::user();
        $user->authorizeRoles('admin');


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
     
         return to_route('admin.articles.index');
     }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');
        
       $article = Article::find($id);
        return view('admin.articles.show')->with('articles', $article);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)

    {

        $user = Auth::user();
        $user->authorizeRoles('admin');

        $article = Article::find($id);
        return view('admin.articles.edit')->with('articles', $article);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {

        $user = Auth::user();
        $user->authorizeRoles('admin');
    
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

            return to_route('admin.articles.show', $article);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {

        $user = Auth::user();
        $user->authorizeRoles('admin');

        $article->delete();
        return to_route('admin.articles.index')->with('success', 'Article deleted succesfully');
    }
}
