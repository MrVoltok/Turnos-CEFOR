<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CEFOR - Turnos</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
    {{-- <audio id="mySound" src="{{ asset('sound/noti.mp3') }}" preload="auto"></audio> --}}
    <div class="background"></div>
    <div class="content flex w-full">
        <aside class="turns-list flex items-center flex-col h-full p-8">
            <header class="w-full flex justify-center">
                <img src="{{ asset('img/LobosBUAP.png') }}" alt="" class="logo">
            </header>
            <div class="turns py-12">
                <ul class="flex flex-col gap-4">
                    <li class="module-pill">
                        <div class="turn">
                            <h2 class="text-black font-bold text-2xl">Turno</h2>
                            <span id="turno_modulo1" class="text-black font-bold text-5xl">{{ $turns->modulo1 }}</span>
                        </div>
                        <div class="module">
                            <h2 class="text-5xl text-slate-50">Módulo 1</h2>
                        </div>
                    </li>
                    <li class="module-pill">
                        <div class="turn">
                            <h2 class="text-black font-bold text-2xl">Turno</h2>
                            <span id="turno_modulo2" class="text-black font-bold text-5xl">{{ $turns->modulo2 }}</span>
                        </div>
                        <div class="module">
                            <h2 class="text-5xl text-slate-50">Módulo 2</h2>
                        </div>
                    </li>
                    <li class="module-pill">
                        <div class="turn">
                            <h2 class="text-black font-bold text-2xl">Turno</h2>
                            <span id="turno_modulo3" class="text-black font-bold text-5xl">{{ $turns->modulo3 }}</span>
                        </div>
                        <div class="module">
                            <h2 class="text-5xl text-slate-50">Módulo 3</h2>
                        </div>
                    </li>
                    <li class="module-pill">
                        <div class="turn">
                            <h2 class="text-black font-bold text-2xl">Turno</h2>
                            <span id="turno_modulo4" class="text-black font-bold text-5xl">{{ $turns->modulo4 }}</span>
                        </div>
                        <div class="module">
                            <h2 class="text-5xl text-slate-50">Módulo 4</h2>
                        </div>
                    </li>
                </ul>
            </div>
        </aside>
        <main class="relative flex justify-center items-center bg-gray-100">
            <div class="wrapper">
                <video src="{{ asset('video/video.mp4') }}" controls></video>
            </div>
            <footer class="absolute bottom-0 left-0 bg-[#17202f] p-2 w-full">
                <p class="text-slate-50 font-semibold text-xl">Text</p>
            </footer>
        </main>
    </div>

    <style>
        body {
            position: relative;
        }

        .background {
            min-height: 100vh;
            background: rgb(80, 186, 171);
            background: linear-gradient(45deg, rgba(80, 186, 171, 1) 0%, rgba(95, 80, 186, 1) 50%, rgba(80, 134, 187, 1) 100%);
        }

        .content {
            position: absolute;
            top: 0%;
            left: 0;
            height: 100vh;
        }

        .turns-list {
            background: #1118276e;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(1.7px);
            -webkit-backdrop-filter: blur(1.7px);
            width: 30%;
        }

        .logo {
            width: 150px;
            height: 150px;
            filter: drop-shadow(0 0 0.75rem black);
        }

        .module-pill {
            background: rgba(0, 0, 0, 0.6);
            border-radius: 10px;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: fit-content;
            overflow: hidden;
            box-shadow: rgba(17, 12, 46, 0.15) 0px 48px 100px 0px;
            pointer-events: none;
            user-select: none;
        }

        .turn {
            padding: 1rem;
            background: #fff;
        }

        .module {
            padding: 1rem;
        }

        main {
            width: 70%;
        }

        .wrapper {
            width: 80%;

            --b: 5px;
            --c: #f3f4f6 25%, #131f34 0;
            padding: 1rem;
            background:
                conic-gradient(from 180deg at top var(--b) right var(--b), var(--c)) 100% 0,
                conic-gradient(from 0deg at bottom var(--b) left var(--b), var(--c)) 0 100%;
            background-size: 50px 50px;
            /* adjust border length here */
            background-repeat: no-repeat;
        }

        .wrapper video {
            box-shadow: rgba(0, 0, 0, 0.25) 0px 25px 50px -12px;

        }
    </style>
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
                        // playAudio();
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
