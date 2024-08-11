<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');


        $authors = Author::all();
        return view('admin.authors.index')->with('authors', $authors);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $user = Auth::user();
        $user->authorizeRoles('admin');
        $authors = Author::all();
        return view('admin.authors.create')->with('authors', $authors); 
    }

    /**
     * Store a newly created resource in storage.
     */
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
        ]);
    
        // Create the article
        Article::create([
            'name' => $request->name,
            'bio' => $request->bio,
            'phone_no' => $request->phone_no,
            'email' => $request->email,
            'img_src' => $request->img_src,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        return to_route('admin.authors.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');
      

       $articles = $author->articles;
        return view('admin.authors.show', compact('author', 'articles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)

    {

        $user = Auth::user();
        $user->authorizeRoles('admin');
        $article = Article::all();
        $author = Author::find($id);
        return view('admin.authors.edit')->with('articles',$article)->with('authors',$author);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {

        $user = Auth::user();
        $user->authorizeRoles('admin');
    
        $request->validate([
                'name' => 'required', 
            'bio' => 'required',
            'phone_no' => 'required',
            'email' => 'required',
            'img_src' => 'required',
        ]);

          

            $author->update([
                

                'name' => $request->name,
            'bio' => $request->bio,
            'phone_no' => $request->phone_no,
            'email' => $request->email,
            'img_src' => $request->img_src,
            'created_at' => now(),
            'updated_at' => now(),
            ]);

            return to_route('admin.authors.show', $author);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {

        $user = Auth::user();
        $user->authorizeRoles('admin');

        $author->delete();
        return to_route('admin.authors.index')->with('success', 'Author deleted succesfully');
    }
}
