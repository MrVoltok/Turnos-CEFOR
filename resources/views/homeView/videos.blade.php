<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CEFOR - Turnos</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

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
                    @foreach (['modulo1' => $turns->modulo1, 'modulo2' => $turns->modulo2, 'modulo3' => $turns->modulo3, 'modulo4' => $turns->modulo4] as $moduloKey => $turnoValue)
                        @if (!in_array($moduloKey, $disabledModules))
                            <li class="module-pill">
                                <div class="turn">
                                    <h2 class="text-black font-bold text-2xl">Turno</h2>
                                    <span id="turno_{{ $moduloKey }}"
                                        class="text-black font-bold text-6xl">{{ $turnoValue }}</span>
                                </div>
                                <div class="module">
                                    <h2 class="text-4xl text-slate-50">
                                        {{ ucfirst(str_replace('modulo', 'Módulo ', $moduloKey)) }}</h2>
                                </div>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </aside>
        <main class="relative flex justify-center items-center bg-gray-100">
            @if ($screen->screenView == 'img')
                <div class="img-bg">
                    <div class="wrapper-slider">
                        <div id="slider">
                            @forelse ($images as $image)
                                <img class="w-[500px] h-[500px]" src="{{ Storage::url($image->name) }}"
                                    id="img{{ $loop->iteration }}">
                            @empty
                                <img class="w-[500px] h-[500px]" src="{{ asset('img/LobosBUAP.png') }}" id="img1">
                            @endforelse
                        </div>
                    </div>
                </div>
            @else
                <div class="wrapper">
                    @if ($screen->screenView == 'video')
                        @forelse ($videos as $index => $video)
                            <video id="video{{ $index }}"
                                @if ($index != 0) style="display:none;" @endif>
                                <source src="{{ Storage::url($video->name) }}" type="video/mp4">
                            </video>
                        @empty
                        @endforelse
                    @endif
                    @if ($screen->screenView == 'stream')
                        <div class="iframe-container overflow-hidden">
                            {!! $stream->embedUrl !!}
                        </div>
                    @endif
                </div>
            @endif

            <footer class="absolute bottom-0 left-0 bg-[#17202f] p-2 w-full">
                <div class="slider-message">
                    <div class="slide-track">
                        @foreach ($messages as $message)
                            <div class="slide">
                                <span class="text-slate-50">
                                    <img src="{{ asset('img/LobosBUAP.png') }}" alt="" width="25px">
                                    {{ $message->message }}
                                    <img src="{{ asset('img/LobosBUAP.png') }}" alt="" width="25px">

                                </span>
                            </div>
                        @endforeach
                        @foreach ($messages as $message)
                            <div class="slide">
                                <span class="text-slate-50">
                                    <img src="{{ asset('img/LobosBUAP.png') }}" alt="" width="25px">
                                    {{ $message->message }}
                                    <img src="{{ asset('img/LobosBUAP.png') }}" alt="" width="25px">
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>
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
            background-color: #fafafa;
            background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23bebebe' fill-opacity='0.19' fill-rule='evenodd'/%3E%3C/svg%3E");
        }

        .img-bg {
            background: #f3f4f6;
            position: relative;
            top: -1rem;
        }

        .wrapper,
        .wrapper-slider {
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

        .wrapper {
            width: 90%;
        }

        .wrapper video {
            box-shadow: rgba(0, 0, 0, 0.25) 0px 25px 50px -12px;

        }

        .wrapper-slider {

            width: auto;
            box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
        }

        #slider {
            width: 600px;
            height: 600px;
            overflow: hidden;
            position: relative;
            background: transparent;
        }

        #slider img {
            width: 100%;
            height: 100%;
            position: absolute;
            opacity: 1;
            transition: 0.5s ease-in-out;
            object-fit: cover;
        }

        .hidden {
            opacity: 0;
        }


        .slider-message {
            width: 100%;
            height: auto;
            overflow: hidden;
        }

        .slider-message .slide-track {
            display: flex;
            animation: scroll 100s linear infinite;
            -webkit-animation: scroll 100s linear infinite;
            width: calc(100% * 14);
        }

        .slider-message .slide {
            margin-inline: 1rem;
        }

        .slider-message span {
            gap: 1rem;
            display: flex;
            align-items: center
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

        @keyframes scroll {
            0% {
                -webkit-transform: translateX(0);
                transform: translateX(0);
            }

            100% {
                -webkit-transform: translateX(-50%);
                transform: translateX(-50%);
            }
        }
    </style>
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


        document.addEventListener('DOMContentLoaded', (event) => {
            const videos = document.querySelectorAll('video');
            let currentIndex = 0;

            videos[currentIndex].play();

            videos.forEach((video, index) => {
                video.addEventListener('ended', () => {
                    video.style.display = 'none';
                    currentIndex = (currentIndex + 1) % videos.length;
                    videos[currentIndex].style.display = 'block';
                    videos[currentIndex].play();
                });
            });
        });
    </script>
    {{-- @livewirphpeScripts --}}
</body>

</html>
