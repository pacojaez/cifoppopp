<div>
    <div class="flex items-center justify-start mt-5 bg-white">
        <div class="w-full max-w-lg mx-auto">
          <h1 class="m-2 text-3xl font-medium">TU CUENTA HA SIDO BLOQUEADA POR INFRINGIR ALGUNA DE NUESTRAS POLÍTICAS DE USO</h1>
          <h2 class="m-2 text-2xl font-bold">TUS ANUNCIOS Y OFERTAS HAN SIDO CANCELADAS</h2>
          <p class="mt-3">Este formulario es para que te pongas en contacto con admin@cifoppopp.com. </p>

          <form action="{{ route('email.blocked') }}" method="POST" enctype="multipart/form-data" class="p-0">
            @csrf
            <input type="hidden" name="access_key" value="YOUR_ACCESS_KEY_HERE" />
            <div class="grid gap-6 sm:grid-cols-2">
              <div class="relative z-0">
                <input type="text" name="name" class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0" placeholder=" " />
                <label class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">Nombre</label>
              </div>
              <div class="relative z-0">
                <input type="text" name="email" class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0" placeholder=" " />
                <label class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">Email</label>
              </div>
              <div class="relative z-0 col-span-2">
                <textarea name="message" rows="5" class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0" placeholder=" "></textarea>
                <label class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">Mensaje</label>
              </div>
            </div>
            <button type="submit" class="px-10 py-2 mt-5 text-white bg-black rounded-md">ENVIAR MENSAJE</button>
          </form>
        </div>
      </div>
</div>
