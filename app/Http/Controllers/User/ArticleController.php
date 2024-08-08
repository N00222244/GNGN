<?php



namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Author;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $user->authorizeRoles('user');

        $articles = Article::with('author')->get();
        return view('user.articles.index', compact('articles'));
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
        $user->authorizeRoles('user');
        
       $article = Article::find($id);
        return view('user.articles.show')->with('articles', $article);
    }

    
   
}
