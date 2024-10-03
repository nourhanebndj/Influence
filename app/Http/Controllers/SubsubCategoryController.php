<?php 

namespace App\Http\Controllers;

use App\Models\SubsubCategory;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubsubCategoryController extends Controller
{
    public function index()
    {
        $subsubcategories = SubsubCategory::with('category', 'subcategory')->get();
        $categories = Category::all();
        $subcategories = Subcategory::all();

        return view('admin.subsubcategories', compact('subsubcategories', 'categories', 'subcategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required',
            'name_fr' => 'nullable',
            'name_ar' => 'nullable',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'description_en' => 'nullable',
            'description_fr' => 'nullable',
            'description_ar' => 'nullable',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $subsubCategory = new SubsubCategory();
        $subsubCategory->name_en = $request->name_en;
        $subsubCategory->name_fr = $request->name_fr;
        $subsubCategory->name_ar = $request->name_ar;
        $subsubCategory->category_id = $request->category_id;
        $subsubCategory->subcategory_id = $request->subcategory_id;
        $subsubCategory->description_en = $request->description_en;
        $subsubCategory->description_fr = $request->description_fr;
        $subsubCategory->description_ar = $request->description_ar;

        // Gestion de la photo
        if ($request->hasFile('photo')) {
            if ($request->file('photo')->isValid()) {
                $photoPath = $request->file('photo')->store('subsubcategories', 'public');
                $subsubCategory->photo = $photoPath;
            } else {
                return redirect()->back()->withErrors('Erreur lors du téléversement de la photo.');
            }
        }

        $subsubCategory->save();

        return redirect()->route('subsubcategories.index')->with('success', 'Sous-sous-catégorie ajoutée avec succès.');
    }

    public function edit(SubsubCategory $subsubCategory)
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();

        return view('admin.subsubcategories.edit', compact('subsubCategory', 'categories', 'subcategories'));
    }

    public function update(Request $request, SubsubCategory $subsubCategory)
    {
        $request->validate([
            'name_en' => 'required',
            'name_fr' => 'nullable',
            'name_ar' => 'nullable',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'description_en' => 'nullable',
            'description_fr' => 'nullable',
            'description_ar' => 'nullable',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $subsubCategory->name_en = $request->name_en;
        $subsubCategory->name_fr = $request->name_fr;
        $subsubCategory->name_ar = $request->name_ar;
        $subsubCategory->category_id = $request->category_id;
        $subsubCategory->subcategory_id = $request->subcategory_id;
        $subsubCategory->description_en = $request->description_en;
        $subsubCategory->description_fr = $request->description_fr;
        $subsubCategory->description_ar = $request->description_ar;

        // Gestion de la photo et suppression de l'ancienne si nécessaire
        if ($request->hasFile('photo')) {
            if ($request->file('photo')->isValid()) {
                if ($subsubCategory->photo) {
                    Storage::disk('public')->delete($subsubCategory->photo);
                }
                $photoPath = $request->file('photo')->store('subsubcategories', 'public');
                $subsubCategory->photo = $photoPath;
            } else {
                return redirect()->back()->withErrors('Erreur lors du téléversement de la photo.');
            }
        }

        $subsubCategory->save();

        return redirect()->route('subsubcategories.index')->with('success', 'Sous-sous-catégorie mise à jour avec succès.');
    }

    public function destroy(SubsubCategory $subsubCategory)
    {
        try {
            // Suppression de la photo si elle existe
            if ($subsubCategory->photo) {
                Storage::disk('public')->delete($subsubCategory->photo);
            }

            $subsubCategory->delete();

            return redirect()->route('subsubcategories.index')->with('success', 'Sous-sous-catégorie supprimée avec succès.');
        } catch (\Exception $e) {
            return redirect()->route('subsubcategories.index')->with('error', 'Erreur lors de la suppression : ' . $e->getMessage());
        }
    }
}