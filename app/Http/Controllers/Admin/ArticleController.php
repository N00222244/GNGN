<?php

namespace App\Http\Controllers\Admin;

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
        $user->authorizeRoles('admin');



        //$articles = Article::all();

        $articles = Article::with('author')->get();
        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */


     public function create()
    {

        $user = Auth::user();
        $user->authorizeRoles('admin');
        $authors = Author::all();
        return view('admin.articles.create')->with('authors', $authors); 
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
             'img_src' => 'nullable',
             'references' => 'nullable|string|max:255',
             'author_id'=> 'required',
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
             'author_id' => $request->author_id,
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
        $authors = Author::all();
        return view('admin.articles.edit')->with('articles',$article)->with('authors',$authors);
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
                'author_id' => 'required',
                'references' => 'nullable|string|max:255',

            ]);

          

            $article->update([
                

                'heading' => $request->heading,
                'subheading' => $request->subheading,
                'category' => $request->category,
                'body' => $request->body,
                'pub_date' => $request->pub_date,
                'img_src' => $request->article_image_name,
                'author_id' => $request->author_id,
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
