@extends('layouts.app')

@section('content')
    <audio id="mySound" src="{{ asset('sound/noti.mp3') }}" preload="auto"></audio>

    <h1 class="font-bold  text-5xl">Gestión de Turnos</h1>
    <form action="{{ route('init-turnos') }}" method="POST" id="configuracion">
        @csrf
        <div>
            <label for="numeroInicial">Inicio:</label>
            <input type="number" id="numero_inicial" name="numeroInicial" value="{{ $modules->global }}" required>
        </div>
        <button
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
            onclick="iniciarTurnos()">Iniciar Turnos</button>
    </form>
    <section class="modules">
        <div id="modulo1" class="module">
            <h2 class="font-bold text-xl">Módulo 1</h2>
            <p>Atendiendo Turno: <span id="turno_modulo1" class="font-bold">{{ $modules->modulo1 }}</span></p>
            <form action="{{ route('actualizar-turnos') }}" method="POST">
                @csrf
                <input type="hidden" name="modulo" value="modulo1">
                <input type="hidden" name="global" value="{{ $modules->global }}">
                <button
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 next">Siguiente</button>
            </form>
        </div>
        <div id="modulo2" class="module">
            <h2 class="font-bold text-xl">Módulo 2</h2>
            <p>Atendiendo Turno: <span id="turno_modulo2" class="font-bold">{{ $modules->modulo2 }}</span></p>
            <form action="{{ route('actualizar-turnos') }}" method="POST">
                @csrf
                <input type="hidden" name="global" value="{{ $modules->global }}">
                <input type="hidden" name="modulo" value="modulo2">
                <button
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 next">Siguiente</button>
            </form>
        </div>
        <div id="modulo3" class="module">
            <h2 class="font-bold text-xl">Módulo 3</h2>
            <p>Atendiendo Turno: <span id="turno_modulo3" class="font-bold">{{ $modules->modulo3 }}</span></p>
            <form action="{{ route('actualizar-turnos') }}" method="POST">
                @csrf
                <input type="hidden" name="global" value="{{ $modules->global }}">
                <input type="hidden" name="modulo" value="modulo3">
                <button
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 next">Siguiente</button>
            </form>
        </div>
    </section>
    {{-- <div class="button-container">
        <button class="success font-bold" onclick="anunciarTurno()">Anunciar Turno</button>
        <button class="warning font-bold" onclick="exportarTurnos()">Exportar Turnos a Excel</button>
    </div> --}}
    <script src="{{ asset('js/gestion.js') }}"></script>

    <style>
        h1 {
            text-align: center;
            margin: 20px 0;
            color: #fff;
        }

        .modules {
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
        }

        .module {
            background-color: #9c9595;
            padding: 20px;
            margin: 10px 0;
            width: 80%;
            max-width: 600px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .module h2 {
            color: #343434;
        }

        .module p {
            font-size: 1.2em;
            margin: 10px 0;
            color: #343434;
        }

        .button-container {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }

        .button-container button {
            padding: 10px 20px;
            font-size: 1em;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .button-container button:hover {
            opacity: 0.8;
        }


        .button-container button.success {
            background-color: #28a745;
        }

        .button-container button.success:hover {
            background-color: #218838;
        }

        .button-container button.warning {
            background-color: #ffc107;
            color: #333;
        }

        .button-container button.warning:hover {
            background-color: #e0a800;
        }

        #configuracion {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }

        #configuracion div {
            margin-right: 10px;
        }

        #configuracion label {
            font-size: 1.2em;
            color: #fff;
        }

        #configuracion input[type="number"] {
            padding: 8px;
            font-size: 1em;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
@endsection
