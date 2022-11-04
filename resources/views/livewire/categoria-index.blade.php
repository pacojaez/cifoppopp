<div class="flex flex-row justify-around w-full p-2 m-2 bg-gray-200">
   {{-- @foreach ( $categories as $categoria )
       <button class="p-2 m-2 bg-green-200 rounded">
            {{ $categoria->nombre }}
       </button>
   @endforeach --}}

   <div>
    <ul class="w-full mx-auto my-4" x-data="{ selected: null }">
        <li class="flex flex-col align-center">
            <h4 @click="selected !== 0 ? selected = 0 : selected = null"
                class="inline-block w-full px-5 py-3 text-center text-white bg-indigo-300 rounded-t cursor-pointer hover:opacity-75 hover:shadow hover:-mb-3">
                NUESTRAS CATEGORIAS
            </h4>
            <div x-show="selected == 0" class="px-2 py-4 border">
                <!-- begin: categoria card -->
                <!-- alpine ajax -->
                <div class="h-full p-4 text-gray-800 bg-gray-200 lg:p-8" x-data="alpineCategoriasInstance()" x-init="fetch('http://localhost:8000/api/categorias')
                    .then(response => response.json())
                    .then(data => categorias = data)">
                    <h1 class="mt-0 mb-3 text-3xl font-light" x-text="title">
                        <!-- title text -->
                    </h1>
                    <div class="flex flex-row justify-center w-full pb-8 -mx-2">
                        <!-- begin: categoria card -->
                        <template x-for="categoria in categorias" :key="categoria.id">
                            <form action="{{ route('categoria.anuncios') }}" method="GET" class="flex flex-row">
                                @csrf
                                <div class="flex flex-col md:flex-row place-items-center">
                                    <div class="w-full px-3">
                                        <div class="mb-2">
                                            <input type="hidden" x-bind:placeholder="categoria.nombre" name="nombre" id="nombre" x-bind:value="categoria.nombre">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" x-html="categoria.nombre" class="hover:underline"></button>
                            </form>
                        </template>
                        <!-- end: categoria card -->
                    </div>
                </div>
                <!-- end alpine component-->
                <!-- end: categoria card -->
            </div>
        </li>
    </ul>
    <script>
        function alpineCategoriasInstance() {
            return {
                title: '',
                intro: 'Implement a simple <code class="text-pink-600 text-md">fetch()</code> request to render a list of items using Alpine.js :)',
                categorias: [],
            }
        }
    </script>
</div>
</div>
