<x-app-layout>
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">{{ __('products.show') }}</h1>
            <a href="{{ route('products.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded dark:bg-gray-700 dark:hover:bg-gray-500">
                {{ __('products.back') }}
            </a>
        </div>

        <div class="bg-white dark:bg-gray-900 shadow-md rounded-lg p-6">
            <div class="mb-6">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">{{ __('products.details') }}</h2>
                <div class="grid grid-cols-1 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">ID</label>
                        <p class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $product->id }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('products.name') }}</label>
                        <p class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $product->name }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('products.description') }}</label>
                        <p class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $product->description ?? __('products.no_description') }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('products.price') }}</label>
                        <p class="mt-1 text-sm text-gray-900 dark:text-gray-100">${{ number_format($product->price, 2) }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('products.created_at') }}</label>
                        <p class="mt-1 text-sm text-gray-900 dark:text-gray-100">
                            {{ $product->created_at ? $product->created_at->format('d/m/Y H:i:s') : __('products.no_date') }}
                        </p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('products.updated_at') }}</label>
                        <p class="mt-1 text-sm text-gray-900 dark:text-gray-100">
                            {{ $product->updated_at ? $product->updated_at->format('d/m/Y H:i:s') : __('products.no_date') }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="flex justify-end space-x-3">
                <a href="{{ route('products.edit', $product->id) }}" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded dark:bg-indigo-700 dark:hover:bg-indigo-500">
                    {{ __('products.edit') }}
                </a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded dark:bg-red-700 dark:hover:bg-red-500" onclick="return confirm('{{ __('products.delete_confirmation') }}')">
                        {{ __('products.delete') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
</x-app-layout>