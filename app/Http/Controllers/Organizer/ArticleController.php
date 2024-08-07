<?php

namespace App\Http\Controllers\Organizer;

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
