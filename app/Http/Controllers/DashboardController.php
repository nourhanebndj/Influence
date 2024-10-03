<?php 

            namespace App\Http\Controllers;
            use App\Models\Category;
            use App\Models\Portfolio;
            use App\Models\Article;
            use App\Models\User;

            class DashboardController extends Controller
            {
            public function dashboard()
            {
            $categories = Category::all();
            $portfolios = Portfolio::all();
            $categories_count = Category::count();
            $portfolio_count = Portfolio::count();
            $blog_count = Article::count();
            $members = User::all(); // Fetching all users (members)

            return view('dashboard', compact('categories', 'portfolios', 'categories_count', 'portfolio_count', 'blog_count',
            'members'));
            }
}