<?php

namespace App\Http\Controllers\Editor;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Author;
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
        $user->authorizeRoles('editor');

        $articles = Article::with('author')->get();
        return view('editor.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */


     


     public function store(Request $request)
     {


        $user = Auth::user();
        $user->authorizeRoles('editor');


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
     
         return to_route('editor.articles.index');
     }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = Auth::user();
        $user->authorizeRoles('editor');
        
       $article = Article::find($id);
        return view('editor.articles.show')->with('articles', $article);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)

    {

        $user = Auth::user();
        $user->authorizeRoles('editor');
        $article = Article::find($id);
        $authors = Author::all();
        return view('editor.articles.edit')->with('articles',$article)->with('authors',$authors);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {

        $user = Auth::user();
        $user->authorizeRoles('editor');
    
            $request->validate([
                'heading' => 'required|string|max:255',
                'subheading' => 'required|string|max:255',
                'category' => 'required|string|max:255',
                'body' => 'required|string',
                'pub_date' => 'required|date',
                'img_src' => 'nullable',
                'author_id' => 'required',
                
                'references' => 'nullable|string|max:255',

            ]);

          

            $article->update([
                

                'heading' => $request->heading,
                'subheading' => $request->subheading,
                'category' => $request->category,
                'body' => $request->body,
                'pub_date' => $request->pub_date,
                'img_src' => $request->img_src,
                'author_id' => $request->author_id,
                'references' => $request->references
            ]);

            return to_route('editor.articles.show', $article);
    }

    /**
     * Remove the specified resource from storage.
     */
    

}
