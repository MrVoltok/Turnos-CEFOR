@extends('layouts.app')

@section('content')
    <audio id="mySound" src="{{ asset('sound/noti.mp3') }}" preload="auto"></audio>

    <h1 class="font-bold  text-5xl">Gestión de Turnos</h1>
    <section class="controls-init">
        <form action="{{ route('init-turnos') }}" method="POST" id="configuracion">
            @csrf
            <div>
                <label for="numeroInicial">Inicio:</label>
                <input type="number" id="numero_inicial" name="numeroInicial" value="{{ $modules->global }}" required>
            </div>
            <button
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Iniciar
                Turnos</button>
        </form>
        <a href="{{ route('home') }}" target="_blank" rel="noopener"
            class="link-to-home focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Pantalla
            de turnos</a>
    </section>
    <section class="modules">
        {{-- <div id="modulo1" class="module">
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
        <div id="modulo3" class="module">
            <h2 class="font-bold text-xl">Módulo 4</h2>
            <p>Atendiendo Turno: <span id="turno_modulo4" class="font-bold">{{ $modules->modulo4 }}</span></p>
            <form action="{{ route('actualizar-turnos') }}" method="POST">
                @csrf
                <input type="hidden" name="global" value="{{ $modules->global }}">
                <input type="hidden" name="modulo" value="modulo4">
                <button
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 next">Siguiente</button>
            </form>
        </div> --}}
        @foreach (['modulo1' => $modules->modulo1, 'modulo2' => $modules->modulo2, 'modulo3' => $modules->modulo3, 'modulo4' => $modules->modulo4] as $moduloKey => $moduloValue)
            @if (!in_array($moduloKey, $disabledModules))
                <div id="{{ $moduloKey }}" class="module">
                    <h2 class="font-bold text-xl">{{ ucfirst(str_replace('modulo', 'Módulo ', $moduloKey)) }}</h2>
                    <p>Atendiendo Turno: <span id="turno_{{ $moduloKey }}" class="font-bold">{{ $moduloValue }}</span>
                    </p>
                    <form action="{{ route('actualizar-turnos') }}" method="POST">
                        @csrf
                        <input type="hidden" name="modulo" value="{{ $moduloKey }}">
                        <input type="hidden" name="global" value="{{ $modules->global }}">
                        <button
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 next">
                            Siguiente
                        </button>
                    </form>
                </div>
            @endif
        @endforeach
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

        .controls-init {
            display: flex;
            justify-content: center;
            min-width: 250px;
        }

        .link-to-home {
            height: fit-content;
            display: flex;
            justify-content: center;
            align-items: center;
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
            min-width: 250px;
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

        @media (max-width: 768px) {
            .controls-init {
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }

            .controls-init form {
                flex-direction: column;
                justify-content: start;
                align-items: flex-start;
                gap: 10px;
            }

            .controls-init form button {
                min-width: 250px;
                max-width: 300px;
            }

            .link-to-home {
                min-width: 250px;
                max-width: 300px;
            }
        }
    </style>

    <script>
        var currentTurns = {
            modulo1: parseInt($('#turno_modulo1').text()),
            modulo2: parseInt($('#turno_modulo2').text()),
            modulo3: parseInt($('#turno_modulo3').text())
        };

        function fetchTurnosGestion() {
            $.ajax({
                url: '{{ route('turnos.get') }}',
                method: 'GET',
                success: function(response) {
                    turn1 = response.modulo1;
                    turn2 = response.modulo2;
                    turn3 = response.modulo3;

                    console.log(turn1, turn2, turn3);

                    var changes = false;

                    if (turn1 !== currentTurns.modulo1) {
                        $('#turno_modulo1').text(turn1);
                        currentTurns.modulo1 = turn1;
                        changes = true;
                    }

                    if (turn2 !== currentTurns.modulo2) {
                        $('#turno_modulo2').text(turn2);
                        currentTurns.modulo2 = turn2;
                        changes = true;
                    }

                    if (turn3 !== currentTurns.modulo3) {
                        $('#turno_modulo3').text(turn3);
                        currentTurns.modulo3 = turn3;
                        changes = true;
                    }

                    if (changes) {
                        location.reload();
                    }

                },
                error: function(xhr, status, error) {
                    console.error('Error fetching turnos:', error);
                }
            });
        }

        setInterval(fetchTurnosGestion, 5000);
    </script>
@endsection
