@extends('layouts.master')

@section('titulo', 'Actualizacion del anuncio de Cifoppopp')

@section('contenido')
    <form method='POST' action="{{ route('anuncio.update', [ 'anuncio' => $anuncio ] ) }}" enctype="multipart/form-data">
        @csrf
        {{-- {{ csrf_field() }} --}}
        <input type="hidden" name="_method" value="PUT">
        <div class="flex flex-col px-8 pt-6 pb-8 my-2 mb-4 bg-white rounded shadow-md">
            <div class="mb-6 -mx-3 md:flex">
                <div class="px-3 mb-6 md:w-1/2 md:mb-0">
                    <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="titulo">
                        MARCA
                    </label>
                    <input
                        class="block w-full px-4 py-3 mb-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-red"
                        id="titulo" type="text" placeholder="un titulo válid" name='titulo'
                        value="{{ $anuncio->titulo }}">
                    <p class="text-xs italic text-red">Este campo es obligatorio.</p>
                </div>
                <div class="px-3 md:w-1/2">
                    <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="descripcion">
                        DESCRIPCION
                    </label>
                    <input
                        class="block w-full px-4 py-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                        id="descripcion" type="text" placeholder="Un descripcion válido" name='descripcion'
                        value="{{ $anuncio->descripcion }}">
                </div>
                <div class="px-3 mb-6 md:w-1/2 md:mb-0">
                    <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="categoria">
                        AÑADIR CATEGORIA
                    </label>
                    <select name="categoria" id="categoria" >
                        <option class="font-semibold text-gray-700 underline uppercase" disabled selected>SELECCIONA UNA CATEGORÍA</option>
                        @foreach ($categorias as $key => $name )
                            <option class="font-semibold text-gray-700 underline uppercase" value="{{ $key }}"
                                @if ($name == $anuncio->categoria->nombre)
                                    @selected(true)
                                @endif
                            >{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-2 -mx-3 md:flex">




                <div class="px-3 md:w-1/2">
                    <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="grid-state">
                        PRECIO
                    </label>
                    <input
                        class="block w-full px-4 py-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                        id="precio" type="text" placeholder="" name="precio" value="{{ $anuncio->precio }}">
                </div>
                <div class="px-3 md:w-1/2">
                    <h2>IMAGEN GUARDADA </h2>
                    <img
                        src="@if ($anuncio->image != null)
                        {{ asset('storage/'.config('filesystems.anunciosImageDir') . '/' . $anuncio->image) }}
                            @else
                            {{ asset('img/components/noimage.png') }}
                            @endif
                            ">

                    <div class="flex items-start mb-6">
                        <div class="flex items-center h-5">
                            <input id="eliminarImagen" name="eliminarImagen" aria-describedby="eliminarImagen" type="checkbox"
                                class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="eliminarImagen" class="font-medium text-gray-900">ELIMINAR IMAGEN</label>
                        </div>
                    </div>

                </div>
                <div class="px-3 md:w-1/2">
                    <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="grid-state">
                        IMAGEN
                    </label>
                    <input type="file" name="image" id="inputFile"
                        class="form-control @error('file') is-invalid @enderror">
                    {{-- <input
                        class="block w-full px-4 py-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                        id="image" type="file" accept="image/jpg, image/png, image/jpeg"
                        name="image" > --}}
                </div>
                <div class="flex flex-col justify-center px-3 md:w-1/2">
                    <h2>PREVIEW</h2>
                    <div class="px-3 preview md:w-1/2">
                        <p>No hay preseleccionada ninguna imagen</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-row justify-center">
            <button type="submit"
                class="inline-flex items-center justify-center h-8 px-4 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-indigo-700 rounded-lg hover:bg-indigo-800">
                ACTUALIZAR ANUNCIO
            </button>
        </div>
    </form>
    <div class="flex flex-row justify-center">
        <a href="{{ route('anuncio.delete', ['anuncio' => $anuncio]) }}">
            <button Class="inline-flex items-center justify-center h-8 px-4 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-red-700 rounded-lg hover:bg-red-800">
                BORRAR ANUNCIO
            </button>
        </a>
    </div>
    <script>

        const input = document.getElementById('inputFile');
        const preview = document.querySelector('.preview');
        input.style.opacity = 80;

        input.addEventListener('change', updateImageDisplay);

        function updateImageDisplay() {
            while (preview.firstChild) {
                preview.removeChild(preview.firstChild);
            }

            const curFiles = input.files;
            if (curFiles.length === 0) {
                const para = document.createElement('p');
                para.textContent = 'No hay imagenes preseleccionadas';
                preview.appendChild(para);
            } else {
                const list = document.createElement('ol');
                preview.appendChild(list);

                for (const file of curFiles) {
                    const listItem = document.createElement('li');
                    const para = document.createElement('p');
                    if (validFileType(file)) {
                        para.textContent = `File name ${file.name}, Tamaño ${returnFileSize(file.size)}.`;
                        const image = document.createElement('img');
                        image.src = URL.createObjectURL(file);

                        listItem.appendChild(image);
                        listItem.appendChild(para);
                    } else {
                        para.textContent = `File name ${file.name}: No es un tipo de imagen válido. Selecciona una imagen.`;
                        listItem.appendChild(para);
                    }

                    list.appendChild(listItem);
                }
            }
        }
        const fileTypes = [
            "image/apng",
            "image/bmp",
            "image/gif",
            "image/jpeg",
            "image/jpg",
            "image/pjpeg",
            "image/png",
            "image/svg+xml",
            "image/tiff",
            "image/webp",
            "image/x-icon"
        ];

        function validFileType(file) {
            return fileTypes.includes(file.type);
        }

        function returnFileSize(number) {
            if (number < 1024) {
                return `${number} bytes`;
            } else if (number >= 1024 && number < 1048576) {
                return `${(number / 1024).toFixed(1)} KB`;
            } else if (number >= 1048576) {
                return `${(number / 1048576).toFixed(1)} MB`;
            }
        }

         // deshabilitar el boton de subida de ficheros:
         eliminarImagen.onchange = function (){
            const preview = document.querySelector('.preview');
            input.disabled = this.checked;
            if( this.checked ){
                preview.classList.add("hidden")
            }else{
                preview.classList.remove("hidden")
            }

        }
    </script>
@endsection
