<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Article;

class BlogsController extends Controller
{
    public function index()
    {
        $latestArticle = Article::latest()->first();
        
        // If there's no latest article, handle it by ensuring $articles is not empty
        if ($latestArticle) {
            $articles = Article::where('id', '!=', $latestArticle->id)->get();
        } else {
            $articles = Article::all();
        }

        return view('pages.Blog', compact('latestArticle', 'articles'));
    }

    public function show($id)
    {
        // Récupérer l'article en fonction de l'ID
        $blog = Article::findOrFail($id);

        $related_posts = Article::where('id', '!=', $id)->take(3)->get();

        return view('pages.blog_details', compact('blog', 'related_posts'));
    }
    public function loadMoreBlogs(Request $request)
    {
        $page = $request->page ?? 1; 
        $articles = Article::paginate(6, ['*'], 'page', $page); // Charger 6 articles supplémentaires

        $hasMorePages = $articles->hasMorePages();

        $html = view('partials.blog-cards', compact('articles'))->render();

        return response()->json([
            'html' => $html,
            'hasMorePages' => $hasMorePages
        ]);
    }
}