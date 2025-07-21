<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Submenu;
use App\Models\Category;
use Illuminate\Support\Str;

class SubmenuController extends Controller
{
    public function createSubmenu (){
        $category = Category::all();
        return view('webadmin.submenu-create', compact('category'));
    }

    public function storeSubmenu(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'category' => 'required|string',
            'content' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240', 
        ]);
    
        $rand = rand(1000, 9999);
        $timestamp = now()->format('YmdHis');
    
        $category = Str::slug($validatedData['category'], '-');
        $randomFilename = "{$category}-{$timestamp}-" . $rand . '.txt';
    
        $contentFilePath = "Uploads/Submenu/content/{$randomFilename}";
        $fullContentFilePath = public_path($contentFilePath);
        file_put_contents($contentFilePath, $validatedData['content']);
    
        $newFileName = null;
    
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $newFileName = 'thumbnail-' . $timestamp . '-' . $rand . '.' . $file->getClientOriginalExtension();
            $customPath = 'Uploads/Submenu/thumbnail/';
    
            $file->move(public_path($customPath), $newFileName);
        }
    
        $submenu = new Submenu([
            'title' => $validatedData['title'],
            'category' => $validatedData['category'],
            'content' => $randomFilename,
            'thumbnail' => $newFileName,
        ]);
    
        $submenu->save();
    
        return redirect()->back()->with('success', 'Submenu created successfully');
    }    

    public function updateSubmenu(Request $request, $id)
    {
        $submenu = Submenu::find($id);
    
        if (!$submenu) {
            return redirect()->back()->with('error', 'Submenu not found.');
        }
    
        $validatedData = $request->validate([
            'title' => 'required|string',
            'category' => 'required|string',
            'content' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);
    
        $submenu->title = $validatedData['title'];
        $submenu->category = $validatedData['category'];
    
        if ($submenu->content) {
            $contentFilePath = "Uploads/Submenu/content/{$submenu->content}";
            $fullContentFilePath = public_path($contentFilePath);
            file_put_contents($fullContentFilePath, $validatedData['content']);
        }
    
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $timestamp = now()->format('YmdHis');
            $rand = rand(1000, 9999);
            $newFileName = 'thumbnail-' . $timestamp . '-' . $rand . '.' . $file->getClientOriginalExtension();
            $customPath = 'Uploads/Submenu/thumbnail/';
    
            $file->move(public_path($customPath), $newFileName);
    
            if ($submenu->thumbnail) {
                $oldThumbnailPath = public_path($customPath . $submenu->thumbnail);
                if (file_exists($oldThumbnailPath)) {
                    unlink($oldThumbnailPath);
                }
            }
    
            $submenu->thumbnail = $newFileName;
        }
    
        $submenu->save();
    
        return redirect()->back()->with('success', 'Submenu updated successfully');
    }    


    public function editSubmenu($id){
        $category = Category::all();
        $submenu = Submenu::find($id);
        return view('webadmin.submenu-edit', compact('category', 'submenu'));
    }

    public function subContent($id){
        $submenu = Submenu::find($id);
        return view('webadmin.submenu-content', compact('submenu'));
    }
}
