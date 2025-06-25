<x-app-layout>

<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">{{ __('categories.show') }}</h1>
            <a href="{{ route('categories.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded dark:bg-gray-700 dark:hover:bg-gray-500">
                {{ __('categories.back') }}
            </a>
        </div>

        <div class="bg-white dark:bg-gray-900 shadow-md rounded-lg p-6">
            <div class="mb-6">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">{{ __('categories.products_in_category') }}</h2>
                
                <div class="grid grid-cols-1 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">ID</label>
                        <p class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $category->id }}</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('categories.name') }}</label>
                        <p class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $category->name }}</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('categories.description') }}</label>
                        <p class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $category->description ?? __('categories.no_description') }}</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('categories.created_at') }}</label>
                        <p class="mt-1 text-sm text-gray-900 dark:text-gray-100">
                            {{ $category->created_at ? $category->created_at->format('d/m/Y H:i:s') : __('categories.no_date') }}
                        </p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('categories.updated_at') }}</label>
                        <p class="mt-1 text-sm text-gray-900 dark:text-gray-100">
                            {{ $category->updated_at ? $category->updated_at->format('d/m/Y H:i:s') : __('categories.no_date') }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">{{ __('categories.products_in_category') }}</h3>
                @if($category->products->count() > 0)
                    <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
                        <ul class="space-y-2">
                            @foreach($category->products as $product)
                                <li class="flex justify-between items-center">
                                    <span class="text-sm text-gray-900 dark:text-gray-100">{{ $product->name }}</span>
                                    <span class="text-sm text-gray-500 dark:text-gray-300">${{ number_format($product->price, 2) }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @else
                    <p class="text-sm text-gray-500 dark:text-gray-300">{{ __('categories.no_products_in_category') }}</p>
                @endif
            </div>

            <div class="flex justify-end space-x-3">
                <a href="{{ route('categories.edit', $category->id) }}" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded dark:bg-indigo-700 dark:hover:bg-indigo-500">
                    {{ __('categories.edit') }}
                </a>
                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded dark:bg-red-700 dark:hover:bg-red-500" onclick="return confirm('{{ __('categories.delete_confirmation') }}')">
                        {{ __('categories.delete') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

</x-app-layout>