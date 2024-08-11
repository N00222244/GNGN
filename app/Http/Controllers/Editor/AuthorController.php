<?php

namespace App\Http\Controllers\Editor;

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
        $user->authorizeRoles('editor');


        $authors = Author::all();
        return view('editor.authors.index')->with('authors', $authors);
    }


    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        $user = Auth::user();
        $user->authorizeRoles('editor');
      

       $articles = $author->articles;
        return view('editor.authors.show', compact('author', 'articles'));
    }

   
    
}
