<?php

namespace App\Http\Controllers\Oragnizer;

use App\Http\Controllers\Organizer;
use Illuminate\Http\Request;
use App\Models\Article;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $user->authorizeRoles('organizer');

        $articles = Article::all();
        return view('organizer.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */


    
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = Auth::user();
        $user->authorizeRoles('organizer');
        
       $article = Article::find($id);
        return view('organizer.articles.show')->with('articles', $article);
    }

    
   
}
