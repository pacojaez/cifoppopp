<div class="flex flex-row justify-center w-full p-2 mx-2 bg-gray-200">
    <form action="{{ route('anuncio.search') }}" method="POST" class="flex flex-row">
        @csrf
        <div class="flex flex-col md:flex-row place-items-center">
            <div class="w-full px-3">
                <div class="mb-2">
                    <label for="titulo" class="mb-1 block text-base font-medium text-[#07074D]">
                        TÍTULO
                    </label>
                    <input type="text" name="titulo" id="titulo" placeholder="Campo obligatorio"
                        value="{{ empty($titulo) ? '' : $titulo }}"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-2 px-2 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>
            </div>
            <div class="w-full px-3">
                <div class="mb-2">
                    <label for="modelo" class="mb-1 block text-base font-medium text-[#07074D]">
                        DESCRIPCIÓN
                    </label>
                    <input type="text" name="descripcion" id="descripcion" placeholder="Campo opcional"
                        value="{{ empty($descripcion) ? '' : $descripcion }}"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>
            </div>
            <div class="w-full px-2">
                <button type="submit"
                    class="px-4 py-2 m-2 text-white transition duration-500 bg-indigo-500 border border-indigo-500 rounded-md select-none ease hover:bg-indigo-600 focus:outline-none focus:shadow-outline">BUSCAR</button>
            </div>
        </div>
    </form>
</div>

{{-- @foreach ($marcas as $data)
      <p><b> {{$data->marca}} </b></p>
@endforeach --}}
