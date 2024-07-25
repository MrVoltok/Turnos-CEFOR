<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            Panel de Administrador
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex gap-4">
            <div class="w-[40%] text-gray-100 flex flex-col gap-4">
                <section class="bg-gray-800 p-6 shadow-sm sm:rounded-lg modules">
                    <header class="flex justify-between">
                        <h3 class="font-bold text-3xl">Modulos</h3>
                        <div class="buttons">
                            <a type="button"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none focus:ring-blue-800">Info</a>
                            <button type="button"
                                class="focus:outline-none text-white bg-yellow-500 hover:bg-yellow-600 focus:ring-4  font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:ring-yellow-900">Editar</button>
                        </div>
                    </header>
                    <article class="pt-2">
                        <ul class="flex flex-col gap-2">
                            <li class="flex items-center gap-1">
                                <i class='bx bxs-circle text-sm text-green-600'></i>
                                <div class="module-info flex gap-4 items-end">
                                    <span class="text-xl font-bold">Módulo 1</span>
                                    <p>Atendiendo al turno: 1</p>
                                </div>
                            </li>
                            <li class="flex items-center gap-1">
                                <i class='bx bxs-circle text-sm text-green-600'></i>
                                <div class="module-info flex gap-4 items-end">
                                    <span class="text-xl font-bold">Módulo 2</span>
                                    <p>Atendiendo al turno: 3</p>
                                </div>
                            </li>
                            <li class="flex items-center gap-1">
                                <i class='bx bxs-circle text-sm text-green-600'></i>
                                <div class="module-info flex gap-4 items-end">
                                    <span class="text-xl font-bold">Módulo 3</span>
                                    <p>Atendiendo al turno: 4</p>
                                </div>
                            </li>
                            <li class="flex items-center gap-1">
                                <i class='bx bxs-circle text-sm text-red-600'></i>
                                <div class="module-info flex gap-4 items-end">
                                    <span class="text-xl font-bold">Módulo 4</span>
                                    <p></p>
                                </div>
                            </li>
                        </ul>
                    </article>
                </section>

                <section class="bg-gray-800 p-6 shadow-sm sm:rounded-lg brands messages">
                    <header class="flex justify-between">
                        <h3 class="font-bold text-3xl">Avisos</h3>
                        <div class="buttons">
                            <button type="button"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none focus:ring-blue-800">Agregar</button>
                        </div>
                    </header>
                    <article class="pt-3">
                        <ul class="flex flex-col gap-2">
                            <li class="flex justify-between items-center p-3 bg-gray-900 rounded">
                                <div class="message-info max-w-[50%]">
                                    <p class="text-sm">La inscripción a los cursos de natación serán en los días del 18
                                        de noviembre al
                                        25 de noviembre.</p>
                                </div>
                                <div class="message-buttons flex gap-2">
                                    <button>
                                        <button type="button"
                                            class="focus:outline-none text-white bg-yellow-500 hover:bg-yellow-600 focus:ring-4  font-medium rounded-lg text-sm px-3 py-1.5 focus:ring-yellow-900">
                                            <i class='bx bxs-edit-alt font-bold'></i>
                                            <span class="font-bold">Editar</span>
                                        </button>
                                        <button type="button"
                                            class="focus:outline-none text-white bg-red-500 hover:bg-red-600 focus:ring-4  font-medium rounded-lg text-sm px-3 py-1.5 focus:ring-red-900">
                                            <i class='bx bxs-edit-alt font-bold'></i>
                                            <span class="font-bold">Eliminar</span>
                                        </button>
                                    </button>
                                </div>
                            </li>
                            <li class="flex justify-between items-center p-3 bg-gray-900 rounded">
                                <div class="message-info max-w-[50%]">
                                    <p class="text-sm">La inscripción a los cursos de natación serán en los días del 18
                                        de noviembre al
                                        25 de noviembre.</p>
                                </div>
                                <div class="message-buttons flex gap-2">
                                    <button>
                                        <button type="button"
                                            class="focus:outline-none text-white bg-yellow-500 hover:bg-yellow-600 focus:ring-4  font-medium rounded-lg text-sm px-3 py-1.5 focus:ring-yellow-900">
                                            <i class='bx bxs-edit-alt font-bold'></i>
                                            <span class="font-bold">Editar</span>
                                        </button>
                                        <button type="button"
                                            class="focus:outline-none text-white bg-red-500 hover:bg-red-600 focus:ring-4  font-medium rounded-lg text-sm px-3 py-1.5 focus:ring-red-900">
                                            <i class='bx bxs-edit-alt font-bold'></i>
                                            <span class="font-bold">Eliminar</span>
                                        </button>
                                    </button>
                                </div>
                            </li>
                            <li class="flex justify-between items-center p-3 bg-gray-900 rounded">
                                <div class="message-info max-w-[50%]">
                                    <p class="text-sm">La inscripción a los cursos de natación serán en los días del 18
                                        de noviembre al
                                        25 de noviembre.</p>
                                </div>
                                <div class="message-buttons flex gap-2">
                                    <button>
                                        <button type="button"
                                            class="focus:outline-none text-white bg-yellow-500 hover:bg-yellow-600 focus:ring-4  font-medium rounded-lg text-sm px-3 py-1.5 focus:ring-yellow-900">
                                            <i class='bx bxs-edit-alt font-bold'></i>
                                            <span class="font-bold">Editar</span>
                                        </button>
                                        <button type="button"
                                            class="focus:outline-none text-white bg-red-500 hover:bg-red-600 focus:ring-4  font-medium rounded-lg text-sm px-3 py-1.5 focus:ring-red-900">
                                            <i class='bx bxs-edit-alt font-bold'></i>
                                            <span class="font-bold">Eliminar</span>
                                        </button>
                                    </button>
                                </div>
                            </li>
                        </ul>
                    </article>
                </section>
            </div>

            <div class="w-[60%] text-gray-100 flex flex-col gap-4">
                <div class="bg-gray-800 p-6 shadow-sm sm:rounded-lg">
                    <header class="flex justify-between">
                        <h3 class="font-bold text-3xl">Diseño</h3>
                        <div class="buttons">
                            <button type="button"
                                class="focus:outline-none text-white bg-yellow-500 hover:bg-yellow-600 focus:ring-4  font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:ring-yellow-900">Cambiar</button>
                        </div>
                    </header>
                    <article class="pt-3">
                        <ul class="flex justify-between gap-3">
                            <li class="flex flex-col items-center gap-2 shadow-xl p-2 bg-gray-900 rounded">
                                <div class="screen-layout w-full h-full rounded overflow-hidden shadow-xl">
                                    <picture>
                                        <img src="{{ asset('img/layouts/imagenes.png') }}" alt="Imágenes"
                                            class="w-full h-full">
                                    </picture>
                                </div>
                                <span class="text-xl font-bold">Imágenes</span>
                            </li>
                            <li class="flex flex-col items-center gap-2 shadow-xl p-2 rounded">
                                <div class="screen-layout w-full h-full rounded overflow-hidden shadow-xl">
                                    <picture>
                                        <img src="{{ asset('img/layouts/videos.png') }}" alt="Imágenes"
                                            class="w-full h-full">
                                    </picture>
                                </div>
                                <span class="text-xl font-bold">Videos</span>
                            </li>
                            <li class="flex flex-col items-center gap-2 shadow-xl p-2 rounded">
                                <div class="screen-layout w-full h-full rounded overflow-hidden shadow-xl">
                                    <picture>
                                        <img src="{{ asset('img/layouts/transmisiones.png') }}" alt="Imágenes"
                                            class="w-full h-full">
                                    </picture>
                                </div>
                                <span class="text-xl font-bold">Transmisiones</span>
                            </li>
                        </ul>
                    </article>
                </div>

                <div class="bg-gray-800 p-6 shadow-sm sm:rounded-lg ">
                    <header class="flex justify-between">
                        <h3 class="font-bold text-3xl">Imágenes</h3>
                        <div class="buttons">
                            <button type="button"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none focus:ring-blue-800">Agregar</button>
                        </div>
                    </header>
                    <article class="pt-3">
                        <ul class="flex justify-between gap-2 overflow-x-scroll">
                            <li class="flex flex-col items-center gap-2 shadow-xl p-2 bg-gray-900 rounded">
                                <div class="image w-[220px] h-[220px] rounded overflow-hidden shadow-xl relative">
                                    <picture>
                                        <img src="{{ asset('img/campamento.jpg') }}" alt="Imágenes"
                                            class="w-full h-full">
                                    </picture>
                                    <button type="button"
                                        class="absolute right-0 top-0 focus:outline-none text-white bg-red-500 hover:bg-red-600 focus:ring-4  font-medium rounded text-sm px-3 py-1.5 focus:ring-red-900">
                                        <i class='bx bxs-trash'></i>
                                    </button>
                                </div>
                            </li>
                            <li class="flex flex-col items-center gap-2 shadow-xl p-2 bg-gray-900 rounded">
                                <div class="image w-[220px] h-[220px] rounded overflow-hidden shadow-xl">
                                    <picture>
                                        <img src="{{ asset('img/curso1.jpeg') }}" alt="Imágenes"
                                            class="w-full h-full">
                                    </picture>
                                </div>
                            </li>
                            <li class="flex flex-col items-center gap-2 shadow-xl p-2 bg-gray-900 rounded">
                                <div class="image w-[220px] h-[220px] rounded overflow-hidden shadow-xl">
                                    <picture>
                                        <img src="{{ asset('img/curso4.jpeg') }}" alt="Imágenes"
                                            class="w-full h-full">
                                    </picture>
                                </div>
                            </li>
                            <li class="flex flex-col items-center gap-2 shadow-xl p-2 bg-gray-900 rounded">
                                <div class="image w-[220px] h-[220px] rounded overflow-hidden shadow-xl">
                                    <picture>
                                        <img src="{{ asset('img/LobosBUAP.png') }}" alt="Imágenes"
                                            class="w-full h-full">
                                    </picture>
                                </div>
                            </li>
                        </ul>
                    </article>
                </div>

                <div class="bg-gray-800 p-6 shadow-sm sm:rounded-lg ">
                    <header class="flex justify-between">
                        <h3 class="font-bold text-3xl">Videos</h3>
                        <div class="buttons">
                            <button type="button"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none focus:ring-blue-800">Agregar</button>
                        </div>
                    </header>
                    <article class="pt-3">
                        <ul class="flex justify-between gap-2 overflow-x-scroll">
                            <li class="flex flex-col items-center gap-2 shadow-xl p-2 bg-gray-900 rounded">
                                <div class="image w-[300px] h-full rounded overflow-hidden shadow-xl relative">
                                    <video controls src="{{ asset('video/video.mp4') }}"></video>
                                    <button type="button"
                                        class="absolute right-0 top-0 focus:outline-none text-white bg-red-500 hover:bg-red-600 focus:ring-4  font-medium rounded text-sm px-3 py-1.5 focus:ring-red-900">
                                        <i class='bx bxs-trash'></i>
                                    </button>
                                </div>
                            </li>
                            <li class="flex flex-col items-center gap-2 shadow-xl p-2 bg-gray-900 rounded">
                                <div class="image w-[300px] h-full rounded overflow-hidden shadow-xl relative">
                                    <video controls src="{{ asset('video/video.mp4') }}"></video>
                                    <button type="button"
                                        class="absolute right-0 top-0 focus:outline-none text-white bg-red-500 hover:bg-red-600 focus:ring-4  font-medium rounded text-sm px-3 py-1.5 focus:ring-red-900">
                                        <i class='bx bxs-trash'></i>
                                    </button>
                                </div>
                            </li>
                            <li class="flex flex-col items-center gap-2 shadow-xl p-2 bg-gray-900 rounded">
                                <div class="image w-[300px] h-full rounded overflow-hidden shadow-xl relative">
                                    <video controls src="{{ asset('video/video.mp4') }}"></video>
                                    <button type="button"
                                        class="absolute right-0 top-0 focus:outline-none text-white bg-red-500 hover:bg-red-600 focus:ring-4  font-medium rounded text-sm px-3 py-1.5 focus:ring-red-900">
                                        <i class='bx bxs-trash'></i>
                                    </button>
                                </div>
                            </li>
                            <li class="flex flex-col items-center gap-2 shadow-xl p-2 bg-gray-900 rounded">
                                <div class="image w-[300px] h-full rounded overflow-hidden shadow-xl relative">
                                    <video controls src="{{ asset('video/video.mp4') }}"></video>
                                    <button type="button"
                                        class="absolute right-0 top-0 focus:outline-none text-white bg-red-500 hover:bg-red-600 focus:ring-4  font-medium rounded text-sm px-3 py-1.5 focus:ring-red-900">
                                        <i class='bx bxs-trash'></i>
                                    </button>
                                </div>
                            </li>
                        </ul>
                    </article>
                </div>

                <div class="bg-gray-800 p-6 shadow-sm sm:rounded-lg ">
                    <header class="flex justify-between">
                        <h3 class="font-bold text-3xl">Transmisiones</h3>
                        <div class="buttons">
                            <button type="button"
                                class="focus:outline-none text-white bg-yellow-500 hover:bg-yellow-600 focus:ring-4  font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:ring-yellow-900">Cambiar</button>
                        </div>
                    </header>
                    <article class="pt-3">
                        <div class="iframe-container rounded overflow-hidden">
                            <iframe width="100%" height="315"
                                src="https://www.youtube.com/embed/jfKfPfyJRdk?si=dlOqDRb1y2qE7Vgd"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </div>

                    </article>
                </div>
            </div>
        </div>
    </div>

    <style>
        .message-info p {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
</x-app-layout>
