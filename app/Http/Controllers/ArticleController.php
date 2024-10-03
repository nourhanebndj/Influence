<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    // Afficher tous les articles sur la page Blogs
    public function index()
    {
        $articles = Article::all();
        return view('admin.Blogs', compact('articles'));
    }

    // Stocker un nouvel article
    public function store(Request $request)
    {
        $request->validate([
            'title_en' => 'required|max:255',
            'description_en' => 'required',
            'title_fr' => 'nullable|max:255',
            'description_fr' => 'nullable',
            'title_ar' => 'nullable|max:255',
            'description_ar' => 'nullable',
            'front_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $article = new Article();
        $article->title_en = $request->title_en;
        $article->description_en = $request->description_en;
        $article->title_fr = $request->title_fr;
        $article->description_fr = $request->description_fr;
        $article->title_ar = $request->title_ar;
        $article->description_ar = $request->description_ar;

        if ($request->hasFile('front_image')) {
            $article->front_image = $request->file('front_image')->store('front_images', 'public');
        }

        $article->save();

        return redirect()->route('articles.index')->with('success', 'Article créé avec succès');
    }

    // Mettre à jour un article
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title_en' => 'required|max:255',
            'description_en' => 'required',
            'title_fr' => 'nullable|max:255',
            'description_fr' => 'nullable',
            'title_ar' => 'nullable|max:255',
            'description_ar' => 'nullable',
            'front_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $article->title_en = $request->title_en;
        $article->description_en = $request->description_en;
        $article->title_fr = $request->title_fr;
        $article->description_fr = $request->description_fr;
        $article->title_ar = $request->title_ar;
        $article->description_ar = $request->description_ar;

        if ($request->hasFile('front_image')) {
            // Supprimer l'ancienne image si elle existe
            if ($article->front_image) {
                Storage::disk('public')->delete($article->front_image);
            }
            $article->front_image = $request->file('front_image')->store('front_images', 'public');
        }

        $article->save();

        return redirect()->route('articles.index')->with('success', 'Article mis à jour avec succès');
    }

    // Supprimer un article
    public function destroy(Article $article)
    {
        if ($article->front_image) {
            Storage::disk('public')->delete($article->front_image);
        }
        
        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Article supprimé avec succès');
    }
}