<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CEFOR - Turnos</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body>
    <div class="background-container">
        <h1 class="font-bold text-7xl pb-10 text-slate-50">Turnos</h1>
        <div class="main-container">
            <div class="modules-container">
                <div id="modulo1">
                    <div class="turno">
                        <h2 class="text-black font-bold text-2xl">Turno</h2>
                        <span id="turno_modulo1" class="text-black font-bold text-5xl">{{ $turns->modulo1 }}</span>
                    </div>
                    <div class="modulo">
                        <h2 class="text-5xl text-slate-50">Módulo 1</h2>
                    </div>
                </div>
                <div id="modulo2">
                    <div class="turno">
                        <h2 class="text-black font-bold text-2xl">Turno</h2>
                        <span class="text-black font-bold text-5xl" id="turno_modulo2">{{ $turns->modulo2 }}</span>
                    </div>
                    <div class="modulo">
                        <h2 class="text-5xl text-slate-50">Módulo 2</h2>
                    </div>
                </div>
                <div id="modulo3">
                    <div class="turno">
                        <h2 class="text-black font-bold text-2xl">Turno</h2>
                        <span class="text-black font-bold text-5xl" id="turno_modulo3">{{ $turns->modulo3 }}</span>
                    </div>
                    <div class="modulo">
                        <h2 class="text-5xl text-slate-50">Módulo 3</h2>
                    </div>
                </div>
            </div>

            <div id="slider">
                <img src="{{ asset('img/LobosBUAP.png') }}" id="img1">
                <img src="{{ asset('img/padel.jpg') }}" id="img2" class="hidden">
                <img src="{{ asset('img/ajedrez.jpg') }}" id="img3" class="hidden">
                <img src="{{ asset('img/campamento.jpg') }}" id="img4" class="hidden">
            </div>
        </div>
    </div>
    <script src="{{ asset('js/gestion.js') }}"></script>
    {{-- @livewirphpeScripts --}}
</body>

</html>
