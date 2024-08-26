<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            Panel de Administrador
        </h2>
    </x-slot>

    <div class="py-12 relative">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex gap-4">
            <div class="w-[40%] text-gray-100 flex flex-col gap-4">
                <section class="bg-gray-800 p-6 shadow-sm sm:rounded-lg modules">
                    <header class="flex justify-between">
                        <h3 class="font-bold text-3xl">Modulos</h3>
                        <div class="buttons">
                            <a type="button"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none focus:ring-blue-800">Info</a>
                            <button type="button" id="check-modules-btn"
                                class="focus:outline-none text-white bg-yellow-500 hover:bg-yellow-600 focus:ring-4  font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:ring-yellow-900">Editar</button>
                        </div>
                    </header>
                    <article class="pt-2">
                        <ul class="flex flex-col gap-2">
                            @php
                                $modulesArray = [
                                    'modulo1' => $modules->modulo1,
                                    'modulo2' => $modules->modulo2,
                                    'modulo3' => $modules->modulo3,
                                    'modulo4' => $modules->modulo4,
                                ];

                                $dataRestrict = $modules->restrict;

                                $arrayRestrict = json_decode($dataRestrict, true);

                            @endphp

                            @foreach ($modulesArray as $moduleKey => $moduleValue)
                                <li class="flex items-center gap-3">
                                    @if (in_array($moduleKey, $arrayRestrict))
                                        <i class='bx bxs-circle text-sm text-red-600'></i>
                                    @else
                                        <i class='bx bxs-circle text-sm text-green-600'></i>
                                    @endif
                                    <div class="module-info flex gap-4 items-end">
                                        <span class="text-xl font-bold">Módulo {{ $loop->iteration }}</span>
                                        @if (!in_array($moduleKey, $arrayRestrict))
                                            <p>Atendiendo al turno: {{ $moduleValue }}</p>
                                        @endif
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </article>
                    {{-- <footer class="mt-3 flex justify-center">
                        <button type="button" id="accept-modules"
                            class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none focus:ring-green-800">Aplicar
                            cambios</button>
                    </footer> --}}
                </section>

                <section class="bg-gray-800 p-6 shadow-sm sm:rounded-lg brands messages">
                    <header class="flex justify-between">
                        <h3 class="font-bold text-3xl">Avisos</h3>
                        <div class="buttons">
                            <button type="button"
                                class="add-message text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none focus:ring-blue-800">Agregar</button>
                        </div>
                    </header>
                    <article class="pt-3">
                        <ul class="flex flex-col gap-2">
                            @forelse ($messages as $message)
                                <li class="flex justify-between items-center p-3 bg-gray-900 rounded">
                                    <div class="message-info max-w-[50%]">
                                        <p class="text-sm">{{ $message->message }}</p>
                                    </div>
                                    <div class="message-buttons flex gap-2">
                                        <button type="button"
                                            class="edit-message focus:outline-none text-white bg-yellow-500 hover:bg-yellow-600 focus:ring-4  font-medium rounded-lg text-sm px-3 py-1.5 focus:ring-yellow-900"
                                            data-id="{{ $message->id }}" data-message="{{ $message->message }}">
                                            <i class='bx bxs-edit-alt font-bold'></i>
                                            <span class="font-bold">Editar</span>
                                        </button>
                                        <form action="{{ route('message.delete', ['message' => $message->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="focus:outline-none text-white bg-red-500 hover:bg-red-600 focus:ring-4  font-medium rounded-lg text-sm px-3 py-1.5 focus:ring-red-900">
                                                <i class='bx bxs-edit-alt font-bold'></i>
                                                <span class="font-bold">Eliminar</span>
                                            </button>
                                        </form>
                                    </div>
                                </li>
                            @empty
                                <span class="text-gray-100 font-bold text-xl">No hay avisos registrados.</span>
                            @endforelse
                        </ul>
                    </article>
                </section>
            </div>

            <div class="w-[60%] text-gray-100 flex flex-col gap-4">
                <div class="bg-gray-800 p-6 shadow-sm sm:rounded-lg">
                    <header class="flex justify-between">
                        <h3 class="font-bold text-3xl">Diseño</h3>
                        <div class="buttons">
                            <button type="button" id="select-screen"
                                class="focus:outline-none text-white bg-yellow-500 hover:bg-yellow-600 focus:ring-4  font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:ring-yellow-900">Cambiar</button>
                        </div>
                    </header>
                    <article class="pt-3">
                        <ul class="flex justify-between gap-3">
                            @if ($screenView->screenView == 'img')
                                <li class="flex flex-col items-center gap-2 shadow-xl p-2 bg-gray-900 rounded">
                                    <div class="screen-layout w-full h-full rounded overflow-hidden shadow-xl">
                                        <picture>
                                            <img src="{{ asset('img/layouts/imagenes.png') }}" alt="Imágenes"
                                                class="w-full h-full">
                                        </picture>
                                    </div>
                                    <span class="text-xl font-bold">Imágenes</span>
                                </li>
                            @else
                                <li class="flex flex-col items-center gap-2 shadow-xl p-2 rounded">
                                    <div class="screen-layout w-full h-full rounded overflow-hidden shadow-xl">
                                        <picture>
                                            <img src="{{ asset('img/layouts/imagenes.png') }}" alt="Imágenes"
                                                class="w-full h-full">
                                        </picture>
                                    </div>
                                    <span class="text-xl font-bold">Imágenes</span>
                                </li>
                            @endif

                            @if ($screenView->screenView == 'video')
                                <li class="flex flex-col items-center gap-2 shadow-xl p-2 bg-gray-900 rounded">
                                    <div class="screen-layout w-full h-full rounded overflow-hidden shadow-xl">
                                        <picture>
                                            <img src="{{ asset('img/layouts/videos.png') }}" alt="Imágenes"
                                                class="w-full h-full">
                                        </picture>
                                    </div>
                                    <span class="text-xl font-bold">Videos</span>
                                </li>
                            @else
                                <li class="flex flex-col items-center gap-2 shadow-xl p-2 rounded">
                                    <div class="screen-layout w-full h-full rounded overflow-hidden shadow-xl">
                                        <picture>
                                            <img src="{{ asset('img/layouts/videos.png') }}" alt="Imágenes"
                                                class="w-full h-full">
                                        </picture>
                                    </div>
                                    <span class="text-xl font-bold">Videos</span>
                                </li>
                            @endif

                            @if ($screenView->screenView == 'stream')
                                <li class="flex flex-col items-center gap-2 shadow-xl p-2 bg-gray-900 rounded">
                                    <div class="screen-layout w-full h-full rounded overflow-hidden shadow-xl">
                                        <picture>
                                            <img src="{{ asset('img/layouts/transmisiones.png') }}" alt="Imágenes"
                                                class="w-full h-full">
                                        </picture>
                                    </div>
                                    <span class="text-xl font-bold">Transmisiones</span>
                                </li>
                            @else
                                <li class="flex flex-col items-center gap-2 shadow-xl p-2 rounded">
                                    <div class="screen-layout w-full h-full rounded overflow-hidden shadow-xl">
                                        <picture>
                                            <img src="{{ asset('img/layouts/transmisiones.png') }}" alt="Imágenes"
                                                class="w-full h-full">
                                        </picture>
                                    </div>
                                    <span class="text-xl font-bold">Transmisiones</span>
                                </li>
                            @endif



                        </ul>
                    </article>
                </div>

                <div class="bg-gray-800 p-6 shadow-sm sm:rounded-lg ">
                    <header class="flex justify-between">
                        <h3 class="font-bold text-3xl">Imágenes</h3>
                        <div class="buttons">
                            <button type="button" id="add-image"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none focus:ring-blue-800">Agregar</button>
                        </div>
                    </header>
                    <article class="pt-3">
                        <ul class="flex gap-2 overflow-x-scroll">
                            @forelse ($images as $image)
                                <li class="flex flex-col items-center gap-2 shadow-xl p-2 bg-gray-900 rounded">
                                    <div class="image w-[220px] h-[220px] rounded overflow-hidden shadow-xl relative">
                                        <picture>
                                            <img src="{{ Storage::url($image->name) }}" alt="Imágenes"
                                                class="w-full h-full">
                                        </picture>
                                        <form action="{{ route('image.delete', $image->id) }}" method="POST"
                                            class="absolute right-0 top-0">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="focus:outline-none text-white bg-red-500 hover:bg-red-600 focus:ring-4  font-medium rounded text-sm px-3 py-1.5 focus:ring-red-900">
                                                <i class='bx bxs-trash'></i>
                                            </button>
                                        </form>
                                    </div>
                                </li>
                            @empty
                                <span class="text-gray-100 font-bold text-xl">No hay imágenes almacenadas en el
                                    sistema.</span>
                            @endforelse
                        </ul>
                    </article>
                </div>

                <div class="bg-gray-800 p-6 shadow-sm sm:rounded-lg ">
                    <header class="flex justify-between">
                        <h3 class="font-bold text-3xl">Videos</h3>
                        <div class="buttons">
                            <button type="button" id="add-video"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none focus:ring-blue-800">Agregar</button>
                        </div>
                    </header>
                    <article class="pt-3">
                        <ul class="flex gap-2 overflow-x-scroll">
                            @forelse ($videos as $video)
                                <li class="flex flex-col items-center gap-2 shadow-xl p-2 bg-gray-900 rounded">
                                    <div class="image w-[300px] h-full rounded overflow-hidden shadow-xl relative">
                                        <video controls src="{{ Storage::url($video->name) }}"></video>
                                        <div class="button absolute top-0 right-0">
                                            <form action="{{ route('video.delete', $video->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="focus:outline-none text-white bg-red-500 hover:bg-red-600 focus:ring-4  font-medium rounded text-sm px-3 py-1.5 focus:ring-red-900">
                                                    <i class='bx bxs-trash'></i>
                                                </button>
                                            </form>
                                        </div>

                                    </div>
                                </li>
                            @empty
                                <span class="text-gray-100 font-bold text-xl">No hay videos almacenados en el
                                    sistema.</span>
                            @endforelse
                        </ul>
                    </article>
                </div>

                <div class="bg-gray-800 p-6 shadow-sm sm:rounded-lg ">
                    <header class="flex justify-between">
                        <h3 class="font-bold text-3xl">Transmisiones</h3>
                        <div class="buttons">
                            <button type="button" id="add-iframe"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none focus:ring-blue-800">Agregar</button>
                            <button type="button" id="update-iframe"
                                class="focus:outline-none text-white bg-yellow-500 hover:bg-yellow-600 focus:ring-4  font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:ring-yellow-900">Cambiar</button>
                        </div>
                    </header>
                    <article class="pt-3">
                        <div class="iframe-container rounded overflow-hidden relative">
                            @if ($transmition)
                                {!! $transmition->embedUrl !!}
                            @else
                                <span class="text-gray-100 font-bold text-xl">No hay transmisiones registradas en el
                                    sistema</span>
                            @endif
                        </div>
                    </article>
                </div>
            </div>
        </div>

        {{-- MODAL --}}
        <div class="modal text-gray-100 fixed top-0 left-0 w-full h-screen flex justify-center items-center">
            <div class="card-form w-[40%] bg-gray-700 p-6 rounded-lg shadow-xl shadow-gray-900">
                <header class="flex justify-between">
                    <h3 class="font-bold text-3xl" id="modal-title"></h3>
                    <div class="buttons">
                        <button class="close-modal">
                            <i class='bx bx-x text-4xl'></i>
                        </button>
                    </div>
                </header>

                {{-- MODULES --}}
                <form action="{{ route('modules.restrict') }}" method="POST" class="pt-3"
                    id="form-check-modules">
                    @csrf
                    <ul>
                        <li>
                            <div class="flex items-center mb-4">
                                <input type="hidden" name="modulo1" value="off">
                                <input id="default-checkbox" type="checkbox" name="modulo1" value="on" checked
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="module1" class="ms-2  font-medium text-lg text-gray-300">Modulo
                                    1</label>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center mb-4">
                                <input type="hidden" name="modulo2" value="off">
                                <input id="default-checkbox" type="checkbox" name="modulo2" value="on"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="module2" class="ms-2  font-medium text-lg text-gray-300">Modulo
                                    2</label>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center mb-4">
                                <input type="hidden" name="modulo3" value="off">
                                <input id="default-checkbox" type="checkbox" name="modulo3" value="on"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="module3" class="ms-2  font-medium text-lg text-gray-300">Modulo
                                    3</label>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center mb-4">
                                <input type="hidden" name="modulo4" value="off">
                                <input id="default-checkbox" type="checkbox" name="modulo4" value="on"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="module4" class="ms-2  font-medium text-lg text-gray-300">Modulo
                                    4</label>
                            </div>
                        </li>


                    </ul>
                    <div class="button flex justify-center">
                        <button type="submit"
                            class="modal-submit mt-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none focus:ring-blue-800">Aplicar
                            Cambios</button>
                    </div>
                </form>

                {{-- MESSAGES FORMS --}}
                <form action="{{ route('message.add') }}" method="POST" class="pt-3" id="form-add-message">
                    @csrf
                    <div class="message">
                        <label for="message" class="block mb-2 text-sm font-medium text-white-100">Aviso</label>
                        <input type="text" id="message-input" name="message"
                            class="block w-full p-2.5 text-sm rounded-lg border bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Ingrese un nuevo aviso" required />
                    </div>
                    <div class="button flex justify-center">
                        <button type="submit"
                            class="modal-submit mt-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none focus:ring-blue-800">Agregar
                            Aviso</button>
                    </div>
                </form>

                <form action="#" method="POST" class="pt-3" id="form-edit-message">
                    @csrf
                    @method('PUT')
                    <div class="message">
                        <label for="message" class="block mb-2 text-sm font-medium text-white-100">Aviso</label>
                        <input type="text" id="message-input" name="message"
                            class="block w-full p-2.5 text-sm rounded-lg border bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Ingrese un nuevo aviso" required />
                        <input type="hidden" name="id" id="message-id-input">
                    </div>
                    <div class="button flex justify-center">
                        <button type="submit"
                            class="modal-submit mt-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none focus:ring-blue-800">Actualizar
                            Aviso</button>
                    </div>
                </form>

                {{-- SCREEN OPTION --}}
                <form action="{{ route('selectView') }}" method="POST" class="pt-3" id="form-select-screen">
                    @csrf
                    @method('PUT')
                    <label for="screen" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Diseño
                        de turnos</label>
                    <select id="countries" name="screen"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected id="no-select">Seleccione una opción</option>
                        <option value="img">Imágenes</option>
                        <option value="video">Videos</option>
                        <option value="stream">Transmisiones</option>
                    </select>
                    <div class="button flex justify-center">
                        <button type="submit"
                            class="modal-submit mt-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none focus:ring-blue-800">Aplicar
                            Cambios</button>
                    </div>
                </form>

                {{-- MEDIA FORMS --}}
                {{-- ADD IMAGE FORM --}}
                <form action="{{ route('image.add') }}" method="POST" class="pt-3" id="form-add-image"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="image">
                        <label for="image" class="block mb-2 text-sm font-medium text-white-100">Imagen</label>
                        <input type="file" id="image-input" name="image"
                            class="block w-full p-2.5 text-sm rounded-lg border bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Seleccione una imagen" required />
                    </div>
                    <div class="button flex justify-center">
                        <button type="submit"
                            class="modal-submit mt-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none focus:ring-blue-800">Subir
                            Imagen</button>
                    </div>
                </form>

                {{-- ADD VIDEO FORM --}}
                <form action="{{ route('video.add') }}" method="POST" class="pt-3" id="form-add-video"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="video">
                        <label for="video" class="block mb-2 text-sm font-medium text-white-100">Video</label>
                        <input type="file" id="video-input" name="video"
                            class="block w-full p-2.5 text-sm rounded-lg border bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Seleccione un video" required />
                    </div>
                    <div class="button flex justify-center">
                        <button type="submit"
                            class="modal-submit mt-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none focus:ring-blue-800">Subir
                            Video</button>
                    </div>
                </form>

                {{-- ADD IFRAME FORM --}}
                <form action="{{ route('iframe.add') }}" method="POST" class="pt-3" id="form-add-iframe">
                    @csrf
                    <div class="iframe">
                        <label for="iframe" class="block mb-2 text-sm font-medium text-white-100">Transmisión en
                            vivo</label>
                        <input type="text" id="iframe-input" name="iframe"
                            class="block w-full p-2.5 text-sm rounded-lg border bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Ingrese el url de la transmisión" required />
                    </div>
                    <div class="button flex justify-center">
                        <button type="submit"
                            class="modal-submit mt-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none focus:ring-blue-800">Subir
                            transmisión</button>
                    </div>
                </form>

                {{-- UPDATE IFRAME --}}
                <form action="#" method="POST" class="pt-3" id="form-update-iframe">
                    @csrf
                    <div class="iframe">
                        <label for="iframe" class="block mb-2 text-sm font-medium text-white-100">Transmisión en
                            vivo - Actualizar</label>
                        <p class="id-url"></p>
                        <input type="text" id="iframe-input" name="iframe"
                            class="block w-full p-2.5 text-sm rounded-lg border bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Ingrese el url de la transmisión" required />
                    </div>
                    <div class="button flex justify-center">
                        <button type="submit"
                            class="modal-submit mt-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none focus:ring-blue-800">Actualizar
                            transmisión</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        .message-info p {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .modal {
            display: none;
        }

        .modal>form {
            display: none;
        }

        .modal.active {
            display: flex;
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(2px);
            -webkit-backdrop-filter: blur(2px);
        }

        #form-add-message,
        #form-edit-message,
        #form-add-image,
        #form-add-video,
        #form-check-modules,
        #form-add-iframe,
        #form-update-iframe,
        #form-select-screen {
            display: none;
        }

        #form-add-message.active,
        #form-edit-message.active,
        #form-add-image.active,
        #form-add-video.active,
        #form-check-modules.active,
        #form-add-iframe.active,
        #form-update-iframe.active,
        #form-select-screen.active {
            display: block;
        }

        .iframe-container {
            position: relative;
            padding-bottom: 56.25%;
            height: 0;
            overflow: hidden;
        }

        .iframe-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>

    <script>
        const closeModal = document.querySelector('.close-modal');
        const modalTitle = document.querySelector('#modal-title');
        const modal = document.querySelector('.modal');
        const modalSubmit = document.querySelector('.modal-submit');

        const checkModulesBtn = document.querySelector('#check-modules-btn');
        const formCheckModules = document.querySelector('#form-check-modules');

        const messageBtn = document.querySelector('.add-message');
        const formAddMessage = document.querySelector('#form-add-message');
        const editMessage = document.querySelectorAll('.edit-message');
        const formEditMessage = document.querySelector('#form-edit-message');
        const messageInput = document.querySelector('#message-input');
        const messageIdInput = document.querySelector('#message-id-input');

        const addImageBtn = document.querySelector('#add-image');
        const formAddImage = document.querySelector('#form-add-image');

        const addVideoBtn = document.querySelector('#add-video');
        const formAddVideo = document.querySelector('#form-add-video');

        const addIframeBtn = document.querySelector('#add-iframe');
        const updateIframeBtn = document.querySelector('#update-iframe');
        const formAddIframe = document.querySelector('#form-add-iframe');
        const formUpdateIframe = document.querySelector('#form-update-iframe');

        const selectScreenBtn = document.querySelector('#select-screen');
        const formSelectScreen = document.querySelector('#form-select-screen');

        let modalFor;

        checkModulesBtn.addEventListener('click', () => {
            modalTitle.textContent = "Habilitar / Deshabilitar Modulos"
            formCheckModules.classList.toggle('active');
            modal.classList.toggle('active');
        })

        messageBtn.addEventListener('click', () => {
            modalTitle.textContent = "Agregar Aviso"
            formAddMessage.classList.toggle('active');
            modal.classList.toggle('active');

        })

        editMessage.forEach(element => {
            element.addEventListener('click', () => {
                const messageId = element.getAttribute('data-id');
                const messageText = element.getAttribute('data-message');
                let url = `http://localhost:8000/dashboard/avisos/nuevo/${messageId}`
                formEditMessage.action = url;

                modalTitle.textContent = "Editar Aviso"
                formEditMessage.classList.toggle('active');
                modal.classList.toggle('active');

                messageInput.value = messageText;
                messageIdInput.value = messageId;
            })
        });

        addImageBtn.addEventListener('click', () => {
            modalTitle.textContent = "Agregar Imagen"
            formAddImage.classList.toggle('active');
            modal.classList.toggle('active');
        })

        addVideoBtn.addEventListener('click', () => {
            modalTitle.textContent = "Agregar Video"
            formAddVideo.classList.toggle('active');
            modal.classList.toggle('active');
        })

        addIframeBtn.addEventListener('click', () => {
            modalTitle.textContent = "Agregar Transmisión"
            formAddIframe.classList.toggle('active');
            modal.classList.toggle('active');
        });

        updateIframeBtn.addEventListener('click', () => {
            modalTitle.textContent = "Actualizar Transmisión"
            formUpdateIframe.classList.toggle('active');
            modal.classList.toggle('active');
        });

        selectScreenBtn.addEventListener('click', () => {
            modalTitle.textContent = "Elegir vista de turnos"
            formSelectScreen.classList.toggle('active');
            modal.classList.toggle('active');
        })

        closeModal.addEventListener('click', () => {
            modal.classList.remove('active');
            closeForms();
        })

        function closeForms() {
            formAddMessage.classList.remove('active');
            formEditMessage.classList.remove('active');
            formAddImage.classList.remove('active');
            formCheckModules.classList.remove('active');
            formAddIframe.classList.remove('active');
            formUpdateIframe.classList.remove('active');
            formSelectScreen.classList.remove('active');
        }
    </script>
</x-app-layout>
