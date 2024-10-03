<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\SubsubCategory;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    // Display all portfolios in the admin panel
    public function adminPortfolios()
    {
        $portfolios = Portfolio::with('category', 'subcategory', 'subsubcategory')->paginate(9);
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $subsubcategories = SubsubCategory::all();

        return view('admin.portfolios', compact('portfolios', 'categories', 'subcategories', 'subsubcategories'));
    }

    // Show the form to create a new portfolio (Admin)
    public function create()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $subsubcategories = SubsubCategory::all();
        return view('admin.portfolios.create', compact('categories', 'subcategories', 'subsubcategories'));
    }

    // Store a new portfolio (Admin)
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'link' => 'required|url',
            'category_id' => 'required',
            'subcategory_id' => 'nullable',
            'subsubcategory_id' => 'nullable',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $portfolioData = $request->all();

        // Handle photo upload
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $path = $file->store('photos', 'public');
            $portfolioData['photo'] = $path;
        }

        Portfolio::create($portfolioData);

        return redirect()->route('admin.portfolios.index')->with('success', 'Portfolio ajouté avec succès.');
    }

    // Show the form to edit an existing portfolio (Admin)
    public function edit(Portfolio $portfolio)
    {
        $categories = Category::all();
        $subcategories = Subcategory::where('category_id', $portfolio->category_id)->get();
        $subsubcategories = SubsubCategory::where('subcategory_id', $portfolio->subcategory_id)->get();

        return view('admin.portfolios.edit', compact('portfolio', 'categories', 'subcategories', 'subsubcategories'));
    }

    // Update an existing portfolio (Admin)
    public function update(Request $request, Portfolio $portfolio)
    {
        $request->validate([
            'name' => 'required',
            'link' => 'required|url',
            'category_id' => 'required',
            'subcategory_id' => 'nullable',
            'subsubcategory_id' => 'nullable',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $portfolioData = $request->all();

        // Handle photo upload
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $path = $file->store('photos', 'public');
            $portfolioData['photo'] = $path;
        }

        $portfolio->update($portfolioData);

        return redirect()->route('admin.portfolios.index')->with('success', 'Portfolio mis à jour avec succès.');
    }

    // Delete a portfolio (Admin)
    public function destroy(Portfolio $portfolio)
    {
        $portfolio->delete();
        return redirect()->route('admin.portfolios.index')->with('success', 'Portfolio supprimé avec succès.');
    }

    public function index()
    {
        $portfolios = Portfolio::paginate(9); 
        $categories = Category::all(); 
        $selectedCategory = null;
    
        return view('pages.portfolio', compact('portfolios', 'categories', 'selectedCategory'));
    }
    
    public function filterByCategory($categoryId)
    {
        $selectedCategory = Category::find($categoryId);
        $categories = Category::all();
        $portfolios = Portfolio::where('category_id', $categoryId)->paginate(9);
    
        return view('pages.portfolio', compact('portfolios', 'categories', 'selectedCategory'));
    }
}