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
                            {{-- <iframe width="100%" height="315"
                                src="https://www.youtube.com/embed/jfKfPfyJRdk?si=dlOqDRb1y2qE7Vgd"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe> --}}
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

                <form action="{{ route('message.update', ['message' => $message->id]) }}" method="POST"
                    class="pt-3" id="form-edit-message">
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

                {{-- MEDIA FORMS --}}
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
                            class="modal-submit mt-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none focus:ring-blue-800">Agregar
                            Imagen</button>
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
        #form-add-image {
            display: none;
        }

        #form-add-message.active,
        #form-edit-message.active,
        #form-add-image.active {
            display: block;
        }
    </style>

    <script>
        const closeModal = document.querySelector('.close-modal');
        const modalTitle = document.querySelector('#modal-title');
        const modal = document.querySelector('.modal');
        const modalSubmit = document.querySelector('.modal-submit');

        const messageBtn = document.querySelector('.add-message');
        const formAddMessage = document.querySelector('#form-add-message');
        const editMessage = document.querySelectorAll('.edit-message');
        const formEditMessage = document.querySelector('#form-edit-message');
        const messageInput = document.querySelector('#message-input');
        const messageIdInput = document.querySelector('#message-id-input');

        const addImageBtn = document.querySelector('#add-image');
        const formAddImage = document.querySelector('#form-add-image');



        let modalFor;

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
            modalTitle.textContent = "Agregar Aviso"
            formAddImage.classList.toggle('active');
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
        }
    </script>
</x-app-layout>
