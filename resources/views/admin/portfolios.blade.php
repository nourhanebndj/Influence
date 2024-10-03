<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <!-- Portfolios Table and Add Button -->
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-semibold">Gérer les Portfolios</h3>
                    <x-primary-button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="openAddPortfolioModal()">
                        Ajouter un Portfolio
                    </x-primary-button>
                </div>

                <!-- Portfolios Table -->
                <table class="min-w-full bg-white dark:bg-gray-700">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 bg-gray-100 dark:bg-gray-600">Nom</th>
                            <th class="py-2 px-4 bg-gray-100 dark:bg-gray-600">Lien</th>
                            <th class="py-2 px-4 bg-gray-100 dark:bg-gray-600">Catégorie</th>
                            <th class="py-2 px-4 bg-gray-100 dark:bg-gray-600">Sous-catégorie</th>
                            <th class="py-2 px-4 bg-gray-100 dark:bg-gray-600">Photo</th>
                            <th class="py-2 px-4 bg-gray-100 dark:bg-gray-600">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($portfolios as $portfolio)
                        <tr>
                            <td class="border py-2 px-4">{{ $portfolio->name }}</td>
                            <td class="border py-2 px-4"><a href="{{ $portfolio->link }}" target="_blank">{{ $portfolio->link }}</a></td>
                            <td class="border py-2 px-4">{{ $portfolio->category->name_en }}</td>
                            <td class="border py-2 px-4">{{ optional($portfolio->subcategory)->name_en }}</td>
                            <td class="border py-2 px-4">
                                @if ($portfolio->photo)
                                    <img src="{{ asset('storage/' . $portfolio->photo) }}" alt="Portfolio Image" class="h-16 w-16">
                                @endif
                            </td>
                            <td class="border py-2 px-4">
                                <x-primary-button class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded" onclick="openEditPortfolioModal({{ $portfolio->id }}, '{{ $portfolio->name }}', '{{ $portfolio->link }}', {{ $portfolio->category_id }}, {{ $portfolio->subcategory_id ?? 'null' }}, {{ $portfolio->subsubcategory_id ?? 'null' }}, '{{ $portfolio->photo }}')">
                                    Modifier
                                </x-primary-button>
                                <x-primary-button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded" onclick="openDeletePortfolioModal({{ $portfolio->id }})">
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

    <!-- Add Portfolio Modal -->
    <div id="addPortfolioModal" class="fixed z-10 inset-0 hidden overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="bg-white dark:bg-gray-800 p-6 rounded shadow-lg w-full max-w-md">
                <h2 class="text-lg font-bold mb-4">Ajouter un Portfolio</h2>
                <form action="{{ route('admin.portfolios.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nom</label>
                        <input type="text" name="name" id="name" class="mt-1 block w-full" required>
                    </div>
                    <div class="mb-4">
                        <label for="link" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Lien</label>
                        <input type="url" name="link" id="link" class="mt-1 block w-full" required>
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
                            <option value="">Aucune</option>
                            @foreach($subcategories as $subcategory)
                                <option value="{{ $subcategory->id }}">{{ $subcategory->name_en }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="photo" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Photo</label>
                        <input type="file" name="photo" id="photo" class="mt-1 block w-full">
                    </div>
                    <div class="flex justify-end">
                        <button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2" onclick="closeAddPortfolioModal()">Annuler</button>
                        <x-primary-button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Enregistrer</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Portfolio Modal -->
    <div id="editPortfolioModal" class="fixed z-10 inset-0 hidden overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="bg-white dark:bg-gray-800 p-6 rounded shadow-lg w-full max-w-md">
                <h2 class="text-lg font-bold mb-4">Modifier le Portfolio</h2>
                <form id="editPortfolioForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="edit_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nom</label>
                        <input type="text" name="name" id="edit_name" class="mt-1 block w-full" required>
                    </div>
                    <div class="mb-4">
                        <label for="edit_link" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Lien</label>
                        <input type="url" name="link" id="edit_link" class="mt-1 block w-full" required>
                    </div>
                    <div class="mb-4">
                        <label for="edit_category_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Catégorie</label>
                        <select name="category_id" id="edit_category_id" class="mt-1 block w-full">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name_en }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="edit_subcategory_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Sous-catégorie</label>
                        <select name="subcategory_id" id="edit_subcategory_id" class="mt-1 block w-full">
                            <option value="">Aucune</option>
                            @foreach($subcategories as $subcategory)
                                <option value="{{ $subcategory->id }}">{{ $subcategory->name_en }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="edit_photo" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Photo</label>
                        <input type="file" name="photo" id="edit_photo" class="mt-1 block w-full">
                        <img id="edit_photo_preview" src="" alt="Portfolio Image" class="mt-4 h-20 w-20 hidden">
                    </div>
                    <div class="flex justify-end">
                        <button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2" onclick="closeEditPortfolioModal()">Annuler</button>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript Modal Handlers -->
    <script>
        function openAddPortfolioModal() {
            document.getElementById('addPortfolioModal').classList.remove('hidden');
        }
        function closeAddPortfolioModal() {
            document.getElementById('addPortfolioModal').classList.add('hidden');
        }
        function openEditPortfolioModal(id, name, link, categoryId, subcategoryId, subsubcategoryId, photo) {
            document.getElementById('editPortfolioForm').action = `/admin/portfolios/${id}`;
            document.getElementById('edit_name').value = name;
            document.getElementById('edit_link').value = link;
            document.getElementById('edit_category_id').value = categoryId;
            document.getElementById('edit_subcategory_id').value = subcategoryId || '';
            document.getElementById('edit_subsubcategory_id').value = subsubcategoryId || '';

            // Display current photo if exists
            if (photo) {
                document.getElementById('edit_photo_preview').src = `/storage/${photo}`;
                document.getElementById('edit_photo_preview').classList.remove('hidden');
            }

            document.getElementById('editPortfolioModal').classList.remove('hidden');
        }
        function closeEditPortfolioModal() {
            document.getElementById('editPortfolioModal').classList.add('hidden');
        }
        function openDeletePortfolioModal(id) {
            document.getElementById('deletePortfolioForm').action = `/admin/portfolios/${id}`;
            document.getElementById('deletePortfolioModal').classList.remove('hidden');
        }
        function closeDeletePortfolioModal() {
            document.getElementById('deletePortfolioModal').classList.add('hidden');
        }
    </script>
</x-app-layout>
