<x-app-layout>
    <!-- Content Section for Categories -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <!-- Categories Table and Add Button -->
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-semibold">Modifier une catégorie</h3>
                    <x-primary-button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="openAddCategoryModal()">
                       Ajouter une catégorie
                    </x-primary-button>
                </div>

                <!-- Categories Table -->
                <table class="min-w-full bg-white dark:bg-gray-700">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 bg-gray-100 dark:bg-gray-600">Date de création</th>
                            <th class="py-2 px-4 bg-gray-100 dark:bg-gray-600">Nom (EN)</th>
                            <th class="py-2 px-4 bg-gray-100 dark:bg-gray-600">Nom (FR)</th>
                            <th class="py-2 px-4 bg-gray-100 dark:bg-gray-600">Nom (AR)</th>
                            <th class="py-2 px-4 bg-gray-100 dark:bg-gray-600">Description (EN)</th>
                            <th class="py-2 px-4 bg-gray-100 dark:bg-gray-600">Description (FR)</th>
                            <th class="py-2 px-4 bg-gray-100 dark:bg-gray-600">Description (AR)</th>
                            <th class="py-2 px-4 bg-gray-100 dark:bg-gray-600">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td class="border py-2 px-4">{{ $category->updated_at }}</td>
                            <td class="border py-2 px-4">{{ $category->name_en }}</td>
                            <td class="border py-2 px-4">{{ $category->name_fr }}</td>
                            <td class="border py-2 px-4">{{ $category->name_ar }}</td>
                            <td class="border py-2 px-4">{{ Str::limit($category->description_en, 50) }}</td>
                            <td class="border py-2 px-4">{{ Str::limit($category->description_fr, 50) }}</td>
                            <td class="border py-2 px-4">{{ Str::limit($category->description_ar, 50) }}</td>
                            <td class="border py-2 px-4">
                                <x-primary-button class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded" onclick="openEditCategoryModal({{ $category->id }}, '{{ $category->name_en }}', '{{ $category->name_fr }}', '{{ $category->name_ar }}', '{{ $category->description_en }}', '{{ $category->description_fr }}', '{{ $category->description_ar }}')">
                                    Modifier
                                </x-primary-button>
                                <x-primary-button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded" onclick="openDeleteCategoryModal({{ $category->id }})">
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

    <!-- Add Category Modal -->
    <div id="addCategoryModal" class="fixed z-10 inset-0 hidden overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="bg-white dark:bg-gray-800 p-6 rounded shadow-lg w-full max-w-md">
                <h2 class="text-lg font-bold mb-4">Ajouter une catégorie</h2>
                <form action="{{ route('categories.store') }}" method="POST">
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
                        <label for="description_en" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description (EN)</label>
                        <textarea name="description_en" id="description_en" class="mt-1 block w-full"></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="description_fr" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description (FR)</label>
                        <textarea name="description_fr" id="description_fr" class="mt-1 block w-full"></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="description_ar" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description (AR)</label>
                        <textarea name="description_ar" id="description_ar" class="mt-1 block w-full"></textarea>
                    </div>
                    <div class="flex justify-end">
                        <button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2" onclick="closeAddCategoryModal()">Annuler</button>
                        <x-primary-button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Enregistrer</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Category Modal -->
    <div id="editCategoryModal" class="fixed z-10 inset-0 hidden overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="bg-white dark:bg-gray-800 p-6 rounded shadow-lg w-full max-w-md">
                <h2 class="text-lg font-bold mb-4">Modifier une catégorie</h2>
                <form id="editCategoryForm" action="#" method="POST">
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
                        <label for="edit_description_en" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description (EN)</label>
                        <textarea name="description_en" id="edit_description_en" class="mt-1 block w-full"></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="edit_description_fr" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description (FR)</label>
                        <textarea name="description_fr" id="edit_description_fr" class="mt-1 block w-full"></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="edit_description_ar" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description (AR)</label>
                        <textarea name="description_ar" id="edit_description_ar" class="mt-1 block w-full"></textarea>
                    </div>
                    <div class="flex justify-end">
                        <x-primary-button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2" onclick="closeEditCategoryModal()">Annuler</x-primary-button>
                        <x-primary-button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Enregistrer</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Category Modal -->
    <div id="deleteCategoryModal" class="fixed z-10 inset-0 hidden overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="bg-white dark:bg-gray-800 p-6 rounded shadow-lg w-full max-w-md">
                <h2 class="text-lg font-bold mb-4">Supprimer une catégorie</h2>
                <p>Êtes-vous sûr de vouloir supprimer cette catégorie ?</p>
                <form id="deleteCategoryForm" action="#" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="flex justify-end mt-4">
                        <x-primary-button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2" onclick="closeDeleteCategoryModal()">Annuler</x-primary-button>
                        <x-primary-button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Supprimer</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal JS Functions (add/edit/delete) -->
    <script>
        function openAddCategoryModal() {
            document.getElementById('addCategoryModal').classList.remove('hidden');
        }

        function closeAddCategoryModal() {
            document.getElementById('addCategoryModal').classList.add('hidden');
        }

        function openEditCategoryModal(id, name_en, name_fr, name_ar, description_en, description_fr, description_ar) {
            document.getElementById('editCategoryForm').action = `/categories/${id}`;
            document.getElementById('edit_name_en').value = name_en;
            document.getElementById('edit_name_fr').value = name_fr;
            document.getElementById('edit_name_ar').value = name_ar;
            document.getElementById('edit_description_en').value = description_en;
            document.getElementById('edit_description_fr').value = description_fr;
            document.getElementById('edit_description_ar').value = description_ar;
            document.getElementById('editCategoryModal').classList.remove('hidden');
        }

        function closeEditCategoryModal() {
            document.getElementById('editCategoryModal').classList.add('hidden');
        }

        function openDeleteCategoryModal(id) {
            document.getElementById('deleteCategoryForm').action = `/categories/${id}`;
            document.getElementById('deleteCategoryModal').classList.remove('hidden');
        }

        function closeDeleteCategoryModal() {
            document.getElementById('deleteCategoryModal').classList.add('hidden');
        }
    </script>
</x-app-layout>
