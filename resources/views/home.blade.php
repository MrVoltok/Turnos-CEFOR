<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CEFOR - Turnos</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
    {{-- <audio id="mySound" src="{{ asset('sound/noti.mp3') }}" preload="auto"></audio> --}}

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
                <div id="modulo4">
                    <div class="turno">
                        <h2 class="text-black font-bold text-2xl">Turno</h2>
                        <span class="text-black font-bold text-5xl" id="turno_modulo4">{{ $turns->modulo4 }}</span>
                    </div>
                    <div class="modulo">
                        <h2 class="text-5xl text-slate-50">Módulo 4</h2>
                    </div>
                </div>
            </div>

            <div id="slider">
                <img src="{{ asset('img/LobosBUAP.png') }}" id="img1">
                <img src="{{ asset('img/curso1.jpeg') }}" id="img2" class="hidden">
                <img src="{{ asset('img/curso2.jpeg') }}" id="img3" class="hidden">
                <img src="{{ asset('img/curso3.jpeg') }}" id="img4" class="hidden">
                <img src="{{ asset('img/curso4.jpeg') }}" id="img5" class="hidden">
                <img src="{{ asset('img/campamento.jpg') }}" id="img6" class="hidden">
            </div>
        </div>
    </div>
    <script src="{{ asset('js/gestion.js') }}"></script>
    <script>
        const turnModule1 = document.getElementById("turno_modulo1");
        const turnModule2 = document.getElementById("turno_modulo2");
        const turnModule3 = document.getElementById("turno_modulo3");
        const turnModule4 = document.getElementById("turno_modulo4");
        var currentTurns = {
            modulo1: "{{ $turns->modulo1 }}",
            modulo2: "{{ $turns->modulo2 }}",
            modulo3: "{{ $turns->modulo3 }}",
            modulo4: "{{ $turns->modulo4 }}"
        };
        let turn1, turn2, turn3, turn4;

        function fetchTurnos() {
            $.ajax({
                url: '{{ route('turnos.get') }}',
                method: 'GET',
                success: function(response) {
                    turn1 = response.modulo1;
                    turn2 = response.modulo2;
                    turn3 = response.modulo3;
                    turn4 = response.modulo4;

                    $('#turno_modulo1').text(response.modulo1);
                    $('#turno_modulo2').text(response.modulo2);
                    $('#turno_modulo3').text(response.modulo3);
                    $('#turno_modulo4').text(response.modulo4);

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

                    if (turn4 !== currentTurns.modulo4) {
                        $('#turno_modulo4').text(turn4);
                        currentTurns.modulo4 = turn4;
                        changes = true;
                    }

                    if (changes) {
                        playAudio();
                    }

                },
                error: function(xhr, status, error) {
                    console.error('Error fetching turnos:', error);
                }
            });

        }

        function playAudio() {
            var sound = document.getElementById("mySound");
            sound.play();
        }
        // Fetch turnos every 5 seconds
        setInterval(fetchTurnos, 5000);
    </script>
    {{-- @livewirphpeScripts --}}
</body>

</html>
