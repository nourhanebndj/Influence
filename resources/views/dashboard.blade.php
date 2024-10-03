<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight" style="background-color: #1E40AF; color: white; padding: 1rem; border-radius: 0.25rem;">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Cards Container -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Catégories Card -->
                <a href="{{ route('categories.index') }}" class="block">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 flex items-center">
                        <div class="flex-shrink-0">
                            <div style="background-color: #1E40AF; border-radius: 50%; padding: 1rem; color: white;">
                                <i class="fas fa-folder fa-2x"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <div class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                                {{ $categories_count }}
                            </div>
                            <div class="text-sm text-gray-500 dark:text-gray-400">
                                Catégories
                            </div>
                        </div>
                    </div>
                </a>

                <!-- Portfolio Card -->
                <a href="{{ route('admin.portfolios.index') }}" class="block">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 flex items-center">
                        <div class="flex-shrink-0">
                            <div style="background-color: #1E40AF; border-radius: 50%; padding: 1rem; color: white;">
                                <i class="fas fa-briefcase fa-2x"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <div class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                                {{ $portfolio_count }}
                            </div>
                            <div class="text-sm text-gray-500 dark:text-gray-400">
                                Portfolio
                            </div>
                        </div>
                    </div>
                </a>

                <!-- Blog Card -->
                <a href="{{ route('articles.index') }}" class="block">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 flex items-center">
                        <div class="flex-shrink-0">
                            <div style="background-color: #1E40AF; border-radius: 50%; padding: 1rem; color: white;">
                                <i class="fas fa-blog fa-2x"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <div class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                                {{ $blog_count }}
                            </div>
                            <div class="text-sm text-gray-500 dark:text-gray-400">
                                Blog Posts
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Members List Table -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4 text-gray-900 dark:text-gray-100">Members</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Role</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach ($members as $member)
                            <tr>
                                <!-- Name & Profile Picture -->
                                <td class="px-6 py-4 whitespace-nowrap flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full" src="{{ $member->profile_photo_url }}" alt="{{ $member->name }}">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                            {{ $member->name }}
                                        </div>
                                        <div class="text-sm text-gray-500 dark:text-gray-400">
                                            {{ $member->email }}
                                        </div>
                                    </div>
                                </td>
                                <!-- Role -->
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                    Admin
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
