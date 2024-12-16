<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view("admin.dashboard");
    }
    public function showArticle(){
        $articles = Article::orderBy("updated_at", "desc")->paginate(8);
        return view("admin.article_all", compact("articles"));
    }
    public function categoryArticle(){
        return view("admin.category");
    }

    public function create(){
        return view("admin.add_article");
    }
    public function store(){
        $validated = request()->validate([
            'name' => 'required',
            'short_description' => 'required|max:20',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'image|required'
        ]);

        
        if (request()->has('image')) {
            
            $imagePath = request()->file('image')->store('articles', 'public');
            $validated['image'] = $imagePath;
        }



        Article::create([
            'name' => $validated['name'],
            'short_description' => $validated['short_description'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'image' => $validated['image'],
        ]);

        return redirect()->route('article.article')->with('success', 'New article created successfully !');
    }
    public function edit(Article $article){

        return view("admin.edit_article", compact("article"));
    }

    public function update(Article $article){
        $validated = request()->validate([
            'name' => 'required',
            'short_description' => 'required|max:20',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'image',
        ]);

        
        if (request()->has('image')) {
            
            $imagePath = request()->file('image')->store('articles', 'public');
            $validated['image'] = $imagePath;
        }

        $article->update($validated);

        return redirect()->route("admin.article")->with("success", "Article edited successfully !");

    }

    public function destroy($id){
        Article::find($id)->delete();
        return redirect()->route("admin.article")->with("success", "Article deleted successfully !");
    }
}
