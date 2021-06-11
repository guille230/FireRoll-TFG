<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Producto
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <form method="POST" action="{{ route('gestionProductos.update', $producto->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="name" class="block font-medium text-sm text-gray-700">Nombre</label>
                            <input type="text" name="name" id="name" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('name', $producto->name) }}"/>
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="name" class="block font-medium text-sm text-gray-700">Imagen</label>
                            <input type="text" name="image" id="image" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('image', $producto->image) }}"/>
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div>
                                <label for="cost" class="block font-medium text-sm text-gray-700">Precio</label>
                                <input type="text" name="cost" id="cost" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('cost', $producto->cost) }}"/>
                            </div>
                            <div>
                                <label for="name" class="block font-medium text-sm text-gray-700">Stock</label>
                                <input type="text" name="stock" id="stock" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('stock', $producto->stock) }}"/>
                            </div>
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="name" class="block font-medium text-sm text-gray-700">Distrubuidor</label>
                            <input type="text" name="dealer" id="dealer" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('dealer', $producto->dealer) }}"/>
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="name" class="block font-medium text-sm text-gray-700">Descripcion</label>
                            <input type="text" name="description" id="description" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('description', $producto->description) }}"/>
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="name" class="block font-medium text-sm text-gray-700">tags</label>
                            <input type="text" name="tags" id="tags" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('tags', $producto->tags) }}"/>
                        </div>
                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Editar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>