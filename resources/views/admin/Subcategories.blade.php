<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-semibold">{{ __('Gérer les sous-catégories') }}</h3>
                    <x-primary-button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="openAddSubcategoryModal()">
                        {{ __('Ajouter une sous-catégorie') }}
                    </x-primary-button>
                </div>

                <table class="min-w-full bg-white dark:bg-gray-700">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 bg-gray-100 dark:bg-gray-600">{{ __('Date de création') }}</th>
                            <th class="py-2 px-4 bg-gray-100 dark:bg-gray-600">{{ __('Nom') }}</th>
                            <th class="py-2 px-4 bg-gray-100 dark:bg-gray-600">{{ __('Catégorie') }}</th>
                            <th class="py-2 px-4 bg-gray-100 dark:bg-gray-600">{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($subcategories as $subcategory)
                        <tr>
                            <td class="border py-2 px-4">{{ $subcategory->updated_at }}</td>
                            <td class="border py-2 px-4">{{ $subcategory->name_en }} / {{ $subcategory->name_fr }} / {{ $subcategory->name_ar }}</td>
                            <td class="border py-2 px-4">{{ $subcategory->category->name_en }}</td>
                            <td class="border py-2 px-4">
                                <x-primary-button class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded"
                                onclick="openEditSubcategoryModal({{ $subcategory->id }}, '{{ $subcategory->name_en }}', '{{ $subcategory->name_fr }}', '{{ $subcategory->name_ar }}', {{ $subcategory->category_id }})">
                                    {{ __('Modifier') }}
                                </x-primary-button>
                                <x-primary-button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded" onclick="openDeleteSubcategoryModal({{ $subcategory->id }})">
                                    {{ __('Supprimer') }}
                                </x-primary-button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Subcategory Modal -->
    <div id="addSubcategoryModal" class="fixed z-10 inset-0 hidden overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="bg-white dark:bg-gray-800 p-6 rounded shadow-lg w-full max-w-md">
                <h2 class="text-lg font-bold mb-4">{{ __('Ajouter une sous-catégorie') }}</h2>
                <form action="{{ route('subcategories.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name_en" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Nom (Anglais)') }}</label>
                        <input type="text" name="name_en" id="name_en" class="mt-1 block w-full" required>
                    </div>
                    <div class="mb-4">
                        <label for="name_fr" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Nom (Français)') }}</label>
                        <input type="text" name="name_fr" id="name_fr" class="mt-1 block w-full">
                    </div>
                    <div class="mb-4">
                        <label for="name_ar" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Nom (Arabe)') }}</label>
                        <input type="text" name="name_ar" id="name_ar" class="mt-1 block w-full">
                    </div>
                    <div class="mb-4">
                        <label for="category_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Catégorie') }}</label>
                        <select name="category_id" id="category_id" class="mt-1 block w-full">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name_en }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex justify-end">
                        <button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2" onclick="closeAddSubcategoryModal()">{{ __('Annuler') }}</button>
                        <x-primary-button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{ __('Enregistrer') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal JS Functions (add/edit/delete) -->
    <script>
        function openAddSubcategoryModal() {
            document.getElementById('addSubcategoryModal').classList.remove('hidden');
        }

        function closeAddSubcategoryModal() {
            document.getElementById('addSubcategoryModal').classList.add('hidden');
        }

        function openEditSubcategoryModal(id, name_en, name_fr, name_ar, category_id) {
            document.getElementById('editSubcategoryForm').action = `/subcategories/${id}`;
            document.getElementById('edit_name_en').value = name_en;
            document.getElementById('edit_name_fr').value = name_fr;
            document.getElementById('edit_name_ar').value = name_ar;
            document.getElementById('edit_category_id').value = category_id;
            document.getElementById('editSubcategoryModal').classList.remove('hidden');
        }

        function closeEditSubcategoryModal() {
            document.getElementById('editSubcategoryModal').classList.add('hidden');
        }

        function openDeleteSubcategoryModal(id) {
            document.getElementById('deleteSubcategoryForm').action = `/subcategories/${id}`;
            document.getElementById('deleteSubcategoryModal').classList.remove('hidden');
        }

        function closeDeleteSubcategoryModal() {
            document.getElementById('deleteSubcategoryModal').classList.add('hidden');
        }
    </script>
</x-app-layout>
