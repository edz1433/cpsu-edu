<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Article;
use Illuminate\Support\Str;

class ArticlesController extends Controller
{
    
    public function createArticles(){
        return view('webadmin.articles-create');
    }

    public function storeArticles(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif|max:10240', // Make the 'thumbnail' field optional
        ]);
    
        $rand = rand(1000, 9999);
        $timestamp = now()->format('YmdHis');
    
        $category = 'News';
        $randomFilename = "News-{$timestamp}-" . $rand . '.txt';
    
        $contentFilePath = "Uploads/News/content/{$randomFilename}";
        $fullContentFilePath = public_path($contentFilePath);
        file_put_contents($contentFilePath, $validatedData['content']);
    
        // Handle the 'thumbnail' file if it's not empty
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $newFileName = 'thumbnail-' . $timestamp . '-' . $rand . '.' . $file->getClientOriginalExtension();
            $customPath = 'Uploads/News/thumbnail';
    
            $file->move(public_path($customPath), $newFileName);
        } else {
            // If 'thumbnail' is empty, set $newFileName to null or an appropriate default value
            $newFileName = null; // Or provide a default thumbnail filename
        }
    
        $article = new Article([
            'title' => $validatedData['title'],
            'content' => $randomFilename,
            'thumbnail' => $newFileName,
        ]);
    
        $article->save();
    
        return redirect()->back()->with('success', 'Article created successfully');
    }    

    public function updateArticles(Request $request, $id)
    {
        $article = Article::find($id);
    
        if (!$article) {
            return redirect()->back()->with('error', 'News not found.');
        }
    
        $validatedData = $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);
    
        $article->title = $validatedData['title'];
    
        if ($article->content) {
            $contentFilePath = "Uploads/News/content/{$article->content}";
            $fullContentFilePath = public_path($contentFilePath);
            file_put_contents($fullContentFilePath, $validatedData['content']);
        }
    
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $timestamp = now()->format('YmdHis');
            $rand = rand(1000, 9999);
            $newFileName = 'thumbnail-' . $timestamp . '-' . $rand . '.' . $file->getClientOriginalExtension();
            $customPath = 'Uploads/News/thumbnail/';
    
            $file->move(public_path($customPath), $newFileName);
    
            if ($article->thumbnail) {
                $oldThumbnailPath = public_path($customPath . $article->thumbnail);
                if (file_exists($oldThumbnailPath)) {
                    unlink($oldThumbnailPath);
                }
            }
    
            $article->thumbnail = $newFileName;
        }
    
        $article->save();
    
        return redirect()->back()->with('success', 'News updated successfully');
    }  

    public function editArticles($id){
        $article = Article::find($id);
        return view('webadmin.articles-edit', compact('article'));
    }

    public function articleContent($id){
        $article = Article::find($id);
        return view('webadmin.article-content', compact('article'));
    }

}
