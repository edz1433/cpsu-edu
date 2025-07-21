<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use App\Models\Article;
use App\Models\Submenu;
use App\Models\Sublink;
use App\Models\Category;

class WebController extends Controller
{
    public function webHome()
    {
        $file = File::all();
        $article = Article::orderBy('created_at', 'desc')->paginate(8);
        $submenu = Submenu::orderBy('title', 'asc')->get();
        $category = Category::all();
        return view('web.home', compact("article", "submenu", "category", "file"));
    }

    public function viewArticle($id)
    {
        $file = File::all();
        $articles = Article::orderBy('created_at', 'desc')->paginate(3);
        $article = Article::find($id);
        // if ($article) {
        //     $article->increment('visit');
        // }
        $submenu = Submenu::orderBy('title', 'asc')->get();
        $category = Category::all();
        return view('web.view-article', compact("article", "submenu", "category", "articles", "file"));
    }

    public function viewContent($id)
    {
        $file = File::all();
        $articles = Article::orderBy('created_at', 'desc')->paginate(3);
        $submenu = Submenu::orderBy('title', 'asc')->get();
        $submen = Submenu::join('categories', 'submenus.category', '=', 'categories.id')
        ->where('submenus.id', $id)
        ->select('submenus.*', 'categories.cat_name')
        ->first();
        if ($submen) {
            $submen->increment('visit');
        }
        $category = Category::all();
        return view('web.view-content', compact("submenu", "submen", "category", "articles", "file"));
    }
    
    public function viewSublinkContent($id)
    {
        $file = File::all();
        $articles = Article::orderBy('created_at', 'desc')->paginate(3);
        $submenu = Submenu::orderBy('title', 'asc')->get();
        $sublink = Sublink::find($id);
        if ($sublink) {
            $sublink->increment('visit');
        }
        $category = Category::all();
        return view('web.view-sublink-content', compact("submenu", "sublink", "category", "articles", "file"));
    }
    
    public function searchArticle(Request $request){
        
        $searchTerm = $request->input('s'); 
        $articles = Article::orderBy('created_at', 'desc')->paginate(3);
        $file = File::all();
        $submenu = Submenu::orderBy('title', 'asc')->get();
        $category = Category::all();

        $article = Article::where('title', 'LIKE', '%' . $searchTerm . '%')->get();
    
        return view('web.search-article', compact("articles", "article", "submenu", "file", "category"));
    } 
}
