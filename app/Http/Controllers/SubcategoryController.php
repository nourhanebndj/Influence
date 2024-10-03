<?php
namespace App\Http\Controllers;

use App\Models\Subcategory;
use App\Models\Category;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function index()
    {
        $subcategories = Subcategory::with('category')->get();
        $categories = Category::all();
        return view('admin.subcategories', compact('subcategories', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required',
            'category_id' => 'required',
            'name_fr' => 'nullable',
            'name_ar' => 'nullable',
        ]);

        Subcategory::create($request->all());

        return redirect()->back()->with('success', 'Sous-catégorie ajoutée avec succès.');
    }

    public function edit(Subcategory $subcategory)
    {
        $categories = Category::all();
        return view('subcategories.edit', compact('subcategory', 'categories'));
    }

    public function update(Request $request, Subcategory $subcategory)
    {
        $request->validate([
            'name_en' => 'required',
            'category_id' => 'required',
            'name_fr' => 'nullable',
            'name_ar' => 'nullable',
        ]);

        $subcategory->update($request->all());

        return redirect()->route('subcategories.index')->with('success', 'Sous-catégorie mise à jour avec succès.');
    }

    public function destroy(Subcategory $subcategory)
    {
        $subcategory->subsubcategories()->delete();
        $subcategory->delete();

        return redirect()->route('subcategories.index')->with('success', 'Sous-catégorie supprimée avec succès.');
    }
}
