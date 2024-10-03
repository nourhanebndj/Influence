<x-app-layout>
    <!-- Content Section for Articles -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <!-- Articles Table and Add Button -->
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-semibold">Gérer les Articles</h3>
                    <x-primary-button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="openAddArticleModal()">
                        Ajouter un Article
                    </x-primary-button>
                </div>

                <!-- Articles Table -->
                <table class="min-w-full bg-white dark:bg-gray-700">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 bg-gray-100 dark:bg-gray-600">Date de création</th>
                            <th class="py-2 px-4 bg-gray-100 dark:bg-gray-600">Titre</th>
                            <th class="py-2 px-4 bg-gray-100 dark:bg-gray-600">Description</th>
                            <th class="py-2 px-4 bg-gray-100 dark:bg-gray-600">Image</th>
                            <th class="py-2 px-4 bg-gray-100 dark:bg-gray-600">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($articles as $article)
                        <tr>
                            <td class="border py-2 px-4">{{ $article->updated_at  }}</td>
                            <td class="border py-2 px-4">{{ $article->title_en }} / {{ $article->title_fr }} / {{ $article->title_ar }}</td>
                            <td class="border py-2 px-4">{{ Str::limit($article->description_en, 100) }} / {{ Str::limit($article->description_fr, 100) }} / {{ Str::limit($article->description_ar, 100) }}</td>
                            <td class="border py-2 px-4">
                                @if($article->front_image)
                                    <img src="{{ asset('storage/' . $article->front_image) }}" width="100" height="100" alt="Image d'article">
                                @else
                                    Pas d'image
                                @endif
                            </td>
                            <td class="border py-2 px-4">
                                <x-primary-button class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded" onclick="openEditArticleModal({{ $article->id }}, '{{ $article->title_en }}', '{{ $article->description_en }}', '{{ $article->title_fr }}', '{{ $article->description_fr }}', '{{ $article->title_ar }}', '{{ $article->description_ar }}')">
                                    Modifier
                                </x-primary-button>
                                <x-primary-button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded" onclick="openDeleteArticleModal({{ $article->id }})">
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

    <!-- Add Article Modal -->
    <div id="addArticleModal" class="fixed z-10 inset-0 hidden overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="bg-white dark:bg-gray-800 p-6 rounded shadow-lg w-full max-w-md">
                <h2 class="text-lg font-bold mb-4">Ajouter un Article</h2>
                <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="title_en" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Titre (Anglais)</label>
                        <input type="text" name="title_en" id="title_en" class="mt-1 block w-full" required>
                    </div>
                    <div class="mb-4">
                        <label for="title_fr" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Titre (Français)</label>
                        <input type="text" name="title_fr" id="title_fr" class="mt-1 block w-full">
                    </div>
                    <div class="mb-4">
                        <label for="title_ar" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Titre (Arabe)</label>
                        <input type="text" name="title_ar" id="title_ar" class="mt-1 block w-full">
                    </div>
                    <div class="mb-4">
                        <label for="description_en" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description (Anglais)</label>
                        <textarea name="description_en" id="description_en" class="mt-1 block w-full" required></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="description_fr" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description (Français)</label>
                        <textarea name="description_fr" id="description_fr" class="mt-1 block w-full"></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="description_ar" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description (Arabe)</label>
                        <textarea name="description_ar" id="description_ar" class="mt-1 block w-full"></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="front_image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Image de couverture</label>
                        <input type="file" name="front_image" id="front_image" class="mt-1 block w-full">
                    </div>
                    <div class="flex justify-end">
                        <button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2" onclick="closeAddArticleModal()">Annuler</button>
                        <x-primary-button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Enregistrer</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Article Modal -->
    <div id="editArticleModal" class="fixed z-10 inset-0 hidden overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="bg-white dark:bg-gray-800 p-6 rounded shadow-lg w-full max-w-md">
                <h2 class="text-lg font-bold mb-4">Modifier un Article</h2>
                <form id="editArticleForm" action="#" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="edit_title_en" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Titre (Anglais)</label>
                        <input type="text" name="title_en" id="edit_title_en" class="mt-1 block w-full" required>
                    </div>
                    <div class="mb-4">
                        <label for="edit_title_fr" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Titre (Français)</label>
                        <input type="text" name="title_fr" id="edit_title_fr" class="mt-1 block w-full">
                    </div>
                    <div class="mb-4">
                        <label for="edit_title_ar" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Titre (Arabe)</label>
                        <input type="text" name="title_ar" id="edit_title_ar" class="mt-1 block w-full">
                    </div>
                    <div class="mb-4">
                        <label for="edit_description_en" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description (Anglais)</label>
                        <textarea name="description_en" id="edit_description_en" class="mt-1 block w-full" required></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="edit_description_fr" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description (Français)</label>
                        <textarea name="description_fr" id="edit_description_fr" class="mt-1 block w-full"></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="edit_description_ar" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description (Arabe)</label>
                        <textarea name="description_ar" id="edit_description_ar" class="mt-1 block w-full"></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="edit_front_image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Image de couverture</label>
                        <input type="file" name="front_image" id="edit_front_image" class="mt-1 block w-full">
                    </div>
                    <div class="flex justify-end">
                        <x-primary-button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2" onclick="closeEditArticleModal()">Annuler</x-primary-button>
                        <x-primary-button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Enregistrer</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Article Modal -->
    <div id="deleteArticleModal" class="fixed z-10 inset-0 hidden overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="bg-white dark:bg-gray-800 p-6 rounded shadow-lg w-full max-w-md">
                <h2 class="text-lg font-bold mb-4">Supprimer un Article</h2>
                <p>Êtes-vous sûr de vouloir supprimer cet article ?</p>
                <form id="deleteArticleForm" action="#" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="flex justify-end mt-4">
                        <x-primary-button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2" onclick="closeDeleteArticleModal()">Annuler</x-primary-button>
                        <x-primary-button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Supprimer</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal JS Functions (add/edit/delete) -->
    <script>
        function openAddArticleModal() {
            document.getElementById('addArticleModal').classList.remove('hidden');
        }

        function closeAddArticleModal() {
            document.getElementById('addArticleModal').classList.add('hidden');
        }

        function openEditArticleModal(id, title_en, description_en, title_fr, description_fr, title_ar, description_ar) {
            document.getElementById('editArticleForm').action = `/articles/${id}`;
            document.getElementById('edit_title_en').value = title_en;
            document.getElementById('edit_description_en').value = description_en;
            document.getElementById('edit_title_fr').value = title_fr;
            document.getElementById('edit_description_fr').value = description_fr;
            document.getElementById('edit_title_ar').value = title_ar;
            document.getElementById('edit_description_ar').value = description_ar;
            document.getElementById('editArticleModal').classList.remove('hidden');
        }

        function closeEditArticleModal() {
            document.getElementById('editArticleModal').classList.add('hidden');
        }

        function openDeleteArticleModal(id) {
            document.getElementById('deleteArticleForm').action = `/articles/${id}`;
            document.getElementById('deleteArticleModal').classList.remove('hidden');
        }

        function closeDeleteArticleModal() {
            document.getElementById('deleteArticleModal').classList.add('hidden');
        }
    </script>
</x-app-layout>
