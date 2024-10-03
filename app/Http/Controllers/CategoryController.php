<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.Categories', compact('categories')); // Retourner la vue avec les catégories
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required|string|max:255',
            'name_fr' => 'nullable|string|max:255',
            'name_ar' => 'nullable|string|max:255',
            'description_en' => 'nullable|string',
            'description_fr' => 'nullable|string',
            'description_ar' => 'nullable|string',
        ]);

        Category::create($request->all());

        return redirect()->route('categories.index')->with('success', 'Catégorie ajoutée avec succès!');
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name_en' => 'required|string|max:255',
            'name_fr' => 'nullable|string|max:255',
            'name_ar' => 'nullable|string|max:255',
            'description_en' => 'nullable|string',
            'description_fr' => 'nullable|string',
            'description_ar' => 'nullable|string',
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Catégorie mise à jour avec succès!');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Catégorie supprimée avec succès!');
    }
}