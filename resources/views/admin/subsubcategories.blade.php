<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-semibold">Gérer les Sous-sous-catégories</h3>
                    <x-primary-button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="openAddSubSubCategoryModal()">
                        Ajouter une Sous-sous-catégorie
                    </x-primary-button>
                </div>

                <table class="min-w-full bg-white dark:bg-gray-700">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 bg-gray-100 dark:bg-gray-600">Photo</th>
                            <th class="py-2 px-4 bg-gray-100 dark:bg-gray-600">Nom (EN)</th>
                            <th class="py-2 px-4 bg-gray-100 dark:bg-gray-600">Nom (FR)</th>
                            <th class="py-2 px-4 bg-gray-100 dark:bg-gray-600">Nom (AR)</th>
                            <th class="py-2 px-4 bg-gray-100 dark:bg-gray-600">Catégorie</th>
                            <th class="py-2 px-4 bg-gray-100 dark:bg-gray-600">Sous-catégorie</th>
                            <th class="py-2 px-4 bg-gray-100 dark:bg-gray-600">Description (EN)</th>
                            <th class="py-2 px-4 bg-gray-100 dark:bg-gray-600">Description (FR)</th>
                            <th class="py-2 px-4 bg-gray-100 dark:bg-gray-600">Description (AR)</th>
                            <th class="py-2 px-4 bg-gray-100 dark:bg-gray-600">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($subsubcategories as $subsubCategory)
                        <tr>
                            <td class="border py-2 px-4">
                                @if($subsubCategory->photo && Storage::disk('public')->exists($subsubCategory->photo))
                                    <img src="{{ asset('storage/' . $subsubCategory->photo) }}" width="100" height="100" alt="Image de la sous-sous-catégorie">
                                @else
                                    <span>Pas d'image</span>
                                @endif
                            </td>
                            <td class="border py-2 px-4">{{ $subsubCategory->name_en }}</td>
                            <td class="border py-2 px-4">{{ $subsubCategory->name_fr }}</td>
                            <td class="border py-2 px-4">{{ $subsubCategory->name_ar }}</td>
                            <td class="border py-2 px-4">{{ $subsubCategory->category->name_en }}</td>
                            <td class="border py-2 px-4">{{ $subsubCategory->subcategory->name_en }}</td>
                            <td class="border py-2 px-4">{{ $subsubCategory->description_en }}</td>
                            <td class="border py-2 px-4">{{ $subsubCategory->description_fr }}</td>
                            <td class="border py-2 px-4">{{ $subsubCategory->description_ar }}</td>
                            <td class="border py-2 px-4">
                                <x-primary-button class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded"
                                onclick="openEditSubSubCategoryModal({{ $subsubCategory->id }}, '{{ $subsubCategory->name_en }}', '{{ $subsubCategory->name_fr }}', '{{ $subsubCategory->name_ar }}', {{ $subsubCategory->category_id }}, {{ $subsubCategory->subcategory_id }}, '{{ $subsubCategory->description_en }}', '{{ $subsubCategory->description_fr }}', '{{ $subsubCategory->description_ar }}')">
                                Modifier
                                </x-primary-button>                            
                                <x-primary-button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded" onclick="openDeleteSubSubCategoryModal({{ $subsubCategory->id }})">
                                    Supprimer
                                </x-primary-button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add SubsubCategory Modal -->
    <div id="addSubSubCategoryModal" class="fixed z-10 inset-0 hidden overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="bg-white dark:bg-gray-800 p-6 rounded shadow-lg w-full max-w-md">
                <h2 class="text-lg font-bold mb-4">Ajouter une sous-sous-catégorie</h2>
                <form action="{{ route('subsubcategories.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="name_en" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nom (EN)</label>
                        <input type="text" name="name_en" id="name_en" class="mt-1 block w-full" required>
                    </div>
                    <div class="mb-4">
                        <label for="name_fr" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nom (FR)</label>
                        <input type="text" name="name_fr" id="name_fr" class="mt-1 block w-full">
                    </div>
                    <div class="mb-4">
                        <label for="name_ar" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nom (AR)</label>
                        <input type="text" name="name_ar" id="name_ar" class="mt-1 block w-full">
                    </div>
                    <div class="mb-4">
                        <label for="category_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Catégorie</label>
                        <select name="category_id" id="category_id" class="mt-1 block w-full">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name_en }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="subcategory_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Sous-catégorie</label>
                        <select name="subcategory_id" id="subcategory_id" class="mt-1 block w-full">
                            @foreach($subcategories as $subcategory)
                                <option value="{{ $subcategory->id }}">{{ $subcategory->name_en }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="description_en" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description (EN)</label>
                        <textarea name="description_en" id="description_en" class="mt-1 block w-full" rows="3"></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="description_fr" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description (FR)</label>
                        <textarea name="description_fr" id="description_fr" class="mt-1 block w-full" rows="3"></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="description_ar" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description (AR)</label>
                        <textarea name="description_ar" id="description_ar" class="mt-1 block w-full" rows="3"></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="photo" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Photo</label>
                        <input type="file" name="photo" id="photo" class="mt-1 block w-full">
                    </div>
                    <div class="flex justify-end">
                        <button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2" onclick="closeAddSubSubCategoryModal()">Annuler</button>
                        <x-primary-button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Enregistrer</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit SubsubCategory Modal -->
    <div id="editSubSubCategoryModal" class="fixed z-10 inset-0 hidden overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="bg-white dark:bg-gray-800 p-6 rounded shadow-lg w-full max-w-md">
                <h2 class="text-lg font-bold mb-4">Modifier la sous-sous-catégorie</h2>
                <form action="" method="POST" id="editSubSubCategoryForm" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="edit_name_en" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nom (EN)</label>
                        <input type="text" name="name_en" id="edit_name_en" class="mt-1 block w-full" required>
                    </div>
                    <div class="mb-4">
                        <label for="edit_name_fr" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nom (FR)</label>
                        <input type="text" name="name_fr" id="edit_name_fr" class="mt-1 block w-full">
                    </div>
                    <div class="mb-4">
                        <label for="edit_name_ar" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nom (AR)</label>
                        <input type="text" name="name_ar" id="edit_name_ar" class="mt-1 block w-full">
                    </div>
                    <div class="mb-4">
                        <label for="edit_category_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Catégorie</label>
                        <select name="category_id" id="edit_category_id" class="mt-1 block w-full">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="edit_subcategory_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Sous-catégorie</label>
                        <select name="subcategory_id" id="edit_subcategory_id" class="mt-1 block w-full">
                            @foreach($subcategories as $subcategory)
                                <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="edit_description_en" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description (EN)</label>
                        <textarea name="description_en" id="edit_description_en" class="mt-1 block w-full" rows="3"></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="edit_description_fr" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description (FR)</label>
                        <textarea name="description_fr" id="edit_description_fr" class="mt-1 block w-full" rows="3"></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="edit_description_ar" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description (AR)</label>
                        <textarea name="description_ar" id="edit_description_ar" class="mt-1 block w-full" rows="3"></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="edit_photo" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Photo</label>
                        <input type="file" name="photo" id="edit_photo" class="mt-1 block w-full">
                    </div>
                    <div class="flex justify-end">
                        <button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2" onclick="closeEditSubSubCategoryModal()">Annuler</button>
                        <x-primary-button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Mettre à jour</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Delete SubsubCategory Modal -->
    <div id="deleteSubSubCategoryModal" class="fixed z-10 inset-0 hidden overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="bg-white dark:bg-gray-800 p-6 rounded shadow-lg w-full max-w-md">
                <h2 class="text-lg font-bold mb-4">Supprimer la sous-sous-catégorie</h2>
                <form action="" method="POST" id="deleteSubSubCategoryForm">
                    @csrf
                    @method('DELETE')
                    <p>Êtes-vous sûr de vouloir supprimer cette sous-sous-catégorie ? Cette action est irréversible.</p>
                    <div class="flex justify-end mt-4">
                        <button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2" onclick="closeDeleteSubSubCategoryModal()">Annuler</button>
                        <x-primary-button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Supprimer</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Modal JS Functions -->
    <script>
        function openAddSubSubCategoryModal() {
            document.getElementById('addSubSubCategoryModal').classList.remove('hidden');
        }

        function closeAddSubSubCategoryModal() {
            document.getElementById('addSubSubCategoryModal').classList.add('hidden');
        }

        function openEditSubSubCategoryModal(id, name_en, name_fr, name_ar, categoryId, subcategoryId, description_en, description_fr, description_ar) {
            var editModal = document.getElementById('editSubSubCategoryModal');
            var form = document.getElementById('editSubSubCategoryForm');
            form.action = '/subsubcategories/' + id;
            document.getElementById('edit_name_en').value = name_en;
            document.getElementById('edit_name_fr').value = name_fr;
            document.getElementById('edit_name_ar').value = name_ar;
            document.getElementById('edit_category_id').value = categoryId;
            document.getElementById('edit_subcategory_id').value = subcategoryId;
            document.getElementById('edit_description_en').value = description_en;
            document.getElementById('edit_description_fr').value = description_fr;
            document.getElementById('edit_description_ar').value = description_ar;
            editModal.classList.remove('hidden');
        }

        function closeEditSubSubCategoryModal() {
            document.getElementById('editSubSubCategoryModal').classList.add('hidden');
        }

        function openDeleteSubSubCategoryModal(id) {
            var deleteModal = document.getElementById('deleteSubSubCategoryModal');
            var form = document.getElementById('deleteSubSubCategoryForm');
            form.action = '/subsubcategories/' + id;
            deleteModal.classList.remove('hidden');
        }

        function closeDeleteSubSubCategoryModal() {
            document.getElementById('deleteSubSubCategoryModal').classList.add('hidden');
        }
    </script>
</x-app-layout>
